# CodeIgniter 4 Application Starter For Studies or Reseach Only!!!
# Laundry App With Multiuser Using CodeIgniter4 v.4.3.1 and Bootstrap AdminLTE v.3.2.0

## What is CodeIgniter?

CodeIgniter is a PHP full-stack web framework that is light, fast, flexible and secure.
More information can be found at the [official site](https://codeigniter.com).

This repository holds a composer-installable app starter.
It has been built from the
[development repository](https://github.com/codeigniter4/CodeIgniter4).

More information about the plans for version 4 can be found in [CodeIgniter 4](https://forum.codeigniter.com/forumdisplay.php?fid=28) on the forums.

The user guide corresponding to the latest version of the framework can be found
[here](https://codeigniter4.github.io/userguide/).

## Installation & updates

`composer create-project codeigniter4/appstarter` then `composer update` whenever
there is a new release of the framework.

When updating, check the release notes to see if there are any changes you might need to apply
to your `app` folder. The affected files can be copied or merged from
`vendor/codeigniter4/framework/app`.

## Setup

Copy `env` to `.env` and tailor for your app, specifically the baseURL
and any database settings.

## Important Change with index.php

`index.php` is no longer in the root of the project! It has been moved inside the *public* folder,
for better security and separation of components.

This means that you should configure your web server to "point" to your project's *public* folder, and
not to the project root. A better practice would be to configure a virtual host to point there. A poor practice would be to point your web server to the project root and expect to enter *public/...*, as the rest of your logic and the
framework are exposed.

**Please** read the user guide for a better explanation of how CI4 works!

## Repository Management

We use GitHub issues, in our main repository, to track **BUGS** and to track approved **DEVELOPMENT** work packages.
We use our [forum](http://forum.codeigniter.com) to provide SUPPORT and to discuss
FEATURE REQUESTS.

This repository is a "distribution" one, built by our release preparation script.
Problems with it can be raised on our forum, or as issues in the main repository.

## Server Requirements

PHP version 7.4 or higher is required, with the following extensions installed:

- [intl](http://php.net/manual/en/intl.requirements.php)
- [mbstring](http://php.net/manual/en/mbstring.installation.php)

Additionally, make sure that the following extensions are enabled in your PHP:

- json (enabled by default - don't turn it off)
- [mysqlnd](http://php.net/manual/en/mysqlnd.install.php) if you plan to use MySQL
- [libcurl](http://php.net/manual/en/curl.requirements.php) if you plan to use the HTTP\CURLRequest library

## How To Install this Repository?

- First, make sure you already install the `Git` app.
- Open the `xampp/htdocs` folder in `Visual Studio Code` then clone this repository using command line `git clone git@github.com:ansdyi/ci4_laundry_multiuser.git`.
- Open a database server like `phpmyadmin` or any kind of database server app, and make a database with name `ci4_laundry_mu`. Then import `ci4_laundry_mu.sql` file, from folder with name `database` in this repository.
- Try with call the url `localhost/[nameoffolder]/public` and if you have a problem with error line like `Warning: require(D:\xampp\htdocs\test\ci4_laundry_multiuser\app\Config/../../vendor/codeigniter4/framework/system\bootstrap.php): failed to open stream: No such file or directory in D:\xampp\htdocs\test\ci4_laundry_multiuser\public\index.php on line 38` that means you have to install vendor package with command line `composer require codeigniter4/framework` then `composer update`. Then try to refresh the url.
- Last, if you have a problem when click button `Generate PDF Report` and the pdf didn't automatically download or any kind of warning error, that means you have to install `tcpdf` with command line `composer require tecnickcom/tcpdf`.

## User and Permission

- Role as Admin
  - username: admin
  - password: admin

- Role as Kasir
  - username: kasir
  - password: kasir

- Role as Owner
  - username: owner
  - password: owner

## Credit

This app was developed by `Anisa Damayanti, S.Kom`.

`Copyright 2023 All Rights Reserved`.
