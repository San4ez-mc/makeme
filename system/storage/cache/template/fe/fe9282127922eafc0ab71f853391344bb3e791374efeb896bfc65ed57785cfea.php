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

/* marketplace/modification_form.twig */
class __TwigTemplate_82a846be3080eadf035ad512c36cd81645799e729e815d2bedd1fe8fbe1296e4 extends \Twig\Template
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
        <a type=\"button\" onclick=\"update()\" data-toggle=\"tooltip\" title=\"";
        // line 6
        echo ($context["button_update"] ?? null);
        echo "\" class=\"btn btn-success\"><i class=\"fa fa-check\"></i></a>
        <button type=\"submit\" form=\"form-modification\" data-toggle=\"tooltip\" title=\"";
        // line 7
        echo ($context["button_save"] ?? null);
        echo "\" class=\"btn btn-primary\"><i class=\"fa fa-save\"></i></button>
        <a href=\"";
        // line 8
        echo ($context["cancel"] ?? null);
        echo "\" data-toggle=\"tooltip\" title=\"";
        echo ($context["button_cancel"] ?? null);
        echo "\" class=\"btn btn-default\"><i class=\"fa fa-reply\"></i></a></div>
      <h1>";
        // line 9
        echo ($context["heading_title"] ?? null);
        echo "</h1>
      <ul class=\"breadcrumb\">
        ";
        // line 11
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["breadcrumbs"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["breadcrumb"]) {
            // line 12
            echo "          <li><a href=\"";
            echo twig_get_attribute($this->env, $this->source, $context["breadcrumb"], "href", [], "any", false, false, false, 12);
            echo "\">";
            echo twig_get_attribute($this->env, $this->source, $context["breadcrumb"], "text", [], "any", false, false, false, 12);
            echo "</a></li>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['breadcrumb'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 14
        echo "      </ul>
    </div>
  </div>
  <div class=\"container-fluid\">
    ";
        // line 18
        if (($context["error_warning"] ?? null)) {
            // line 19
            echo "    <div class=\"alert alert-danger\"><i class=\"fa fa-exclamation-circle\"></i> ";
            echo ($context["error_warning"] ?? null);
            echo "
      <button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>
    </div>
    ";
        }
        // line 23
        echo "    <div class=\"panel panel-default\">
      <div class=\"panel-heading\">
        <h3 class=\"panel-title\"><i class=\"fa fa-pencil\"></i> ";
        // line 25
        echo ($context["text_form"] ?? null);
        echo "</h3>
      </div>
      <div class=\"panel-body\">
        <form action=\"";
        // line 28
        echo ($context["action"] ?? null);
        echo "\" method=\"post\" enctype=\"multipart/form-data\" id=\"form-modification\" class=\"form-horizontal\">
          <ul class=\"nav nav-tabs\">
            <li class=\"active\"><a href=\"#tab-general\" data-toggle=\"tab\">";
        // line 30
        echo ($context["tab_general"] ?? null);
        echo "</a></li>
            <li><a href=\"#tab-backup\" data-toggle=\"tab\">";
        // line 31
        echo ($context["tab_backup"] ?? null);
        echo "</a></li>
          </ul>
          <div class=\"tab-content\">
            <div class=\"tab-pane active\" id=\"tab-general\">
              <div class=\"form-group required\">
                <label class=\"col-sm-2 control-label\" for=\"input-name\">";
        // line 36
        echo ($context["entry_name"] ?? null);
        echo "</label>
                <div class=\"col-sm-10\">
                  <input type=\"text\"  name=\"name\" value=\"";
        // line 38
        echo ($context["name"] ?? null);
        echo "\" placeholder=\"";
        echo ($context["entry_name"] ?? null);
        echo "\" id=\"input-name\" class=\"form-control\" />
                </div>
              </div>
              <div class=\"form-group\">
                <label class=\"col-sm-2 control-label\" for=\"input-xml\">";
        // line 42
        echo ($context["entry_xml"] ?? null);
        echo "</label>
                <div class=\"col-sm-10\">
                  <textarea  name=\"xml\" placeholder=\"";
        // line 44
        echo ($context["entry_xml"] ?? null);
        echo "\" id=\"input-xml\" class=\"form-control CodeMirror\">";
        echo ($context["xml"] ?? null);
        echo "</textarea>
                </div>
              </div>
            </div>
            <div class=\"tab-pane\" id=\"tab-backup\">
              <div class=\"table-responsive\">
                <table class=\"table table-bordered table-hover\">
                  <thead>
                  <tr>
                    <td class=\"text-left\">";
        // line 53
        echo ($context["column_id"] ?? null);
        echo "</td>
                    <td class=\"text-left\">";
        // line 54
        echo ($context["column_code"] ?? null);
        echo "</td>
                    <td class=\"text-left\">";
        // line 55
        echo ($context["column_date_added"] ?? null);
        echo "</td>
                    <td class=\"text-right\">";
        // line 56
        echo ($context["column_restore"] ?? null);
        echo " <a type=\"button\" href=\"";
        echo ($context["history"] ?? null);
        echo "\" data-toggle=\"tooltip\" title=\"";
        echo ($context["button_history"] ?? null);
        echo "\" class=\"btn btn-default\"><i class=\"fa fa-trash\"></i></a></td>
                  </tr>
                  </thead>
                  <tbody>
                  ";
        // line 60
        if (($context["backups"] ?? null)) {
            // line 61
            echo "                    ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["backups"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["backup"]) {
                // line 62
                echo "                      <tr>
                        <td class=\"text-left\">";
                // line 63
                echo (($__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4 = $context["backup"]) && is_array($__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4) || $__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4 instanceof ArrayAccess ? ($__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4["backup_id"] ?? null) : null);
                echo "</td>
                        <td class=\"text-left\">";
                // line 64
                echo (($__internal_62824350bc4502ee19dbc2e99fc6bdd3bd90e7d8dd6e72f42c35efd048542144 = $context["backup"]) && is_array($__internal_62824350bc4502ee19dbc2e99fc6bdd3bd90e7d8dd6e72f42c35efd048542144) || $__internal_62824350bc4502ee19dbc2e99fc6bdd3bd90e7d8dd6e72f42c35efd048542144 instanceof ArrayAccess ? ($__internal_62824350bc4502ee19dbc2e99fc6bdd3bd90e7d8dd6e72f42c35efd048542144["code"] ?? null) : null);
                echo "</td>
                        <td class=\"text-left\">";
                // line 65
                echo (($__internal_1cfccaec8dd2e8578ccb026fbe7f2e7e29ac2ed5deb976639c5fc99a6ea8583b = $context["backup"]) && is_array($__internal_1cfccaec8dd2e8578ccb026fbe7f2e7e29ac2ed5deb976639c5fc99a6ea8583b) || $__internal_1cfccaec8dd2e8578ccb026fbe7f2e7e29ac2ed5deb976639c5fc99a6ea8583b instanceof ArrayAccess ? ($__internal_1cfccaec8dd2e8578ccb026fbe7f2e7e29ac2ed5deb976639c5fc99a6ea8583b["date_added"] ?? null) : null);
                echo "</td>
                        <td class=\"text-right\"><a href=\"";
                // line 66
                echo (($__internal_68aa442c1d43d3410ea8f958ba9090f3eaa9a76f8de8fc9be4d6c7389ba28002 = $context["backup"]) && is_array($__internal_68aa442c1d43d3410ea8f958ba9090f3eaa9a76f8de8fc9be4d6c7389ba28002) || $__internal_68aa442c1d43d3410ea8f958ba9090f3eaa9a76f8de8fc9be4d6c7389ba28002 instanceof ArrayAccess ? ($__internal_68aa442c1d43d3410ea8f958ba9090f3eaa9a76f8de8fc9be4d6c7389ba28002["restore"] ?? null) : null);
                echo "\" data-toggle=\"tooltip\" title=\"";
                echo ($context["button_restore"] ?? null);
                echo "\" class=\"btn btn-primary\"><i class=\"fa fa-share-square\"></i></a></td>
                      </tr>
                    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['backup'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 69
            echo "                  ";
        } else {
            // line 70
            echo "                  <tr>
                    <td class=\"text-center\" colspan=\"4\">";
            // line 71
            echo ($context["text_no_results"] ?? null);
            echo "</td>
                  </tr>
                  ";
        }
        // line 74
        echo "                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<script type=\"text/javascript\"><!--
  // Initialize codemirrror
  var editor = CodeMirror.fromTextArea(document.querySelector('.CodeMirror'), {
    mode: 'xml',
    height: '300px',
    lineNumbers: true,
    autofocus: true,
    theme: 'xq-dark'
  });
  editor.setSize(null, 800);

  function update () {
      var action = \$('form#form-modification').attr('action');
      \$('form#form-modification').attr('action', action+\"&update=1\");
      \$('form#form-modification').submit();
  }
--></script>
";
        // line 101
        echo ($context["footer"] ?? null);
    }

    public function getTemplateName()
    {
        return "marketplace/modification_form.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  253 => 101,  224 => 74,  218 => 71,  215 => 70,  212 => 69,  201 => 66,  197 => 65,  193 => 64,  189 => 63,  186 => 62,  181 => 61,  179 => 60,  168 => 56,  164 => 55,  160 => 54,  156 => 53,  142 => 44,  137 => 42,  128 => 38,  123 => 36,  115 => 31,  111 => 30,  106 => 28,  100 => 25,  96 => 23,  88 => 19,  86 => 18,  80 => 14,  69 => 12,  65 => 11,  60 => 9,  54 => 8,  50 => 7,  46 => 6,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "marketplace/modification_form.twig", "");
    }
}
