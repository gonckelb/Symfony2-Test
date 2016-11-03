#Symfony dev testing the database

A simple web application for managing diving center with Doctrine and a MySQL database, with user management FosUSerBundle

#How to install

Clone the repository to your wamp installation, usually in C:/Wamp/www

Once you have cloned the repo, you MUST install Composer (http://symfony.com/doc/current/cookbook/composer.html)

When you are ready, open the console, go to your project directory and enter the folowing:

php installer

php composer.phar install

#Installing doctrine

php app/console doctrine:database:create

php app/console doctrine:schema:update -f

#Creating admin user

php app/console fos:user:create

php app/console fos:user:promote

username: the admin username
role: ROLE_ADMIN

