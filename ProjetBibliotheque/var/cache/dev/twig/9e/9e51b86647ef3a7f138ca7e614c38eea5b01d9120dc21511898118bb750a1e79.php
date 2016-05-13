<?php

/* @Twig/Exception/exception_full.html.twig */
class __TwigTemplate_a24cd842beb6e022a333078225ef55842efea41acaf5d81ab4934f4cb66e8346 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("@Twig/layout.html.twig", "@Twig/Exception/exception_full.html.twig", 1);
        $this->blocks = array(
            'head' => array($this, 'block_head'),
            'title' => array($this, 'block_title'),
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "@Twig/layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_fe9f189ec9c4ba9f38c912536a8cdf06fd0f70f92c8a58725d65462975da416a = $this->env->getExtension("native_profiler");
        $__internal_fe9f189ec9c4ba9f38c912536a8cdf06fd0f70f92c8a58725d65462975da416a->enter($__internal_fe9f189ec9c4ba9f38c912536a8cdf06fd0f70f92c8a58725d65462975da416a_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Twig/Exception/exception_full.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_fe9f189ec9c4ba9f38c912536a8cdf06fd0f70f92c8a58725d65462975da416a->leave($__internal_fe9f189ec9c4ba9f38c912536a8cdf06fd0f70f92c8a58725d65462975da416a_prof);

    }

    // line 3
    public function block_head($context, array $blocks = array())
    {
        $__internal_e89bef310b3b3e98b17eba8a3261508c6b3b6c31a1798e88023a7e035e315cbf = $this->env->getExtension("native_profiler");
        $__internal_e89bef310b3b3e98b17eba8a3261508c6b3b6c31a1798e88023a7e035e315cbf->enter($__internal_e89bef310b3b3e98b17eba8a3261508c6b3b6c31a1798e88023a7e035e315cbf_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "head"));

        // line 4
        echo "    <link href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('request')->generateAbsoluteUrl($this->env->getExtension('asset')->getAssetUrl("bundles/framework/css/exception.css")), "html", null, true);
        echo "\" rel=\"stylesheet\" type=\"text/css\" media=\"all\" />
";
        
        $__internal_e89bef310b3b3e98b17eba8a3261508c6b3b6c31a1798e88023a7e035e315cbf->leave($__internal_e89bef310b3b3e98b17eba8a3261508c6b3b6c31a1798e88023a7e035e315cbf_prof);

    }

    // line 7
    public function block_title($context, array $blocks = array())
    {
        $__internal_bf7b4e0b28b7353de4c651c5b534a7769f7fb9bb6088abe343a9af622db45c5e = $this->env->getExtension("native_profiler");
        $__internal_bf7b4e0b28b7353de4c651c5b534a7769f7fb9bb6088abe343a9af622db45c5e->enter($__internal_bf7b4e0b28b7353de4c651c5b534a7769f7fb9bb6088abe343a9af622db45c5e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        // line 8
        echo "    ";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["exception"]) ? $context["exception"] : $this->getContext($context, "exception")), "message", array()), "html", null, true);
        echo " (";
        echo twig_escape_filter($this->env, (isset($context["status_code"]) ? $context["status_code"] : $this->getContext($context, "status_code")), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, (isset($context["status_text"]) ? $context["status_text"] : $this->getContext($context, "status_text")), "html", null, true);
        echo ")
";
        
        $__internal_bf7b4e0b28b7353de4c651c5b534a7769f7fb9bb6088abe343a9af622db45c5e->leave($__internal_bf7b4e0b28b7353de4c651c5b534a7769f7fb9bb6088abe343a9af622db45c5e_prof);

    }

    // line 11
    public function block_body($context, array $blocks = array())
    {
        $__internal_41e2c3e81962add61b6bf82f0c1cbd2870a87a6b6621b4bd8fbf389fa937cd7d = $this->env->getExtension("native_profiler");
        $__internal_41e2c3e81962add61b6bf82f0c1cbd2870a87a6b6621b4bd8fbf389fa937cd7d->enter($__internal_41e2c3e81962add61b6bf82f0c1cbd2870a87a6b6621b4bd8fbf389fa937cd7d_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        // line 12
        echo "    ";
        $this->loadTemplate("@Twig/Exception/exception.html.twig", "@Twig/Exception/exception_full.html.twig", 12)->display($context);
        
        $__internal_41e2c3e81962add61b6bf82f0c1cbd2870a87a6b6621b4bd8fbf389fa937cd7d->leave($__internal_41e2c3e81962add61b6bf82f0c1cbd2870a87a6b6621b4bd8fbf389fa937cd7d_prof);

    }

    public function getTemplateName()
    {
        return "@Twig/Exception/exception_full.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  78 => 12,  72 => 11,  58 => 8,  52 => 7,  42 => 4,  36 => 3,  11 => 1,);
    }
}
/* {% extends '@Twig/layout.html.twig' %}*/
/* */
/* {% block head %}*/
/*     <link href="{{ absolute_url(asset('bundles/framework/css/exception.css')) }}" rel="stylesheet" type="text/css" media="all" />*/
/* {% endblock %}*/
/* */
/* {% block title %}*/
/*     {{ exception.message }} ({{ status_code }} {{ status_text }})*/
/* {% endblock %}*/
/* */
/* {% block body %}*/
/*     {% include '@Twig/Exception/exception.html.twig' %}*/
/* {% endblock %}*/
/* */
