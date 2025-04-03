# Univer Tech - College Management System

## 📌 Project Description
Univer Tech is a web-based college management system that streamlines student and staff management. It allows administrators to manage courses, student registrations, and staff details while providing students with access to course information.

## 🚀 Features
- **User Authentication**: Separate login for Admin, Staff, and Students.
- **Admin Panel**:
  - Manage staff, students, and courses.
  - Control staff salaries.
  - Edit and delete users.
  - View system analytics and reports.
- **Staff Panel**:
  - Add new courses to the database.
  - Manage student details.
  - Assign students to specific courses.
- **Student Panel**:
  - View available courses.
  - Cannot edit personal details.
  - Check academic performance and grades.
- **Database Management**: MySQL database using XAMPP.
- **Responsive UI**: Built with HTML, CSS, JavaScript.
- **Secure System**: Implements password hashing and input validation.

## 🛠 Technologies Used
- **Frontend**: HTML, CSS, JavaScript
- **Backend**: PHP
- **Database**: MySQL (XAMPP Server)

## ⚡ Installation Guide
1. Install [XAMPP](https://www.apachefriends.org/download.html) and start **Apache** and **MySQL**.
2. Clone this repository:
   ```sh
   git clone https://github.com/yourusername/univer-tech.git
   ```
3. Move the project folder to `htdocs` (inside XAMPP directory).
4. Open **phpMyAdmin** and create a database named `univer_tech`.
5. Import the `database.sql` file into the created database.
6. Configure the database connection in `config.php`:
   ```php
   $conn = new mysqli('localhost', 'root', '', 'univer_tech');
   ```
7. Open your browser and visit:
   ```
   http://localhost/univer-tech/
   ```

## 🔑 Default Admin Credentials
- **Username**: `admin`
- **Password**: `admin123`

## 📸 Screenshots
(Add screenshots of your project here if available)

## 🏆 Future Enhancements
- Implement student fee management.
- Add email notifications for student registrations.
- Create a mobile-friendly version.
- Implement a role-based permission system for different user levels.

## 🤝 Contributing
Feel free to fork this project and contribute by submitting pull requests.

## 📜 License
This project is licensed under the MIT License.