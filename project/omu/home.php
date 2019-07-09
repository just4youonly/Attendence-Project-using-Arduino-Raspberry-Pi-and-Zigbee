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
  <style>
  @media screen and (max-width: 600px) {
    #startsub{
      width:65% !important;
    }
    #startbtn{
      width:30% ;
    }
  }
  #startsub{
    padding: 15px;
    font-size: 17px;
    border: none;
    float: left;
    width: 80%;
    background: white;
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

    <div class="container-login100">

      <div class="icon-bar">
          <a onclick="opnmyOverlaystart()"  style="cursor:pointer" data-placement="right" data-toggle="tooltip" title="Start System" class="home"><i class="fa fa-power-off" style="color:white"></i></a> 
          <a href="home.php" class="home"  data-placement="right" data-toggle="tooltip" title="Home Page " ><i class="fa fa-home" style="color:white"></i></a> 
          <a href="controller.php?method=logout"  data-placement="right" data-toggle="tooltip" title="Sign Out" class="sign-out"><i class="fa fa-sign-out" style="color:white"></i></a> 
          <a href="#" class="back" onclick="history.go(-1)"  data-placement="right" data-toggle="tooltip" title="Perivous Page" ><i class="fa fa-reply" style="color:white"></i></a>
          <a href="#" class="search" onclick="openSearch()"  data-placement="right" data-toggle="tooltip" title="Search By Name"  ><i class="fa fa-search" style="color:white"></i></a> 
          
      </div>

      <div class="container" >
        
        <h3 style="COLOR:#f6f7fa;text-shadow: 3px 3px 3px  #212f70;">Select Subject For Details</h2>
        <br>
        <table class="table"   id="table" >
          <thead class="thead-light">
            <tr id="tr">
              <th id="th">Subject's Name </th>
              <th >Subject's Code</th>
            </tr>
          </thead>
          <tbody id="tbody" >
          
            
          </tbody>
        </table>
      </div>
    </div>

    <div id="myOverlay" class="overlay" >
      <span class="closebtn" onclick="closeSearch()" data-placement="bottom" data-toggle="tooltip" title="Close" >X</span>
      <div class="overlay-content">
        
          <input type="text" placeholder="Search.." name="search" id="input" data-placement="bottom" data-toggle="tooltip" title="Write To Search" onkeyup="searchmyinput()">
          <button type="submit" onclick="closeSearch()" data-placement="bottom" data-toggle="tooltip" title="Search"  ><i class="fa fa-search" style="color:white"></i></button>
        
      </div>
    </div>

    <div id="myOverlaystart" class="overlay"  >
      <span class="closebtn" onclick="closemyOverlaystart()" data-placement="bottom" data-toggle="tooltip" title="Close" >X</span>
      <div class="overlay-content"  id="overlay-content22" style="top:35%">
          <h4 style="margin-bottom:26px">Insert Subject Codu </h4>
          <select name="startsub"  id="startsub" data-placement="bottom" data-toggle="tooltip" title="Select Subject Code" >
           
          </select>
          <button id="startbtn" type="submit" placeholder="Start Session" onclick="start()" style="color:white;padding:14px" data-placement="bottom" data-toggle="tooltip" title="Click To Start Session"  ><i class="fa fa-power-off" style="color:white"></i > start </button>
        
      </div>
    </div>
     
    <button onclick="topFunction()" id="scroll" title="Go to top">Top</button>

	</div>
	
	
  <script >

  
    $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip({ trigger: "hover" });

        $.ajax({url: "controller.php?method=getTeacherSubject", async: true, success: function(data){
            var duce = jQuery.parseJSON(data);
            var size = duce[0];
            for(var i=1;i<=size;i++){
              rates = JSON.parse(duce[i]);
              $('#tbody').append(
                '<tr data-placement="bottom" data-toggle="tooltip" title="Click For Details"  onclick="myFunction1(this)">'+
                  '<td>'+rates.subjectName+'</td>'+
                  '<td>'+rates.subjectId+'</td>'+
                '</tr>'
              );
              $('#startsub').append(
                  '<option value="'+rates.subjectId+'">'+rates.subjectName+'</option>'
              );
            }
            $('[data-toggle="tooltip"]').tooltip({ trigger: "hover" });
        }});
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
        td = tr[i].getElementsByTagName("td")[0];
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

      function opnmyOverlaystart() {
        $('#startsub').val('');
       document.getElementById("myOverlaystart").style.display = "block";
      }
      function closemyOverlaystart() {
        document.getElementById("myOverlaystart").style.display = "none";
      }
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
      function start() {
        var sub_code =  $('#startsub').val();
        var fingerid   ;
        var tec_code = <?php echo json_encode(  $_SESSION['TeacherId']) ?> ;
        var port ;


        if(sub_code != '' ){
          $.ajax({url: "controller.php?method=getport", async: false, success: function(data){
            rates = JSON.parse(data);
            port = rates.domainName ;
            //var myVar = setTimeout(alertFunc, 500);
            // function alertFunc() {
            //   $("#strong").text("FingerPrint Scannered ...");
            // }
          }});
          $.ajax({url: "controller.php?method=getfingerId&teacherId="+tec_code, async: false, success: function(data){
            rates = JSON.parse(data);
            fingerid = rates.fingerId ;
          }});

          var url = "http://"+port;
          var par = '?3:'+fingerid+':'+sub_code;
          $.get( url+par,  )
            .done(function( data ) {
            alert( "Data Loaded: " + data );
          });
       
        }
      }
  </script>
    


    <script src="jscript/jscript.js"> </script>
</body>
</html>
