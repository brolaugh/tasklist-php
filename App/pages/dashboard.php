<?php
/**
 * Created by PhpStorm.
 * User: brolaugh
 * Date: 2/25/16
 * Time: 9:54 PM
 */
 ?>
 <form class="form-horizontal" action="formhandler/add_listitem.php" method="post">
   <fieldset>
     <div class="form-group">
       <label for="tasktitle" class="control-label col-md-2">Uppgift</label>
       <div class="col-md-10">
         <input type="text" name="tasktitle" placeholder="Uppgiftstitel" class="form-control">
       </div>
     </div>
     <div class="form-group">
       <label for="taskbody" class="control-label col-md-2">Detalj</label>
       <div class="col-md-10">
         <input type="text" name="taskbody" placeholder="Detaljer" class="form-control">
       </div>
     </div>
     <div class="form-group">
        <label for="person" class="control-label col-md-2">Person</label>
        <div class="col-md-10">
          <input type="text" name="person" placeholder="Person" class="form-control">
        </div>
     </div>
     <div class="form-group">
       <input type="submit" class="btn btn-primary" value="Lägg till">
     </div>
   </fieldset>
 </form>
