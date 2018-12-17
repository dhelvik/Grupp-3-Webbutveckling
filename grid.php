<html>
 <head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Webslesson Tutorial</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />
 </head>
 <body>
  <div class="container">
   <br />
   <h2 align="center">Ajax Live Data Search using Jquery PHP MySql</h2><br />
   <div class="form-group">
    <div class="input-group">
     <span class="input-group-addon">Search</span>
     <input type="text" name="search_text" id="search_text" placeholder="Search by Customer Details" class="form-control" />
    </div>
   </div>
   <br />
   <div id="result"></div>
  </div>
 </body>
</html>
 <script>  
 $(document).ready(function(){  
	 $(document).ready(function(){

		 load_data();

		
		 $('#search_text').keyup(function(){
		  var search = $(this).val();
		  if(search != '')
		  {
		   load_data(search);
		  }
		  else
		  {
		   load_data();
		  }
		 });
		});
	 function load_data(query)
	 {
	  $.ajax({
	   url:"fetch.php",
	   method:"POST",
	   data:{"query" :query},
	   success:function(data)
	   {
	    $('#result').html(data);
	   }
	  });
	 }  
	 function edit_data(mail, currSectionName, text, column_name)  
     {  
         
          $.ajax({  
               url:"edit.php",  
               method:"POST",  
               data:{"mail": mail, "text":text, "column_name": column_name, "currentSection": currSectionName},  
               dataType:"text",  
               success:function(data){  
                    alert(data);  
               }  
          });  
     } 
      function edit_data(mail, text, column_name)  
      {  
          alert(column_name);
           $.ajax({  
                url:"edit.php",  
                method:"POST",  
                data:{"mail": mail, "text":text, "column_name": column_name},  
                dataType:"text",  
                success:function(data){  
                     alert(data);  
                }  
           });  
      }  
      $(document).on('blur', '.firstName', function(){  
           var mail = $(this).data("mail1");  
           var firstName = $(this).text();  
           edit_data(mail, firstName, "firstName");  
      });  
      $(document).on('blur', '.lastName', function(){  
           var mail = $(this).data("mail2");  
           var lastName = $(this).text();  
           edit_data(mail, lastName, "lastName");  
      });  
      $(document).on('blur', '.sectionName', function(){  
          var mail = $(this).data("mail4");  
          var sectionName = $(this).text();
          var currentSection = $(this).data("section1");  
         
          edit_data(mail, currentSection, sectionName, "sectionName");  
     });  
      $(document).on('click', '.btn_delete', function(){  
           var mail = $(this).data("mail3");  
           alert(mail);
           if(confirm("Are you sure you want to delete this?"))  
           {  
                $.ajax({  
                     url:"delete.php",  
                     method:"POST",  
                     data:{"mail": mail},  
                     dataType:"text",  
                     success:function(data){  
                          alert(data);  
                          load_data();  
                     }  
                });  
           }  
      });  
 });  
 </script>