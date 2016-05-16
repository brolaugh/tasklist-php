<?php
namespace App;

class Task{
  private $id;
  private $title;
  private $description;
  private $user;
  private $stamp;
  private $status;
  private $status_class;
  private $changeable_statuses;

  public function __construct($dbtask){
    $this->id = $dbtask->id;
    $this->title = $dbtask->title;
    $this->description = $dbtask->description;
    $this->user = $dbtask->user;
    $this->stamp = $dbtask->stamp;
    $this->status_class = $dbtask->style_class;
    $this->status = $dbtask->level;
  }
  public function setChangeableStatuses($changeable_statuses){
    $this->changeable_statuses = $changeable_statuses;
  }

  public function printTask(){
    echo "<div class=\"well well-xs status-" . strtolower($this->status) . "\" id=\"task_nr_$this->id\">";
    $this->printInnerTask();
    echo '</div>';
  }
  public function printInnerTask(){
    ?>

      <h3>
        <span ><?=$this->title?></span>
        <div class="btn-group">
          <div class="btn-toolbar">
            <div class="btn-group">
              <a href="bootstrap-elements.html" data-target="#" class="btn btn-raised btn-<?=$this->status_class?> dropdown-toggle"
                data-toggle="dropdown">
                <?=$this->status?>
                <span class="caret"></span>
              </a>
              <ul class="dropdown-menu">
                <?php
                foreach ($this->changeable_statuses as $tl) {
                  if ($this->status != $tl->plain_text) {
                    ?>
                    <li data-toggle="modal" data-target="#statusmodal" onclick="javascript:modalFix(<?=$this->id . "," . $tl->id . ",'" . $this->title."'"?>)">
                      <span class="text-<?=$tl->style_class?>"><?=$tl->plain_text?></span>
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
        <?=$this->description?>
      </p>
      <p class="text-muted small">
        Uppdaterad <?=$this->stamp . " av " . $this->user?>
      </p>

    <?php
  }
}
