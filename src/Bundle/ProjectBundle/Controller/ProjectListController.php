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

class ProjectListController extends BaseController {

    public function viewListAction(Request $request) {
        $loggedUser = $this->authenticateUser();
        
        if ($loggedUser) {
            $notificationList = $this->getNotificationList($loggedUser->getId());
            $completedProjectList = $this->getCompletedProjectList();
            $ongoingProjectList = $this->getOngoingProjectList();
            return $this->render(TwigTemplate::$TWIG_PROJECT_LIST, array(
                        'completedProjectList' => $completedProjectList,
                        'ongoingProjectList' => $ongoingProjectList,
                        'message' => $request->get('message'),
                        'type' => $request->get('type'),
                        'notificationList' => $notificationList
            ));
        }
        return $this->redirect($this->generateUrl(RouteName::$ROUTE_LOGIN));
    }

    private function getCompletedProjectList(){
        $projectRepository = $this->getRepository(RepositoryName::$REPOSITORY_PROJECT);
        $completeProjectQuery = $projectRepository->createQueryBuilder('p')
            ->where('p.status=1')
            ->orderBy('p.id', 'DESC')
            ->getQuery();

        return $completeProjectQuery->getResult();
    }

    private function getOngoingProjectList(){
        $projectRepository = $this->getRepository(RepositoryName::$REPOSITORY_PROJECT);
        $ongoingProjectQuery = $projectRepository->createQueryBuilder('p')
            ->where('p.status=0')
            ->orderBy('p.id', 'DESC')
            ->getQuery();
        return $ongoingProjectQuery->getResult();
    }



}