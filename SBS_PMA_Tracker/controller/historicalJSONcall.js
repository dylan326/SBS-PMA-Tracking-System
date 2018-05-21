// AJAX call that outputs JSON data to historical_read.php
var obj, dbParam, xmlhttp, myObj, x, txt = "";
obj = { "table":"historical"};
dbParam = JSON.stringify(obj);
xmlhttp = new XMLHttpRequest();
xmlhttp.onreadystatechange = function()
{
    if (this.readyState == 4 && this.status == 200) 
    {
        myObj = JSON.parse(this.responseText);
        for (x in myObj) 
        {
          
            txt += "<div id='archive'><b>PMA Name:</b>"  + myObj[x].pma_name  + " <b>Date Completed: </b>" + myObj[x].date_completed + " <b>Bulding Contact: </b>"
                   + myObj[x].building_contact + " <b>Inspector 1: </b>" + myObj[x].inspector1 + " <b>Inspector 2: </b>" + myObj[x].inspector2 
                   + " <b>Time it took to compelete the PMA: </b>" + myObj[x].time_to_complete + "<br></div>";
             
 
        }
        document.getElementById("puthistory").innerHTML = txt;
    }
};
xmlhttp.open("GET", "model/historical_dbcall.php?x=" + dbParam, true);
xmlhttp.send();
