<?php

namespace Bundle\CommentBundle\Messages;



 class CommentMessage {

     private static $KEY_MESSAGE_TYPE = 'type';
     private static $KEY_MESSAGE_CONTENT = 'message';
     private static $KEY_MESSAGE_DETAILS = 'details';

     public static $MESSAGE_COMMENT_ADD_SUCCESS = 'successfully added your comment';
     public static $MESSAGE_COMMENT_DELETE_SUCCESS = 'successfully deleted your comment';
}