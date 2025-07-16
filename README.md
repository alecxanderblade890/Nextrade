# Nextrade

**Nextrade** is a web application marketplace where users can barter items with one another—no money required! Users can list items they wish to trade, browse available items, and connect with others to arrange swaps. Nextrade is built with Laravel and Blade, but is much more than a boilerplate: it’s a platform for community-driven bartering.

---

## About Nextrade

Nextrade is designed for people who want to exchange goods directly. Whether you have something you no longer need or are looking for a specific item, Nextrade helps you find barter partners in your community.

### Key Features (Initial Commit)
- User registration and login (Laravel Auth)
- Add new items for barter
- View item details
- Basic security and middleware setup
- Database migrations and seeders included

### Roadmap
- Social authentication (Google, Facebook, etc.)
- Messaging between users
- Barter offer system
- User profiles
- Item categories and search
- Admin panel

---

## Getting Started

### Prerequisites
- PHP >= 8.1
- Composer
- Node.js & npm

### Installation
1. Clone the repository:
   ```bash
   git clone <your-repo-url>
   cd nextrade
   ```
2. Install PHP dependencies:
   ```bash
   composer install
   ```
3. Install Node dependencies:
   ```bash
   npm install
   ```
4. Copy the example environment file and configure as needed:
   ```bash
   cp .env.example .env
   ```
5. Generate application key:
   ```bash
   php artisan key:generate
   ```
6. Run database migrations and seeders (if needed):
   ```bash
   php artisan migrate --seed
   ```

### Building Assets
- Build assets for production:
  ```bash
  npm run build
  ```
- Or start the development server:
  ```bash
  npm run dev
  ```

### Running the Application
- Start the local PHP server:
  ```bash
  php artisan serve
  ```
- Visit the URL provided in the terminal (e.g., http://127.0.0.1:8000)

## Roadmap
- Social authentication (Google, Facebook, etc.)
- Messaging between users
- Barter offer system
- User profiles
- Item categories and search
- Admin panel

### Premium Partners

- **[Vehikl](https://vehikl.com)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Redberry](https://redberry.international/laravel-development)**
- **[Active Logic](https://activelogic.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
