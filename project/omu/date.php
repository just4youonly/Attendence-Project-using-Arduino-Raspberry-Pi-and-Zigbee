
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
<script type="text/javascript" src="http://www.shieldui.com/shared/components/latest/js/shieldui-all.min.js"></script>
<script type="text/javascript" src="http://www.shieldui.com/shared/components/latest/js/jszip.min.js"></script>
  <link rel="stylesheet" type="text/css" href="css/util.css">
  <link rel="stylesheet" type="text/css" href="css/student.css">
  <link rel="stylesheet" type="text/css" href="css/main.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.4/jspdf.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/2.0.15/jspdf.plugin.autotable.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/2.0.15/jspdf.plugin.autotable.src.js"></script>
  
</head>

<style>

tr:hover{
  transform: scale(1.0);
  border:2px solid 212f70;
  background-color: #212a5500 !important;
  color:Black;
  transition: 0.5s;
  cursor: context-menu;

}
.container{
  overflow:hidden;
}
.container-right{
  width: 125px;
}

@media only screen and (max-width:775px) {
  #overlay-content{
    top:10% !important;
  }
  #overlay-content2{
    top:10% !important;
  }
}

.dot {
  height: 25px;
  width: 25px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;
  box-shadow: 0 1px 1px 0 white, 0 1px 5px 0 white;
}
.dot:hover {
  cursor: pointer!important;
}

#good{
  background: -webkit-linear-gradient(bottom, #a8aa1e, #dfe22a);
}
#verygood{
  background: -webkit-linear-gradient(bottom, #429644, #53bd57);
}
#bad{
  background: -webkit-linear-gradient(bottom, #b83232, #d13939);
}

