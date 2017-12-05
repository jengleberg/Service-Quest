# Service Quest Task Management System

Service Quest is a Task Management app built with Laravel 5.5.  

## Installation

* $ git clone https://github.com/jengleberg/Service-Quest.git 
* $ cd Service-Quest
* $ composer install
* $ composer update
* $ copy .env.example to .env
* $ php artisan key:generate
* If you use MYSQL in .env file :
 * set DB_CONNECTION
 * set DB_DATABASE
 * set DB_USERNAME
 * set DB_PASSWORD
* edit .env files for email configuration

## Features

* Dashboard Page with task archives
* Authentication
 * registration, login, logout, password reset, admin users
* Layouts with nested components
* Task Creation
* Task Notes with user history
* Task List
* Task Resolution
* Emails sent to user when task is created, updated and closed

## Workflow and Code Features

[Trello User Stories](https://trello.com/b/xNHjNO9r/project-4-guest-task-management-system-in-laravel)

### Web Routes

![](https://i.imgur.com/gNcz2wT.png)

### scopeFilter and archive public function on Task Model

![](https://i.imgur.com/rAoQ0LD.png)





