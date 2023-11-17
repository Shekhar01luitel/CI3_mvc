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

Open config/config.php

```php
$config['base_url'] = defined('BASE_URL')?BASE_URL:'';
```
Open config/constant.php

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


Within application/config/constants.php add the following lines:

```php
// Path to Composer's vendor/ directory, it should end with a trailing slash.
defined('VENDORPATH') OR define('VENDORPATH', rtrim(str_replace('\\', '/', realpath(dirname(APPPATH.'vendor/autoload.php'))), '/').'/');
```

It is assumed that Composer's vendor/ directory is placed under CodeIgniter's
application/ directory. Otherwise correct the setting so VENDORPATH to point correctly.

If PHPMailer was previously installed through Composer, uninstall it temporarily:

```
composer remove PHPMailer/PHPMailer
```

Now install this library's package, it will install a correct version of PHPMailer too:

```
composer require ivantcholakov/codeigniter-phpmailer
```

Create a file application/helpers/MY_email_helper.php with the following content:

```php
<?php defined('BASEPATH') OR exit('No direct script access allowed.');

// A place where you can move your custom helper functions,
// that are to be loaded before the functions below.
// If it is needed, create the corresponding file, insert
// your source there and uncomment the following lines.
//if (is_file(dirname(__FILE__).'/MY_email_helper_0.php')) {
//    require_once dirname(__FILE__).'/MY_email_helper_0.php';
//}

// Instead of copying manually or through script in this directory,
// let us just load here the provided by Composer file.
if (is_file(VENDORPATH.'ivantcholakov/codeigniter-phpmailer/helpers/MY_email_helper.php')) {
    require_once VENDORPATH.'ivantcholakov/codeigniter-phpmailer/helpers/MY_email_helper.php';
}

// A place where you can move your custom helper functions,
// that are to be loaded after the functions above.
// If it is needed, create the corresponding file, insert
// your source there and uncomment the following lines.
//if (is_file(dirname(__FILE__).'/MY_email_helper_2.php')) {
//    require_once dirname(__FILE__).'/MY_email_helper_2.php';
//}
```

Create a file application/libraries/MY_Email.php with the following content:

```php
<?php defined('BASEPATH') OR exit('No direct script access allowed.');

// Instead of copying manually or through script in this directory,
// let us just load here the provided by Composer file.
require_once VENDORPATH.'ivantcholakov/codeigniter-phpmailer/libraries/MY_Email.php';
```

This is an installation that is to be done once. Updating to next versions of
this package and PHPMailer would be done later easily:

```
composer update
```