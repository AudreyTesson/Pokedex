<?php

namespace Pokedex\Controllers;

class CoreController
{
    protected function show($viewName, $viewVars = [])
    {
        $absoluteUri = $_SERVER['BASE_URI'];
        require __DIR__ . "/../views/header.tpl.php";
        require __DIR__ . "/../views/{$viewName}.tpl.php";
        require __DIR__ . "/../views/footer.tpl.php";
    }
}
