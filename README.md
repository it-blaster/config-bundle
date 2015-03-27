# ConfigBundle
[![Build Status](https://scrutinizer-ci.com/g/it-blaster/config-bundle/badges/build.png?b=master)](https://scrutinizer-ci.com/g/it-blaster/config-bundle/build-status/master)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/it-blaster/config-bundle/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/it-blaster/config-bundle/?branch=master)

## Installation
Add to `composer.json` and install
``` js
{
    "require": {
        "it-blaster/config-bundle": "dev-master"
	},
}
```

Add bundle to `AppKernel.php`
``` php
<?php
// app/AppKernel.php
public function registerBundles()
{
    $bundles = array(
        // ...
        new ItBlaster\ConfigBundle\ItBlasterConfigBundle(),
    );
}
```

Build models
``` bash
$ php app/console propel:build
```

## Usage
Use `get` method wherever you need
``` php
$value = Config::get('config_key', $request->getLocale());
```

Twig function:
``` twig
{{ config('social_twitter_link', app.request.locale) }}
```