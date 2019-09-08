<?php
if(time()-filemtime("index.html")>=60){
	include('File.class.php');
	$imgList = new File();
	$info=$imgList->getFiles('images/',true);
	$file = fopen("index.html","w");
	fwrite($file,'<meta charset="UTF-8">'.'
	<img onload="update()" src="'.'//'.$_SERVER['HTTP_HOST'].'/images/'.$info[rand(0,count($info)-1)].'" />'.
	'<script>
	function update()
	{
		var xmlhttp;
		if (window.XMLHttpRequest)
		{
			xmlhttp=new XMLHttpRequest();
		}
		else
		{
			xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		}
		xmlhttp.open("GET","getImage.php","true");
		xmlhttp.send();
	}
	</script>');
	fclose($file);
}
?>