function addTask(){

}
function changeStatus(){

}
function updateFeed(){


}
function getFeedArguments(){
  var arguments = [];
  arguments.push(document.getElementById("done").value);
  arguments.push(document.getElementById("undone").value);
  arguments.push(document.getElementById("indev").value);
  arguments.push(document.getElementById("prio1").value);
  console.debug(arguments);
  //updateFeed(arguments);
}
