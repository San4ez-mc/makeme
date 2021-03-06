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

/* makeme/template/constructor/index.twig */
class __TwigTemplate_131a9ca8cbcb511ac7f5f343957cff8cd43b6a41876e3c9453d2e69cb127c8c4 extends \Twig\Template
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
                        <span itemprop=\"name\">Конструктор</span>
                        <meta itemprop=\"position\" content=\"2\">
                    </a>
                </li>
            </ul>
            <a href=\"#\" class=\"page-breadcrumbs__back\">Назад</a>
        </nav>
    </div>
    <div class=\"constructorTabs\">

        <div class=\"tab-content\">
            <div class=\"tab-pane fade show active\" id=\"el1\">
                <div class=\"constructorTabs__tab constructorTabs__tab--1\">
                    <div class=\"container\">
                        <div class=\"constructorTabs__tab-header\">
                            <div class=\"constructorTabs__pretitle\">1 \\ 3 вопросов</div>
                            <h2 class=\"section__title constructorTabs__title\">Давай сделаем это вместе</h2>
                            <p class=\"constructorTabs__text\">Выбери средство которое ты бы хотела сделать, а мы тебе поможем в этом!</p>
                        </div>
                        <div class=\"constructorTabs__tab-body\">
                            <div class=\"row\">
                                <div class=\"col-lg-4 col-sm-6 col-12\">
                                    <label class=\"constructorTabs__el\">
                                        <input type=\"radio\" name=\"el1\" class=\"constructorTabs__el-input\">
                                        <span class=\"constructorTabs__el-body\">
                            <span class=\"constructorTabs__el-imgContainer\">
                              <img src=\"catalog/view/theme/makeme/image/constructorGirl1.png\" alt=\"#\" class=\"lazy constructorTabs__el-img constructorTabs__el-img--default\">
                              <img src=\"catalog/view/theme/makeme/image/constructorGirl1Hover.png\" alt=\"#\" class=\"lazy constructorTabs__el-img constructorTabs__el-img--hover\">
                            </span>
                            <span class=\"constructorTabs__el-title\">Лицо</span>
                            <span class=\"constructorTabs__el-text\">Больше не надо переживать о том подойдет ли тебе крем. </span>
                            <span class=\"constructorTabs__el-hover\">
                              <span class=\"constructorTabs__el-hover-text\">ВЫБРАТЬ</span>
                              <span class=\"constructorTabs__el-hover-icon\"></span>
                            </span>
                          </span>
                                    </label>
                                </div>
                                <div class=\"col-lg-4 col-sm-6 col-12\">
                                    <label class=\"constructorTabs__el\">
                                        <input type=\"radio\" name=\"el1\" class=\"constructorTabs__el-input\">
                                        <span class=\"constructorTabs__el-body\">
                            <span class=\"constructorTabs__el-imgContainer\">
                              <img src=\"catalog/view/theme/makeme/image/constructorGirl2.png\" alt=\"#\" class=\"lazy constructorTabs__el-img constructorTabs__el-img--default\">
                              <img src=\"catalog/view/theme/makeme/image/constructorGirl2Hover.png\" alt=\"#\" class=\"lazy constructorTabs__el-img constructorTabs__el-img--hover\">
                            </span>
                            <span class=\"constructorTabs__el-title\">Тело</span>
                            <span class=\"constructorTabs__el-text\">Больше не надо переживать о том подойдет ли тебе крем. </span>
                            <span class=\"constructorTabs__el-hover\">
                              <span class=\"constructorTabs__el-hover-text\">ВЫБРАТЬ</span>
                              <span class=\"constructorTabs__el-hover-icon\"></span>
                            </span>
                          </span>
                                    </label>
                                </div>
                                <div class=\"col-lg-4 col-sm-6 col-12\">
                                    <label class=\"constructorTabs__el\">
                                        <input type=\"radio\" name=\"el1\" class=\"constructorTabs__el-input\">
                                        <span class=\"constructorTabs__el-body\">
                            <span class=\"constructorTabs__el-imgContainer\">
                              <img src=\"catalog/view/theme/makeme/image/constructorGirl3.png\" alt=\"#\" class=\"lazy constructorTabs__el-img constructorTabs__el-img--default\">
                              <img src=\"catalog/view/theme/makeme/image/constructorGirl3Hover.png\" alt=\"#\" class=\"lazy constructorTabs__el-img constructorTabs__el-img--hover\">
                            </span>
                            <span class=\"constructorTabs__el-title\">Волосы</span>
                            <span class=\"constructorTabs__el-text\">Больше не надо переживать о том подойдет ли тебе крем. </span>
                            <span class=\"constructorTabs__el-hover\">
                              <span class=\"constructorTabs__el-hover-text\">ВЫБРАТЬ</span>
                              <span class=\"constructorTabs__el-hover-icon\"></span>
                            </span>
                          </span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class=\"tab-pane fade\" id=\"el2\">
                <div class=\"constructorTabs__tab constructorTabs__tab--2\">
                    <div class=\"container\">
                        <div class=\"constructorTabs__tab-header\">
                            <div class=\"constructorTabs__pretitle\">2 \\ 3 вопросов</div>
                            <h2 class=\"section__title constructorTabs__title\">Давай сделаем это вместе</h2>
                            <p class=\"constructorTabs__text\">Выбери тип продукта который ты бы хотела сделать.</p>
                        </div>
                        <div class=\"constructorTabs__tab-body\">
                            <div class=\"row\">
                                <div class=\"col-lg-4 col-sm-6 col-12\">
                                    <label class=\"constructorTabs__el\">
                                        <input type=\"radio\" name=\"el2\" class=\"constructorTabs__el-input\">
                                        <span class=\"constructorTabs__el-body\">
                            <span class=\"constructorTabs__el-imgContainer\">
                              <img src=\"catalog/view/theme/makeme/image/constructorProduct1.png\" alt=\"#\" class=\"lazy constructorTabs__el-img constructorTabs__el-img--default\">
                              <img src=\"catalog/view/theme/makeme/image/constructorProduct1Hover.png\" alt=\"#\" class=\"lazy constructorTabs__el-img constructorTabs__el-img--hover\">
                            </span>
                            <span class=\"constructorTabs__el-title\">Крем</span>
                            <span class=\"constructorTabs__el-text\">Больше не надо переживать о том подойдет ли тебе крем. </span>
                            <span class=\"constructorTabs__el-hover\">
                              <span class=\"constructorTabs__el-hover-text\">ВЫБРАТЬ</span>
                              <span class=\"constructorTabs__el-hover-icon\"></span>
                            </span>
                          </span>
                                    </label>
                                </div>
                                <div class=\"col-lg-4 col-sm-6 col-12\">
                                    <label class=\"constructorTabs__el\">
                                        <input type=\"radio\" name=\"el2\" class=\"constructorTabs__el-input\">
                                        <span class=\"constructorTabs__el-body\">
                            <span class=\"constructorTabs__el-imgContainer\">
                              <img src=\"catalog/view/theme/makeme/image/constructorProduct2.png\" alt=\"#\" class=\"lazy constructorTabs__el-img constructorTabs__el-img--default\">
                              <img src=\"catalog/view/theme/makeme/image/constructorProduct2Hover.png\" alt=\"#\" class=\"lazy constructorTabs__el-img constructorTabs__el-img--hover\">
                            </span>
                            <span class=\"constructorTabs__el-title\">Очищение</span>
                            <span class=\"constructorTabs__el-text\">Больше не надо переживать о том подойдет ли тебе крем. </span>
                            <span class=\"constructorTabs__el-hover\">
                              <span class=\"constructorTabs__el-hover-text\">ВЫБРАТЬ</span>
                              <span class=\"constructorTabs__el-hover-icon\"></span>
                            </span>
                          </span>
                                    </label>
                                </div>
                                <div class=\"col-lg-4 col-sm-6 col-12\">
                                    <label class=\"constructorTabs__el\">
                                        <input type=\"radio\" name=\"el2\" class=\"constructorTabs__el-input\">
                                        <span class=\"constructorTabs__el-body\">
                            <span class=\"constructorTabs__el-imgContainer\">
                              <img src=\"catalog/view/theme/makeme/image/constructorProduct3.png\" alt=\"#\" class=\"lazy constructorTabs__el-img constructorTabs__el-img--default\">
                              <img src=\"catalog/view/theme/makeme/image/constructorProduct3Hover.png\" alt=\"#\" class=\"lazy constructorTabs__el-img constructorTabs__el-img--hover\">
                            </span>
                            <span class=\"constructorTabs__el-title\">Маска</span>
                            <span class=\"constructorTabs__el-text\">Больше не надо переживать о том подойдет ли тебе крем. </span>
                            <span class=\"constructorTabs__el-hover\">
                              <span class=\"constructorTabs__el-hover-text\">ВЫБРАТЬ</span>
                              <span class=\"constructorTabs__el-hover-icon\"></span>
                            </span>
                          </span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class=\"tab-pane fade\" id=\"el3\">
                <div class=\"constructorTabs__tab constructorTabs__tab--3\">
                    <div class=\"container\">
                        <div class=\"constructorTabs__tab-header\">
                            <div class=\"constructorTabs__pretitle\">3 \\ 3 вопросов</div>
                            <h2 class=\"section__title constructorTabs__title\">Давай сделаем это вместе</h2>
                            <p class=\"constructorTabs__text\">Выбери тип своей кожи, а мы предложим тебе максимально эфективные компоненты</p>
                        </div>
                        <div class=\"constructorTabs__tab-body\">
                            <div class=\"row\">
                                <div class=\"col-sm-6 col-12\">
                                    <label class=\"constructorTabs__skinType\">
                                        <input type=\"radio\" name=\"el3\" class=\"constructorTabs__skinType-input\">
                                        <span class=\"constructorTabs__skinType-body constructorTabs__skinType-body--1\">Сухая</span>
                                    </label>
                                </div>
                                <div class=\"col-sm-6 col-12\">
                                    <label class=\"constructorTabs__skinType\">
                                        <input type=\"radio\" name=\"el3\" class=\"constructorTabs__skinType-input\">
                                        <span class=\"constructorTabs__skinType-body constructorTabs__skinType-body--2\">Жирная</span>
                                    </label>
                                </div>
                                <div class=\"col-sm-6 col-12\">
                                    <label class=\"constructorTabs__skinType\">
                                        <input type=\"radio\" name=\"el3\" class=\"constructorTabs__skinType-input\">
                                        <span class=\"constructorTabs__skinType-body constructorTabs__skinType-body--3\">Нормальная и комбинированая</span>
                                    </label>
                                </div>
                                <div class=\"col-sm-6 col-12\">
                                    <label class=\"constructorTabs__skinType\">
                                        <input type=\"radio\" name=\"el3\" class=\"constructorTabs__skinType-input\">
                                        <span class=\"constructorTabs__skinType-body constructorTabs__skinType-body--4\">Возрастная</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class=\"container\">
            <div class=\"nav nav-tabs constructorTabs__nav\">
                <a class=\"constructorTabs__nav-el active\" data-toggle=\"tab\" href=\"#el1\"></a>
                <a class=\"constructorTabs__nav-el\" href=\"#el2\"></a>
                <a class=\"constructorTabs__nav-el\" href=\"#el3\"></a>
            </div>
        </div>
    </div>
    <div class=\"container\">
        <aside class=\"section\">
            <div class=\"owl-carousel ticker\">
                <span class=\"ticker__el\">Нет парабенов</span>
                <span class=\"ticker__el\">натуральные компоненты</span>
                <span class=\"ticker__el\">Нет химии</span>
                <span class=\"ticker__el\">Современная лаборатория</span>
                <span class=\"ticker__el\">Нет парабенов</span>
                <span class=\"ticker__el\">натуральные компоненты</span>
                <span class=\"ticker__el\">Нет химии</span>
                <span class=\"ticker__el\">Современная лаборатория</span>
            </div>
        </aside>
        <section class=\"section\">
            <div class=\"section__header d-flex align-items-center justify-content-between flex-wrap\">
                <h2 class=\"section__title mr-4\"><span class=\"color-primary\">Рекомендации</span> лаборатории</h2>
                <a href=\"#\" class=\"showMore\">Смотреть больше</a>
            </div>
            <div class=\"owl-carousel carousel-3els\">
                <div class=\"blogItem\">
                    <a class=\"blogItem__imgContainer\" href=\"#\">
                        <img src=\"catalog/view/theme/makeme/image/blog1.jpg\"
                             data-srcset=\"
                    img/blog1.jpg 767w, 
                    img/blog1@2x.jpg 1199w, 
                    img/blog1@3x.jpg 1920w
                  \"   alt=\"#\" class=\"lazy blogItem__img\">
                    </a>
                    <div class=\"blogItem__desc\">
                        <div class=\"blogItem__desc-header\">
                            <span class=\"blogItem__type blogItem__type--news\">Новости</span>
                            <time class=\"blogItem__date\" datetime=\"2021-04-26\">26 апреля 2021</time>
                        </div>
                        <p class=\"blogItem__text\"><a href=\"#\">Тоник для жирной кожи с экстрактом лаванды и мяты</a></p>
                        <div class=\"blogItem__stats\">
                            <div class=\"like\">
                                <label class=\"like__button\">
                                    <input type=\"checkbox\" class=\"like__input\">
                                    <span class=\"like__body\"></span>
                                </label>
                                <span class=\"like__quantity\">10</span>
                            </div>
                            <a href=\"#\" class=\"blogItem__comments\">0</a>
                        </div>
                    </div>
                </div>
                <div class=\"blogItem\">
                    <a class=\"blogItem__imgContainer\" href=\"#\">
                        <img src=\"catalog/view/theme/makeme/image/blog1.jpg\"
                             data-srcset=\"
                    img/blog1.jpg 767w, 
                    img/blog1@2x.jpg 1199w, 
                    img/blog1@3x.jpg 1920w
                  \"   alt=\"#\" class=\"lazy blogItem__img\">
                    </a>
                    <div class=\"blogItem__desc\">
                        <div class=\"blogItem__desc-header\">
                            <span class=\"blogItem__type blogItem__type--recipes\">Рецепты</span>
                            <time class=\"blogItem__date\" datetime=\"2021-04-26\">26 апреля 2021</time>
                        </div>
                        <p class=\"blogItem__text\"><a href=\"#\">Тоник для жирной кожи с экстрактом лаванды и мяты</a></p>
                        <div class=\"blogItem__stats\">
                            <div class=\"like\">
                                <label class=\"like__button\">
                                    <input type=\"checkbox\" class=\"like__input\">
                                    <span class=\"like__body\"></span>
                                </label>
                                <span class=\"like__quantity\">10</span>
                            </div>
                            <a href=\"#\" class=\"blogItem__comments\">0</a>
                        </div>
                    </div>
                </div>
                <div class=\"blogItem\">
                    <a class=\"blogItem__imgContainer\" href=\"#\">
                        <img src=\"catalog/view/theme/makeme/image/blog1.jpg\"
                             data-srcset=\"
                    img/blog1.jpg 767w, 
                    img/blog1@2x.jpg 1199w, 
                    img/blog1@3x.jpg 1920w
                  \"   alt=\"#\" class=\"lazy blogItem__img\">
                    </a>
                    <div class=\"blogItem__desc\">
                        <div class=\"blogItem__desc-header\">
                            <span class=\"blogItem__type blogItem__type--recipes\">Рецепты</span>
                            <time class=\"blogItem__date\" datetime=\"2021-04-26\">26 апреля 2021</time>
                        </div>
                        <p class=\"blogItem__text\"><a href=\"#\">Тоник для жирной кожи с экстрактом лаванды и мяты</a></p>
                        <div class=\"blogItem__stats\">
                            <div class=\"like\">
                                <label class=\"like__button\">
                                    <input type=\"checkbox\" class=\"like__input\">
                                    <span class=\"like__body\"></span>
                                </label>
                                <span class=\"like__quantity\">10</span>
                            </div>
                            <a href=\"#\" class=\"blogItem__comments\">0</a>
                        </div>
                    </div>
                </div>
                <div class=\"blogItem\">
                    <a class=\"blogItem__imgContainer\" href=\"#\">
                        <img src=\"catalog/view/theme/makeme/image/blog1.jpg\"
                             data-srcset=\"
                    img/blog1.jpg 767w, 
                    img/blog1@2x.jpg 1199w, 
                    img/blog1@3x.jpg 1920w
                  \"   alt=\"#\" class=\"lazy blogItem__img\">
                    </a>
                    <div class=\"blogItem__desc\">
                        <div class=\"blogItem__desc-header\">
                            <span class=\"blogItem__type blogItem__type--recipes\">Рецепты</span>
                            <time class=\"blogItem__date\" datetime=\"2021-04-26\">26 апреля 2021</time>
                        </div>
                        <p class=\"blogItem__text\"><a href=\"#\">Тоник для жирной кожи с экстрактом лаванды и мяты</a></p>
                        <div class=\"blogItem__stats\">
                            <div class=\"like\">
                                <label class=\"like__button\">
                                    <input type=\"checkbox\" class=\"like__input\">
                                    <span class=\"like__body\"></span>
                                </label>
                                <span class=\"like__quantity\">10</span>
                            </div>
                            <a href=\"#\" class=\"blogItem__comments\">0</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <aside class=\"section createYours yourNewsletter\">
            <div class=\"createYours__title\"><span class=\"color-primary\">ТВОЯ</span> рассылка!</div>
            <p class=\"createYours__text\">Самые выгодные цены, крутые акции и персональные предложения в твоей рассылке</p>
            <form action=\"#\" class=\"yourNewsletter__form\">
                <input type=\"text\" class=\"yourNewsletter__form-input\" placeholder=\"Введите свою почту\">
                <button type=\"submit\" class=\"button button--primary yourNewsletter__form-button\">ПОДПИСАТЬСЯ</button>
            </form>
        </aside>
    </div>

</main>
";
        // line 346
        echo ($context["footer"] ?? null);
        echo "
";
    }

    public function getTemplateName()
    {
        return "makeme/template/constructor/index.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  385 => 346,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "makeme/template/constructor/index.twig", "");
    }
}
