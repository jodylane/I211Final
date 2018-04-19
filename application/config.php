<?php
/**
 * Created by PhpStorm.
 * User: Josh Lane
 * Date: 4/10/2018
 * Time: 7:12 PM
 * Description: set application settings.
 */

error_reporting(E_ALL);

date_default_timezone_set('America/New_York');

//recent: "http://localhost/I211/LibraryLending"
// base url for Josh cause he hates himself and likes to be different because he is dumb and named the repository something it wasn't supposed to be and blah...
//way to go josh
define("BASE_URL", "http://localhost/I211/LibraryLending");

// base url for everyone else please uncomment this and comment out the line above if you are anyone except josh.
//define("BASE_URL", "http://localhost:8080/I211Final");

// this is brads base url
//define("BASE_URL", "http://localhost:8888/i211/github/I211Final");

/*************************************************************************************
 *                       settings for books                                         *
 ************************************************************************************/

define("BOOK_IMG", "www/img/books/");
