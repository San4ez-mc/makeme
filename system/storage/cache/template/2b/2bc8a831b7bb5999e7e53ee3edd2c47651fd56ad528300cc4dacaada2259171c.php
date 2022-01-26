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
class __TwigTemplate_55925a043819a7027fa5db7d0b7f70fdcd7b9058434fcbe5686b815ed0c168b4 extends \Twig\Template
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
        // line 33
        echo "    ";
        // line 34
        echo "    ";
        // line 35
        echo "    ";
        // line 36
        echo "    ";
        // line 37
        echo "    ";
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
        // line 47
        echo "    ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["scripts"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["script"]) {
            // line 48
            echo "        <script src=\"";
            echo $context["script"];
            echo "\" type=\"text/javascript\"></script>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['script'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 50
        echo "    ";
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
<body>
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

            ";
        // line 69
        if (($context["logo"] ?? null)) {
            // line 70
            echo "                <a href=\"/\" class=\"page-header__logo\">
                    ";
            // line 72
            echo "                    <img src=\"";
            echo ($context["logo"] ?? null);
            echo "\" title=\"";
            echo ($context["name"] ?? null);
            echo "\" alt=\"";
            echo ($context["name"] ?? null);
            echo "\" class=\"lazy page-header__logo-img\">
                </a>
            ";
        } else {
            // line 75
            echo "                <h1><a href=\"";
            echo ($context["home"] ?? null);
            echo "\">";
            echo ($context["name"] ?? null);
            echo "</a></h1>
            ";
        }
        // line 77
        echo "
            ";
        // line 79
        echo "            ";
        // line 80
        echo "            ";
        // line 81
        echo "            ";
        // line 82
        echo "            ";
        // line 83
        echo "            ";
        // line 84
        echo "            ";
        // line 85
        echo "            ";
        // line 86
        echo "            ";
        // line 87
        echo "            ";
        // line 88
        echo "            ";
        // line 89
        echo "            ";
        // line 90
        echo "            ";
        // line 91
        echo "            ";
        // line 92
        echo "            ";
        // line 93
        echo "            ";
        // line 94
        echo "            ";
        // line 95
        echo "            ";
        // line 96
        echo "            ";
        // line 97
        echo "            ";
        // line 98
        echo "            ";
        // line 99
        echo "            ";
        // line 100
        echo "            ";
        echo ($context["menu"] ?? null);
        echo "
            <nav class=\"page-header__buttons\">
                <a href=\"";
        // line 102
        echo ($context["account"] ?? null);
        echo "\" class=\"page-header__buttons-el page-header__buttons-el--user\"></a>
                <a href=\"#\" class=\"page-header__buttons-el page-header__buttons-el--likes\"></a>
                <a href=\"#\" class=\"page-header__buttons-el page-header__buttons-el--basket\">
                    <span class=\"basket-quantity\">5</span>
                </a>
            </nav>
        </div>
    </header>

    <div class=\"menuMobile\">
        <div class=\"menuMobile__header\">
            <a href=\"#\" class=\"menuMobile__logo\">
                ";
        // line 115
        echo "                <img class=\"lazy\" src=\"";
        echo ($context["logo"] ?? null);
        echo "\" alt=\"logo\">
            </a>
            <span class=\"menuMobile__toggle menuMobileToggle--js\"></span>
        </div>
        ";
        // line 119
        echo ($context["menu_mobile"] ?? null);
        echo "
        ";
        // line 121
        echo "        ";
        // line 122
        echo "        ";
        // line 123
        echo "        ";
        // line 124
        echo "        ";
        // line 125
        echo "        ";
        // line 126
        echo "        ";
        // line 127
        echo "        ";
        // line 128
        echo "        ";
        // line 129
        echo "        ";
        // line 130
        echo "        ";
        // line 131
        echo "        ";
        // line 132
        echo "        ";
        // line 133
        echo "        ";
        // line 134
        echo "        ";
        // line 135
        echo "        ";
        // line 136
        echo "        ";
        // line 137
        echo "        ";
        // line 138
        echo "        ";
        // line 139
        echo "        ";
        // line 140
        echo "        ";
        // line 141
        echo "        ";
        // line 142
        echo "        ";
        // line 143
        echo "        ";
        // line 144
        echo "        ";
        // line 145
        echo "        ";
        // line 146
        echo "        ";
        // line 147
        echo "        ";
        // line 148
        echo "        ";
        // line 149
        echo "        ";
        // line 150
        echo "        ";
        // line 151
        echo "        ";
        // line 152
        echo "        ";
        // line 153
        echo "        ";
        // line 154
        echo "        ";
        // line 155
        echo "        ";
        // line 156
        echo "        ";
        // line 157
        echo "        ";
        // line 158
        echo "        ";
        // line 159
        echo "        ";
        // line 160
        echo "        ";
        // line 161
        echo "        ";
        // line 162
        echo "        ";
        // line 163
        echo "        ";
        // line 164
        echo "        ";
        // line 165
        echo "        ";
        // line 166
        echo "        ";
        // line 167
        echo "        ";
        // line 168
        echo "        ";
        // line 169
        echo "        ";
        // line 170
        echo "        ";
        // line 171
        echo "        ";
        // line 172
        echo "        ";
        // line 173
        echo "        ";
        // line 174
        echo "        ";
        // line 175
        echo "        ";
        // line 176
        echo "        ";
        // line 177
        echo "        ";
        // line 178
        echo "        ";
        // line 179
        echo "        ";
        // line 180
        echo "    </div>

    ";
        // line 183
        echo "    ";
        // line 184
        echo "    ";
        // line 185
        echo "    ";
        // line 186
        echo "    ";
        // line 187
        echo "    ";
        // line 188
        echo "    ";
        // line 189
        echo "    ";
        // line 190
        echo "    ";
        // line 191
        echo "    ";
        // line 192
        echo "    ";
        // line 193
        echo "    ";
        // line 194
        echo "    ";
        // line 195
        echo "    ";
        // line 196
        echo "    ";
        // line 197
        echo "    ";
        // line 198
        echo "    ";
        // line 199
        echo "    ";
        // line 200
        echo "    ";
        // line 201
        echo "    ";
        // line 202
        echo "    ";
        // line 203
        echo "    ";
        // line 204
        echo "    ";
        // line 205
        echo "    ";
        // line 206
        echo "    ";
        // line 207
        echo "    ";
        // line 208
        echo "    ";
        // line 209
        echo "    ";
        // line 210
        echo "    ";
        // line 211
        echo "    ";
        // line 212
        echo "    ";
        // line 213
        echo "    ";
        // line 214
        echo "    ";
        // line 215
        echo "    ";
        // line 216
        echo "    ";
        // line 217
        echo "    ";
        // line 218
        echo "    ";
        // line 219
        echo "    ";
        // line 220
        echo "    ";
        // line 221
        echo "    ";
        // line 222
        echo "    ";
        // line 223
        echo "    ";
        // line 224
        echo "    ";
        // line 225
        echo "    ";
        // line 226
        echo "    ";
        // line 227
        echo "    ";
        // line 228
        echo "    ";
        // line 229
        echo "    ";
        // line 230
        echo "    ";
        // line 231
        echo "    ";
        // line 232
        echo "    ";
        // line 233
        echo "    ";
        // line 234
        echo "    ";
        // line 235
        echo "    ";
        // line 236
        echo "    ";
        // line 237
        echo "    ";
        // line 238
        echo "    ";
        // line 239
        echo "    ";
        // line 240
        echo "    ";
        // line 241
        echo "    ";
        // line 242
        echo "    ";
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
        return array (  568 => 242,  566 => 241,  564 => 240,  562 => 239,  560 => 238,  558 => 237,  556 => 236,  554 => 235,  552 => 234,  550 => 233,  548 => 232,  546 => 231,  544 => 230,  542 => 229,  540 => 228,  538 => 227,  536 => 226,  534 => 225,  532 => 224,  530 => 223,  528 => 222,  526 => 221,  524 => 220,  522 => 219,  520 => 218,  518 => 217,  516 => 216,  514 => 215,  512 => 214,  510 => 213,  508 => 212,  506 => 211,  504 => 210,  502 => 209,  500 => 208,  498 => 207,  496 => 206,  494 => 205,  492 => 204,  490 => 203,  488 => 202,  486 => 201,  484 => 200,  482 => 199,  480 => 198,  478 => 197,  476 => 196,  474 => 195,  472 => 194,  470 => 193,  468 => 192,  466 => 191,  464 => 190,  462 => 189,  460 => 188,  458 => 187,  456 => 186,  454 => 185,  452 => 184,  450 => 183,  446 => 180,  444 => 179,  442 => 178,  440 => 177,  438 => 176,  436 => 175,  434 => 174,  432 => 173,  430 => 172,  428 => 171,  426 => 170,  424 => 169,  422 => 168,  420 => 167,  418 => 166,  416 => 165,  414 => 164,  412 => 163,  410 => 162,  408 => 161,  406 => 160,  404 => 159,  402 => 158,  400 => 157,  398 => 156,  396 => 155,  394 => 154,  392 => 153,  390 => 152,  388 => 151,  386 => 150,  384 => 149,  382 => 148,  380 => 147,  378 => 146,  376 => 145,  374 => 144,  372 => 143,  370 => 142,  368 => 141,  366 => 140,  364 => 139,  362 => 138,  360 => 137,  358 => 136,  356 => 135,  354 => 134,  352 => 133,  350 => 132,  348 => 131,  346 => 130,  344 => 129,  342 => 128,  340 => 127,  338 => 126,  336 => 125,  334 => 124,  332 => 123,  330 => 122,  328 => 121,  324 => 119,  316 => 115,  301 => 102,  295 => 100,  293 => 99,  291 => 98,  289 => 97,  287 => 96,  285 => 95,  283 => 94,  281 => 93,  279 => 92,  277 => 91,  275 => 90,  273 => 89,  271 => 88,  269 => 87,  267 => 86,  265 => 85,  263 => 84,  261 => 83,  259 => 82,  257 => 81,  255 => 80,  253 => 79,  250 => 77,  242 => 75,  231 => 72,  228 => 70,  226 => 69,  214 => 60,  209 => 57,  200 => 55,  195 => 54,  184 => 52,  179 => 51,  177 => 50,  168 => 48,  163 => 47,  150 => 45,  146 => 44,  138 => 38,  136 => 37,  134 => 36,  132 => 35,  130 => 34,  128 => 33,  123 => 31,  117 => 29,  111 => 27,  109 => 26,  105 => 25,  99 => 23,  93 => 21,  90 => 20,  84 => 18,  82 => 17,  77 => 16,  71 => 14,  69 => 13,  65 => 12,  54 => 6,  47 => 4,  41 => 3,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "makeme/template/common/header.twig", "");
    }
}
