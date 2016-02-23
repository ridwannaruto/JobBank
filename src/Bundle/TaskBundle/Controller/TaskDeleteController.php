<?php

namespace Bundle\TaskBundle\Controller;

use Bundle\CoreBundle\Values\RepositoryName;
use Bundle\CoreBundle\Values\RouteName;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class TaskDeleteController extends BaseTaskController
{

    public function deleteTaskAction(Request $request, $taskId)
    {
        $authenticatedUser = $this->authenticateUser();
        if ($authenticatedUser) {
            $accessLevel = $authenticatedUser->getAccesslevel();
            $notificationList = $this->getNotificationList($authenticatedUser->getId());
            if ($accessLevel == $this->USER_ROLE_HEAD || $accessLevel == $this->USER_ROLE_ADMIN) {
                $taskToDelete = $this->findEntityById(RepositoryName::$REPOSITORY_TASK,$taskId);
                $searchParams = array("task" => $taskId);
                $taskCommentList = $this->findAllEntities(RepositoryName::$REPOSITORY_COMMENT,$searchParams);
                if ($taskCommentList != null) {
                    foreach ($taskCommentList as $comment) {
                        $this->removeEntity($comment);
                    }
                }

                $taskNotificationList = $this->findAllEntities(RepositoryName::$REPOSITORY_NOTIFICATION,$searchParams);

                if ($taskNotificationList != null) {
                    foreach ($taskNotificationList as $notification) {
                        $this->removeEntity($notification);
                    }
                }
                if (!$taskToDelete) {
                    return $this->redirect(
                        $this->generateUrl(
                            RouteName::$ROUTE_TASK_LIST, array(
                            'type' => 'E',
                            'message' => " opz! could not find task"
                        )
                        )
                    );
                }

                try {
                    $this->removeEntity($taskToDelete);
                } catch (\Exception $e) {
                    return $this->redirect(
                        $this->generateUrl(
                            RouteName::$ROUTE_TASK_LIST, array(
                            'type' => 'E',
                            'message' => " opz! could not delete task"
                        )
                        )
                    );
                }

                return $this->redirect(
                    $this->generateUrl(
                        RouteName::$ROUTE_TASK_LIST, array(
                        'type' => 'S',
                        'message' => " successfully deleted the task"
                    )
                    )
                );
            }
            return $this->render(
                TwigTemplate::$TWIG_PERMISSION, array($this->KEY_NOTIFICATION_LIST => $notificationList)
            );
        }
        return $this->redirect($this->generateUrl(RouteName::$ROUTE_LOGIN));
    }


}