
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
  <link rel="stylesheet" type="text/css" href="css/main.css">
  <link rel="stylesheet" type="text/css" href="css/studetails.css">
  <style>
  tr:hover{
    transform: scale(1);
    border:2px solid 212f70;
    background-color: none !important;
    color:white;
    transition: 0.5s;
    cursor: context-menu;
  }
  @media screen and (max-width: 600px) {
    
  }

</style>
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
    <div class="container-login100" >
      <div class="icon-bar">
          <a href="home.php"  data-placement="right" data-toggle="tooltip" title="Home Page "  class="home"><i class="fa fa-home" style="color:white"></i></a> 
          <a href="controller.php?method=logout" data-placement="right" data-toggle="tooltip" title="Log Out" class="sign-out"><i class="fa fa-sign-out" style="color:white"></i></a>
          <a href="#" class="back" data-placement="right" data-toggle="tooltip" title="Perivous Page" onclick="history.go(-1)" ><i class="fa fa-reply" style="color:white"></i></a>
      </div>
 
    
      <div class="container" >
        <h3 style="COLOR:#f6f7fa;text-shadow: 3px 3px 3px  #212f70;">Student's Details</h3>
        <br>
        <table class="table" >
          <thead class="thead-light">
            <tr id="tr">
              <th>Student's Id</th>
              <th>Student's Name</th>
              <th>%Rate</th>
              <th>Status</th>
            </tr>
          </thead>
          <tbody id="tbody">
            
          </tbody>
        </table>

        <div class="containercalendar" id="content1" >
          
        </div>
      </div>
    </div>

      <div id="myOverlay" class="overlay" >
        <span class="closebtn" onclick="closeSearch()" title="Close Overlay">×</span>
        <div class="overlay-content">
          <input type="text" placeholder="Search.." name="search" id="input">
          <button type="submit" onclick="closeSearch()" ><i class="fa fa-search" style="color:white"></i></button>
        </div>
      </div>

      <button onclick="topFunction()" id="scroll" title="Go to top">Top</button>

  </div>
  
  
   <script> 
   
    $(document).ready(function(){
      $('[data-toggle="tooltip"]').tooltip({ trigger: "hover" });
      
      var url = new URL(window.location.href);
      var subjectId = String(url.searchParams.get("subjectId"));
      var id = String(url.searchParams.get("id"));
      var name = String(url.searchParams.get("name"));
      var rate = String(url.searchParams.get("rate"));
      var a = "fa fa-thumbs-down" ; 
      if( parseInt(rate) >= 60 ){
       a = "fa fa-thumbs-up" ; 
      }else if(parseInt(rate) < 60){
        a = "fa fa-thumbs-down" ; 
      }

      $('#tbody').append(
        '<tr>'+
          '<td>'+id+'</td>'+
          '<td>'+name+'</td>'+
          '<td>'+rate+'</td>'+
          '<td><i class="'+a+'" style="font-size:20px;" ></i></td>'+
        '</tr>'
      );
   
      $.ajax({url: "controller.php?method=getStudentdetails&subjectId="+subjectId+"&studentId="+id, async: true, success: function(data){
            var duce = jQuery.parseJSON(data);
            var size = duce[0];
            var status = "var";
            for(var i=1;i<=size;i++){
              rates = JSON.parse(duce[i]);
              var CDate = new Date(rates.date);
              //alert(CDate.getFullYear());
              var day = CDate.getDate();
              var month = selectmonth(CDate.getMonth()+1);

              if(rates.attendanceStatus == "PRESENT"){
                status = "var"
              }else{
                status = "yok"
              }

              if(document.getElementById(month) == null){
                $('#content1').append(
                  '<div class="filterDiv"  data-placement="bottom" data-toggle="tooltip" title="Student\'s Attendance By Date And Subject  "   >'+
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
              $(document.getElementById(month)).append(
                '<li style="margin-right:2px;" id="'+status+'" >'+day+'</li>'
              );
              
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

  </script>




 <script src="jscript/jscript.js"> </script>
</body>
</html>
