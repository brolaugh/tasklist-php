var title, status, task;
function modalFix(task_s, status_s, title_s){
  document.getElementById("modal-title").value = title_s;
  title = title_s;
  document.getElementById("modalstatus").value = status_s;
  status = status_s;
  document.getElementById("modaltask").value = task_s;
  task = task_s;
    console.log("modalFix");

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
    xmlhttp.send("tasktitle="+tasktitle+"&taskbody="+taskperson+"&taskperson="+taskperson);
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
    console.debug(user);
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
      document.getElementById("task_nr_"+taskID).innerHTML = xmlhttp.responseText;
    }
  };
  xmlhttp.open("POST", "App/ajax/gettask_inner.php", true);
  xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xmlhttp.send("task="+taskID);
}
function getStatusHistory(task){

}

function applyFilter(){
  var status_options = ["done","indev","prio1"];
  for(var i = 0; i < status_options.length;i++){
              console.log("Häre är jag!");
    if(document.getElementById(status_options[i]).checked){
      $(".status-"+status_options[i]).hide();
    }else{
      $(".status-"+status_options[i]).show();
    }
  }
}
