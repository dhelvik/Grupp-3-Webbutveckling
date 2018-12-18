<html>
 <head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Webslesson Tutorial</title>
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" >
 </head>
 <body>
  <div class="container">
   <br />
   <h2 align="center">Adminverktyg för Karnevalister</h2><br />
   <div class="form-group">
    <div class="input-group">
     <span class="input-group-addon">Sök</span>
     <input type="text" name="search_text" id="search_text" placeholder="Namn, mail eller sektion" class="form-control" />
    </div>
   </div>
   <br />
    <div class="table-responsive">
   <table id="example" class="table table bordered">
    <tr>
     <th>Mail</th>
     <th>firstName</th>
     <th>lastName</th>
     <th>sectionName</th>
     
    </tr>
    </table>
 </body>
</html>
<script>
$(document).on('click', '.editbtn', function(){  
              var currentTD = $(this).parents('tr').find('td');
              
              if ($(this).html() == 'Edit') {
                  currentTD = $(this).parents('tr').find('td');
                  $.each(currentTD, function () {
                      alert($(this).prev().prop('nodeName'));
                      $(this).prop('contenteditable', true)
                  });
              } else {
                 $.each(currentTD, function () {
                      $(this).prop('contenteditable', false)
                  });
              }
    
              $(this).html($(this).html() == 'Edit' ? 'Save' : 'Edit')
    
          });
    
 </script>
 
 <script>  
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
		 function load_data(query)
		 {
		  $.ajax({
		   url:"application/adminRequestHandler.php",
		   method:"POST",
		   data:{"query":query, "ACTION": "getKarnevelister"},
		   success:function(result)
		   {
			   $('#example tbody').empty();
					  
			   result.forEach(function(item){
				   	
					$('#example tbody').append('<tr><td>'+item.mail+'</td><td>'+item.firstName+'</td><td>'+item.lastName+'</td><td>'+item.sectionName+'</td>'+
							'<td><button type="button" name="delete_btn" data-mail3="'+item.mail+'" class="btn btn-xs btn-danger btn_delete">x</button></td>'+
							'<td><button type="button" class="editbtn">Edit</button></td></tr>')
				});
		   },
		   error: function(xhr, status, error){
				alert(status);
				//$('#labelEntryResponse').text('');
				//$('#labelEntryResponse').text(status);
			}
		  });
		 }  		

		
	
	
	 function edit_dataSection(mail, currSectionName, text, column_name)  
     {  
         alert("Inne i section edit");
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
     /* $(document).on('blur', '.firstName', function(){  
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
         
          edit_dataSection(mail, currentSection, sectionName, "sectionName");  
     });  */
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
 