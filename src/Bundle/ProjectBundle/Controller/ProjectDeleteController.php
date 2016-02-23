<?php

namespace Bundle\ProjectBundle\Controller;

use Bundle\CoreBundle\Controller\BaseController;
use Bundle\CoreBundle\Values\RepositoryName;
use Bundle\CoreBundle\Values\RouteName;
use Bundle\CoreBundle\Values\TwigTemplate;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Moraspirit\EntityBundle\Entity\Project;
use Moraspirit\EntityBundle\Entity\Task;
use Moraspirit\EntityBundle\Form\ProjectType;
use Moraspirit\EntityBundle\Entity\Notification;
use Moraspirit\EntityBundle\Entity\Comments;
use Moraspirit\EntityBundle\Form\CommentsType;

class ProjectDeleteController extends BaseController
{


    public function deleteProjectAction(Request $request, $projectId)
    {
        $authenticatedUser = $this->authenticateUser();
        if ($authenticatedUser) {
            $accessLevel = $authenticatedUser->getAccesslevel();
            $notificationList = $this->getNotificationList($authenticatedUser->getId());
            if ($accessLevel == $this->USER_ROLE_ADMIN || $accessLevel == $this->USER_ROLE_HEAD) {
                $projectToDelete = $this->findEntityById(RepositoryName::$REPOSITORY_PROJECT, $projectId);
                $searchParams = array("project" => $projectId);
                $projectTaskList = $this->findAllEntities(RepositoryName::$REPOSITORY_TASK,$searchParams);

                if ($projectTaskList != null) {
                    foreach ($projectTaskList as $task) {
                        $this->removeEntity($task);
                    }
                }
                $projectCommentList = $this->findAllEntities(RepositoryName::$REPOSITORY_COMMENT,$searchParams);
                if ($projectCommentList != null) {
                    foreach ($projectCommentList as $comment) {
                        $this->removeEntity($comment);
                    }
                }
                $projectNotificationList = $this->findAllEntities(RepositoryName::$REPOSITORY_NOTIFICATION,$searchParams);
                if ($projectNotificationList != null) {
                    foreach ($projectNotificationList as $notification) {
                        $this->removeEntity($notification);
                    }
                }
                if (!$projectToDelete) {
                    return $this->redirect($this->generateUrl(RouteName::$ROUTE_PROJECT_LIST, array(
                            'type' => 'E',
                            'message' => " opz! could not find project"
                        )));
                }

                try {
                    $this->removeEntity($projectToDelete);
                } catch (\Exception $e) {
                    return $this->redirect($this->generateUrl(RouteName::$ROUTE_PROJECT_LIST, array(
                            'type' => 'E',
                            'message' => " opz! could not delete project"
                        )));
                }


                return $this->redirect($this->generateUrl(RouteName::$ROUTE_PROJECT_LIST, array(
                        'type' => 'S',
                        'message' => " successfully deleted the project"
                    )));
            }
            return $this->render(TwigTemplate::$TWIG_PERMISSION, array($this->KEY_NOTIFICATION_LIST => $notificationList));
        }
        return $this->redirect($this->generateUrl(RouteName::$ROUTE_LOGIN));
    }


}