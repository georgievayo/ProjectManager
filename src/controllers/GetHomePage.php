<?php
require_once "../libs/Startup.php";
Startup::_init(true);

session_start();
if(!isset($_SESSION['current_user_id']))
{
 	header('Location: ../views/HomePageView.php');
}
else
{
    header('Location: ../views/HomePageLoggedView.php');
}
?>