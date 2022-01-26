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

/* makeme/template/information/about.twig */
class __TwigTemplate_a374cfaa3d5a49f68e8568cf134e4aae5f95b57e78c5eec8a277488002beae37 extends \Twig\Template
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
        echo ($context["header"] ?? null);
        echo "
<main class=\"page-content\">
    <div class=\"container\">
        <nav class=\"page-breadcrumbs\">
            <ul class=\"page-breadcrumbs__desktop\" itemscope itemtype=\"https://schema.org/BreadcrumbList\">
                <li class=\"page-breadcrumbs__el\" itemprop=\"itemListElement\" itemscope itemtype=\"https://schema.org/ListItem\">
                    <a itemprop=\"item\" href=\"#\" class=\"page-breadcrumbs__el-link\">
                        <span itemprop=\"name\">Главная</span>
                        <meta itemprop=\"position\" content=\"1\">
                    </a>
                </li>
                <li class=\"page-breadcrumbs__el\" itemprop=\"itemListElement\" itemscope itemtype=\"https://schema.org/ListItem\">
                    <a itemprop=\"item\" href=\"#\" class=\"page-breadcrumbs__el-link\">
                        <span itemprop=\"name\">Доставка и оплата</span>
                        <meta itemprop=\"position\" content=\"2\">
                    </a>
                </li>
            </ul>
            <a href=\"#\" class=\"page-breadcrumbs__back\">Назад</a>
        </nav>
    </div>
    <div class=\"about-page\">
        <section class=\"logo\">
            <div class=\"container\">
                <img src=\"catalog/view/theme/makeme/image/aboutPage/logoBig.svg\" alt=\"#\" class=\"lazy logo__img\">
            </div>
        </section>
        <section class=\"stages\">
            <div class=\"container\">
                <img
                        src=\"catalog/view/theme/makeme/image/aboutPage/girlInMask.png\"
                        data-srcset=\"
                img/aboutPage/girlInMask.png 767w, 
                img/aboutPage/girlInMask@2x.png 1199w, 
                img/aboutPage/girlInMask@3x.png 1920w
              \"
                        alt=\"#\"
                        class=\"lazy stages__img\"
                >
                <ol class=\"stages__list\">
                    <li class=\"stages__list-el\">
                        <span class=\"stages__list-el-number\">1</span>
                        <h4 class=\"stages__list-el-title\">Создание рецептуры</h4>
                        <p class=\"stages__list-el-text\">
                            Мы создаем средства по твои рецептам. Косметика производится исключительно на профессиональном оборудовании
                        </p>
                    </li>
                    <li class=\"stages__list-el\">
                        <span class=\"stages__list-el-number\">2</span>
                        <h4 class=\"stages__list-el-title\">Заказ своего средства</h4>
                        <p class=\"stages__list-el-text\">Мы создаем средства по твои рецептам. Косметика производится исключительно на профессиональном оборудовании</p>
                    </li>
                    <li class=\"stages__list-el\">
                        <span class=\"stages__list-el-number\">3</span>
                        <h4 class=\"stages__list-el-title\">Производство</h4>
                        <p class=\"stages__list-el-text\">Мы создаем средства по твои рецептам. Косметика производится исключительно на профессиональном оборудовании</p>
                    </li>
                    <li class=\"stages__list-el\">
                        <span class=\"stages__list-el-number\">4</span>
                        <h4 class=\"stages__list-el-title\">Доставка</h4>
                        <p class=\"stages__list-el-text\">Мы создаем средства по твои рецептам. Косметика производится исключительно на профессиональном оборудовании</p>
                    </li>
                </ol>
            </div>
        </section>
        <section class=\"aboutProduct\">
            <img src=\"catalog/view/theme/makeme/image/aboutPage/aboutShampooBG.png\" alt=\"#\" class=\"lazy parallaxBalls\">
            <div class=\"container\">
                <img
                        src=\"catalog/view/theme/makeme/image/aboutPage/shampoo2.png\"
                        data-srcset=\"
                img/aboutPage/shampoo2.png 767w, 
                img/aboutPage/shampoo2@2x.png 1199w, 
                img/aboutPage/shampoo2@3x.png 1920w
              \"
                        alt=\"#\"
                        class=\"lazy aboutProduct__img\"
                >
                <ul class=\"aboutProduct__list\">
                    <li class=\"aboutProduct__list-el\">
                        <img src=\"catalog/view/theme/makeme/image/aboutPage/aboutIcon1.svg\" alt=\"#\" class=\"lazy aboutProduct__list-el-icon\">
                        <h4 class=\"aboutProduct__list-el-title\">Индивидуальное производство</h4>
                        <p class=\"aboutProduct__list-el-text\">Мы создаем средства по твои рецептам. Самая современная лаборатория.В своей работе мы используем натуральное сырье, которое соответствует международным стандартам.</p>
                    </li>
                    <li class=\"aboutProduct__list-el\">
                        <img src=\"catalog/view/theme/makeme/image/aboutPage/aboutIcon2.svg\" alt=\"#\" class=\"lazy aboutProduct__list-el-icon\">
                        <h4 class=\"aboutProduct__list-el-title\">Онлайн лабаратория</h4>
                        <p class=\"aboutProduct__list-el-text\">Мы создаем средства по твои рецептам. Косметика производится исключительно на профессиональном оборудовании по специальной лабораторной стали и других материалов, которые должны быть на производстве.</p>
                    </li>
                    <li class=\"aboutProduct__list-el\">
                        <img src=\"catalog/view/theme/makeme/image/aboutPage/aboutIcon3.svg\" alt=\"#\" class=\"lazy aboutProduct__list-el-icon\">
                        <h4 class=\"aboutProduct__list-el-title\">Натуральные составы</h4>
                        <p class=\"aboutProduct__list-el-text\">Мы создаем средства по твои рецептам. Самая современная лаборатория.В своей работе мы используем натуральное сырье, которое соответствует международным стандартам.</p>
                    </li>
                    <li class=\"aboutProduct__list-el\">
                        <img src=\"catalog/view/theme/makeme/image/aboutPage/aboutIcon4.svg\" alt=\"#\" class=\"lazy aboutProduct__list-el-icon\">
                        <h4 class=\"aboutProduct__list-el-title\">Натуральные составы</h4>
                        <p class=\"aboutProduct__list-el-text\">Мы создаем средства по твои рецептам. Самая современная лаборатория. В своей работе мы используем натуральное сырье, которое соответствует международным стандартам.</p>
                    </li>
                </ul>
            </div>
        </section>
        <section class=\"infoBlock\">
            <div class=\"container\">
                <div class=\"row flex-lg-row-reverse\">
                    <div class=\"col-md-6 position-relative\">
                        <img src=\"catalog/view/theme/makeme/image/aboutPage/aboutWithUsBG.png\" alt=\"#\" class=\"lazy parallaxBalls\">
                        <div class=\"infoBlock__imgContainer\">
                            <img
                                    src=\"catalog/view/theme/makeme/image/aboutPage/aboutWithUsImg.png\"
                                    data-srcset=\"
                      img/aboutPage/aboutWithUsImg.png 767w, 
                      img/aboutPage/aboutWithUsImg@2x.png 1199w, 
                      img/aboutPage/aboutWithUsImg@3x.png 1920w
                    \"
                                    alt=\"#\"
                                    class=\"lazy infoBlock__img\"
                            >
                        </div>
                    </div>
                    <div class=\"col-md-6\">
                        <div class=\"infoBlock__body\">
                            <h2 class=\"infoBlock__title\">Здесь. С нами. <span class=\"color-primary\">В моменте.</span></h2>
                            <p class=\"infoBlock__text\">На планете 8 миллиардов вас, каждый со своими волосами, кожей, настроением, стилем и предпочтениями. Итак, мы можем предположить, что вы все хотите лечить и ухаживать за своими волосами, кожей и телом одинаково, верно? Да, нам это тоже показалось неуместным.<br><br>
                                Назови нас сумасшедшими, но мы думаем, что для удовлетворения всех этих уникальных людей требуется нечто большее, чем одна или две формулы. Вот где мы вступаем в игру.</p>
                            <a href=\"#\" class=\"button button--main button--arrow infoBlock__button\">Создать средство</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <img src=\"catalog/view/theme/makeme/image/aboutPage/footerBubbles.png\" alt=\"#\" class=\"lazy footerBubbles\">
    </div>
</main>
";
        // line 135
        echo ($context["footer"] ?? null);
        echo "

";
    }

    public function getTemplateName()
    {
        return "makeme/template/information/about.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  174 => 135,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "makeme/template/information/about.twig", "");
    }
}
