### Project

It's a filtering application from large of data

### Requirements
* PHP ^8.1
* Composer
* Redis
* Postgres

### Installation
Clone repository and install dependencies via composer.

```shell
git clone https://github.com/mkawsar/filtering-db-redis.git
```

```shell
composer install
```

```shell
cp .env.example .env
```

Need to be set up your database and redis configuration into the env file

### Running application
```shell
php artisan migration --seed
``` 

```shell
php artisan serve
```

### Support

If you have any questions or confusion please email me at **mkawsarahmed@outlook.com** or open an issue in the repository.
