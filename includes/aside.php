
<aside id="right">
    <h1>Kommande Evenemang</h1>

<script type="text/javascript">
   	$(document).ready(function(){
			$.ajax({
				method: "POST",
				url: "application/requestHandler.php", 
				data: {'ACTION': 'getAside'},
				datatype: 'application/json',
				success: function(result){
					result.forEach(function(item){
							$('#right').append('<div class="news"><img src='+item.imgPath+'><h2>'+item.heading+'</h2><p>'+item.eventInfo+'</p></div>')
						});
					
				},
				error: function(xhr, status, error){
					alert(status);
					//$('#labelEntryResponse').text('');
					//$('#labelEntryResponse').text(status);
				}
			});
		});
	
	</script>  
</aside>
