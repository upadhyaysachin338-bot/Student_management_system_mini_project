Student Management System:

A simple and user-friendly **Student Management System** built using **PHP and MySQL**. The system provides an admin panel for managing student records efficiently through a web-based interface.

Project Overview:

The Student Management System is designed to simplify the process of storing and managing student information.

Instead of maintaining student records manually, administrators can use this web application to perform common operations such as

* Adding new students
* Viewing student records
* Editing existing student information
* Deleting student records
* Managing administrator access

The project was developed as a **mini project / academic project** to demonstrate practical implementation of PHP, MySQL, CRUD operations, authentication, and web development concepts.

Features

# Admin Authentication

* Admin login system
* Admin account creation
* Logout functionality
* Protected dashboard access

# Student Management

* Add new student records
* View all students
* Edit student information
* Delete student records

# Database Management

* MySQL database integration
* Structured student records
* SQL database file included for easy setup

# User Interface

* Clean and simple admin dashboard
* Responsive styling
* Easy-to-use navigation

# Deployment

* Dockerfile included
* Can be configured for cloud deployment
* Suitable for deployment platforms that support Docker

# Tech Stack

  Technology   -> Purpose  
  PHP          -> Backend development 
  MySQL        -> Database            
  HTML5        -> Page structure      
  CSS3         -> Styling             
  Docker       -> Deployment          
  Git & GitHub -> Version control    

# Project Structure
Student_management_system_mini_project/
│
├── config/
│    database.php
│
├── css/
│    stylesheets
│
├── add_student.php
├── create_admin.php
├── dashboard.php
├── delete_student.php
├── edit_student.php
├── index.php
├── login.php
├── logout.php
├── students.php
│
├── student_management_system.sql
├── Dockerfile
└── README.md

# How to Run Locally

# 1. Clone the repository

```bash
git clone https://github.com/upadhyaysachin338-bot/Student_management_system_mini_project.git
```

# 2. Open the project

If you are using **XAMPP**, place the project folder inside:

```text
C:\xampp\htdocs\
```

The final path should look similar to:

```text
C:\xampp\htdocs\Student_management_system_mini_project
```

# 3. Start XAMPP

Open XAMPP and start:

* Apache
* MySQL

# 4. Create the database

Open **phpMyAdmin** and create/import the database using:

```text
student_management_system.sql
```

The SQL file included in this repository contains the database structure required by the application.

# 5. Configure database connection

Open:

```text
config/database.php
```

Update the database credentials according to your local MySQL configuration.

Example:

```php
$host = "localhost";
$user = "root";
$password = "";
$database = "student_management_system";
```

# 6. Run the application

Open your browser and visit:

```text
http://localhost/Student_management_system_mini_project/
```

# Docker Deployment

This project also includes a **Dockerfile** for containerized deployment.

The Docker setup can be used to deploy the PHP application on a compatible cloud platform or run it locally using Docker.

{**Note:** The application requires a MySQL database. When deploying to the cloud, the database connection must be configured using the credentials provided by your database service.}

# Screenshots

# Login Page

<img width="1919" height="1079" alt="Login" src="https://github.com/user-attachments/assets/f1456f0b-a023-4b8a-8c81-99244134a7d6" />

# Admin Dashboard

<img width="1919" height="1079" alt="Dashboard" src="https://github.com/user-attachments/assets/3e76a87a-b754-4fa3-b746-89dce5fd3c02" />

# Student Records

<img width="1919" height="1079" alt="View Student" src="https://github.com/user-attachments/assets/6cf5b3bd-be30-4d36-b6f8-902188e9dbbf" />

# Add Student

<img width="1919" height="1079" alt="Add student" src="https://github.com/user-attachments/assets/05672b8d-cc09-4075-8cc4-7caaa873df92" />

# Project Objectives

The main objectives of this project are:

1. To develop a web-based student record management system.
2. To implement CRUD operations using PHP and MySQL.
3. To understand database connectivity in PHP.
4. To implement a basic admin authentication system.
5. To understand the structure of a real-world web application.
6. To learn Git and GitHub for source-code management.
7. To understand basic application deployment using Docker.

# CRUD Operations

The system implements the fundamental CRUD operations:

 Operation   ->Description              
 **Create**  ->Add a new student        
 **Read**    ->View student records     
 **Update**  ->Edit student information
 **Delete**  ->Remove student records   

# Future Improvements

Some features that can be added in future versions:

* Student profile pages
* Search and filtering
* Pagination
* Attendance management
* Marks and result management
* Student photo upload
* Role-based authentication
* Password hashing and improved security
* Export student records to PDF/Excel
* Improved responsive UI
* Cloud database integration

# Learning Outcomes

Through this project, I learned and practiced:

* PHP fundamentals
* MySQL database management
* PHP-MySQL connectivity
* CRUD operations
* Authentication
* HTML and CSS
* Git and GitHub
* Basic Docker usage
* Web application deployment

# Author

**Sachin Upadhyay**

Student | Computer Science & Engineering

GitHub:
https://github.com/upadhyaysachin338-bot

## 📄 License

This project is created for **educational and academic purposes**.
