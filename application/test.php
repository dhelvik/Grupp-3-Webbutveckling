<?php
// include 'dataAccessLayer.php';
include 'controller.php';
// $dal=new DataAccessLayer();
// $dal->getRemainingVacancies('Adminsterit');
// $sec = $dal->getSection();
$con = new Controller();
$con->getSectionInfo();
// var_dump($sections);
// foreach ($sections as $value) {
//     echo $value->sectionName;
// }
?>
<!-- <script type="text/javascript"> -->
//    	$(document).ready(function(){
// 			$.ajax({
// 				method: "POST",
// 				url: "application/requestHandler.php", 
// 				data: {'ACTION': 'getPosts'},
// 				datatype: 'application/json',
// 				success: function(result){
// 					result.forEach(function(item){
// 							$('#posts').append('<div class="posts"><img src='+item.imgPath+'><h2>'+item.heading+'</h2><p>'+item.postText+'</p></div>')
// 						});
					
// 				},
// 				error: function(xhr, status, error){
// 					alert(status);
// 					//$('#labelEntryResponse').text('');
// 					//$('#labelEntryResponse').text(status);
// 				}
// 			});
// 		});
	
<!-- 	</script>   -->