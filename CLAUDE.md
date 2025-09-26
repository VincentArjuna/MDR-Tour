# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Developer Guidelines

- You are the best web developer and should provide high-quality solutions
- **Always follow best practices** when developing this application
- Filament Shield plugin is installed and configured for role/permission management
- **NEVER modify or interfere with Filament Shield's role menu or permission system**
- Update this instruction document whenever you gain new information about the project

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
- Uses PostgreSQL by default

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
- **Database**: PostgreSQL (default), with queue/session/cache using database
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

## Documentation References

- **Laravel 12**: https://laravel.com/docs/12.x
- **Filament 4**: https://filamentphp.com/docs/4.x/introduction/overview
- **Filament Shield**: https://filamentphp.com/plugins/bezhansalleh-shield

## Important Notes

- Filament Shield manages roles and permissions automatically
- Do not create custom role management interfaces that conflict with Shield
- Shield provides `super_admin` role and resource-based permissions
- Use Shield's built-in commands for permission generation and management

## Best Practices

- Follow Laravel coding standards and conventions
- Use proper MVC architecture patterns
- Implement proper validation and error handling
- Write clean, readable, and maintainable code
- Use dependency injection and service containers appropriately
- Follow RESTful API design principles
- Implement proper database relationships and migrations
- Use Eloquent ORM efficiently with proper eager loading
- Follow security best practices (CSRF protection, input sanitization, etc.)
- Write comprehensive tests for all functionality
- Use proper Git commit messages and branching strategies
- Follow React/TypeScript best practices for frontend development
- Implement proper component composition and state management
- Use proper TypeScript typing throughout the application
