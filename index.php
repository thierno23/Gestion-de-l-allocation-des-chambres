<?php
define("BASE_URL","http://localhost/Gestion-de-l-allocation-des-chambres/");
//define("BASE_URL","http://thierno-guiro.alwaysdata.net/gestion-chambre/");
require_once("./libs/Router.php");
$router=new Router();
$router->route();
