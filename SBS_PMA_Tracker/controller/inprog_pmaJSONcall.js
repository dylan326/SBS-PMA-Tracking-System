//AJAX call that outputs JSON data to inprog_pma.php
var obj, dbParam, xmlhttp, myObj, x, txt = "";
obj = { "table":"pma"};
dbParam = JSON.stringify(obj);
xmlhttp = new XMLHttpRequest();
xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200)
    {
        myObj = JSON.parse(this.responseText);
         for (x in myObj)
         {
             
             //if it's a new pma(when a new pma is entered date is all zeros) I place "New PMA" where date last completed goes
             if(myObj[x].date_completed == '0000-00-00')
             {
                txt += "<div id='inprogpma'><strong style='font-size: large;'> + </strong>"+ "<b>Name: </b>" + "<a href='pmainfo.php?pma_id=" + myObj[x].pma_id +"&name="+ myObj[x].name +"'> " + myObj[x].name + " </a> <b>Date last completed: </b>" + "New PMA" 
             + " <b>Days it takes to complete: </b>" + myObj[x].days + "<b> Date PMA started: </b>" + myObj[x].start_date + " <input type='button' style='background-color: green; color: white; float: right;' value='End PMA' onclick='confirmit(" + myObj[x].pma_id + ")'></div>";
             }
            else
            {
                txt += "<div id='inprogpma'><strong style='font-size: large;'> + </strong>"+ "<b>Name: </b>" + "<a href='pmainfo.php?pma_id=" + myObj[x].pma_id +"&name="+ myObj[x].name +"'> " + myObj[x].name + " </a> <b>Date last completed: </b>" + myObj[x].date_completed  
                + " <b>Days it takes to complete: </b>" + myObj[x].days + "<b> Date PMA started: </b>" + myObj[x].start_date + " <input type='button' style='background-color: green; color: white; float: right;' value='End PMA' onclick='confirmit(" + myObj[x].pma_id + ")'></div>";
            }  
 
        }
        document.getElementById("putpma").innerHTML = txt;
    }
};
xmlhttp.open("GET", "model/inprog_pmadbcall.php?x=" + dbParam, true);
xmlhttp.send();

//function that alerts the user to confirm moving pma to completed
function confirmit(pmaID)
{
  var results = confirm("Are you sure this PMA is complete?");
  
  if(results == true)
  {
    return window.location="model/endpma.php?pma_id=" + pmaID ;
  }
  else {
      return window.location="inprog_pma.php";
  }
    
}
