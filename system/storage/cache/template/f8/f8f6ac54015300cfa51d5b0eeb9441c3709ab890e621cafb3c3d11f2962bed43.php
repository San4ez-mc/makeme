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

/* makeme/template/information/mmclub.twig */
class __TwigTemplate_8848cf8647c54bab3667444bdf20a427f01dd407cbd4a2102ee921762c3b5051 extends \Twig\Template
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
        <div class=\"mmclub-page\">
            <article class=\"section infoBlock infoBlock--hero\">
                <div class=\"row flex-md-row-reverse\">
                    <div class=\"col-md-6 position-relative\">
                        <div class=\"infoBlock__imgContainer\">
                            <img src=\"catalog/view/theme/makeme/image/mmclubPage/img1.jpg\" alt=\"#\" class=\"lazy infoBlock__img\">
                        </div>
                        <img src=\"catalog/view/theme/makeme/image/mmclubPage/bubbles1.png\" alt=\"#\" class=\"lazy parallaxBalls parallaxBalls--1\">
                    </div>
                    <div class=\"col-md-6\">
                        <div class=\"infoBlock__body\">
                            <h2 class=\"infoBlock__title\"><span class=\"color-primary\">MakeMy Club</span> - место крутых предложений</h2>
                            <p class=\"infoBlock__text\">Давно выяснено, что при оценке дизайна и композиции читаемый текст мешает сосредоточиться. Lorem Ipsum используют потому, что тот обеспечивает более или менее стандартное заполнение шаблона.</p>
                            <a href=\"#\" class=\"button button--stroke infoBlock__button\">Вступить в клуб</a>
                        </div>
                    </div>
                </div>
                <img src=\"catalog/view/theme/makeme/image/mmclubPage/100.png\" alt=\"#\" class=\"lazy infoBlock__uniqueLogo\">
            </article>
            <article class=\"section infoBlock\">
                <div class=\"row\">
                    <div class=\"col-md-6 position-relative\">
                        <div class=\"infoBlock__imgContainer rightSide\">
                            <img src=\"catalog/view/theme/makeme/image/mmclubPage/img2.jpg\" alt=\"#\" class=\"lazy infoBlock__img\">
                        </div>
                        <img src=\"catalog/view/theme/makeme/image/mmclubPage/bubbles2.png\" alt=\"#\" class=\"lazy parallaxBalls parallaxBalls--2\">
                    </div>
                    <div class=\"col-md-6\">
                        <div class=\"infoBlock__body\">
                            <h2 class=\"infoBlock__title\"><span class=\"color-primary\">Подарок</span> на день рождения</h2>
                            <p class=\"infoBlock__text\">MAKEMY  Club не может пропустить это важное событие! И уже подготовил приятный сюрприз — подарок к вашему дню рождения.<br><br>

                                <span class=\"font-weight-bold\"> Что вы получаете:</span> приятную скидку при оформлении праздничного заказа. Добавляя в корзину позиции на сумму от 200 грн, вы получите скидку в размере 50 грн, а при заказе от 699 грн – 100 грн в подарок. При этом наш Birthday-бонус будет суммироваться с действующими акционными предложениям и другими актуальными скидками. <br><br>

                                <span class=\"font-weight-bold\"> Что для этого нужно:</span> укажите дату рождения в личном кабинете и подтвердите согласие получать соответствующую рассылку в личном кабинете.</p>
                        </div>
                    </div>
                </div>
            </article>
            <article class=\"section infoBlock\">
                <div class=\"row flex-md-row-reverse\">
                    <div class=\"col-md-6 position-relative\">
                        <div class=\"infoBlock__imgContainer\">
                            <img src=\"catalog/view/theme/makeme/image/mmclubPage/img3.jpg\" alt=\"#\" class=\"lazy infoBlock__img\">
                        </div>
                        <img src=\"catalog/view/theme/makeme/image/mmclubPage/bubbles3.png\" alt=\"#\" class=\"lazy parallaxBalls parallaxBalls--3\">
                    </div>
                    <div class=\"col-md-6\">
                        <div class=\"infoBlock__body\">
                            <h2 class=\"infoBlock__title\"><span class=\"color-primary\">Подарок</span> на Новый Год</h2>
                            <p class=\"infoBlock__text\">Мы отмечаем Новый год по нашим правилам! При оформлении заказа под вашей учетной записью мы запомним дату первого заказа и непременно поздравим вас на годовщину.<br><br>

                                <span class=\"font-weight-bold\">Что вы получаете:</span> один из предложенных сюрпризов от MAKEMY. Это могут быть аксессуары или другие бьюти-продукты.<br><br>

                                <span class=\"font-weight-bold\">Что для этого нужно:</span> просто добавьте в корзину продукты на сумму от 200 гривен, и при оформлении заказа под вашим логином/паролем система предложит вам несколько презентов на выбор.</p>
                        </div>
                    </div>
                </div>
            </article>
            <article class=\"section infoBlock\">
                <div class=\"row\">
                    <div class=\"col-md-6 position-relative\">
                        <div class=\"infoBlock__imgContainer rightSide\">
                            <img src=\"catalog/view/theme/makeme/image/mmclubPage/img4.jpg\" alt=\"#\" class=\"lazy infoBlock__img\">
                        </div>
                        <img src=\"catalog/view/theme/makeme/image/mmclubPage/bubbles4.png\" alt=\"#\" class=\"lazy parallaxBalls parallaxBalls--4\">
                    </div>
                    <div class=\"col-md-6\">
                        <div class=\"infoBlock__body\">
                            <h2 class=\"infoBlock__title\"><span class=\"color-primary\">Акции</span>, <span class=\"color-primary\">скидки</span> и <span class=\"color-primary\">бонусы</span></h2>
                            <p class=\"infoBlock__text\">Мы постоянно готовим сюрпризы для всех участников MAKEMY Beauty Club. Получайте максимум привилегий и освобождайте место в своих косметичках для новых бьюти-фаворитов!<br><br>

                                <span class=\"font-weight-bold\">Что вы получаете:</span> все участники клуба получают наш специальный дайджест. Будьте в курсе новых акций и подарков от множества брендов. Получайте рассылку на свой email и выбирайте самые вкусные предложения!<br><br>

                                <span class=\"font-weight-bold\">Что для этого нужно:</span> укажите свой email в личном кабинете, в разделе \"Управление подписками\" подтвердите уведомления, которые Вы хотели бы получать, и не забывайте проверять почту. </p>
                            <a href=\"#\" class=\"button button--stroke infoBlock__button\">Вступить в клуб</a>
                        </div>
                    </div>
                </div>
            </article>
            <aside class=\"section createYours\">
                <div class=\"createYours__title\">Создай <span class=\"color-primary\">свое!</span></div>
                <p class=\"createYours__text\">Вместе с тобой мы создадим неповторимую косметику именно для тебя! Каждая баночка на 100% индивидуальна.</p>
                <a href=\"#\" class=\"button button--stroke createYours__button\">Создать средство</a>
            </aside>
            <section class=\"section\">
                <div class=\"section__header d-flex align-items-center justify-content-between flex-wrap\">
                    <h2 class=\"section__title mr-4\"><span class=\"color-primary\">Просмотренные</span> ранее</h2>
                    <a href=\"#\" class=\"showMore\">Смотреть больше</a>
                </div>
                <div class=\"owl-carousel carousel-4els transparentProductCards\">
                    <div class=\"productCard\">
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
                            </div>
                        </div>
                    </div>
                    <div class=\"productCard\">
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
                    <div class=\"productCard\">
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
                            </div>
                        </div>
                    </div>
                    <div class=\"productCard\">
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
                    <div class=\"productCard\">
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
                    <div class=\"productCard\">
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
                            </div>
                        </div>
                    </div>
                    <div class=\"productCard\">
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
            </section>
        </div>
    </div>

</main>
";
        // line 326
        echo ($context["footer"] ?? null);
        echo "

";
    }

    public function getTemplateName()
    {
        return "makeme/template/information/mmclub.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  365 => 326,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "makeme/template/information/mmclub.twig", "");
    }
}
