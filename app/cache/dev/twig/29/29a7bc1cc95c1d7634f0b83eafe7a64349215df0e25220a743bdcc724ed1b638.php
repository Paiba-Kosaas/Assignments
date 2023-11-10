<?php

/* UserBundle:User:index.html.twig */
class __TwigTemplate_421c406959b48fb1ff8eb4f0d45088e20525b4b6b682cd27c158bd44e60bc2cb extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("layout.html.twig", "UserBundle:User:index.html.twig", 1);
        $this->blocks = array(
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "UserBundle:User:index.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 4
    public function block_body($context, array $blocks = array())
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        // line 5
        echo "<h2>Users</h2>


    <table border=\"1\">
        <tr>
            <th>Username</th>
            <th>First name</th>
            <th>Last name</th>
            <th>Email</th>
            <th>Role</th>
            <th>Created</th>
            <th>Updated</th>
            <th>Actions</th>
        </tr>
        ";
        // line 19
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["users"] ?? $this->getContext($context, "users")));
        foreach ($context['_seq'] as $context["_key"] => $context["user"]) {
            // line 20
            echo "        <tr>
            <td>";
            // line 21
            echo twig_escape_filter($this->env, $this->getAttribute($context["user"], "username", array()), "html", null, true);
            echo "</td>
            <td>";
            // line 22
            echo twig_escape_filter($this->env, $this->getAttribute($context["user"], "firstName", array()), "html", null, true);
            echo "</td>
            <td>";
            // line 23
            echo twig_escape_filter($this->env, $this->getAttribute($context["user"], "lastName", array()), "html", null, true);
            echo "</td>
            <td>";
            // line 24
            echo twig_escape_filter($this->env, $this->getAttribute($context["user"], "email", array()), "html", null, true);
            echo "</td>
            <td>
                ";
            // line 26
            if (($this->getAttribute($context["user"], "role", array()) == "ROLE_ADMIN")) {
                // line 27
                echo "                    <strong>Administrator</strong>
                ";
            } elseif (($this->getAttribute(            // line 28
$context["user"], "role", array()) == "ROLE_USER")) {
                // line 29
                echo "                    <strong>User</strong>
                ";
            }
            // line 31
            echo "            </td>
            <td>";
            // line 32
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($context["user"], "createdAt", array()), "d-m-Y H:i"), "html", null, true);
            echo "</td>
            <td>";
            // line 33
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($context["user"], "updatedAt", array()), "d-m-Y H:i"), "html", null, true);
            echo "</td>
            <td>
                <a href=\"#\">View</a>
                <a href=\"#\">Edit</a>
                <a href=\"#\">Delete</a>

            </td>
        </tr>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['user'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 42
        echo "    </table>

";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "UserBundle:User:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  113 => 42,  98 => 33,  94 => 32,  91 => 31,  87 => 29,  85 => 28,  82 => 27,  80 => 26,  75 => 24,  71 => 23,  67 => 22,  63 => 21,  60 => 20,  56 => 19,  40 => 5,  34 => 4,  11 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source(" {% extends 'layout.html.twig' %}
 

 {% block body %}
<h2>Users</h2>


    <table border=\"1\">
        <tr>
            <th>Username</th>
            <th>First name</th>
            <th>Last name</th>
            <th>Email</th>
            <th>Role</th>
            <th>Created</th>
            <th>Updated</th>
            <th>Actions</th>
        </tr>
        {% for user in users %}
        <tr>
            <td>{{ user.username }}</td>
            <td>{{ user.firstName }}</td>
            <td>{{ user.lastName }}</td>
            <td>{{ user.email }}</td>
            <td>
                {% if user.role == 'ROLE_ADMIN' %}
                    <strong>Administrator</strong>
                {% elseif user.role == 'ROLE_USER' %}
                    <strong>User</strong>
                {% endif %}
            </td>
            <td>{{ user.createdAt|date('d-m-Y H:i') }}</td>
            <td>{{ user.updatedAt|date('d-m-Y H:i') }}</td>
            <td>
                <a href=\"#\">View</a>
                <a href=\"#\">Edit</a>
                <a href=\"#\">Delete</a>

            </td>
        </tr>
        {% endfor %}
    </table>

{% endblock %}", "UserBundle:User:index.html.twig", "/var/www/assignments/src/UserBundle/Resources/views/User/index.html.twig");
    }
}
