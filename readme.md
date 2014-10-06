## Larablog

This project aims to achieve a full-featured personnal website / blog.
The technology used are Laravel Framework 4.2.* and AngularJS.

This is an open source project, if you'd like to participate and/or use it, enjoy :)

# Installation
1. Git clone this repo
2. run <code>composer install</code>
3. at the root, create <code>.env.local.php</code> file and insert the following lines

```php
<?php

return [
    'DB_NAME' => 'your_database_name',
    'DB_USERNAME' => 'your_database_user_name',
    'DB_PASSWORD' => 'your_database_password',
];

```

4. run <code>php artisan migrate</code>
5. run <code>php artisan db:seed</code>