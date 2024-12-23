**On pull from github do the following:**

First of all, copy the .env.example file to .env.

Then, run the following commands:
```bash
composer install
./vendor/bin/sail artisan key:generate
./vendor/bin/sail artisan migrate
./vendor/bin/sail up -d
```

**To run the application locally:**

```bash
./vendor/bin/sail up -d 
```