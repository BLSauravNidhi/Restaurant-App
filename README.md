<p align="center"><a href="" target="_blank"><img src="https://ibb.co/BHnP2qgL" width="400" alt="App Logo"></a></p>

# 🍽️ QR-Based Restaurant Ordering & Management System

A modern restaurant management system built with **Laravel**, **Livewire**, **MySQL**, and **Tailwind CSS**. The application enables customers to scan a QR code at their table, access the digital menu securely, place orders, and allows restaurant staff to manage operations through dedicated dashboards.

---

## ✨ Features

### 👥 Customer

- Scan QR code to request table access
- Waiter approval workflow
- Secure table session with expiration
- Session join code for multiple customers at the same table
- Browse menu by category
- Add items to cart
- Place orders
- View order status

---

### 🧑‍💼 Waiter Dashboard

- View incoming table access requests
- Approve or reject customer requests
- Manage active table sessions
- Monitor customer orders
- Assist tables efficiently

---

### 👨‍🍳 Kitchen Dashboard

- View newly placed orders
- Update order status
- Track preparation progress
- Real-time order management

---

### 👨‍💻 Admin Dashboard

- Dashboard overview
- Manage menu categories
- Manage menu items
- Manage restaurant tables
- Manage staff accounts
- Monitor restaurant activity

---

## 🔐 Security

- QR-based table access
- Waiter approval before customer access
- Session-based authentication
- Session expiration
- Protected routes using Laravel Middleware
- Secure session tokens
- Session join code for multi-device access

---

## ⚙️ Tech Stack

| Technology | Purpose |
|------------|----------|
| Laravel | Backend Framework |
| Livewire | Real-time Components |
| MySQL | Database |
| Tailwind CSS | Styling |
| Blade | Templating |
| JavaScript | Frontend Interactions |
| Git | Version Control |

---

## 🗄️ Database

The application uses a relational MySQL database with foreign key relationships.

Main tables include:

- users
- roles
- tables
- table_requests
- table_sessions
- categories
- menu_items
- carts
- cart_items
- orders
- order_items

---

## 🚀 Workflow

### Customer Flow

```
Scan QR
      │
      ▼
Request Table Access
      │
      ▼
Waiter Approval
      │
      ▼
Session Created
      │
      ▼
Enter Join Code (if session already exists)
      │
      ▼
Browse Menu
      │
      ▼
Add Items to Cart
      │
      ▼
Place Order
      │
      ▼
Kitchen Receives Order
```

---

## 📂 Project Structure

```
app/
├── Http/
├── Livewire/
├── Models/
├── Services/

resources/
├── views/
├── css/
├── js/

database/
├── migrations/
├── seeders/

routes/
├── web.php
```

---

## 📸 Screenshots

> Screenshots.



```
screenshots/

├── customer-menu.png
├── admins
    ├── waiter-dashboard.png
    ├── kitchen-dashboard.png
    ├── admin-dashboard.png
```

---

## 💻 Installation

Clone the repository

```bash
git clone git@github.com:BLSauravNidhi/Restaurant-App.git
```

Move into the project

```bash
cd Restaurant-App
```

Install dependencies

```bash
composer install

npm install
```

Create environment file

```bash
cp .env.example .env
```

Generate application key

```bash
php artisan key:generate
```

Configure your database inside `.env`

Run migrations

```bash
php artisan migrate
```

(Optional)

```bash
php artisan db:seed
```

Run the application

```bash
php artisan serve

npm run dev
```

---

## 🎯 Future Improvements

- Online payment integration
- Customer authentication
- Reservation system
- Sales analytics
- Invoice generation
- Push notifications
- WebSocket-based real-time updates
- Multi-restaurant support

---

## 📄 License

This project is created for learning and portfolio purposes.

---

## 👤 Author

**Your Name**

GitHub: https://github.com/BLSauravNidhi

LinkedIn: https://www.linkedin.com/in/bl-saurav-nidhi-a9217a338/