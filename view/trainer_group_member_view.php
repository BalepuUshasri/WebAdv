<?php require_once 'header.php'; ?>

<h1> Group Members </h1></br>

<?php
    if (count($members) > 0) { ?>
      <table style="text-align: center;border-spacing: 30px;border-style: double;">
          <tr>
            <td>Id</td>
            <td>Name</td>
            <td>First-Name</td>
            <td>Validated At</td>
            </td></td>
          </tr>     
      <?php
      foreach ($members as &$uneMember) {
        ?>
          <tr>
            <td><?= $uneMember["trainee_id"]?></td>
            <td><?= $uneMember["name"]?></td>
            <td><?= $uneMember["first_name"]?></td>
            <td><?= $uneMember["member_validated_at"]?></td>
            <td>
              <?php if($uneMember["member_validated_at"] == null){?>
                <form method="post" action="<?= 'trainer-' . $trainer_id . '_group-' . $uneMember["group_id"] .'_add' ?>">
                  <input type="hidden" name="validate" value="validate"/>
                  <input type="hidden" name="group_id" value=<?=$uneMember["group_id"]  ?> />
                  <input type="hidden" name="trainee_id" value=<?=$uneMember["trainee_id"]  ?> />
                  <input type="submit" name="Validate_Now" value="Validate Now" style="border: solid 1px;border-radius: 30px;padding: 5px 15px;text-decoration: none;margin-top: 10px;margin-left: 15px;font-size: inherit;background-color: #F4F8F8;"/> 
                </form>
              <?php }?>
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

<?php require_once 'footer.php'; ?>