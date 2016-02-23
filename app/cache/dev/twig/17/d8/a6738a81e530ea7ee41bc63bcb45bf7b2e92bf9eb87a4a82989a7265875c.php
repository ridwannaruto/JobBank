<?php

/* CoreBundle:Base:base.html.twig */
class __TwigTemplate_17d8a6738a81e530ea7ee41bc63bcb45bf7b2e92bf9eb87a4a82989a7265875c extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'additional_css' => array($this, 'block_additional_css'),
            'toolbar' => array($this, 'block_toolbar'),
            'notificationList' => array($this, 'block_notificationList'),
            'dashboard' => array($this, 'block_dashboard'),
            'content' => array($this, 'block_content'),
            'delete' => array($this, 'block_delete'),
            'additional_javascripts' => array($this, 'block_additional_javascripts'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>

<html lang=\"en\">
<head>

    <meta charset=\"utf-8\">
    <link rel=\"shortcut icon\" href=\"";
        // line 7
        echo twig_escape_filter($this->env, (isset($context["client_icon"]) ? $context["client_icon"] : $this->getContext($context, "client_icon")), "html", null, true);
        echo "\">
    <title>Volma | ";
        // line 8
        echo twig_escape_filter($this->env, (isset($context["client_name"]) ? $context["client_name"] : $this->getContext($context, "client_name")), "html", null, true);
        echo "</title>
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
    <meta name=\"description\" content=\"Volunteer Management System for Moraspirit\">
    <meta name=\"author\" content=\"Ridwan Shariffdeen\">

    <!-- The styles -->
    <link id=\"bs-css\" href=";
        // line 14
        echo twig_escape_filter($this->env, (isset($context["app_theme"]) ? $context["app_theme"] : $this->getContext($context, "app_theme")), "html", null, true);
        echo " rel=\"stylesheet\">
    <style type=\"text/css\">
        body {
            padding-bottom: 40px;
        }

        .sidebar-nav {
            padding: 9px 0;
        }
    </style>
    <link href=";
        // line 24
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/core/css/bootstrap-responsive.css"), "html", null, true);
        echo " rel=\"stylesheet\">
    <link href=";
        // line 25
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/core/css/charisma-app.css"), "html", null, true);
        echo " rel=\"stylesheet\">
    <link href=";
        // line 26
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/core/css/jquery-ui-1.8.21.custom.css"), "html", null, true);
        echo " rel=\"stylesheet\">
    <link href=";
        // line 27
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/core/css/fullcalendar.css"), "html", null, true);
        echo " rel='stylesheet'>
    <link href=";
        // line 28
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/core/css/fullcalendar.print.css"), "html", null, true);
        echo " rel='stylesheet' media='print'>
    <link href=";
        // line 29
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/core/css/chosen.css"), "html", null, true);
        echo " rel='stylesheet'>
    <link href=";
        // line 30
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/core/css/uniform.default.css"), "html", null, true);
        echo " rel='stylesheet'>
    <link href=";
        // line 31
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/core/css/colorbox.css"), "html", null, true);
        echo " rel='stylesheet'>
    <link href=";
        // line 32
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/core/css/jquery.cleditor.css"), "html", null, true);
        echo " rel='stylesheet'>
    <link href=";
        // line 33
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/core/css/jquery.noty.css"), "html", null, true);
        echo " rel='stylesheet'>
    <link href=";
        // line 34
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/core/css/noty_theme_default.css"), "html", null, true);
        echo " rel='stylesheet'>
    <link href=";
        // line 35
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/core/css/elfinder.min.css"), "html", null, true);
        echo " rel='stylesheet'>
    <link href=";
        // line 36
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/core/css/elfinder.theme.css"), "html", null, true);
        echo " rel='stylesheet'>
    <link href=";
        // line 37
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/core/css/jquery.iphone.toggle.css"), "html", null, true);
        echo " rel='stylesheet'>
    <link href=";
        // line 38
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/core/css/opa-icons.css"), "html", null, true);
        echo " rel='stylesheet'>
    <link href=";
        // line 39
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/core/css/uploadify.css"), "html", null, true);
        echo " rel='stylesheet'>


    ";
        // line 42
        $this->displayBlock('additional_css', $context, $blocks);
        // line 44
        echo "    <!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src=\"http://html5shim.googlecode.com/svn/trunk/html5.js\"></script>
    <![endif]-->


</head>

<body>
<!-- messages -->
";
        // line 54
        if (array_key_exists("type", $context)) {
            // line 55
            if (((isset($context["type"]) ? $context["type"] : $this->getContext($context, "type")) == "E")) {
                // line 56
                echo "    <script type=\"text/javascript\">
        window.onload = function () {
            noty(jQuery.parseJSON('{\"text\":\"";
                // line 58
                echo twig_escape_filter($this->env, (isset($context["message"]) ? $context["message"] : $this->getContext($context, "message")), "html", null, true);
                echo "\",\"layout\":\"top\",\"type\":\"error\"}'));

        }
    </script>
";
            }
            // line 63
            echo "
";
            // line 64
            if (((isset($context["type"]) ? $context["type"] : $this->getContext($context, "type")) == "S")) {
                // line 65
                echo "    <script type=\"text/javascript\">
        window.onload = function () {
            noty(jQuery.parseJSON('{\"text\":\"";
                // line 67
                echo twig_escape_filter($this->env, (isset($context["message"]) ? $context["message"] : $this->getContext($context, "message")), "html", null, true);
                echo "\",\"layout\":\"top\",\"type\":\"success\"}'));

        }
    </script>
";
            }
        }
        // line 73
        echo "
";
        // line 74
        $this->displayBlock('toolbar', $context, $blocks);
        // line 283
        echo "
";
        // line 284
        $this->displayBlock('dashboard', $context, $blocks);
        // line 316
        echo "<!-- left menu ends -->

<div class=\"container-fluid\">
    <div class=\"row-fluid\">


        <noscript>
            <div class=\"alert alert-block span10\">
                <h4 class=\"alert-heading\">Warning!</h4>

                <p>You need to have <a href=\"http://en.wikipedia.org/wiki/JavaScript\" target=\"_blank\">JavaScript</a>
                    enabled to use this site.</p>
            </div>
        </noscript>


        ";
        // line 332
        $this->displayBlock('content', $context, $blocks);
        // line 334
        echo "
        <div class=\"modal hide fade\" id=\"comment\">
            <div class=\"modal-header\">
                <button type=\"button\" class=\"close\" data-dismiss=\"modal\">×</button>
                <h3>Confirm</h3>
            </div>
            <div class=\"modal-body\">
                <p align=\"center\">Are you sure you want to delete this Notification?
                </p>


            </div>
            <div class=\"modal-footer\">

                <form action=\"empty\" id=\"continue-form\" method=\"POST\">
                    <input name=\"id\" id=\"del-id\" type=\"hidden\" value=\"empty\"/>
                    <a href=\"#\" class=\"btn\" data-dismiss=\"modal\">Close</a>
                    <input type=\"submit\" class=\"btn btn-primary\" value=\"continue\">
                </form>

            </div>
        </div>

    </div>
</div>

";
        // line 360
        $this->displayBlock('delete', $context, $blocks);
        // line 362
        echo "
<hr>
<footer>
    <p class=\"pull-left\"><strong>";
        // line 365
        echo twig_escape_filter($this->env, (isset($context["client_name"]) ? $context["client_name"] : $this->getContext($context, "client_name")), "html", null, true);
        echo " </strong>&copy; ";
        echo twig_escape_filter($this->env, (isset($context["copy_right_year"]) ? $context["copy_right_year"] : $this->getContext($context, "copy_right_year")), "html", null, true);
        echo "
</footer>

</div><!--/.fluid-container-->

<!-- external javascript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->

<!-- jQuery -->
<script src=";
        // line 375
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/core/js/jquery-1.7.2.min.js"), "html", null, true);
        echo "></script>
<!-- jQuery UI -->
<script src=";
        // line 377
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/core/js/jquery-ui-1.8.21.custom.min.js"), "html", null, true);
        echo "></script>
<!-- transition / effect library -->
<script src=";
        // line 379
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/core/js/bootstrap-transition.js"), "html", null, true);
        echo "></script>
<!-- alert enhancer library -->
<script src=";
        // line 381
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/core/js/bootstrap-alert.js"), "html", null, true);
        echo "></script>
<!-- modal / dialog library -->
<script src=";
        // line 383
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/core/js/bootstrap-modal.js"), "html", null, true);
        echo "></script>
<!-- custom dropdown library -->
<script src=";
        // line 385
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/core/js/bootstrap-dropdown.js"), "html", null, true);
        echo "></script>
<!-- scrolspy library -->
<script src=";
        // line 387
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/core/js/bootstrap-scrollspy.js"), "html", null, true);
        echo "></script>
<!-- library for creating tabs -->
<script src=";
        // line 389
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/core/js/bootstrap-tab.js"), "html", null, true);
        echo "></script>
<!-- library for advanced tooltip -->
<script src=";
        // line 391
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/core/js/bootstrap-tooltip.js"), "html", null, true);
        echo "></script>
<!-- popover effect library -->
<script src=";
        // line 393
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/core/js/bootstrap-popover.js"), "html", null, true);
        echo "></script>
<!-- button enhancer library -->
<script src=";
        // line 395
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/core/js/bootstrap-button.js"), "html", null, true);
        echo "></script>
<!-- accordion library (optional, not used in demo) -->
<script src=";
        // line 397
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/core/js/bootstrap-collapse.js"), "html", null, true);
        echo "></script>
<!-- carousel slideshow library (optional, not used in demo) -->
<script src=";
        // line 399
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/core/js/bootstrap-carousel.js"), "html", null, true);
        echo "></script>
<!-- autocomplete library -->
<script src=";
        // line 401
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/core/js/bootstrap-typeahead.js"), "html", null, true);
        echo "></script>
<!-- tour library -->
<script src=";
        // line 403
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/core/js/bootstrap-tour.js"), "html", null, true);
        echo "></script>
<!-- library for cookie management -->
<script src=";
        // line 405
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/core/js/jquery.cookie.js"), "html", null, true);
        echo "></script>
<!-- calander plugin -->
<script src=";
        // line 407
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/core/js/fullcalendar.min.js"), "html", null, true);
        echo "></script>
<!-- data table plugin -->
<script src=";
        // line 409
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/core/js/jquery.dataTables.min.js"), "html", null, true);
        echo "></script>

<!-- chart libraries start -->
<script src=";
        // line 412
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/core/js/excanvas.js"), "html", null, true);
        echo "></script>
<script src=";
        // line 413
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/core/js/jquery.flot.min.js"), "html", null, true);
        echo "></script>
<script src=";
        // line 414
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/core/js/jquery.flot.pie.min.js"), "html", null, true);
        echo "></script>
<script src=";
        // line 415
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/core/js/jquery.flot.stack.js"), "html", null, true);
        echo "></script>
<script src=";
        // line 416
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/core/js/jquery.flot.resize.min.js"), "html", null, true);
        echo "></script>
<!-- chart libraries end -->

<!-- select or dropdown enhancer -->
<script src=";
        // line 420
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/core/js/jquery.chosen.min.js"), "html", null, true);
        echo "></script>
<!-- checkbox, radio, and file input styler -->
<script src=";
        // line 422
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/core/js/jquery.uniform.min.js"), "html", null, true);
        echo "></script>
<!-- plugin for gallery image view -->
<script src=";
        // line 424
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/core/js/jquery.colorbox.min.js"), "html", null, true);
        echo "></script>
<!-- rich text editor library -->
<script src=";
        // line 426
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/core/js/jquery.cleditor.min.js"), "html", null, true);
        echo "></script>
<!-- notification plugin -->
<script src=";
        // line 428
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/core/js/jquery.noty.js"), "html", null, true);
        echo "></script>
<!-- file manager library -->
<script src=";
        // line 430
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/core/js/jquery.elfinder.min.js"), "html", null, true);
        echo "></script>
<!-- star rating plugin -->
<script src=";
        // line 432
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/core/js/jquery.raty.min.js"), "html", null, true);
        echo "></script>
<!-- for iOS style toggle switch -->
<script src=";
        // line 434
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/core/js/jquery.iphone.toggle.js"), "html", null, true);
        echo "></script>
<!-- autogrowing textarea plugin -->
<script src=";
        // line 436
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/core/js/jquery.autogrow-textarea.js"), "html", null, true);
        echo "></script>
<!-- multiple file upload plugin -->
<script src=";
        // line 438
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/core/js/jquery.uploadify-3.1.min.js"), "html", null, true);
        echo "></script>
<!-- history.js for cross-browser state change on ajax -->
<script src=";
        // line 440
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/core/js/jquery.history.js"), "html", null, true);
        echo "></script>
<!-- application script for Charisma demo -->
<script src=";
        // line 442
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/core/js/charisma.js"), "html", null, true);
        echo "></script>

";
        // line 444
        $this->displayBlock('additional_javascripts', $context, $blocks);
        // line 446
        echo "

</body>
</html>";
    }

    // line 42
    public function block_additional_css($context, array $blocks = array())
    {
        // line 43
        echo "    ";
    }

    // line 74
    public function block_toolbar($context, array $blocks = array())
    {
        // line 75
        echo "<!-- topbar starts -->
<div class=\"navbar\">
    <div class=\"navbar-inner\">
        <div class=\"container-fluid\">
            <a class=\"btn btn-navbar\" data-toggle=\"collapse\"
               data-target=\".top-nav.nav-collapse,.sidebar-nav.nav-collapse\">
                <span class=\"icon-bar\"></span>
                <span class=\"icon-bar\"></span>
                <span class=\"icon-bar\"></span>
            </a>

            <table width=\"100%\">
                <tr>
                    <td width=\"5%\">
                        <img class=\"center\" src=\"";
        // line 89
        echo twig_escape_filter($this->env, (isset($context["client_icon"]) ? $context["client_icon"] : $this->getContext($context, "client_icon")), "html", null, true);
        echo " \" width=\"40px\"/>

                    </td>
                    <td width=\"64%\">
                        <div class=\"top-nav nav-collapse\">
                            <ul class=\"nav\">
                                <li>
                                    <form class=\"navbar-search pull-left\">
                                        <input placeholder=\"type your keyword to search\" class=\"search-query span7\"
                                               name=\"query\" type=\"text\">&nbsp;&nbsp;&nbsp;<i class=\"icon-search\"></i>
                                    </form>
                                </li>
                            </ul>
                        </div>
                        <!--/.nav-collapse -->
                    </td>
                    <td width=\"22%\">
                        <div class=\"pull-right\">
                            ";
        // line 107
        if ($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "session"), "has", array(0 => "user_id"), "method")) {
            // line 108
            echo "
                                <div class=\"btn-group pull-right\">
                                    <a data-toggle=\"dropdown\" href=\"#\">
                                        <button class=\"btn btn-mini btn-round btn-info\"><i class=\"icon-user\"></i><span
                                                    class=\"hidden-phone\"> &nbsp;&nbsp;";
            // line 112
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "session"), "get", array(0 => "name"), "method"), "html", null, true);
            echo "</span>
                                        </button>

                                    </a>
                                    <ul class=\"dropdown-menu\">
                                        <li><a class=\"ajax-link\"
                                               href=\"";
            // line 118
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("user_profile", array("userId" => $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "session"), "get", array(0 => "user_id"), "method"))), "html", null, true);
            echo "\"><i
                                                        class=\"icon-user\"></i><span
                                                        class=\"hidden-tablet\"> Profile</span></a></li>
                                        <li><a class=\"ajax-link\" href=\"";
            // line 121
            echo $this->env->getExtension('routing')->getPath("change_password");
            echo "\"><i
                                                        class=\"icon-lock\"></i><span class=\"hidden-tablet\"> Change Password</span></a>
                                        </li>

                                        <li class=\"divider\"></li>
                                        <li><a href=\"";
            // line 126
            echo $this->env->getExtension('routing')->getPath("auth_logout");
            echo "\">Logout</a></li>
                                    </ul>
                                </div>
                            ";
            // line 129
            $this->displayBlock('notificationList', $context, $blocks);
            // line 266
            echo "
                            ";
        } else {
            // line 268
            echo "                                <a href=\"";
            echo $this->env->getExtension('routing')->getPath("auth_login");
            echo "\">
                                    <button class=\"btn btn-mini btn-success\"> Login</button>
                                </a>

                            ";
        }
        // line 273
        echo "                        </div>

                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>
