//AJAX call that outputs JSON data to all_pma.php
var obj, dbParam, xmlhttp, myObj, x, txt = "";
obj = { "table":"daily_logs"};
dbParam = JSON.stringify(obj);
xmlhttp = new XMLHttpRequest();
xmlhttp.onreadystatechange = function()
{
    if (this.readyState == 4 && this.status == 200)
    {
        myObj = JSON.parse(this.responseText);
        for (x in myObj)
        { if(myObj[x].person_id == 69)
            {
          
            txt +=  "<h4>Ramon</h4><strong style='font-size: large;'> + </strong>" +"<b>Building:</b>  " + myObj[x].building  + "<br><strong style='font-size: large;'> + </strong>" +"<b>Description:</b>  "+ myObj[x].description + "<br><strong style='font-size: large;'> + </strong>" +"<b>Floors serviced:</b>  "  + myObj[x].floors + "<br><strong style='font-size: large;'> + </strong>" +"<b>Issues:</b>  " + myObj[x].issues + "<br><strong style='font-size: large;'> + </strong>" +"<b>Days Left:</b>  " + myObj[x].days_left + "<br><strong style='font-size: large;'> + </strong>" +"<b>Date/time:</b>  " + myObj[x].date_time + "<hr>";
            }
            if(myObj[x].person_id == 70)
            {
          
            txt +=  "<h4>Danny</h4><strong style='font-size: large;'> + </strong>" +"<b>Building:</b>  " + myObj[x].building  + "<br><strong style='font-size: large;'> + </strong>" +"<b>Description:</b>  "+ myObj[x].description + "<br><strong style='font-size: large;'> + </strong>" +"<b>Floors serviced:</b>  "  + myObj[x].floors + "<br><strong style='font-size: large;'> + </strong>" +"<b>Issues:</b>  " + myObj[x].issues + "<br><strong style='font-size: large;'> + </strong>" +"<b>Days Left:</b>  " + myObj[x].days_left + "<br><strong style='font-size: large;'> + </strong>" +"<b>Date/time:</b>  " + myObj[x].date_time + "<hr>";
            }
             if(myObj[x].person_id == 71)
            {
          
            txt +=  "<h4>Jasmine</h4><strong style='font-size: large;'> + </strong>" +"<b>Building:</b>  " + myObj[x].building  + "<br><strong style='font-size: large;'> + </strong>" +"<b>Description:</b>  "+ myObj[x].description + "<br><strong style='font-size: large;'> + </strong>" +"<b>Floors serviced:</b>  "  + myObj[x].floors + "<br><strong style='font-size: large;'> + </strong>" +"<b>Issues:</b>  " + myObj[x].issues + "<br><strong style='font-size: large;'> + </strong>" +"<b>Days Left:</b>  " + myObj[x].days_left + "<br><strong style='font-size: large;'> + </strong>" +"<b>Date/time:</b>  " + myObj[x].date_time + "<hr>";
            }
        }
        document.getElementById("putLogs").innerHTML = txt;
    }
};
xmlhttp.open("GET", "model/logs_dbcall.php?x=" + dbParam, true);
xmlhttp.send();