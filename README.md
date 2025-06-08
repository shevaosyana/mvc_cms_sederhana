# Simple CMS with Custom MVC Framework

A simple Content Management System built with a custom MVC (Model-View-Controller) framework.

## Project Structure
```
mvc_cms_sederhana/
├── app/
│   ├── controllers/
│   ├── models/
│   ├── views/
│   └── config/
├── public/
│   ├── index.php
│   ├── css/
│   ├── js/
│   └── images/
└── core/
    ├── Controller.php
    ├── Model.php
    ├── Database.php
    └── Router.php
```

## Features
- Custom MVC Framework
- User Authentication
- Content Management
- Basic CRUD Operations

## Setup Instructions
1. Clone the repository
2. Configure database settings in `app/config/database.php`
3. Import database schema from `database/schema.sql`
4. Start your local server
5. Access the application through your web browser

## Requirements
- PHP 7.4 or higher
- MySQL 5.7 or higher
- Apache/Nginx web server