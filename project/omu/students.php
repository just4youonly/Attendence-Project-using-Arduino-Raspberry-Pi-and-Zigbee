
<?php
  session_start();
  if($_SESSION['giris']==null){
      header("location:index.php");
  }
?> 


<!DOCTYPE html>
<html lang="en">
<head>
  <title>Login</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link rel="shortcut icon" href="images/omu.png" type="image/x-icon" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="css/util.css">
  <link rel="stylesheet" type="text/css" href="css/student.css">
  <link rel="stylesheet" type="text/css" href="css/main.css">
  
</head>
<body>
   
  <div class="limiter">

    <div class="container">
        <div class="jumbotron">
            <div class="logo">
                <img src="images/OMUH3.png" alt="Logo">
            </div>     
        </div>
    </div>

    <div class="container-login100">
      <div class="icon-bar">
          <a href="home.php" data-placement="Right" data-toggle="tooltip" title="Home Page "  class="home"><i class="fa fa-home" style="color:white"></i></a> 
         <a href="controller.php?method=logout" data-placement="Right" data-toggle="tooltip" title="Sign Out"   class="sign-out"><i class="fa fa-sign-out" style="color:white"></i></a>
          <a href="#" data-placement="Right" data-toggle="tooltip" title="Perivous Page"  class="back" onclick="history.go(-1)" ><i class="fa fa-reply" style="color:white"></i></a>
          <a href="#" data-placement="Right" data-toggle="tooltip" title="Search By Name"  class="search" onclick="openSearch()"  ><i class="fa fa-search" style="color:white"></i></a> 
          <a href="#" data-placement="Right" data-toggle="tooltip" title="Attendance By Date"  class="back" onclick="openSearch1()" ><i class="fa fa-calendar" style="color:white"></i></a>
      </div>

      

      <div class="container" id="container100" >
              
        <h3 style="COLOR:#f6f7fa;text-shadow: 3px 3px 3px  #212f70;"   id="<?php echo $_SESSION['TeacherId'] ?>">Select Student For Details</h2>
        <br>
        <table class="table"  id="table" >
          <thead class="thead-light">
            <tr id="tr" >
              <th>Student's Id</th>
              <th>Student's Name</th>
              <th>%Rate</th>
              <th>Status</th>
            </tr>
          </thead>
          <tbody id="tbody">
            
          </tbody>
        </table>
      </div>
    </div>

      <div id="myOverlay" class="overlay" >
        <span class="closebtn" onclick="closeSearch()"  data-placement="bottom" data-toggle="tooltip" title="Close"  >x</span>
        <div class="overlay-content">
          <input type="text" placeholder="Search.." name="search" id="input"  data-placement="bottom" data-toggle="tooltip" title="Write To Search "  onkeyup="searchmyinput()">
          <button type="submit" data-placement="bottom" data-toggle="tooltip" title="Click To Search "  onclick="closeSearch()" ><i class="fa fa-search" style="color:white"></i></button>
        </div>
      </div>

      <div id="myOverlay1" class="overlay" >
        <span class="closebtn" onclick="closeSearch1()" data-placement="bottom" data-toggle="tooltip" title="Close" >x</span>
        <div  class="overlay-content" id="content" >
            <h3 style="COLOR:#131c46; margin-left: 0px;margin-bottom: 15px;">Select Date For Details</h3>

              <div class="containercalendar" id="content" >
              </div> 
       
        </div>
          
      
      </div>

      

      <button onclick="topFunction()" id="scroll" title="Go to top">Top</button>

  </div>

