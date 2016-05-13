<?php

/* @WebProfiler/Collector/router.html.twig */
class __TwigTemplate_c551c124221c96d412620da8556cd8a0db0cc404c23c21abeae86562361c6a65 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("@WebProfiler/Profiler/layout.html.twig", "@WebProfiler/Collector/router.html.twig", 1);
        $this->blocks = array(
            'toolbar' => array($this, 'block_toolbar'),
            'menu' => array($this, 'block_menu'),
            'panel' => array($this, 'block_panel'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "@WebProfiler/Profiler/layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_972c28851c20462abb522b531a9b17659027a67aa9a663cc4d2204c093003b5a = $this->env->getExtension("native_profiler");
        $__internal_972c28851c20462abb522b531a9b17659027a67aa9a663cc4d2204c093003b5a->enter($__internal_972c28851c20462abb522b531a9b17659027a67aa9a663cc4d2204c093003b5a_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@WebProfiler/Collector/router.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_972c28851c20462abb522b531a9b17659027a67aa9a663cc4d2204c093003b5a->leave($__internal_972c28851c20462abb522b531a9b17659027a67aa9a663cc4d2204c093003b5a_prof);

    }

    // line 3
    public function block_toolbar($context, array $blocks = array())
    {
        $__internal_fa7b21971dcde8b9a2bdf0b46a966eb4ff407a98dd30c408ac4f8f4fdca71389 = $this->env->getExtension("native_profiler");
        $__internal_fa7b21971dcde8b9a2bdf0b46a966eb4ff407a98dd30c408ac4f8f4fdca71389->enter($__internal_fa7b21971dcde8b9a2bdf0b46a966eb4ff407a98dd30c408ac4f8f4fdca71389_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "toolbar"));

        
        $__internal_fa7b21971dcde8b9a2bdf0b46a966eb4ff407a98dd30c408ac4f8f4fdca71389->leave($__internal_fa7b21971dcde8b9a2bdf0b46a966eb4ff407a98dd30c408ac4f8f4fdca71389_prof);

    }

    // line 5
    public function block_menu($context, array $blocks = array())
    {
        $__internal_349c3f3a7a268db0f3d2e8df47ace6dffcba005f2f9a4b8577764831bfe92f59 = $this->env->getExtension("native_profiler");
        $__internal_349c3f3a7a268db0f3d2e8df47ace6dffcba005f2f9a4b8577764831bfe92f59->enter($__internal_349c3f3a7a268db0f3d2e8df47ace6dffcba005f2f9a4b8577764831bfe92f59_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "menu"));

        // line 6
        echo "<span class=\"label\">
    <span class=\"icon\">";
        // line 7
        echo twig_include($this->env, $context, "@WebProfiler/Icon/router.svg");
        echo "</span>
    <strong>Routing</strong>
</span>
";
        
        $__internal_349c3f3a7a268db0f3d2e8df47ace6dffcba005f2f9a4b8577764831bfe92f59->leave($__internal_349c3f3a7a268db0f3d2e8df47ace6dffcba005f2f9a4b8577764831bfe92f59_prof);

    }

    // line 12
    public function block_panel($context, array $blocks = array())
    {
        $__internal_bb772bed88c1f11634d2df24c4840312a2df575157f84cb213488bb963aa0b5d = $this->env->getExtension("native_profiler");
        $__internal_bb772bed88c1f11634d2df24c4840312a2df575157f84cb213488bb963aa0b5d->enter($__internal_bb772bed88c1f11634d2df24c4840312a2df575157f84cb213488bb963aa0b5d_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "panel"));

        // line 13
        echo "    ";
        echo $this->env->getExtension('http_kernel')->renderFragment($this->env->getExtension('routing')->getPath("_profiler_router", array("token" => (isset($context["token"]) ? $context["token"] : $this->getContext($context, "token")))));
        echo "
";
        
        $__internal_bb772bed88c1f11634d2df24c4840312a2df575157f84cb213488bb963aa0b5d->leave($__internal_bb772bed88c1f11634d2df24c4840312a2df575157f84cb213488bb963aa0b5d_prof);

    }

    public function getTemplateName()
    {
        return "@WebProfiler/Collector/router.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  73 => 13,  67 => 12,  56 => 7,  53 => 6,  47 => 5,  36 => 3,  11 => 1,);
    }
}
/* {% extends '@WebProfiler/Profiler/layout.html.twig' %}*/
/* */
/* {% block toolbar %}{% endblock %}*/
/* */
/* {% block menu %}*/
/* <span class="label">*/
/*     <span class="icon">{{ include('@WebProfiler/Icon/router.svg') }}</span>*/
/*     <strong>Routing</strong>*/
/* </span>*/
/* {% endblock %}*/
/* */
/* {% block panel %}*/
/*     {{ render(path('_profiler_router', { token: token })) }}*/
/* {% endblock %}*/
/* */
