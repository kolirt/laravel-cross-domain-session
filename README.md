# Laravel Cross-Domain Session v1.0.1

The package will help to synchronize data between different domains.

## Installation

```
$ composer require kolirt/laravel-cross-domain-session
```

Register provider and facade on your config/app.php file.

```php
'providers' => [
    ...,
    Kolirt\CrossDomainSession\CrossDomainSession::class,
]
```

```
$ php artisan vendor:publish --provider="Kolirt\CrossDomainSession\CrossDomainSession"
```

## Usage

Configure `config/cross-domain-session.php`.

```php
<?php

return [
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