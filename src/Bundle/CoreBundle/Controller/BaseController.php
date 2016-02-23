<?php

namespace Bundle\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Bundle\CoreBundle\Entity\Confirmation;
use Symfony\Component\HttpFoundation\Session\Session;
use Bundle\CoreBundle\Values\RepositoryName;

abstract class BaseController extends Controller{

    /* Session attribute Keys */
    protected $SESSION_KEY_USER_ID = "user_id";
    protected $SESSION_KEY_USERNAME = "username";
    protected $SESSION_KEY_FULL_NAME = "full_name";
    protected $SESSION_KEY_FIRST_NAME = "first_name";
    protected $SESSION_KEY_ACCESS_LEVEL = "access_level";
    protected $SESSION_KEY_PHOTO = "photo_path";
    protected $SESSION_KEY_DEPARTMENT = "department";

    /* Reference attribute Keys */
    protected $KEY_ID = "id";
    protected $KEY_USERNAME = "username";
    protected $KEY_PASSWORD = "password";
    protected $KEY_FULL_NAME = "full_name";
    protected $KEY_FIRST_NAME = "first_name";
    protected $KEY_USER_ID = "user_id";
    protected $KEY_EMAIL = 'email';
    protected $KEY_NOTIFICATION_LIST = 'notificationList';
    protected $KEY_TASK_LIST = 'taskList';



    /* Default Values */
    protected $DEFAULT_PHOTO_PATH ='/web/bundles/User/Photo/default.jpg';


    /* User Roles */
    protected $USER_ROLE_ADMIN = 'Admin';
    protected $USER_ROLE_HEAD = 'Head';
    protected $USER_ROLE_VOLUNTEER = 'Volunteer';

    /*Status Codes */
    protected $STATUS_USER_REGISTERED = 0;
    protected $STATUS_USER_VERIFIED = 1;
    protected $STATUS_USER_ACTIVE = 2;


    protected function getEntityManager(){
        return $this->getDoctrine()->getManager();
    }


    protected function authenticateUser() {
        $session = $this->getRequest()->getSession();
        $repository = $this->getEntityManager()->getRepository(RepositoryName::$REPOSITORY_USER);
        $id = $session->get($this->SESSION_KEY_USER_ID);
        $user = $repository->findOneBy(array($this->KEY_ID => $id));
        if ($user) {
            return $user;
        } else {
            return false;
        }
    }

    protected function findEntityById($repositoryName,$entityId){
        return $this->getEntityManager()->getRepository($repositoryName)->find($entityId);
    }
    protected function findOneEntity($repositoryName,$searchParams){
        $repository = $this->getEntityManager()->getRepository($repositoryName);
        return $repository->findOneBy($searchParams);
    }

    protected function findUniqueEntities($repositoryName,$searchParams){
        $repository = $this->getEntityManager()->getRepository($repositoryName);
        return $repository->findBy($searchParams);
    }

    protected function findAllEntities($repositoryName){
        $repository = $this->getEntityManager()->getRepository($repositoryName);
        return $repository->findAll();
    }

    protected function saveEntityInstantly($entity){
        $this->getEntityManager()->persist($entity);
        $this->getEntityManager()->flush();
    }

    protected function removeEntity($entity){
        $this->getEntityManager()->remove($entity);
        $this->getEntityManager()->flush();
    }

    protected function getRepository($repositoryName){
        return $this->getEntityManager()->getRepository($repositoryName);
    }

    protected function getNotificationList($userId){
        $notificationRepository = $this->getRepository(RepositoryName::$REPOSITORY_NOTIFICATION);
        $notificationQuery = $notificationRepository->createQueryBuilder('p')
            ->where('p.userid = :id AND p.seen = 0')
            ->setParameter('id', $userId)
            ->setMaxResults(10)
            ->orderBy('p.id', 'DESC')
            ->getQuery();
        return $notificationQuery->getResult();
    }


}