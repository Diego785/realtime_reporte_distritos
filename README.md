# Real-Time District Form Tracking

Dashboard that tracks which school districts have completed each form, with progress that updates live on every open screen.

Built for the Departmental Directorate of Education of Santa Cruz, Bolivia. Related system: [blog_dde_sc](https://github.com/Diego785/blog_dde_sc), the Directorate's complaints and news platform.

## Context

Built in October 2024 as a full-stack developer and systems consultant for the Directorate, so it could follow district responses to its forms in real time.

## Features

- **Forms list** with search, a link to each form and its progress bar.
- **District view per form.** Every school district with its status and observations, filterable by status.
- **Live updates.** Progress changes are broadcast through a Socket.IO server, so every connected dashboard updates at once, without reloading.
- Sign-in and user accounts with Jetstream.

## Tech stack

Laravel 11 · Livewire 3 · Jetstream · Tailwind CSS · Vite · Node.js · Express · Socket.IO · MySQL

## How it works

Forms and districts are linked through a pivot table that stores each district's status and observations. A Livewire component dispatches progress updates to the browser, the browser sends them to a small Node.js Socket.IO server (`public/socket-server`), and the server broadcasts them to every connected client, which updates its Livewire state.

## Run locally

```bash
composer install
npm install && npm run dev
cp .env.example .env        # set your MySQL credentials
php artisan key:generate
php artisan migrate --seed  # seeds districts and sample forms
php artisan serve

# Socket server, in another terminal
cd public/socket-server && npm install && npm start   # listens on port 3001
```

## Author

Diego Hurtado Vargas · [GitHub](https://github.com/Diego785) · [LinkedIn](https://www.linkedin.com/in/diegohurtadovargas/)
