<?php require_once 'header.php'; ?>

<ul style="list-style-type: none;">
<?php if ($person_id != null){
      foreach ($trainee as $uneTrainee) { ?>
  <li style=" display: inline;">
      <form method="post" action=<?= 'trainer-' . $trainee_id  . '_evaluation-' .$eval_Id  ?>>
                  <input type="hidden" name="eval_id" value=<?=$eval_Id  ?> />
                  <input type="hidden" name="person_id" value=<?=$trainee_id  ?> />
                  <input type="submit" name="trainee_id" class="menu-btn" value= "Trainee - <?= $uneTrainee['trainee_id']; ?>"
                  style="border: solid 1px;border-radius: 30px;padding: 5px 15px;text-decoration: none;margin-top: 10px;margin-left: 15px;font-size: inherit;background-color: #F4F8F8;"
                  /> 
      </form>
    </li>
  <?php }} ?>
</ul>

<?php
    if ($person_id == '/') {
  ?>
    <h1>No trainee to evaluate</h1>
  <?php  
    }
    else if ($person_id == null) {
      ?>
      <h1>List of Questions</h1>
<div class="sheet">
  <input type="hidden" name="trainee_id" value="<?= $trainee_id; ?>">
  <input type="hidden" name="trainee_id" value="<?= $eval_Id; ?>">
  <?php foreach ($sheet as $uneQuestion) { ?>
    <div class="sheet-card">
      <div class="sheet-card-question">
      </br></br>
      <table>
                <tr>
                    <th><b>Question</b></th>
                    <th> : </th>
                    <th> <label for> <?= $uneQuestion["question_text"]; ?></label></th>
                </tr>
      </table>
       
      </div></br>
      <div class="sheet-card-answer">
            <table style=" border: dotted;">
                <tr>
                    <th></th>
                    <th>Correct Answer</th>
                </tr>
                <tr>
                  <td> QUERY :  </td>
                  <td>&nbsp;&nbsp;&nbsp;<?= $uneQuestion["correct_answer"]; ?></td>
                </tr>
                <tr>
                  <td> RESULT :  </td>
                  <td>&nbsp;&nbsp;&nbsp;<?= $uneQuestion["correct_result"]; ?></td>
                </tr>
            </table>
        </div>
    </div>
  <?php } ?>
  </div>
  <?php } else{ ?>
<h1>Evaluation for Trainee id: <?= $person_id; ?></h1>
<div class="sheet">
  <input type="hidden" name="trainee_id" value="<?= $trainee_id; ?>">
  <input type="hidden" name="trainee_id" value="<?= $eval_Id; ?>">
  <?php foreach ($sheet as $uneQuestion) { ?>
    <div class="sheet-card">
      <div class="sheet-card-question">
      </br></br>
      <table>
                <tr>
                    <th><b>Question</b></th>
                    <th> : </th>
                    <th> <label for> <?= $uneQuestion["question_text"]; ?></label></th>
                </tr>
            </table>
       
      </div></br>
      <div class="sheet-card-answer">
            <table style=" border: dotted;">
                <tr>
                    <th></th>
                    <th>Student Answer</th>
                    <th></th>
                    <th>Trainer Answer</th>
                </tr>
                <tr>
                  <td> QUERY :  </td>
                  <?php if($uneQuestion["answer"] != $uneQuestion["correct_answer"]){ ?>
                      <td style="background-color: #ffcccc;"><?= $uneQuestion["answer"]; ?></td>
                  <?php }else{ ?>
                    <td style="background-color: #f3ffe6;"><?= $uneQuestion["answer"]; ?></td>
                    <?php } ?>
                  <td> | </td>
                  <td>&nbsp;&nbsp;&nbsp;<?= $uneQuestion["correct_answer"]; ?></td>
                </tr>
                <tr>
                  <td> RESULT :  </td>
                  <?php if($uneQuestion["result"] != $uneQuestion["correct_result"]){ ?>
                      <td style="background-color: #ffcccc;"><?= $uneQuestion["result"]; ?></td>
                  <?php }else{ ?>
                    <td style="background-color: #f3ffe6;"><?= $uneQuestion["result"]; ?></td>
                    <?php } ?>
                  <td> | </td>
                  <td>&nbsp;&nbsp;&nbsp;<?= $uneQuestion["correct_result"]; ?></td>
                </tr>
            </table>
        </form>
      </div>

    </div>

  <?php } ?>
</div>   
<?php } ?>
<script>
  var t =<?= $trainee_id; ?>;
  var e =<?= $eval_Id ?>;
</script> 

<?php require_once 'footer.php'; ?>