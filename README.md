# Service Quest Task Management System

Service Quest is a Task Management app built with Laravel version 5.5.  

## Features

* Dashboard Page with task archives
* Authentication
 * registration, login, logout, password reset, admin users
* Emails sent to user when task is created, updated and closed
* Layouts with nested components
* Task Creation
* Task Notes with user history
* Task List with pagination
* Task Resolution
* Closed Task Archive
* Form Validation

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

## Usage

1. Register as a user which will log you in and take you to the dashboard.
![](https://i.imgur.com/CnM7XNT.png)

2. From the Dashboard view open your open tasks, create a new task or view closed tasks based on month and year.
![](https://i.imgur.com/RQbIUe8.png)

3. Creating a new task, fill in the fields (all required using form validation).  A success message will appear after posting.
![](https://i.imgur.com/oSbXcu6.png)

4. Task list is where you can view all open tasks, add a note to a task or close a task.
![](https://i.imgur.com/taQTEmg.png)


## Workflow and Code Features

[Trello User Stories](https://trello.com/b/xNHjNO9r/project-4-guest-task-management-system-in-laravel)

### Web Routes

![](https://i.imgur.com/gNcz2wT.png)

### scopeFilter and archive public function on Task Model

![](https://i.imgur.com/rAoQ0LD.png)





