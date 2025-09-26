# MDR Tours - Travel Agency Management System

A comprehensive tour and travel agency management system built with Laravel 12, React 19, and Filament 4. Features a public marketing landing page and a powerful admin dashboard for managing bookings, customers, packages, and more.

## 🌟 Features

### Public Landing Page
- **Modern Design**: Responsive React/TailwindCSS interface
- **Marketing Sections**: Hero, Featured Packages, Customer Testimonials, Photo Gallery
- **No Authentication Required**: Fully public marketing website
- **Smooth Navigation**: Section-based scrolling with clean UI

### Admin Dashboard
- **Analytics Dashboard**: Real-time statistics, booking trends, revenue charts
- **Booking Management**: Many-to-many customer-booking relationships
- **Customer Management**: Complete customer profiles with optional emergency contacts
- **Package Management**: Tour packages with pricing, descriptions, and images
- **Gallery Management**: Travel destination photos for marketing
- **Testimonials**: Customer reviews and feedback system

### Key Business Logic
- **Multi-participant Bookings**: Multiple customers can participate in a single booking
- **Payment Tracking**: Automatic calculation of remaining amounts and payment status
- **Status Workflow**: Complete booking lifecycle from pending to completed
- **Role-based Access**: Filament Shield integration for permissions

## 🚀 Tech Stack

### Backend
- **Laravel 12** with PHP 8.2+
- **PostgreSQL** database
- **Filament 4** admin panel with Shield plugin
- **Laravel Fortify** for authentication

### Frontend
- **React 19** with TypeScript
- **Inertia.js** for seamless Laravel-React integration
- **Tailwind CSS 4** with Radix UI components
- **Vite 7** with Laravel Wayfinder plugin

### Development Tools
- **Pest PHP** testing framework
- **ESLint & Prettier** for code quality
- **TypeScript** strict mode enabled

## 📦 Installation

### Prerequisites
- PHP 8.2+
- Node.js 18+
- PostgreSQL
- Composer

### Setup

1. **Clone the repository**
   ```bash
   git clone <repository-url>
   cd MDR-Tour
   ```

2. **Install dependencies**
   ```bash
   composer install
   npm install
   ```

3. **Environment setup**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. **Database configuration**
   Update your `.env` file with PostgreSQL credentials:
   ```env
   DB_CONNECTION=pgsql
   DB_HOST=localhost
   DB_PORT=5432
   DB_DATABASE=mdr-tour
   DB_USERNAME=postgres
   DB_PASSWORD=your_password
   ```

5. **Run migrations**
   ```bash
   php artisan migrate --seed
   ```

6. **Start development servers**
   ```bash
   composer dev
   ```
   Or individually:
   ```bash
   php artisan serve
   npm run dev
   ```

## 🎯 Usage

### Public Website
- Visit `http://localhost:8000` for the public landing page
- Browse packages, testimonials, and gallery
- No authentication required

### Admin Panel
- Visit `http://localhost:8000/admin` for the admin dashboard
- Create an account or use seeded admin credentials
- Manage bookings, customers, packages, and view analytics

## 📊 Database Schema

### Core Models
- **Packages**: Tour packages with pricing and details
- **Customers**: Customer information and emergency contacts
- **Bookings**: Booking records with status tracking
- **Testimonies**: Customer reviews and ratings
- **Gallery**: Marketing images with captions

### Key Relationships
- **Bookings ↔ Customers**: Many-to-many via `booking_participants` pivot table
- **Bookings → Packages**: Many-to-one relationship
- **Testimonies → Customers**: Many-to-one relationship

## 🛠️ Development Commands

### Development
```bash
composer dev          # Start all services concurrently
composer dev:ssr      # Development with SSR enabled
php artisan serve     # Laravel server only
npm run dev          # Vite dev server only
```

### Testing & Quality
```bash
composer test        # Run test suite
php artisan test     # Run tests directly
npm run lint         # ESLint with auto-fix
npm run format       # Format code with Prettier
npm run types        # TypeScript type checking
```

### Build
```bash
npm run build        # Production build
npm run build:ssr    # Build with SSR support
```

### Database
```bash
php artisan migrate           # Run migrations
php artisan migrate --seed    # Run migrations with seeding
php artisan pail --timeout=0 # Real-time log monitoring
```

## 🔧 Project Structure

```
app/
├── Filament/           # Admin panel resources, widgets, pages
│   ├── Resources/      # CRUD resources for models
│   ├── Widgets/        # Dashboard widgets
│   └── Pages/          # Custom admin pages
├── Models/             # Eloquent models
├── Http/Controllers/   # Laravel controllers
└── Policies/          # Authorization policies

resources/
├── js/                # React/TypeScript frontend
│   ├── components/    # Reusable UI components
│   ├── pages/         # Inertia.js pages
│   └── layouts/       # Page layouts
└── views/             # Blade templates

database/
├── migrations/        # Database schema migrations
└── seeders/          # Data seeders
```

## 🔐 Authentication & Authorization

- **Filament Shield**: Role-based access control for admin panel
- **Laravel Fortify**: Authentication for web routes
- **Public Access**: Landing page requires no authentication
- **Admin Access**: Protected admin panel with role permissions

## 📈 Analytics Dashboard

The admin dashboard provides comprehensive analytics including:
- Total bookings, customers, and revenue statistics
- Monthly booking and revenue trend charts
- Recent bookings overview with status tracking
- Key performance indicators with visual widgets

## 🎨 UI Components

Built with modern UI components:
- **Shadcn/ui**: High-quality React components
- **Radix UI**: Accessible component primitives
- **Tailwind CSS**: Utility-first styling
- **Responsive Design**: Mobile-first approach

## 🤝 Contributing

1. Fork the repository
2. Create a feature branch (`git checkout -b feature/amazing-feature`)
3. Commit your changes (`git commit -m 'Add amazing feature'`)
4. Push to the branch (`git push origin feature/amazing-feature`)
5. Open a Pull Request

## 📝 License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

## 🆘 Support

For support and questions:
- Check the documentation in `CLAUDE.md`
- Review the codebase structure and comments
- Open an issue for bug reports or feature requests

## 📚 Documentation

- **Laravel**: https://laravel.com/docs/12.x
- **Filament**: https://filamentphp.com/docs/4.x
- **React**: https://react.dev/
- **Inertia.js**: https://inertiajs.com/

---

Built with ❤️ for modern travel agencies seeking efficient management solutions.