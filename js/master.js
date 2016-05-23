var title, status, task;
var statusClasses = ['added','indev', 'done','prio1'];
function modalFix(task_s, status_s, title_s){
  document.getElementById("modal-title").value = title_s;
  title = title_s;
  document.getElementById("modalstatus").value = status_s;
  status = status_s;
  document.getElementById("modaltask").value = task_s;
  task = task_s;

}
function addTask(){
    var xmlhttp = new XMLHttpRequest();
    var tasktitle = document.getElementById("tasktitle").value;
    var taskbody = document.getElementById("taskbody").value;
    var taskperson = document.getElementById("taskperson").value;
    xmlhttp.onreadystatechange = function() {
      if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        document.getElementById("tasktitle").value = "";
        document.getElementById("taskbody").value = "";
        document.getElementById("taskperson").value = "";
        getLastTask();
      }
    };
    xmlhttp.open("POST", "App/formhandler/add_listitem.php", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send("tasktitle="+tasktitle+"&taskbody="+taskbody+"&taskperson="+taskperson);
}
function getLastTask(){
  var xmlhttp = new XMLHttpRequest();
  console.log("Häre är jag!");
  xmlhttp.onreadystatechange = function() {
    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

      $("#feed").prepend(xmlhttp.responseText);
    }
  };
  xmlhttp.open("POST", "App/ajax/lasttask.php", true);
  xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xmlhttp.send();
}
function changeStatus(){
    var xmlhttp = new XMLHttpRequest();
    var user = document.getElementById("modalname").value;
    xmlhttp.onreadystatechange = function() {
      if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        $('#statusmodal').modal('hide');
        UpdateTaskVisuals(task);
      }
    };
    xmlhttp.open("POST", "App/formhandler/changestatus.php", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send("task="+task+"&status="+status+"&user="+user);
}
function UpdateTaskVisuals(taskID){
  var xmlhttp = new XMLHttpRequest();
  var user = document.getElementById("modalname").value;
  xmlhttp.onreadystatechange = function() {
    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
      var taskNr = document.getElementById("task_nr_"+taskID);
      taskNr.innerHTML = xmlhttp.responseText;
      taskNr.classList.remove(taskNr.classList.item(taskNr.classList.length-1));
      taskNr.classList.add("status-"+statusClasses[status-1]);
      if(document.getElementById(statusClasses[status-1]).checked){
        $("#"+taskNr.id).show();
      }
      else{
        $("#"+taskNr.id).hide();
      }
    }
  };
  xmlhttp.open("POST", "App/ajax/gettask_inner.php", true);
  xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xmlhttp.send("task="+taskID);
}

function applyFilter(object){
  if(!object.checked)
    $(".status-"+object.id).hide();
  else {
    $(".status-"+object.id).show();
  }
}
