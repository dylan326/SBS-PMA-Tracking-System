//AJAX call to output JSON data to reminders.php
var obj, dbParam, xmlhttp, myObj, x, txt = "";
obj = { "table":"reminders"};
dbParam = JSON.stringify(obj);
xmlhttp = new XMLHttpRequest();
xmlhttp.onreadystatechange = function()
{
    if (this.readyState == 4 && this.status == 200)
    {
        myObj = JSON.parse(this.responseText);
        for (x in myObj) {
            txt += "<div id='reminder'><strong style='font-size: large;'> + </strong>" + " <b>Reminder: </b>" + myObj[x].reminder  + " - <b>Date/Time reminder set: </b>" + myObj[x].date +  "<input type='button' style='background-color: red; color: white; float: right;' value='Delete Reminder' onclick='confirmit(" + myObj[x].reminder_id + ")'></div>";
        }
        document.getElementById("putData").innerHTML = txt;
    }
};
xmlhttp.open("GET", "model/reminders_dbcall.php?x=" + dbParam, true);
xmlhttp.send();

//Function to alert the user to confirm delete of reminder
function confirmit(reminderID)
{
  var results = confirm("Are you sure you want to delete this reminder?");
  
  if(results == true){
    return window.location="model/deletereminder_dbcall.php?reminder_id=" + reminderID ;
  }
  else {
      return window.location="reminders.php";
  }
    
}
