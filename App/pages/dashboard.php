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
      <form class="" action="index.html" method="post">

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
              <textarea name="taskbody" rows="3" class="col-md-10 col-sm-10 col-xs-12" placeholder="Detaljer"></textarea>
            </div>
          </div>
          <div class="form-group">
             <label for="person" class="control-label col-md-2">Person</label>
             <div class="col-md-10">
               <input type="text" name="person" placeholder="Person" class="form-control" required="required">
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
  <div class="col-md-6 col-md-offset-3">
    <div class="well well-xs">
      <h3>Titel på jobbet <span class="label label-default">Startad</span></h3>
      <p class="text-primary">
        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
      </p>
      <form action="App/formhandler/change_taskstatus.php" class="form-inline" method="post">
        <div class="form-group">
          <div class="col-md-2">
            <select class="form-control col-md-2" name="task-status">
              <option class="text-muted" value="1">Tillagd</option>
              <option class="text-success" value="2">Färdig</option>
              <option value="3">In progress</option>
            </select>
          </div>
        </div>
        <div class="form-group">
          <div class="col-md-2">
            <input type="submit" value="Ändra status" class="btn btn-primary btn-raised">
          </div>

        </div>

      </form>
    </div>
  </div>
</div>
