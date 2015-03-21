# ConfigBundle

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