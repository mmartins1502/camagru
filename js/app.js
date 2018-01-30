// Grab elements, create settings, etc.
var video = document.querySelector('#camera');
// Elements for taking the snapshot
var canvas = document.querySelector('#canvas');
var context = canvas.getContext('2d');
//dimension canvas
var canvasWidth = video.offsetWidth;
var canvasHeight = Math.floor(canvasWidth / 1.33);
//hidden img
var topLeftIMG = document.querySelector('#top-left-img');
var returnIMG = document.querySelector('#return-img');
// Webcam active ou pas
var webcam = true;
// div logo
var div = document.querySelector('#logo');
//filters
var filters = document.querySelectorAll('.filter');

// Get access to the camera!
if (navigator.mediaDevices && navigator.mediaDevices.getUserMedia()) {
	if (!navigator.getUserMedia()) { //Browser compatibility
		navigator.getUserMedia = navigator.getUserMedia || navigator.webkitGetUserMedia || navigator.mozGetUserMedia || navigator.msGetUserMedia;
	}
	// Not adding `{ audio: true }` since we only want video now
	if (navigator.getUserMedia) {
		navigator.getUserMedia({video: true}, function(stream){
			//set canvas size
			canvas.setAttribute('width', canvasWidth);
			canvas.setAttribute('height', canvasHeight);
			//canvas.classList.remove('hidden');
			video.src = window.URL.createObjectURL(stream);
			video.play();
		}, isNoWebcam());
	}
}

var data = {
	'img' : null,
	'size' : {
		'width' : canvasWidth,
		'height' : canvasHeight
	},
	'logo' : {
		'name' : '',
		'x' : '',
		'y' : ''
	},
	'filter' : ''
};

[].forEach.call(photos, function (single) {
	single.addEventListener('click', function () {
		data.logo.name = single.classList[2]; //name of object
	})
});

[].forEach.call(filters, function (single) {
	single.addEventListener('click', function () {
		data.filter = single.classList[2]; //name of filter
	})
});

function isNoWebcam(error) {
	webcam = false;
	console.log('An error occured:' + error);
	document.querySelector('#tab-upload').classList.remove('hidden');
	document.querySelector('#no-camera').classList.remove('hidden');
	video.classList.add('hidden');
	document.querySelector('#no-camera').addEventListener('change', function (e) {
		var imgType = (e.target.files[0].name.split('.')).pop().toLowerCase();
		var allowedTypes = ['png', 'jpg', 'jpeg', 'gif'];
		if (allowedTypes.indexOf(imgType) != -1) {
			var file = e.target.files[0];
			var reader = new FileReader();
			reader.addEventListener('load', function (e) {
				data.img = reader.result;
				topLeftIMG.classList.remove('hidden');
				topLeftIMG.src = data.img;
			});
			reader.readAsDataURL(file);
		}
	});
}