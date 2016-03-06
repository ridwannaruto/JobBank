<?php

namespace Bundle\VacancyBundle\Controller;


use Bundle\CoreBundle\Values\RouteName;
use Bundle\CoreBundle\Values\TwigTemplate;
use Bundle\VacancyBundle\Entity\Vacancy;
use Bundle\VacancyBundle\Form\VacancyType;
use Bundle\VacancyBundle\Messages\VacancyMessage;
use Symfony\Component\HttpFoundation\Request;

class VacancyCreateController extends BaseVacancyController
{
    public function newVacancyAction(Request $request) {
        $loggedUser = $this->authenticateUser();
        if ($loggedUser) {
            $accessLevel = $loggedUser->getAccesslevel();
            $notificationList = $this->getNotificationList($loggedUser->getId());
            if ($accessLevel == $this->USER_ROLE_ADMIN || $accessLevel == $this->USER_ROLE_HEAD) {
                $newVacancy = new Vacancy();
                $newVacancyForm = $this->createForm(new VacancyType(), $newVacancy, array(
                    'attr' => array(
                        'class' => 'form-horizontal center'
                    )
                ));
                $newVacancyForm->handleRequest($request);

                if ($newVacancyForm->isValid()) {
                    $newVacancy = $newVacancyForm->getData();

                    $newVacancy->setCreationDate(date('Y/m/d H:m:s'));
                    $newVacancy->setPostedbyuserid($loggedUser);

                    try {
                        $this->saveEntityInstantly($newVacancy);
                    } catch (\Exception $e) {
                        return $this->render(TwigTemplate::$TWIG_VACANCY_NEW, array(
                            'message' => GenericMessage::$MESSAGE_ERROR_GENERAL,
                            'type' => 'E',
                            'Notifications' => $notificationList,
                            'form' => $newVacancyForm->createView()
                        ));
                    }

                    return $this->redirect($this->generateUrl(RouteName::$ROUTE_VACANCY_LIST, array(
                            'type' => 'S',
                            'message' => VacancyMessage::$MESSAGE_VACANCY_CREATE_SUCCESS
                        )
                    ));
                }

                return $this->render(TwigTemplate::$TWIG_VACANCY_NEW, array(
                    'form' => $newVacancyForm->createView(),
                    $this->KEY_NOTIFICATION_LIST => $notificationList
                ));
            } else {
                return $this->render(TwigTemplate::$TWIG_PERMISSION,array(
                    $this->KEY_NOTIFICATION_LIST => $notificationList
                ));
            }
        }
        return $this->redirect($this->generateUrl(RouteName::$ROUTE_LOGIN));
    }
}