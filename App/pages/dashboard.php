<?php
/**
* Created by PhpStorm.
* User: brolaugh
* Date: 2/25/16
* Time: 9:54 PM
*/
?>
<div class="row">
  <div class="col-md-3">
    <div class="well">
      <h3>Alternativ</h3>
      <form class="form-horizontal" action="javascript:applyFilter();" method="post">
        <div class="form-group">
          <div class="togglebutton">
            <label>
              Visa färdiga uppgifter
              <input type="checkbox" name="done" id="done"><span class="toggle"></span>
            </label>
          </div>

        </div>
        <div class="form-group">
          <div class="togglebutton">
            <label>
              Visa ofärdiga uppgifter
              <input checked="" type="checkbox" name="undone" id="undone" ><span class="toggle"></span>
            </label>
          </div>

        </div>
        <div class="form-group">
          <div class="togglebutton">
            <label>
              Visa indev uppgifter
              <input checked="" type="checkbox" name="indev" id="indev" ><span class="toggle"></span>
            </label>
          </div>

        </div>
        <div class="form-group">
          <div class="togglebutton">
            <label>
              Visa PRIO 1 uppgifter
              <input checked="" type="checkbox" name="prio1" id="prio1" ><span class="toggle"></span>
            </label>
          </div>

        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-primary" name="button">updateFeed</button>
        </div>
      </form>
    </div>
  </div>
  <div class="col-md-6">
    <div class="well">
      <form class="form-horizontal" action="javascript:addTask()" method="post">
        <fieldset>
          <div class="form-group">
            <label for="tasktitle" class="control-label col-md-2">Uppgift</label>
            <div class="col-md-10">
              <input type="text" name="tasktitle" id="tasktitle" placeholder="Uppgiftstitel" class="form-control" required="required">
            </div>
          </div>
          <div class="form-group">
            <label for="taskbody" class="control-label col-md-2">Detalj</label>
            <div class="col-md-10">
              <textarea name="taskbody" id="taskbody" rows="5" class="col-md-10 col-sm-10 col-xs-12 form-control"
              placeholder="Detaljer"></textarea>
            </div>
          </div>
          <div class="form-group">
            <label for="person" class="control-label col-md-2">Person</label>
            <div class="col-md-10">
              <input type="text" name="taskperson" id="taskperson" placeholder="Person" class="form-control" required="required">
            </div>
          </div>
          <div class="form-group col-md-offset-2 col-md-10">
            <input type="submit" class="btn btn-primary btn-raised" value="Lägg till">
          </div>
        </fieldset>
      </form>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-md-6 col-md-offset-3" id="feed">
    <?php
    $s = new \App\database\Select();
    $t = $s->getAllTasksWithStatus();
    $status_level = $s->getAllStatusLevels();
    foreach ($t as $task) {
      ?>
      <div class="well well-xs status-<?php echo $task->level;?>" id="task_nr_<?php echo $task->id;?>">
        <h3>
          <span ><?php echo $task->title; ?></span>
          <div class="btn-group">
            <div class="btn-toolbar">
              <div class="btn-group">
                <a href="bootstrap-elements.html" data-target="#" class="btn btn-raised btn-<?php echo $task->style_class;?> dropdown-toggle"
                  data-toggle="dropdown">
                  <?php echo $task->level ;?>
                  <span class="caret"></span>
                </a>
                <ul class="dropdown-menu">
                  <?php
                  foreach ($status_level as $tl) {
                    if ($task->level != $tl->plain_text) {
                      ?>
                      <li data-toggle="modal" data-target="#statusmodal" onclick="javascript:modalFix(<?php echo $task->id . "," . $tl->id . ",'" . $task->title."'";?>)">
                        <span class="text-<?php echo $tl->style_class; ?>"><?php echo $tl->plain_text; ?></span>
                      </li>
                      <?php
                    }
                  }

                  ?>
                </ul>
              </div>
            </div>
          </div>
        </h3>
        <p class="text-primary">
          <?php echo $task->description; ?>
        </p>

      </div>
      <?php
    }
    ?>
    <!-- Modal -->
    <div id="statusmodal" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title" id="modal-title">Ändra status</h4>

          </div>
          <div class="modal-body">
            <form class="form-horizontal" action="javascript:changeStatus()" method="post">
              <fieldset>
                <input type="hidden" name="task" value="" id="modaltask">
                <input type="hidden" name="status" value="" id="modalstatus">
                <div class="form-group">
                  <label for="modalname" class="col-md-2 text-primary">Namn</label>
                  <div class="col-md-10">
                    <input type="text" name="name" value="" id="modalname" class="form-control" placeholder="Namn">
                  </div>
                </div>
              </fieldset>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary" onclick="changeStatus();">Ändra status</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>

      </div>
    </div>

  </div>
</div>
