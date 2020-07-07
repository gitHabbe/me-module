[![Build Status](https://travis-ci.org/gitHabbe/me-module.svg?branch=master)](https://travis-ci.org/gitHabbe/me-module)
[![CircleCI](https://circleci.com/gh/gitHabbe/me-module.svg?style=shield)](https://circleci.com/gh/gitHabbe/me-module)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/gitHabbe/me-module/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/gitHabbe/me-module/?branch=master)
[![Code Coverage](https://scrutinizer-ci.com/g/gitHabbe/me-module/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/gitHabbe/me-module/?branch=master)
[![Build Status](https://scrutinizer-ci.com/g/gitHabbe/me-module/badges/build.png?b=master)](https://scrutinizer-ci.com/g/gitHabbe/me-module/build-status/master)

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

# Use the bash-file to skip 'rsync' commands below
```bash
bash vendor/githabbe/me-module/.hab/scaffold/postprocess.d/1200_geo.bash
```

# Copy the configuration files
```bash
rsync -av vendor/githabbe/me-module/config ./
```

# Copy the views
```bash
rsync -av vendor/anax/remserver/views ./views/MeModule/
```