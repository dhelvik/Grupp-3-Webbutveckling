<?php

?>
<head>
<style>
   *{
    box-sizing: border-box;
   }
   div{
    background-color: green;
   }
   .post{
    width:100%;
    height: 800px;
   }
   .img{
     width:25%;
     height:100%;
     float: left;
     background-color: blue;
     position: relative;
   }
   .right{
       width:75%;
       float: left;
       height:100%;
       background-color: red;
   }
   .head{
    width:100%;
    background-color: purple;
    height: 20%;
    text-align: center;
    font-size: 500%;
     position: relative;
   }
   .text{
    width:100%;
    height: 80%;
    background-color: yellow;
    text-align: center;
    font-size: 200%;
     position: relative
   }
   p{
    margin: 0;
    position: absolute;
    top: 50%;
    left: 50%;
    -ms-transform: translate(-50%, -50%);
    transform: translate(-50%, -50%);    
   }
   img{
        margin: 0;
        position: absolute;
        max-width: 100%;
        max-height: 100%;
        top: 50%;
        left: 50%;
        -ms-transform: translate(-50%, -50%);
        transform: translate(-50%, -50%); 
   }
</style>
</head>
<div class="post">
	<div class="img"><img src="/bilder/karnevaltag2.jpg"></div>
	<div class="right">
		<div class="head">
			<p>Rubrik</p>
		</div>
		<div class="text">
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing sajkbhfuksjdhbfukshf 	elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>
		</div>
	</div>
</div>
