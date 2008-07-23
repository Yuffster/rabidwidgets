Rabid Ratings v1.22
========================

RabidRatings is a simple but eye-caching ratings system which allows users to your website to rate virtually anything.

Installation is easy--simply tell the PHP script how to connect to your database and include the PHP tag where you want to have a ratable item, and everything else is done for you.

Best of all: **it's free**.  Install it today and make your boss think you're brilliant.

What's So Special?
------------------------

Most AJAX ratings widgets use star and half-star images with mouse over events on each star. RabidRatings uses a reverse alpha-transparent PNG as a background image to achieve infinitely complex precision (ie, 1.23 stars) and robust visual effects with a very low overhead.

Dependencies
------------------------

PHP4 or above, MooTools 1.2.

License
------------------------

Copyright (c) 2007, 2008 Michelle Steigerwalt <http://msteigerwalt.com>.
Released under LGPL 2.1 <http://creativecommons.org/licenses/LGPL/2.1/>.

Credits
------------------------

The hearts are from the Sweetie icon pack <http://sweetie.sublink.ca/>.
I've included my modified Photoshop file in for those who want to use it.

This plugin utilizes and comes packaged with the MooTools JavaScript framework.
This version of the plugin requires MooTools version 1.2.
You can build a custom download to meet your needs at <http://www.mootools.net>.

Everything else created by Michelle Steigerwalt <http://msteigerwalt.com>.

Installation
------------------------

### Upload Files to Your Web Directory

Upload all the files to your website.  This example assumes the following structure:

* ratings.php   - Main PHP file. 
* js/ratings.js - Main JavaScript file.
* styles/ratings.css - CSS file.
* styles/img/hearts.png - Image file.

### Database Configuration

The only necessary configuration is the database connection details.  RabidRatings will automatically create the necessary database tables, assuming they don't already exist.  Go into the ratings.php file and modify the following line to configure your database:

    /* Database Connection Options */
	$this->dbHost     = "localhost";      //The host to connect to.
	$this->dbUser     = "username";       //The username to login as.
	$this->dbPassword = "secret";         //The database password.
	$this->dbDatabase = "myDatabase";     //The database to utilize.

Usage
------------------------

Place the following code at the top of every page you want to use this script on:

    <?php require_once("ratings.php"; $rr = new RabidRatings(); ?>

Wherever you want to show a ratings div, use the following code (replace "anotherGreatArticle" with a **unique key** for your item.

    <?php $rr->showStars("anotherGreatArticle"); ?>

You must remember to include the JavaScript file and the CSS file after the inclusion of the MooTools framework in the `<head>` section of your document, like so:

	   <head>
	       <script src="js/mootools-v1.2.js"></script>
	       <script src="js/ratings.js"></script>
	       <link rel="stylesheet" href="styles/ratings.css" />
	   </head>

> **NOTE**: This script requires a strict doctype (unless you don't care about IE users).
>
> Make sure you include the following line at the top of your HTML:
>
>	  <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
>	     "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

Options
------------------------

There are also several options available to you in the ratings.js file, primarily pertaining to the way the widget will be displayed.  The options are as follows:

* url (string): The URL of the voting backend to make the AJAX request to.
* snap (int): The fraction of stars to snap to (1 selects either a whole star or no star, .5 selects half stars, 0 lets the user rate by the percentage.)

### Advanced Options

These advanced options should only be used when creating a new star theme (see below for more information).

* stars (int): How many stars are in the scale.
* leftMargin (int): The width in pixels of the space in the stars image before the stars are visible.
* starWidth (int): The width in pixels of the width of each star in the image.
* starMargin (int): The width in pixels of the margin between stars.

Customizing the Theme
------------------------

Below is an enlarged breakdown of the default RabidRatings theme image.

![Diagram of the default rating theme.](img/hearts-diagram.png)

Note that the area *within* the hearts is transparent, and the area outside of the hearts is the background of the page.  If the background of your layout is not white, you'll need to open the hearts.psd file and modify the color overlay on Layer 4 to match your background needs.

Also note the large amount of space around the image, which does not effect the final display.  This is because the stars image is lined up along the center line of the image.

You can customize the theme by creating your own PNG image and modifying the ratings.css stylesheet.  You will also have to modify this section of ratings.js to change the default display options:

    window.addEvent('domready', function() {
		var rating = new RabidRatings({url:'ratings.php'});
	});
	
Turns into:

    window.addEvent('domready', function() {
		var rating = new RabidRatings({
			url:'ratings.php',
			leftMargin: 0,
			starWidth:15,
			starMargin:0,
			stars:10
		});
	});

Also, you'll have to change this line in the PHP backend to modify the number of stars (if you're not using the default value of 5):

     $this->stars    = 5; //It's a five star scale.

Turns into:

	 $this->stars    = 10; //It's a ten star scale.

Changelog
------------------------

* Added position: relative to the CSS to counter bug in IE when using getPosition().

Known Issues
------------------------

* Static update of star width (with JS disabled) is not as accurate as the JS-updated star width.  This is because the PHP script does not have access to advanced star settings (starWidth, starMargin, etc).
