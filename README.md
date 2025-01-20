**On pull from github do the following:**

First of all, copy the .env.example file to .env.

Then, run the following commands:
```bash
composer install
./vendor/bin/sail up -d
./vendor/bin/sail artisan key:generate
npm install # it may take a while
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

## If you have not php installed or updated
```bash
# go to project folder
cd path/to/project

# run composer up in order to build container
docker compose up -d

# open laravel container bash
docker exec -it nrg-laravel.test-1 bash

# install composer dependency directly inside docker container
composer install

php artisan 

# exit container bash
exit

```
Now if you are on linux/WSL/MacOs you can use the sail command to interact with container.  