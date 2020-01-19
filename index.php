<?php
require_once 'App/Core/Core.php';

require_once 'Lib/DataBase/Connection.php';

require_once 'App/Controller/HomeController.php';
require_once 'App/Controller/PostController.php';
require_once 'App/Controller/SobreController.php';
require_once 'App/Controller/ErrorController.php';

require_once 'App/Model/PostagemModel.php';
require_once 'App/Model/ComentarioModel.php';

require_once 'vendor/autoload.php';


$template = file_get_contents('App/Template/main.html');

ob_start();
    $core = new Core;
    $core->start($_GET);

    $saida = ob_get_contents();
ob_end_clean();

$pagina = str_replace('{{Area_Dinamica}}',$saida, $template);

echo($pagina);