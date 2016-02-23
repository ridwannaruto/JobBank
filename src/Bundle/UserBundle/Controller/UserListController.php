<?php

namespace Bundle\UserBundle\Controller;

use Bundle\CoreBundle\Values\RepositoryName;
use Bundle\CoreBundle\Values\TwigTemplate;
use Bundle\UserBundle\Controller\BaseUserController;
use Bundle\CoreBundle\Values\RouteName;
use Symfony\Component\HttpFoundation\Session\Session;

class UserListController extends BaseUserController {

    public function viewListAction() {
        $authenticatedUser = $this->authenticateUser();
        if ($authenticatedUser) {
            $notificationList = $this->getNotificationList($authenticatedUser->getId());
            $memberList = $this->findAllEntities(RepositoryName::$REPOSITORY_USER,null);
                return $this->render(TwigTemplate::$TWIG_USER_LIST, array(
                            'members' => $memberList,
                            $this->KEY_NOTIFICATION_LIST => $notificationList
                            
                ));
        }

        return $this->redirect($this->generateUrl(RouteName::$ROUTE_LOGIN));
    }

}
