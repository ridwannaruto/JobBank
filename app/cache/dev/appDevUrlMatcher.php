<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * appDevUrlMatcher
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appDevUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
{
    /**
     * Constructor.
     */
    public function __construct(RequestContext $context)
    {
        $this->context = $context;
    }

    public function match($pathinfo)
    {
        $allow = array();
        $pathinfo = rawurldecode($pathinfo);
        $context = $this->context;
        $request = $this->request;

        if (0 === strpos($pathinfo, '/_')) {
            // _wdt
            if (0 === strpos($pathinfo, '/_wdt') && preg_match('#^/_wdt/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => '_wdt')), array (  '_controller' => 'web_profiler.controller.profiler:toolbarAction',));
            }

            if (0 === strpos($pathinfo, '/_profiler')) {
                // _profiler_home
                if (rtrim($pathinfo, '/') === '/_profiler') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', '_profiler_home');
                    }

                    return array (  '_controller' => 'web_profiler.controller.profiler:homeAction',  '_route' => '_profiler_home',);
                }

                if (0 === strpos($pathinfo, '/_profiler/search')) {
                    // _profiler_search
                    if ($pathinfo === '/_profiler/search') {
                        return array (  '_controller' => 'web_profiler.controller.profiler:searchAction',  '_route' => '_profiler_search',);
                    }

                    // _profiler_search_bar
                    if ($pathinfo === '/_profiler/search_bar') {
                        return array (  '_controller' => 'web_profiler.controller.profiler:searchBarAction',  '_route' => '_profiler_search_bar',);
                    }

                }

                // _profiler_purge
                if ($pathinfo === '/_profiler/purge') {
                    return array (  '_controller' => 'web_profiler.controller.profiler:purgeAction',  '_route' => '_profiler_purge',);
                }

                if (0 === strpos($pathinfo, '/_profiler/i')) {
                    // _profiler_info
                    if (0 === strpos($pathinfo, '/_profiler/info') && preg_match('#^/_profiler/info/(?P<about>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_info')), array (  '_controller' => 'web_profiler.controller.profiler:infoAction',));
                    }

                    // _profiler_import
                    if ($pathinfo === '/_profiler/import') {
                        return array (  '_controller' => 'web_profiler.controller.profiler:importAction',  '_route' => '_profiler_import',);
                    }

                }

                // _profiler_export
                if (0 === strpos($pathinfo, '/_profiler/export') && preg_match('#^/_profiler/export/(?P<token>[^/\\.]++)\\.txt$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_export')), array (  '_controller' => 'web_profiler.controller.profiler:exportAction',));
                }

                // _profiler_phpinfo
                if ($pathinfo === '/_profiler/phpinfo') {
                    return array (  '_controller' => 'web_profiler.controller.profiler:phpinfoAction',  '_route' => '_profiler_phpinfo',);
                }

                // _profiler_search_results
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/search/results$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_search_results')), array (  '_controller' => 'web_profiler.controller.profiler:searchResultsAction',));
                }

                // _profiler
                if (preg_match('#^/_profiler/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler')), array (  '_controller' => 'web_profiler.controller.profiler:panelAction',));
                }

                // _profiler_router
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/router$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_router')), array (  '_controller' => 'web_profiler.controller.router:panelAction',));
                }

                // _profiler_exception
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/exception$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_exception')), array (  '_controller' => 'web_profiler.controller.exception:showAction',));
                }

                // _profiler_exception_css
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/exception\\.css$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_exception_css')), array (  '_controller' => 'web_profiler.controller.exception:cssAction',));
                }

            }

            if (0 === strpos($pathinfo, '/_configurator')) {
                // _configurator_home
                if (rtrim($pathinfo, '/') === '/_configurator') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', '_configurator_home');
                    }

                    return array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::checkAction',  '_route' => '_configurator_home',);
                }

                // _configurator_step
                if (0 === strpos($pathinfo, '/_configurator/step') && preg_match('#^/_configurator/step/(?P<index>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_configurator_step')), array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::stepAction',));
                }

                // _configurator_final
                if ($pathinfo === '/_configurator/final') {
                    return array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::finalAction',  '_route' => '_configurator_final',);
                }

            }

        }

        // user_home
        if ($pathinfo === '/home') {
            return array (  '_controller' => 'Bundle\\CoreBundle\\Controller\\HomeController::indexAction',  '_route' => 'user_home',);
        }

        if (0 === strpos($pathinfo, '/log')) {
            // auth_login
            if ($pathinfo === '/login') {
                return array (  '_controller' => 'Bundle\\CoreBundle\\Controller\\AuthenticationController::loginUserAction',  '_route' => 'auth_login',);
            }

            // auth_logout
            if ($pathinfo === '/logout') {
                return array (  '_controller' => 'Bundle\\CoreBundle\\Controller\\AuthenticationController::logoutUserAction',  '_route' => 'auth_logout',);
            }

        }

        // user_register
        if ($pathinfo === '/register') {
            return array (  '_controller' => 'Bundle\\CoreBundle\\Controller\\AuthenticationController::registerUserAction',  '_route' => 'user_register',);
        }

        // auth_email_verification
        if (0 === strpos($pathinfo, '/activate') && preg_match('#^/activate/(?P<verification>[^/]++)/(?P<email>[^/]++)$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'auth_email_verification')), array (  '_controller' => 'Bundle\\CoreBundle\\Controller\\AuthenticationController::verifyEmailAction',));
        }

        // auth_delete_confirmation
        if (0 === strpos($pathinfo, '/delete') && preg_match('#^/delete/(?P<verification>[^/]++)/(?P<email>[^/]++)$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'auth_delete_confirmation')), array (  '_controller' => 'Bundle\\CoreBundle\\Controller\\AuthenticationController::deleteConfirmationAction',));
        }

        // news_feed
        if ($pathinfo === '/newsfeed') {
            return array (  '_controller' => 'CoreBundle:News:news',  '_route' => 'news_feed',);
        }

        // user_approve
        if (0 === strpos($pathinfo, '/activate') && preg_match('#^/activate/(?P<userId>[^/]++)$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'user_approve')), array (  '_controller' => 'Bundle\\CoreBundle\\Controller\\AuthenticationController::activateUserAction',));
        }

        // user_reject
        if (0 === strpos($pathinfo, '/reject') && preg_match('#^/reject/(?P<userId>[^/]++)$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'user_reject')), array (  '_controller' => 'Bundle\\CoreBundle\\Controller\\AuthenticationController::rejectUserAction',));
        }

        // comment_new
        if (rtrim($pathinfo, '/') === '') {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', 'comment_new');
            }

            return array (  '_controller' => 'Bundle\\CommentBundle\\Controller\\CommentCreateController::newCommentAction',  '_route' => 'comment_new',);
        }

        // comment_delete
        if (0 === strpos($pathinfo, '/deleteComment') && preg_match('#^/deleteComment/(?P<commentId>[^/]++)$#s', $pathinfo, $matches)) {
            if ($this->context->getMethod() != 'POST') {
                $allow[] = 'POST';
                goto not_comment_delete;
            }

            return $this->mergeDefaults(array_replace($matches, array('_route' => 'comment_delete')), array (  '_controller' => 'Bundle\\CommentBundle\\Controller\\CommentDeleteController::deleteCommentAction',));
        }
        not_comment_delete:

        // checkRegisterEmail
        if ($pathinfo === '/check') {
            return array (  '_controller' => 'Bundle\\NotificationBundle\\Controller\\NotificationController::indexAction',  '_route' => 'checkRegisterEmail',);
        }

        // notification_see
        if (0 === strpos($pathinfo, '/home') && preg_match('#^/home/(?P<notificationId>[^/]++)$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'notification_see')), array (  '_controller' => 'Bundle\\NotificationBundle\\Controller\\NotificationController::seenAction',));
        }

        // allnotification
        if ($pathinfo === '/allnotifications') {
            return array (  '_controller' => 'Bundle\\NotificationBundle\\Controller\\NotificationController::showAllAction',  '_route' => 'allnotification',);
        }

        // project_detail_notification
        if (0 === strpos($pathinfo, '/projectdetails') && preg_match('#^/projectdetails/(?P<projectId>[^/]++)/(?P<notificationId>[^/]++)$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'project_detail_notification')), array (  '_controller' => 'Bundle\\NotificationBundle\\Controller\\NotificationController::projectNotificationAction',));
        }

        // task_detail_notification
        if (0 === strpos($pathinfo, '/taskdetail') && preg_match('#^/taskdetail/(?P<taskId>[^/]++)/(?P<notificationId>[^/]++)$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'task_detail_notification')), array (  '_controller' => 'Bundle\\NotificationBundle\\Controller\\NotificationController::taskNotificationAction',));
        }

        if (0 === strpos($pathinfo, '/project')) {
            // project_index
            if ($pathinfo === '/project/index') {
                return array (  '_controller' => 'Bundle\\ProjectBundle\\Controller\\ProjectListController::viewListAction',  '_route' => 'project_index',);
            }

            // project_detail
            if (0 === strpos($pathinfo, '/project/view') && preg_match('#^/project/view/(?P<projectId>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'project_detail')), array (  '_controller' => 'Bundle\\ProjectBundle\\Controller\\ProjectViewController::viewAction',));
            }

            // project_new
            if ($pathinfo === '/project/new') {
                return array (  '_controller' => 'Bundle\\ProjectBundle\\Controller\\ProjectCreateController::newProjectAction',  '_route' => 'project_new',);
            }

            // project_edit
            if (0 === strpos($pathinfo, '/project/edit') && preg_match('#^/project/edit/(?P<projectId>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'project_edit')), array (  '_controller' => 'Bundle\\ProjectBundle\\Controller\\ProjectUpdateController::editProjectAction',));
            }

            // project_delete
            if (0 === strpos($pathinfo, '/project/delete') && preg_match('#^/project/delete/(?P<projectId>[^/]++)$#s', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_project_delete;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'project_delete')), array (  '_controller' => 'Bundle\\ProjectBundle\\Controller\\ProjectDeleteController::deleteProjectAction',));
            }
            not_project_delete:

            // project_complete
            if (0 === strpos($pathinfo, '/project/complete') && preg_match('#^/project/complete/(?P<projectId>[^/]++)$#s', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_project_complete;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'project_complete')), array (  '_controller' => 'Bundle\\ProjectBundle\\Controller\\ProjectUpdateController::completeAction',));
            }
            not_project_complete:

        }

        if (0 === strpos($pathinfo, '/task')) {
            // task_index
            if ($pathinfo === '/task/index') {
                return array (  '_controller' => 'Bundle\\TaskBundle\\Controller\\TaskListController::viewListAction',  '_route' => 'task_index',);
            }

            // task_detail
            if (0 === strpos($pathinfo, '/task/details') && preg_match('#^/task/details/(?P<taskId>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'task_detail')), array (  '_controller' => 'Bundle\\TaskBundle\\Controller\\TaskViewController::viewAction',));
            }

            // task_new
            if ($pathinfo === '/task/new') {
                return array (  '_controller' => 'Bundle\\TaskBundle\\Controller\\TaskCreateController::newTaskAction',  '_route' => 'task_new',);
            }

            // task_edit
            if (0 === strpos($pathinfo, '/task/edit') && preg_match('#^/task/edit/(?P<taskId>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'task_edit')), array (  '_controller' => 'Bundle\\TaskBundle\\Controller\\TaskUpdateController::editTaskAction',));
            }

            // task_delete
            if (0 === strpos($pathinfo, '/task/delete') && preg_match('#^/task/delete/(?P<taskId>[^/]++)$#s', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_task_delete;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'task_delete')), array (  '_controller' => 'Bundle\\TaskBundle\\Controller\\TaskDeleteController::deleteTaskAction',));
            }
            not_task_delete:

            // task_feedback
            if (0 === strpos($pathinfo, '/task/feedback') && preg_match('#^/task/feedback/(?P<taskId>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'task_feedback')), array (  '_controller' => 'Bundle\\TaskBundle\\Controller\\TaskUpdateController::feedbackAction',));
            }

            // task_complete
            if (0 === strpos($pathinfo, '/task/complete') && preg_match('#^/task/complete/(?P<taskId>[^/]++)$#s', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_task_complete;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'task_complete')), array (  '_controller' => 'Bundle\\TaskBundle\\Controller\\TaskUpdateController::completeTaskAction',));
            }
            not_task_complete:

        }

        // user_profile
        if (0 === strpos($pathinfo, '/profile') && preg_match('#^/profile/(?P<userId>[^/]++)$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'user_profile')), array (  '_controller' => 'Bundle\\UserBundle\\Controller\\UserProfileController::viewProfileAction',));
        }

        // change_password
        if ($pathinfo === '/changepassword') {
            return array (  '_controller' => 'Bundle\\UserBundle\\Controller\\UserAccountController::changePasswordAction',  '_route' => 'change_password',);
        }

        // forgot_password
        if ($pathinfo === '/forgotpassword') {
            return array (  '_controller' => 'Bundle\\UserBundle\\Controller\\UserAccountController::resetPasswordAction',  '_route' => 'forgot_password',);
        }

        // reset_password
        if (preg_match('#^/(?P<userId>[^/]++)/resetpassword$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'reset_password')), array (  '_controller' => 'Bundle\\UserBundle\\Controller\\UserAccountController::resetPasswordAction',));
        }

        // profile_edit
        if ($pathinfo === '/editprofile') {
            return array (  '_controller' => 'Bundle\\UserBundle\\Controller\\UserProfileController::editProfileAction',  '_route' => 'profile_edit',);
        }

        // profile_picture
        if ($pathinfo === '/profilepicture') {
            return array (  '_controller' => 'Bundle\\UserBundle\\Controller\\UserProfileController::updatePictureAction',  '_route' => 'profile_picture',);
        }

        // volunteer_list
        if ($pathinfo === '/volunteer/list') {
            return array (  '_controller' => 'Bundle\\UserBundle\\Controller\\UserListController::viewListAction',  '_route' => 'volunteer_list',);
        }

        // department
        if (0 === strpos($pathinfo, '/pillar') && preg_match('#^/pillar/(?P<pillarName>[^/]++)$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'department')), array (  '_controller' => 'UserBundle:Department:detail',));
        }

        // bundle_vacancy_homepage
        if (0 === strpos($pathinfo, '/hello') && preg_match('#^/hello/(?P<name>[^/]++)$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'bundle_vacancy_homepage')), array (  '_controller' => 'Bundle\\VacancyBundle\\Controller\\DefaultController::indexAction',));
        }

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
    }
}
