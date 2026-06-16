# 🏠 Nyumbani Manager

A **Family Expense & Contribution Management System** built with **PHP, MySQL, and Bootstrap**.

It is designed to help families track expenses, contributions, and bills in a centralized, secure, and easy-to-use system with a **modern fintech-style UI**.

---

## 🚀 Features

### 👨‍👩‍👧 Family Finance Management
- Track daily expenses
- Record family contributions
- Manage household bills

### 📊 Reports & Analytics
- Total expenses vs contributions
- Balance calculation
- Category-based expense breakdown

### 👥 User Management
- Admin and Member roles
- Role-based access control (RBAC)
- Secure session authentication

### 🔐 Security
- Session-based login system
- Admin-only privileges for sensitive actions
- Protected routes for all pages

### 🎨 UI/UX
- Modern fintech-style interface
- Glassmorphism design
- Responsive Bootstrap layout
- Dashboard-style navigation

---

## 🛠️ Technologies Used

- PHP (Core Backend)
- MySQL (Database)
- HTML5 / CSS3
- Bootstrap 5
- JavaScript (minimal enhancements)

---

## 📂 Project Structure

nyumbani-manager/
│
├── auth/
│ ├── login.php
│ ├── register.php
│ └── logout.php
│
├── expenses/
│ ├── view_expenses.php
│ ├── add_expense.php
│ └── delete.php
│
├── contributions/
│ ├── view.php
│ ├── add.php
│ └── delete.php
│
├── bills/
│ ├── view.php
│ ├── add.php
│ └── delete.php
│
├── includes/
│ ├── auth.php
│ ├── permissions.php
│ └── footer.php
│
├── reports.php
├── members.php
├── dashboard.php
└── config/db.php

---

## ⚙️ Installation Guide

### 1. Clone the repository
```bash
git clone https://github.com/yourusername/nyumbani-manager.git
2. Move project to XAMPP
C:/xampp/htdocs/nyumbani-manager
3. Create database
Open phpMyAdmin
Create database: nyumbani
4. Import tables

Import SQL file (or create tables manually):

users
expenses
contributions
bills
5. Run project
http://localhost/nyumbani-manager
👑 User Roles
Role	Permissions
Admin	Full control (add, edit, delete, manage users, view reports)
Member	Can view and add contributions
📊 Dashboard Preview
Total Expenses
Total Contributions
Balance Overview
Quick Insights Panel
💡 Future Improvements
Mobile app version (Flutter)
Expense charts (Chart.js)
Notifications system
Export reports to PDF
Cloud deployment
👨‍💻 Developer

Developed by JamilLabs

📜 License

This project is for educational and personal use. You are free to modify and improve it.