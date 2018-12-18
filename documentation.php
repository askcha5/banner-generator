<?php

/*
 * Project: Banner Generator
 * Author: Carlos Estevez
 * Date: August 2011
 * Version: 1.0
 * URL: http://carlosmestevez.com/banner-generator/
 * 
 * 
 * Libraries:
 *   jQuery
 *   GD
 * 
 * Classes:
 *   Banner (see classlib.php)
 * 
 * Tables:
 *   banners (see create.sql & run this after create database)
 * 
 * Setup:
 *   configuration (modify config.php with database connection info)
 * 
 * Code Specifics:
 *   jQueryUI tabs and slider for the main container
 *   jQuery core to help with event handling, manipulate DOM, AJAX calls, etc
 *   GD library methods for rendering the image
 *   jQuery color picker (hexFromRGB functionality) from the jQueryUI demo site (expanded on it)
 *   Grabbed the three functions in functions.php from different tutorial sites and expanded them
 *   The rest is custom
 * 
 * Future Releases:
 *   Font family selection
 *   Angle option for text display
 *   Gradient functionality for the background
 *   More banner sizes
 *   Multiple output options (e.g. code snippet)
 *   Multiple text lines
 *   Background image upload option
 */
?>