<!-- ©Gamer931215 2011
	Do NOT:
		*Re-Release
		*Clame it as your own
		*Sell
		*Mirror it 
		*Use the .php file in your application from my webserver
-->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<style>
	body
	{
		font-family: "Trebuchet MS";
		font-size:14px;
		margin-top:0px;
	}
	a 
	{
		text-decoration:none;
		color:black;
	}
	.title
	{
		width:240px;height:30px;
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
		width:220px;height:130px;
		padding:10px 10px 10px 10px;
		background-color:#E6E6E6;
		border-radius:0px 0px 8px 8px;
		border:black thin solid;
		border-top:none;
	}
</style>

<div class="title">Result</div>
<div class="result" style="height:380px;">
<?php 
	if(!isset($_SERVER['HTTP_REFERER'])) //anti F5 and remote script (ab)users
	{
		$_SESSION['output_boundaries'] = '';
		$_SESSION['output_gangzone'] = '';
		if(isset($_SESSION['wb_x']))
		{
			unset($_SESSION['wb_x']);
			unset($_SESSION['wb_y']);
		}
		die('Please click on the image to get a coordinate.');
	}
	
	session_start();
	//Unset all the saved output code if user clicked on reset, or create the session when its not yet created.
	if(isset($_GET['reset']) || !isset($_SESSION['output_boundaries']) || !isset($_SESSION['output_gangzone']))
	{
		$_SESSION['output_boundaries'] = '';
		$_SESSION['output_gangzone'] = '';
		if(isset($_SESSION['wb_x']))
		{
			unset($_SESSION['wb_x']);
			unset($_SESSION['wb_y']);
		}
	}
	
	//If user has selected a point
	if(isset($_GET['x'])) 
	{
		//Calculate MapAndreas (400x400) coordinates and get G value
		$x = $_GET['x']; $y = $_GET['y'];
		$x = ($x / 15) + 200;
		$y = ($y / 15) + 200;
		$img = imagecreatefromjpeg('img/SAfull.jpg');
		if($x < 0 || $y < 0) die ($x.'<br/>'.$y);
		$z = (imagecolorat($img,$x,$y) >> 8 & 0xFF) -25; //-27, fixing the accurary a bit?
		imagedestroy($img);
		
		//Redefining X and Y and mirror the Y axe
		$x = $_GET['x'];
		$y = $_GET['y'];
		if(str_replace('-','',$y) == $y)
		{
			$y = '-'.$y;
		} else {
			$y = str_replace('-','',$y);
		}
		
		//An older position has been set, create world bounds code
		if(isset($_SESSION['wb_x']))
		{
			$xmax = $x;
			$xmin = 0;
			$ymax = $y;
			$ymin = 0;
			
			//get lowest/highest coordinate
			if($_SESSION['wb_x'] > $x)
			{
				$xmax = $_SESSION['wb_x'];
				$xmin = $x;
			} else {
				$xmax = $x;
				$xmin = $_SESSION['wb_x'];			
			}
			if($_SESSION['wb_y'] > $y)
			{
				$ymax = $_SESSION['wb_y'];
				$ymin = $y;
			} else {
				$ymax = $y;
				$ymin = $_SESSION['wb_y'];			
			}
			
			//Creating code
			if(!isset($_SESSION['output_boundaries']))
			{
				$_SESSION['output_boundaries'] = "SetPlayerWorldBounds(playerid,$xmax,$xmin,$ymax,$ymin);";
			} else $_SESSION['output_boundaries'] = $_SESSION['output_boundaries']."\r\nSetPlayerWorldBounds(playerid,$xmax,$xmin,$ymax,$ymin);";
			if(!isset($_SESSION['output_gangzone']))
			{
				$_SESSION['output_gangzone'] = "GangZoneCreate($xmin,$ymin,$xmax,$ymax);";
			} else $_SESSION['output_gangzone'] = $_SESSION['output_gangzone']."\r\nGangZoneCreate($xmin,$ymin,$xmax,$ymax);";

			//Deleting sessions for next usage
			unset($_SESSION['wb_x']); unset($_SESSION['wb_y']);
		} else { //No position has been set yet, set the sessions for the next position
			$_SESSION['wb_x'] = $x;
			$_SESSION['wb_y'] = $y;
		}
		
		echo("Coordinates:<br/><input type=\"text\" style=\"width:100%;\" value=\"$x,$y,$z\"/><br/><br/>
			SetPlayerPos:<br/><input type=\"text\" style=\"width:100%;\" value=\"SetPlayerPos(playerid,$x,$y,$z);\"/><br/><br/>
			SetPlayerWorldBounds:<br/>
			<textarea style=\"width:100%;height:100px;\">".$_SESSION['output_boundaries']."</textarea><br/>
			GangZoneCreate:<br/>
			<textarea style=\"width:100%;height:100px;\">".$_SESSION['output_gangzone']."</textarea><br/>
			<a href=\"coords.php?reset\" style=\"color:blue;\">Reset</a>
		");
	} else echo('Please click on the image to get a coordinate.'); //No coordinates have been selected yet.
?>
</div><br/>
<div class="title">Credits</div>
<div class="result">
	<a target="_blank" href="http://www.gamer93.net/">Gamer931215</a><small><br/>for creating this webapp.</small><br/><br/>
	<a target="_blank" href="http://forum.sa-mp.com/member.php?u=3">Kalcor</a><small><br/><a target="_blank" href="http://forum.sa-mp.com/showthread.php?t=120013">for the MapAndreas map.</a></small><br/><br/>
	<a target="_blank" href="http://www.ianalbert.com">Ian Albert</a><small><br/><a target="_blank" href="http://www.thegtaplace.com/downloads/f1144">For the detailed radar mod/image.</a></small>
</div><br/>
</html>