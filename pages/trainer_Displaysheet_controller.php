<?php

session_start();
$errors = array();


if (!isset($_SESSION["user"]["name"])) {

  echo "You aren't connected";
  require_once("../view/login_view.php");
} else {

  $eval_Id_req = $_REQUEST['eval_id'];
  $_SESSION["user"]["eval_id"] = $eval_Id_req;
  $person_id = $_REQUEST["person_id"];
  $eval_Id = $_SESSION["user"]["eval_id"];
  $is_trainer = $_SESSION["user"]["is_trainer"];

  if (!isset($person_id) || !isset($eval_Id) || !isset($is_trainer)) {
    $ex = "trainer or eval not define or your aren't a trainer";
    $errors['trainer'] = "The server endure the following error: " . $ex;
    include_once '../view/error_view.php';
    //echo 'no';
  } else {

    //var_dump($_GET);
    //var_dump($trainee_id);
    //var_dump($eval_Id);

      /*
       * 
       * check if persone_id == trainee_id 
       * redirect to trainee_sheet_view if is true
       * 
       */
      if ($_SESSION["user"]["is_trainer"] == 1) {


        try {
          include '../model/SheetDao.php';

            $trainee = SheetDao::getTraineeForEvaluation($eval_Id);
            
            if(count($trainee) >= 1){
                  $trainee_id_db = $trainee[0]['trainee_id'];
            }

            if($trainee_id_db != null && $person_id !=null)
            {
                   $person_id = $trainee_id_db;
                   $sheet = SheetDao::getQuestionsForEvaluationForTrainer($person_id, $eval_Id);
            }
            else{
              $sheet = SheetDao::getQuestionsForEvaluationForDisplay( $eval_Id);
            }

            include "../view/trainer_sheet_view.php";
        } catch (PDOException $ex) {
          $ex = 'SqlExeption Display' . $ex;
          $errors['SQLexeption'] = "The server endure the following error: " . $ex;
        }
      } 
      elseif ($_SESSION["user"]["is_trainer"] == 0) {

        echo 'You aren\'t a trainer, you can\'t evaluate an exam';
      }
      /* } else {
        echo "Sorry, You are not allowed to access this page, You are going be redirected automaticaly to the Home page";
        header("Refresh: 2;URL=../");
        //var_dump($_SERVER["REQUEST_URI"]);
        //var_dump($_SESSION["user"]);
        } */
    
  }
}
