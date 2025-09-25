# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Development Commands

### Start Development Environment
- `composer dev` - Starts all development services (server, queue, logs, vite) concurrently
- `composer dev:ssr` - Development with SSR enabled
- `php artisan serve` - Start Laravel development server only
- `npm run dev` - Start Vite development server only

### Testing and Quality
- `composer test` - Run test suite (clears config first, then runs artisan test)  
- `php artisan test` - Run tests directly
- `npm run lint` - Run ESLint with auto-fix
- `npm run format` - Format code with Prettier
- `npm run format:check` - Check code formatting
- `npm run types` - TypeScript type checking

### Build Commands
- `npm run build` - Build for production
- `npm run build:ssr` - Build with SSR support
- `php artisan pail --timeout=0` - Real-time log monitoring

### Database
- `php artisan migrate` - Run database migrations
- `php artisan migrate --seed` - Run migrations with seeding
- Uses SQLite by default (database/database.sqlite)

### Filament Admin Panel
- Admin panel available at `/admin` route
- Uses Filament Shield for role/permission management
- Resources auto-discovered in `app/Filament/Resources`
- Pages auto-discovered in `app/Filament/Pages`
- Widgets auto-discovered in `app/Filament/Widgets`

## Architecture Overview

### Tech Stack
- **Backend**: Laravel 12 with PHP 8.2+
- **Frontend**: React 19 with TypeScript and Inertia.js
- **Admin Panel**: Filament 4 with Shield plugin for permissions
- **Authentication**: Laravel Fortify
- **Styling**: Tailwind CSS 4 with Radix UI components
- **Build Tool**: Vite 7 with Laravel Wayfinder plugin
- **Database**: SQLite (default), with queue/session/cache using database
- **Testing**: Pest PHP testing framework

### Key Directories
- `app/Filament/` - Filament admin panel resources, pages, widgets
- `app/Http/Controllers/` - Laravel controllers
- `app/Models/` - Eloquent models
- `app/Policies/` - Authorization policies
- `resources/js/` - React/TypeScript frontend code
- `resources/views/` - Blade templates
- `database/migrations/` - Database schema migrations

### Frontend Architecture
- Inertia.js bridges Laravel and React
- React components with TypeScript
- Tailwind CSS with custom component system using Radix UI
- SSR support configured
- Vite handles asset compilation with Laravel integration

### Permission System
- Filament Shield plugin provides role-based access control
- Policies in `app/Policies/` for authorization
- Permission tables managed via migrations

### Development Notes
- Uses concurrent development setup (server + queue + logs + vite)
- Environment configuration via `.env` (copy from `.env.example`)
- Auto-discovery enabled for Filament components
- Prettier and ESLint configured for code quality
- TypeScript strict mode enabled