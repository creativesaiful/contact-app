### Contact App   

## Table of Contents
- [Introduction](#introduction)
- [Features](#features)
- [Installation](#installation)



## Introduction
- Contact App is a web application that allows you to manage contacts and send SMS to save contracts.

## Features

 - Add Contact 
 - Edit, delete and update
 - Send SMS to save contracts
 - Filter Contact 



## Installation

To get a local copy up and running, follow these steps.

# Prerequisites

 - PHP version 7.4 or higher
 - Composer
 - MySQL
 - Node.js & NPM

# Installation

## Steps
1. Clone the repository:
```bash
git clone https://github.com/creativesaiful/contact-app.git
```

2. Navigate to the project directory:
```bash
cd contact-app
```

3. Install dependencies:
```bash
composer install
```


4. Copy .env.example to .env:
5. Create a database on your phpmyadmin or mysql server with any name. Paste the database name in .env file and configure it.

```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your-database
DB_USERNAME=your-username
DB_PASSWORD=your-password
```

6. Install NPM packages:
```bash
npm install 
npm run build
```
7. Run migrations:

```bash
php artisan migrate
```


8. Generate application key:

```bash
php artisan key:generate
```

9.  Link the storage folder:

```bash
php artisan storage:link
```

10. Run the server:

```bash 
php artisan serve
```

11. Access the application at http://localhost:8000




