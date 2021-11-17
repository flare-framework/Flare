# Flare Framework
Made by Sajjad Eftekhari![](https://manbaenab.ir/uploads/Flare.png)
## What is Flare?

Flare is a PHP full-stack web framework that is light, fast, flexible, and secure.
More information can be found at the [official site](https://manbaenab.ir/Flare).

This repository holds the distributable version of the framework.

## Important Change with index.php

`index.php` is no longer in the root of the project! It has been moved inside the *public* folder,
for better security and separation of components.

This means that you should configure your web server to "point" to your project's *public* folder, and
not to the project root. A better practice would be to configure a virtual host to point there. A poor practice would be to point your web server to the project root and expect to enter *public/...*, as the rest of your logic and the
framework are exposed.


## Server Requirements

PHP version 8 or higher is required, with the following extensions installed:


### --------------------------------------------- Flare Framework ---------------------------------
## How to install
### you can use composer or download from https://github.com/flare-framework/Flare/releases
### composer create-project flare-framework/flare mysite
# Flare built with a number of powerful and fast packages with other important features
### for env https://github.com/vlucas/phpdotenv
### for  Router and Controllers and Middlewares.i use https://github.com/izniburak/php-router
https://github.com/izniburak/php-router/wiki
### for $db and Model
###  https://github.com/ThingEngineer/PHP-MySQLi-Database-Class
### https://github.com/ThingEngineer/PHP-MySQLi-Database-Class/blob/master/dbObject.md
### for View http://platesphp.com/
### and
### for session https://odan.github.io/session/v5/
### for email https://github.com/PHPMailer/PHPMailer
### for validation  https://respect-validation.readthedocs.io/en/latest/
### for upload https://github.com/verot/class.upload.php
### for debug https://tracy.nette.org/en/guide

