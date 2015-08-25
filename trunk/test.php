<head>
    <script type="text/javascript" src="./jquery-1.2.3.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
	$(".btn-slide").click(function(){
		$("#panel").slideToggle("slow");
		$(this).toggleClass("active"); return false;
	});
	
	 
});    </script>
<style type="text/css">
body {
	margin: 0 auto;
	padding: 0;
	width: 570px;
	font: 75%/120% Arial, Helvetica, sans-serif;
}
a:focus {
	outline: none;
}
#panel {
	background: lightgray;
	height: 30px;
	display: none;
}
.slide {
	margin: 0;
	padding: 0;
	border-top: solid 4px #422410;
}
.btn-slide {
	text-align: center;
	width: 144px;
	height: 20px;
	padding: 5px 10px 0 0;
	margin: 0 auto;
	display: block;
	color: black;
        background-color: lightgray;
	text-decoration: none;
}
.active {
	background-position: right 12px;
}
</style>
</head>
<body>
<div id="panel">kajsdkljaskljd<br>akjdhkjashdjkah<br></div>
<p class="slide"><a href="#" class="btn-slide">Slide Panel</a></p>
as.kd;laskБ<br>
dasldkl;asjddd<br>
skajdklsahdkjaghsjkdh<br>

<?php

?>
</body>