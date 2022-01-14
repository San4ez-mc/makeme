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
class __TwigTemplate_8acc318d55088ff274299ef70fcb5a1d6988ade2bdca3ba4dd561f8b9bd087ec extends \Twig\Template
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
        echo "    ";
        // line 48
        echo "    ";
        // line 49
        echo "    ";
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
            <a href=\"#\" class=\"page-header__logo\">
";
        // line 70
        echo "                <img src=\"";
        echo ($context["logo"] ?? null);
        echo "\" alt=\"logo\" class=\"lazy page-header__logo-img\">
            </a>
";
        // line 94
        echo "            ";
        echo ($context["menu"] ?? null);
        echo "
            <nav class=\"page-header__buttons\">
                <a href=\"#\" class=\"page-header__buttons-el page-header__buttons-el--user\"></a>
                <a href=\"#\" class=\"page-header__buttons-el page-header__buttons-el--likes\"></a>
                <a href=\"#\" class=\"page-header__buttons-el page-header__buttons-el--basket\">
                    <span class=\"basket-quantity\">5</span>
                </a>
            </nav>
        </div>
    </header>

    <div class=\"menuMobile\">
        <div class=\"menuMobile__header\">
            <a href=\"#\" class=\"menuMobile__logo\"><img class=\"lazy\" src=\"img/icons/logo-header.svg\" alt=\"#\"></a>
            <span class=\"menuMobile__toggle menuMobileToggle--js\"></span>
        </div>
        <nav class=\"menuMobile__body\" itemscope itemtype=\"https://schema.org/SiteNavigationElement\">
            <div class=\"menuMobile__menu\">
                <ul class=\"menuMobile__menu-list\">
                    <li itemprop=\"name\" class=\"menuMobile__menu-list-el\">
                        <a itemprop=\"url\" href=\"#\" class=\"menuMobile__menu-el\">Конструктор</a>
                    </li>
                    <li itemprop=\"name\" class=\"menuMobile__menu-list-el\">
                        <a itemprop=\"url\" href=\"#\" class=\"menuMobile__menu-el\">Каталог</a>
                    </li>
                    <li itemprop=\"name\" class=\"menuMobile__menu-list-el\">
                        <a itemprop=\"url\" href=\"#\" class=\"menuMobile__menu-el\">Компоненты</a>
                    </li>
                    <li itemprop=\"name\" class=\"menuMobile__menu-list-el\">
                        <a itemprop=\"url\" href=\"#\"
                           class=\"menuMobile__menu-el\">О нас</a></li>
                    <li itemprop=\"name\" class=\"menuMobile__menu-list-el\">
                        <a itemprop=\"url\" href=\"#\"
                           class=\"menuMobile__menu-el color-primary\">MM
                            Club</a></li>
                    <li itemprop=\"name\" class=\"menuMobile__menu-list-el\">
                        <a itemprop=\"url\" href=\"#\"
                           class=\"menuMobile__menu-el\">Акции</a></li>
                    <li itemprop=\"name\" class=\"menuMobile__menu-list-el\">
                        <a itemprop=\"url\" href=\"#\"
                           class=\"menuMobile__menu-el\">Доставка и
                            оплата</a></li>
                    <li itemprop=\"name\" class=\"menuMobile__menu-list-el\">
                        <a itemprop=\"url\" href=\"#\"
                           class=\"menuMobile__menu-el\">Блог</a></li>
                    <li itemprop=\"name\" class=\"menuMobile__menu-list-el\">
                        <a itemprop=\"url\" href=\"#\"
                           class=\"menuMobile__menu-el\">Публичная
                            оферта</a></li>
                </ul>
            </div>
            <div class=\"page-footer__menu-info\">
                <div class=\"page-footer__menu-info-el\">
                    <div class=\"page-footer__menu-info-el-title\">График работы</div>
                    <div class=\"page-footer__menu-info-el-value\">Круглосуточно</div>
                </div>
                <div class=\"page-footer__menu-info-el\">
                    <div class=\"page-footer__menu-info-el-title\">График работы</div>
                    <div class=\"page-footer__menu-info-el-value\">г. Киев, ул. Марко Вовчка, 18а</div>
                </div>
                <div class=\"page-footer__menu-info-el\">
                    <div class=\"page-footer__menu-info-el-title\">Соцсети</div>
                    <nav class=\"page-footer__socials\">
                        <a href=\"#\" class=\"page-footer__socials-el\">
                            <i class=\"fab fa-facebook\"></i>
                        </a>
                        <a href=\"#\" class=\"page-footer__socials-el\">
                            <i class=\"fab fa-facebook\"></i>
                        </a>
                        <a href=\"#\" class=\"page-footer__socials-el\">
                            <i class=\"fab fa-facebook\"></i>
                        </a>
                    </nav>
                </div>
            </div>
        </nav>
    </div>

    ";
        // line 173
        echo "    ";
        // line 174
        echo "    ";
        // line 175
        echo "    ";
        // line 176
        echo "    ";
        // line 177
        echo "    ";
        // line 178
        echo "    ";
        // line 179
        echo "    ";
        // line 180
        echo "    ";
        // line 181
        echo "    ";
        // line 182
        echo "    ";
        // line 183
        echo "    ";
        // line 184
        echo "    ";
        // line 185
        echo "    ";
        // line 186
        echo "    ";
        // line 187
        echo "    ";
        // line 188
        echo "    ";
        // line 189
        echo "    ";
        // line 190
        echo "    ";
        // line 191
        echo "    ";
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
        return array (  424 => 232,  422 => 231,  420 => 230,  418 => 229,  416 => 228,  414 => 227,  412 => 226,  410 => 225,  408 => 224,  406 => 223,  404 => 222,  402 => 221,  400 => 220,  398 => 219,  396 => 218,  394 => 217,  392 => 216,  390 => 215,  388 => 214,  386 => 213,  384 => 212,  382 => 211,  380 => 210,  378 => 209,  376 => 208,  374 => 207,  372 => 206,  370 => 205,  368 => 204,  366 => 203,  364 => 202,  362 => 201,  360 => 200,  358 => 199,  356 => 198,  354 => 197,  352 => 196,  350 => 195,  348 => 194,  346 => 193,  344 => 192,  342 => 191,  340 => 190,  338 => 189,  336 => 188,  334 => 187,  332 => 186,  330 => 185,  328 => 184,  326 => 183,  324 => 182,  322 => 181,  320 => 180,  318 => 179,  316 => 178,  314 => 177,  312 => 176,  310 => 175,  308 => 174,  306 => 173,  224 => 94,  218 => 70,  206 => 60,  201 => 57,  192 => 55,  187 => 54,  176 => 52,  171 => 51,  169 => 50,  167 => 49,  165 => 48,  163 => 47,  150 => 45,  146 => 44,  138 => 38,  136 => 37,  134 => 36,  132 => 35,  130 => 34,  128 => 33,  123 => 31,  117 => 29,  111 => 27,  109 => 26,  105 => 25,  99 => 23,  93 => 21,  90 => 20,  84 => 18,  82 => 17,  77 => 16,  71 => 14,  69 => 13,  65 => 12,  54 => 6,  47 => 4,  41 => 3,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "makeme/template/common/header.twig", "");
    }
}
