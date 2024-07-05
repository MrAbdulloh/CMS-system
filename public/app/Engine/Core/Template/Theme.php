<?php

namespace App\Engine\Core\Template;

class Theme
{
    const RULES_NAME_FILE = [
        'header' => 'header-%s',
        'footer' => 'footer-%s',
        'sidebar' => 'sidebar-%s',
    ];

    public $url = '';

    protected $data = [];

    public function header($name = null)
    {
        $name = (string)$name;
        $file = 'header';
        if ($name !== '') {
            $file = sprintf(self::RULES_NAME_FILE['header'], $name);
        }

        $this->loadTemplateFile($file);
    }

    public function footer($name = '')
    {
        $name = (string)$name;
        $file = 'footer';
        if ($name !== '') {
            $file = sprintf(self::RULES_NAME_FILE['footer'], $name);
        }

        $this->loadTemplateFile($file);
    }

    public function sidebar($name = '')
    {
        $name = (string)$name;
        $file = 'sidebar';
        if ($name !== '') {
            $file = sprintf(self::RULES_NAME_FILE['sidebar'], $name);
        }

        $this->loadTemplateFile($file);
    }

    public function block($name = '', $date = [])
    {
        $name = (string)$name;

        if ($name !== '') {
            $this->loadTemplateFile($name, $date);
        }
    }

    private function loadTemplateFile($nameFile, $data = [])
    {
        $templateFile = ROOT_DIR . '/content/themes/default/' . $nameFile . '.php';
        if (is_file($templateFile)) {
            extract($data);
            require_once $templateFile;
        } else {
            throw new \Exception('Template file Theme "' . $nameFile . '" not found');
        }
    }

    public function getData(): array
    {
        return $this->data;
    }

    public function setData(array $data): void
    {
        $this->data = $data;
    }
}