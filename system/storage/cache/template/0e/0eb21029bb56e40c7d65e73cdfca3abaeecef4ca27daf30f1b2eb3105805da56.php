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

/* makeme/template/common/home.twig */
class __TwigTemplate_c715dd25d4ab04ef3f60699143db1432d711234862def7586c5c23ecf0ac0fdd extends \Twig\Template
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
    <div class=\"section hero\">
      <div class=\"row\">
        <div class=\"col-xl-8\">
          <a href=\"#\" class=\"hero__el hero__el--1\">
            <span class=\"hero__el-title\">Только вы знаете что лучше для вашей кожи!</span>
            <span class=\"hero__el-text\">Никто не знает ваше тело так как вы сами! Именно поэтому мы создали конструктор косметики который сможет на 100% удовлетворить потребности только вашей кожи! </span>
            <span class=\"button button--main button--arrow\">Создать средство</span>
            <img
";
        // line 13
        echo "                    src=\"catalog/view/theme/makeme/image/home/heroImg1.png\"
                    data-srcset=\"
                    img/home/heroImg1.png 767w,
                    img/home/heroImg2@2x.png 1199w,
                    img/home/heroImg1@3x.png 1920w
                  \"
                    alt=\"#\"
                    class=\"lazy hero__el-img\"
            >
          </a>
        </div>
        <div class=\"col-xl-4\">
          <div class=\"row\">
            <div class=\"col-xl-12 col-md-6\">
              <a href=\"#\" class=\"hero__el hero__el--2\">
                <span class=\"hero__el-title\">Довертесь нашим экспертам</span>
                <span class=\"hero__el-readMore\">Выбрать готовое средство</span>
                <img
                        src=\"img/home/heroImg2.png\"
                        data-srcset=\"
                        img/home/heroImg2.png 767w,
                        img/home/heroImg2@2x.png 1199w,
                        img/home/heroImg2@3x.png 1920w
                      \"
                        alt=\"#\"
                        class=\"lazy hero__el-img\"
                >
              </a>
            </div>
            <div class=\"col-xl-12 col-md-6\">
              <a href=\"#\" class=\"hero__el hero__el--3\">
                <span class=\"hero__el-title\">Мы научим Вас создавать косметику</span>
                <span class=\"hero__el-readMore\">Читать наши советы </span>
                <img
                        src=\"img/home/heroImg3.png\"
                        data-srcset=\"
                        img/home/heroImg3.png 767w,
                        img/home/heroImg3@2x.png 1199w,
                        img/home/heroImg3@3x.png 1920w
                      \"
                        alt=\"#\"
                        class=\"lazy hero__el-img\"
                >
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
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
    <section class=\"section uniqueCarousel__container\">
      <div class=\"section__header mb-4\">
        <h2 class=\"section__title mr-4\">Каждая баночка <span class=\"color-primary\">уникальна!</span></h2>
        <p class=\"text--simple font-weight-medium pb-3\">Больше не надо переживать о том подойдет ли тебе крем. <br>
          Теперь ты сама можешь создать уход для себя.</p>
      </div>
      <div class=\"owl-carousel carousel-4els transparentProductCards uniqueCarousel\">
        <div class=\"productCard productCard--mask\">
          <div class=\"productCard__feature productCard__feature--stock\">-10%</div>
          <div class=\"productCard__producer\">
                <span class=\"productCard__producer-toggle\">
                  <img src=\"img/icons/selebrity.svg\" alt=\"#\" class=\"lazy productCard__producer-icon\">
                </span>
            <p class=\"productCard__producer-text\">
              Средство создано селебрети <br> <span class=\"font-weight-bold\">@mariia123_hello</span>
            </p>
          </div>
          <a href=\"#\" class=\"productCard__imgContainer\">
            <img src=\"img/home/shampoo.png\" alt=\"#\" class=\"lazy productCard__img\">
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
            </div>
            <a href=\"#\" class=\"button button--primary productCard__button\">Создать <span class=\"d-sm-inline d-none\">&nbsp;средство</span> </a>
          </div>
        </div>
        <div class=\"productCard productCard--shampoo\">
          <div class=\"productCard__feature productCard__feature--hit\">ХИТ ПРОДАЖ</div>
          <div class=\"productCard__producer\">
                <span class=\"productCard__producer-toggle\">
                  <img src=\"img/icons/buyer.svg\" alt=\"#\" class=\"lazy productCard__producer-icon\">
                </span>
            <p class=\"productCard__producer-text\">
              Средство создано покупателем <br> <span class=\"font-weight-bold\">Мария Дмитриенко</span>
            </p>
          </div>
          <a href=\"#\" class=\"productCard__imgContainer\">

            <img src=\"img/home/shampoo.png\" alt=\"#\" class=\"lazy productCard__img\">
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
            <a href=\"#\" class=\"button button--primary productCard__button\">Создать <span class=\"d-sm-inline d-none\">&nbsp;средство</span> </a>
          </div>
        </div>
        <div class=\"productCard productCard--cream\">
          <div class=\"productCard__feature productCard__feature--new\">NEW</div>
          <div class=\"productCard__producer\">
                <span class=\"productCard__producer-toggle\">
                  <img src=\"img/icons/specialist.svg\" alt=\"#\" class=\"lazy productCard__producer-icon\">
                </span>
            <p class=\"productCard__producer-text\">
              Средство создано специалистами  <br> нашей лаборатории
            </p>
          </div>
          <a href=\"#\" class=\"productCard__imgContainer\">
            <img src=\"img/home/cream.png\" alt=\"#\" class=\"lazy productCard__img\">
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
            </div>
            <a href=\"#\" class=\"button button--primary productCard__button\">Создать <span class=\"d-sm-inline d-none\">&nbsp;средство</span> </a>
          </div>
        </div>
        <div class=\"productCard productCard--scrab\">
          <div class=\"productCard__feature productCard__feature--stock\">-10%</div>
          <div class=\"productCard__producer\">
                <span class=\"productCard__producer-toggle\">
                  <img src=\"img/icons/selebrity.svg\" alt=\"#\" class=\"lazy productCard__producer-icon\">
                </span>
            <p class=\"productCard__producer-text\">
              Средство создано селебрети <br> <span class=\"font-weight-bold\">@mariia123_hello</span>
            </p>
          </div>
          <a href=\"#\" class=\"productCard__imgContainer\">
            <img src=\"img/home/scrab.png\" alt=\"#\" class=\"lazy productCard__img\">
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
            <a href=\"#\" class=\"button button--primary productCard__button\">Создать <span class=\"d-sm-inline d-none\">&nbsp;средство</span> </a>
          </div>
        </div>
        <div class=\"productCard productCard--scrab\">
          <div class=\"productCard__feature productCard__feature--stock\">-10%</div>
          <div class=\"productCard__producer\">
                <span class=\"productCard__producer-toggle\">
                  <img src=\"img/icons/selebrity.svg\" alt=\"#\" class=\"lazy productCard__producer-icon\">
                </span>
            <p class=\"productCard__producer-text\">
              Средство создано селебрети <br> <span class=\"font-weight-bold\">@mariia123_hello</span>
            </p>
          </div>
          <a href=\"#\" class=\"productCard__imgContainer\">
            <img src=\"img/home/scrab.png\" alt=\"#\" class=\"lazy productCard__img\">
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
            <a href=\"#\" class=\"button button--primary productCard__button\">Создать <span class=\"d-sm-inline d-none\">&nbsp;средство</span> </a>
          </div>
        </div>
      </div>
    </section>

    <section class=\"section createStages\">
      <h3 class=\"section__title createStages__title\">Этапы создания</h3>
      <ul class=\"createStages__list\">
        <li class=\"createStages__list-el\">
          <h4 class=\"createStages__list-el-title\">
            <span class=\"createStages__list-el-number\">1.</span>
            Основа
          </h4>
          <p class=\"createStages__list-el-text\">Выбор основы для вашго нового средства это первый шаг к созданию!</p>
        </li>
        <li class=\"createStages__list-el\">
          <h4 class=\"createStages__list-el-title\">
            <span class=\"createStages__list-el-number\">2.</span>
            Ингридиенты
          </h4>
          <p class=\"createStages__list-el-text\">Экстракты, витамины и масла - это малая часть тогого чем вы можете насытить ваш состав.</p>
        </li>
        <li class=\"createStages__list-el\">
          <h4 class=\"createStages__list-el-title\">
            <span class=\"createStages__list-el-number\">3.</span>
            Название
          </h4>
          <p class=\"createStages__list-el-text\">У нас вы создаете свою собственную косметику. Каждую свою баночку вы можете назвать как захотите.</p>
        </li>
      </ul>
      <a href=\"#\" class=\"button button--stroke createStages__button\">Создать средство</a>
    </section>

    <section class=\"section\">
      <div class=\"section__header d-flex align-items-center justify-content-between flex-wrap\">
        <h2 class=\"section__title mr-4\"><span class=\"color-primary\">Популярные</span> товары</h2>
        <a href=\"#\" class=\"showMore\">Смотреть больше</a>
      </div>
      <div class=\"owl-carousel carousel-4els transparentProductCards\">
        <div class=\"productCard\">
          <div class=\"productCard__feature productCard__feature--stock\">-10%</div>
          <div class=\"productCard__producer\">
                <span class=\"productCard__producer-toggle\">
                  <img src=\"img/icons/selebrity.svg\" alt=\"#\" class=\"lazy productCard__producer-icon\">
                </span>
            <p class=\"productCard__producer-text\">
              Средство создано селебрети <br> <span class=\"font-weight-bold\">@mariia123_hello</span>
            </p>
          </div>
          <a href=\"#\" class=\"productCard__imgContainer\">
            <img src=\"img/shampoo.png\" alt=\"#\" class=\"lazy productCard__img\">
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
            </div>
          </div>
        </div>
        <div class=\"productCard\">
          <div class=\"productCard__feature productCard__feature--hit\">ХИТ ПРОДАЖ</div>
          <div class=\"productCard__producer\">
                <span class=\"productCard__producer-toggle\">
                  <img src=\"img/icons/buyer.svg\" alt=\"#\" class=\"lazy productCard__producer-icon\">
                </span>
            <p class=\"productCard__producer-text\">
              Средство создано покупателем <br> <span class=\"font-weight-bold\">Мария Дмитриенко</span>
            </p>
          </div>
          <a href=\"#\" class=\"productCard__imgContainer\">
            <img src=\"img/cream.png\" alt=\"#\" class=\"lazy productCard__img\">
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
        <div class=\"productCard\">
          <div class=\"productCard__feature productCard__feature--new\">NEW</div>
          <div class=\"productCard__producer\">
                <span class=\"productCard__producer-toggle\">
                  <img src=\"img/icons/specialist.svg\" alt=\"#\" class=\"lazy productCard__producer-icon\">
                </span>
            <p class=\"productCard__producer-text\">
              Средство создано специалистами  <br> нашей лаборатории
            </p>
          </div>
          <a href=\"#\" class=\"productCard__imgContainer\">
            <img src=\"img/shampoo.png\" alt=\"#\" class=\"lazy productCard__img\">
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
            </div>
          </div>
        </div>
        <div class=\"productCard\">
          <div class=\"productCard__feature productCard__feature--stock\">-10%</div>
          <div class=\"productCard__producer\">
                <span class=\"productCard__producer-toggle\">
                  <img src=\"img/icons/selebrity.svg\" alt=\"#\" class=\"lazy productCard__producer-icon\">
                </span>
            <p class=\"productCard__producer-text\">
              Средство создано селебрети <br> <span class=\"font-weight-bold\">@mariia123_hello</span>
            </p>
          </div>
          <a href=\"#\" class=\"productCard__imgContainer\">
            <img src=\"img/shampoo.png\" alt=\"#\" class=\"lazy productCard__img\">
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
        <div class=\"productCard\">
          <div class=\"productCard__feature productCard__feature--hit\">ХИТ ПРОДАЖ</div>
          <div class=\"productCard__producer\">
                <span class=\"productCard__producer-toggle\">
                  <img src=\"img/icons/buyer.svg\" alt=\"#\" class=\"lazy productCard__producer-icon\">
                </span>
            <p class=\"productCard__producer-text\">
              Средство создано покупателем <br> <span class=\"font-weight-bold\">Мария Дмитриенко</span>
            </p>
          </div>
          <a href=\"#\" class=\"productCard__imgContainer\">
            <img src=\"img/cream.png\" alt=\"#\" class=\"lazy productCard__img\">
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
        <div class=\"productCard\">
          <div class=\"productCard__feature productCard__feature--new\">NEW</div>
          <div class=\"productCard__producer\">
                <span class=\"productCard__producer-toggle\">
                  <img src=\"img/icons/specialist.svg\" alt=\"#\" class=\"lazy productCard__producer-icon\">
                </span>
            <p class=\"productCard__producer-text\">
              Средство создано специалистами  <br> нашей лаборатории
            </p>
          </div>
          <a href=\"#\" class=\"productCard__imgContainer\">
            <img src=\"img/shampoo.png\" alt=\"#\" class=\"lazy productCard__img\">
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
            </div>
          </div>
        </div>
        <div class=\"productCard\">
          <div class=\"productCard__feature productCard__feature--stock\">-10%</div>
          <div class=\"productCard__producer\">
                <span class=\"productCard__producer-toggle\">
                  <img src=\"img/icons/selebrity.svg\" alt=\"#\" class=\"lazy productCard__producer-icon\">
                </span>
            <p class=\"productCard__producer-text\">
              Средство создано селебрети <br> <span class=\"font-weight-bold\">@mariia123_hello</span>
            </p>
          </div>
          <a href=\"#\" class=\"productCard__imgContainer\">
            <img src=\"img/shampoo.png\" alt=\"#\" class=\"lazy productCard__img\">
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
    </section>

    <section class=\"section createUnique\">
      <h3 class=\"section__title createUnique__title\">Создай <span class=\"color-primary\">свою</span>, неповторимую!</h3>
      <p class=\"createUnique__text\">Вместе с тобой мы создадим неповторимую косметику именно для тебя! Каждая баночка на 100% индивидуальна. </p>
      <ul class=\"createUnique__list\">
        <li class=\"createUnique__list-el\">Ни какой химии внутри</li>
        <li class=\"createUnique__list-el\">Состав который ты создаешь сама</li>
        <li class=\"createUnique__list-el\">Индивидуальное производство</li>
        <li class=\"createUnique__list-el\">По настоящему эффективная косметика</li>
      </ul>
      <img
              data-srcset=\"
              img/home/createYours.png 767w,
              img/home/createYours@2x.png 1199w,
              img/home/createYours@3x.png 1920w
            \"
              src=\"img/home/createYours.png\"
              alt=\"#\"
              class=\"lazy createUnique__img\"
      >
      <a href=\"#\" class=\"button button--stroke createUnique__button\">Создать средство</a>
      <img src=\"img/home/unique.png\" alt=\"#\" class=\"lazy createUnique__logo\">

    </section>

    <section class=\"section starFeedbacks\">
      <div class=\"section__header d-flex align-items-center justify-content-between flex-wrap\">
        <h2 class=\"section__title mr-4\"><span class=\"color-primary\">Звездные</span> отзывы</h2>
        <a href=\"#\" class=\"showMore\">Смотреть больше</a>
      </div>
      <div class=\"owl-carousel carousel-3els\">
        <a href=\"#\" class=\"starFeedback\">
              <span class=\"starFeedback__imgContainer\">
                <img
                        data-srcset=\"
                    img/home/starFeedback1.jpg 767w,
                    img/home/starFeedback1@2x.jpg 1199w,
                    img/home/starFeedback1@3x.jpg 1920w
                  \"
                        src=\"img/home/starFeedback1.jpg\"
                        alt=\"#\"
                        class=\"lazy starFeedback__img\"
                >
                <span class=\"starFeedback__info\">
                  <span class=\"starFeedback__info-name\">@NicknameInsta</span>
                  <span class=\"starFeedback__info-about\">
                    23 000 подписчиков в инстаграм<br>
                    Мама троих
                  </span>
                </span>
              </span>
          <span class=\"starFeedback__body\">
                <span class=\"starFeedback__body-name\">@NicknameInsta</span>
                <span class=\"starFeedback__body-about\">
                  23 000 подписчиков в инстаграм<br>
                  Мама троих
                </span>
                <span class=\"starFeedback__body-text\">Хочу подякувати @makemy за чудо-баночки, які поїхали зі мною в сонячну, спекотну країну! Вже вкотре користуюсь цими засобами, і завжди в захваті. <br>
                Крем універсальний для денного та нічного застосування. А пінка для вмивання прекрасно очищує шкіру і змиває макіяж! Навіть туш! Взяла 2 баночки і зекономила багато місця! <br>
                Ну а запах - це взагалі окрема тема!😍</span>
                <span class=\"starFeedback__moreDetails\">Подробнее о средстве</span>
              </span>
        </a>
        <a href=\"#\" class=\"starFeedback\">
              <span class=\"starFeedback__imgContainer\">
                <img
                        data-srcset=\"
                    img/home/starFeedback2.jpg 767w,
                    img/home/starFeedback2@2x.jpg 1199w,
                    img/home/starFeedback2@3x.jpg 1920w
                  \"
                        src=\"img/home/starFeedback2.jpg\"
                        alt=\"#\"
                        class=\"lazy starFeedback__img\"
                >
                <span class=\"starFeedback__info\">
                  <span class=\"starFeedback__info-name\">@NicknameInsta</span>
                  <span class=\"starFeedback__info-about\">
                    23 000 подписчиков в инстаграм<br>
                    Мама троих
                  </span>
                </span>
              </span>
          <span class=\"starFeedback__body\">
                <span class=\"starFeedback__body-name\">@NicknameInsta</span>
                <span class=\"starFeedback__body-about\">
                  23 000 подписчиков в инстаграм<br>
                  Мама троих
                </span>
                <span class=\"starFeedback__body-text\">Хочу подякувати @makemy за чудо-баночки, які поїхали зі мною в сонячну, спекотну країну! Вже вкотре користуюсь цими засобами, і завжди в захваті. <br>
                Крем універсальний для денного та нічного застосування. А пінка для вмивання прекрасно очищує шкіру і змиває макіяж! Навіть туш! Взяла 2 баночки і зекономила багато місця! <br>
                Ну а запах - це взагалі окрема тема!😍</span>
                <span class=\"starFeedback__moreDetails\">Подробнее о средстве</span>
              </span>
        </a>
        <a href=\"#\" class=\"starFeedback\">
              <span class=\"starFeedback__imgContainer\">
                <img
                        data-srcset=\"
                    img/home/starFeedback3.jpg 767w,
                    img/home/starFeedback3@2x.jpg 1199w,
                    img/home/starFeedback3@3x.jpg 1920w
                  \"
                        src=\"img/home/starFeedback3.jpg\"
                        alt=\"#\"
                        class=\"lazy starFeedback__img\"
                >
                <span class=\"starFeedback__info\">
                  <span class=\"starFeedback__info-name\">@NicknameInsta</span>
                  <span class=\"starFeedback__info-about\">
                    23 000 подписчиков в инстаграм<br>
                    Мама троих
                  </span>
                </span>
              </span>
          <span class=\"starFeedback__body\">
                <span class=\"starFeedback__body-name\">@NicknameInsta</span>
                <span class=\"starFeedback__body-about\">
                  23 000 подписчиков в инстаграм<br>
                  Мама троих
                </span>
                <span class=\"starFeedback__body-text\">Хочу подякувати @makemy за чудо-баночки, які поїхали зі мною в сонячну, спекотну країну! Вже вкотре користуюсь цими засобами, і завжди в захваті. <br>
                Крем універсальний для денного та нічного застосування. А пінка для вмивання прекрасно очищує шкіру і змиває макіяж! Навіть туш! Взяла 2 баночки і зекономила багато місця! <br>
                Ну а запах - це взагалі окрема тема!😍</span>
                <span class=\"starFeedback__moreDetails\">Подробнее о средстве</span>
              </span>
        </a>
        <a href=\"#\" class=\"starFeedback\">
              <span class=\"starFeedback__imgContainer\">
                <img src=\"img/home/starFeedback1.jpg\" alt=\"#\" class=\"lazy starFeedback__img\">
                <span class=\"starFeedback__info\">
                  <span class=\"starFeedback__info-name\">@NicknameInsta</span>
                  <span class=\"starFeedback__info-about\">
                    23 000 подписчиков в инстаграм<br>
                    Мама троих
                  </span>
                </span>
              </span>
          <span class=\"starFeedback__body\">
                <span class=\"starFeedback__body-name\">@NicknameInsta</span>
                <span class=\"starFeedback__body-about\">
                  23 000 подписчиков в инстаграм<br>
                  Мама троих
                </span>
                <span class=\"starFeedback__body-text\">Хочу подякувати @makemy за чудо-баночки, які поїхали зі мною в сонячну, спекотну країну! Вже вкотре користуюсь цими засобами, і завжди в захваті. <br>
                Крем універсальний для денного та нічного застосування. А пінка для вмивання прекрасно очищує шкіру і змиває макіяж! Навіть туш! Взяла 2 баночки і зекономила багато місця! <br>
                Ну а запах - це взагалі окрема тема!😍</span>
                <span class=\"starFeedback__moreDetails\">Подробнее о средстве</span>
              </span>
        </a>
      </div>
      <div class=\"text-center mt-4\">
        <a href=\"#\" class=\"button button--stroke\">Создать средство</a>
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
        // line 649
        echo ($context["footer"] ?? null);
        echo "


";
    }

    public function getTemplateName()
    {
        return "makeme/template/common/home.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  689 => 649,  51 => 13,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "makeme/template/common/home.twig", "");
    }
}
