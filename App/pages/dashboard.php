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
      <form class="form-horizontal" action="App/ajax/gettasks.php" method="post">
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
      <form class="form-horizontal" role="form" action="App/formhandler/add_listitem.php" method="post">
        <fieldset>
          <div class="form-group">
            <label for="tasktitle" class="control-label col-md-2">Uppgift</label>
            <div class="col-md-10">
              <input type="text" name="tasktitle" placeholder="Uppgiftstitel" class="form-control" required="required">
            </div>
          </div>
          <div class="form-group">
            <label for="taskbody" class="control-label col-md-2">Detalj</label>
            <div class="col-md-10">
              <textarea name="taskbody" rows="3" class="col-md-10 col-sm-10 col-xs-12"
                        placeholder="Detaljer"></textarea>
            </div>
          </div>
          <div class="form-group">
            <label for="person" class="control-label col-md-2">Person</label>
            <div class="col-md-10">
              <input type="text" name="taskperson" placeholder="Person" class="form-control" required="required">
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
      <div class="well well-xs">
        <h3>
          <span class="pull-left"><?php echo $task->title; ?></span>
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
                      <li><a
                          href="<?php echo ROOT . "/App/formhandler/changestatus.php?task=" . $task->id . "&status=" . $tl->id; ?>"><span
                            class="text-<?php echo $tl->style_class; ?>"><?php echo $tl->plain_text; ?></span></a></li>
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
  </div>
</div>
