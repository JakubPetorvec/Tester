<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tester</title>
    <link rel="stylesheet" href="Styles/styles.css">
</head>
<body>
<?php

spl_autoload_register(function ($class){
    $filePath = str_replace("\\", "/", $class).".php";
    if(file_exists($filePath)) include_once ($filePath);
});

$currentController = "Test";
$currentAction = "index";

if (isset($_GET["controller"])) $currentController = $_GET["controller"];
if (isset($_GET["action"])) $currentAction = $_GET["action"];

$controllerClass = "Controllers\\".$currentController."Controller";

if (class_exists($controllerClass))
{
    $controller = new $controllerClass();
    $sended = array_key_exists("sended", $_POST);
    $sendedPostfix = $sended ? "Post" : "";



    $controllerMethod = "{$currentAction}Action{$sendedPostfix}";
    if (method_exists($controller, $controllerMethod))
    {
        $controller->$controllerMethod();
    }
    else
        die ("Method does not exists!");
}
else
    die("Controller {$controllerClass} does not exists!")
?>
</body>
</html>