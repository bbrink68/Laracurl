Laracurl
========

Laravel 5.x cURL Wrapper for [Andreas Lutro's](https://github.com/anlutro/php-curl) OOP cURL Class

# Installation
To install the package, simply add the following to your Laravel installation's `composer.json` file

```json
"require": {
	"laravel/framework": "5.*",
	"mattbrown/laracurl": "2.0.0"  
},
```

Run the usual `composer update` to pull the files.  Then, add the following **Service Provider** to your `providers` array in your `config/app.php` config.

```php
'providers' => array(
	...
	'Mattbrown\Laracurl\LaracurlServiceProvider',
);
```

# Usage

**Simple GET Request**

```php
$response = Laracurl::get('http://www.google.com');
```

**Easily Build URL With Query String Attached**

```php
$url = Laracurl::buildUrl('http://www.google.com', ['s' => 'curl']);
$response = Laracurl::get($url);
```

**post() accepts array of POST data**

```php
$url = Laracurl::buildUrl('http://api.somedomain.com', ['token' => 'token_val']);
$response = Laracurl::post($url, ['post' => 'data']);
```

**Prefix 'json' to method to post as JSON**

```php
$response = Laracurl::jsonPut($url, ['post' => 'data']);
```

**Prefix 'raw' to method to post as JSON**

```php
$response = Laracurl::rawPost($url, 'raw string data ...');
```

###The Response Object###

The `$response` variable in above examples represents an object as well.

```php
// Return Headers
$response->headers

// Return Status Code
$response->code

// Response Body
$response->body

// cURL Info
$response->info
```

####Response Headers example####

```php
var_dump($response->headers);

array (size=22)
  'HTTP/1.1' => string '200 OK' (length=6)
  'Server' => string 'nginx/1.5.11' (length=12)
  'Date' => string 'Thu, 10 Jul 2014 02:25:01 GMT' (length=29)
  'Content-Type' => string 'application/json; charset=UTF-8' (length=31)
  'Transfer-Encoding' => string 'chunked' (length=7)
  'Connection' => string 'keep-alive' (length=10)
  'Status' => string '200 OK' (length=6)
  'X-API-Version' => string 'v2' (length=2)
  'X-Frame-Options' => string 'SAMEORIGIN' (length=10)
  'X-Origin-Server' => string 'app.pod1.ord.sample.com' (length=24)
  'X-UA-Compatible' => string 'IE=Edge,chrome=1' (length=16)
  'ETag' => string 'W/"a73bb2edsaerde0c55329aa2f6f"' (length=36)
  'Cache-Control' => string 'must-revalidate, private, max-age=0' (length=35)
  'X-User-Id' => string '690632553' (length=9)
  'X-Request-Id' => string 'a5d69e2sd21f53cbd5c822727f15c66c0' (length=32)
  'X-Runtime' => string '0.143530' (length=8)
  'X-Rack-Cache' => string 'miss' (length=4)
  'X-Request-Id' => string '3b1as23718db6268b9f972' (length=20)
  'X-Content-Type-Options' => string 'nosniff' (length=7)
  'X-Varnish' => string '1388807397' (length=10)
  'Age' => string '0' (length=1)
  'Via' => string '1.1 varnish' (length=11)
```

```php
var_dump($response->code);

string '200 OK' (length=6)
```

```php
var_dump($response->body);

string '{"ticket":{"url":"https://sample.domain.com/api/tickets/44.json","id":44,"external_id":null'... (length=3192)
```

```php
var_dump($response->info);

array (size=23)
  'url' => string 'https://sample.domain.com/api/tickets/44.json' (length=59)
  'content_type' => string 'application/json; charset=UTF-8' (length=31)
  'http_code' => int 200
  'header_size' => int 676
  'request_size' => int 89
  'filetime' => int -1
  'ssl_verify_result' => int 0
  'redirect_count' => int 0
  'total_time' => float 0.271805
  'namelookup_time' => float 0.000958
  'connect_time' => float 0.002369
  'pretransfer_time' => float 0.050838
  'size_upload' => float 0
  'size_download' => float 3192
  'speed_download' => float 11743
  'speed_upload' => float 0
  'download_content_length' => float -1
  'upload_content_length' => float 0
  'starttransfer_time' => float 0.271732
  'redirect_time' => float 0
  'certinfo' => 
    array (size=0)
      empty
  'primary_ip' => string 'xx.xxx.xxx.xx' (length=14)
  'redirect_url' => string '' (length=0)
```
