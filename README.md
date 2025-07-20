# 🔐 Cognito Laravel Auth System (Learning Project)

This is a **learning-based Laravel authentication system** integrated with **Amazon Cognito**. It helped me understand how to set up secure login using OAuth2 in a Laravel environment.

---

## ⚙️ Features

- 🔑 **Secure Login/Registration** – Standard Laravel login/registration with hashed passwords.
- ✉️ **Email Verification** – Email confirmation required during signup to validate users.
- 🔄 **Password Reset** – Forgot password support with tokenized email links.
- 👤 **User Profile Management** – Edit and update your profile details & password securely.
- 🔐 **OAuth via Amazon Cognito** – Seamless login using federated identity from AWS Cognito.
- 🧠 **Middleware-Protected Routes** – Restrict access to authenticated or verified users only.
- 🧩 **Laravel Migrations** – Auto database setup with `php artisan migrate`.


---

## 🛠️ Tech Stack

- **Laravel** (PHP Framework) ⚙️
- **Amazon Cognito** (OAuth2 Auth) 🔐
- **MySQL** (Database) 🗄️
- **Blade Templates** (Frontend) 🧩
- **Composer** (PHP Package Manager) 📦

---
## 📁 Project Structure

cognito/
├── app/ → Controllers, Models, Requests
├── database/ → Migrations & Seeders
├── routes/ → Route files (auth.php, web.php)
├── resources/views/ → Blade templates for UI
├── public/ → Public assets (CSS, JS, images)
├── config/ → Laravel config files
├── .env → Environment variables
├── README.md → Project documentation

---

## 🚀 How to Run

```bash
git clone https://github.com/Aadi010105/Rest-API-.git
cd Rest-API-
composer install

cp .env.example .env
php artisan key:generate

# Set your DB + Cognito credentials in .env
php artisan migrate
php artisan serve
```

## 📝 License

This project is open-sourced under the [MIT license](LICENSE).
