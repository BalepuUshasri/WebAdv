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
  } else {
    if ($_SESSION["user"]["is_trainer"] == 1) {
      if ($_GET['trainer_id'] !== $trainer_id) {

        header('Location: ./trainer-' . $trainer_id . '_evaluation');
      } else {
        try {
          include '../model/EvalDao.php';
          $getEval = EvalDao::getFilteredTrainer(EvalDao::getEvaluationsTrainer($trainer_id));
          if (!isset($getEval) || is_array($getEval) == false) {
            $ex = " Evaluation is not define";
            $errors['eval'] = "The server endure the following error: " . $ex;
            include_once '../view/error_view.php';
          }
          require_once '../view/trainer_evaluation_view.php';
        } catch (PDOException $ex) {
          $errors['PDOError'] = "The server endure the following error: " . $ex;
          include_once '../view/error_view.php';
        }
      }
    }
  }
}

