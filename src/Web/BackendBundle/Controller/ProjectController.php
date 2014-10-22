<?php
namespace Web\BackendBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Web\BackendBundle\Entity\Project;
use Web\BackendBundle\Form\ProjectType;

class ProjectController extends Controller
{
    public function indexAction(Request $request)
    {
        $project = new Project();
        $type = new ProjectType();
        $form = $this->getForm($project,$type,$request);

        if($form->isValid())
        {
            $em = $this->getManager();
            $em->persist($project);
            $em->flush();

            $this->flash('success' , '项目'.$project->getSubject().'添加成功');
            return $this->redirect('web_project_home');
        }

        $projects = $this->get('project_entity')->findAll();

        return $this->render('WebBackendBundle:Project:index/index.html.twig' ,
            [
                'form' => $form->createView() ,
                'projects' => $projects
            ]
        );
    }
}