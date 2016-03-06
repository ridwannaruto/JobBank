<?php

namespace Bundle\VacancyBundle\Controller;

use Bundle\CoreBundle\Values\RepositoryName;
use Bundle\CoreBundle\Values\RouteName;
use Bundle\CoreBundle\Values\TwigTemplate;

class VacancyListController extends BaseVacancyController {

    public function viewListAction() {
        $authenticatedUser = $this->authenticateUser();
        if ($authenticatedUser) {
            $accessLevel = $authenticatedUser->getAccesslevel();
            $notificationList = $this->getNotificationList($authenticatedUser->getId());
            if ($accessLevel == $this->USER_ROLE_ADMIN) {
                $oldVacancyList = $this->getOldVacancies();
                $currentVacancyList = $this->getCurrentVacancies();
                return $this->render(
                    TwigTemplate::$TWIG_VACANCY_LIST, array(
                        'oldVacancyList' => $oldVacancyList,
                        'currentVacancyList' => $currentVacancyList,
                        $this->KEY_NOTIFICATION_LIST => $notificationList
                    )
                );
            } else {
                return $this->render(TwigTemplate::$TWIG_PERMISSION,array(
                    $this->KEY_NOTIFICATION_LIST => $notificationList
                ));
            }
        }
        return $this->redirect($this->generateUrl(RouteName::$ROUTE_LOGIN));
    }

    public function getCurrentVacancies() {
        $vacancyRepository = $this->getRepository(RepositoryName::$REPOSITORY_VACANCY);
        $vacancyQuery = $vacancyRepository->createQueryBuilder('p')
            ->where('p.applybeforedate > :current_date')
            ->orderBy('p.id', 'DESC')
            ->setParameter('current_date', date('Y/m/d H:m:s'))
            ->getQuery();

        return $vacancyQuery->getResult();
    }

    public function getOldVacancies() {
        $vacancyRepository = $this->getRepository(RepositoryName::$REPOSITORY_VACANCY);
        $vacancyQuery = $vacancyRepository->createQueryBuilder('p')
            ->where('p.applybeforedate < :current_date')
            ->orderBy('p.id', 'DESC')
            ->setParameter('current_date', date('Y/m/d H:m:s'))
            ->getQuery();

        return $vacancyQuery->getResult();
    }
}