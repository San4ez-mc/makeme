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

/* makeme/template/product/catalog.twig */
class __TwigTemplate_1caab18a7d55f446d9252a324b4f330d508662537e404938c49d4feafe81d56c extends \Twig\Template
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
        <section class=\"section stocksProducts\">
            <div class=\"row\">
                <div class=\"col-12\">
                    <h1 class=\"section__title text-md-left text-center\">Готовые решения <span class=\"productsQuantuty\">234 продукта</span></h1>
                </div>
                <div class=\"col-xl-3 col-lg-4\">
                    <div class=\"productFilters__bg productFilters--toggle\"></div>
                    <aside class=\"productFilters\">
                        <div class=\"productFilters__close productFilters--toggle\"></div>
                        <div class=\"productFilters__el\">
                            <button class=\"productFilters__el-toggle\" type=\"button\" data-toggle=\"collapse\" data-target=\"#productFilters__el4\" aria-expanded=\"true\">
                                НАЗВАНИЕ
                            </button>
                            <div class=\"collapse productFilters__el-collapse show\" id=\"productFilters__el4\">
                                <div class=\"productFilters__el-body\">
                                    <input type=\"text\" class=\"textInput\" placeholder=\"Введите название средства\">
                                </div>
                            </div>
                        </div>

                        <div class=\"productFilters__el\">
                            <button class=\"productFilters__el-toggle\" type=\"button\" data-toggle=\"collapse\" data-target=\"#productFilters__el3\" aria-expanded=\"true\">
                                Цена
                            </button>
                            <div class=\"collapse productFilters__el-collapse show\" id=\"productFilters__el3\">
                                <div class=\"productFilters__el-body\">
                                    <div class=\"priceInputs\">
                                        <input type=\"text\" class=\"textInput number\" placeholder=\"0\">
                                        <span class=\"priceInputs__line\">-</span>
                                        <input type=\"text\" class=\"textInput number\" placeholder=\"59999\">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class=\"productFilters__el\">
                            <button class=\"productFilters__el-toggle\" type=\"button\" data-toggle=\"collapse\" data-target=\"#productFilters__el1\" aria-expanded=\"true\">
                                Основные фильтры
                            </button>
                            <div class=\"collapse productFilters__el-collapse show\" id=\"productFilters__el1\">
                                <div class=\"productFilters__el-body\">
                                    <label class=\"checkboxEl\">
                                        <input type=\"checkbox\" class=\"checkboxEl__input\" checked>
                                        <span class=\"checkboxEl__body\">Выбор экспертов</span>
                                    </label>
                                    <label class=\"checkboxEl\">
                                        <input type=\"checkbox\" class=\"checkboxEl__input\">
                                        <span class=\"checkboxEl__body\">Выбор селебритис</span>
                                    </label>
                                    <label class=\"checkboxEl\">
                                        <input type=\"checkbox\" class=\"checkboxEl__input\">
                                        <span class=\"checkboxEl__body\">Выбор покупателей</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class=\"productFilters__el\">
                            <button class=\"productFilters__el-toggle\" type=\"button\" data-toggle=\"collapse\" data-target=\"#productFilters__el2\" aria-expanded=\"true\">
                                ГРУППА ТОВАРОВ
                            </button>
                            <div class=\"collapse productFilters__el-collapse show\" id=\"productFilters__el2\">
                                <div class=\"productFilters__el-body\">
                                    <label class=\"checkboxEl\">
                                        <input type=\"checkbox\" class=\"checkboxEl__input\" checked>
                                        <span class=\"checkboxEl__body\">Шампунь</span>
                                    </label>
                                    <label class=\"checkboxEl\">
                                        <input type=\"checkbox\" class=\"checkboxEl__input\">
                                        <span class=\"checkboxEl__body\">Крем для лица</span>
                                    </label>
                                    <label class=\"checkboxEl\">
                                        <input type=\"checkbox\" class=\"checkboxEl__input\">
                                        <span class=\"checkboxEl__body\">Бальзам</span>
                                    </label>
                                    <label class=\"checkboxEl\">
                                        <input type=\"checkbox\" class=\"checkboxEl__input\">
                                        <span class=\"checkboxEl__body\">Гель для душа</span>
                                    </label>
                                    <label class=\"checkboxEl\">
                                        <input type=\"checkbox\" class=\"checkboxEl__input\">
                                        <span class=\"checkboxEl__body\">Скраб для тела</span>
                                    </label>
                                    <label class=\"checkboxEl\">
                                        <input type=\"checkbox\" class=\"checkboxEl__input\">
                                        <span class=\"checkboxEl__body\">Маска для лица</span>
                                    </label>
                                    <label class=\"checkboxEl\">
                                        <input type=\"checkbox\" class=\"checkboxEl__input\">
                                        <span class=\"checkboxEl__body\">Мыло</span>
                                    </label>
                                    <div class=\"productFilters__el-innerCollapse\">
                                        <button class=\"link1 productFilters__el-innerCollapse-toggle\" type=\"button\" data-toggle=\"collapse\" data-target=\"#productFilters__el-innerCollapse1\" aria-expanded=\"false\">
                                            Показать все
                                        </button>
                                        <div class=\"collapse productFilters__el-innerCollapse-collapse\" id=\"productFilters__el-innerCollapse1\">
                                            <label class=\"checkboxEl\">
                                                <input type=\"checkbox\" class=\"checkboxEl__input\">
                                                <span class=\"checkboxEl__body\">Шампунь</span>
                                            </label>
                                            <label class=\"checkboxEl\">
                                                <input type=\"checkbox\" class=\"checkboxEl__input\">
                                                <span class=\"checkboxEl__body\">Шампунь</span>
                                            </label>
                                            <label class=\"checkboxEl\">
                                                <input type=\"checkbox\" class=\"checkboxEl__input\">
                                                <span class=\"checkboxEl__body\">Шампунь</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class=\"productFilters__el\">
                            <button class=\"productFilters__el-toggle\" type=\"button\" data-toggle=\"collapse\" data-target=\"#productFilters__el31\" aria-expanded=\"true\">
                                По назначению средства
                            </button>
                            <div class=\"collapse productFilters__el-collapse show\" id=\"productFilters__el31\">
                                <div class=\"productFilters__el-body\">
                                    <label class=\"checkboxEl\">
                                        <input type=\"checkbox\" class=\"checkboxEl__input\" checked>
                                        <span class=\"checkboxEl__body\">Для волос</span>
                                    </label>
                                    <label class=\"checkboxEl\">
                                        <input type=\"checkbox\" class=\"checkboxEl__input\">
                                        <span class=\"checkboxEl__body\">Для лица</span>
                                    </label>
                                    <label class=\"checkboxEl\">
                                        <input type=\"checkbox\" class=\"checkboxEl__input\">
                                        <span class=\"checkboxEl__body\">Для тела</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class=\"productFilters__el\">
                            <button class=\"productFilters__el-toggle\" type=\"button\" data-toggle=\"collapse\" data-target=\"#productFilters__el41\" aria-expanded=\"true\">
                                По типу кожи для лица
                            </button>
                            <div class=\"collapse productFilters__el-collapse show\" id=\"productFilters__el41\">
                                <div class=\"productFilters__el-body\">
                                    <label class=\"checkboxEl\">
                                        <input type=\"checkbox\" class=\"checkboxEl__input\" checked>
                                        <span class=\"checkboxEl__body\">Нормальная и комбинированная</span>
                                    </label>
                                    <label class=\"checkboxEl\">
                                        <input type=\"checkbox\" class=\"checkboxEl__input\">
                                        <span class=\"checkboxEl__body\">Жирная</span>
                                    </label>
                                    <label class=\"checkboxEl\">
                                        <input type=\"checkbox\" class=\"checkboxEl__input\">
                                        <span class=\"checkboxEl__body\">Сухая</span>
                                    </label>
                                    <label class=\"checkboxEl\">
                                        <input type=\"checkbox\" class=\"checkboxEl__input\">
                                        <span class=\"checkboxEl__body\">Зрелая</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class=\"productFilters__el\">
                            <button class=\"productFilters__el-toggle\" type=\"button\" data-toggle=\"collapse\" data-target=\"#productFilters__el5\" aria-expanded=\"true\">
                                По типу кожи тела
                            </button>
                            <div class=\"collapse productFilters__el-collapse show\" id=\"productFilters__el5\">
                                <div class=\"productFilters__el-body\">
                                    <label class=\"checkboxEl\">
                                        <input type=\"checkbox\" class=\"checkboxEl__input\" checked>
                                        <span class=\"checkboxEl__body\">Нормальная</span>
                                    </label>
                                    <label class=\"checkboxEl\">
                                        <input type=\"checkbox\" class=\"checkboxEl__input\">
                                        <span class=\"checkboxEl__body\">Жирная</span>
                                    </label>
                                    <label class=\"checkboxEl\">
                                        <input type=\"checkbox\" class=\"checkboxEl__input\">
                                        <span class=\"checkboxEl__body\">Сухая</span>
                                    </label>
                                    <label class=\"checkboxEl\">
                                        <input type=\"checkbox\" class=\"checkboxEl__input\">
                                        <span class=\"checkboxEl__body\">Зрелая</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class=\"productFilters__el\">
                            <button class=\"productFilters__el-toggle\" type=\"button\" data-toggle=\"collapse\" data-target=\"#productFilters__el6\" aria-expanded=\"true\">
                                По типу волос
                            </button>
                            <div class=\"collapse productFilters__el-collapse show\" id=\"productFilters__el6\">
                                <div class=\"productFilters__el-body\">
                                    <label class=\"checkboxEl\">
                                        <input type=\"checkbox\" class=\"checkboxEl__input\" checked>
                                        <span class=\"checkboxEl__body\">Нормальные</span>
                                    </label>
                                    <label class=\"checkboxEl\">
                                        <input type=\"checkbox\" class=\"checkboxEl__input\">
                                        <span class=\"checkboxEl__body\">Сухие</span>
                                    </label>
                                    <label class=\"checkboxEl\">
                                        <input type=\"checkbox\" class=\"checkboxEl__input\">
                                        <span class=\"checkboxEl__body\">Жирные</span>
                                    </label>
                                    <label class=\"checkboxEl\">
                                        <input type=\"checkbox\" class=\"checkboxEl__input\">
                                        <span class=\"checkboxEl__body\">Окрашенные</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </aside>
                </div>
                <div class=\"col-xl-9 col-lg-8\">
                    <aside class=\"showFirst\">
                        <div class=\"productFilters__toggle productFilters--toggle\"></div>
                        <div class=\"showFirst__menu\">
                            <div class=\"dropdown\">
                                <button class=\"dropdown__toggle\" type=\"button\" data-toggle=\"dropdown\" aria-expanded=\"false\">
                                    <span class=\"dropdown__pretext\">Показать сначала:</span>
                                    <span class=\"dropdown__value\">Новинки</span>
                                </button>
                                <div class=\"dropdown-menu\" >
                                    <a class=\"dropdown-item\" href=\"#\">Дешевые</a>
                                    <a class=\"dropdown-item\" href=\"#\">Дорогие</a>
                                    <a class=\"dropdown-item active\" href=\"#\">Новинки</a>
                                    <a class=\"dropdown-item\" href=\"#\">Популярные</a>
                                </div>
                            </div>
                        </div>
                    </aside>
                    <div class=\"stocksProducts__body\">
                        <div class=\"row\">
                            <div class=\"col-xl-4 col-6\">
                                <div class=\"productCard\">
                                    <div class=\"productBig__quantityAndLike\">
                                        <label class=\"like\">
                                            <input type=\"checkbox\" class=\"like__input\">
                                            <span class=\"like__body\"></span>
                                        </label>
                                    </div>
                                    <div class=\"productCard__feature productCard__feature--stock\">-10%</div>
                                    <div class=\"productCard__producer\">
                        <span class=\"productCard__producer-toggle\">
                          <img src=\"catalog/view/theme/makeme/image/icons/selebrity.svg\" alt=\"#\" class=\"lazy productCard__producer-icon\">
                        </span>
                                        <p class=\"productCard__producer-text\">
                                            Средство создано селебрети <br> <span class=\"font-weight-bold\">@mariia123_hello</span>
                                        </p>
                                    </div>
                                    <a href=\"#\" class=\"productCard__imgContainer\">
                                        <img src=\"catalog/view/theme/makeme/image/shampoo.png\" alt=\"#\" class=\"lazy productCard__img\">
                                    </a>
                                    <div class=\"productCard__body\">
                                        <div class=\"productCard__rating\">
                                            <span class=\"productCard__rating-el productCard__rating-el--full\"></span>
                                            <span class=\"productCard__rating-el productCard__rating-el--full\"></span>
                                            <span class=\"productCard__rating-el productCard__rating-el--full\"></span>
                                            <span class=\"productCard__rating-el productCard__rating-el--full\"></span>
                                            <span class=\"productCard__rating-el\"></span>
                                        </div>
                                        <a href=\"#\" class=\"productCard__type\">Молочко для тела</a>
                                        <a href=\"#\" class=\"productCard__name\">Молочко для тела с ароматом розы и розмарина (750 мл)</a>

                                        <div class=\"productCard__price\">
                                            <span class=\"productCard__price-actual\">244 ₴</span>
                                            <span class=\"productCard__price-old\">344 ₴</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class=\"col-xl-4 col-6\">
                                <div class=\"productCard\">
                                    <div class=\"productBig__quantityAndLike\">
                                        <label class=\"like\">
                                            <input type=\"checkbox\" class=\"like__input\">
                                            <span class=\"like__body\"></span>
                                        </label>
                                    </div>
                                    <div class=\"productCard__feature productCard__feature--hit\">ХИТ ПРОДАЖ</div>
                                    <div class=\"productCard__producer\">
                        <span class=\"productCard__producer-toggle\">
                          <img src=\"catalog/view/theme/makeme/image/icons/buyer.svg\" alt=\"#\" class=\"lazy productCard__producer-icon\">
                        </span>
                                        <p class=\"productCard__producer-text\">
                                            Средство создано покупателем <br> <span class=\"font-weight-bold\">Мария Дмитриенко</span>
                                        </p>
                                    </div>
                                    <a href=\"#\" class=\"productCard__imgContainer\">
                                        <img src=\"catalog/view/theme/makeme/image/cream.png\" alt=\"#\" class=\"lazy productCard__img\">
                                    </a>
                                    <div class=\"productCard__body\">
                                        <div class=\"productCard__rating\">
                                            <span class=\"productCard__rating-el productCard__rating-el--full\"></span>
                                            <span class=\"productCard__rating-el productCard__rating-el--full\"></span>
                                            <span class=\"productCard__rating-el productCard__rating-el--full\"></span>
                                            <span class=\"productCard__rating-el productCard__rating-el--full\"></span>
                                            <span class=\"productCard__rating-el\"></span>
                                        </div>
                                        <a href=\"#\" class=\"productCard__type\">Молочко для тела</a>
                                        <a href=\"#\" class=\"productCard__name\">Молочко для тела с ароматом розы и розмарина (750 мл)</a>

                                        <div class=\"productCard__price\">
                                            <span class=\"productCard__price-actual\">244 ₴</span>
                                            <span class=\"productCard__price-old\">344 ₴</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class=\"col-xl-4 col-6\">
                                <div class=\"productCard\">
                                    <div class=\"productBig__quantityAndLike\">
                                        <label class=\"like\">
                                            <input type=\"checkbox\" class=\"like__input\">
                                            <span class=\"like__body\"></span>
                                        </label>
                                    </div>
                                    <div class=\"productCard__feature productCard__feature--new\">NEW</div>
                                    <div class=\"productCard__producer\">
                        <span class=\"productCard__producer-toggle\">
                          <img src=\"catalog/view/theme/makeme/image/icons/specialist.svg\" alt=\"#\" class=\"lazy productCard__producer-icon\">
                        </span>
                                        <p class=\"productCard__producer-text\">
                                            Средство создано специалистами  <br> нашей лаборатории
                                        </p>
                                    </div>
                                    <a href=\"#\" class=\"productCard__imgContainer\">
                                        <img src=\"catalog/view/theme/makeme/image/shampoo.png\" alt=\"#\" class=\"lazy productCard__img\">
                                    </a>
                                    <div class=\"productCard__body\">
                                        <div class=\"productCard__rating\">
                                            <span class=\"productCard__rating-el productCard__rating-el--full\"></span>
                                            <span class=\"productCard__rating-el productCard__rating-el--full\"></span>
                                            <span class=\"productCard__rating-el productCard__rating-el--full\"></span>
                                            <span class=\"productCard__rating-el productCard__rating-el--full\"></span>
                                            <span class=\"productCard__rating-el\"></span>
                                        </div>
                                        <a href=\"#\" class=\"productCard__type\">Молочко для тела</a>
                                        <a href=\"#\" class=\"productCard__name\">Молочко для тела с ароматом розы и розмарина (750 мл)</a>

                                        <div class=\"productCard__price\">
                                            <span class=\"productCard__price-actual\">244 ₴</span>
                                            <span class=\"productCard__price-old\">344 ₴</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class=\"col-xl-4 col-6\">
                                <div class=\"productCard\">
                                    <div class=\"productBig__quantityAndLike\">
                                        <label class=\"like\">
                                            <input type=\"checkbox\" class=\"like__input\">
                                            <span class=\"like__body\"></span>
                                        </label>
                                    </div>
                                    <div class=\"productCard__feature productCard__feature--stock\">-10%</div>
                                    <div class=\"productCard__producer\">
                        <span class=\"productCard__producer-toggle\">
                          <img src=\"catalog/view/theme/makeme/image/icons/selebrity.svg\" alt=\"#\" class=\"lazy productCard__producer-icon\">
                        </span>
                                        <p class=\"productCard__producer-text\">
                                            Средство создано селебрети <br> <span class=\"font-weight-bold\">@mariia123_hello</span>
                                        </p>
                                    </div>
                                    <a href=\"#\" class=\"productCard__imgContainer\">
                                        <img src=\"catalog/view/theme/makeme/image/shampoo.png\" alt=\"#\" class=\"lazy productCard__img\">
                                    </a>
                                    <div class=\"productCard__body\">
                                        <div class=\"productCard__rating\">
                                            <span class=\"productCard__rating-el productCard__rating-el--full\"></span>
                                            <span class=\"productCard__rating-el productCard__rating-el--full\"></span>
                                            <span class=\"productCard__rating-el productCard__rating-el--full\"></span>
                                            <span class=\"productCard__rating-el productCard__rating-el--full\"></span>
                                            <span class=\"productCard__rating-el\"></span>
                                        </div>
                                        <a href=\"#\" class=\"productCard__type\">Молочко для тела</a>
                                        <a href=\"#\" class=\"productCard__name\">Молочко для тела с ароматом розы и розмарина (750 мл)</a>

                                        <div class=\"productCard__price\">
                                            <span class=\"productCard__price-actual\">244 ₴</span>
                                            <span class=\"productCard__price-old\">344 ₴</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class=\"col-xl-4 col-6\">
                                <div class=\"productCard\">
                                    <div class=\"productBig__quantityAndLike\">
                                        <label class=\"like\">
                                            <input type=\"checkbox\" class=\"like__input\">
                                            <span class=\"like__body\"></span>
                                        </label>
                                    </div>
                                    <div class=\"productCard__feature productCard__feature--hit\">ХИТ ПРОДАЖ</div>
                                    <div class=\"productCard__producer\">
                        <span class=\"productCard__producer-toggle\">
                          <img src=\"catalog/view/theme/makeme/image/icons/buyer.svg\" alt=\"#\" class=\"lazy productCard__producer-icon\">
                        </span>
                                        <p class=\"productCard__producer-text\">
                                            Средство создано покупателем <br> <span class=\"font-weight-bold\">Мария Дмитриенко</span>
                                        </p>
                                    </div>
                                    <a href=\"#\" class=\"productCard__imgContainer\">
                                        <img src=\"catalog/view/theme/makeme/image/cream.png\" alt=\"#\" class=\"lazy productCard__img\">
                                    </a>
                                    <div class=\"productCard__body\">
                                        <div class=\"productCard__rating\">
                                            <span class=\"productCard__rating-el productCard__rating-el--full\"></span>
                                            <span class=\"productCard__rating-el productCard__rating-el--full\"></span>
                                            <span class=\"productCard__rating-el productCard__rating-el--full\"></span>
                                            <span class=\"productCard__rating-el productCard__rating-el--full\"></span>
                                            <span class=\"productCard__rating-el\"></span>
                                        </div>
                                        <a href=\"#\" class=\"productCard__type\">Молочко для тела</a>
                                        <a href=\"#\" class=\"productCard__name\">Молочко для тела с ароматом розы и розмарина (750 мл)</a>

                                        <div class=\"productCard__price\">
                                            <span class=\"productCard__price-actual\">244 ₴</span>
                                            <span class=\"productCard__price-old\">344 ₴</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class=\"col-xl-4 col-6\">
                                <div class=\"productCard\">
                                    <div class=\"productBig__quantityAndLike\">
                                        <label class=\"like\">
                                            <input type=\"checkbox\" class=\"like__input\">
                                            <span class=\"like__body\"></span>
                                        </label>
                                    </div>
                                    <div class=\"productCard__feature productCard__feature--new\">NEW</div>
                                    <div class=\"productCard__producer\">
                        <span class=\"productCard__producer-toggle\">
                          <img src=\"catalog/view/theme/makeme/image/icons/specialist.svg\" alt=\"#\" class=\"lazy productCard__producer-icon\">
                        </span>
                                        <p class=\"productCard__producer-text\">
                                            Средство создано специалистами  <br> нашей лаборатории
                                        </p>
                                    </div>
                                    <a href=\"#\" class=\"productCard__imgContainer\">
                                        <img src=\"catalog/view/theme/makeme/image/shampoo.png\" alt=\"#\" class=\"lazy productCard__img\">
                                    </a>
                                    <div class=\"productCard__body\">
                                        <div class=\"productCard__rating\">
                                            <span class=\"productCard__rating-el productCard__rating-el--full\"></span>
                                            <span class=\"productCard__rating-el productCard__rating-el--full\"></span>
                                            <span class=\"productCard__rating-el productCard__rating-el--full\"></span>
                                            <span class=\"productCard__rating-el productCard__rating-el--full\"></span>
                                            <span class=\"productCard__rating-el\"></span>
                                        </div>
                                        <a href=\"#\" class=\"productCard__type\">Молочко для тела</a>
                                        <a href=\"#\" class=\"productCard__name\">Молочко для тела с ароматом розы и розмарина (750 мл)</a>

                                        <div class=\"productCard__price\">
                                            <span class=\"productCard__price-actual\">244 ₴</span>
                                            <span class=\"productCard__price-old\">344 ₴</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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
        // line 517
        echo ($context["footer"] ?? null);
        echo "

";
    }

    public function getTemplateName()
    {
        return "makeme/template/product/catalog.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  556 => 517,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "makeme/template/product/catalog.twig", "");
    }
}
