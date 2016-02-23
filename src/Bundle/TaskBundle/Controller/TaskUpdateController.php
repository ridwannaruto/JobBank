<?php

namespace Bundle\TaskBundle\Controller;

use Bundle\CoreBundle\Values\Messages\GenericMessage;
use Bundle\CoreBundle\Values\RepositoryName;
use Bundle\CoreBundle\Values\RouteName;
use Bundle\CoreBundle\Values\TwigTemplate;
use Bundle\TaskBundle\Form\TaskType;
use Bundle\TaskBundle\Messages\TaskMessage;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class TaskUpdateController extends BaseTaskController
{
    public function editTaskAction(Request $request, $taskId)
    {
        $authenticatedUser = $this->authenticateUser();
        if ($authenticatedUser) {
            $userRole = $authenticatedUser->getAccesslevel();
            $notificationList = $this->getNotificationList($authenticatedUser->getId());
            if ($userRole == $this->USER_ROLE_HEAD || $userRole == $this->USER_ROLE_ADMIN) {

                $taskToUpdate = $this->findEntityById(RepositoryName::$REPOSITORY_TASK, $taskId);
                $form = $this->createForm(
                    new TaskType(), $taskToUpdate, array(
                    'method' => 'PUT',
                    'attr' => array(
                        'class' => 'form-horizontal center'
                    )));

                $form->handleRequest($request);

                if ($form->isValid()) {
                    $taskToUpdate->setLeader($taskToUpdate->getLeader()->getId());
                    $taskToUpdate->setUser($taskToUpdate->getUser()->getId());
                    $taskToUpdate->setProject($taskToUpdate->getProject()->getId());

                    try {
                        $this->saveEntityInstantly($taskToUpdate);
                    } catch (\Exception $e) {
                        return $this->render(TwigTemplate::$TWIG_TASK_EDIT, array(
                            'message' => GenericMessage::$MESSAGE_ERROR_GENERAL,
                            'type' => 'E',
                            'form' => $form->createView(),
                            $this->KEY_NOTIFICATION_LIST => $notificationList
                        )
                        );
                    }


                    $this->setNotification(
                        'Task Details Updated',
                        "Details of your task has been updated. Click the following link to get the latest details.", 1,
                        $taskToUpdate->getUser(), $taskToUpdate->getId(), $taskToUpdate->getProject()
                    );


                    return $this->redirect(
                        $this->generateUrl(RouteName::$ROUTE_TASK_LIST, array(
                            'type' => 'S',
                            'message' => TaskMessage::$MESSAGE_TASK_UPDATE_SUCCESS
                        )
                        )
                    );
                }

                return $this->render(TwigTemplate::$TWIG_TASK_EDIT, array(
                    'form' => $form->createView(),
                    $this->KEY_NOTIFICATION_LIST => $notificationList
                )
                );
            }
            return $this->render(TwigTemplate::$TWIG_PERMISSION, array(
                    $this->KEY_NOTIFICATION_LIST => $notificationList
                )
            );
        }
        return $this->redirect($this->generateUrl(RouteName::$ROUTE_LOGIN));
    }

    public function feedbackAction($taskId)
    {
        $authenticatedUser = $this->authenticateUser();
        if ($authenticatedUser) {
            $userRole = $authenticatedUser->getAccesslevel();
            if ($userRole == $this->USER_ROLE_HEAD || $userRole == $this->USER_ROLE_ADMIN) {
                $feedbackTask = $this->findEntityById(RepositoryName::$REPOSITORY_TASK,$taskId);
                $notificationList = $this->getNotificationList($authenticatedUser->getId());
                $taskAssignee = $this->findEntityById(RepositoryName::$REPOSITORY_USER,$feedbackTask->getUser());
                return $this->render(TwigTemplate::$TWIG_TASK_FEEDBACK, array(
                    'Task' => $feedbackTask,
                    'User' => $taskAssignee,
                    $this->KEY_NOTIFICATION_LIST => $notificationList
                )
                );
            }
            return $this->render(TwigTemplate::$TWIG_PERMISSION);
        }
        return $this->redirect($this->generateUrl(RouteName::$ROUTE_LOGIN));
    }

    public function completeTaskAction(Request $request)
    {
        $authenticatedUser = $this->authenticateUser();
        if ($authenticatedUser) {
            $userRole = $authenticatedUser->getAccesslevel();
            if ($userRole == $this->USER_ROLE_HEAD || $userRole == $this->USER_ROLE_ADMIN) {
                $taskId = $request->get('taskId');
                $taskToComplete = $this->findEntityById(RepositoryName::$REPOSITORY_TASK,$taskId);
                $taskToComplete->setEndtimestamp(new \DateTime());
                $taskToComplete->setCompleted(1);
                $taskRating = $request->get('rating');
                $taskWeight = $taskToComplete->getWeight();
                $taskToComplete->setRate($taskRating);
                $notificationList = $this->getNotificationList($authenticatedUser->getId());
                $searchParams = array('user' => $taskToComplete->getUser());
                $taskCompletedUserCareer = $this->findOneEntity(RepositoryName::$REPOSITORY_TRACK_REPORT,$searchParams);
                $currentRating = $taskCompletedUserCareer->getOverallrating();
                $totalWeight = $taskCompletedUserCareer->getTotalWeight();
                $newRating  = (($currentRating * $totalWeight) + ($taskRating * $taskWeight)) / ($totalWeight + $taskWeight);

                $taskCompletedUserCareer->setOverallrating($newRating);
                $taskCompletedUserCareer->setTotalweight($totalWeight + $taskWeight);
                $feedbackList = $taskCompletedUserCareer->getComments();
                if ($feedbackList == null) {
                    $feedbackList = array();
                }
                $feedbackList[] = array($taskToComplete->getLeader(), $request->get('feedback'));
                $taskCompletedUserCareer->setComments($feedbackList);

                try {
                    $this->saveEntityInstantly($taskCompletedUserCareer);
                    $this->saveEntityInstantly($taskToComplete);
                } catch (\Exception $e) {

                    return $this->redirect(
                        $this->generateUrl(TwigTemplate::$TWIG_TASK_DETAIL, array(
                            'type' => 'E',
                            'message' => GenericMessage::$MESSAGE_ERROR_GENERAL,
                            'taskId' => $taskId
                        )
                        )
                    );
                }

                $this->setNotification(
                    'Task Completed',
                    "Congratulations! You have completed your Task with a Rating of " . $taskRating . "/10.", 3,
                    $taskToComplete->getUser(), $taskToComplete->getId(), $taskToComplete->getProject()
                );


                return $this->redirect(
                    $this->generateUrl(RouteName::$ROUTE_TASK_DETAIL, array(
                        'type' => 'S',
                        'message' => TaskMessage::$MESSAGE_TASK_COMPLETED,
                        'taskId' => $taskId
                    )
                    )
                );
            }
            return $this->render(TwigTemplate::$TWIG_PERMISSION);

        }
        return $this->redirect($this->generateUrl(RouteName::$ROUTE_LOGIN));
    }


}