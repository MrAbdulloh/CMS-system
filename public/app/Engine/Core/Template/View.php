<?php

namespace App\Engine\Core\Template;

use App\Engine\Core\Template\Theme;

class View
{
    protected $theme;

    public function __construct()
    {
        $this->theme = new Theme();
    }

    public function render($template, $vars = [])
    {
        $templatePath = ROOT_DIR . '/content/themes/default/' . $template . '.php';
        if (!is_file($templatePath)) {
            throw new \Exception('Template ' . $template . ' not found');
        }
        $this->theme->setData($vars);
        extract($vars);

        ob_start();
        ob_implicit_flush(0);

        try {
            require $templatePath;
        } catch (\Exception $e) {
            ob_end_clean();
            throw $e;
        }
        echo ob_get_clean();
    }
}