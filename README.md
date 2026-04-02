## L9STK — Laravel 9 Starter Kit

- Version: v9.52.21
- PHP: 8.2.30
---

#### About

L9STK is a Laravel-based starter kit that implements a **modular monolith** approach.

Each functional unit (e.g., CRUD) is encapsulated as a module.  
The goal is to simplify and speed up development of typical business features while keeping the codebase structured and scalable.

---

### Why Modular Monolith

- Avoid over-engineering (microservices)
- Keep codebase structured as it grows
- Enable feature-level isolation
- Simplify reuse and refactoring

---

#### Install

- `git clone ...`
- copy `.env.example` to `.env` and configure it
- `composer update`
- `php artisan migrate`
- `php artisan db:seed`
- `php artisan ide-helper:models`
- `npm install`
- `npm run dev`
- open in browser `http://l9stk.loc`

---

### Quick Start (Create Module)

1. Copy the reference module:
   `app/Modules/Example → app/Modules/Post`

2. Rename:
    - Namespace: `Example → Post`
    - ServiceProvider
    - Routes / Controllers / Requests

3. Register ServiceProvider in:
   `config/app.php`

4. (Optional) Add frontend assets to `webpack.mix.js`

5. Run:
    - `php artisan migrate`
    - `npm run dev`

Module is ready.

---

### Integration Points

To connect a module:

- Register module ServiceProvider in `config/app.php`
  - Routes are loaded via `loadRoutes()`
  - Views are loaded via `loadViews()`
  - Migrations are loaded via `loadMigrations()`
- Integrate module views into application layout (e.g., cabinet layout)
- Frontend assets should be added to `webpack.mix.js`

---

### Example Endpoints

Cabinet:
- `GET /cabinet/example`

Ajax:
- `GET /cabinet/example/ajax/entities`
- `POST /cabinet/example/ajax/entities`

API:
- (reserved for external API endpoints, see `routes/api.php`)

---

#### Module Structure

```
app/Modules/Example/
 ├── Http/
 │    ├── Controllers/
 │    │     ├── Api/
 │    │     ├── Cabinet/
 │    │     │    └── Ajax/
 │    │     └── Web/
 │    │          └── Ajax/
 │    └── Requests/
 │          ├── Cabinet/
 │          │    └── StoreEntityRequest.php
 │          └── Web/
 │
 ├── Models/
 ├── Providers/
 │    └── ExampleServiceProvider.php
 │
 ├── Repositories/
 ├── Services/
 ├── database/
 │    ├── migrations/
 │    ├── factories/
 │    └── seeders/
 │
 ├── resources/
 │    ├── cabinet/
 │    │     ├── css/app.css
 │    │     ├── img/
 │    │     └── js/app.js
 │    │
 │    └── views/
 │         └── cabinet/
 │              └── example.blade.php
 │
 └── routes/
      ├── api.php
      ├── cabinet.php
      └── web.php
```

---

### Modules

- All modules are located in: `app/Modules`
- `app/Modules/Example` — reference module (recommended as a starting point)

You can copy or adapt it to create new features without rethinking architecture.

---

### Principles

- Each module is a **self-contained functional unit**
- Modules are **isolated but not strictly separated**
- New features should preferably be implemented as modules
- Legacy (non-modular) code can coexist with modules without conflicts

---

### What the module provides

- Structured and scalable architecture
- Encapsulated routing
- Isolated views and assets
- ServiceProvider-based integration
- DI-ready controllers

---

### Limitations

- No auto-discovery (manual ServiceProvider registration required)
- No strict module boundaries (shared code still possible)
- Frontend integration requires manual configuration

---

### Roadmap

- Module auto-discovery
- Dynamic webpack configuration
- Provider auto-registration

---

### Notes

The current implementation uses an `Ajax` layer as an internal API for UI interactions.

In production-grade systems, it is recommended to use more abstract naming, such as:
- `InternalApi`
- `UiApi`

to avoid coupling with a specific transport mechanism.
