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
class __TwigTemplate_94e6e7850d7a4fb48efe25a45f6262146aafab5b50a0a8c8ac662457f6b7e718 extends \Twig\Template
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
                <img src=\"img/icons/logo-header.svg\" alt=\"#\" class=\"lazy page-header__logo-img\">
            </a>
            <nav class=\"page-header__menu\" itemscope itemtype=\"https://schema.org/SiteNavigationElement\">
                <ul class=\"page-header__menu-list\">
                    <li itemprop=\"name\" class=\"page-header__menu-list-el\">
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
                    <li itemprop=\"name\" class=\"menuMobile__menu-list-el\"><a itemprop=\"url\" href=\"#\"
                                                                            class=\"menuMobile__menu-el\">Конструктор</a>
                    </li>
                    <li itemprop=\"name\" class=\"menuMobile__menu-list-el\"><a itemprop=\"url\" href=\"#\"
                                                                            class=\"menuMobile__menu-el\">Каталог</a></li>
                    <li itemprop=\"name\" class=\"menuMobile__menu-list-el\"><a itemprop=\"url\" href=\"#\"
                                                                            class=\"menuMobile__menu-el\">Компоненты</a>
                    </li>
                    <li itemprop=\"name\" class=\"menuMobile__menu-list-el\"><a itemprop=\"url\" href=\"#\"
                                                                            class=\"menuMobile__menu-el\">О нас</a></li>
                    <li itemprop=\"name\" class=\"menuMobile__menu-list-el\"><a itemprop=\"url\" href=\"#\"
                                                                            class=\"menuMobile__menu-el color-primary\">MM
                            Club</a></li>
                    <li itemprop=\"name\" class=\"menuMobile__menu-list-el\"><a itemprop=\"url\" href=\"#\"
                                                                            class=\"menuMobile__menu-el\">Акции</a></li>
                    <li itemprop=\"name\" class=\"menuMobile__menu-list-el\"><a itemprop=\"url\" href=\"#\"
                                                                            class=\"menuMobile__menu-el\">Доставка и
                            оплата</a></li>
                    <li itemprop=\"name\" class=\"menuMobile__menu-list-el\"><a itemprop=\"url\" href=\"#\"
                                                                            class=\"menuMobile__menu-el\">Блог</a></li>
                    <li itemprop=\"name\" class=\"menuMobile__menu-list-el\"><a itemprop=\"url\" href=\"#\"
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



<body>
<nav id=\"top\">
    <div class=\"container\">";
        // line 168
        echo ($context["currency"] ?? null);
        echo "
        ";
        // line 169
        echo ($context["language"] ?? null);
        echo "
        ";
        // line 170
        echo ($context["blog_menu"] ?? null);
        echo "
        <div id=\"top-links\" class=\"nav pull-right\">
            <ul class=\"list-inline\">
                <li><a href=\"";
        // line 173
        echo ($context["contact"] ?? null);
        echo "\"><i class=\"fa fa-phone\"></i></a> <span
                            class=\"hidden-xs hidden-sm hidden-md\">";
        // line 174
        echo ($context["telephone"] ?? null);
        echo "</span></li>
                <li class=\"dropdown\"><a href=\"";
        // line 175
        echo ($context["account"] ?? null);
        echo "\" title=\"";
        echo ($context["text_account"] ?? null);
        echo "\" class=\"dropdown-toggle\"
                                        data-toggle=\"dropdown\"><i class=\"fa fa-user\"></i> <span
                                class=\"hidden-xs hidden-sm hidden-md\">";
        // line 177
        echo ($context["text_account"] ?? null);
        echo "</span> <span
                                class=\"caret\"></span></a>
                    <ul class=\"dropdown-menu dropdown-menu-right\">
                        ";
        // line 180
        if (($context["logged"] ?? null)) {
            // line 181
            echo "                            <li><a href=\"";
            echo ($context["account"] ?? null);
            echo "\">";
            echo ($context["text_account"] ?? null);
            echo "</a></li>
                            <li><a href=\"";
            // line 182
            echo ($context["order"] ?? null);
            echo "\">";
            echo ($context["text_order"] ?? null);
            echo "</a></li>
                            <li><a href=\"";
            // line 183
            echo ($context["transaction"] ?? null);
            echo "\">";
            echo ($context["text_transaction"] ?? null);
            echo "</a></li>
                            <li><a href=\"";
            // line 184
            echo ($context["download"] ?? null);
            echo "\">";
            echo ($context["text_download"] ?? null);
            echo "</a></li>
                            <li><a href=\"";
            // line 185
            echo ($context["logout"] ?? null);
            echo "\">";
            echo ($context["text_logout"] ?? null);
            echo "</a></li>
                        ";
        } else {
            // line 187
            echo "                            <li><a href=\"";
            echo ($context["register"] ?? null);
            echo "\">";
            echo ($context["text_register"] ?? null);
            echo "</a></li>
                            <li><a href=\"";
            // line 188
            echo ($context["login"] ?? null);
            echo "\">";
            echo ($context["text_login"] ?? null);
            echo "</a></li>
                        ";
        }
        // line 190
        echo "                    </ul>
                </li>
                <li><a href=\"";
        // line 192
        echo ($context["wishlist"] ?? null);
        echo "\" id=\"wishlist-total\" title=\"";
        echo ($context["text_wishlist"] ?? null);
        echo "\"><i class=\"fa fa-heart\"></i>
                        <span class=\"hidden-xs hidden-sm hidden-md\">";
        // line 193
        echo ($context["text_wishlist"] ?? null);
        echo "</span></a></li>
                <li><a href=\"";
        // line 194
        echo ($context["shopping_cart"] ?? null);
        echo "\" title=\"";
        echo ($context["text_shopping_cart"] ?? null);
        echo "\"><i class=\"fa fa-shopping-cart\"></i>
                        <span class=\"hidden-xs hidden-sm hidden-md\">";
        // line 195
        echo ($context["text_shopping_cart"] ?? null);
        echo "</span></a></li>
                <li><a href=\"";
        // line 196
        echo ($context["checkout"] ?? null);
        echo "\" title=\"";
        echo ($context["text_checkout"] ?? null);
        echo "\"><i class=\"fa fa-share\"></i> <span
                                class=\"hidden-xs hidden-sm hidden-md\">";
        // line 197
        echo ($context["text_checkout"] ?? null);
        echo "</span></a></li>
            </ul>
        </div>
    </div>
