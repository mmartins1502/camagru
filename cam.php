<?PHP require_once('head.php')?>
<br>
<div class='main app'>
	<div class='top-app'>
		<div id='top-left-app' class='webcam'>
			<!-- if camera available -->
			<video id='camera' width="100%" autoplay></video>
			<!-- else -->
			<img class='hidden' id='top-left-img' src='' alt='top-left-img' />
		</div>
		<div id='top-right-app' class='preview'>
			<!-- hidden -->
			<canvas class='hidden' id='canvas' width='' height=''></canvas>
			<!-- div for image -->
			<div id='logo' style='position:absolute;width:200px;height:200px;z-index:100;top:600px;left:0px;background:url("");background-size:cover;'>
			</div>
		</div>
    </div>
<script type='text/javascript' src='./app.js'></script>