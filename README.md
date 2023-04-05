# mindcup

Thanks for viewing the mindcup repository.

mindcup is a private-social-media website that focuses on users input related to mental thoughts, ideas and brainstorming.

## getting started
If you wish to run the project locally, please install the following:

1. xampp, i'm building out the database using myphpadmin
2. PHP, script in <?php echo phpversion() ?> to find out which php version
3. an IDE (I'm using VSCode)
4. access to phpmyadmin

The project uses Bootstrap which is loaded via CDN

Contact me if you're having issues with running this project locally.

## project structure

- public ( files that the public can access )
  - css ( styles )
  - js ( javascript )
  - page ( page content that we serve to the browser )
    - account ( account related views )
      - index.php
      - login.php.. etc
    - and so on...
- src ( private source code )
  - functions ( our reusable and sharable php code )
    - constants.php
    - database.php
    - includes.php
    - sessions.php
  - service ( our service files that contain CRUD functions and business logic, one service file belongs to an entire page's folder )
    - account.php ( in relation to page/account/ and all of that folder's files for example )
  - vendor ( our third party code, like Sentiment )

## how the code flows

the .htaccess file located at public/.htaccess routes all traffic to the index.php file located at public/index.php.
this gives us a single entry point to handle routing ourselves.

within the public/index.php file, you'll find four (4) includes:

- includes.php
- header.php
- route.php
- footer.php

the includes file gives us access to our constants, sessions and whatever else we may want to add later

the header file contains the beginning html markup for all webpages

the route file handles pulling in files we want to serve based on the URL provided

the footer file contains the ending html markup for all webpages

the part we really care about is how the route.php file works with the public/index.php file. 
this route.php file serves us the page contents in a specific way

## route.php

we define an array with key/value pairs. the key is our expected folder/file path obtained from the URL and the value is the file location.
for example: 'home/index' => 'home/index.php'

'home/index' is the string we will obtain from the URL

'home/index.php' is the actual file we want to serve

1. get_route() is a user defined function where we parse the URL to obtain the folder/filename so it matches a key within our array of key/value pairs. we also check the folder/filename formatting in this function and serve back a 404 http response (not found) if the folder/filename isn't formatted correctly. for example, if someone only supplies 'account/' instead of 'account/login', we will kick them to the curb with a 404

2. next, we check if the folder/filename is a key in our array. if it doesn't exist we serve our favorite dish of 404, if it does exist, we simply require the file which is then displayed in the browser
