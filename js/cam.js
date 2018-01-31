(function() {
	
	  var streaming = false,
		video        = document.querySelector('#camera'),
		//   cover        = document.querySelector('#cover'),
		canvas       = document.querySelector('#canvas'),
		//   photo        = document.querySelector('#photo'),
		context = canvas.getContext('2d'),
		startbutton  = document.querySelector('#startbutton'),
		width = 820,
		height = 0;
	
	  navigator.getMedia = ( navigator.getUserMedia ||
							 navigator.webkitGetUserMedia ||
							 navigator.mozGetUserMedia ||
							 navigator.msGetUserMedia);
	
	  navigator.getMedia(
		{
		  video: true,
		  audio: false
		},
		function(stream) {
		  if (navigator.mozGetUserMedia) {
			video.mozSrcObject = stream;
		  } else {
			var vendorURL = window.URL || window.webkitURL;
			video.src = vendorURL.createObjectURL(stream);
		  }
		  video.play();
		},
		function(err) {
		  console.log("An error occured! " + err);
		}
	  );
	
	  video.addEventListener('canplay', function(ev){
		if (!streaming) {
		  height = video.videoHeight / (video.videoWidth/width);
		  video.setAttribute('width', width);
		  video.setAttribute('height', height);
		  canvas.setAttribute('width', width / 2);
		  canvas.setAttribute('height', height / 2);
		  streaming = true;
		}
	  }, false);
	
	  function takepicture() {
		context.drawImage(video, 0, 0, width / 2, height / 2);
		var data = canvas.toDataURL('image/png');
		// canvas.setAttribute('src', data);
		var	tmp = new Image();
		tmp.src = data;

		var rootURI = '/' + location.pathname.split('/')[1];
		var xml = new XMLHttpRequest();
		xml.open('POST', rootURI + '/saveimg.php');
		xml.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
		xml.send("filter=" + document.querySelector('input[name="filter"]:checked') + "&data=" + data);
		// xml.send(JSON.stringify(data));
		xml.onload = function()
		{
			var response = xml.responseText;
			canvas.src = response;
			console.log(response);
		}		
	  }
	
	  vid_button.addEventListener('click', function(ev){
		  takepicture();
		// ev.preventDefault();
	  }, false);
	
	})();