<?php

namespace Bundle\ProjectBundle\Controller;

use Bundle\CoreBundle\Controller\BaseController;
use Bundle\CoreBundle\Values\GenericMessage;
use Bundle\ProjectBundle\Messages\ProjectMessage;
use Bundle\CoreBundle\Values\RepositoryName;
use Bundle\CoreBundle\Values\RouteName;
use Bundle\CoreBundle\Values\TwigTemplate;
use Bundle\ProjectBundle\Form\ProjectType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ProjectUpdateController extends BaseProjectController {


    public function completeAction(Request $request, $projectId) {
        $authenticatedUser = $this->authenticateUser();
        if ($authenticatedUser) {
            $project = $this->findEntityById(RepositoryName::$REPOSITORY_PROJECT,$projectId);
            $project->setEnd(new \DateTime());
            $project->setStatus($this->STATUS_PROJECT_COMPLETED);
            $notificationList = $this->getNotificationList($authenticatedUser->getId());
            try {
                $this->saveEntityInstantly($project);
            } catch (\Exception $e) {
                // echo $e;
                return $this->redirect($this->generateUrl(RouteName::$ROUTE_PROJECT_DETAIL, array(
                                    'type' => 'E',
                                    'message' => GenericMessage::$MESSAGE_ERROR_GENERAL,
                                    'projectId' => $projectId,
                                    $this->KEY_NOTIFICATION_LIST => $notificationList
                )));
            }

            $this->setNotification('Project Completed', "Congratulations! You have completed your Project", 3, $project->getManager(), $project->getId());


            return $this->redirect($this->generateUrl(RouteName::$ROUTE_PROJECT_DETAIL, array(
                                'type' => 'S',
                                'message' =>ProjectMessage::$MESSAGE_PROJECT_COMPLETED,
                                'projectId' => $projectId
            )));
        }

        return $this->redirect($this->generateUrl(RouteName::$ROUTE_LOGIN));
    }

    public function editProjectAction(Request $request, $projectId) {
        $authenticatedUser = $this->authenticateUser();
        if ($authenticatedUser) {
            $project = $this->findEntityById(RepositoryName::$REPOSITORY_PROJECT,$projectId);
            $projectManager = $this->getUser($project->getManager());
            $notificationList = $this->getNotificationList($authenticatedUser->getId());
            $accessLevel = $authenticatedUser->getAccesslevel();
            if ($accessLevel == $this->USER_ROLE_ADMIN || $accessLevel == $this->USER_ROLE_HEAD || $authenticatedUser == $projectManager) {

                $projectEditForm = $this->createForm(new ProjectType(), $project, array(
                    'method' => 'POST',
                    'attr' => array(
                        'class' => 'form-horizontal center'
                    )
                ));
                $projectEditForm->handleRequest($request);


                if ($projectEditForm->isValid()) {
                    $project->setManager($projectManager->getId());


                    try {
                        $this->saveEntityInstantly($project);
                    } catch (\Exception $e) {
                        return $this->render(TwigTemplate::$TWIG_PROJECT_EDIT, array(
                            'message' => GenericMessage::$MESSAGE_ERROR_GENERAL,
                            'type' => 'E',
                            'form' => $projectEditForm->createView(),
                             $this->KEY_NOTIFICATION_LIST => $notificationList
                        ));
                    }


                    $this->setNotification('Project Details Updated', "Details of your project has been updated. Click the following link to get the latest details.", 1, $project->getManager(), $project->getId());


                    return $this->redirect($this->generateUrl(RouteName::$ROUTE_PROJECT_DETAIL, array(
                        'projectId' => $projectId,
                        'type' => 'S',
                        'message' => ProjectMessage::$MESSAGE_PROJECT_UPDATE_SUCCESS. $projectManager->getFirstname())));
                }

                return $this->render(TwigTemplate::$TWIG_PROJECT_EDIT, array(
                    'form' => $projectEditForm->createView(),
                    $this->KEY_NOTIFICATION_LIST => $notificationList
                ));
            } else {
                return $this->render(TwigTemplate::$TWIG_PERMISSION,array(
                    $this->KEY_NOTIFICATION_LIST => $notificationList
                ));
            }
        }
        return $this->redirect($this->generateUrl(RouteName::$ROUTE_LOGIN));
    }
}