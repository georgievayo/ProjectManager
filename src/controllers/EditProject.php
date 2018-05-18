<?php
require_once "../libs/Startup.php";
Startup::_init(true);
use helpers\Validator;
use models\Project;
use models\Error;

session_start();
if(!isset($_SESSION['current_user_id']))
{
    http_response_code(401);
	header('Location: ../views/HomePageView.php');
}
else
{
    $current_user = $_SESSION['current_user_id'];
    $title = $_POST['title'];
	$start_date = $_POST['start_date'];
	$end_date = $_POST['end_date'];
	$overview = $_POST['overview'];
    $id = $_GET['id'];

    $isSuccessful = Project::edit($id, $title, $start_date, $end_date, $overview);

    if ($isSuccessful) {
    	header('Location: ./GetProject.php?project_id='.$id);
    } else {
        $error = new Error("Error! Project was not updated.");
        echo json_encode($error);
    }
}
?> 