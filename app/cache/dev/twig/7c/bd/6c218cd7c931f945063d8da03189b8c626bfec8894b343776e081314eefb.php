<?php

/* CoreBundle:Authentication:login.html.twig */
class __TwigTemplate_7cbd6c218cd7c931f945063d8da03189b8c626bfec8894b343776e081314eefb extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("CoreBundle:Base:base.html.twig");

        $this->blocks = array(
            'toolbar' => array($this, 'block_toolbar'),
            'dashboard' => array($this, 'block_dashboard'),
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "CoreBundle:Base:base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_toolbar($context, array $blocks = array())
    {
    }

    // line 4
    public function block_dashboard($context, array $blocks = array())
    {
    }

    // line 6
    public function block_content($context, array $blocks = array())
    {
        // line 7
        echo "<div class=\"container-fluid\">
    <div class=\"row-fluid\">

        <br><br>

        <div class=\"row-fluid\">
            <div class=\"well span4 center login-box\">
                <img src=\"";
        // line 14
        echo twig_escape_filter($this->env, (isset($context["client_logo"]) ? $context["client_logo"] : $this->getContext($context, "client_logo")), "html", null, true);
        echo " \" width = \"150px\"/><br><br><br><br>
                ";
        // line 15
        if (array_key_exists("details", $context)) {
            // line 16
            echo "                <div class=\"alert alert-info\">
                    ";
            // line 17
            echo twig_escape_filter($this->env, (isset($context["details"]) ? $context["details"] : $this->getContext($context, "details")), "html", null, true);
            echo "
                </div>
                ";
        }
        // line 20
        echo "                <form class=\"form-horizontal\" action=\"";
        echo $this->env->getExtension('routing')->getPath("auth_login");
        echo "\" method=\"post\">
                    <fieldset>
                        <div class=\"input-prepend\" title=\"Username\" data-rel=\"tooltip\">
                            <span class=\"add-on\"><i class=\"icon-user\"></i></span><input autofocus class=\"input-large span10\" name=\"username\" id=\"username\" type=\"text\" value=\"\" placeholder=\"type your username\" required />
                        </div>
                        <div class=\"clearfix\"></div>

                        <div class=\"input-prepend\" title=\"Password\" data-rel=\"tooltip\">
                            <span class=\"add-on\"><i class=\"icon-lock\"></i></span><input class=\"input-large span10\" name=\"password\" id=\"password\" type=\"password\" value=\"\" placeholder=\"type your password\" required/>
                        </div>
                       
                         <p class=\"center span5\">
                             <button type=\"submit\" class=\"btn btn-success\">Login</button> </p>
                         <p align=\"center\">
                             <a href=\"";
        // line 34
        echo $this->env->getExtension('routing')->getPath("forgot_password");
        echo "\">Forgot your password?</a>
                        </p>
                         <p align=\"center\">
                             Not a member? <a href=\"";
        // line 37
        echo $this->env->getExtension('routing')->getPath("user_register");
        echo "\">register here </a>
                        </p>
                        

                       
                    </fieldset>
                </form>

            </div><!--/span-->
            

        </div><!--/row-->
       
    </div><!--/fluid-row-->

</div><!--/.fluid-container-->

";
    }

    public function getTemplateName()
    {
        return "CoreBundle:Authentication:login.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  91 => 37,  85 => 34,  67 => 20,  61 => 17,  58 => 16,  56 => 15,  52 => 14,  43 => 7,  40 => 6,  35 => 4,  30 => 2,);
    }
}
