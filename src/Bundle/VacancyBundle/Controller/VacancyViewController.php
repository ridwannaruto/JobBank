<?php

namespace Bundle\VacancyBundle\Controller;

use Bundle\CoreBundle\Values\RouteName;
use Bundle\CoreBundle\Values\TwigTemplate;

class VacancyViewController extends BaseVacancyController {

    public function viewAction() {
        $authenticatedUser = $this->authenticateUser();
        if ($authenticatedUser) {
            $notificationList = $this->getNotificationList($authenticatedUser->getId());
            return $this->render(
                TwigTemplate::$TWIG_VACANCY_LIST, array(
                    $this->KEY_NOTIFICATION_LIST => $notificationList
                )
            );
        }
        return $this->redirect($this->generateUrl(RouteName::$ROUTE_LOGIN));
    }
}