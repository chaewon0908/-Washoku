# Washoku — Japanese Restaurant Website

A modern Japanese restaurant web application built with Laravel 11. Features an online menu, bento builder, shopping cart, user authentication, a **Washoku Food Advisor** chatbot for menu help and recommendations, and an admin panel for managing orders and menu items.

## Features

- **Menu System** - Browse menu items by categories (with calorie info per dish)
- **Bento Builder** - Create custom bento boxes
- **Shopping Cart** - Add items and manage your order
- **Washoku Food Advisor** - Free rule-based chatbot for food recommendations, budget/calorie filters, and FAQ answers (hours, delivery, payment, etc.)
- **User Authentication** - Register, login, and manage your account
- **Customer Dashboard** - View order history
- **Admin Panel** - Manage menu items and process orders
- **Store Locator** - Find restaurant locations
- **Contact Page** - Get in touch with the restaurant
- **Responsive Design** - Built with Tailwind CSS and Alpine.js

## Requirements

- **PHP** >= 8.2
- **Composer** (PHP dependency manager)
- **Node.js** >= 18.x (for frontend assets)
- **npm** or **yarn**
- **MySQL** (optional - SQLite is used by default)

## Installation

### Step 1: Clone the Repository

```bash
git clone <your-repository-url>
cd -Washoku
```

### Step 2: Install PHP Dependencies

```bash
composer install
```

### Step 3: Install Node.js Dependencies

```bash
npm install
```

### Step 4: Environment Setup

Create your environment file by copying the example:

```bash
copy .env.example .env
```

If `.env.example` doesn't exist, create a new `.env` file with the following content:

**For SQLite (Simple - No database server needed):**

```env
APP_NAME="Japanese Restaurant"
APP_ENV=local
APP_KEY=
APP_DEBUG=true
APP_URL=http://localhost:8000

LOG_CHANNEL=stack
LOG_LEVEL=debug

DB_CONNECTION=sqlite
DB_DATABASE=database/database.sqlite

SESSION_DRIVER=file
SESSION_LIFETIME=120

CACHE_STORE=file
QUEUE_CONNECTION=sync
```

**For MySQL:**

```env
APP_NAME="Japanese Restaurant"
APP_ENV=local
APP_KEY=
APP_DEBUG=true
APP_URL=http://localhost:8000

LOG_CHANNEL=stack
LOG_LEVEL=debug

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=japanese_restaurant
DB_USERNAME=root
DB_PASSWORD=

SESSION_DRIVER=file
SESSION_LIFETIME=120

CACHE_STORE=file
QUEUE_CONNECTION=sync
```

### Step 5: Generate Application Key

```bash
php artisan key:generate
```

### Step 6: Database Setup

Choose **ONE** of the following options:

---

#### Option A: SQLite (Simple - Recommended for local development)

No database server needed! Just create an empty file:

```bash
# On Windows (PowerShell)
New-Item -Path "database/database.sqlite" -ItemType File -Force

# On Windows (Command Prompt)
type nul > database\database.sqlite

# On Mac/Linux
touch database/database.sqlite
```

Then run migrations:

```bash
php artisan migrate --seed
```

To populate estimated calorie values for menu items (optional but recommended for the Food Advisor and menu cards):

```bash
php artisan db:seed --class=MenuItemCalorieSeeder
```

---

#### Option B: MySQL

**1. Install MySQL** (if not already installed):
- Download from: https://dev.mysql.com/downloads/mysql/
- Or use XAMPP: https://www.apachefriends.org/
- Or use Laragon: https://laragon.org/ (recommended for Windows)

**2. Start MySQL Server**

If using XAMPP, open XAMPP Control Panel and click "Start" on MySQL.

**3. Create the database:**

Open MySQL command line or phpMyAdmin and run:

```sql
CREATE DATABASE japanese_restaurant;
```

Or via command line:

```bash
mysql -u root -p -e "CREATE DATABASE japanese_restaurant;"
```

