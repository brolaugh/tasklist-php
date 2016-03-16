var title, status, task;
function addTask(){

}
function modalFix(task_s, status_s, title_s){
  document.getElementById("modal-title").value = title_s;
  title = title_s;
  document.getElementById("modalstatus").value = status_s;
  status = status_s;
  document.getElementById("modaltask").value = task_s;
  task = task_s;
    console.log("modalFix");

}
function changeStatus(){
    var xmlhttp = new XMLHttpRequest();
    var user = document.getElementById("modalname").value;
    xmlhttp.onreadystatechange = function() {
      if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        $('#statusmodal').modal('hide');
        //document.getElementById("feed").innerHTML = xmlhttp.responseText;
      }
    };
    xmlhttp.open("POST", "App/formhandler/changestatus.php", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send("task="+task+"&status="+status+"&user"+user);
}
function updateFeed(a){
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function() {
    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
      document.getElementById("feed").innerHTML = xmlhttp.responseText;
    }
  };
  xmlhttp.open("POST", "App/ajax/gettasks.php", true);
  xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xmlhttp.send("done="+a[0] + "&undone="+a[1] + "&indev="+a[2] + "&prio1="+a[3]);
  //console.debug(xmlhttp);
}
function getFeedArguments(){
  var arguments = [];
  arguments.push(document.getElementById("done").checked);
  arguments.push(document.getElementById("undone").checked);
  arguments.push(document.getElementById("indev").checked);
  arguments.push(document.getElementById("prio1").checked);

  updateFeed(arguments);
}
