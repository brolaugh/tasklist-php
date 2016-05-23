<div class="row">
  <div class="col-md-3">
    <div class="well">
      <h3>Visningsalternativ</h3>
        <div class="form-group">
          <div class="togglebutton">
            <label class="text-primary">
              färdiga uppgifter
              <input checked="" type="checkbox" name="done" id="done" onchange="applyFilter(this)"><span class="toggle"></span>
            </label>
          </div>

        </div>
        <div class="form-group">
          <div class="togglebutton">
            <label class="text-primary">
              indev uppgifter
              <input checked="" type="checkbox" name="indev" id="indev" onchange="applyFilter(this)"><span class="toggle"></span>
            </label>
          </div>

        </div>
        <div class="form-group">
          <div class="togglebutton">
            <label class="text-primary">
              PRIO 1 uppgifter
              <input checked="" type="checkbox" name="prio1" id="prio1" onchange="applyFilter(this)"><span class="toggle"></span>
            </label>
          </div>
        </div>


        <div class="form-group">
          <div class="togglebutton">
            <label class="text-primary">
              Tillagda uppgifter
              <input checked="" type="checkbox" name="added" id="added" onchange="applyFilter(this)"><span class="toggle"></span>
            </label>
          </div>
        </div>
        </div>
  </div>
  <div class="col-md-9">
    <div class="well">
      <form class="form-horizontal" action="javascript:addTask()" method="post">
        <fieldset>
          <div class="form-group">
            <label for="tasktitle" class="control-label col-md-2 text-primary">Uppgift</label>
            <div class="col-md-10">
              <input type="text" name="tasktitle" id="tasktitle" placeholder="Uppgiftstitel" class="form-control" required="required">
            </div>
          </div>
          <div class="form-group">
            <label for="taskbody" class="control-label col-md-2 text-primary">Detalj</label>
            <div class="col-md-10">
              <textarea name="taskbody" id="taskbody" rows="2" style="height: auto" class="col-md-10 col-sm-10 col-xs-12 form-control"
              placeholder="Detaljer"></textarea>
            </div>
          </div>
          <div class="form-group">
            <label for="person" class="control-label col-md-2 text-primary">Person</label>
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

      $taskWriter = new \App\Task($task);
      $taskWriter->setChangeableStatuses($status_level);
      $taskWriter->printTask();
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
