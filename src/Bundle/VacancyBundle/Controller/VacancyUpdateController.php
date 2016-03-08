<?php

namespace Bundle\VacancyBundle\Controller;

use Bundle\CoreBundle\Values\GenericMessage;
use Bundle\CoreBundle\Values\RepositoryName;
use Bundle\CoreBundle\Values\RouteName;
use Bundle\CoreBundle\Values\TwigTemplate;
use Bundle\VacancyBundle\Entity\Vacancy;
use Bundle\VacancyBundle\Form\VacancyType;
use Bundle\VacancyBundle\Messages\VacancyMessage;
use Symfony\Component\HttpFoundation\Request;

class VacancyUpdateController extends BaseVacancyController {

    public function editVacancyAction(Request $request, $vacancyId) {
        $authenticatedUser = $this->authenticateUser();
        if ($authenticatedUser) {
            $vacancy = $this->findEntityById(RepositoryName::$REPOSITORY_VACANCY, $vacancyId);
            $notificationList = $this->getNotificationList($authenticatedUser->getId());
            $accessLevel = $authenticatedUser->getAccesslevel();
            if ($accessLevel == $this->USER_ROLE_ADMIN || $authenticatedUser == $vacancy->getPostedbyuserid()->getId()) {
                $vacancyEditForm = $this->createForm(new VacancyType(), $vacancy, array(
                    'method' => 'POST',
                    'attr' => array(
                        'class' => 'form-horizontal center'
                    )
                ));
                $vacancyEditForm->remove('file');
                $vacancyEditForm->handleRequest($request);

                if ($vacancyEditForm->isValid()) {
                    try {
                        $this->saveEntityInstantly($vacancy);
                    } catch (\Exception $e) {
                        return $this->render(TwigTemplate::$TWIG_VACANCY_EDIT, array(
                            'message' => GenericMessage::$MESSAGE_ERROR_GENERAL,
                            'type' => 'E',
                            'form' => $vacancyEditForm->createView(),
                            $this->KEY_NOTIFICATION_LIST => $notificationList
                        ));
                    }

                    return $this->redirect($this->generateUrl(RouteName::$ROUTE_VACANCY_DETAIL, array(
                        'vacancyId' => $vacancyId,
                        'type' => 'S',
                        'message' => VacancyMessage::$MESSAGE_VACANCY_UPDATE_SUCCESS
                    )));
                }

                return $this->render(TwigTemplate::$TWIG_VACANCY_EDIT, array(
                    'form' => $vacancyEditForm->createView(),
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

    public function editVacancyImageAction(Request $request, $vacancyId) {
        $authenticatedUser = $this->authenticateUser();
        if ($authenticatedUser) {
            $vacancy = $this->findEntityById(RepositoryName::$REPOSITORY_VACANCY, $vacancyId);
            $notificationList = $this->getNotificationList($authenticatedUser->getId());
            $vacancyImageUploadForm = $this->createFormBuilder($vacancy)
                ->add('file', 'file')
                ->getForm();

            $vacancyImageUploadForm->handleRequest($request);
            if ($vacancyImageUploadForm->isValid()) {
                try {
                    $vacancy->upload();
                } catch (\Exception $e) {
                    echo $e;
                }
                $vacancy->setImagepath($vacancy->getWebPath());
                $this->saveEntityInstantly($vacancy);

                return $this->redirect(
                    $this->generateUrl(RouteName::$ROUTE_VACANCY_DETAIL, array(
                            'vacancyId' => $vacancy->getId(),
                            'type' => 'S',
                            'message' => "Successfully updated your Image"
                        )
                    )
                );
            }

            return $this->render(TwigTemplate::$TWIG_VACANCY_PHOTO_EDIT, array(
                'vacancy' => $vacancy,
                'form' => $vacancyImageUploadForm->createView(),
                $this->KEY_NOTIFICATION_LIST => $notificationList
            ));
        }
        return $this->redirect($this->generateUrl(RouteName::$ROUTE_LOGIN));
    }
}