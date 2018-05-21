//AJAX call to output JSON data to ready_pma.php
var obj, dbParam, xmlhttp, myObj, x, txt = "";
var today = new Date();
var dd = today.getDate();
var mm = today.getMonth()+1; //January is 0!
var yyyy = today.getFullYear() - 1;

if(dd<10) {
    dd = '0'+dd
} 

if(mm<10) {
    mm = '0'+mm
} 

today = yyyy + '-' + mm + '-' + dd;

obj = { "table":"pma"};
dbParam = JSON.stringify(obj);
xmlhttp = new XMLHttpRequest();
xmlhttp.onreadystatechange = function()
{
    if (this.readyState == 4 && this.status == 200)
    {
        myObj = JSON.parse(this.responseText);
         for (x in myObj)
         {  //if it's a new PMA ther is a different color scheme to help person looking at page
         if (myObj[x].date_completed == '0000-00-00')
             {
          
           
             txt += "<div id='newnewpma'>"+ "<strong style='font-size: large;'> + </strong>" + "</strong>" +" <b>Name:</b> "+ myObj[x].name  + " - <b>Date last completed: </b>" + "<span style='color: #9400D3; border-style: solid; border-color: black; border-width: thin; border-radius: 5px; padding: 3px; background-color: white;'>New PMA</span>" + 
             " <b>Days it takes to complete: </b>" + myObj[x].days  + " <input type='button' style='background-color: blue; color: white; float: right;' value='Move to in progress' onclick='confirmit(" + myObj[x].pma_id + ")'></div>";
             }
             
              else if (myObj[x].date_completed < today)
             {
          
            txt += "<div id='reallyOld'>"+ "<strong style='font-size: large;'> + </strong>" + "</strong>" +" <b>Name:</b> "+ myObj[x].name  + " - <b>Date last completed: </b>" + myObj[x].date_completed + 
             " <b>Days it takes to complete: </b>" + myObj[x].days  + " <input type='button' style='background-color: blue; color: white; float: right;' value='Move to in progress' onclick='confirmit(" + myObj[x].pma_id + ")'></div>";
             }
           
            
             else
             {
                  txt += "<div id='readypma'>"+ "<strong style='font-size: large;'> + </strong>" + "</strong>" +" <b>Name:</b> "+ myObj[x].name  + " - <b>Date last completed: </b>" + myObj[x].date_completed + 
             " <b>Days it takes to complete: </b>" + myObj[x].days  + " <input type='button' style='background-color: blue; color: white; float: right;' value='Move to in progress' onclick='confirmit(" + myObj[x].pma_id + ")'></div>";
                 
             }
             
 
        }
        document.getElementById("putpma").innerHTML = txt;
    }
};
xmlhttp.open("GET", "model/ready_pmadbcall.php?x=" + dbParam, true);
xmlhttp.send();

//Alert confirmation to move the pma to in progress
function confirmit(pmaID)
{
  var results = confirm("Are you sure you want to move this to in progress PMA's?");
  
  if(results == true){
    return window.location="add_pmainfo.php?pma_id=" + pmaID ;
  }
  else {
      return window.location="ready_pma.php";
  }
    
}
