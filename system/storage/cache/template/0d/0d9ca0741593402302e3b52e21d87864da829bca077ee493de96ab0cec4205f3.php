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

/* makeme/template/information/components.twig */
class __TwigTemplate_273a19e2f29dba869bb4ee85e3964e9a87d9c1773a7d2bc7eb943864c2e976b8 extends \Twig\Template
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
                        <span itemprop=\"name\">Компоненты</span>
                        <meta itemprop=\"position\" content=\"2\">
                    </a>
                </li>
            </ul>
            <a href=\"#\" class=\"page-breadcrumbs__back\">Назад</a>
        </nav>

        <section class=\"section aboutComponents\">
            <h1 class=\"section__title\">О компонентах</h1>

            <nav class=\"aboutComponents__nav\">
                <a href=\"#\" class=\"aboutComponents__nav-el aboutComponents__nav-el--all\">Все</a>
                <a href=\"#\" class=\"aboutComponents__nav-el aboutComponents__nav-el--active\">Активы</a>
                <a href=\"#\" class=\"aboutComponents__nav-el aboutComponents__nav-el--extracts\">Экстракты</a>
                <a href=\"#\" class=\"aboutComponents__nav-el aboutComponents__nav-el--oils1\">Эфирные масла</a>
                <a href=\"#\" class=\"aboutComponents__nav-el aboutComponents__nav-el--vitamins\">Витамины</a>
                <a href=\"#\" class=\"aboutComponents__nav-el aboutComponents__nav-el--oils2\">Базовые масла</a>
                <a href=\"#\" class=\"aboutComponents__nav-el aboutComponents__nav-el--base\">Основы</a>
            </nav>

            <div class=\"row\">
                <div class=\"col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12\">
                    <a href=\"#\" class=\"aboutComponents__el\">
                <span class=\"aboutComponents__el-imgContainer\">
                  <img src=\"catalog/view/theme/makeme/image/component1.png\" alt=\"#\" class=\"lazy aboutComponents__el-img\">
                </span>
                        <span class=\"aboutComponents__el-name\">Экстракт лаванды</span>
                        <span class=\"aboutComponents__el-text\">Является одним из лучших средств при угревой болезни: дезинфицирует воспаления, балансирует производство кожного сала (себума) и вместе с тем заживляет раны</span>
                    </a>
                </div>
                <div class=\"col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12\">
                    <a href=\"#\" class=\"aboutComponents__el\">
                <span class=\"aboutComponents__el-imgContainer\">
                  <img src=\"catalog/view/theme/makeme/image/component2.png\" alt=\"#\" class=\"lazy aboutComponents__el-img\">
                </span>
                        <span class=\"aboutComponents__el-name\">Экстракт арники</span>
                        <span class=\"aboutComponents__el-text\">Является одним из лучших средств при угревой болезни: дезинфицирует воспаления, балансирует производство кожного сала (себума) и вместе с тем заживляет раны</span>
                    </a>
                </div>
                <div class=\"col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12\">
                    <a href=\"#\" class=\"aboutComponents__el\">
                <span class=\"aboutComponents__el-imgContainer\">
                  <img src=\"catalog/view/theme/makeme/image/component3.png\" alt=\"#\" class=\"lazy aboutComponents__el-img\">
                </span>
                        <span class=\"aboutComponents__el-name\">Экстракт бадяги</span>
                        <span class=\"aboutComponents__el-text\">Является одним из лучших средств при угревой болезни: дезинфицирует воспаления, балансирует производство кожного сала (себума) и вместе с тем заживляет раны</span>
                    </a>
                </div>
                <div class=\"col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12\">
                    <a href=\"#\" class=\"aboutComponents__el\">
                <span class=\"aboutComponents__el-imgContainer\">
                  <img src=\"catalog/view/theme/makeme/image/component4.png\" alt=\"#\" class=\"lazy aboutComponents__el-img\">
                </span>
                        <span class=\"aboutComponents__el-name\">Актив ментол</span>
                        <span class=\"aboutComponents__el-text\">Является одним из лучших средств при угревой болезни: дезинфицирует воспаления, балансирует производство кожного сала (себума) и вместе с тем заживляет раны</span>
                    </a>
                </div>
                <div class=\"col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12\">
                    <a href=\"#\" class=\"aboutComponents__el\">
                <span class=\"aboutComponents__el-imgContainer\">
                  <img src=\"catalog/view/theme/makeme/image/component5.png\" alt=\"#\" class=\"lazy aboutComponents__el-img\">
                </span>
                        <span class=\"aboutComponents__el-name\">Экстракт лаванды</span>
                        <span class=\"aboutComponents__el-text\">Является одним из лучших средств при угревой болезни: дезинфицирует воспаления, балансирует производство кожного сала (себума) и вместе с тем заживляет раны</span>
                    </a>
                </div>
                <div class=\"col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12\">
                    <a href=\"#\" class=\"aboutComponents__el\">
                <span class=\"aboutComponents__el-imgContainer\">
                  <img src=\"catalog/view/theme/makeme/image/component6.png\" alt=\"#\" class=\"lazy aboutComponents__el-img\">
                </span>
                        <span class=\"aboutComponents__el-name\">Экстракт арники</span>
                        <span class=\"aboutComponents__el-text\">Является одним из лучших средств при угревой болезни: дезинфицирует воспаления, балансирует производство кожного сала (себума) и вместе с тем заживляет раны</span>
                    </a>
                </div>
                <div class=\"col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12\">
                    <a href=\"#\" class=\"aboutComponents__el\">
                <span class=\"aboutComponents__el-imgContainer\">
                  <img src=\"catalog/view/theme/makeme/image/component7.png\" alt=\"#\" class=\"lazy aboutComponents__el-img\">
                </span>
                        <span class=\"aboutComponents__el-name\">Экстракт бадяги</span>
                        <span class=\"aboutComponents__el-text\">Является одним из лучших средств при угревой болезни: дезинфицирует воспаления, балансирует производство кожного сала (себума) и вместе с тем заживляет раны</span>
                    </a>
                </div>
                <div class=\"col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12\">
                    <a href=\"#\" class=\"aboutComponents__el\">
                <span class=\"aboutComponents__el-imgContainer\">
                  <img src=\"catalog/view/theme/makeme/image/component8.png\" alt=\"#\" class=\"lazy aboutComponents__el-img\">
                </span>
                        <span class=\"aboutComponents__el-name\">Экстракт бадяги</span>
                        <span class=\"aboutComponents__el-text\">Является одним из лучших средств при угревой болезни: дезинфицирует воспаления, балансирует производство кожного сала (себума) и вместе с тем заживляет раны</span>
                    </a>
                </div>
                <div class=\"col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12\">
                    <a href=\"#\" class=\"aboutComponents__el\">
                <span class=\"aboutComponents__el-imgContainer\">
                  <img src=\"catalog/view/theme/makeme/image/component9.png\" alt=\"#\" class=\"lazy aboutComponents__el-img\">
                </span>
                        <span class=\"aboutComponents__el-name\">Актив ментол</span>
                        <span class=\"aboutComponents__el-text\">Является одним из лучших средств при угревой болезни: дезинфицирует воспаления, балансирует производство кожного сала (себума) и вместе с тем заживляет раны</span>
                    </a>
                </div>
                <div class=\"col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12\">
                    <a href=\"#\" class=\"aboutComponents__el\">
                <span class=\"aboutComponents__el-imgContainer\">
                  <img src=\"catalog/view/theme/makeme/image/component10.png\" alt=\"#\" class=\"lazy aboutComponents__el-img\">
                </span>
                        <span class=\"aboutComponents__el-name\">Актив ментол</span>
                        <span class=\"aboutComponents__el-text\">Является одним из лучших средств при угревой болезни: дезинфицирует воспаления, балансирует производство кожного сала (себума) и вместе с тем заживляет раны</span>
                    </a>
                </div>
                <div class=\"col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12\">
                    <a href=\"#\" class=\"aboutComponents__el\">
                <span class=\"aboutComponents__el-imgContainer\">
                  <img src=\"catalog/view/theme/makeme/image/component11.png\" alt=\"#\" class=\"lazy aboutComponents__el-img\">
                </span>
                        <span class=\"aboutComponents__el-name\">Актив ментол</span>
                        <span class=\"aboutComponents__el-text\">Является одним из лучших средств при угревой болезни: дезинфицирует воспаления, балансирует производство кожного сала (себума) и вместе с тем заживляет раны</span>
                    </a>
                </div>
                <div class=\"col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12\">
                    <a href=\"#\" class=\"aboutComponents__el\">
                <span class=\"aboutComponents__el-imgContainer\">
                  <img src=\"catalog/view/theme/makeme/image/component12.png\" alt=\"#\" class=\"lazy aboutComponents__el-img\">
                </span>
                        <span class=\"aboutComponents__el-name\">Актив ментол</span>
                        <span class=\"aboutComponents__el-text\">Является одним из лучших средств при угревой болезни: дезинфицирует воспаления, балансирует производство кожного сала (себума) и вместе с тем заживляет раны</span>
                    </a>
                </div>
                <div class=\"col-12\">
                    <a href=\"#\" class=\"button button--stroke button--reload stocks__loadMore\">
                        <span class=\"button__icon\"><i class=\"fas fa-sync-alt\"></i></span>
                        <span class=\"button__text\">Загрузить еще</span>
                    </a>
                    <nav class=\"pagination\">
                        <a href=\"#\" class=\"pagination__el active\">1</a>
                        <a href=\"#\" class=\"pagination__el\">2</a>
                        <a href=\"#\" class=\"pagination__el\">3</a>
                        <a href=\"#\" class=\"pagination__el\">4</a>
                        <a href=\"#\" class=\"pagination__el\">...</a>
                        <a href=\"#\" class=\"pagination__el\">10</a>
                    </nav>
                </div>
            </div>
        </section>

        <aside class=\"section createYours\">
            <div class=\"createYours__title\">Создай <span class=\"color-primary\">свое!</span></div>
            <p class=\"createYours__text\">Вместе с тобой мы создадим неповторимую косметику именно для тебя! Каждая баночка на 100% индивидуальна.</p>
            <a href=\"#\" class=\"button button--stroke createYours__button\">Создать средство</a>
        </aside>

        <section class=\"section seoText\">
            <h2 class=\"section__title\">Как создать косметику для себя</h2>
            <p class=\"seoText__text\">У нас можно купить косметику для волос и лица. В магазине есть продукты для восстановления повреждённых волос, а также средства для людей с проблемной кожей головы (жирная кожа, выпадение волос, перхоть). Приобретя в магазине данные средства, Ваши волосы приобретут блеск, станут эластичными, а также будут иметь вновь здоровый вид. Ассортимент магазина насколько разнообразный, что даже самые требовательные покупатели смогут подобрать для себя косметику класса люкс и обязательно останутся довольные приобретением.</p>
            <div class=\"collapse\" id=\"seoText__collapse\">
                <p class=\"seoText__text\">
                    У нас можно купить косметику для волос и лица. В магазине есть продукты для восстановления повреждённых волос, а также средства для людей с проблемной кожей головы (жирная кожа, выпадение волос, перхоть). Приобретя в магазине данные средства, Ваши волосы приобретут блеск, станут эластичными, а также будут иметь вновь здоровый вид. Ассортимент магазина насколько разнообразный, что даже самые требовательные покупатели смогут подобрать для себя косметику класса люкс и обязательно останутся довольные приобретением.
                </p>
            </div>
            <a data-toggle=\"collapse\" href=\"#seoText__collapse\" aria-expanded=\"false\" class=\"link1 seoText__link\">Показать все</a>
        </section>
    </div>
</main>
";
        // line 179
        echo ($context["footer"] ?? null);
        echo "

";
    }

    public function getTemplateName()
    {
        return "makeme/template/information/components.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  218 => 179,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "makeme/template/information/components.twig", "");
    }
}
