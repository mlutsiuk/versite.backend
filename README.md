# Versite

## Installation

### Docker start
Build docker images:
```bash
docker composer build
```

Run docker containers:
```bash
# Or use IDE tools instead
docker compose up
```

### Dependencies installation

Install composer dependencies:
```bash
composer install
```

#### Optional
Install npm packages for api documentation generator.
```bash
# If not in src folder
cd src

npm install
```

### Local project configurations

> Further, commands must be executed inside the `php` docker container

Decrypt .env file
> Paste actual decryption key and cipher method instead of `{key}` and `{cipher}`
```bash
php artisan env:decrypt --key={key} --cipher={cipher}
```

Run migrations:
```bash
php artisan migrate
```

Create Passport encryption keys:
```bash
php artisan passport:install
```

Create a Personal Access Token Client:
```bash
php artisan passport:client --personal
```
