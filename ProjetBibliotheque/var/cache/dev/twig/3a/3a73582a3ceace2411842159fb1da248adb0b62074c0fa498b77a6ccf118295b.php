<?php

/* base.html.twig */
class __TwigTemplate_63f157f68e1df662096ec1ee214d4b6b305a6c8aeec7b492350dbdcc7bb726ac extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'stylesheets' => array($this, 'block_stylesheets'),
            'body' => array($this, 'block_body'),
            'javascripts' => array($this, 'block_javascripts'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_4e1f749130315ae74c1c41f550d52d0a6123baea3b36c019691ca1994735ab97 = $this->env->getExtension("native_profiler");
        $__internal_4e1f749130315ae74c1c41f550d52d0a6123baea3b36c019691ca1994735ab97->enter($__internal_4e1f749130315ae74c1c41f550d52d0a6123baea3b36c019691ca1994735ab97_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "base.html.twig"));

        // line 1
        echo "<!DOCTYPE html>
<html>
    <head>
        <meta charset=\"UTF-8\" />
        <title>";
        // line 5
        $this->displayBlock('title', $context, $blocks);
        echo "</title>
        ";
        // line 6
        $this->displayBlock('stylesheets', $context, $blocks);
        // line 7
        echo "        <link rel=\"icon\" type=\"image/x-icon\" href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("favicon.ico"), "html", null, true);
        echo "\" />
    </head>
    <body>
        ";
        // line 10
        $this->displayBlock('body', $context, $blocks);
        // line 11
        echo "        ";
        $this->displayBlock('javascripts', $context, $blocks);
        // line 12
        echo "    </body>
</html>
";
        
        $__internal_4e1f749130315ae74c1c41f550d52d0a6123baea3b36c019691ca1994735ab97->leave($__internal_4e1f749130315ae74c1c41f550d52d0a6123baea3b36c019691ca1994735ab97_prof);

    }

    // line 5
    public function block_title($context, array $blocks = array())
    {
        $__internal_125ebd5d60e973ef8c580a8d217ad85f22e7a95f085de5df0d0312cf2b68c4a3 = $this->env->getExtension("native_profiler");
        $__internal_125ebd5d60e973ef8c580a8d217ad85f22e7a95f085de5df0d0312cf2b68c4a3->enter($__internal_125ebd5d60e973ef8c580a8d217ad85f22e7a95f085de5df0d0312cf2b68c4a3_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        echo "Welcome!";
        
        $__internal_125ebd5d60e973ef8c580a8d217ad85f22e7a95f085de5df0d0312cf2b68c4a3->leave($__internal_125ebd5d60e973ef8c580a8d217ad85f22e7a95f085de5df0d0312cf2b68c4a3_prof);

    }

    // line 6
    public function block_stylesheets($context, array $blocks = array())
    {
        $__internal_427bf26be83122b6aaac0e669e947ad17932687c45bb83803bb9c1b4119af1b8 = $this->env->getExtension("native_profiler");
        $__internal_427bf26be83122b6aaac0e669e947ad17932687c45bb83803bb9c1b4119af1b8->enter($__internal_427bf26be83122b6aaac0e669e947ad17932687c45bb83803bb9c1b4119af1b8_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "stylesheets"));

        
        $__internal_427bf26be83122b6aaac0e669e947ad17932687c45bb83803bb9c1b4119af1b8->leave($__internal_427bf26be83122b6aaac0e669e947ad17932687c45bb83803bb9c1b4119af1b8_prof);

    }

    // line 10
    public function block_body($context, array $blocks = array())
    {
        $__internal_61190d4cc8a9b4eff0f4b66e7616fa1a62c81b3447ba295adcfbd7b2cb210b4c = $this->env->getExtension("native_profiler");
        $__internal_61190d4cc8a9b4eff0f4b66e7616fa1a62c81b3447ba295adcfbd7b2cb210b4c->enter($__internal_61190d4cc8a9b4eff0f4b66e7616fa1a62c81b3447ba295adcfbd7b2cb210b4c_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        
        $__internal_61190d4cc8a9b4eff0f4b66e7616fa1a62c81b3447ba295adcfbd7b2cb210b4c->leave($__internal_61190d4cc8a9b4eff0f4b66e7616fa1a62c81b3447ba295adcfbd7b2cb210b4c_prof);

    }

    // line 11
    public function block_javascripts($context, array $blocks = array())
    {
        $__internal_f21d7879a2ed5a2c9cfd5290f674f0f037892e4d096f810f375ce05ee6c71157 = $this->env->getExtension("native_profiler");
        $__internal_f21d7879a2ed5a2c9cfd5290f674f0f037892e4d096f810f375ce05ee6c71157->enter($__internal_f21d7879a2ed5a2c9cfd5290f674f0f037892e4d096f810f375ce05ee6c71157_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "javascripts"));

        
        $__internal_f21d7879a2ed5a2c9cfd5290f674f0f037892e4d096f810f375ce05ee6c71157->leave($__internal_f21d7879a2ed5a2c9cfd5290f674f0f037892e4d096f810f375ce05ee6c71157_prof);

    }

    public function getTemplateName()
    {
        return "base.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  93 => 11,  82 => 10,  71 => 6,  59 => 5,  50 => 12,  47 => 11,  45 => 10,  38 => 7,  36 => 6,  32 => 5,  26 => 1,);
    }
}
/* <!DOCTYPE html>*/
/* <html>*/
/*     <head>*/
/*         <meta charset="UTF-8" />*/
/*         <title>{% block title %}Welcome!{% endblock %}</title>*/
/*         {% block stylesheets %}{% endblock %}*/
/*         <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}" />*/
/*     </head>*/
/*     <body>*/
/*         {% block body %}{% endblock %}*/
/*         {% block javascripts %}{% endblock %}*/
/*     </body>*/
/* </html>*/
/* */