<!-- topbar ends -->
";
    }

    // line 129
    public function block_notificationList($context, array $blocks = array())
    {
        // line 130
        echo "                                <div class=\"btn-group pull-right\">
                                    <a data-toggle=\"dropdown\" href=\"#\">
                                        <button class=\"btn btn-mini btn-round btn-info\"><i class=\"icon-bell\"></i>&nbsp;&nbsp;Notifications<span
                                                    class=\"hidden-phone\"> </span></button>

                                        ";
        // line 135
        $context["noOfNotification"] = 0;
        // line 136
        echo "                                        ";
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["notificationList"]) ? $context["notificationList"] : $this->getContext($context, "notificationList")));
        foreach ($context['_seq'] as $context["_key"] => $context["notification"]) {
            // line 137
            echo "                                            ";
            $context["noOfNotification"] = ((isset($context["noOfNotification"]) ? $context["noOfNotification"] : $this->getContext($context, "noOfNotification")) + 1);
            // line 138
            echo "                                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['notification'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 139
        echo "                                        ";
        if (((isset($context["noOfNotification"]) ? $context["noOfNotification"] : $this->getContext($context, "noOfNotification")) > 0)) {
            // line 140
            echo "                                            <span class=\"notification red\">";
            echo twig_escape_filter($this->env, (isset($context["noOfNotification"]) ? $context["noOfNotification"] : $this->getContext($context, "noOfNotification")), "html", null, true);
            echo "</span>
                                        ";
        }
        // line 142
        echo "                                    </a>
                                    <ul class=\"dropdown-menu span6 center\">
                                        <div class=\"row-fluid\">
                                            ";
        // line 145
        if (((isset($context["notificationList"]) ? $context["notificationList"] : $this->getContext($context, "notificationList")) != null)) {
            // line 146
            echo "                        <div class=\"box-content alerts\">
                            ";
            // line 147
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["notificationList"]) ? $context["notificationList"] : $this->getContext($context, "notificationList")));
            foreach ($context['_seq'] as $context["_key"] => $context["notification"]) {
                // line 148
                echo "


                                                ";
                // line 151
                if (($this->getAttribute((isset($context["notification"]) ? $context["notification"] : $this->getContext($context, "notification")), "type") == 4)) {
                    // line 152
                    echo "
                                                    <div class=\"alert alert-error\">
                                                        <button url=\"";
                    // line 154
                    echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("notification_see", array("notificationId" => $this->getAttribute((isset($context["notification"]) ? $context["notification"] : $this->getContext($context, "notification")), "id"))), "html", null, true);
                    echo "\"
                                                                id=\"";
                    // line 155
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["notification"]) ? $context["notification"] : $this->getContext($context, "notification")), "id"), "html", null, true);
                    echo "\" type=\"button\"
                                                                class=\" close btn-comment\">×
                                                        </button>
                                                        <div class=\"pull-right\">
                                                            ";
                    // line 159
                    echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["notification"]) ? $context["notification"] : $this->getContext($context, "notification")), "timestamp"), "Y-m-d H:i:s"), "html", null, true);
                    echo "
                                                        </div>

                                                        <strong><h5>";
                    // line 162
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["notification"]) ? $context["notification"] : $this->getContext($context, "notification")), "heading"), "html", null, true);
                    echo "</h5></strong>
                                                          ";
                    // line 163
                    if (($this->getAttribute((isset($context["notification"]) ? $context["notification"] : $this->getContext($context, "notification")), "task") == 0)) {
                        // line 164
                        echo "                                                <a href=\"";
                        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("project_detail_notification", array("projectId" => $this->getAttribute((isset($context["notification"]) ? $context["notification"] : $this->getContext($context, "notification")), "project"), "notificationId" => $this->getAttribute((isset($context["notification"]) ? $context["notification"] : $this->getContext($context, "notification")), "id"))), "html", null, true);
                        echo "\"><li>

                                            ";
                    } else {
                        // line 167
                        echo "                                                <a href=\"";
                        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("task_detail_notification", array("taskId" => $this->getAttribute((isset($context["notification"]) ? $context["notification"] : $this->getContext($context, "notification")), "task"), "notificationId" => $this->getAttribute((isset($context["notification"]) ? $context["notification"] : $this->getContext($context, "notification")), "id"))), "html", null, true);
                        echo "\"> <li>

                                            ";
                    }
                    // line 170
                    echo "                                                        ";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["notification"]) ? $context["notification"] : $this->getContext($context, "notification")), "details"), "html", null, true);
                    echo "
                                                        </a><br>
                                                    </div>
                                                    </a>

                                                ";
                }
                // line 176
                echo "
                                                ";
                // line 177
                if (($this->getAttribute((isset($context["notification"]) ? $context["notification"] : $this->getContext($context, "notification")), "type") == 3)) {
                    // line 178
                    echo "
                                                    <div class=\"alert alert-success\">
                                                        <button url=\"";
                    // line 180
                    echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("notification_see", array("notificationId" => $this->getAttribute((isset($context["notification"]) ? $context["notification"] : $this->getContext($context, "notification")), "id"))), "html", null, true);
                    echo "\"
                                                                id=\"";
                    // line 181
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["notification"]) ? $context["notification"] : $this->getContext($context, "notification")), "id"), "html", null, true);
                    echo "\" type=\"button\"
                                                                class=\" close btn-comment\">×
                                                        </button>
                                                        <div class=\"pull-right\">
                                                            ";
                    // line 185
                    echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["notification"]) ? $context["notification"] : $this->getContext($context, "notification")), "timestamp"), "Y-m-d H:i:s"), "html", null, true);
                    echo "
                                                        </div>
                                                        <strong><h5>";
                    // line 187
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["notification"]) ? $context["notification"] : $this->getContext($context, "notification")), "heading"), "html", null, true);
                    echo "</h5></strong>
                                                        ";
                    // line 188
                    if (($this->getAttribute((isset($context["notification"]) ? $context["notification"] : $this->getContext($context, "notification")), "task") == 0)) {
                        // line 189
                        echo "                                                        <a href=\"";
                        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("project_detail_notification", array("projectId" => $this->getAttribute((isset($context["notification"]) ? $context["notification"] : $this->getContext($context, "notification")), "project"), "notificationId" => $this->getAttribute((isset($context["notification"]) ? $context["notification"] : $this->getContext($context, "notification")), "id"))), "html", null, true);
                        echo "\"><li>

                                                                ";
                    } else {
                        // line 192
                        echo "                                                                <a href=\"";
                        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("task_detail_notification", array("taskId" => $this->getAttribute((isset($context["notification"]) ? $context["notification"] : $this->getContext($context, "notification")), "task"), "notificationId" => $this->getAttribute((isset($context["notification"]) ? $context["notification"] : $this->getContext($context, "notification")), "id"))), "html", null, true);
                        echo "\"> <li>

                                                                        ";
                    }
                    // line 195
                    echo "                                                        ";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["notification"]) ? $context["notification"] : $this->getContext($context, "notification")), "details"), "html", null, true);
                    echo "</a><br>


                                                    </div>
                                                    </a>
                                                ";
                }
                // line 201
                echo "
                                                ";
                // line 202
                if (($this->getAttribute((isset($context["notification"]) ? $context["notification"] : $this->getContext($context, "notification")), "type") == 2)) {
                    // line 203
                    echo "
                                                    <div class=\"alert alert-heading\">
                                                        <button url=\"";
                    // line 205
                    echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("notification_see", array("notificationId" => $this->getAttribute((isset($context["notification"]) ? $context["notification"] : $this->getContext($context, "notification")), "id"))), "html", null, true);
                    echo "\"
                                                                id=\"";
                    // line 206
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["notification"]) ? $context["notification"] : $this->getContext($context, "notification")), "id"), "html", null, true);
                    echo "\" type=\"button\"
                                                                class=\" close btn-comment\">×
                                                        </button>
                                                        <div class=\"pull-right\">
                                                            ";
                    // line 210
                    echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["notification"]) ? $context["notification"] : $this->getContext($context, "notification")), "timestamp"), "Y-m-d H:i:s"), "html", null, true);
                    echo "
                                                        </div>
                                                        <strong><h5>";
                    // line 212
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["notification"]) ? $context["notification"] : $this->getContext($context, "notification")), "heading"), "html", null, true);
                    echo "</h5></strong>
                                                        ";
                    // line 213
                    if (($this->getAttribute((isset($context["notification"]) ? $context["notification"] : $this->getContext($context, "notification")), "task") == 0)) {
                        // line 214
                        echo "                                                        <a href=\"";
                        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("project_detail_notification", array("projectId" => $this->getAttribute((isset($context["notification"]) ? $context["notification"] : $this->getContext($context, "notification")), "project"), "notificationId" => $this->getAttribute((isset($context["notification"]) ? $context["notification"] : $this->getContext($context, "notification")), "id"))), "html", null, true);
                        echo "\"><li>

                                                                ";
                    } else {
                        // line 217
                        echo "                                                                <a href=\"";
                        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("task_detail_notification", array("taskId" => $this->getAttribute((isset($context["notification"]) ? $context["notification"] : $this->getContext($context, "notification")), "task"), "notificationId" => $this->getAttribute((isset($context["notification"]) ? $context["notification"] : $this->getContext($context, "notification")), "id"))), "html", null, true);
                        echo "\"> <li>

                                                                        ";
                    }
                    // line 220
                    echo "                                                        ";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["notification"]) ? $context["notification"] : $this->getContext($context, "notification")), "details"), "html", null, true);
                    echo "</a><br>
                                                    </div>

                                                ";
                }
                // line 224
                echo "                                                ";
                if (($this->getAttribute((isset($context["notification"]) ? $context["notification"] : $this->getContext($context, "notification")), "type") == 1)) {
                    // line 225
                    echo "                                                    <div class=\"alert alert-info\">
                                                        <button url=\"";
                    // line 226
                    echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("notification_see", array("notificationId" => $this->getAttribute((isset($context["notification"]) ? $context["notification"] : $this->getContext($context, "notification")), "id"))), "html", null, true);
                    echo "\"
                                                                id=\"";
                    // line 227
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["notification"]) ? $context["notification"] : $this->getContext($context, "notification")), "id"), "html", null, true);
                    echo "\" type=\"button\"
                                                                class=\" close btn-comment\">×
                                                        </button>
                                                        <div class=\"pull-right\">
                                                            ";
                    // line 231
                    echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["notification"]) ? $context["notification"] : $this->getContext($context, "notification")), "timestamp"), "Y-m-d H:i:s"), "html", null, true);
                    echo "
                                                        </div>
                                                        <strong><h5>";
                    // line 233
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["notification"]) ? $context["notification"] : $this->getContext($context, "notification")), "heading"), "html", null, true);
                    echo "</h5></strong>
                                                        ";
                    // line 234
                    if (($this->getAttribute((isset($context["notification"]) ? $context["notification"] : $this->getContext($context, "notification")), "task") == 0)) {
                        // line 235
                        echo "                                                        <a href=\"";
                        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("project_detail_notification", array("projectId" => $this->getAttribute((isset($context["notification"]) ? $context["notification"] : $this->getContext($context, "notification")), "project"), "notificationId" => $this->getAttribute((isset($context["notification"]) ? $context["notification"] : $this->getContext($context, "notification")), "id"))), "html", null, true);
                        echo "\"><li>

                                                                ";
                    } else {
                        // line 238
                        echo "                                                                <a href=\"";
                        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("task_detail_notification", array("taskId" => $this->getAttribute((isset($context["notification"]) ? $context["notification"] : $this->getContext($context, "notification")), "task"), "notificationId" => $this->getAttribute((isset($context["notification"]) ? $context["notification"] : $this->getContext($context, "notification")), "id"))), "html", null, true);
                        echo "\"> <li>

                                                                        ";
                    }
                    // line 241
                    echo "                                                        ";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["notification"]) ? $context["notification"] : $this->getContext($context, "notification")), "details"), "html", null, true);
                    echo "
                                                                        </a>
                                                                <br>

                                                    </div>

                                                ";
                }
                // line 248
                echo "                                                </li>
                                            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['notification'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 250
            echo "                        </div>\t
                        ";
        } else {
            // line 252
            echo "                        <h5 align =\"center\">
                            no new notifications
                        </h5></a>
                        ";
        }
        // line 256
        echo "

                                        </div>
                                        <!--/span-->
                                        <li class=\"divider\"></li>
                                        <p align=\"center\"><a href=\"";
        // line 261
        echo $this->env->getExtension('routing')->getPath("allnotification");
        echo "\">see all</a></p>

                                    </ul>
                                </div>
                            ";
    }

    // line 284
    public function block_dashboard($context, array $blocks = array())
    {
        // line 285
        echo "
    <div class=\"span2 main-menu-span\">


        <div class=\"well nav-collapse sidebar-nav\">
            <p align=\"center\">
                <img src=\"";
        // line 291
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "session"), "get", array(0 => "photo"), "method"), "html", null, true);
        echo "\" width=\"150px\" height=\"150px\" style=\"border: 2px\">
                <br><br><strong>";
        // line 292
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "session"), "get", array(0 => "name"), "method"), "html", null, true);
        echo "</strong>
            </p>
            <ul class=\"nav nav-tabs nav-stacked main-menu\">

                <li class=\"nav-header hidden-tablet\">Dashboard</li>
                <li><a class=\"ajax-link\" href=\"";
        // line 297
        echo $this->env->getExtension('routing')->getPath("user_home");
        echo "\"><i class=\"icon-home\"></i><span
                                class=\"hidden-tablet\"> Home</span></a></li>

                ";
        // line 301
        echo "                                ";
        // line 302
        echo "
                <li><a class=\"ajax-link\" href=\"";
        // line 303
        echo $this->env->getExtension('routing')->getPath("project_index");
        echo "\"><i class=\"icon-edit\"></i><span
                                class=\"hidden-tablet\"> Projects</span></a></li>
                <li><a class=\"ajax-link\" href=\"";
        // line 305
        echo $this->env->getExtension('routing')->getPath("task_index");
        echo "\"><i class=\"icon-list-alt\"></i><span
                                class=\"hidden-tablet\"> Tasks</span></a></li>
                <li><a class=\"ajax-link\" href=\"";
        // line 307
        echo $this->env->getExtension('routing')->getPath("volunteer_list");
        echo "\"><i class=\"icon-user\"></i><span
                                class=\"hidden-tablet\"> Volunteers</span></a></li>


            </ul>
        </div>
        <!--/.well -->
    </div><!--/span-->
