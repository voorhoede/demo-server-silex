# Demo Server Silex

Demo setup of [Silex](http://silex.sensiolabs.org/) server ([PHP](https://secure.php.net/))
with module structure and [demo viewer](https://github.com/voorhoede/demo-viewer).

This demo is based on the [Silex Skeleton](https://github.com/silexphp/Silex-Skeleton).

* Templates are moved to `src/` following common Voorhoede module setup.
* Multi-language stub support by adding `.{lang}.stub.json` files next to view templates.


## Module structure

The application is composed out of small single-purpose modules (e.g. *app-header*, *breadcrumb*).
Each module consists of its own template (`module.html`) and a demo for variations of this template (`module.demo.html`).
In addition a module can have its own presentation (`module.css`), behaviour (`module.js`)  and other module files.
The modules are grouped into areas (*blog*, *core*, *gallery*, ...).
Each area has it's own routes (`area/router.js`), views (`area/*.html`) and can have its own assets and other specific files.
Finally the entire server is configured in `/index.js`.

Resulting in the following structure:

```
src/
    ├── app.php                         <-- Silex app
    ├── controllers.php                 <-- shared routes 
    ├── index.html                      <-- home page template
    |
    └── area-name/                      <-- eg. blog, core, gallery
        ├── area-name.php               <-- routes for this area
        ├── index.html                  <-- area overview template
        ├── item.html                   <-- item template
        |
        └── module-name/
            ├── module-name.html        <-- module template
            ├── module-name.demo.html   <-- demos of template variations
            ├── module-name.(css|js|..) <-- other module specific files
            └── README.md               <-- documentation with instructions
            
web/
    ├── index.php                       <-- front-end controller production
    └── index_dev.php                   <-- front-end controller development
```


## Install

This project requires [PHP](https://secure.php.net/) (>= 5.5.9) and [Composer](https://getcomposer.org/) to be installed.
Then install dependencies:

```bash
composer install
```

## Run

```bash
COMPOSER_PROCESS_TIMEOUT=0 composer run
```

Then, browse to [http://localhost:8888/index.php/](http://localhost:8888/index.php/) (production mode) or [http://localhost:8888/index_dev.php/](http://localhost:8888/index_dev.php/) (development mode).