**4. Update your `.env` file** with MySQL settings:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=japanese_restaurant
DB_USERNAME=root
DB_PASSWORD=your_password_here
```

**5. Run migrations and seeders:**

```bash
php artisan migrate --seed
php artisan db:seed --class=MenuItemCalorieSeeder
```

---

### Step 7: Build Frontend Assets

For development (with hot reload):

```bash
npm run dev
```

For production:

```bash
npm run build
```

## Running the Application

### Start the Development Server

Open **two terminal windows**:

**Terminal 1** - Start the Laravel server:

```bash
php artisan serve
```

**Terminal 2** - Start the Vite development server (for CSS/JS hot reload):

```bash
npm run dev
```

The application will be available at: **http://localhost:8000**

## Project Structure

```
-Washoku/
|-- app/
|   |-- Http/Controllers/    # Application controllers (incl. FoodAdvisorController)
|   |-- Models/              # Eloquent models
|   |-- Services/            # FoodAdvisorService (chatbot recommendation engine)
|-- database/
|   |-- migrations/          # Database migrations
|   |-- seeders/             # Database seeders
|   |-- database.sqlite      # SQLite database file (if using SQLite)
|-- public/
|   |-- images/              # Public images
|-- resources/
|   |-- css/                 # Stylesheets (incl. Food Advisor styles)
|   |-- js/                  # JavaScript files
|   |-- views/               # Blade templates
|       |-- partials/food-advisor.blade.php  # Chat widget UI
|-- routes/
|   |-- web.php              # Web routes
|   |-- api.php              # API routes (cart, checkout, food advisor)
|-- storage/                 # Application storage
```

## Database Schema

| Table | Description |
|-------|-------------|
| `users` | User accounts (customers & admins) |
| `categories` | Menu categories |
| `menu_items` | Menu items with prices and calories |
| `orders` | Customer orders |
| `order_items` | Items in each order |

## Washoku Food Advisor (Chatbot)

A **free, rule-based** food recommendation chatbot — no OpenAI, Gemini, or paid AI APIs.

### What it does

- Recommends dishes from your real menu based on category, budget, calories, dietary preferences, and spice level
- Answers common questions (hours, delivery, payment, catering, menu overview)
- Supports follow-up actions: **Something else**, **Lower price**, **Lower calories**
- Skips irrelevant questions for drinks and desserts (no seafood/spice prompts)
- Shows recommendation cards with price, calories, add-to-cart, and view links

### Tech stack

| Category | What we used | Purpose |
|----------|--------------|---------|
| **Backend** | PHP 8.2 + Laravel 11 | API route, controller, service layer |
| **Recommendation engine** | Custom PHP (`FoodAdvisorService`) | Rule-based matching — keywords, regex, filters, scoring (no AI) |
| **Database** | Eloquent ORM + MySQL/SQLite | Reads live `menu_items` (price, calories, category) |
| **API** | Laravel JSON route + `fetch()` | `POST /api/food-advisor/recommend` |
| **Frontend UI** | Alpine.js | Chat state, messages, quick replies, open/close |
| **Templates** | Blade | `food-advisor.blade.php` widget markup |
| **Styling** | Tailwind CSS + custom CSS | Chat bubbles, cards, chips in `app.css` |
| **Build tool** | Vite | Bundles frontend assets |
| **Auth (optional)** | Laravel session | Uses logged-in user for past-order hints |

**Not used:** OpenAI, Gemini, Claude, BotMan, Livewire Chat, or any paid chatbot/AI SDK.

### How it works

| Layer | Technology |
|-------|------------|
| Backend engine | `app/Services/FoodAdvisorService.php` — keyword parsing, filters, scoring |
| API | `POST /api/food-advisor/recommend` via `FoodAdvisorController` |
| Frontend | Alpine.js chat widget in `resources/views/partials/food-advisor.blade.php` |
| Data source | `menu_items` table (name, price, calories, category) |

### Try it

1. Start the app (`php artisan serve` + `npm run dev`)
2. Open any page — click the **"Ask me!"** chat button (bottom-right)
3. Use the wizard (category → budget → …) or type freely, e.g. `spicy ramen under 400`

## User Roles

- **Customer** - Can browse menu, place orders, view order history
- **Admin** - Can manage menu items and process orders

## Main Routes

| URL | Description |
|-----|-------------|
| `/` | Home page |
| `/menu` | Menu categories |
| `/bento-builder` | Custom bento builder |
| `/cart` | Shopping cart |
| `/login` | User login |
| `/register` | User registration |
| `/dashboard` | Customer dashboard |
| `/admin` | Admin panel |
| `/stores` | Store locations |
| `/contact` | Contact page |
| `/faq` | FAQ page |
| `POST /api/food-advisor/recommend` | Food Advisor chatbot API (JSON) |

## Common Commands

```bash
# Clear application cache
php artisan cache:clear

# Clear view cache
php artisan view:clear

# Clear all caches
php artisan optimize:clear

# Reset database (WARNING: deletes all data)
php artisan migrate:fresh --seed
```

## Troubleshooting

### "Class not found" errors
```bash
composer dump-autoload
```

### Database errors
```bash
php artisan migrate:fresh --seed
```

### CSS/JS not loading
Make sure the Vite server is running:
```bash
npm run dev
```

### MySQL connection refused
- Make sure MySQL server is running
- Check your `.env` file has correct credentials
- Try `127.0.0.1` instead of `localhost` for DB_HOST

### `npm` blocked in PowerShell (Windows)

If you see a script execution policy error, either:

```powershell
cd -Washoku
npm.cmd install
```

Or run `npm install` from **Command Prompt** instead of PowerShell.

Always run `npm` commands from the project folder (`-Washoku`), not from `C:\WINDOWS\system32`.

### Permission errors (storage folder)
```bash
# On Mac/Linux
chmod -R 775 storage bootstrap/cache
```

## License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

## Developers

Check out the `/developers` page to meet the team behind this project!

---

Made with Laravel 11, Tailwind CSS, and Alpine.js