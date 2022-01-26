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

/* makeme/template/common/header.twig */
class __TwigTemplate_bb8e38f4cc5b53e587414f896b4d94ea7e04d7fff2f14e72f50d58383afdad66 extends \Twig\Template
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
        echo "<!DOCTYPE html>
<!--[if IE]><![endif]-->
<!--[if IE 8 ]><html dir=\"";
        // line 3
        echo ($context["direction"] ?? null);
        echo "\" lang=\"";
        echo ($context["lang"] ?? null);
        echo "\" class=\"ie8\"><![endif]-->
<!--[if IE 9 ]><html dir=\"";
        // line 4
        echo ($context["direction"] ?? null);
        echo "\" lang=\"";
        echo ($context["lang"] ?? null);
        echo "\" class=\"ie9\"><![endif]-->
<!--[if (gt IE 9)|!(IE)]><!-->
<html dir=\"";
        // line 6
        echo ($context["direction"] ?? null);
        echo "\" lang=\"";
        echo ($context["lang"] ?? null);
        echo "\">
<!--<![endif]-->
<head>
    <meta charset=\"UTF-8\"/>
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
    <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
    <title>";
        // line 12
        echo ($context["title"] ?? null);
        echo "</title>
    ";
        // line 13
        if (($context["robots"] ?? null)) {
            // line 14
            echo "        <meta name=\"robots\" content=\"";
            echo ($context["robots"] ?? null);
            echo "\"/>
    ";
        }
        // line 16
        echo "    <base href=\"";
        echo ($context["base"] ?? null);
        echo "\"/>
    ";
        // line 17
        if (($context["description"] ?? null)) {
            // line 18
            echo "        <meta name=\"description\" content=\"";
            echo ($context["description"] ?? null);
            echo "\"/>
    ";
        }
        // line 20
        echo "    ";
        if (($context["keywords"] ?? null)) {
            // line 21
            echo "        <meta name=\"keywords\" content=\"";
            echo ($context["keywords"] ?? null);
            echo "\"/>
    ";
        }
        // line 23
        echo "    <meta property=\"og:title\" content=\"";
        echo ($context["title"] ?? null);
        echo "\"/>
    <meta property=\"og:type\" content=\"website\"/>
    <meta property=\"og:url\" content=\"";
        // line 25
        echo ($context["og_url"] ?? null);
        echo "\"/>
    ";
        // line 26
        if (($context["og_image"] ?? null)) {
            // line 27
            echo "        <meta property=\"og:image\" content=\"";
            echo ($context["og_image"] ?? null);
            echo "\"/>
    ";
        } else {
            // line 29
            echo "        <meta property=\"og:image\" content=\"";
            echo ($context["logo"] ?? null);
            echo "\"/>
    ";
        }
        // line 31
        echo "    <meta property=\"og:site_name\" content=\"";
        echo ($context["name"] ?? null);
        echo "\"/>
    ";
        // line 33
        echo "    ";
        // line 34
        echo "    ";
        // line 35
        echo "    ";
        // line 36
        echo "    ";
        // line 37
        echo "    ";
        // line 38
        echo "
    <link rel=\"stylesheet\" href=\"catalog/view/theme/makeme/libs/bootstrap/bootstrap.min.css\">
    <link rel=\"stylesheet\" href=\"catalog/view/theme/makeme/libs/fontawesome/css/all.css\">
    <link rel=\"stylesheet\" href=\"catalog/view/theme/makeme/libs/owl.carousel/owl.carousel.min.css\">
    <link rel=\"stylesheet\" href=\"catalog/view/theme/makeme/stylesheet/main.css\">

    ";
        // line 44
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["styles"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["style"]) {
            // line 45
            echo "        <link href=\"";
            echo twig_get_attribute($this->env, $this->source, $context["style"], "href", [], "any", false, false, false, 45);
            echo "\" type=\"text/css\" rel=\"";
            echo twig_get_attribute($this->env, $this->source, $context["style"], "rel", [], "any", false, false, false, 45);
            echo "\" media=\"";
            echo twig_get_attribute($this->env, $this->source, $context["style"], "media", [], "any", false, false, false, 45);
            echo "\"/>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['style'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 47
        echo "        ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["scripts"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["script"]) {
            // line 48
            echo "            <script src=\"";
            echo $context["script"];
            echo "\" type=\"text/javascript\"></script>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['script'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 50
        echo "    ";
        // line 51
        echo "    ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["links"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["link"]) {
            // line 52
            echo "        <link href=\"";
            echo twig_get_attribute($this->env, $this->source, $context["link"], "href", [], "any", false, false, false, 52);
            echo "\" rel=\"";
            echo twig_get_attribute($this->env, $this->source, $context["link"], "rel", [], "any", false, false, false, 52);
            echo "\"/>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['link'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 54
        echo "    ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["analytics"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["analytic"]) {
            // line 55
            echo "        ";
            echo $context["analytic"];
            echo "
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['analytic'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 57
        echo "</head>
<body>
<div class=\"page-wrapper\">
    ";
        // line 60
        echo ($context["preloader"] ?? null);
        echo "
    <header class=\"page-header\" itemscope itemtype=\"https://schema.org/WPHeader\" id=\"header\">
        <div class=\"container\">
            <nav class=\"page-header__toggle menuMobileToggle--js\">
                <span></span>
                <span></span>
                <span></span>
            </nav>

            ";
        // line 69
        if (($context["logo"] ?? null)) {
            // line 70
            echo "                ";
            if ((($context["home"] ?? null) == ($context["og_url"] ?? null))) {
                // line 71
                echo "                    <img src=\"";
                echo ($context["logo"] ?? null);
                echo "\" title=\"";
                echo ($context["name"] ?? null);
                echo "\" alt=\"";
                echo ($context["name"] ?? null);
                echo "\" class=\"lazy page-header__logo-img\">
                ";
            } else {
                // line 73
                echo "                    <a href=\"";
                echo ($context["home"] ?? null);
                echo "\"  class=\"page-header__logo\">
                        <img src=\"";
                // line 74
                echo ($context["logo"] ?? null);
                echo "\" title=\"";
                echo ($context["name"] ?? null);
                echo "\" alt=\"";
                echo ($context["name"] ?? null);
                echo "\" class=\"lazy page-header__logo-img\">
                    </a>
                ";
            }
            // line 77
            echo "            ";
        } else {
            // line 78
            echo "                <h1><a href=\"";
            echo ($context["home"] ?? null);
            echo "\">";
            echo ($context["name"] ?? null);
            echo "</a></h1>
            ";
        }
        // line 80
        echo "


";
        // line 109
        echo "            ";
        echo ($context["menu"] ?? null);
        echo "
            <nav class=\"page-header__buttons\">
                <a href=\"";
        // line 111
        echo ($context["account"] ?? null);
        echo "\" class=\"page-header__buttons-el page-header__buttons-el--user\"></a>
                <a href=\"#\" class=\"page-header__buttons-el page-header__buttons-el--likes\"></a>
                <a href=\"#\" class=\"page-header__buttons-el page-header__buttons-el--basket\">
                    <span class=\"basket-quantity\">5</span>
                </a>
            </nav>
        </div>
    </header>

    <div class=\"menuMobile\">
        <div class=\"menuMobile__header\">
            <a href=\"#\" class=\"menuMobile__logo\">
";
        // line 124
        echo "                <img class=\"lazy\" src=\"";
        echo ($context["logo"] ?? null);
        echo "\" alt=\"logo\">
            </a>
            <span class=\"menuMobile__toggle menuMobileToggle--js\"></span>
        </div>
        ";
        // line 128
        echo ($context["menu_mobile"] ?? null);
        echo "
";
        // line 189
        echo "    </div>

    ";
        // line 192
        echo "    ";
        // line 193
        echo "    ";
        // line 194
        echo "    ";
        // line 195
        echo "    ";
        // line 196
        echo "    ";
        // line 197
        echo "    ";
        // line 198
        echo "    ";
        // line 199
        echo "    ";
        // line 200
        echo "    ";
        // line 201
        echo "    ";
        // line 202
        echo "    ";
        // line 203
        echo "    ";
        // line 204
        echo "    ";
        // line 205
        echo "    ";
        // line 206
        echo "    ";
        // line 207
        echo "    ";
        // line 208
        echo "    ";
        // line 209
        echo "    ";
        // line 210
        echo "    ";
        // line 211
        echo "    ";
        // line 212
        echo "    ";
        // line 213
        echo "    ";
        // line 214
        echo "    ";
        // line 215
        echo "    ";
        // line 216
        echo "    ";
        // line 217
        echo "    ";
        // line 218
        echo "    ";
        // line 219
        echo "    ";
        // line 220
        echo "    ";
        // line 221
        echo "    ";
        // line 222
        echo "    ";
        // line 223
        echo "    ";
        // line 224
        echo "    ";
        // line 225
        echo "    ";
        // line 226
        echo "    ";
        // line 227
        echo "    ";
        // line 228
        echo "    ";
        // line 229
        echo "    ";
        // line 230
        echo "    ";
        // line 231
        echo "    ";
        // line 232
        echo "    ";
        // line 233
        echo "    ";
        // line 234
        echo "    ";
        // line 235
        echo "    ";
        // line 236
        echo "    ";
        // line 237
        echo "    ";
        // line 238
        echo "    ";
        // line 239
        echo "    ";
        // line 240
        echo "    ";
        // line 241
        echo "    ";
        // line 242
        echo "    ";
        // line 243
        echo "    ";
        // line 244
        echo "    ";
        // line 245
        echo "    ";
        // line 246
        echo "    ";
        // line 247
        echo "    ";
        // line 248
        echo "    ";
        // line 249
        echo "    ";
        // line 250
        echo "    ";
        // line 251
        echo "    ";
    }

    public function getTemplateName()
    {
        return "makeme/template/common/header.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  427 => 251,  425 => 250,  423 => 249,  421 => 248,  419 => 247,  417 => 246,  415 => 245,  413 => 244,  411 => 243,  409 => 242,  407 => 241,  405 => 240,  403 => 239,  401 => 238,  399 => 237,  397 => 236,  395 => 235,  393 => 234,  391 => 233,  389 => 232,  387 => 231,  385 => 230,  383 => 229,  381 => 228,  379 => 227,  377 => 226,  375 => 225,  373 => 224,  371 => 223,  369 => 222,  367 => 221,  365 => 220,  363 => 219,  361 => 218,  359 => 217,  357 => 216,  355 => 215,  353 => 214,  351 => 213,  349 => 212,  347 => 211,  345 => 210,  343 => 209,  341 => 208,  339 => 207,  337 => 206,  335 => 205,  333 => 204,  331 => 203,  329 => 202,  327 => 201,  325 => 200,  323 => 199,  321 => 198,  319 => 197,  317 => 196,  315 => 195,  313 => 194,  311 => 193,  309 => 192,  305 => 189,  301 => 128,  293 => 124,  278 => 111,  272 => 109,  267 => 80,  259 => 78,  256 => 77,  246 => 74,  241 => 73,  231 => 71,  228 => 70,  226 => 69,  214 => 60,  209 => 57,  200 => 55,  195 => 54,  184 => 52,  179 => 51,  177 => 50,  168 => 48,  163 => 47,  150 => 45,  146 => 44,  138 => 38,  136 => 37,  134 => 36,  132 => 35,  130 => 34,  128 => 33,  123 => 31,  117 => 29,  111 => 27,  109 => 26,  105 => 25,  99 => 23,  93 => 21,  90 => 20,  84 => 18,  82 => 17,  77 => 16,  71 => 14,  69 => 13,  65 => 12,  54 => 6,  47 => 4,  41 => 3,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "makeme/template/common/header.twig", "");
    }
}
