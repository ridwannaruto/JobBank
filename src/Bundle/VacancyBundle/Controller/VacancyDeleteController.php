<?php

namespace Bundle\VacancyBundle\Controller;

use Bundle\CoreBundle\Values\RepositoryName;
use Bundle\CoreBundle\Values\RouteName;
use Symfony\Component\HttpFoundation\Request;

class VacancyDeleteController extends BaseVacancyController {

    public function deleteVacancyAction(Request $request, $vacancyId)
    {
        $authenticatedUser = $this->authenticateUser();
        if ($authenticatedUser) {
            $vacancy = $this->findEntityById(RepositoryName::$REPOSITORY_VACANCY, $vacancyId);
            $notificationList = $this->getNotificationList($authenticatedUser->getId());
            $accessLevel = $authenticatedUser->getAccesslevel();
            if ($accessLevel == $this->USER_ROLE_ADMIN || $authenticatedUser == $vacancy->getPostedbyuserid()->getId()) {
                $vacancyToDelete = $this->findEntityById(RepositoryName::$REPOSITORY_VACANCY, $vacancyId);
                if (!$vacancyToDelete) {
                    return $this->redirect($this->generateUrl(RouteName::$ROUTE_VACANCY_LIST, array(
                        'type' => 'E',
                        'message' => " opz! could not find vacancy"
                    )));
                }

                try {
                    $this->removeEntity($vacancyToDelete);
                } catch (\Exception $e) {
                    return $this->redirect($this->generateUrl(RouteName::$ROUTE_VACANCY_LIST, array(
                        'type' => 'E',
                        'message' => " opz! could not delete vacancy"
                    )));
                }


                return $this->redirect($this->generateUrl(RouteName::$ROUTE_VACANCY_LIST, array(
                    'type' => 'S',
                    'message' => " successfully deleted the vacancy"
                )));
            }
            return $this->render(TwigTemplate::$TWIG_PERMISSION, array(
                $this->KEY_NOTIFICATION_LIST => $notificationList
            ));
        }
        return $this->redirect($this->generateUrl(RouteName::$ROUTE_LOGIN));
    }
}