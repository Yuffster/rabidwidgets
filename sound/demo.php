<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>MooP3 Player</title>
<script type="text/javascript" src="mootools-1.2b1.js"></script>
<script type="text/javascript" src="MooSound.js"></script>

<style type="text/css">
#playlist {
	width: 95%;
	margin: auto;
}

.song {
	width: 100%;
	background-color: #f9f9f9;
	border-right: 1px solid #ccc;
	border-bottom: 1px solid #ccc;
	padding: 5px;
}

.song.playing {
	border-top: #000;
	background-color: #ff9;
}

.seekbar {
	background: #afa;
	border: 1px solid #9f9;
	height: 20px;
	width: 0%;
	cursor: pointer;
}

.position {
	left:0;
	position: relative;
	width: 1px;
	height: 20px;
	border-left: 1px solid #8f8;
	border-right: 1px solid #3f3;
}

.song h3 {
	margin: 0;
}

.controls {
	float: right;
	width: 15%;
}

.controls img {
	cursor: pointer;
}
</style>
<script type="text/javascript">

window.addEvent('domready', function() {

	var i = 0;
	var options = {
		'onRegister': function() {
			i++;
			this.el = new Element('div', {'class':'song'});
			this.title        = new Element('h3', {'class':'title', text:this.url}).inject(this.el);
			this.controls     = new Element('div', {'class':'controls'}).inject(this.el);
			this.seekbar      = new Element('div', {'class': 'seekbar'}).inject(this.el);
			this.position     = new Element('div', {'class':'position'}).inject(this.seekbar);
			this.progressFx   = new Fx.Tween(this.seekbar, 'width', {duration:this.options.progressInterval, unit:'%', link: 'cancel'});
			this.positionFx   = new Fx.Tween(this.position, 'left', {duration:this.options.positionInterval, unit:'%', link: 'cancel'});
			this.playEl       = new Element('img', {'class':'play',  src:'img/play.png',id:'play'+i }).inject(this.controls);
			this.stopEl       = new Element('img', {'class':'stop',  src:'img/stop.png',id:'stop'+i }).inject(this.controls);
			this.pauseEl      = new Element('img', {'class':'pause', src:'img/pause.png',id:'pause'+i}).inject(this.controls);
			this.stopEl.addEvent('click', function() { this.stop(); }.bind(this));
			this.playEl.addEvent('click', function() { this.start(); }.bind(this));
			this.pauseEl.addEvent('click', function() { this.pause(); }.bind(this));
			this.seekbar.addEvent('click', function(e) {
				var coords = this.seekbar.getCoordinates();
				var ms = ((e.page.x - coords.left)/coords.width)*this.duration;
				this.jumpTo(ms);
			}.bind(this));
			this.el.inject($('playlist'));
		},
		'onLoad': function() { },
		'onPause': function() { },
		'onPlay': function() { this.el.addClass('playing');    },
		'onStop': function() { this.el.removeClass('playing'); },
		'onProgress': function(loaded, total) {
			var percent = (loaded / total*100).round(2);
			this.progressFx.start(percent * .85);
		},
		'onPosition': function(position,duration) {
			var percent = (position/duration*100).round(2);
			this.positionFx.start(percent);
		},
		'onID3': function(key, value) {
			if (key == "TIT2") { this.title.set('text', value); }
		},
		'onComplete': function() {
			Playlist.playRandom.delay(100, Playlist);
		}
	};

	//Note: I have some funky file serving going on in my widgets app, which means that
	//the filesize isn't readily accessible.  So it bugs out a bit in the official demo.
	//You can try it at home for better luck.

	var songs = ["mp3s/robot2.mp3"]; //I only have one mp3. ;_; (But you can add more!)

	Playlist.loadSounds(songs, options);
	$('play').addEvent('click', function(e) {
		e.stop();
		Playlist.playRandom(); //Hm, I wonder what it will end up being.
	});

});


</script>
</head>

<body>
<div id="controls"><a href="#" id="play">Play Random</a></div>
<p>Note: The loading of this mp3 is a little strange in the official demo because of the way my widget application serves files.  There's no definitive bytesLoaded to work from, so the code makes do with what it has.</p>
<div id="playlist"></div>
</body>
</html>