";
    }

    // line 332
    public function block_content($context, array $blocks = array())
    {
        // line 333
        echo "        ";
    }

    // line 360
    public function block_delete($context, array $blocks = array())
    {
    }

    // line 444
    public function block_additional_javascripts($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "CoreBundle:Base:base.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  919 => 444,  914 => 360,  910 => 333,  907 => 332,  894 => 307,  889 => 305,  884 => 303,  881 => 302,  879 => 301,  873 => 297,  865 => 292,  861 => 291,  853 => 285,  850 => 284,  841 => 261,  834 => 256,  828 => 252,  824 => 250,  817 => 248,  806 => 241,  799 => 238,  792 => 235,  790 => 234,  786 => 233,  781 => 231,  774 => 227,  770 => 226,  767 => 225,  764 => 224,  756 => 220,  749 => 217,  742 => 214,  740 => 213,  736 => 212,  731 => 210,  724 => 206,  720 => 205,  716 => 203,  714 => 202,  711 => 201,  701 => 195,  694 => 192,  687 => 189,  685 => 188,  681 => 187,  676 => 185,  669 => 181,  665 => 180,  661 => 178,  659 => 177,  656 => 176,  646 => 170,  639 => 167,  632 => 164,  630 => 163,  626 => 162,  620 => 159,  613 => 155,  609 => 154,  605 => 152,  603 => 151,  598 => 148,  594 => 147,  591 => 146,  589 => 145,  584 => 142,  578 => 140,  575 => 139,  569 => 138,  566 => 137,  561 => 136,  559 => 135,  552 => 130,  549 => 129,  536 => 273,  527 => 268,  523 => 266,  521 => 129,  515 => 126,  507 => 121,  501 => 118,  492 => 112,  486 => 108,  484 => 107,  463 => 89,  447 => 75,  444 => 74,  440 => 43,  437 => 42,  430 => 446,  428 => 444,  423 => 442,  418 => 440,  413 => 438,  408 => 436,  403 => 434,  398 => 432,  393 => 430,  388 => 428,  383 => 426,  378 => 424,  373 => 422,  368 => 420,  361 => 416,  357 => 415,  353 => 414,  349 => 413,  345 => 412,  339 => 409,  334 => 407,  329 => 405,  324 => 403,  319 => 401,  314 => 399,  309 => 397,  304 => 395,  299 => 393,  294 => 391,  289 => 389,  284 => 387,  279 => 385,  274 => 383,  269 => 381,  264 => 379,  259 => 377,  254 => 375,  239 => 365,  234 => 362,  232 => 360,  204 => 334,  202 => 332,  184 => 316,  182 => 284,  179 => 283,  177 => 74,  174 => 73,  165 => 67,  161 => 65,  159 => 64,  156 => 63,  148 => 58,  144 => 56,  142 => 55,  140 => 54,  128 => 44,  126 => 42,  120 => 39,  116 => 38,  112 => 37,  108 => 36,  104 => 35,  100 => 34,  96 => 33,  92 => 32,  88 => 31,  84 => 30,  80 => 29,  76 => 28,  72 => 27,  68 => 26,  64 => 25,  60 => 24,  47 => 14,  38 => 8,  34 => 7,  26 => 1,  91 => 37,  85 => 34,  67 => 20,  61 => 17,  58 => 16,  56 => 15,  52 => 14,  43 => 7,  40 => 6,  35 => 4,  30 => 2,);
    }
}
