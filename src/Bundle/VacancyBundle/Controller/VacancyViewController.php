<?php

namespace Bundle\VacancyBundle\Controller;

use Bundle\CoreBundle\Values\TwigTemplate;
use Symfony\Component\HttpFoundation\Request;

class VacancyViewController extends BaseVacancyController {

    public function viewAction($vacancyId, Request $request) {
        $authenticatedUser = $this->authenticateUser();
        if ($authenticatedUser) {
            $accessLevel = $authenticatedUser->getAccesslevel();
            $notificationList = $this->getNotificationList($authenticatedUser->getId());
            if ($accessLevel == $this->USER_ROLE_ADMIN) {




                return $this->render(TwigTemplate::$TWIG_VACANCY_DETAIL, array(
                    $this->KEY_NOTIFICATION_LIST => $notificationList
                ));
            } else {
                return $this->render(TwigTemplate::$TWIG_PERMISSION,array(
                    $this->KEY_NOTIFICATION_LIST => $notificationList
                ));
            }
        }
    }
}