<?php

namespace Bundle\TaskBundle\Controller;

use Bundle\CoreBundle\Values\RouteName;
use Bundle\CoreBundle\Values\TwigTemplate;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Bundle\EntityBundle\Entity\Task;
use Bundle\EntityBundle\Form\TaskType;
use Bundle\EntityBundle\Entity\Notification;
use Bundle\EntityBundle\Entity\Trackreport;
use Bundle\EntityBundle\Entity\Comments;
use Bundle\EntityBundle\Form\CommentsType;

class TaskListController extends BaseTaskController
{


    public function viewListAction(Request $request)
    {
        $authenticatedUser = $this->authenticateUser();
        if ($authenticatedUser) {
            $userRole = $authenticatedUser->getAccessLevel();
            $department = $authenticatedUser->getPillar();
            $entityManager = $this->getEntityManager();
            $notificationList = $this->getNotificationList($authenticatedUser->getId());
            if ($userRole == $this->USER_ROLE_ADMIN) {
                $completeTaskQuery = $entityManager->createQuery(
                    'SELECT t.id,t.user,t.name as taskname,t.pillar, t.description, t.project, p.name as projectname, u.firstname, u.lastname FROM Bundle\UserBundle\Entity\User u,Bundle\TaskBundle\Entity\Task t, Bundle\ProjectBundle\Entity\Project p WHERE  t.user = u.id AND t.project = p.id AND t.completed=1'
                );
                $incompleteTaskQuery = $entityManager->createQuery(
                    'SELECT t.id,t.user,t.name as taskname,t.pillar, t.description, t.project, p.name as projectname, u.firstname, u.lastname FROM Bundle\UserBundle\Entity\User u,Bundle\TaskBundle\Entity\Task t, Bundle\ProjectBundle\Entity\Project p WHERE  t.user = u.id AND t.project = p.id AND t.completed=0'
                );
                $completedTaskList = $completeTaskQuery->getResult();
                $incompleteTaskList = $incompleteTaskQuery->getResult();
                return $this->render(
                    TwigTemplate::$TWIG_TASK_LIST, array(
                    'Tasks' => $completedTaskList,
                    'ITasks' => $incompleteTaskList,
                    'message' => $request->get('message'),
                    'type' => $request->get('type'),
                    $this->KEY_NOTIFICATION_LIST => $notificationList
                )
                );
            }
            if ($userRole == $this->USER_ROLE_HEAD) {

                $completeTaskQuery = $em->createQuery(
                    'SELECT t.id,t.user,t.name as taskname,t.pillar, t.description, t.project, p.name as projectname, u.firstname, u.lastname FROM Bundle\UserBundle\Entity\User u,Bundle\TaskBundle\Entity\Task t, Bundle\ProjectBundle\Entity\Project p WHERE  t.user = u.id AND t.project = p.id AND t.completed=1 AND t.pillar=:pillar ORDER by t.id DESC'
                )->setParameter('pillar', $department);
                $incompleteTaskQuery = $entityManager->createQuery(
                    'SELECT t.id,t.user,t.name as taskname,t.pillar, t.description, t.project, p.name as projectname, u.firstname, u.lastname FROM Bundle\UserBundle\Entity\User u,Bundle\TaskBundle\Entity\Task t, Bundle\ProjectBundle\Entity\Project p WHERE  t.user = u.id AND t.project = p.id AND t.completed=0 AND t.pillar=:pillar ORDER by t.id DESC'
                )->setParameter('pillar', $department);

                $completedTaskList = $completeTaskQuery->getResult();
                $incompleteTaskList = $incompleteTaskQuery->getResult();

                return $this->render(TwigTemplate::$TWIG_TASK_LIST, array(
                    'Tasks' => $completedTaskList,
                    'ITasks' => $incompleteTaskList,
                    'message' => $request->get('message'),
                    'type' => $request->get('type'),
                    $this->KEY_NOTIFICATION_LIST => $notificationList
                )
                );
            } else {

                $completeTaskQuery = $em->createQuery(
                    'SELECT t.id,t.user,t.name as taskname,t.pillar, t.description, t.project, p.name as projectname, u.firstname, u.lastname FROM Bundle\UserBundle\Entity\User u,Bundle\TaskBundle\Entity\Task t, Bundle\ProjectBundle\Entity\Project p WHERE  t.user = u.id AND t.project = p.id AND t.completed=1 AND t.user=:userID ORDER by t.id DESC'
                )->setParameter('userID', $authenticatedUser->getId());
                $incompleteTaskQuery = $entityManager->createQuery(
                    'SELECT t.id,t.user,t.name as taskname,t.pillar, t.description, t.project, p.name as projectname, u.firstname, u.lastname FROM Bundle\UserBundle\Entity\User u,Bundle\TaskBundle\Entity\Task t, Bundle\ProjectBundle\Entity\Project p WHERE  t.user = u.id AND t.project = p.id AND t.completed=0 AND t.user=:userID ORDER by t.id DESC'
                )->setParameter('userID', $authenticatedUser->getId());

                $completedTaskList = $completeTaskQuery->getResult();
                $incompleteTaskList = $incompleteTaskQuery->getResult();

                return $this->render(TwigTemplate::$TWIG_TASK_LIST, array(
                    'Tasks' => $completedTaskList,
                    'ITasks' => $incompleteTaskList,
                     $this->KEY_NOTIFICATION_LIST => $notificationList
                )
                );
            }
        }

        return $this->redirect($this->generateUrl(RouteName::$ROUTE_LOGIN));
    }



}