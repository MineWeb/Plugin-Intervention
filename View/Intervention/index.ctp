<div class="container">
  <div class="row">
    <div class="col-md-12">
      <blockquote>
        <h1 style="font-size:18px;"><?= $Lang->get("Sois au courant de toutes les maintenances, mise à jours ici !"); ?></h1>
      </blockquote>

      <div class="row">

        <table class="table">
          <thead>
            <tr>
              <th><?= $Lang->get("INTER_TABLE_HEAD_LEVEL"); ?></th>
              <th><?= $Lang->get("INTER_TABLE_HEAD_DATE"); ?></th>
              <th><?= $Lang->get("INTER_TABLE_HEAD_AUTHOR"); ?></th>
              <th><?= $Lang->get("INTER_TABLE_HEAD_COMMENT"); ?></th>
            </tr>
          </thead>

          <tbody>
            <?php foreach($Interventions as $Intervention){ ?>
            <tr>
              <td class="col-md-1" style="font-size:18px;">

              <?php
              $level = $Intervention['Interventions']['level'];
              if($level == 1){
                echo '<span class="label label-info" style="padding:10px;">TERMINÉ</span>';
              }else if($level == 2){
                echo '<span class="label label-warning" style="padding:10px;">EN COURS</span>';
              }else if($level == 3){
                echo '<span class="label label-danger" style="padding:10px;">ÉCHOUÉ</span>';
              }else{
                echo '<span class="label label-success" style="padding:10px;">PLANIFIÉ</span>';
              }
              ?>

              </td>
              <td class="col-md-2"><?= date("d-m-Y H:i:s", strtotime($Intervention['Interventions']['created'])); ?></td>
              <td class="col-md-1"><?= $Intervention['Interventions']['author']; ?></td>
              <td class="col-md-9"><?= $Intervention['Interventions']['description']; ?></td>
            </tr>
            <?php } ?>
          </tbody>
        </table>

        </div>
    </div>
  </div>
</div>
