# Task Tracking System

A simple **Task Tracking System** built using the Laravel PHP framework. This application helps users manage, track, and monitor tasks efficiently within a project or organization.

---

## Features

* User authentication and authorization
* Create, edit, and delete tasks
* Assign tasks to users
* Track task status (Pending, In Progress, Completed)
* Manage project workflow
* Dashboard to view task details
* Responsive user interface

---

## Technologies Used

* PHP
* Laravel Framework
* MySQL Database
* HTML, CSS, JavaScript
* Bootstrap

---

## Installation

Follow these steps to run the project locally.

### 1. Clone the Repository

git clone https://github.com/pkssharma66/Task_Tracking_System.git

### 2. Navigate to Project Folder

cd Task_Tracking_System

### 3. Install Dependencies

composer install

### 4. Create Environment File

Copy the example environment file:

cp .env.example .env

### 5. Generate Application Key

php artisan key:generate

### 6. Configure Database

Open the `.env` file and update the database settings:

DB_DATABASE=your_database_name
DB_USERNAME=your_database_username
DB_PASSWORD=your_database_password

### 7. Run Database Migrations

php artisan migrate

### 8. Start Development Server

php artisan serve

Now open your browser and visit:

http://127.0.0.1:8000

---

## Project Structure

app/ – Application logic
routes/ – Web routes
resources/views/ – Blade templates
database/ – Migrations and seeders
public/ – Public assets

---

## Author

GitHub: https://github.com/pkssharma66

---

## License

This project is open-source and available under the MIT License.
