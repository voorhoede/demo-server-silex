# Demo Server Silex

Demo setup of [Silex](http://silex.sensiolabs.org/) server ([PHP](https://secure.php.net/))
with module structure and [demo viewer](https://github.com/voorhoede/demo-viewer).

This demo is based on the [Silex Skeleton](https://github.com/silexphp/Silex-Skeleton).

* Templates are moved to `src/` following common Voorhoede module setup.
* Multi-language stub support by adding `.{lang}.stub.json` files next to view templates.


## Install

This setup requires [PHP](https://secure.php.net/) (>= 5.5.9) and [Composer](https://getcomposer.org/) to be installed.
Then install dependencies:

```bash
composer install
```

## Run

```bash
COMPOSER_PROCESS_TIMEOUT=0 composer run
```

Then, browse to http://localhost:8888/index.php/ (production mode) or http://localhost:8888/index_dev.php/ (development mode).