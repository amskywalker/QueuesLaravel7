# Queues Laravel 7
Laravel queues provide a unified API across a variety of different queue backends, such as Beanstalk, Amazon SQS, Redis, or even a relational database. Queues allow you to defer the processing of a time consuming task, such as sending an email, until a later time. Deferring these time consuming tasks drastically speeds up web requests to your application.

The queue configuration file is stored in config/queue.php. In this file you will find connection configurations for each of the queue drivers that are included with the framework, which includes a database, Beanstalkd, Amazon SQS, Redis, and a synchronous driver that will execute jobs immediately (for local use). A null queue driver is also included which discards queued jobs.

Text for Laravel Documentation for more acess [Laravel Documentation](<https://laravel.com/docs/>)

# Important

Whenever you need to modify your queue settings use the command:

```
    php artisan queue:restart
```

# Getting Start
    
```
    run  npm install
```

The queues are formats for tasks that will are store at the location you define, in this example we will use the database for store our queues, and we will send email (gmail), for send email google you need active the [Step Verification](https://myaccount.google.com/signinoptions/two-step-verification/enroll-welcome)

With the project created, you must configure your database to work with queues.
```
    php artisan queue:table
```

Configure the .env file
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

Mail Class

To generate Mail Class use

```
    php artisan make:mail YourMailClassName
```

```

    <?php

    namespace App\Mail;

    use App\User;
    use Illuminate\Bus\Queueable;
    use Illuminate\Contracts\Queue\ShouldQueue;
    use Illuminate\Mail\Mailable;
    use Illuminate\Queue\SerializesModels;

    class sendEmail extends Mailable
    {
        use Queueable, SerializesModels;

        private $user;
        /**
         * Create a new message instance.
         *
         * @return void
         */
        public function __construct(User $user)
        {
            $this->user = $user;
        }

        /**
         * Build the message.
         *
         * @return $this
         */
        public function build()
        {
            $this->to($this->user->email,$this->user->name);
            $this->subject('Your Subject');
            return $this->markdown('userRegistered',['user'=> $this->user]);
        }
    }
```

Job Class

To generate Job Class use

```
    php artisan make:job YourJobClassName
```

```
        <?php

        namespace App\Jobs;

        use App\Mail\sendEmail;
        use App\User;
        use Illuminate\Bus\Queueable;
        use Illuminate\Contracts\Queue\ShouldQueue;
        use Illuminate\Foundation\Bus\Dispatchable;
        use Illuminate\Queue\InteractsWithQueue;
        use Illuminate\Queue\SerializesModels;
        use Illuminate\Support\Facades\Mail;

        class JobMail implements ShouldQueue
        {
            use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

            private $user;
            /**
            * Create a new job instance.
            *
            * @return void
            */
            public function __construct( User $user)
            {
                $this->user = $user;
            }

            /**
            * Execute the job.
            *
            * @return void
            */
            public function handle()
            {
                Mail::send(new sendEmail($this->user));
            }
        }
```

Generate your migrates
```
    php artisan migrate
```

To personalize your email
```
    php artisan vendor:publish --tag=laravel-mail
```
