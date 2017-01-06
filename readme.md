# Project Discontinued

I will no longer actively work on Larablog as there are many Laravel based CMS that are far most advanced than this repo.

I wanted to work on a theming feature but it required too much change in the laravel default structure. I'll leave this repo open and you are most welcomed to open issues, I will still work on them if needed.

# Larablog

This project aims to achieve a full-featured personnal website / blog.

This is an open source project, if you'd like to participate and/or use it, enjoy :)

Demo : http://mydnic.be

# Installation

1. Git clone this repo
2. run <code>composer install</code>
3. at the root, create <code>.env</code> file and insert the following lines

```
APP_ENV=local
APP_DEBUG=true
APP_KEY=

DB_HOST=localhost
DB_DATABASE=larablog
DB_USERNAME=root
DB_PASSWORD=

```

4. run <code>php artisan key:generate</code>
5. Edit Database info in .env file
6. Create the database and run <code>php artisan migrate</code>
7. run <code>php artisan db:seed</code>
7. run <code>php artisan serve</code> and visit http://localhost:8000/

If any problem with the installation, please refer to the official Laravel documentation.
