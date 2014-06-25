<?php

/* base.twig */
class __TwigTemplate_1edb06de1c8078de6691ba7314b8919362304c701bb2a95f0c2260ca0ae37059 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'content' => array($this, 'block_content'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<html>
<head>
    <title>Titel</title>
    <link rel=\"stylesheet\" href=\"assets/css/phpShop.css\" />
</head>
<body>
    ";
        // line 7
        $this->displayBlock('content', $context, $blocks);
        // line 9
        echo "</body>
</html>";
    }

    // line 7
    public function block_content($context, array $blocks = array())
    {
        // line 8
        echo "    ";
    }

    public function getTemplateName()
    {
        return "base.twig";
    }

    public function getDebugInfo()
    {
        return array (  38 => 8,  35 => 7,  30 => 9,  20 => 1,  45 => 7,  36 => 5,  31 => 4,  28 => 7,);
    }
}
