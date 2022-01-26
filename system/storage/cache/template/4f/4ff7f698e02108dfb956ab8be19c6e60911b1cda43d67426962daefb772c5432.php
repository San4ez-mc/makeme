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

/* makeme/template/common/footer.twig */
class __TwigTemplate_18eea2a35134c96902b5b4d265edca731f31cbac0dd40d48f1fa61342689c7b8 extends \Twig\Template
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
        echo "<footer class=\"page-footer\" itemscope itemtype=\"https://schema.org/WPFooter\">
    <div class=\"container\">
        <div class=\"row\">
            <div class=\"col-xl-4\">
                <a href=\"#\" class=\"page-footer__logo\" itemscope itemtype=\"https://schema.org/Brand\">
                    <img src=\"catalog/view/theme/makeme/image/icons/logo-footer.svg\" alt=\"logo\" class=\"page-footer__logo-img\" itemprop=\"logo\">
                </a>
                <p class=\"copyright\">© <span itemprop=\"copyrightYear\">2016</span> - 2022 Make My - Все права защищены.
                </p>
            </div>
            <div class=\"col-xl-5 col-lg-8 col-md-7\">
                <nav class=\"page-footer__menu\" itemscope itemtype=\"https://schema.org/SiteNavigationElement\">
                    <div class=\"row\">
                        <div class=\"col-lg-6\">
                            <ul>
                                <li itemprop=\"name\">
                                    <a itemprop=\"url\" href=\"#\" class=\"page-footer__menu-el\">Конструктор</a>
                                </li>
                                <li itemprop=\"name\">
                                    <a itemprop=\"url\" href=\"#\" class=\"page-footer__menu-el\">Каталог</a>
                                </li>
                                <li itemprop=\"name\">
                                    <a itemprop=\"url\" href=\"#\"
                                       class=\"page-footer__menu-el\">Компоненты</a>
                                </li>
                                <li itemprop=\"name\">
                                    <a itemprop=\"url\" href=\"#\" class=\"page-footer__menu-el\">О нас</a>
                                </li>
                            </ul>

                        </div>
                        <div class=\"col-lg-6\">
                            <ul>
                                <li itemprop=\"name\">
                                    <a itemprop=\"url\" href=\"#\" class=\"page-footer__menu-el\">Доставка и
                                        оплата</a>
                                </li>
                                <li itemprop=\"name\">
                                    <a itemprop=\"url\" href=\"#\"
                                       class=\"page-footer__menu-el color-primary\">MM Club</a>
                                </li>
                                <li itemprop=\"name\">
                                    <a itemprop=\"url\" href=\"#\" class=\"page-footer__menu-el\">Акции</a>
                                </li>
                                <li itemprop=\"name\">
                                    <a itemprop=\"url\" href=\"#\" class=\"page-footer__menu-el\">Блог</a>
                                </li>
                                <li itemprop=\"name\">
                                    <a itemprop=\"url\" href=\"#\" class=\"page-footer__menu-el\">Публичная
                                        оферта</a>
                                    </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
            <div class=\"col-xl-3 col-lg-4 col-md-5\">
                <div class=\"page-footer__menu-info\" itemscope itemtype=\"https://schema.org/LocalBusiness\">
                    <span class=\"d-none\" itemprop=\"name\">Make My</span>
                    <div class=\"page-footer__menu-info-el\">
                        <div class=\"page-footer__menu-info-el-title\">График работы</div>
                        <div class=\"page-footer__menu-info-el-value\" itemprop=\"openingHours\">Круглосуточно</div>
                    </div>
                    <div class=\"page-footer__menu-info-el\">
                        <div class=\"page-footer__menu-info-el-title\">Местоположение</div>
                        <div class=\"page-footer__menu-info-el-value\" itemprop=\"address\" itemscope
                             itemtype=\"https://schema.org/PostalAddress\">
                            <span itemprop=\"addressLocality\">г. Киев </span>,
                            <span itemprop=\"streetAddress\">ул. Марко Вовчка, 18а</span>
                        </div>
                    </div>
                    <div class=\"page-footer__menu-info-el d-none\">
                        <div class=\"page-footer__menu-info-el-title\">Телефон</div>
                        <a href=\"tel:+74950000000\" class=\"page-footer__menu-info-el-value\" itemprop=\"telephone\">+74950000000</a>
                    </div>
                    <div class=\"page-footer__menu-info-el\">
                        <div class=\"page-footer__menu-info-el-title\">Соцсети</div>
                        <nav class=\"page-footer__socials\">
                            <a itemprop=\"sameAs\" href=\"#\" class=\"page-footer__socials-el\">
                                <i class=\"fab fa-facebook\"></i>
                            </a>
                            <a itemprop=\"sameAs\" href=\"#\" class=\"page-footer__socials-el\">
                                <i class=\"fab fa-facebook\"></i>
                            </a>
                            <a itemprop=\"sameAs\" href=\"#\" class=\"page-footer__socials-el\">
                                <i class=\"fab fa-facebook\"></i>
                            </a>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

<a class=\"toTop scrollto\" href=\"#header\"></a>


";
    }

    public function getTemplateName()
    {
        return "makeme/template/common/footer.twig";
    }

    public function getDebugInfo()
    {
        return array (  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "makeme/template/common/footer.twig", "");
    }
}
