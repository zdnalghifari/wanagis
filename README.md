<h1 align="center">🗺️ Wanagis</h1>
<p align="center">
  <b>Laravel-based Web GIS Application</b>
</p>

<p align="center">
  <img src="https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white"/>
  <img src="https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white"/>
  <img src="https://img.shields.io/badge/Leaflet-199900?style=for-the-badge&logo=leaflet&logoColor=white"/>
  <img src="https://img.shields.io/badge/PostgreSQL-336791?style=for-the-badge&logo=postgresql&logoColor=white"/>
</p>

---

## 📌 Overview

**Wanagis** is a web-based Geographic Information System (GIS) application built with Laravel. It provides an interactive map interface for visualizing and managing spatial data, with role-based access control for administrators.

---

## ✨ Features

| Feature | Description |
|---------|-------------|
| 🗺️ Interactive Map | Leaflet-powered map for visualizing geospatial data |
| 📡 GeoJSON API | Dynamic GeoJSON endpoint for serving spatial layers |
| 📍 Point Management | Add, edit, and delete spatial points *(admin only)* |
| 👥 User Management | Role-based access control with admin privileges |
| 🔐 Authentication | Secure login system with Laravel Auth |
| ⚙️ Settings | Admin dashboard for app configuration |

---

## 🏗️ Architecture

```
wanagis/
├── app/Http/Controllers/
│   ├── DashboardController     # Main dashboard
│   ├── MapController           # Interactive map view
│   ├── GeoJSONController       # GeoJSON API endpoint
│   ├── EditPointController     # Point CRUD (admin)
│   └── UsersController         # User management (admin)
├── routes/
│   └── web.php                 # App routes
├── resources/views/            # Blade templates
└── database/                   # Migrations & seeders
```

---

## 🛣️ Routes

| Method | URL | Description | Access |
|--------|-----|-------------|--------|
| GET | `/` | Dashboard | Public |
| GET | `/map` | Interactive map | Public |
| GET | `/about` | About page | Public |
| GET | `geojson/{table}/{geom?}` | GeoJSON API | Public |
| GET | `/users` | User list | Admin |
| GET | `/settings` | App settings | Admin |
| POST | `/editpoin` | Add point | Admin |
| PATCH | `/editpoin/{poin}` | Edit point | Admin |
| DELETE | `/editpoin/{poin}` | Delete point | Admin |

---

## 🚀 Getting Started

### Prerequisites
- PHP >= 8.0
- Composer
- PostgreSQL with PostGIS extension
- Node.js & npm

### Installation

```bash
# Clone the repo
git clone https://github.com/zdnalghifari/wanagis.git
cd wanagis

# Install dependencies
composer install
npm install

# Setup environment
cp .env.example .env
php artisan key:generate

# Configure your database in .env, then run migrations
php artisan migrate --seed

# Build assets and serve
npm run dev
php artisan serve
```

---

## 🧰 Tech Stack

| Layer | Technology |
|-------|------------|
| Backend | Laravel (PHP) |
| Frontend | Blade, JavaScript, Vite |
| Map Engine | Leaflet.js |
| Database | PostgreSQL + PostGIS |
| Deployment | Vercel |

---

## 📄 License

This project is open source and available under the [MIT License](LICENSE).