</nav>
<header>
    <div class=\"container\">
        <div class=\"row\">
            <div class=\"col-sm-4\">
                <div id=\"logo\">
                    ";
        // line 207
        if (($context["logo"] ?? null)) {
            // line 208
            echo "                        ";
            if ((($context["home"] ?? null) == ($context["og_url"] ?? null))) {
                // line 209
                echo "                            <img src=\"";
                echo ($context["logo"] ?? null);
                echo "\" title=\"";
                echo ($context["name"] ?? null);
                echo "\" alt=\"";
                echo ($context["name"] ?? null);
                echo "\" class=\"img-responsive\"/>
                        ";
            } else {
                // line 211
                echo "                            <a href=\"";
                echo ($context["home"] ?? null);
                echo "\"><img src=\"";
                echo ($context["logo"] ?? null);
                echo "\" title=\"";
                echo ($context["name"] ?? null);
                echo "\" alt=\"";
                echo ($context["name"] ?? null);
                echo "\"
                                                      class=\"img-responsive\"/></a>
                        ";
            }
            // line 214
            echo "                    ";
        } else {
            // line 215
            echo "                        <h1><a href=\"";
            echo ($context["home"] ?? null);
            echo "\">";
            echo ($context["name"] ?? null);
            echo "</a></h1>
                    ";
        }
        // line 217
        echo "                </div>
            </div>
            <div class=\"col-sm-5\">";
        // line 219
        echo ($context["search"] ?? null);
        echo "</div>
            <div class=\"col-sm-3\">";
        // line 220
        echo ($context["cart"] ?? null);
        echo "</div>
        </div>
    </div>
</header>
";
        // line 224
        echo ($context["menu"] ?? null);
        echo "
";
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
        return array (  479 => 224,  472 => 220,  468 => 219,  464 => 217,  456 => 215,  453 => 214,  440 => 211,  430 => 209,  427 => 208,  425 => 207,  412 => 197,  406 => 196,  402 => 195,  396 => 194,  392 => 193,  386 => 192,  382 => 190,  375 => 188,  368 => 187,  361 => 185,  355 => 184,  349 => 183,  343 => 182,  336 => 181,  334 => 180,  328 => 177,  321 => 175,  317 => 174,  313 => 173,  307 => 170,  303 => 169,  299 => 168,  188 => 60,  183 => 57,  174 => 55,  169 => 54,  158 => 52,  153 => 51,  140 => 45,  136 => 44,  128 => 38,  123 => 31,  117 => 29,  111 => 27,  109 => 26,  105 => 25,  99 => 23,  93 => 21,  90 => 20,  84 => 18,  82 => 17,  77 => 16,  71 => 14,  69 => 13,  65 => 12,  54 => 6,  47 => 4,  41 => 3,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "makeme/template/common/header.twig", "");
    }
}
