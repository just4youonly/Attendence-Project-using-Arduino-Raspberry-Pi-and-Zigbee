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
      
      
      window.onscroll = function() {scrollFunction()};
      function scrollFunction() {
        if (document.body.scrollTop > 20 || document.documentElement.scrollTop >20) {
          document.getElementById("scroll").style.display = "block";
        } else {
          document.getElementById("scroll").style.display = "none";
        }
      }
      // When the user clicks on the button, scroll to the top of the document
      function topFunction() {
        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;
      }
      
      function myFunction1(a) {
        var subjectId = $(a.children[1]).text(); 
        var count;
        $.ajax({url: "controller.php?method=getSubjectCount&subjectId="+subjectId, async: true, success: function(data){
         count = data ; 
       	location.href = "students.php?subjectId="+subjectId+"&count="+count;
        }});
       //location.href = "students.php?subjectId="+subjectId+"&count="+count;
      }

      function myFunction12(a) {
        var subjectId = a.id ; 
        var id = a.children[0].textContent;
        var name = a.children[1].textContent; 
        var rate = a.children[2].textContent;  
        location.href = "studentdetails.php?id="+id+"&name="+name+"&rate="+rate+"&subjectId="+subjectId;
      }
        var tname ; 
        var sname ; 
      function showdate(a) {



        var a1 = $(a).attr('id');
        var a2 = $(a).parent().parent().attr('id');
        var a3 = $('#container100').children().first().attr('id');
        
        $.ajax({url: "controller.php?method=getteachername&teacherId="+a3, async: false, success: function(data){
          var x = jQuery.parseJSON(data); 
          tname =x.teacherName+' '+x.teacherSurname;
          
        }});
       
        
        $.ajax({url: "controller.php?method=getsubjectname&subjectId="+a2, async: false, success: function(data){
          var x= jQuery.parseJSON(data)  ;
          sname=x.subjectName;
        }});
        
        location.href = "date.php?date="+a1+"&subjectId="+a2+"&teacherId="+a3+"&teacherName="+tname+"&subjectName="+sname;
      }
     
      

      




     

     

   
