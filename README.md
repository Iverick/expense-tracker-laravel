## About This App

Expense tracker application allows registered users to store and view their everyday expenses.
App made fo educational purposes.

This app was deployed on heroku. Visit the following [URL](http://expense-tracker-laravel.herokuapp.com/) to open it.

User credetials
| User email | Password |
| --- | --- |
| esco@example.com | qwerty123 |


#### Run it on local machine

Just a remainder of steps you need to do to run it locally
- You need to have the following dependencies already installed on our machine
    - `PHP==7.4.1`
    - `composer==2.0.7`
    - `git`
    - `mysql`
    - `yarn=1.22.11`

The next steps are following:
- Clone from the git repo
  `git clone https://github.com/Iverick/expense-tracker-laravel`
- CD into the app folder
  `cd expense-tracker-laravel`
- Install dependencies
  `composer install`
- Install Javascript dependencies
  `yarn install`
- Run yarn dev script to initialize laravel-ui authentication scaffolding
  `yarn dev`

I used a cloud `cleardb` mysql engine for the development, but could also use a local instance of DB.
