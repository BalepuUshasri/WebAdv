<?php
date_default_timezone_set("Europe/Paris");
session_start();
$errors = array();

if ($_SERVER['REQUEST_METHOD'] == 'PUT') {
  parse_str(file_get_contents("php://input"), $_PUT);

  foreach ($_PUT as $key => $value) {
    unset($_PUT[$key]);

    $_PUT[str_replace('amp;', '', $key)] = $value;
  }

  $_REQUEST = array_merge($_REQUEST, $_PUT);
}
//var_dump($_GET);
//echo 'lol';

if (!isset($_SESSION["user"]["name"])) {
  echo "You aren't connected";
  require_once("../view/login_view.php");
} else {

  $trainer_id = $_SESSION["user"]["person_id"];
  $is_trainer = $_SESSION["user"]["is_trainer"];

  if (!isset($trainer_id) || !isset($is_trainer)) {
    $ex = "trainer or user not define or your aren't a trainee";
    $errors['trainer'] = "The server endure the following error: " . $ex;
    include_once '../view/error_view.php';
//echo 'no';
  } else {;
    if ($_SESSION["user"]["is_trainer"] == 1) {

      if ($_GET['trainer_id'] !== $trainer_id) {
        header('Location: ./trainer-' . $trainer_id . '_group');
      } else {
          include_once '../model/TrainerGroupDao.php';


          if($_REQUEST['validate'] == 'validate'){
           // $g = $_REQUEST['group_id'];
            //$t = $_REQUEST['trainee_id'];
           // echo "$g & $t ";
            $status= TrainerGroupDao::validateCandidate($_REQUEST['group_id'],$_REQUEST['trainee_id']);
          }


          try {

            $members = TrainerGroupDao::getMembers($_GET['group_id']);

          } catch (Exception $ex) {

            $ex = "Error open/close groups";
            $errors['errorgroupe'] = "The server endure the following error: " . $ex;
            include_once '../view/error_view.php';
          }
          require_once'../view/trainer_group_member_view.php';
      }
    }
  }
}

