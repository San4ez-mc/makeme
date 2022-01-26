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

/* makeme/template/information/promo.twig */
class __TwigTemplate_536139f8143586496b140a54cd6dc4fe468dc235ad70e13a28ff27e4c56fb72f extends \Twig\Template
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
                        <span itemprop=\"name\">Акции</span>
                        <meta itemprop=\"position\" content=\"2\">
                    </a>
                </li>

            </ul>
            <a href=\"#\" class=\"page-breadcrumbs__back\">Назад</a>
        </nav>
        <section class=\"section stocks\">
            <h1 class=\"section__title\">Акции</h1>
            <div class=\"row\">
                <div class=\"col-md-6\">
                    <article class=\"stocks__el\">
                        <a href=\"#\" class=\"stocks__el-imgContainer\">
                            <img src=\"catalog/view/theme/makeme/image/stock1.jpg\" data-srcset=\"img/stock1.jpg 767w, img/stock1@2x.jpg 1199w, img/stock1@3x.jpg 1920w\"  alt=\"#\" class=\"lazy stocks__el-img\">
                        </a>
                        <div class=\"stocks__el-body\">
                            <h3 class=\"stocks__el-title\">
                                <a href=\"#\">Скидки до -70% на скрабирующие основы</a>
                            </h3>
                            <p class=\"stocks__el-text\">
                                <a href=\"#\">До 8 ноября каждое четвертое средство с наименьшей стоимостью в подарок... До 8 ноября каждое четвертое средство с наименьшей стоимостью в подарок...</a>
                            </p>
                        </div>
                    </article>
                </div>
                <div class=\"col-md-6\">
                    <article class=\"stocks__el\">
                        <a href=\"#\" class=\"stocks__el-imgContainer\">
                            <img src=\"catalog/view/theme/makeme/image/stock2.jpg\" data-srcset=\"img/stock2.jpg 767w, img/stock2@2x.jpg 1199w, img/stock2@3x.jpg 1920w\"  alt=\"#\" class=\"lazy stocks__el-img\">
                        </a>
                        <div class=\"stocks__el-body\">
                            <h3 class=\"stocks__el-title\">
                                <a href=\"#\">Скидки на бальзамы по уходу за волосами</a>
                            </h3>
                            <p class=\"stocks__el-text\">
                                <a href=\"#\">До 8 ноября каждое четвертое средство с наименьшей стоимостью в подарок...</a>
                            </p>
                        </div>
                    </article>
                </div>
                <div class=\"col-md-6\">
                    <article class=\"stocks__el\">
                        <a href=\"#\" class=\"stocks__el-imgContainer\">
                            <img src=\"catalog/view/theme/makeme/image/stock3.jpg\" data-srcset=\"img/stock3.jpg 767w, img/stock3@2x.jpg 1199w, img/stock3@3x.jpg 1920w\"  alt=\"#\" class=\"lazy stocks__el-img\">
                        </a>
                        <div class=\"stocks__el-body\">
                            <h3 class=\"stocks__el-title\">
                                <a href=\"#\">3=4! даже на товары со скидками!</a>
                            </h3>
                            <p class=\"stocks__el-text\">
                                <a href=\"#\">До 8 ноября каждое четвертое средство с наименьшей стоимостью в подарок...</a>
                            </p>
                        </div>
                    </article>
                </div>
                <div class=\"col-md-6\">
                    <article class=\"stocks__el\">
                        <a href=\"#\" class=\"stocks__el-imgContainer\">
                            <img src=\"catalog/view/theme/makeme/image/stock4.jpg\" data-srcset=\"img/stock4.jpg 767w, img/stock4@2x.jpg 1199w, img/stock4@3x.jpg 1920w\"  alt=\"#\" class=\"lazy stocks__el-img\">
                        </a>
                        <div class=\"stocks__el-body\">
                            <h3 class=\"stocks__el-title\">
                                <a href=\"#\">Скидки на бальзамы по уходу за волосами</a>
                            </h3>
                            <p class=\"stocks__el-text\">
                                <a href=\"#\">До 8 ноября каждое четвертое средство с наименьшей стоимостью в подарок...</a>
                            </p>
                        </div>
                    </article>
                </div>
                <div class=\"col-md-6\">
                    <article class=\"stocks__el\">
                        <a href=\"#\" class=\"stocks__el-imgContainer\">
                            <img src=\"catalog/view/theme/makeme/image/stock5.jpg\" data-srcset=\"img/stock5.jpg 767w, img/stock5@2x.jpg 1199w, img/stock5@3x.jpg 1920w\"  alt=\"#\" class=\"lazy stocks__el-img\">
                        </a>
                        <div class=\"stocks__el-body\">
                            <h3 class=\"stocks__el-title\">
                                <a href=\"#\">3=4! даже на товары со скидками!</a>
                            </h3>
                            <p class=\"stocks__el-text\">
                                <a href=\"#\">До 8 ноября каждое четвертое средство с наименьшей стоимостью в подарок...</a>
                            </p>
                        </div>
                    </article>
                </div>
                <div class=\"col-md-6\">
                    <article class=\"stocks__el\">
                        <a href=\"#\" class=\"stocks__el-imgContainer\">
                            <img src=\"catalog/view/theme/makeme/image/stock6.jpg\" data-srcset=\"img/stock6.jpg 767w, img/stock6@2x.jpg 1199w, img/stock6@3x.jpg 1920w\"  alt=\"#\" class=\"lazy stocks__el-img\">
                        </a>
                        <div class=\"stocks__el-body\">
                            <h3 class=\"stocks__el-title\">
                                <a href=\"#\">3=4! даже на товары со скидками!</a>
                            </h3>
                            <p class=\"stocks__el-text\">
                                <a href=\"#\">До 8 ноября каждое четвертое средство с наименьшей стоимостью в подарок...</a>
                            </p>
                        </div>
                    </article>
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
            <p class=\"seoText__text\">У нас можно купить косметику для волос и лица. В магазине есть продукты для восстановления повреждённых волос, а также средства для людей с проблемной кожей головы (жирная кожа, выпадение волос, перхоть). Приобретя в магазине данные средства, Ваши волосы приобретут блеск, станут эластичными, а также будут иметь вновь здоровый вид. Ассортимент магазина насколько разнообразный, что даже самые требовательные покупатели смогут подобрать для себя косметику класса люкс и обязательно останутся довольные приобретением.
            </p>
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
        // line 151
        echo ($context["footer"] ?? null);
        echo "

";
    }

    public function getTemplateName()
    {
        return "makeme/template/information/promo.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  190 => 151,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "makeme/template/information/promo.twig", "");
    }
}
