# mindcup

Thanks for viewing the mindcup repository.

mindcup is a private-social-media website that focuses on users input related to mental thoughts, ideas and brainstorming.

## getting started
If you wish to run the project locally, please install the following:

1. xampp, i'm building out the database using myphpadmin
2. PHP, script in <?php echo phpversion() ?> to find out which php version
3. an IDE (I'm using VSCode)

The project uses Bootstrap which is loaded via CDN

Contact me if you're having issues with running this project locally.

## pipeline

high-level pipeline:

- AI for sentiment analysis
- develop ux for user input
- design and implement *thought-types*
- develop user to user interactions
- UI updates

## known issues

- PHP BOM issue
- database and database tables could use renaming

## database

- phpmyadmin

- db: users_db

    - tables: users
        - id, pk
        - email, unique
        - user_name, unique
        - password_sh, varchar(255 length) this is a hash
        - date, timestamp
        
    - tables: thoughts
        - id, pk
        - user_id, bigint
        - thought, varchar(200)
        - date, timestamp
