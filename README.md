[![Latest Stable Version](https://poser.pugx.org/ivantcholakov/codeigniter-phpmailer/v)](//packagist.org/packages/ivantcholakov/codeigniter-phpmailer)
[![Total Downloads](https://poser.pugx.org/ivantcholakov/codeigniter-phpmailer/downloads)](//packagist.org/packages/ivantcholakov/codeigniter-phpmailer)
[![Latest Unstable Version](https://poser.pugx.org/ivantcholakov/codeigniter-phpmailer/v/unstable)](//packagist.org/packages/ivantcholakov/codeigniter-phpmailer)
[![License](https://poser.pugx.org/ivantcholakov/codeigniter-phpmailer/license)](//packagist.org/packages/ivantcholakov/codeigniter-phpmailer)

A CodeIgniter compatible email-library powered by PHPMailer
===========================================================

Version: 1.5.0  
Author: Ivan Tcholakov <ivantcholakov@gmail.com>, 2012-2022.  
License: The MIT License (MIT), http://opensource.org/licenses/MIT

This library is compatible with CodeIgniter 3.1.x and PHP >= 7.3.0.

Tested on CodeIgniter 3.1.13 (March 3rd, 2022) and PHPMailer Version 6.6.4 (August 22nd, 2022).

Links
-----

Package: https://packagist.org/packages/ivantcholakov/codeigniter-phpmailer

PHPMailer: https://github.com/PHPMailer/PHPMailer

Installation
------------

Enable Composer to be used by CodeIgniter. Check this page from its documentation:
https://www.codeigniter.com/userguide3/general/autoloader.html .
You need to see or decide when your vendor/ directory is (to be) and within the
CodeIgniter's configuration file application/config/config.php you need to set the
configuration option $config['composer_autoload'] accordingly. For the typical location
application/vendor/ the configuration setting would look like this:

```php
$config['composer_autoload'] = APPPATH.'vendor/autoload.php';
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