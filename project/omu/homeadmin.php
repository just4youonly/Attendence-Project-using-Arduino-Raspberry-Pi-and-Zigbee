
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
  body{
    background: -webkit-linear-gradient(bottom, #b4d8e2, #0e7692) !important;
    background: -o-linear-gradient(bottom, #b4d8e2, #0e7692)!important;;
    background: -moz-linear-gradient(bottom, #b4d8e2, #0e7692)!important;;
    background: linear-gradient(bottom, #b4d8e2, #0e7692)!important;;
  }
  .navbar {
    width: 75%;
    margin-left:12.5%;
    padding:0px;
  }

  .navbar a {
    width:33.333333333333%;
    text-align: center;
    float: center;
    padding-top: 12px;
    padding-bottom: 12px;
    color: white;
    text-decoration: none;
    font-size: 17px;
    font-weight: bold;
    background-color: #c53333;
    

  }

  .navbar a:hover {
    background-color: #4CAF50;
    padding-top: 15px !important;
    padding-bottom: 15px !important;
  }

  .active {
    background-color: #212a55 !important;
    padding-top: 15px !important;
    padding-bottom: 15px !important;
  }

  @media screen and (max-width: 500px) {
    .navbar a {
      float: none;
      display: block;
    }
  }

  @media only screen and (max-width: 575px) {
    .table{
      margin-left: 12.5%;
    }
    .jumbotron {
      width: 100%;
      margin-left: 0%;
    }
    table{
      font-size:2.8vw;
    }

  }

  #tr1{
    background-color: #212a55 !important;
    transform: scale(1) !important;
  }
  #th1{
    width:35%;
  }
  .table .thead-light th {
    color: white;
    background-color: #212a55 !important;
    border-color: grey;
    
  }

  tr:hover{
    transform: scale(1)!important;;
    border:2px solid 212f70;
    background-color: #212a5500  !important;
    color:white;
    transition: 0.5s;
  }


  #editid:hover{
    transform: scale(2)!important;;
    color:#c53333;
    transition: 0.5s;
    cursor: pointer;
  }
  #removeid:hover{
    transform: scale(2)!important;;
    color:#c53333;
    transition: 0.5s;
    cursor: pointer;
  }
  i{
    font-size: 20px !important; 
  }

  .input001 {
    padding: 12px 20px!important; 
    margin: 8px 0!important; 
    font-size: 17px!important; 
    border: 1px solid #ccc!important; 
    border-radius: 4px!important; 
    float: none!important; 
    box-sizing: border-box!important; 
    width: 100%!important; 
    background: white!important;  
  }
 
  .input001:hover {
    padding: 12px 20px!important; 
    margin: 8px 0!important; 
    font-size: 17px!important; 
    border: 1px solid #ccc!important; 
    border-radius: 4px!important; 
    float: none!important; 
    box-sizing: border-box!important; 
    width: 100% !important; 
    background: white!important; 
  }


  

  .input002 {
    width: 100%;
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
  }

  .input002:hover {
    background-color: #45a049;
  }

  div.container111 {
    border-radius: 5px;
    margin: 15%;
    margin-top: 6%;
    width:70%;
    cursor: -webkit-grab; cursor: grab;
    overflow:hidden;
  }

#myUL {
  margin: 0;
  padding: 0;
}
#myULst {
  margin: 0;
  padding: 0;
}
.fin {
  border: 2px solid #1a224b;
  margin:1%;
  color: #1a224b  !important;
  font-size: 16px;
  cursor: pointer;
  float:left;
  width:14%;
  text-align:center;
}

.fin:hover {
  transform:scale(1.1);
  border: 2px solid #1a224b;
  background-color: #1a224b;
  margin:1%;
  color: white!important;
}

.fin1 {
  border: 2px solid #1a224b;
  margin:1%;
  color: #1a224b  !important;
  font-size: 16px;
  cursor: pointer;
  float:left;
  text-align:center;
}
.finclicked {
  transform:scale(1.1);
  border: 2px solid #1a224b;
  background-color: #1a224b;
  margin:1%;
  color: white!important;
}

.fin1:hover {
  transform:scale(1.1);
  border: 2px solid #1a224b;
  margin:1%;
  color: white!important;
}

/* Style the list items */
#myUL li {
  cursor: pointer;
  position: relative;
  padding: 12px 8px 12px 40px;
  list-style-type: none;
  font-size: 18px;
  transition: 0.2s;
  /* make the list items unselectable */
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
  border-bottom:1px solid #212a55;
}
#myUL li:hover {
  transform:scale(1.05);
  border-bottom:1px solid #c53333;
}
#myULst li {
  cursor: pointer;
  position: relative;
  padding: 12px 8px 12px 40px;
  list-style-type: none;
  font-size: 18px;
  transition: 0.2s;
  /* make the list items unselectable */
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
  border-bottom:1px solid #212a55;
}
#myULst li:hover {
  transform:scale(1.05);
  border-bottom:1px solid #c53333;
}


.close {
  position: absolute;
  top: 0;
  right:0;
  float:right;
  padding: 12px 16px 12px 16px;
}

