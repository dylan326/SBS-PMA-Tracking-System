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
          
            txt += "<div id='allpma'>" + "<strong style='font-size: large;'> + </strong>" +"<b>Name:</b>  " + myObj[x].name  +
                   " <input type='button' style='background-color: red; color: white; float: right;' value='Delete Client' onclick='confirmit(" + myObj[x].pma_id + ")'></div>";
        }
        document.getElementById("putpma").innerHTML = txt;
    }
};
xmlhttp.open("GET", "model/all_pmadbcall.php?x=" + dbParam, true);
xmlhttp.send();

//function that alerts the user to confirm delete       
function confirmit(pmaID)
    {
        var results = confirm("Are you sure you want to delete?");
  
        if(results == true)
        {
            return window.location="model/deletepma.php?pma_id=" + pmaID ;
        }
        else
        {
            return window.location="all_pma.php";
        }
    
    }
    