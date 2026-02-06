# Laravel Backend Winsale Inventory AI System

This is the backend API for the **Sales AI Dashboard**, acting as the intermediary between:

- **React Frontend**
- **Python AI Service**
- **MySQL Database**

It handles sales, products, authentication, and all requests forwarded to the Python service.

---

## 🚀 Current Features
- REST API for Sales and Products
- Laravel + Sanctum authentication 
- API endpoints connecting to Python AI service:
  - `/api/ai/forecast`
  - `/api/ai/insights`
  - `/api/ai/anomalies`
- Eloquent relationships (Sales ↔ Product)

---

## 🔧 Technologies Used
- Laravel 11+
- PHP 8.2+
- MySQL
- Axios (React → Laravel)
- GuzzleHTTP (Laravel → Python)

---

## ⚙️ Installation

### 1️⃣ Clone the repo
```bash
git clone <repo_url>
cd laravel-backend
```
2️⃣ Install dependencies
```bash
composer install

````
3️⃣ Copy environment file
```bash
cp .env.example .env

````
4️⃣ Generate application key
```bash
php artisan key:generate

````
5️⃣ Configure your .env
DB_DATABASE=sales_ai
DB_USERNAME=root
DB_PASSWORD=

🗄️ Migrate database
```bash
php artisan migrate
php artisan db:seed

````
▶️ Run the server
```bash
php artisan serve

````
---

## 🏗️ Planned Features
These will be added later as the system grows:

### 📊 **Historical AI Data Storage**
- Save AI insights into a `insights_history` table
- Save detected anomalies into an `anomalies_history` table
- Save forecasts for weekly/monthly reporting

### 🧠 **Scheduled AI Tasks**
- Daily automatic insights
- Weekly forecast job
- Email alerts when anomalies detected

### 🧼 **Admin Dashboard**
- Logs viewer
- Sales performance analytics
- Product ranking visualizations

## Inventory 
-Pagination and search

---
## Screenshots

<img width="1873" height="890" alt="image" src="https://github.com/user-attachments/assets/da4ce828-b45a-48dd-b957-a3b44d9ea722" />
<img width="1887" height="882" alt="image" src="https://github.com/user-attachments/assets/c67d3232-9faa-4b4c-986e-d6aac6dea89d" />

<img width="1867" height="886" alt="image" src="https://github.com/user-attachments/assets/e500aa69-914e-40c9-93c4-a6b836ccffe8" />
<img width="1880" height="897" alt="image" src="https://github.com/user-attachments/assets/0783f959-8578-4de5-8c67-704f31242592" />
<img width="1886" height="897" alt="image" src="https://github.com/user-attachments/assets/6a9cd8c3-006f-408b-b95b-bad05bae6c9a" />
<img width="1888" height="905" alt="image" src="https://github.com/user-attachments/assets/bc859843-e9e3-48ef-93ef-61b06f382849" />
