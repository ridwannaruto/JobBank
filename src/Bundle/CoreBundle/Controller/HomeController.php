<?php

namespace Bundle\CoreBundle\Controller;

use Bundle\CoreBundle\Values\RepositoryName;
use Bundle\CoreBundle\Values\RouteName;
use Bundle\CoreBundle\Values\TwigTemplate;
use Moraspirit\EntityBundle\Form\UserType;
use Symfony\Component\HttpFoundation\Session\Session;

class HomeController extends BaseController {

    public function indexAction() {

        $authenticatedUser = $this->authenticateUser();

        if ($authenticatedUser) {
            $userRole = $authenticatedUser->getAccesslevel();
            $notificationList = $this->getNotificationList($authenticatedUser->getId());

            if ($userRole == $this->USER_ROLE_ADMIN) {
                $memberList = $this->findAllEntities(RepositoryName::$REPOSITORY_USER);
                $taskList = $this->getTaskListForAdmin();
                $completedTaskInfo = count($this->findUniqueEntities(RepositoryName::$REPOSITORY_TASK,array('completed'=>1)));
                $ongoingTaskInfo = count($this->findUniqueEntities(RepositoryName::$REPOSITORY_TASK,array('completed'=>0)));
                $completedProjectInfo = count($this->findUniqueEntities(RepositoryName::$REPOSITORY_PROJECT,array('status'=>1)));
                $ongoingProjectInfo = count($this->findUniqueEntities(RepositoryName::$REPOSITORY_PROJECT,array('status'=>0)));
                $activeVolunteerInfo = count($this->findUniqueEntities(RepositoryName::$REPOSITORY_USER,array('status'=>2)));
                $pendingVolunteerInfo = count($this->findUniqueEntities(RepositoryName::$REPOSITORY_USER,array('status'=>1)));

                return $this->render(TwigTemplate::$TWIG_HOME_ADMIN, array(
                    $this->KEY_TASK_LIST => $taskList,
                    $this->KEY_NOTIFICATION_LIST => $notificationList,
                    'members' => $memberList,
                    'completedTaskInfo' => $completedTaskInfo,
                    'ongoingTaskInfo' => $ongoingTaskInfo,
                    'completedProjectInfo' => $completedProjectInfo,
                    'ongoingProjectInfo' => $ongoingProjectInfo,
                    'activeVolunteerInfo' => $activeVolunteerInfo,
                    'pendingVolunteerInfo' =>$pendingVolunteerInfo
                ));
            }

            if ($userRole == $this->USER_ROLE_HEAD) {
                $searchParams = array('pillar'=>$authenticatedUser->getPillar());
                $memberList = $this->findUniqueEntities(RepositoryName::$REPOSITORY_USER,$searchParams);


                $taskList = $this->getTaskListForHead($authenticatedUser->getPillar());
                return $this->render(TwigTemplate::$TWIG_HOME_HEAD, array(
                    $this->KEY_TASK_LIST => $taskList,
                    $this->KEY_NOTIFICATION_LIST => $notificationList,
                    'members' => $memberList
                ));
            }
            if ($userRole == $this->USER_ROLE_VOLUNTEER) {
                $taskList = $this->getTaskListForVolunteer($authenticatedUser->getId());
                return $this->render(
                    TwigTemplate::$TWIG_HOME_VOLUNTEER, array(
                    $this->KEY_TASK_LIST => $taskList,
                    $this->KEY_NOTIFICATION_LIST => $notificationList

                ));
            }
        }

        return $this->redirect($this->generateUrl(RouteName::$ROUTE_LOGIN));
    }



    private function getTaskListForAdmin(){
        $taskRepository = $this->getRepository(RepositoryName::$REPOSITORY_TASK);
        $taskQuery = $taskRepository->createQueryBuilder('p')
            ->where('p.completed= 0')
            ->orderBy('p.id', 'DESC')
            ->getQuery();
        return $taskQuery->getResult();
    }

    private function getTaskListForHead($department){
        $taskRepository = $this->getRepository(RepositoryName::$REPOSITORY_TASK);
        $taskQuery = $taskRepository->createQueryBuilder('p')
            ->where('p.pillar = :pillar AND p.completed= 0')
            ->setParameter('pillar',$department)
            ->orderBy('p.id', 'DESC')
            ->getQuery();
        return $taskQuery->getResult();
    }

    private function getTaskListForVolunteer($userId){
        $taskRepository = $this->getRepository(RepositoryName::$REPOSITORY_TASK);
        $taskQuery = $taskRepository->createQueryBuilder('p')
            ->where('p.user = :id AND p.completed= 0')
            ->setParameter('id', $userId)
            ->orderBy('p.id', 'DESC')
            ->getQuery();
        return $taskQuery->getResult();
    }
}