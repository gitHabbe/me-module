MeModule for Anax projects
==================================

This module require api-keys for the various services.
`config.php` is put in the root for the application.
Format is like this:

```php
<?php

return [
    "key" => "KEY HERE",
    "example" => "KEY HERE",
    "darkSky" => "KEY HERE",
    "openWeather" => "KEY HERE",
    "cageData" => "KEY HERE",
    "mapbox" => "KEY HERE"
];
```


# Install package with composer
```bash
composer require githabbe/me-module
```

# Copy the configuration files
```bash
rsync -av vendor/githabbe/me-module/config ./
```

# Copy the views
```bash
rsync -av vendor/anax/remserver/views ./views/MeModule/
```