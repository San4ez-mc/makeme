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

/* makeme/template/extension/module/featured.twig */
class __TwigTemplate_5626534b1056c85d591ed3eeaf2333742f5bdb5504aa140a65cd5ea28d535fd1 extends \Twig\Template
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
        echo "<div class=\"section hero\">
    <div class=\"row\">
        <div class=\"col-xl-8\">
            <a href=\"#\" class=\"hero__el hero__el--1\">
                <span class=\"hero__el-title\">Только вы знаете что лучше для вашей кожи!</span>
                <span class=\"hero__el-text\">Никто не знает ваше тело так как вы сами! Именно поэтому мы создали конструктор косметики который сможет на 100% удовлетворить потребности только вашей кожи! </span>
                <span class=\"button button--main button--arrow\">Создать средство</span>
                <img
                        ";
        // line 10
        echo "                        src=\"catalog/view/theme/makeme/image/home/heroImg1.png\"
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
                                src=\"catalog/view/theme/makeme/image/home/heroImg2.png\"
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
                                src=\"catalog/view/theme/makeme/image/home/heroImg3.png\"
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
</div>";
    }

    public function getTemplateName()
    {
        return "makeme/template/extension/module/featured.twig";
    }

    public function getDebugInfo()
    {
        return array (  47 => 10,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "makeme/template/extension/module/featured.twig", "");
    }
}
