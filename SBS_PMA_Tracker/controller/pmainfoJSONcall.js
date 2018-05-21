

//Getting pma_id from a hidden tag in pmainfo.php
//AJAX call to output JSON data to pmainfo.php
window.onload = function pmainfocall()
{
var obj, dbParam, xmlhttp, myObj, x, txt = "", pma_id = document.getElementById("pma_id_grab");
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
             if (pma_id.innerHTML == myObj[x].pma_id) 
            {
            txt += "<b>" + myObj[x].person_type_desc + "</b>: " + myObj[x].first_name +  " " + myObj[x].last_name + " <b>--</b> "+ myObj[x].phone_type_desc + "<b>:</b> " + myObj[x].phone + " " +
             " <a href='mailto:"+ myObj[x].email + "'>"+ myObj[x].email + "</a><br>";
             }
 
        }
        document.getElementById("putpma").innerHTML = txt;
    }
};
xmlhttp.open("GET", "model/pmainfo_dbcall.php?x=" + dbParam, true);
xmlhttp.send();
};
