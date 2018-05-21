//AJAX call that outputs JSON data to current_pma.php
var obj, dbParam, xmlhttp, myObj, x, txt = "";
obj = { "table":"pma"};
dbParam = JSON.stringify(obj);
xmlhttp = new XMLHttpRequest();
xmlhttp.onreadystatechange = function() 
{
    if (this.readyState == 4 && this.status == 200)
    {
        myObj = JSON.parse(this.responseText);
        for (x in myObj) 
        {
          
            txt += "<div id='currentpma'>" + "<strong style='font-size: large;'> + </strong><b> Name:</b> "  + myObj[x].name + " <b>Date last completed: </b>" + myObj[x].date_completed +
            "<b> Days it takes to complete: </b>" + myObj[x].days + "</div>";

        }
        document.getElementById("putCurrentpma").innerHTML = txt;
    }
};
xmlhttp.open("GET", "model/current_pmadbcall.php?x=" + dbParam, true);
xmlhttp.send();
