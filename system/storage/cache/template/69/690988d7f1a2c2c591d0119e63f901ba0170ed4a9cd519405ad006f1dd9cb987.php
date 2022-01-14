<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* makeme/template/common/menu.twig */
class __TwigTemplate_595192427c2be143b4f7d0a2beca0a05b14424a21edf8c2f42ed396368aa856c extends \Twig\Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1
        if (($context["menu_items"] ?? null)) {
            // line 2
            echo "    <nav class=\"page-header__menu\" itemscope itemtype=\"https://schema.org/SiteNavigationElement\">
        <ul class=\"page-header__menu-list\">
          ";
            // line 4
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["menu_items"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["menu_item"]) {
                // line 5
                echo "            <li itemprop=\"name\" class=\"page-header__menu-list-el\">
                <a itemprop=\"url\" class=\"page-header__menu-el\" href=\"";
                // line 6
                echo twig_get_attribute($this->env, $this->source, $context["menu_item"], "href", [], "any", false, false, false, 6);
                echo "\">
                  ";
                // line 7
                echo twig_get_attribute($this->env, $this->source, $context["menu_item"], "name", [], "any", false, false, false, 7);
                echo "
                </a>
            </li>
          ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['menu_item'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 29
            echo "        </ul>
    </nav>
";
        }
        // line 32
        echo "


";
    }

    public function getTemplateName()
    {
        return "makeme/template/common/menu.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  69 => 32,  64 => 29,  54 => 7,  50 => 6,  47 => 5,  43 => 4,  39 => 2,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "makeme/template/common/menu.twig", "");
    }
}
