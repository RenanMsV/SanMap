<?php 
	/*Isnt this amazing !? a php file without php code!
	©Gamer931215 2011
	Do NOT:
		*Re-Release
		*Clame it as your own
		*Sell
		*Mirror it 
		*Use the .php file in your application from my webserver
	*/
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<style>
		a
		{
			text-decoration:none;
			color:black;
		}
		.title
		{
			width:940px;height:30px;
			background-color:#0087FF;
			color:white;
			text-shadow:-2px -2px 3px;
			text-align:center;
			border-radius:8px 8px 0px 0px;
			border:black thin solid;
			border-bottom:none;
		}
		.result
		{
			width:920px;height:80px;
			padding:10px 10px 10px 10px;
			background-color:#E6E6E6;
			border-radius:0px 0px 8px 8px;
			border:black thin solid;
			border-top:none;
		}
	</style>
	<script type="text/javascript">
		var x = 0;
		var y = 0;
		
		if(navigator.appName == "Microsoft Internet Explorer")
		{
			alert('Warning! We detected that you are using Internet Explorer! \r\n\r\nThis browser will may work but is not supported.\r\n\r\nWe recommend to download one of these browsers:\r\n  *Mozilla Firefox (http://www.mozilla.com)\r\n  *Google Chrome (http://chrome.google.com/)');
		}
		
		function getDetails(e){
			var scrolled_from_top = document.all ? document.scrollRight : window.pageYOffset;
			document.getElementById('marker').style.visibility = 'visible';
			document.getElementById('marker').style.margin = (e.clientY - document.getElementById('image').offsetTop -1) + scrolled_from_top + 'px 0px 0px ' + (e.clientX - document.getElementById('image').offsetLeft -2) +'px';
			
			var x = ((e.clientX - document.getElementById('image').offsetLeft) - 320) * 9.375;
			var y = ((e.clientY - document.getElementById('image').offsetTop + scrolled_from_top) - 320) *  9.375;
			document.getElementById('result').src = 'coords.php?x=' + x + '&y=' + y;
		}
	</script>
	
	<div style="width:940px;height:640px;margin:auto;">
		<div class="title">About</div>
		<div class="result">
			In this online web application you can select a point on the San Andreas map and it will give you the exact coordinates (including height using the MapAndreas map!).<br/>
			It also allows you to create gangzones and player world boundaries!
		</div><br/>
		<div style="width:640px;height:640px;float:left;background-image:url('img/radar.jpg');" id="image" style="z-index:-1;" onclick="getDetails(event);">
			<img id="marker" src="img/marker.gif" style="visibility:hidden;margin-top:20px;"/>
		</div>
		<iframe style="margin-left:50px;" id="result" frameborder="0" width="250px" height="660px" src="coords.php">Error! The iframe could not be loaded. Please upgrade your browser.</iframe>
		<br/><p align="center"><small>&copy;2011 - Gamer931215</small></p>
	</div>
</html>

