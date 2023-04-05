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
    - account.php ( in relation to page/account/filename.php for example )
  - vendor ( our third party code, like Sentiment )


