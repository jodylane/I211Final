# I211Final
## Table of Contents
**[Getting Started](#getting-started)**  
**[Developer Notes](#developer-notes)**  

## Getting Started

_For Local Development_  
1) Start your local apache and mysql servers. I reccomend MAMP.
2) Open ```application/database.class.php``` in your text editor (of you choice) make sure local development credentials are correct.
2) Open ```application/config.php``` and be sure if you uncomment ```//define("BASE_URL", "http://localhost/I211Final");``` and comment out ```define("BASE_URL", "http://localhost/I211/LibraryLending");```.
4) Go to localhost://I211/I211Final/

_For Production Server_

## Developer Notes
This project requires bootstrap version ^3.3.7  
Run ```npm install``` inside your local project within terminal/command prompt to install all project dependencies.
