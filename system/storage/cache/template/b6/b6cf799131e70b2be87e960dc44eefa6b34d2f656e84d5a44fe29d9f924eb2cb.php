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

/* search/catalog_result.twig */
class __TwigTemplate_aef85dc986ecdeee77fe6b9e3d28ba9b3c5f9c263fbc5b93c1b827536f8df924 extends \Twig\Template
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
        echo "<ul>
  <li class=\"result-header\">";
        // line 2
        echo ($context["text_products"] ?? null);
        echo "</li>
  ";
        // line 3
        if ( !twig_test_empty(($context["products"] ?? null))) {
            // line 4
            echo "  ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["products"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["product"]) {
                // line 5
                echo "  <li>
    <a href=\"";
                // line 6
                echo twig_get_attribute($this->env, $this->source, $context["product"], "url", [], "any", false, false, false, 6);
                echo "\" style=\"display: block; overflow: auto;\">
      <img src=\"";
                // line 7
                echo twig_get_attribute($this->env, $this->source, $context["product"], "image", [], "any", false, false, false, 7);
                echo "\"/>
      <span>";
                // line 8
                echo twig_get_attribute($this->env, $this->source, $context["product"], "name", [], "any", false, false, false, 8);
                echo "</span>
    </a>
  </li>
  ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['product'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 12
            echo "  ";
        } else {
            // line 13
            echo "  <li>
    <a href=\"javascript::void(0)\" style=\"display: block; overflow: auto;\">
      <span>";
            // line 15
            echo ($context["text_no_result"] ?? null);
            echo "</span>
    </a>
  </li>
  ";
        }
        // line 19
        echo "  <li class=\"result-header\">";
        echo ($context["text_categories"] ?? null);
        echo "</li>
  ";
        // line 20
        if ( !twig_test_empty(($context["categories"] ?? null))) {
            // line 21
            echo "  ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["categories"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["category"]) {
                // line 22
                echo "  <li>
    <a href=\"";
                // line 23
                echo twig_get_attribute($this->env, $this->source, $context["category"], "url", [], "any", false, false, false, 23);
                echo "\" style=\"display: block; overflow: auto;\">
      <img src=\"";
                // line 24
                echo twig_get_attribute($this->env, $this->source, $context["category"], "image", [], "any", false, false, false, 24);
                echo "\"/>
      <span>";
                // line 25
                echo twig_get_attribute($this->env, $this->source, $context["category"], "name", [], "any", false, false, false, 25);
                echo "</span>
    </a>
  </li>
  ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['category'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 29
            echo "  ";
        } else {
            // line 30
            echo "  <li>
    <a href=\"javascript::void(0)\" style=\"display: block; overflow: auto;\">
      <span>";
            // line 32
            echo ($context["text_no_result"] ?? null);
            echo "</span>
    </a>
  </li>
  ";
        }
        // line 36
        echo "  <li class=\"result-header\">";
        echo ($context["text_manufacturers"] ?? null);
        echo "</li>
  ";
        // line 37
        if ( !twig_test_empty(($context["manufacturers"] ?? null))) {
            // line 38
            echo "  ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["manufacturers"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["manufacturer"]) {
                // line 39
                echo "  <li>
    <a href=\"";
                // line 40
                echo twig_get_attribute($this->env, $this->source, $context["manufacturer"], "url", [], "any", false, false, false, 40);
                echo "\" style=\"display: block; overflow: auto;\">
      <img src=\"";
                // line 41
                echo twig_get_attribute($this->env, $this->source, $context["manufacturer"], "image", [], "any", false, false, false, 41);
                echo "\"/>
      <span>";
                // line 42
                echo twig_get_attribute($this->env, $this->source, $context["manufacturer"], "name", [], "any", false, false, false, 42);
                echo "</span>
    </a>
  </li>
  ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['manufacturer'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 46
            echo "  ";
        } else {
            // line 47
            echo "  <li>
    <a href=\"javascript::void(0)\" style=\"display: block; overflow: auto;\">
      <span>";
            // line 49
            echo ($context["text_no_result"] ?? null);
            echo "</span>
    </a>
  </li>
  ";
        }
        // line 53
        echo "</ul>";
    }

    public function getTemplateName()
    {
        return "search/catalog_result.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  180 => 53,  173 => 49,  169 => 47,  166 => 46,  156 => 42,  152 => 41,  148 => 40,  145 => 39,  140 => 38,  138 => 37,  133 => 36,  126 => 32,  122 => 30,  119 => 29,  109 => 25,  105 => 24,  101 => 23,  98 => 22,  93 => 21,  91 => 20,  86 => 19,  79 => 15,  75 => 13,  72 => 12,  62 => 8,  58 => 7,  54 => 6,  51 => 5,  46 => 4,  44 => 3,  40 => 2,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "search/catalog_result.twig", "");
    }
}