.card:hover{
  cursor: pointer!important;
}
</style>
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
          <a href="home.php"  data-placement="right" data-toggle="tooltip" title="Home"  class="home"><i class="fa fa-home" style="color:white"></i></a> 
          <a href="controller.php?method=logout" data-placement="right" data-toggle="tooltip" title="Sign Out"  class="sign-out"><i class="fa fa-sign-out" style="color:white"></i></a>
          <a href="#" data-placement="right" data-toggle="tooltip" title="Pervious Page"  class="back" onclick="history.go(-1)" ><i class="fa fa-reply" style="color:white"></i></a>
          <a href="#" data-placement="right" data-toggle="tooltip" title="Search By Name"  class="search" onclick="openSearch()" ><i class="fa fa-search" style="color:white"></i></a> 
          <a href="#" data-placement="right" data-toggle="tooltip" title="Attendance By Date"  class="back" onclick="openSearch1()" ><i class="fa fa-calendar" style="color:white"></i></a>
          <a href="#" class="back" data-placement="right" data-toggle="tooltip" title="Change Status"  onclick="openSearch2()" ><i class="fa fa-edit" style="color:white"></i></a>
           <a href="#" class="back" data-placement="right" data-toggle="tooltip" title="Download As PDF"  id="download" ><i class="fa fa-download" style="color:white"></i></a>
      </div>

      

      <div class="container" id="tableexport">
              
        <h3 style="COLOR:#f6f7fa;text-shadow: 3px 3px 3px  #212f70;"> Students  Details</h3>
        <br>
        <table class="table" id="table" >
          <thead class="thead-light">
            <tr id="tr" >
              <th >Id</th>
              <th >Name</th>
              <th >Login</th>
              <th >Logout</th>
              <th >Status</th>
              <th  style="display: none;">Statuss</th>
            </tr>
          </thead>
          <tbody id="tbody">
            
            
          </tbody>
        </table>
      </div>
    </div>

      <div id="myOverlay" class="overlay" >
        <span class="closebtn" onclick="closeSearch()"  data-placement="bottom" data-toggle="tooltip" title="Close"  >X</span>
        <div class="overlay-content">
          <input type="text" placeholder="Search.." data-placement="bottom" data-toggle="tooltip" title="Write To Search"  name="search" id="input" onkeyup="searchmyinput()" >
          <button type="submit" data-placement="bottom" data-toggle="tooltip" title="Click To Search" onclick="closeSearch()" ><i class="fa fa-search" style="color:white"></i></button>
        </div>
      </div>

      <div id="myOverlay1" class="overlay" >
        <span class="closebtn" onclick="closeSearch1()"data-placement="bottom" data-toggle="tooltip" title="Close ">X</span>
        <div class="overlay-content" id="content" >
            <h3 style="COLOR:#131c46; margin-left: 0px;margin-bottom: 15px;">Select Date For Details</h3>
        </div> 
      </div>



      <div id="myOverlay2" class="overlay" >
          <span class="closebtn" onclick="closeSearch2()"  data-placement="bottom" data-toggle="tooltip" title="Close" >X</span>
          <div class="overlay-content" id="overlay-content2" style="top:30%;margin-bottom: 125px;" >
            <div class="containercalendar" style="margin-left:15%;" id="containercalendar">
              <div class="card" id="card1" style="width: 80%;margin-bottom: 30px;margin-left:10%;margin-top:20px;"  data-placement="bottom" data-toggle="tooltip" title="Click To Change">
                  <div class="card-body" id="card-body1">
                    <p class="card-text">change  red and yellow status to green status</p>
                  </div>
              </div>
              <div class="card" id="card2" style="width: 80%;margin-bottom: 30px;margin-left:10%;margin-top:20px;" >
                  <div class="card-body"  id="card-body2" data-placement="bottom" data-toggle="tooltip" title="Click To Change" >
                    <p class="card-text">just change yellow status to green status</p>
                  </div>
              </div>
            </div>
          </div>
      </div>

      <button onclick="topFunction()" id="scroll" title="Go to top">Top</button>

      

  </div>
  
  <script >
    var attendanceIdd ;
    var url = new URL(window.location.href);
    $('[data-toggle="tooltip"]').tooltip({ trigger: "hover" });

     var subjectId = String(url.searchParams.get("subjectId"));
     var subjectName = String(url.searchParams.get("subjectName"));
     var teacherName = String(url.searchParams.get("teacherName"));
     var teacherId = String(url.searchParams.get("teacherId"));
     var date = String(url.searchParams.get("date"));
     var newdate = new Date(date);
     var dates = newdate.getFullYear() + "-" + (newdate.getMonth() + 1)+ "-" + newdate.getDate() ;
    $(document).ready(function(){
     var count ; 
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
                  '<div class="filterDiv" data-placement="bottom" data-toggle="tooltip" title="Select Date For Details">'+
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
            $('#overlay-content1').append(
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




            
           


        var newdate = new Date(date);
        var dates = newdate.getFullYear() + "-" + (newdate.getMonth() + 1)+ "-" + newdate.getDate() ;

        $.ajax({url: "controller.php?method=getAttendance&subjectId="+subjectId+"&date="+dates, async: true, success: function(data){
            var duce = jQuery.parseJSON(data);
            var size = duce[0];
            var sid = " " ; 
            var sde = " " ; 
            for(var i=1;i<=size;i++){
              rates = JSON.parse(duce[i]);
              attendanceIdd = rates.attendanceId ;
              if(rates.attendanceStatus == "PRESENT"  ){
                a = "verygood" ; 
                sde = "Logged Out" ; 
              }else if (rates.attendanceStatus == "NEUTRAL"){
                a = "good" ; 
                sde = "Logged In " ; 
              }
              else if (rates.attendanceStatus == "ABSENT"){
                a = "bad" ; 
                sde = " Didnt Come" ; 
              }

              var sub = gettimesub(rates.loginDate) ; 
              var logoutDate ;
              var loginDate ;
              if(rates.loginDate == null){
                loginDate = '';
              }else{
                loginDate =rates.loginDate;
              }
              if(rates.logoutDate == null){
                logoutDate = '';
              }else{
                logoutDate =rates.logoutDate;
              }
              var sub = gettimesub(loginDate,logoutDate) ; 
              var st = "";
              var tit_hover="";
              if( sub< 2 ){
                st = "color:#c53333 !important;";
                tit_hover = 'data-toggle="tooltip" title="The time for attendance has not been met"' ;
              }
              if(loginDate == '' || logoutDate == '' ){
                tit_hover="";
              }
          
              
              $('#tbody').append(
                '<tr id="'+rates.attendanceId+'" >'+
                  '<td id="'+rates.studentId+'">'+rates.studentId+'</td>'+
                  '<td>'+rates.studentName+" "+rates.studentSurname+'</td>'+
                  '<td >'+loginDate+'</td>'+
                  '<td style="'+st+'" data-placement="bottom" '+tit_hover+'>'+logoutDate+'</td>'+
                  '<td><i id="'+a+'" onclick="changestatus(this)" class="dot" data-toggle="popover" data-placement="bottom" data-trigger="hover"'+ 'data-original-title="'+sde+'" data-content="Press To Change" ></i>'+
                  '</td>'+
                  '<td style="display:none;">'+sde+'</td>'+
                '</tr>'
              );

            }
            $('[data-toggle="tooltip"]').tooltip({ trigger: "hover" });

            $('[data-toggle="popover"]').popover();

        }});

          
           
       

    });
    
    function gettimesub(loginDate ,logoutDate ){
      var logintime = gettimecl (loginDate);
      var logouttime= gettimecl (logoutDate);
      if(logintime==null || logouttime == null){
        return null ; 
      }else{
        return logouttime-logintime;
      }
      
    }

    function gettimecl(Datep ){
      var date ;
      if(Datep==null){
        date = null ; 
      }else{
        var intime =Datep.split(':');
        if(intime[0][0]==0){
          date=intime[0][1];
        }else{
          date=intime[0];
        }
      }
      return date ; 
    }
    

    function changestatus(a) {
      var ctrl = a.id ;
      var attendanceId = $(a).parent().parent().attr('id');
      var studentId = $(a).parent().parent().children(":first").attr('id');

      var status ; 
      if(ctrl=="good"){
        a.id = "verygood" ;
        $(a).attr("data-original-title", "Logged Out");
        $(a).popover('hide');
        $(a).popover('show');
        status = "PRESENT"; 
         $(a).parent().parent().children(":last").empty().html("Logged Out");
      }else if(ctrl=="verygood"){
        a.id = "bad" ;
        $(a).attr("data-original-title", "Didn't Come");
        $(a).popover('hide');
        $(a).popover('show');
        status = "ABSENT";
         $(a).parent().parent().children(":last").empty().html("Didn't Come");
      }else{
        a.id = "good" ;
        $(a).attr("data-original-title", "Logged In");
        $(a).popover('hide');
        $(a).popover('show');
       status = "NEUTRAL";
        $(a).parent().parent().children(":last").empty().html("Logged In");
      }

      $.ajax({url: "controller.php?method=updateStudentState&attendanceId="+attendanceId+"&studentId="+studentId+"&status="+status, async: true, success: function(data){
      }});
    }

     $("#card1").click(function (e) {
      var elementsc = document.getElementsByClassName('dot') ;


      for(var i=0 ; i<elementsc.length ; i++){
       var a =  elementsc[i].id ;
        if(a=="good"||a=="bad"){
          $(elementsc[i]).attr("id", "verygood");
          $(elementsc[i]).attr("data-original-title", "Logged Out");
        }
      }
      closeSearch2();

      $.ajax({url: "controller.php?method=changeStatus&attendanceId="+attendanceIdd+"&status=all" , async: true, success: function(data){
      }});

    });

    $("#card2").click(function (e) {

      var elementsc = document.getElementsByClassName('dot') ;


      for(var i=0 ; i<elementsc.length ; i++){
        var a =  elementsc[i].id ;
        if(a=="good"){
          $(elementsc[i]).attr("id", "verygood");
          $(elementsc[i]).attr("data-original-title", "Logged Out");
        }
      }
      closeSearch2();

      $.ajax({url: "controller.php?method=changeStatus&attendanceId="+attendanceIdd+"&status=yellow", async: true, success: function(data){
      }});

    });

    var doc = new jsPDF();
    var specialElementHandlers = {
        '#tablexport': function (element, renderer) {
            return true;
        }
    };

    $('#download').click(function () {
        
         var rows =[];
         $.ajax({url: "controller.php?method=getAttendance&subjectId="+subjectId+"&date="+dates, async: false, success: function(data){
            var duce = jQuery.parseJSON(data);
            var size = duce[0];
            for(var i=1;i<=size;i++){
              var login_date ; 
              var logout_date ;
              rates = JSON.parse(duce[i]);
              if(rates.loginDate == null ){
                login_date = "___";
              }else{
                login_date=rates.loginDate;
              }
              if(rates.logoutDate == null){
                logout_date = "___";
              }else{
                logout_date= rates.logoutDate;
              }
              myObj = {"ID":rates.studentId, "Name":rates.studentName+" "+rates.studentSurname, "Logout":logout_date, "Login":login_date , "Status":rates.attendanceStatus};
              rows.push(myObj);
            }
        }});
        var columns = [{
                title: "ID",
                dataKey: "ID"
            },
            {
                title: "Name",
                dataKey: "Name"
            },
            {
                title: "Login",
                dataKey: "Login"
            },
            {
                title: "Logout",
                dataKey: "Logout"
            },
            {
                title: "Status",
                dataKey: "Status"
            },
        ];
              var CDate = new Date(date);
              var year = CDate.getFullYear();
              var day = CDate.getDate();
              var month = CDate.getMonth();

          var doc = new jsPDF('p', 'pt');
          var header = function (data) {
              doc.setFontSize(18);
              doc.setTextColor(40);
              doc.setFontStyle('normal');
              doc.text(" - Date : "+year+'-'+month+'-'+day, data.settings.margin.left, 50);
              doc.text(" - Teacher Name: "+teacherName, data.settings.margin.left , 75);
              doc.text(" - Teacher Id : " +teacherId , data.settings.margin.left, 100);
              doc.text(" - Subject Name: "+subjectName, data.settings.margin.left, 125);
              doc.text(" - Subject Code : "+subjectId , data.settings.margin.left, 150);
          };
          doc.autoTable(columns, rows, {margin: {top:   175}, beforePageContent: header});

          doc.save("table.pdf");
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
      function openSearch() {
         $('#input').val('');
        document.getElementById("myOverlay").style.display = "block";
      }
      function closeSearch() {
        document.getElementById("myOverlay").style.display = "none";
      }

      function openSearch2() {
       document.getElementById("myOverlay2").style.display = "block";
      }
      function closeSearch2() {
        document.getElementById("myOverlay2").style.display = "none";
      }


      function openSearch1() {
        document.getElementById("myOverlay1").style.display = "block";
      }
      function closeSearch1() {
        document.getElementById("myOverlay1").style.display = "none";
      }
  </script>




 <script src="jscript/jscript.js"> </script>
</body>
</html>