.close:hover {
  transform:scale(1.5);
  color: #c53333;
}




@media screen and (max-width: 500px) {
  .navbar a {
    width: 33.333333333333%;
    text-align: center;
    float: center;
    padding-top: 12px;
    padding-bottom: 12px;
    color: white;
    text-decoration: none;
    font-size: 14px;
    font-weight: bold;
    background-color: #c53333;
  }
}
@media screen and (max-width: 367px) {
  .navbar a {
    width: 33.333333333333%;
    text-align: center;
    float: center;
    padding-top: 12px;
    padding-bottom: 12px;
    color: white;
    text-decoration: none;
    font-size: 10px;
    font-weight: bold;
    background-color: #c53333;
  }
}
.finch:hover {
  transform:scale(1.1)!important;
  color:white !important;
}
.finch {
  border: 2px solid #1a224b!important;
  margin:2%!important;
  color: #1a224b  !important;
  font-size: 16px!important;
  cursor: pointer!important;
  float:left!important;
  text-align:center!important;
  padding:10px!important;

}

.finh {
  background-color: #1a224b!important;
  color: white  !important;
  font-size: 14px!important;
  float:left!important;
  text-align:center!important;
  padding:4px!important;
  width:100%!important;
  margin:1%;
  font-weight: bold;
}

