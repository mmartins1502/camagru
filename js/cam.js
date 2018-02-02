(function () {

	var streaming = false,
		video = document.querySelector('#camera'),
		//   cover        = document.querySelector('#cover'),
		canvas = document.querySelector('#canvas'),
		//   photo        = document.querySelector('#photo'),
		context = canvas.getContext('2d'),
		startbutton = document.querySelector('#startbutton'),
		width = 620,
		height = 0,
		ciel = document.getElementById('ciel'),
		dog = document.getElementById('dog'),
		demon = document.getElementById('demon'),
		unicorn = document.getElementById('unicorn'),
		divFlot =  document.getElementById('drag'),
		tab = [ciel, dog, demon, unicorn],
		mousePosition,
		offset = [0,0],
		isDown = false;
	


//////////////////////////////////////////////COMPATIBILITY BROWSER///////////////////////////////////////////



	navigator.getMedia = (navigator.getUserMedia ||
		navigator.webkitGetUserMedia ||
		navigator.mozGetUserMedia ||
		navigator.msGetUserMedia);
	


//////////////////////////////////////////////VIDEO STREAM///////////////////////////////////////////




	navigator.getMedia({
			video: true,
			audio: false
		},
		function (stream) {
			if (navigator.mozGetUserMedia) {
				video.mozSrcObject = stream;
			} else {
				var vendorURL = window.URL || window.webkitURL;
				video.src = vendorURL.createObjectURL(stream);
			}
			video.play();
		},
		function (err) {
			console.log("An error occured! " + err);
		}
	);

		


//////////////////////////////////////////////SELECT FACE FILTER///////////////////////////////////////////



	tab.forEach((elem) => {
		console.log(elem)
		elem.addEventListener('click', () => {
			console.log(divFlot)
			divFlot.innerHTML = `<img id='img-drag' src=${elem.src} width='70%' />`;
			console.log(divFlot)
		})
	})
	


//////////////////////////////////////////////DRAG FACE FILTER///////////////////////////////////////////



	document.addEventListener('mousedown', function(e) {
		isDown = true;
		console.log('divFlot.offsetLeft', divFlot.offsetLeft);
		console.log('e.clientX', e.clientX);		
		var area = document.getElementById('area');
		var camera = document.getElementById('camera');
		console.log(area.offsetHeight);
		offset = [
			divFlot.offsetLeft - e.clientX,
			divFlot.offsetTop - e.clientY
		];
	}, true);
	
	document.addEventListener('mouseup', function() {
		isDown = false;
	}, true);
	
	document.addEventListener('mousemove', function(event) {
		event.preventDefault();
		if (isDown) {
			if (event.clientX <= 480 && event.clientX >= 50 && event.clientY <= 440 && event.clientY >= 200) {
				mousePosition = {
					
								x : event.clientX,
								y : event.clientY
					
							};
			}
			divFlot.style.left = (mousePosition.x + offset[0]) + 'px';
			divFlot.style.top  = (mousePosition.y + offset[1]) + 'px';
		}
	}, true);
	


/////////////////////////////////////////////////////////////////////////////////////////



	video.addEventListener('canplay', function (ev) {
		if (!streaming) {
			height = video.videoHeight / (video.videoWidth / width);
			video.setAttribute('width', width);
			video.setAttribute('height', height);
			canvas.setAttribute('width', width);
			canvas.setAttribute('height', height);
			streaming = true;
		}
	}, false);
	


//////////////////////////////////////////////TRIGGER PIX & RERESH 4 LAST PIX///////////////////////////////////////////



	function takepicture() {
		context.drawImage(video, 0, 0, width, height);
		var data = canvas.toDataURL('image/png');
		// canvas.setAttribute('src', data);
		var tmp = new Image();
		tmp.src = data;

		var rootURI = '/' + location.pathname.split('/')[1];
		var xml = new XMLHttpRequest();
		xml.open('POST', rootURI + '/saveimg.php');
		xml.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
		xml.send("filter=" + document.querySelector('#img-drag').src + "&data=" + data + "&top=" + document.querySelector('#drag').style.top + "&left=" + document.querySelector('#drag').style.left);
		xml.onload = function () {
			var response = xml.responseText;
			canvas.src = response;
			var photo1, photo2, photo3;
			photo1 = document.getElementById(0);
			photo2 = document.getElementById(1);
			photo3 = document.getElementById(2);
			var container = document.getElementById('bottom');
			response = "<img class='preview' id='0' width='20%' src='" + response + "'/>";
			photo1 = "<img class='preview' id='1' width='20%' src='" + photo1.src + "'/>";
			photo2 = "<img class='preview' id='2' width='20%' src='" + photo2.src + "'/>";
			photo3 = "<img class='preview' id='3' width='20%' src='" + photo3.src + "'/>";
			container.innerHTML = response + photo1 + photo2 + photo3;
		}
	}

	vid_button.addEventListener('click', function (ev) {
		takepicture();
		ev.preventDefault();
	}, false);

})();