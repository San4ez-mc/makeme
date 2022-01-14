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
class __TwigTemplate_db511f23aa8252aa698baf6fc9be9a795b781668ef41a4ed42dcd3288a614297 extends \Twig\Template
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
            // line 11
            echo "          <li itemprop=\"name\" class=\"page-header__menu-list-el\">
            <a itemprop=\"url\" class=\"page-header__menu-el\" href=\"#\">Конструктор</a>
          </li>
            <li itemprop=\"name\" class=\"page-header__menu-list-el\">
                <a itemprop=\"url\" class=\"page-header__menu-el\" href=\"#\">Каталог</a>
            </li>
            <li itemprop=\"name\" class=\"page-header__menu-list-el\">
                <a itemprop=\"url\" class=\"page-header__menu-el\" href=\"#\">Компоненты</a>
            </li>
            <li itemprop=\"name\" class=\"page-header__menu-list-el\">
                <a itemprop=\"url\" class=\"page-header__menu-el\" href=\"#\">О нас</a>
            </li>
            <li itemprop=\"name\" class=\"page-header__menu-list-el\">
                <a itemprop=\"url\" class=\"page-header__menu-el color-primary\" href=\"#\">MM Club</a>
            </li>
            <li itemprop=\"name\" class=\"page-header__menu-list-el\">
                <a itemprop=\"url\" class=\"page-header__menu-el\" href=\"#\">Акции</a>
            </li>
        </ul>
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
        return array (  87 => 32,  64 => 11,  54 => 7,  50 => 6,  47 => 5,  43 => 4,  39 => 2,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "makeme/template/common/menu.twig", "");
    }
}
