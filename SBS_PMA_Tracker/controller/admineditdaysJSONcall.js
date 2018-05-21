//AJAX call that outputs JSON data to all_pma.php
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
          
           txt += "<div id='editdays'>"+ "<strong style='font-size: large;'> + </strong>" + "</strong>" +" <b>Name:</b> "+ myObj[x].name  + " - <b>Date last completed: </b>" + myObj[x].date_completed + 
             " <b>Days it takes to complete: </b>" + myObj[x].days  + " <input type='button' style='background-color: blue; color: white; float: right;' value='Edit Days Taken' onclick='confirmit(" + myObj[x].pma_id + ")'></div>";
             
        }
        document.getElementById("putpma").innerHTML = txt;
    }
};
xmlhttp.open("GET", "model/all_pmadbcall.php?x=" + dbParam, true);
xmlhttp.send();

//function that alerts the user to confirm delete       
function confirmit(pmaID)
    {
        var results = confirm("Are you sure you want to edit days?");
  
        if(results == true)
        {
            return window.location="editdays.php?pma_id=" + pmaID ;
        }
        else
        {
            return window.location="admineditdays.php";
        }
    
    }


