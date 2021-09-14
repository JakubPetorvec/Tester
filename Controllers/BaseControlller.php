<?php

namespace Controllers;

abstract class BaseControlller
{
    protected function view(string $file, $model = null, $errors = null, $answers = null)
    {
        $className = get_class($this);
        $controllerName = substr($className, strlen("Controllers\\"));
        $directory = substr($controllerName, 0, strpos($controllerName, "Controller"));
        include "Views/{$directory}/{$file}";
    }
}
