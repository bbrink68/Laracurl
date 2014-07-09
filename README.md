Laracurl
========

Laravel 4.2.x cURL Wrapper for [Andreas Lutro's](https://github.com/anlutro/php-curl) OOP cURL Class

# Installation
To install the package, simple add the following to your Laravel installation's `composer.json` file

```json
"require": {
	"laravel/framework": "4.2.*",
	"mattbrown/laracurl": "dev-master"        
},
```

Then, run the usual `composer update` to pull the files.  Then, add the **Service Provider** `Mattbrown\Laracurl\LaracurlServiceProvider` to your `app/config/app.php`.
