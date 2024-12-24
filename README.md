**On pull from github do the following:**

First of all, copy the .env.example file to .env.

Then, run the following commands:
```bash
composer install
./vendor/bin/sail artisan key:generate
npm install # it may take a while
./vendor/bin/sail up -d
./vendor/bin/sail artisan migrate
npm run dev
```

**To run the application locally:**

```bash
npm install # only the first time or when is added a new package to the package.json file, it may take a while
./vendor/bin/sail up -d 
./vendor/bin/sail artisan migrate
npm run dev
```