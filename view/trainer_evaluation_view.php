<?php require_once("header.php"); ?>
<div class="evaluation-content">

  <h1> My Evaluations </h1></br>

  <div class="evaluation-coming">
    <h3>Evaluation coming </h3>
    <?php
    if (isset($getEval["coming"]) && count($getEval["coming"]) > 0) { ?>
      <table style="text-align: center;border-spacing: 30px;border-style: double;">
          <tr>
            <td>Title</td>
            <td>Name</td>
            <td>Scheduled at</td>
            <td>Ending at</td>
            </td></td>
          </tr>     
      <?php
      foreach ($getEval["coming"] as &$uneEval) {
        ?>
          <tr>
            <td><?= $uneEval["title"]?></td>
            <td><?= $uneEval["name"]?></td>
            <td><?= $uneEval["scheduled_at"]?></td>
            <td><?= $uneEval["ending_at"]?></td>
            <td>
                <form method="post" action=<?= 'trainer-' . $uneEval["author_id"] . '_evaluation-' .$uneEval["evaluation_id"]  ?>>
                  <input type="hidden" name="eval_id" value=<?=$uneEval["evaluation_id"]  ?> />
                  <input type="hidden" name="person_id" value=<?=$uneEval["person_id"]  ?> />
                  <input type="submit" name="Evaluate_Now" value="Evaluate Now" style="border: solid 1px;border-radius: 30px;padding: 5px 15px;text-decoration: none;margin-top: 10px;margin-left: 15px;font-size: inherit;background-color: #F4F8F8;"/> 
                </form>
            </td>
            <td>
                <form method="post" action=<?= 'trainer-' . $uneEval["author_id"] . '_evaluation-' .$uneEval["evaluation_id"]  ?>>
                  <input type="hidden" name="eval_id" value=<?=$uneEval["evaluation_id"]  ?> />
                  <input type="submit" name="view" value="View" style="border: solid 1px;border-radius: 30px;padding: 5px 15px;text-decoration: none;margin-top: 10px;margin-left: 15px;font-size: inherit;background-color: #FFF4E6;"/> 
                </form>
            </td>
            </tr>

        <?php
      }
      ?>
      </table>
      <?php
    } else {
      echo "Empty";
    }
    ?>
  </div></br>
  <div class="evaluation-finished">
    <h3>Evaluation finished </h3>
    <?php
    if (isset($getEval["finished"]) && count($getEval["finished"]) > 0) {?>
      <table style="text-align: center;border-spacing: 30px;border-style: double;">
      <tr>
        <td>Title</td>
        <td>Name</td>
        <td>Scheduled at</td>
        <td>Corrected at</td>
        </td>
      </tr>     
  <?php
      foreach ($getEval["finished"] as &$uneEval) {
        ?>
        <tr>
            <td><?= $uneEval["title"]?></td>
            <td><?= $uneEval["name"]?></td>
            <td><?= $uneEval["scheduled_at"]?></td>
            <td><?= $uneEval["corrected_at"]?></td>
            <td>
                <form method="post" action=<?= 'trainer-' . $uneEval["author_id"] . '_evaluation-' .$uneEval["evaluation_id"]  ?>>
                  <input type="hidden" name="eval_id" value=<?=$uneEval["evaluation_id"]  ?> />
                  <input type="submit" name="view" value="View" style="border: solid 1px;border-radius: 30px;padding: 5px 15px;text-decoration: none;margin-top: 10px;margin-left: 15px;font-size: inherit;background-color: #FFF4E6;"/> 
                </form>
            </td>
          </tr>

        <?php
      }
    } else {
      echo "Empty";
    }
    ?>

  </div> </br>
  <h3>Evaluation corrected </h3>
  <div class="evluation-corrected">
    <?php
    if (isset($getEval["corrected"]) && count($getEval["corrected"]) > 0) {?>
      <table style="text-align: center;border-spacing: 30px;border-style: double;">
      <tr>
        <td>Title</td>
        <td>Name</td>
        <td>Scheduled at</td>
        <td>Corrected at</td>
        </td>
      </tr>     
  <?php
      foreach ($getEval["corrected"] as &$uneEval) {
        ?>
        <tr>
            <td><?= $uneEval["title"]?></td>
            <td><?= $uneEval["name"]?></td>
            <td><?= $uneEval["scheduled_at"]?></td>
            <td><?= $uneEval["corrected_at"]?></td>
            <td>
                <form method="post" action=<?= 'trainer-' . $uneEval["author_id"] . '_evaluation-' .$uneEval["evaluation_id"]  ?>>
                  <input type="hidden" name="eval_id" value=<?=$uneEval["evaluation_id"]  ?> />
                  <input type="submit" name="view" value="View" style="border: solid 1px;border-radius: 30px;padding: 5px 15px;text-decoration: none;margin-top: 10px;margin-left: 15px;font-size: inherit;background-color: #FFF4E6;"/> 
                </form>
            </td>
          </tr>

        <?php
      }
      ?>
      </table>
      <?php
    } else  {
      echo "Empty";
    }
    ?>

  </div>
</div>

<?php require_once ('footer.php'); ?>
