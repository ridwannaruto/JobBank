<?php

namespace Bundle\TaskBundle\Messages;



 class TaskMessage {

     private static $KEY_MESSAGE_TYPE = 'type';
     private static $KEY_MESSAGE_CONTENT = 'message';
     private static $KEY_MESSAGE_DETAILS = 'details';

     //quick messages
     public static $MESSAGE_TASK_NOT_FOUND = " Task doesn't exists";
     public static $MESSAGE_TASK_APPOINTED =  "Congratulations! You have been appointed as a Task Manager for a new Task";
     public static $MESSAGE_TASK_CREATE_SUCCESS = "successfully created new task and notified ";
     public static $MESSAGE_TASK_UPDATE_SUCCESS = "successfully updated new details and notified " ;
     public static $MESSAGE_TASK_COMPLETED =  " successfully saved changes and notified user";

     //notification messages

}