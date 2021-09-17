<?php

namespace Controllers;

abstract class BaseControlller
{
    protected function view(string $file, $model = null, $errors = null)
    {
        $className = get_class($this);
        $controllerName = substr($className, strlen("Controllers\\"));
        $directory = substr($controllerName, 0, strpos($controllerName, "Controller"));
        include "Views/{$directory}/{$file}";
    }

    protected function redirect(string $controller, string $action, string $postFix = "")
    {
        header("Location: index.php?controller={$controller}&action={$action}{$postFix}");
        die();
    }
}
