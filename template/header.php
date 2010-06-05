<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>

	<base href="<?php $local=new Local(); echo $local->getSiteBase();?>">
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		
	<title>Prode Mundial 2010</title>
	<meta name="keywords" content="" />
	<meta name="description" content="" />
	<link href="template/default.css" rel="stylesheet" type="text/css" />
	<link href="template/layout.css" rel="stylesheet" type="text/css" />
	<link href="template/subLayout.css" rel="stylesheet" type="text/css" />
	
	<style type="text/css">
		<!--
			@import url("template/layout.css");
			@import url("template/subLayout.css");
		-->
	</style>

	<!-- jquery -->
	<script src="template/js/jquery-1.4.2.min.js" type="text/javascript" ></script> 
	
	<!--jmp3 -->	
	<script src="lib/jquery/jMp3/jquery.jmp3.js" type="text/javascript" ></script>
	
	<!--tooltip -->	
	<script src="lib/jquery/jTools/jquery.tools.min.js" type="text/javascript"></script>

</head>

<body class="homepage">
	<div id="header" class="<?php if($sysController->idApp=="epson"){echo "epson";}?>">
		<p>
			 <!-- Begin of mycountdown.org script -->  
			 <!--div align="left" style="margin:15px 0px 0px 0px">  <noscript>  <div align="center" style="width:140px;border:1px solid #ccc; background: #; color: #000080;font-weight:bold;font-size:12px;">  <a style="text-decoration: none; color: #000080;" href="http://mycountdown.org/My_Countdown/My_Countdown/">My Countdown Countdown</a></div>  </noscript>  <script type="text/javascript" src="http://mycountdown.org/countdown.php?cp3_Hex=FFB200&cp2_Hex=FFFFFF&cp1_Hex=000080&ham=0&img=&hbg=1&hfg=0&sid=0&fwdt=150&text1=Cierran Apuestas&text2=Prode Starts&group=My Countdown&countdown=My Countdown&widget_number=3010&event_time=1276214400"></script-->  </div> <!-- End of mycountdown.org script -->  
			</iframe>
		</p>
	</div>
	<div id="menu">
		<ul>
			<!--li><a href="ranking/" accesskey="1" title="">Ranking</a></li-->
			<li><a href="apuesta/?hash=<?php echo $sysController->hash;?>" accesskey="2" title="">Fixture</a></li>
			<li><a href="apuesta/?do=edit&hash=<?php echo $sysController->hash;?>" accesskey="3" title="">Mi apuesta</a></li>
		</ul>
	</div>

		
	<div id="page-bg" style="border:0px solid blue">
		<div id="page-bgtop" style="border:0px solid green">
			<div id="page" class="container" style="border:0px solid red">				
