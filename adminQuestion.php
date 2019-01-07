<!DOCTYPE html>
<?php
session_start();
include 'application/adminController.php';
$aCon = new AdminController();
$question = $aCon->getAllQuestions();
?>
<html>
<?php include("includes/head.php");?>
<body>
    <?php 
    include("includes/header.php");
    include("includes/nav.php");
    include("includes/section.php");
    ?>
    <div id='main'>
    <table id="question" class="tableGroup">
			<tr>
				<th>Namn</th>
				<th>E-post</th>
				<th>Fråga</th>
				<th>Behandla</th>
			</tr>
			<?php foreach ($question as $item){?>
        	<tr>
    			<td><?php echo $item->name;?></td>
    			<td><?php echo $item->mail;?></td>
    			<td><?php echo $item->question;?></td>
    			<td><button id="<?php echo $item->QID.'a';?>" class="answer">Svara</button></td>	
        	</tr>
        	<tr id="<?php echo $item->QID .'aa'?>"  style="display: none;">
        		<td class="hej" colspan="3"><textarea id="<?php echo $item->QID.'t';?>" style="width: 100%"></textarea></td>
        		<td><button id="<?php echo $item->QID;?>" mail="<?php echo $item->mail;?>" class="send">Skicka</button></td>
        	</tr>
        	<?php }?>
	</table>  
    </div>
    <?php 
    include("includes/aside.php"); 
	include("includes/footer.php"); 
	?>
</body>
<script>
$(document).on('click', '.answer', enableAnswer);
function enableAnswer(){
	var ID = $(this).attr('id')+'a';
	var element = document.getElementById(ID);
	if ($(this).html() == 'Svara') {
		element.style.display='table-row';
	}
	else if($(this).html() == 'Ångra'){
		element.style.display='none';
	}	
	$(this).html($(this).html() == 'Svara' ? 'Ångra' : 'Svara');	
}
$(document).on('click', '.send', getResponse);
function getResponse(){
	var ID = $(this).attr('id');
	var answer = $('#'+ID+'t'+'').val();
	var mail = $(this).attr('mail');
	if(!$.trim(answer)){
		alert('Svaret är tomt');
	}
	else{
		sendResponse(answer, ID, mail);
	}
}
function sendResponse(answer, ID, mail){
	$.ajax({
		type : "POST",
		url : "application/adminRequestHandler.php",
		data : {
			ACTION : "sendResponse",
			answer : answer,
			id : ID,
			mail : mail,
		},
		success : function(result) {
			location.reload();
		},
		error : function(result) {
			alert('något gick fel');
		}
	});	
}

</script>

	


</html>
