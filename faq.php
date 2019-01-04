<!DOCTYPE html>
<html>
<?php include("includes/head.php");?>
<body>
    <?php 
    include("includes/header.php");
    include("includes/nav.php");
    include("includes/section.php");
    ?>
    <div id='main'>
        <div class="main-info">
        <h1>Vanliga frågor och svar</h1>
        <p>Hur ofta hålls Lundakarnevalen?<br>
            - Var fjärde år.</p>
         <p>Hur gör jag för att bli karnevalist?<br>
            - Gå in på <a href="ansok.html">ansök</a> på hemsidan eller bvefinn dig på Af-Borgen 4:e februari.</p>
             <p>Vilket år hölls den första Lundakarnevalen?<br>
            - År 1862.</p>
             <p>Hur många engagerade studenter deltar?<br>
            - Föregående karneval deltog mer än 5000 studenter.</p>
        </div>
        <div class='main-info'>
            <h1>Frågeforumulär</h1>
            <p>Fick du inte svar på din fråga? Fyll i formuläret nedan</p>
            <div class='faq-form'>
                <form id="faq-form" class="faq-form">
                    <label>Namn</label>
        			<input type="text" name="name" placeholder="Namn">
        			<label>E-post*</label>
        			<input type="email" name="mail" required placeholder="E-post*">
        			<label>Fråga*</label><br>
                    <textarea id="question" name="question" style="width: 100%"></textarea>
                    <input name="ACTION" value="registerQuestion" type="hidden">
                    <input type="submit" value="Skicka">
                </form>
            </div>
        </div>
    </div>
    <script>
    function registerQuestion(e){
        e.preventDefault();
		$.ajax({
			method: "POST",
			url: "application/requestHandler.php", 
			datatype: 'json',
			data: $("#faq-form").serialize(), 
			success: function(result){
				alert(result);
			},
			error: function(xhr, status, error){
			}
		});
    }
    $("#faq-form").submit(registerQuestion);
	</script>
    <?php 
    include("includes/aside.php");
	include("includes/footer.php"); 
	?>
</body>
</html>
