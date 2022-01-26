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

/* catalog/option_form.twig */
class __TwigTemplate_54b5d96a3478500c324835fb029723598750c31076d8788e29515cff37ecf667 extends \Twig\Template
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
        echo ($context["column_left"] ?? null);
        echo "
<div id=\"content\">
  <div class=\"page-header\">
    <div class=\"container-fluid\">
      <div class=\"pull-right\">
        <button type=\"submit\" form=\"form-option\" data-toggle=\"tooltip\" title=\"";
        // line 6
        echo ($context["button_save"] ?? null);
        echo "\" class=\"btn btn-primary\"><i class=\"fa fa-save\"></i></button>
        <a href=\"";
        // line 7
        echo ($context["cancel"] ?? null);
        echo "\" data-toggle=\"tooltip\" title=\"";
        echo ($context["button_cancel"] ?? null);
        echo "\" class=\"btn btn-default\"><i class=\"fa fa-reply\"></i></a></div>
      <h1>";
        // line 8
        echo ($context["heading_title"] ?? null);
        echo "</h1>
      <ul class=\"breadcrumb\">
        ";
        // line 10
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["breadcrumbs"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["breadcrumb"]) {
            // line 11
            echo "        <li><a href=\"";
            echo twig_get_attribute($this->env, $this->source, $context["breadcrumb"], "href", [], "any", false, false, false, 11);
            echo "\">";
            echo twig_get_attribute($this->env, $this->source, $context["breadcrumb"], "text", [], "any", false, false, false, 11);
            echo "</a></li>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['breadcrumb'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 13
        echo "      </ul>
    </div>
  </div>
  <div class=\"container-fluid\"> ";
        // line 16
        if (($context["error_warning"] ?? null)) {
            // line 17
            echo "    <div class=\"alert alert-danger alert-dismissible\"><i class=\"fa fa-exclamation-circle\"></i> ";
            echo ($context["error_warning"] ?? null);
            echo "
      <button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>
    </div>
    ";
        }
        // line 21
        echo "    <div class=\"panel panel-default\">
      <div class=\"panel-heading\">
        <h3 class=\"panel-title\"><i class=\"fa fa-pencil\"></i> ";
        // line 23
        echo ($context["text_form"] ?? null);
        echo "</h3>
      </div>
      <div class=\"panel-body\">
        <form action=\"";
        // line 26
        echo ($context["action"] ?? null);
        echo "\" method=\"post\" enctype=\"multipart/form-data\" id=\"form-option\" class=\"form-horizontal\">
          <fieldset>
            <legend>";
        // line 28
        echo ($context["text_option"] ?? null);
        echo "</legend>
            <div class=\"form-group required\">
              <label class=\"col-sm-2 control-label\">";
        // line 30
        echo ($context["entry_name"] ?? null);
        echo "</label>
              <div class=\"col-sm-10\"> ";
        // line 31
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["languages"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["language"]) {
            // line 32
            echo "                <div class=\"input-group\"><span class=\"input-group-addon\"><img src=\"language/";
            echo twig_get_attribute($this->env, $this->source, $context["language"], "code", [], "any", false, false, false, 32);
            echo "/";
            echo twig_get_attribute($this->env, $this->source, $context["language"], "code", [], "any", false, false, false, 32);
            echo ".png\" title=\"";
            echo twig_get_attribute($this->env, $this->source, $context["language"], "name", [], "any", false, false, false, 32);
            echo "\" /></span>
                  <input type=\"text\" name=\"option_description[";
            // line 33
            echo twig_get_attribute($this->env, $this->source, $context["language"], "language_id", [], "any", false, false, false, 33);
            echo "][name]\" value=\"";
            echo (((($__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4 = ($context["option_description"] ?? null)) && is_array($__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4) || $__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4 instanceof ArrayAccess ? ($__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4[twig_get_attribute($this->env, $this->source, $context["language"], "language_id", [], "any", false, false, false, 33)] ?? null) : null)) ? (twig_get_attribute($this->env, $this->source, (($__internal_62824350bc4502ee19dbc2e99fc6bdd3bd90e7d8dd6e72f42c35efd048542144 = ($context["option_description"] ?? null)) && is_array($__internal_62824350bc4502ee19dbc2e99fc6bdd3bd90e7d8dd6e72f42c35efd048542144) || $__internal_62824350bc4502ee19dbc2e99fc6bdd3bd90e7d8dd6e72f42c35efd048542144 instanceof ArrayAccess ? ($__internal_62824350bc4502ee19dbc2e99fc6bdd3bd90e7d8dd6e72f42c35efd048542144[twig_get_attribute($this->env, $this->source, $context["language"], "language_id", [], "any", false, false, false, 33)] ?? null) : null), "name", [], "any", false, false, false, 33)) : (""));
            echo "\" placeholder=\"";
            echo ($context["entry_name"] ?? null);
            echo "\" class=\"form-control\" />
                </div>
                ";
            // line 35
            if ((($__internal_1cfccaec8dd2e8578ccb026fbe7f2e7e29ac2ed5deb976639c5fc99a6ea8583b = ($context["error_name"] ?? null)) && is_array($__internal_1cfccaec8dd2e8578ccb026fbe7f2e7e29ac2ed5deb976639c5fc99a6ea8583b) || $__internal_1cfccaec8dd2e8578ccb026fbe7f2e7e29ac2ed5deb976639c5fc99a6ea8583b instanceof ArrayAccess ? ($__internal_1cfccaec8dd2e8578ccb026fbe7f2e7e29ac2ed5deb976639c5fc99a6ea8583b[twig_get_attribute($this->env, $this->source, $context["language"], "language_id", [], "any", false, false, false, 35)] ?? null) : null)) {
                // line 36
                echo "                <div class=\"text-danger\">";
                echo (($__internal_68aa442c1d43d3410ea8f958ba9090f3eaa9a76f8de8fc9be4d6c7389ba28002 = ($context["error_name"] ?? null)) && is_array($__internal_68aa442c1d43d3410ea8f958ba9090f3eaa9a76f8de8fc9be4d6c7389ba28002) || $__internal_68aa442c1d43d3410ea8f958ba9090f3eaa9a76f8de8fc9be4d6c7389ba28002 instanceof ArrayAccess ? ($__internal_68aa442c1d43d3410ea8f958ba9090f3eaa9a76f8de8fc9be4d6c7389ba28002[twig_get_attribute($this->env, $this->source, $context["language"], "language_id", [], "any", false, false, false, 36)] ?? null) : null);
                echo "</div>
                ";
            }
            // line 38
            echo "                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['language'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        echo "</div>
            </div>
            <div class=\"form-group\">
              <label class=\"col-sm-2 control-label\" for=\"input-type\">";
        // line 41
        echo ($context["entry_type"] ?? null);
        echo "</label>
              <div class=\"col-sm-10\">
                <select name=\"type\" id=\"input-type\" class=\"form-control\">
                  <optgroup label=\"";
        // line 44
        echo ($context["text_choose"] ?? null);
        echo "\">
                ";
        // line 45
        if ((($context["type"] ?? null) == "select")) {
            // line 46
            echo "                
                
                  <option value=\"select\" selected=\"selected\">";
            // line 48
            echo ($context["text_select"] ?? null);
            echo "</option>
                  
                
                ";
        } else {
            // line 52
            echo "                
                
                  <option value=\"select\">";
            // line 54
            echo ($context["text_select"] ?? null);
            echo "</option>
                  
                
                ";
        }
        // line 58
        echo "                ";
        if ((($context["type"] ?? null) == "radio")) {
            // line 59
            echo "                
                
                  <option value=\"radio\" selected=\"selected\">";
            // line 61
            echo ($context["text_radio"] ?? null);
            echo "</option>
                  
                
                ";
        } else {
            // line 65
            echo "                
                
                  <option value=\"radio\">";
            // line 67
            echo ($context["text_radio"] ?? null);
            echo "</option>
                  
                
                ";
        }
        // line 71
        echo "                ";
        if ((($context["type"] ?? null) == "checkbox")) {
            // line 72
            echo "                
                
                  <option value=\"checkbox\" selected=\"selected\">";
            // line 74
            echo ($context["text_checkbox"] ?? null);
            echo "</option>
                  
                
                ";
        } else {
            // line 78
            echo "                
                
                  <option value=\"checkbox\">";
            // line 80
            echo ($context["text_checkbox"] ?? null);
            echo "</option>
                  
                
                ";
        }
        // line 84
        echo "                </optgroup>
                  <optgroup label=\"";
        // line 85
        echo ($context["text_input"] ?? null);
        echo "\">
                ";
        // line 86
        if ((($context["type"] ?? null) == "text")) {
            // line 87
            echo "                
                
                  <option value=\"text\" selected=\"selected\">";
            // line 89
            echo ($context["text_text"] ?? null);
            echo "</option>
                  
                
                ";
        } else {
            // line 93
            echo "                
                
                  <option value=\"text\">";
            // line 95
            echo ($context["text_text"] ?? null);
            echo "</option>
                  
                
                ";
        }
        // line 99
        echo "                ";
        if ((($context["type"] ?? null) == "textarea")) {
            // line 100
            echo "                
                
                  <option value=\"textarea\" selected=\"selected\">";
            // line 102
            echo ($context["text_textarea"] ?? null);
            echo "</option>
                  
                
                ";
        } else {
            // line 106
            echo "                
                
                  <option value=\"textarea\">";
            // line 108
            echo ($context["text_textarea"] ?? null);
            echo "</option>
                  
                
                ";
        }
        // line 112
        echo "                </optgroup>
                  <optgroup label=\"";
        // line 113
        echo ($context["text_file"] ?? null);
        echo "\">
                ";
        // line 114
        if ((($context["type"] ?? null) == "file")) {
            // line 115
            echo "                
                
                  <option value=\"file\" selected=\"selected\">";
            // line 117
            echo ($context["text_file"] ?? null);
            echo "</option>
                  
                
                ";
        } else {
            // line 121
            echo "                
                
                  <option value=\"file\">";
            // line 123
            echo ($context["text_file"] ?? null);
            echo "</option>
                  
                
                ";
        }
        // line 127
        echo "                </optgroup>
                  <optgroup label=\"";
        // line 128
        echo ($context["text_date"] ?? null);
        echo "\">
                ";
        // line 129
        if ((($context["type"] ?? null) == "date")) {
            // line 130
            echo "                
                
                  <option value=\"date\" selected=\"selected\">";
            // line 132
            echo ($context["text_date"] ?? null);
            echo "</option>
                  
                
                ";
        } else {
            // line 136
            echo "                
                
                  <option value=\"date\">";
            // line 138
            echo ($context["text_date"] ?? null);
            echo "</option>
                  
                
                ";
        }
        // line 142
        echo "                ";
        if ((($context["type"] ?? null) == "time")) {
            // line 143
            echo "                
                
                  <option value=\"time\" selected=\"selected\">";
            // line 145
            echo ($context["text_time"] ?? null);
            echo "</option>
                  
                
                ";
        } else {
            // line 149
            echo "                
                
                  <option value=\"time\">";
            // line 151
            echo ($context["text_time"] ?? null);
            echo "</option>
                  
                
                ";
        }
        // line 155
        echo "                ";
        if ((($context["type"] ?? null) == "datetime")) {
            // line 156
            echo "                
                
                  <option value=\"datetime\" selected=\"selected\">";
            // line 158
            echo ($context["text_datetime"] ?? null);
            echo "</option>
                  
                
                ";
        } else {
            // line 162
            echo "                
                
                  <option value=\"datetime\">";
            // line 164
            echo ($context["text_datetime"] ?? null);
            echo "</option>
                  
                
                ";
        }
        // line 168
        echo "                </optgroup>
                </select>
              </div>
            </div>
            <div class=\"form-group\">
              <label class=\"col-sm-2 control-label\" for=\"input-sort-order\">";
        // line 173
        echo ($context["entry_sort_order"] ?? null);
        echo "</label>
              <div class=\"col-sm-10\">
                <input type=\"text\" name=\"sort_order\" value=\"";
        // line 175
        echo ($context["sort_order"] ?? null);
        echo "\" placeholder=\"";
        echo ($context["entry_sort_order"] ?? null);
        echo "\" id=\"input-sort-order\" class=\"form-control\" />
              </div>
            </div>
          </fieldset>
          <fieldset>
            <legend>";
        // line 180
        echo ($context["text_value"] ?? null);
        echo "</legend>
            <table id=\"option-value\" class=\"table table-striped table-bordered table-hover\">
              <thead>
                <tr>
                  <td class=\"text-left required\">";
        // line 184
        echo ($context["entry_option_value"] ?? null);
        echo "</td>
                  <td class=\"text-center\">";
        // line 185
        echo ($context["entry_image"] ?? null);
        echo "</td>
                  <td class=\"text-right\">";
        // line 186
        echo ($context["entry_sort_order"] ?? null);
        echo "</td>
                  <td></td>
                </tr>
              </thead>
              <tbody>
              
              ";
        // line 192
        $context["option_value_row"] = 0;
        // line 193
        echo "              ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["option_values"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["option_value"]) {
            // line 194
            echo "              <tr id=\"option-value-row";
            echo ($context["option_value_row"] ?? null);
            echo "\">
                <td class=\"text-center\"><input type=\"hidden\" name=\"option_value[";
            // line 195
            echo ($context["option_value_row"] ?? null);
            echo "][option_value_id]\" value=\"";
            echo twig_get_attribute($this->env, $this->source, $context["option_value"], "option_value_id", [], "any", false, false, false, 195);
            echo "\" />
                  ";
            // line 196
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["languages"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["language"]) {
                // line 197
                echo "                  <div class=\"input-group\"><span class=\"input-group-addon\"><img src=\"language/";
                echo twig_get_attribute($this->env, $this->source, $context["language"], "code", [], "any", false, false, false, 197);
                echo "/";
                echo twig_get_attribute($this->env, $this->source, $context["language"], "code", [], "any", false, false, false, 197);
                echo ".png\" title=\"";
                echo twig_get_attribute($this->env, $this->source, $context["language"], "name", [], "any", false, false, false, 197);
                echo "\" /></span>
                    <input type=\"text\" name=\"option_value[";
                // line 198
                echo ($context["option_value_row"] ?? null);
                echo "][option_value_description][";
                echo twig_get_attribute($this->env, $this->source, $context["language"], "language_id", [], "any", false, false, false, 198);
                echo "][name]\" value=\"";
                echo (((($__internal_d7fc55f1a54b629533d60b43063289db62e68921ee7a5f8de562bd9d4a2b7ad4 = twig_get_attribute($this->env, $this->source, $context["option_value"], "option_value_description", [], "any", false, false, false, 198)) && is_array($__internal_d7fc55f1a54b629533d60b43063289db62e68921ee7a5f8de562bd9d4a2b7ad4) || $__internal_d7fc55f1a54b629533d60b43063289db62e68921ee7a5f8de562bd9d4a2b7ad4 instanceof ArrayAccess ? ($__internal_d7fc55f1a54b629533d60b43063289db62e68921ee7a5f8de562bd9d4a2b7ad4[twig_get_attribute($this->env, $this->source, $context["language"], "language_id", [], "any", false, false, false, 198)] ?? null) : null)) ? (twig_get_attribute($this->env, $this->source, (($__internal_01476f8db28655ee4ee02ea2d17dd5a92599be76304f08cd8bc0e05aced30666 = twig_get_attribute($this->env, $this->source, $context["option_value"], "option_value_description", [], "any", false, false, false, 198)) && is_array($__internal_01476f8db28655ee4ee02ea2d17dd5a92599be76304f08cd8bc0e05aced30666) || $__internal_01476f8db28655ee4ee02ea2d17dd5a92599be76304f08cd8bc0e05aced30666 instanceof ArrayAccess ? ($__internal_01476f8db28655ee4ee02ea2d17dd5a92599be76304f08cd8bc0e05aced30666[twig_get_attribute($this->env, $this->source, $context["language"], "language_id", [], "any", false, false, false, 198)] ?? null) : null), "name", [], "any", false, false, false, 198)) : (""));
                echo "\" placeholder=\"";
                echo ($context["entry_option_value"] ?? null);
                echo "\" class=\"form-control\" />
                  </div>
                  ";
                // line 200
                if ((($__internal_01c35b74bd85735098add188b3f8372ba465b232ab8298cb582c60f493d3c22e = (($__internal_63ad1f9a2bf4db4af64b010785e9665558fdcac0e8db8b5b413ed986c62dbb52 = ($context["error_option_value"] ?? null)) && is_array($__internal_63ad1f9a2bf4db4af64b010785e9665558fdcac0e8db8b5b413ed986c62dbb52) || $__internal_63ad1f9a2bf4db4af64b010785e9665558fdcac0e8db8b5b413ed986c62dbb52 instanceof ArrayAccess ? ($__internal_63ad1f9a2bf4db4af64b010785e9665558fdcac0e8db8b5b413ed986c62dbb52[($context["option_value_row"] ?? null)] ?? null) : null)) && is_array($__internal_01c35b74bd85735098add188b3f8372ba465b232ab8298cb582c60f493d3c22e) || $__internal_01c35b74bd85735098add188b3f8372ba465b232ab8298cb582c60f493d3c22e instanceof ArrayAccess ? ($__internal_01c35b74bd85735098add188b3f8372ba465b232ab8298cb582c60f493d3c22e[twig_get_attribute($this->env, $this->source, $context["language"], "language_id", [], "any", false, false, false, 200)] ?? null) : null)) {
                    // line 201
                    echo "                  <div class=\"text-danger\">";
                    echo (($__internal_f10a4cc339617934220127f034125576ed229e948660ebac906a15846d52f136 = (($__internal_887a873a4dc3cf8bd4f99c487b4c7727999c350cc3a772414714e49a195e4386 = ($context["error_option_value"] ?? null)) && is_array($__internal_887a873a4dc3cf8bd4f99c487b4c7727999c350cc3a772414714e49a195e4386) || $__internal_887a873a4dc3cf8bd4f99c487b4c7727999c350cc3a772414714e49a195e4386 instanceof ArrayAccess ? ($__internal_887a873a4dc3cf8bd4f99c487b4c7727999c350cc3a772414714e49a195e4386[($context["option_value_row"] ?? null)] ?? null) : null)) && is_array($__internal_f10a4cc339617934220127f034125576ed229e948660ebac906a15846d52f136) || $__internal_f10a4cc339617934220127f034125576ed229e948660ebac906a15846d52f136 instanceof ArrayAccess ? ($__internal_f10a4cc339617934220127f034125576ed229e948660ebac906a15846d52f136[twig_get_attribute($this->env, $this->source, $context["language"], "language_id", [], "any", false, false, false, 201)] ?? null) : null);
                    echo "</div>
                  ";
                }
                // line 203
                echo "                  ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['language'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            echo "</td>
                <td class=\"text-left\"><a href=\"\" id=\"thumb-image";
            // line 204
            echo ($context["option_value_row"] ?? null);
            echo "\" data-toggle=\"image\" class=\"img-thumbnail\"><img src=\"";
            echo twig_get_attribute($this->env, $this->source, $context["option_value"], "thumb", [], "any", false, false, false, 204);
            echo "\" alt=\"\" title=\"\" data-placeholder=\"";
            echo ($context["placeholder"] ?? null);
            echo "\" /></a>
                  <input type=\"hidden\" name=\"option_value[";
            // line 205
            echo ($context["option_value_row"] ?? null);
            echo "][image]\" value=\"";
            echo twig_get_attribute($this->env, $this->source, $context["option_value"], "image", [], "any", false, false, false, 205);
            echo "\" id=\"input-image";
            echo ($context["option_value_row"] ?? null);
            echo "\" /></td>
                <td class=\"text-right\"><input type=\"text\" name=\"option_value[";
            // line 206
            echo ($context["option_value_row"] ?? null);
            echo "][sort_order]\" value=\"";
            echo twig_get_attribute($this->env, $this->source, $context["option_value"], "sort_order", [], "any", false, false, false, 206);
            echo "\" class=\"form-control\" /></td>
                <td class=\"text-right\"><button type=\"button\" onclick=\"\$('#option-value-row";
            // line 207
            echo ($context["option_value_row"] ?? null);
            echo "').remove();\" data-toggle=\"tooltip\" title=\"";
            echo ($context["button_remove"] ?? null);
            echo "\" class=\"btn btn-danger\"><i class=\"fa fa-minus-circle\"></i></button></td>
              </tr>
              ";
            // line 209
            $context["option_value_row"] = (($context["option_value_row"] ?? null) + 1);
            // line 210
            echo "              ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['option_value'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 211
        echo "                </tbody>
              
              <tfoot>
                <tr>
                  <td colspan=\"3\"></td>
                  <td class=\"text-right\"><button type=\"button\" onclick=\"addOptionValue();\" data-toggle=\"tooltip\" title=\"";
        // line 216
        echo ($context["button_option_value_add"] ?? null);
        echo "\" class=\"btn btn-primary\"><i class=\"fa fa-plus-circle\"></i></button></td>
                </tr>
              </tfoot>
            </table>
          </fieldset>
        </form>
      </div>
    </div>
  </div>
  <script type=\"text/javascript\"><!--
\$('select[name=\\'type\\']').on('change', function() {
\tif (this.value == 'select' || this.value == 'radio' || this.value == 'checkbox' || this.value == 'image') {
\t\t\$('#option-value').parent().show();
\t} else {
\t\t\$('#option-value').parent().hide();
\t}
});

\$('select[name=\\'type\\']').trigger('change');

var option_value_row = ";
        // line 236
        echo ($context["option_value_row"] ?? null);
        echo ";

function addOptionValue() {
\thtml  = '<tr id=\"option-value-row' + option_value_row + '\">';
    html += '  <td class=\"text-left\"><input type=\"hidden\" name=\"option_value[' + option_value_row + '][option_value_id]\" value=\"\" />';
\t";
        // line 241
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["languages"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["language"]) {
            // line 242
            echo "\thtml += '    <div class=\"input-group\">';
\thtml += '      <span class=\"input-group-addon\"><img src=\"language/";
            // line 243
            echo twig_get_attribute($this->env, $this->source, $context["language"], "code", [], "any", false, false, false, 243);
            echo "/";
            echo twig_get_attribute($this->env, $this->source, $context["language"], "code", [], "any", false, false, false, 243);
            echo ".png\" title=\"";
            echo twig_get_attribute($this->env, $this->source, $context["language"], "name", [], "any", false, false, false, 243);
            echo "\" /></span><input type=\"text\" name=\"option_value[' + option_value_row + '][option_value_description][";
            echo twig_get_attribute($this->env, $this->source, $context["language"], "language_id", [], "any", false, false, false, 243);
            echo "][name]\" value=\"\" placeholder=\"";
            echo ($context["entry_option_value"] ?? null);
            echo "\" class=\"form-control\" />';
    html += '    </div>';
\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['language'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 246
        echo "\thtml += '  </td>';
    html += '  <td class=\"text-center\"><a href=\"\" id=\"thumb-image' + option_value_row + '\" data-toggle=\"image\" class=\"img-thumbnail\"><img src=\"";
        // line 247
        echo ($context["placeholder"] ?? null);
        echo "\" alt=\"\" title=\"\" data-placeholder=\"";
        echo ($context["placeholder"] ?? null);
        echo "\" /></a><input type=\"hidden\" name=\"option_value[' + option_value_row + '][image]\" value=\"\" id=\"input-image' + option_value_row + '\" /></td>';
\thtml += '  <td class=\"text-right\"><input type=\"text\" name=\"option_value[' + option_value_row + '][sort_order]\" value=\"\" placeholder=\"";
        // line 248
        echo ($context["entry_sort_order"] ?? null);
        echo "\" class=\"form-control\" /></td>';
\thtml += '  <td class=\"text-right\"><button type=\"button\" onclick=\"\$(\\'#option-value-row' + option_value_row + '\\').remove();\" data-toggle=\"tooltip\" title=\"";
        // line 249
        echo ($context["button_remove"] ?? null);
        echo "\" class=\"btn btn-danger\"><i class=\"fa fa-minus-circle\"></i></button></td>';
\thtml += '</tr>';

\t\$('#option-value tbody').append(html);

\toption_value_row++;
}
//--></script></div>
";
        // line 257
        echo ($context["footer"] ?? null);
        echo " ";
    }

    public function getTemplateName()
    {
        return "catalog/option_form.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  634 => 257,  623 => 249,  619 => 248,  613 => 247,  610 => 246,  593 => 243,  590 => 242,  586 => 241,  578 => 236,  555 => 216,  548 => 211,  542 => 210,  540 => 209,  533 => 207,  527 => 206,  519 => 205,  511 => 204,  503 => 203,  497 => 201,  495 => 200,  484 => 198,  475 => 197,  471 => 196,  465 => 195,  460 => 194,  455 => 193,  453 => 192,  444 => 186,  440 => 185,  436 => 184,  429 => 180,  419 => 175,  414 => 173,  407 => 168,  400 => 164,  396 => 162,  389 => 158,  385 => 156,  382 => 155,  375 => 151,  371 => 149,  364 => 145,  360 => 143,  357 => 142,  350 => 138,  346 => 136,  339 => 132,  335 => 130,  333 => 129,  329 => 128,  326 => 127,  319 => 123,  315 => 121,  308 => 117,  304 => 115,  302 => 114,  298 => 113,  295 => 112,  288 => 108,  284 => 106,  277 => 102,  273 => 100,  270 => 99,  263 => 95,  259 => 93,  252 => 89,  248 => 87,  246 => 86,  242 => 85,  239 => 84,  232 => 80,  228 => 78,  221 => 74,  217 => 72,  214 => 71,  207 => 67,  203 => 65,  196 => 61,  192 => 59,  189 => 58,  182 => 54,  178 => 52,  171 => 48,  167 => 46,  165 => 45,  161 => 44,  155 => 41,  145 => 38,  139 => 36,  137 => 35,  128 => 33,  119 => 32,  115 => 31,  111 => 30,  106 => 28,  101 => 26,  95 => 23,  91 => 21,  83 => 17,  81 => 16,  76 => 13,  65 => 11,  61 => 10,  56 => 8,  50 => 7,  46 => 6,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "catalog/option_form.twig", "");
    }
}
