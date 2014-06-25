<?php

/* korb.twig */
class __TwigTemplate_2eeb8686f914b9e479f26bf6cbb137ce0ef20c985aded29612d962577230444d extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("base.twig");

        $this->blocks = array(
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "base.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = array())
    {
        // line 4
        echo "<h2>Warenkorb</h2><hr/>

<table border=0>
    <tr>
        <td WIDTH=\"80\">
            <b>Art.-Nr.</b>
        </td>
        <td WIDTH=\"420\">
            <b>Bezeichnung</b>
        </td>
        <td WIDTH=\"70\">
            <b>Preis</b>
        </td>
        <td WIDTH=\"40\">
            <b>&nbsp</b>
        </td>
    </tr>
    ";
        // line 21
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["waren"]) ? $context["waren"] : null));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["ware"]) {
            // line 22
            echo "    <tr>
        <td WIDTH=\"70\">
            ";
            // line 24
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["ware"]) ? $context["ware"] : null), "id"), "html", null, true);
            echo "
        </td>
        <td WIDTH=\"420\">
            ";
            // line 27
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["ware"]) ? $context["ware"] : null), "name"), "html", null, true);
            echo "
        </td>
        <td WIDTH=\"70\">
            ";
            // line 30
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["ware"]) ? $context["ware"] : null), "preis"), "html", null, true);
            echo "
        </td>
        <td WIDTH=\"40\">
            <a href=\"loesch.php?id=";
            // line 33
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["ware"]) ? $context["ware"] : null), "id"), "html", null, true);
            echo "\" class=\"del\">L&ouml;schen</a>
        </td>
    </tr>
";
            $context['_iterated'] = true;
        }
        if (!$context['_iterated']) {
            // line 37
            echo "    <tr>
        <td colspan=\"4\">
            <em>keine waren im Korb</em>
        </td>
    </tr>
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['ware'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 43
        echo "</table>
<br />
<b>Gesamt:</b> ";
        // line 45
        echo twig_escape_filter($this->env, (isset($context["preis"]) ? $context["preis"] : null), "html", null, true);
        echo " Euro
";
    }

    public function getTemplateName()
    {
        return "korb.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  101 => 45,  97 => 43,  86 => 37,  77 => 33,  71 => 30,  65 => 27,  59 => 24,  55 => 22,  50 => 21,  31 => 4,  28 => 3,);
    }
}
