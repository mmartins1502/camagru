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

	navigator.getMedia = (navigator.getUserMedia ||
		navigator.webkitGetUserMedia ||
		navigator.mozGetUserMedia ||
		navigator.msGetUserMedia);

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

	
	tab.forEach((elem) => {
		console.log(elem)
		elem.addEventListener('click', () => {
			console.log(divFlot)
			divFlot.innerHTML = `<img id='drag' src=${elem.src} width='70%' />`;
			console.log(divFlot)
		})
	})

	divFlot.addEventListener('mousedown', function(e) {
		isDown = true;
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
			mousePosition = {
	
				x : event.clientX,
				y : event.clientY
	
			};
			divFlot.style.left = (mousePosition.x + offset[0]) + 'px';
			divFlot.style.top  = (mousePosition.y + offset[1]) + 'px';
		}
	}, true);

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
		xml.send("filter=" + document.querySelector('input[name="filter"]:checked') + "&data=" + data);
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