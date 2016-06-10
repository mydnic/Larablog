[![Stories in Ready](https://badge.waffle.io/mydnic/Larablog.png?label=ready&title=Ready)](https://waffle.io/mydnic/Larablog)
# Larablog

This project aims to achieve a full-featured personnal website / blog.

This is an open source project, if you'd like to participate and/or use it, enjoy :)

Demo : http://mydnic.be

# Installation
## Vagrant
If you are used to vagrant, just clone this repository and run <code>vagrant up</code>.
Once the script is finished, you should be up and running!

Visit http://localhost:4567 to see the website

A phpMyAdmin is available at http://localhost:4568

Username = user (or root)

Password = pass

## Classic
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

If any problem with the classical installation, please refer to the official Laravel documentation.
