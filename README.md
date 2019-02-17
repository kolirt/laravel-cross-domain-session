# Laravel Cross-Domain Session v1.0.7

The package will help to synchronize data between different domains.  
***It's not safe. Do not sync confidential information!***
## Installation

```
$ composer require kolirt/laravel-cross-domain-session
```

```
$ php artisan vendor:publish --provider="Kolirt\CrossDomainSession\CrossDomainSessionServiceProvider"
```

Register provider on your config/app.php file.

```php
'providers' => [
    ...,
    Kolirt\CrossDomainSession\CrossDomainSessionServiceProvider::class,
]
```

Configure domains in `config/cross-domain-session.php`.

```php
<?php

return [
    'key' => 'cross-domain-session',
    'domains' => [
        'http://a.com',
        'http://b.com',
        'http://c.com',
        // more domains
    ]
];
```

Include view to your layout.

```
@include('cross-domain-session::render')
```

## Method

### Set
```php
cd_domain()->set($key, $value);
```

### Get
```php
cd_domain()->get(); // return all
// or
cd_domain()->get($key, $default);
```

### Push
```php
cd_domain()->push($key, $value);
```
