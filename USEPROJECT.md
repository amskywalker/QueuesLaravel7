# Getting Started

*  Clone this repo with
```
  git clone https://github.com/adailtonmoura/QueuesLaravel7.git
```
* Run 
```
  composer install
```

```
  npm install
```

```
  create a database
```

* Configure the .env file
```
QUEUE_CONNECTION=database

MAIL_MAILER=smtp
MAIL_HOST=smtp.googlemail.com
MAIL_PORT=465
MAIL_USERNAME=your email
MAIL_PASSWORD=your password
MAIL_ENCRYPTION=ssl
MAIL_FROM_ADDRESS=your email
MAIL_FROM_NAME="${APP_NAME}"
```

* Generate your migrations
```
    php artisan migrate
```

Run
```
  php artisan key:generate
```

Open Routes files and run 
```
  php artisan serve
```

