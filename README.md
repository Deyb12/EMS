# Employee Management System (EMS)

An Employee Management System built with **PHP, MySQL, HTML, CSS, JavaScript, and Bootstrap**.  
It helps organizations manage employee records, project assignments, salary tracking, and leave applications through a centralized web-based platform.

---

## 🚀 Features

- **Admin Panel**
  - Add, view, update, and delete employees
  - Assign projects and track their status
  - Manage employee leaves
  - Salary management (view and update salary table)
  - Leaderboard for employee performance points

- **Employee Panel**
  - Employee login & profile management
  - View assigned projects
  - Apply for leave
  - Change password
  - Track leave history and status

- **General Pages**
  - Homepage
  - About Us
  - Contact Page
  - Login (Admin & Employee)

---

## 🛠️ Tech Stack

- **Frontend:** HTML, CSS (Bootstrap 4, custom styling), JavaScript (jQuery)
- **Backend:** PHP
- **Database:** MySQL
- **Additional:** FontAwesome, Google Fonts, Datepicker, Select2

---

## 📂 Project Structure

```
E/
├── aboutus.html        # About us page
├── addemp.php          # Add employee form (Admin)
├── alogin.html         # Admin login
├── aloginwel.php       # Admin dashboard
├── applyleave.php      # Employee leave application
├── assign.php          # Assign project form
├── assignproject.php   # Project status view
├── changepassemp.php   # Employee password change
├── contact.html        # Contact page
├── process/            # Contains PHP scripts for DB operations
├── css/                # Stylesheets
├── vendor/             # External libraries (datepicker, select2, etc.)
├── assets/             # Images, icons, avatars
└── ... (other support files)
```

---

## ⚙️ Installation & Setup

1. **Clone the repository**
   ```bash
   git clone <repo-url>
   ```

2. **Setup database**
   - Import the provided SQL file into your MySQL server.
   - Update database credentials in `process/dbh.php`.

3. **Run the project**
   - Place the project in your local server directory (e.g., `htdocs` for XAMPP).
   - Start Apache and MySQL.
   - Open in browser:
     ```
     http://localhost/EMS/E/index.html
     ```

---

## 🔑 Default Credentials (example)

- **Admin Login**
  - Email: `admin@example.com`
  - Password: `admin123`

- **Employee Login**
  - Created upon adding a new employee via admin panel.

---

## 👨‍💻 Team

- **Project Manager:** Dave Fagarita  
- **Backend Developers:** Arc Nil Absalon, Julian Anthony Aguirre  
- **Frontend Developer:** Jimuel Servandil  
- **Analyst:** Cember Mae Paborada  

---

## 📜 License

This project is for **educational purposes only**.  
You may modify and use it for learning or practice.
