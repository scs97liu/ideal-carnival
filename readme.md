# Diabeasy

Installation documentation revision date: Feburary 2nd 2017

## Required Tools
- [PHP](http://php.net/downloads.php)
- [Composer](https://getcomposer.org/)
- [Node/NPM](https://nodejs.org/en/) 
- Gulp (install globally with `npm install -g gulp`)

## Installation Steps

*Run all commands from the project root*

1. Clone repo into directory
2. Copy .env.example and name it .env
3. Install PHP prerequisites - `composer install`
4. Create application key - `php artisan key:generate`
5. Install NPM prerequisites - `npm install`
6. Copy theme folder into the root project directory
7. Grab necessary things from the theme - `gulp`
