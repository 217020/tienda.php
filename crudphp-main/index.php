<?php

ob_start();
$view = isset($_GET["view"]) ? $_GET["view"] : "index";

if (file_exists("view/" . $view . "-view.php")) {
    include("view/" . $view . "-view.php");
} else {
    include("view/error-view.php");
}
