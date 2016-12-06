
<a href="https://github.com/DavidMirandaPR/VidStream"><img src="https://s11.postimg.org/xi3lbtylf/vidstream.png" style="max-width:100%;"></a>
<div>Logo By: <a href="https://www.facebook.com/jpegprart/">JPEG</a></div>

***
### What is VidStream?

Vidstream is a project created for our Computer Engineering class Computerized System Information in Interamerican University Bayamon Campus. It's function is to simulate Netflix's user, staff, admins, and movie content's database. It does NOT have implemented any playback functionality. No copyright was intended in the making of this project, it's purely educational.

***
### Requirements

1. PHP 7.0
2. Laravel 5.0
3. AMPPS (This includes PHP 7.0)
4. Composer
5. Internet Connection (CSS Libraries are loaded through the internet)
6. SQLite

***
### QUICK ACCESS

1. [Installation](https://github.com/DavidMirandaPR/VidStream#installation)
2. [AMPPS SETUP](https://github.com/DavidMirandaPR/VidStream#ampps-setup)
3. [Running APACHE](https://github.com/DavidMirandaPR/VidStream#running-apache)
4. [SQLite Setup](https://github.com/DavidMirandaPR/VidStream#sqlite-setup)
5. [Composer RUN](https://github.com/DavidMirandaPR/VidStream#composer-run)
6. [Logging in for Testing](https://github.com/DavidMirandaPR/VidStream#logging-in-for-testing)
7. [Getting Movie Information](https://github.com/DavidMirandaPR/VidStream#getting-movie-information)

***
### Installation

1. Install AMPPS (This includes PHP 7.0)
2. Install Composer   
	-**Note**: Installing Composer will ask you for a PHP installation file, you will have to find PHP 7.0 under AMPPS's instalation files.
3. Install Laravel using Composer with the following command in your terminal window: composer global require "laravel/installer"
4. Now unzip Vidstream's file, browse to "www" inside AMPPS's file.
5. Name the file Vidstream.tv
6. Add Vidstream.tv to the host file.
7. Add the domain in AMPPS configuration page.

***
### AMPPS Setup
<div><a href="http://ampps.com/download"><img  width="150" src="http://wp.moodgiver.com/wp-content/uploads/2015/11/ampps_social_networking.png" style="max-width:100%;"></a></div>

1. Inside AMPPS theres a house simbol, clicking it will redirect you to the local homepage of ampps.
2. Once inside "http://localhost/ampps/" you should be able to see a button labeled "Add Domain" with a globe icon and a plus sign.
3. A form to fill domain information will be shown.
4. Use "vidstream.tv" as domain.
5. The domain path should be generated when writing the domain as ".../Ampps/www/vidstream.tv".
6. At the end of the domain path you should add a "/public" and the final result should be /Ampps/www/vidstream.tv/public" since in that path is where we will be working on.

***
### Running APACHE
<div><a href="http://ampps.com/download"><img  width="150" src="http://blog.names.co.uk/wp-content/uploads/2014/01/Apache.png" style="max-width:100%;"></a></div>

1. In AMPPS you should see a Start button below the apache logo, if the server doesn't start right away click it to start it.
2. Starting the Apache server enable us to now go to a browser and write "vidstream.tv" in the address bar and should redirect you to the login page of VIDSTREAM.

***
### SQLite Setup
<div><a href="http://sqlitestudio.pl/?act=download"><img  width="150" src="https://iworkautomation.com/numbers/gfx/sqlite-logo.png" style="max-width:100%;"></a></div>

1. You can download SQLite Studio here http://sqlitestudio.pl/?act=download.
2. Follow the setup instructions and install it.

***
### Composer RUN
<div><a href="https://getcomposer.org/"><img  width="150" src="https://getcomposer.org/img/logo-composer-transparent.png" style="max-width:100%;"></a></div>

1. If you have installed composer in your computer you should be able to open a command prompt aiming to "/vidstream.tv" and run the command 'composer install' and then 'composer update' everything should run fine.

***
### Logging in for Testing

1. The framework let us create a seed so that we dont have to create an account everytime we rolled back our database.
2. It has the following properties:
	email: luis@luis
    password: luis
3. This account has an account level of 1 'Free User'

***
### Getting Movie Information
1. To add a specific movie you need to go to "http://vidstream.tv/api/v1/getinfo".
2. There should be an input box and two buttons.
3. In the input box you need to write a title of a movie THE EXACT TITLE OF THE MOVIE in order to save it to Database.
4. A message will be prompted that each movie property has been saved and the movie stored successfully.