<script> 
   
    $(document).ready(function(){
      $('[data-toggle="tooltip"]').tooltip({ trigger: "hover" });
     var url = new URL(window.location.href);
     var subjectId = String(url.searchParams.get("subjectId"));
     var Count = String(url.searchParams.get("count"));
       
        $.ajax({url: "controller.php?method=getSubjectStuent&subjectId="+subjectId, async: true, success: function(data){
            var duce = jQuery.parseJSON(data);
            var size = duce[0];
            var a = "fa fa-thumbs-down" ; 
            for(var i=1;i<=size;i++){
              rates = JSON.parse(duce[i]);
             

              $('#tbody').append(
                '<tr data-placement="bottom" data-toggle="tooltip" title="Click For Details " id="'+subjectId+'" onclick="myFunction12(this)">'+
                  '<td id="stu_'+rates.studentId+'" >'+rates.studentId+'</td>'+
                  '<td>'+rates.studentName+" "+rates.studentSurname+'</td>'+
                  '<td>0</td>'+
                  '<td><i class="'+a+'" style="font-size:20px;" ></i></td>'+
                '</tr>'
              );
              $('[data-toggle="tooltip"]').tooltip({ trigger: "hover" });
            }

        }});
        var myVar = setTimeout(alertFunc, 200);
        function alertFunc() {
          $.ajax({url: "controller.php?method=getSubjectStuentrate&subjectId="+subjectId, async: true, success: function(data){
              var duce = jQuery.parseJSON(data);
              var size = duce[0];
              var a = "fa fa-thumbs-down" ;
              for(var i=1;i<=size;i++){
                
                rates = JSON.parse(duce[i]);
                var x = Math.ceil(((rates.count * 100 )/Count)) ; 
                if( x  >= 60 ){
                  a = "fa fa-thumbs-up" ; 
                }else if(x  < 60){
                  a = "fa fa-thumbs-down" ;
                }
                var h = x+"";
                $(document.getElementById('stu_'+rates.studentId)).parent().children().eq(2).empty();
                //$(document.getElementById(rates.studentId)).parent().children().eq(2).append(h);
                $(document.getElementById('stu_'+rates.studentId)).parent().children().eq(2).text(h);
                //$(document.getElementById(rates.studentId)).parent().children().eq(2).html(h);
                
                $(document.getElementById('stu_'+rates.studentId)).parent().children().eq(3).empty();
                $(document.getElementById('stu_'+rates.studentId)).parent().children().eq(3).append(
                  '<i class="'+a+'" style="font-size:20px;" ></i>'
                );
              }
          }});
        }

        

        $.ajax({url: "controller.php?method=getSubjectDates&subjectId="+subjectId, async: true, success: function(data){
            var duce = jQuery.parseJSON(data);
            var size = duce[0];
            
            for(var i=1;i<=size;i++){
              rates = JSON.parse(duce[i]);
              var CDate = new Date(rates.date);
              //alert(CDate.getFullYear());
              var day = CDate.getDate();
              var month = selectmonth(CDate.getMonth()+1);


              if(document.getElementById(month) == null){
                $('#content').append(
                  '<div class="filterDiv"  data-placement="bottom" data-toggle="tooltip" title="Select Date For Details" >'+
                  '<div class="month">'+
                    '<a>'+month+'</a>'+
                  '</div>'+
                  '<div class="days" id="'+subjectId+'" >'+
                  '<ul class="days" id="'+month+'" >' + 

                  '</ul>'+
                  '</div>'+
                  '</div>'
                 );
              }
              $('[data-toggle="tooltip"]').tooltip({ trigger: "hover" });
             
              if(document.getElementsByClassName("day_"+day)[0] == null){
                $(document.getElementById(month)).append(
                '<li style="margin-right:2px;" class="day_'+day+'" onclick="showdate(this)" id="'+CDate+'" >'+day+'</li>'
                );
              }
              
              
            }
            $('#content').append(
            '<div class="containercalendar" >'+
            '</div>'
           );

        }});


        function selectmonth(a){
          var b ; 
          switch(a){
            case 1: b = "January";
                break;
            case 2: b = "February";
                break;
            case 3: b = "March";
                break;
            case 4: b = "April";
                break;
            case 5: b = "May";
                break;
            case 6: b = "June"; 
                break;
            case 7: b = "July";
                break;
            case 8: b = "August";
                break;
            case 9: b = "September";
                break;
            case 10: b = "October";
                break;
            case 11: b = "November";
                break;
            case 12: b = "December";
                break;
          }
          return b ; 
        }
       


    });


$( window ).on( "click", function() {
  if (event.target.id == "myOverlay") {
    closeSearch();
  }else if(event.target.id == "myOverlay1" || event.target.id == "overlay-content1" ){
    closeSearch1();
  }else if(event.target.id == "myOverlay2"  || event.target.id == "overlay-content2" || event.target.id == "containercalendar" ) {
    closeSearch2();
  }else if( event.target.id == "myOverlaystart"  ) {
    closemyOverlaystart();
  }else{

  }
});

function searchmyinput() {
  // Declare variables 
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("input");
  filter = input.value.toUpperCase();
  table = document.getElementById("table");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[1];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    } 
  }
}

  </script>
 <script src="jscript/jscript.js"> </script>
</body>
</html>

