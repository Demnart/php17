<?php

namespace Application\Classes;

class View
{
    protected $data=[];

    public function __set($name, $value)
    {
        $this->data[$name] = $value;
    }

    public function display($template)
    {
        foreach ($this->data as $key=>$value)
        {
            $$key=$value;
        }
        include __DIR__ . '/../Views/' . $template;
    }
}