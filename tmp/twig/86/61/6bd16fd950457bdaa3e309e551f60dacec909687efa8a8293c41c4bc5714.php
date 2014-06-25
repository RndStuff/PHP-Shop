<?php

/* loeschen.twig */
class __TwigTemplate_86616bd16fd950457bdaa3e309e551f60dacec909687efa8a8293c41c4bc5714 extends Twig_Template
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
        echo "    ";
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["msgs"]) ? $context["msgs"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["msg"]) {
            // line 5
            echo "        <p>";
            echo twig_escape_filter($this->env, (isset($context["msg"]) ? $context["msg"] : null), "html", null, true);
            echo "</p>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['msg'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 7
        echo "    <p>
        <a href=\"korb.php\">Zum Warenkorb</a>
    </p>
    <p>
        <a href=\"index.php\">Zu den Produkten</a>
    </p>
";
    }

    public function getTemplateName()
    {
        return "loeschen.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  45 => 7,  36 => 5,  31 => 4,  28 => 3,);
    }
}
