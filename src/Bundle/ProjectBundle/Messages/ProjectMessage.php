<?php

namespace Bundle\ProjectBundle\Messages;



 class ProjectMessage {

     private static $KEY_MESSAGE_TYPE = 'type';
     private static $KEY_MESSAGE_CONTENT = 'message';
     private static $KEY_MESSAGE_DETAILS = 'details';

     public static $MESSAGE_PROJECT_NOT_FOUND = " Project doesn't exists";

     public static $MESSAGE_PROJECT_APPOINTED =  "Congratulations! You have been appointed as a Project Manager for a new Project";

     public static $MESSAGE_PROJECT_CREATE_SUCCESS = "successfully created new project and notified ";
     public static $MESSAGE_PROJECT_UPDATE_SUCCESS = "successfully updated new details and notified " ;
     public static $MESSAGE_PROJECT_COMPLETED =  " successfully saved changes and notified user";
}