.subjectclicked {
  transform:scale(1.05)!important;
  border: 2px solid #1a224b!important;
  background-color: #1a224b!important;
  margin:1%!important;
  color: white!important;
}
.subjectclicked1 {
  transform:scale(1.05)!important;
  background-color: #1a224b!important;
  color: white!important;
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
          <a href="controller.php?method=logout" data-placement="right" data-toggle="tooltip" title="Sign Out" class="sign-out too"><i class="fa fa-sign-out" style="color:white"></i></a>
          <a href="#" class="back too" onclick="openAddte(this)" id="add1" data-placement="right" data-toggle="tooltip" title="Add Teacher" ><i class="	fa fa-user-secret" style="color:white"></i></a>
          <a href="#" class="back too" onclick="openAddsu(this)" id="add2" data-placement="right" data-toggle="tooltip" title="Add Subject"  ><i class="fa fa-book" style="color:white"></i></a>
          <a href="#" class="back too" onclick="openAddst(this)" id="add3" data-placement="right" data-toggle="tooltip" title="Add Student"  ><i class="	fa fa-mortar-board" style="color:white;font-size:18px !important;"></i></a>
          <a href="#" class="search too" onclick="openSearch()"  data-placement="right" data-toggle="tooltip" title="Search By Name" ><i class="fa fa-search" style="color:white"></i></a> 


          
      </div>

      <div class="container" >
        
        <h3 style="COLOR:#f6f7fa;text-shadow: 3px 3px 3px  #212f70;">Select Option For Details</h2>
        <br>
        
        


        <table class="table"   id="table" >
          
          <thead id="thead" class="thead-light">
            <div class="navbar">
              <a data-placement="top" data-toggle="tooltip" title="List Teachers" id="teachers" class="active" href="#">Teachers</a> 
              <a data-placement="top" data-toggle="tooltip" title="List Students" id="students" href="#"> Students</a> 
              <a data-placement="top" data-toggle="tooltip" title="List Subjects" id="subjects" href="#"> Subjects</a> 
            </div>
          </thead>

        </table>
      </div>
    </div>

    <div id="myOverlay" class="overlay" >
      <span class="closebtn" onclick="closeSearch()" data-placement="top" data-toggle="tooltip" title="Close"  >X</span>
      <div class="overlay-content">
        
          <input type="text" data-placement="top" data-toggle="tooltip" title="Write To Search"   placeholder="Search.." name="search" id="input" style="width:80% !important ;" onkeyup="searchmyinput()">
          <button data-placement="top" data-toggle="tooltip" title="Click To Search"  type="submit" onclick="closeSearch()" ><i class="fa fa-search" style="color:white"></i></button>
        
      </div>
    </div>

    <div id="myOverlayst" class="overlay" style="overflow-y: auto;margin-bottom:100px !important;padding-bottom:160px;" >
        <span class="closebtn" onclick="closestu(this)" data-placement="top" data-toggle="tooltip" title="Close"  >X</span>
        <div class="overlay-content" id="overlay-content3" style="top:6%;margin-bottom: 125px;text-align: left;">
        <div class="container111" >
       
            <label for="fname" style="font-weight: bold;" >First Name :</label>
            <input type="text" id="nfirstst" type="text" class="input001" name="firstname" placeholder="First name.." >
            
            <label for="fname" style="font-weight: bold;" >Last Name :</label>
            <input type="text" id="nlastst" type="text" class="input001" name="lastname" placeholder="Last name..">

            <button   id="addstudent" style="width:100% !important;color:white;margin-top:20px;" data-placement="top" data-toggle="tooltip" title="Click"   >Add Student</button>
              
            <div id="studentdiv"> 
              <label for="fname" style="font-weight: bold;margin-top:25px;" >Select To Add Subject :</label>
              <div id="myDIV1" class="header">
                  <div  id="subjectteacherslist" style="width:90%;margin-left:5%;"  >
                  </div>
              </div>
              <div id="myULst"  style="width:90%;margin-left:5%;margin-bottom:10px;"></div><br> 
              <div id="hidethisst">
                <label for="fname" style="font-weight: bold;margin-top:25px;float:left ;width:100%" >Select Finger Id:</label>
                <br> <br> <br>
                <div  id="idsst" style="width:90%;margin-left:5%;"  ></div><br><br>
                <button   id="getfingerst" style="width:100% !important;color:white;margin-top:25px;margin-bottom: 150px;" data-placement="top" data-toggle="tooltip" title="Click To Get"  >Get Finger</button>
              </div>
             </div>
             <button   id="Editfingerstu" style="width:100% !important;color:white;margin-top:25px;display:none" data-placement="top" data-toggle="tooltip" title="Click To Edit"   >Edit Finger</button>
        </div>
        </div>
    </div>
    <div id="myOverlayte" class="overlay" style="overflow-y: auto; padding-bottom:160px;" >
        <span class="closebtn" onclick="closete()" data-placement="top" data-toggle="tooltip" title="Close" id="fuc1" >X</span>
        <div class="overlay-content" id="overlay-content2" style="top:6%;margin-bottom: 125px;text-align: left;">
        <div class="container111" >
       
            <label for="fname" style="font-weight: bold;color:black !important;" >First Name :</label>
            <input type="text" id="nfirstte" type="text" class="input001" name="firstname" placeholder="First name.." >
            
            <label for="fname" style="font-weight: bold;color:black !important;" >Last Name :</label>
            <input type="text" id="nlastte" type="text" class="input001" name="lastname" placeholder="Last name..">

            <label for="fname" style="font-weight: bold;color:black !important;" >Password :</label>
            <input  id="passte" type="password" class="input001" name="pass" placeholder="Password..">

            <button   id="addteacher" style="width:100% !important;color:white;margin-top:20px;" data-placement="top" data-toggle="tooltip" title="Click" >Add Teacher</button>
              
            <div id="fingerdiv"> 
              <label for="fname" style="font-weight: bold;margin-top:25px;color:black !important;" >Select To Add Subject :</label>
              <div id="myDIV" class="header">
                  <div  id="subjectslist" style="width:90%;margin-left:5%;"  >
                  </div>
              </div>
              <div id="myUL"  style="width:90%;margin-left:5%;margin-bottom:10px;"></div><br> 
              <div id="hidethis">
                <label for="fname" style="font-weight: bold;margin-top:25px;float:left ;width:100% ;color:black !important;" >Select Finger Id:<strong id="strong" style="color:#cc0000;margin-left:10px;"><strong></label>
                <br> <br> <br>
                <div  id="ids" style="width:90%;margin-left:5%;"  ></div><br><br>
                <button   id="getfinger" style="width:100% !important;color:white;margin-top:25px;" data-placement="top" data-toggle="tooltip" title="Click To Get" >Get Finger</button>
              </div>
              <button   id="Editfingerte" style="width:100% !important;color:white;margin-top:25px;display:none" data-placement="top" data-toggle="tooltip" title="Click To Edit" >Edit Finger</button>
          </div>
         
        </div>
        </div>
    </div>
    <div id="myOverlaysu" class="overlay" >
        <span class="closebtn" onclick="closesu()" data-placement="top" data-toggle="tooltip" title="Close">X</span>
        <div  class="overlay-content" id="content" style="top:25%;margin-bottom: 125px;" >
              <div class="containercalendar" id="content">
                 <a style="display:none">asda</a>
                 <input  id="addsubjectinput" type="text" class="input001" name="addsubjectinput" placeholder="Subject Name.." >
                 <button   id="addsubject" style="width:100% !important;color:white;margin-top:20px;"  data-placement="top" data-toggle="tooltip" title="Click To Add" >Add Subject</button>
              </div> 
        </div>
    </div>

    <button onclick="topFunction()" id="scroll" title="Go to top">Top</button>

	</div>
	
	
  <script >
  var methodteacher = "" ;

$(document).ready(function(){
  document.getElementById("teachers").click();
  $('[data-toggle="tooltip"]').tooltip({ trigger: "hover" });
  $("#strong").hide();
  $("#fingerdiv").hide();
  $("#strong1").hide();
  $("#studentdiv").hide();
  
});

$( "#teachers" ).click(function() {
  ctrldo = "teachers" ;
    $("#table").empty();
    $("#table").append(
          '<thead id="thead" class="thead-light">'+
            '<div class="navbar">'+
              '<a id="teachers" href="#">Teachers</a> '+
              '<a id="students" href="#"> Students</a> '+
              '<a id="subjects" href="#"> Subjects</a> '+
            '</div>'+
            '<tr id="tr1">'+
              '<th id="th1" >Teacher Id </th>'+
              '<th >Teacher Name </th>'+
              '<th  >Edit</th>'+
              '<th  >Remove</th>'+
            '</tr>'+
          '</thead>'
    );
    $( "#students" ).removeClass( "active" );
    $( "#subjects" ).removeClass( "active" );
    $( "#teachers" ).addClass( "active" );
    $.ajax({url: "controller.php?method=getTeachers", async: true, success: function(data){
      var duce = jQuery.parseJSON(data);
      var size = duce[0];
  
      for(var i=1;i<=size;i++){
        rates = JSON.parse(duce[i]);
        $("#table").append(
          '<tbody id="tbody" >'+
            '<tr   id="'+rates.teacherId+'" >'+
              '<td>'+rates.teacherId+'</td>'+
              '<td>'+rates.teacherName+" "+rates.teacherSurname+'</td>'+
              '<td   data-placement="top" data-toggle="tooltip" title="Click To Edit" ><i onclick="openAddte(this)" id="editid" class="fa fa-pencil "></td>'+
              '<td   data-placement="top" data-toggle="tooltip" title="Click To Delete" ><i onclick="removeteacher(this)" id="removeid" class="	fa fa-times-circle" ></td>'+
            '</tr>'+
          '</tbody>'
        );
        $('[data-toggle="tooltip"]').tooltip({ trigger: "hover" });

      }
    }});
});

$( "#students" ).click(function() {
  ctrldo = "students" ;
    $("#table").empty();
    $('#table').append(
          '<thead id="thead" class="thead-light">'+
            '<div class="navbar">'+
              '<a id="teachers"  href="#">Teachers</a> '+
              '<a id="students"  href="#"> Students</a> '+
              '<a id="subjects" href="#"> Subjects</a> '+
            '</div>'+
            '<tr id="tr1">'+
              '<th id="th1" >Student Id </th>'+
              '<th >Student Name </th>'+
              '<th  >Edit</th>'+
              '<th  >Remove</th>'+
            '</tr>'+
          '</thead>'
    );
    $( "#teachers" ).removeClass( "active" );
    $( "#subjects" ).removeClass( "active" );
    $( "#students" ).addClass( "active" );
    $.ajax({url: "controller.php?method=getStudents", async: true, success: function(data){
      var duce = jQuery.parseJSON(data);
      var size = duce[0];

      for(var i=1;i<=size;i++){
        rates = JSON.parse(duce[i]);
        $('#table').append(
          '<tr  id="'+rates.studentId+'">'+
            '<td>'+rates.studentId+'</td>'+
            '<td>'+rates.studentName+" "+rates.studentSurname+'</td>'+
            '<td   ><i onclick="openAddst(this)" id="editid" class="fa fa-pencil "></td>'+
            '<td   ><i onclick="removestudent(this)" id="removeid" class="	fa fa-times-circle" ></td>'+
          '</tr>'
        );
      }
      $('[data-toggle="tooltip"]').tooltip({ trigger: "hover" });

    }});
});

$( "#subjects" ).click(function() {
  ctrldo = "subjects" ;
    $("#table").empty();
    $('#table').append(
          '<thead id="thead" class="thead-light">'+
            '<div class="navbar">'+
              '<a id="teachers" href="#">Teachers</a> '+
              '<a id="students" href="#"> Students</a> '+
              '<a id="subjects" class="active" href="#"> Subjects</a> '+
            '</div>'+
            '<tr id="tr1">'+
              '<th id="th1" >Subject Id </th>'+
              '<th >Subject Name </th>'+
              '<th >Edit</th>'+
              '<th >Remove</th>'+
            '</tr>'+
          '</thead>'
    );
    $( "#teachers" ).removeClass( "active" );
    $( "#students" ).removeClass( "active" );
    $( "#subjects" ).addClass( "active" );
    $.ajax({url: "controller.php?method=getSubjects", async: true, success: function(data){
      var duce = jQuery.parseJSON(data);
      var size = duce[0];
      var edit="edit";
      for(var i=1;i<=size;i++){
        rates = JSON.parse(duce[i]);
        $('#table').append(
          '<tr  id="'+rates.subjectId+'"  >'+
            '<td>'+rates.subjectId+'</td>'+
            '<td>'+rates.subjectName+'</td>'+
            '<td  data-placement="top" data-toggle="tooltip" title="Click To Edit" ><i onclick="openAddsu(this)" id="editid" class="fa fa-pencil "></td>'+
            '<td  data-placement="top" data-toggle="tooltip" title="Click To Delete" ><i onclick="removesubject(this)" id="removeid" class="	fa fa-times-circle" ></td>'+
          '</tr>'
        );
      }
      $('[data-toggle="tooltip"]').tooltip({ trigger: "hover" });
      
    }});
});

function removeteacher(a) {
  id = $(a).parent().parent().attr('id');
  $.ajax({url: "controller.php?method=deleteTeacher&teacherId="+id, async: true, success: function(data){$(a).parent().parent().remove()}});
}
function removestudent(a) {
  id = $(a).parent().parent().attr('id');
  $.ajax({url: "controller.php?method=deleteStudent&studentId="+id, async: true, success: function(data){$(a).parent().parent().remove()}});
}
function removesubject(a) {
  id = $(a).parent().parent().attr('id');
  $.ajax({url: "controller.php?method=deleteSubject&subjectId="+id, async: true, success: function(data){$(a).parent().parent().remove()}});
}

function openAddte(a) {
    var ctrl = $(a).attr('id');
    if(ctrl=='add1'){
     
      $("#Editfingerte").hide();
      $("#hidethis").show();
      document.getElementById("myOverlayte").style.display = "block";
      $("#addteacher").attr('value',"add");
    }else{
      $("#Editfingerte").show();
      $("#hidethis").hide();
      document.getElementById("myOverlayte").style.display = "block";
      var id = $(a).parent().parent().attr('id');
      $("#fingerdiv").children().first().attr('id',id);
      $("#addteacher").text("Edit Teacher");
      
      $("#addteacher").attr('value',"edit");
      $.ajax({url: "controller.php?method=getTeacher&teacherId="+id, async: true, success: function(data){
        var duce = jQuery.parseJSON(data);
        $("#nfirstte").val(duce.teacherName);
        $("#nlastte").val(duce.teacherSurname);
        $("#passte").val(duce.teacherPassword);
      }});
      $.ajax({url: "controller.php?method=getAllsubject", async: true, success: function(data){
        var duce = jQuery.parseJSON(data);
        var size = duce[0];
        $("#subjectslist").empty();
        for(var i=1;i<=size;i++){
          rates = JSON.parse(duce[i]);
          $('#subjectslist').append(
            '<a data-placement="top" title="Click to Change" data-toggle="tooltip"  onclick="subjectclick(this)" class="fin1" Style="padding:5px;" id="sub_'+rates.subjectId+'">'+rates.subjectName+'</a>'
          );
        }
        $('[data-toggle="tooltip"]').tooltip({ trigger: "hover" });
      }});
      var myVar = setTimeout(alertFunc, 500);
      function alertFunc() {
        $.ajax({url: "controller.php?method=getAllteachersubject&teacherId="+id, async: true, success: function(data){
          var duce = jQuery.parseJSON(data);
          var size = duce[0];
          var rrr = 0 ; 
          for(var i=1;i<=size;i++){
            rates = JSON.parse(duce[i]);
            rrr++;
            $("#sub_"+rates.subjectId).addClass( "subjectclicked" );
          }
          $("#fingerdiv").show();
          $("#hidethis").hide();
          
        }});
      }
    }
}

$( "#addteacher" ).click(function() {
  
    var ctrl = $( "#addteacher" ).val() ;
    if(ctrl=="edit"){
      var nfirstte = $('#nfirstte').val();
      var nlastte = $('#nlastte').val();
      var passte = $('#passte').val();
      var id = $("#fingerdiv").children().first().attr('id');
      $.ajax({url: "controller.php?method=editTeacher&firstname="+nfirstte+"&lastname="+nlastte+"&password="+passte+"&teacherId="+id, async: true, success: function(data){
        $( "#teachers" ).click();
          closete();
      }});
    }else{
      var nfirstte = $('#nfirstte').val();
      var nlastte = $('#nlastte').val();
      var passte = $('#passte').val();
      if( nfirstte=="" || nlastte=="" || passte=="" ){
        $("#nfirstte").attr("placeholder", "*. Write First Name");
        $("#nlastte").attr("placeholder", "*. Write Last Name");
        $("#passte").attr("placeholder", "*. Write Password");
      }else{
        $.ajax({url: "controller.php?method=getAllsubject", async: true, success: function(data){
          var duce = jQuery.parseJSON(data);
          var size = duce[0];
          $("#subjectslist").empty();
          for(var i=1;i<=size;i++){
            rates = JSON.parse(duce[i]);
            $('#subjectslist').append(
              '<a data-placement="top" title="Click to Change" data-toggle="tooltip"  onclick="subjectclick(this)" class="fin1" Style="padding:5px;" id="sub_'+rates.subjectId+'">'+rates.subjectName+'</a>'
            );
          }
          $('[data-toggle="tooltip"]').tooltip({ trigger: "hover" });
        }});
        $.ajax({url: "controller.php?method=getfingerids", async: true, success: function(data){
          var duce = jQuery.parseJSON(data);
          var size = duce[0];
          var ids = []; ;
          $("#ids").empty();
          for(var i=1;i<=size;i++){
            rates = JSON.parse(duce[i]);
            ids.push(parseInt(rates.fingerId));
          }
          for(var i=1;i<=50;i++){
            if(ids.includes(i)==false){
              $('#ids').append(
                '<a data-placement="top" data-toggle="tooltip" title="Click to Change" onclick="fingclick(this)" class="fin" id="id_'+i+'">'+i+'</a>'
              );
            }
          }
          $('[data-toggle="tooltip"]').tooltip({ trigger: "hover" });
        }});
        $.ajax({url: "controller.php?method=addTeacher&firstname="+nfirstte+"&lastname="+nlastte+"&password="+passte, async: true, success: function(data){
          $("#fingerdiv").children().first().attr('id',parseInt(data));
          $("#fingerdiv").show();
          $("#addteacher").text("Teacher Id Is:"+data);
          $("#teachers").click();
          $("#addteacher").attr("disabled", true);
        }});
      }
    }
});

function openAddst(a) {
  var ctrl = $(a).attr('id');
  if(ctrl=='add3'){
   
    $("#hidethisst").show();
    $("#Editfingerstu").hide();
    document.getElementById("myOverlayst").style.display = "block";
    $("#addstudent").attr('value',"add");
  }else{
    $("#hidethisst").hide();
    $("#Editfingerstu").show();
    document.getElementById("myOverlayst").style.display = "block";
    var id = $(a).parent().parent().attr('id');
    $("#studentdiv").children().first().attr('id',id);
    $("#addstudent").text("Edit Student");
    
    $("#addstudent").attr('value',"edit");
    $.ajax({url: "controller.php?method=getStudent&studentId="+id, async: true, success: function(data){
      var duce = jQuery.parseJSON(data);
      $("#nfirstst").val(duce.studentName);
      $("#nlastst").val(duce.studentSurname);
    }});
    $.ajax({url: "controller.php?method=getAllsubjectandteacher", async: true, success: function(data){
        var duce = jQuery.parseJSON(data);
        var size = duce[0];
        $("#subjectteacherslist").empty();
        for(var i=1;i<=size;i++){
          rates = JSON.parse(duce[i]);
          var subid = rates.subjectId ;
          var subname = rates.subjectName ;
          var teacherName= rates.teacherName ;
          var teacherSurname = rates.teacherSurname ;
          var teacherId = rates.teacherId ;
          var ctrl = $('#sub1_'+subid).attr('id') ;
          if(ctrl == undefined){
            $('#subjectteacherslist').append(
               '<div class="meee"  style="width:100%;background-color:red"  >'+
                  '<a   class="finh"  >'+subname+'</a>'+
                  '<div class="meee1"   id="sub1_'+subid+'" >'+
                    '<a data-placement="top" title="Click to Change" data-toggle="tooltip" onclick="subjectclick1(this)"  class="finch " Style="padding:5px;float:left;" id="sub_'+subid+'_'+teacherId+'" >'+teacherName+' '+teacherSurname+'</a>'+
                '</div>'+
              '</div>'
            );
          }else{
            $('#sub1_'+subid).append(
              '<a data-placement="top" title="Click to Change" data-toggle="tooltip" onclick="subjectclick1(this)"  class="finch" Style="padding:5px;float:left;" id="sub_'+subid+'_'+teacherId+'" >'+teacherName+' '+teacherSurname+'</a>'
            );
          }
        }
        $('[data-toggle="tooltip"]').tooltip({ trigger: "hover" });
    }});
    var myVar = setTimeout(alertFunc, 500);
    function alertFunc() {
      $.ajax({url: "controller.php?method=getAllstudentsubject&studentId="+id, async: true, success: function(data){
        var duce = jQuery.parseJSON(data);
        var size = duce[0];
        for(var i=1;i<=size;i++){
          rates = JSON.parse(duce[i]);
          $("#sub_"+rates.subjectId+"_"+rates.teacherId).addClass( "subjectclicked1" );
        }
        
      
        $("#studentdiv").show();
     }});
    }
    
    
  }
}





$( "#addstudent" ).click(function() {
  var ctrl = $( "#addstudent" ).val() ;
  if(ctrl=="edit"){
    var nfirstte = $('#nfirstst').val();
    var nlastte = $('#nlastst').val();
    var id = $("#studentdiv").children().first().attr('id');
    $.ajax({url: "controller.php?method=editStudent&firstname="+nfirstte+"&lastname="+nlastte+"&studentId="+id, async: true, success: function(data){
      $( "#students" ).click();
        closestu();
    }});
  }else{
    var nfirstte = $('#nfirstst').val();
    var nlastte = $('#nlastst').val();
    if( nfirstte=="" || nlastte=="" ){
      $("#nfirstst").attr("placeholder", "*. Write First Name");
      $("#nlastst").attr("placeholder", "*. Write Last Name");
    }else{
      $.ajax({url: "controller.php?method=getAllsubjectandteacher", async: true, success: function(data){
        var duce = jQuery.parseJSON(data);
        var size = duce[0];
        $("#subjectteacherslist").empty();
        for(var i=1;i<=size;i++){
          rates = JSON.parse(duce[i]);
          var subid = rates.subjectId ;
          var subname = rates.subjectName ;
          var teacherName= rates.teacherName ;
          var teacherSurname = rates.teacherSurname ;
          var teacherId = rates.teacherId ;
          var ctrl = $('#sub1_'+subid).attr('id') ;
          if(ctrl == undefined){
            $('#subjectteacherslist').append(
               '<div class="meee" style="width:100%;background-color:red"  >'+
                  '<a   class="finh"  >'+subname+'</a>'+
                  '<div  id="sub1_'+subid+'" >'+
                    '<a data-placement="top" title="Click to Change" data-toggle="tooltip" onclick="subjectclick1(this)"  class="finch " Style="padding:5px;float:left;" id="sub_'+subid+'_'+teacherId+'" >'+teacherName+' '+teacherSurname+'</a>'+
                '</div>'+
              '</div>'
            );
          }else{
            $('#sub1_'+subid).append(
              '<a data-placement="top" title="Click to Change" data-toggle="tooltip" onclick="subjectclick1(this)"  class="finch" Style="padding:5px;float:left;" id="sub_'+subid+'_'+teacherId+'" >'+teacherName+' '+teacherSurname+'</a>'
            );
          }
        }
        $('[data-toggle="tooltip"]').tooltip({ trigger: "hover" });
      }});
      $.ajax({url: "controller.php?method=getfingeridsstudent", async: true, success: function(data){
        var duce = jQuery.parseJSON(data);
        
        var size = duce[0];
        var ids = []; ;
        $("#idsst").empty();
        for(var i=1;i<=size;i++){
          rates = JSON.parse(duce[i]);
          ids.push(parseInt(rates.fingerId));
        }
        for(var i=51;i<=200;i++){
          if(ids.includes(i)==false){
            $('#idsst').append(
              '<a data-placement="top" data-toggle="tooltip" title="Click to Change" onclick="fingclick(this)" class="fin" id="id_'+i+'">'+i+'</a>'
            );
          }
        }
        $('[data-toggle="tooltip"]').tooltip({ trigger: "hover" });
      }});
      $.ajax({url: "controller.php?method=addStudent&firstname="+nfirstte+"&lastname="+nlastte+"&password="+passte, async: true, success: function(data){
        $("#studentdiv").children().first().attr('id',parseInt(data));
        $("#studentdiv").show();
        $("#addstudent").text("Student Id Is:"+data);
        $("#students").click();
        $("#addstudent").attr("disabled", true);
      }});
    }
  }
});
$( "#Editfingerte" ).click(function() {
  $.ajax({url: "controller.php?method=getport", async: false, success: function(data){

  rates = JSON.parse(data);
  port = rates.domainName ;
  //var myVar = setTimeout(alertFunc, 500);
  // function alertFunc() {
  //   $("#strong").text("FingerPrint Scannered ...");
  // }

  }});
  var fingerid;
  var id = $("#fingerdiv").children().first().attr('id');
  $.ajax({url: "controller.php?method=getfingerId&teacherId="+id, async: false, success: function(data){
    rates = JSON.parse(data);
    fingerid = rates.fingerId ;
  }});

  
  var url = "http://"+port;
  var par = '?1:'+id+':'+fingerid;
  $.get( url+par,  )
    .done(function( data ) {
    alert( "Data Loaded: " + data );
  });
});
$( "#Editfingerstu" ).click(function() {
  $.ajax({url: "controller.php?method=getport", async: false, success: function(data){
  rates = JSON.parse(data);
  port = rates.domainName ;
  //var myVar = setTimeout(alertFunc, 500);
  // function alertFunc() {
  //   $("#strong").text("FingerPrint Scannered ...");
  // }

  }});
  var fingerid;
  var id = $("#studentdiv").children().first().attr('id');
  $.ajax({url: "controller.php?method=getfingerIdstu&studentId="+id, async: false, success: function(data){
    rates = JSON.parse(data);
    fingerid = rates.fingerId ;
  }});

  var url = "http://"+port;
  var par = '?2:'+id+':'+fingerid;
  alert(par);
  $.get( url+par,  )
    .done(function( data ) {
    alert( "Data Loaded: " + data );
  });
});
$( "#getfinger" ).click(function() {
    var x = document.getElementsByClassName("finclicked");
    var port ;
    if(x.length !=0){
      $("#strong").empty();
      $("#strong").text("Please Wait...");
      $("#strong").show();

      
      $.ajax({url: "controller.php?method=getport", async: false, success: function(data){

        rates = JSON.parse(data);
        port = rates.domainName ;
        //var myVar = setTimeout(alertFunc, 500);
       // function alertFunc() {
       //   $("#strong").text("FingerPrint Scannered ...");
       // }
        
      }});
      
      var url = "http://"+port;
      var tid = $("#fingerdiv").children().first().attr('id');
      var fid = document.getElementsByClassName("finclicked")[0].id.split('_');
      var par = '?1:'+tid+':'+fid[1];
      $.get( url+par,  )
      .done(function( data ) {
        alert( "Data Loaded: " + data );
      });
    
    }else{
      $("#strong").empty();
      $("#strong").text("Finger Id Is Not Selected");
      $("#strong").show()
    }
});
$( "#getfingerst" ).click(function() {
    var x = document.getElementsByClassName("finclicked");
    var port ;
    if(x.length !=0){
      $("#strong").empty();
      $("#strong").text("Please Wait...");
      $("#strong").show();

      
      $.ajax({url: "controller.php?method=getport", async: false, success: function(data){

        rates = JSON.parse(data);
        port = rates.domainName ;
        //var myVar = setTimeout(alertFunc, 500);
       // function alertFunc() {
       //   $("#strong").text("FingerPrint Scannered ...");
       // }
        
      }});

      var url = "http://"+port;
      var tid = $("#studentdiv").children().first().attr('id');
      var fid = document.getElementsByClassName("finclicked")[0].id.split('_');
      var par = '?2:'+tid+':'+fid[1];
      $.get( url+par,  )
      .done(function( data ) {
        alert( "Data Loaded: " + data );
      });
    
    }else{
      $("#strong").empty();
      $("#strong").text("Finger Id Is Not Selected");
      $("#strong").show()
    }
});
function fingclick(a) {
  var x = document.getElementsByClassName("finclicked");
    if(x.length !=0){
      $(x[0]).removeClass( "finclicked" );
    }
    $(a).addClass( "finclicked" );
}
function subjectclick(a) {
  var subjectName=$(a).text();
  var subjectId=$(a).attr('id').split('_');
  var teacherId=$("#fingerdiv").children().first().attr('id');
  if($(a).hasClass("subjectclicked")){
    $(a).removeClass( "subjectclicked" );
    $.ajax({url: "controller.php?method=deleteTeachersubject&teacherId="+teacherId+"&subjectId="+subjectId[1], async: true, success: function(data){}});
  }else{
    $(a).addClass( "subjectclicked" );
    $.ajax({url: "controller.php?method=addTeachersubject&teacherId="+teacherId+"&subjectId="+subjectId[1], async: true, success: function(data){}});
  }
  $('[data-toggle="tooltip"]').tooltip({ trigger: "hover" });
}



function subjectclick1(a) {
  var subjectId=$(a).attr('id').split('_');
  var studentId=$("#studentdiv").children().first().attr('id');

  if($(a).hasClass("subjectclicked1")){
    $(a).removeClass( "subjectclicked1" );
    $.ajax({url: "controller.php?method=deleteStudentsubject&teacherId="+subjectId[2]+"&subjectId="+subjectId[1]+"&studentId="+studentId, async: true, success: function(data){}});
   
  }else{
    if($(a).parent().find('.subjectclicked1').length !== 0){
      var subjectIdd=$(a).parent().children('.subjectclicked1').attr('id').split('_');
      $(a).parent().children('.subjectclicked1').removeClass('subjectclicked1')
      $.ajax({url: "controller.php?method=deleteStudentsubject&teacherId="+subjectIdd[2]+"&subjectId="+subjectIdd[1]+"&studentId="+studentId, async: true, success: function(data){}});
    }
    $(a).addClass( "subjectclicked1" );
    $.ajax({url: "controller.php?method=addStudentsubject&teacherId="+subjectId[2]+"&subjectId="+subjectId[1]+"&studentId="+studentId, async: true, success: function(data){}});
  }
  $('[data-toggle="tooltip"]').tooltip({ trigger: "hover" });
}
function closestu() {
  document.getElementById("myOverlayst").style.display = "none";
  $("#addstudent").text("Add Student");
    $("#addstudent").attr("disabled", false);
    $("#studentdiv").hide();
    $('#myOverlayst').find('input').val('');
    $("#strong").empty();
    $("#strong").hide();
}
function closete() {
  document.getElementById("myOverlayte").style.display = "none";
  $("#addteacher").text("Add Teacher");
  $("#addteacher").attr("disabled", false);
  $("#fingerdiv").hide();
  $('#myOverlayte').find('input').val('');
  $("#strong").empty();
  $("#strong").hide();
}
function closesu() {
    document.getElementById("myOverlaysu").style.display = "none";
}
$( window ).on( "click", function() {
    if (event.target.id == "myOverlayst") {
      closestu();
    }else if(event.target.id == "myOverlayte"){
      closete();
    }else if(event.target.id == "myOverlaysu" ) {
      closesu();
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

function openAddsu(el) {
  var ctrl =$(el).attr('id'); 
  if(ctrl=="add2"){
    $("#addsubject").text("Add Subject");
    $("#addsubjectinput" ).val("");
    $("#addsubjectinput").attr("placeholder", "Subject Name");
    $("#subidsave" ).text("Add Subject");
    $("#addsubject").attr('value',"add");
  }else{
    var id =$(el).parent().parent().attr('id');
    var name = $(el).parent().parent().children().eq(1).text()
    $("#addsubject").text("Edit Subject");
    $("#addsubjectinput" ).val(name);
    $("#addsubjectinput").parent().children().first().attr('id',id);
    $("#subidsave" ).text("Edit Subject");
    $("#addsubject").attr('value',"edit");
  }
  document.getElementById("myOverlaysu").style.display = "block";
}
$( "#addsubject" ).click(function() {
  var ctrl = $( "#addsubject" ).val() ;
  $("#addsubjectinput").attr("placeholder", "Subject Name")
  var subjectname = $('#addsubjectinput').val();
  if(  subjectname!="" && subjectname!=" "){
    if(ctrl=="edit"){
      var id=$("#addsubjectinput").parent().children().first().attr('id');
      $.ajax({url: "controller.php?method=editSubject&subjectName="+subjectname+"&subjectId="+id, async: true, success: function(data){
        $( "#subjects" ).click();
        closesu();
      }});
    }else{
        $.ajax({url: "controller.php?method=addSubject&subjectname="+subjectname, async: true, success: function(data){
        $( "#subjects" ).click();
        closesu();
      }});
    }
  }else{
    $("#addsubjectinput").attr("placeholder", "*. Write Subject Name");
  }
  
});  
</script>
<script src="jscript/jscript.js"> </script>
</body>
</html>