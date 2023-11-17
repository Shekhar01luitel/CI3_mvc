A CodeIgniter Simple Crud
===========================================================

Version: 1.0  
Author: Shekhar Luitel https://shekharluitel.com.np.  

This library is compatible with CodeIgniter 3.1.x and PHP >= 7.3.0.

Tested on CodeIgniter 3.1.13.

Links
-----

Package: https://packagist.org/packages/ivantcholakov/codeigniter-phpmailer

Installation
------------

Download Codeignioter 3 project https://codeload.github.com/bcit-ci/CodeIgniter/zip/3.1.13

Open Terminal
```php
php -S localhost:8000
```

Open config/config.php

```php
$config['base_url'] = defined('BASE_URL')?BASE_URL:'';
```
Open config/constant.php

Add this to make base url dynamic
```php
<?php

if (isset($_SERVER['SERVER_PORT'])) {
    $isHttps = !empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off';
    $port = !empty($_SERVER['SERVER_PORT']) ? $_SERVER['SERVER_PORT'] : ($isHttps ? 443 : 80);

    /*
    |--------------------------------------------------------------------------
    | Base URL
    |--------------------------------------------------------------------------
    */
    define('BASE_URL',
        ($isHttps ? 'https' : 'http') . "://" . $_SERVER['SERVER_NAME'] . ':' . $port . str_replace(basename($_SERVER['SCRIPT_NAME']), "", $_SERVER['SCRIPT_NAME']));

    /*
    |--------------------------------------------------------------------------
    | Current URL
    |--------------------------------------------------------------------------
    */
    define('CURRENT_URL', ($isHttps ? 'https' : 'http') . "://" . $_SERVER['SERVER_NAME'] . str_replace('//', '/', $_SERVER['REQUEST_URI']));
}


defined('BASEPATH') OR exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| Display Debug backtrace
|--------------------------------------------------------------------------TEMPLATES_DIR
|
| If set to TRUE, a backtrace will be displayed along with php errors. If
| error_reporting is disabled, the backtrace will not display, regardless
| of this setting
|
*/
defined('SHOW_DEBUG_BACKTRACE') OR define('SHOW_DEBUG_BACKTRACE', TRUE);
```
