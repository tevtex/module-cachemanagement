# Magento 2 Cache Management API

> Module to enable cache management in Magento 2 using API.

It adds the following API endpoints to your magento application:


## API Endpoints

> Enable all cache types
 
```
PUT /V1/tevtex/cache/enable
```

> Enable specific cache type

```
PUT /V1/tevtex/cache/enable

{
  "cache_types":[
    "eav",
    "config",
  ]
}
```

> Disable all cache types

```
PUT /V1/tevtex/cache/disable
```

> Disable specific cache type

```
PUT /V1/tevtex/cache/disable

{
  "cache_types":[
    "eav",
    "config",
  ]
}
```

> Clean all cache types.

```
POST /V1/tevtex/cache/clean
```

> Clean specific cache types.

```
POST /V1/tevtex/cache/clean

{
    "cache_types":[
        "eav",
        "config",
        ...
    ]
}
```

> Flush all cache types.

```bash
POST /V1/tevtex/cache/flush
```

> Flush specific cache types.

```bash
POST /V1/tevtex/cache/flush

{
    "cache_types":[
        "eav",
        "config",
        ...
    ]
}
```

**Note**: The API endpoints are secured and require the `Magento_Backend::cache` resource access right for authorization.

## Installation

> Simply run the following command to install the module using `composer`

```bash
composer require tevtex/module-cachemanagement
```

## Usage

> Enable the module using following command:

```bash
bin/magento module:enable Tevtex_CacheManagement
bin/magento setup:upgrade
```

> Enable the configuration using one of the following ways:

### Using Admin Panel

> Visit the following location in admin panel and enable the module

```bash
Stores > Configuration > TEVTEX > Cache Management > General > Enabled
```

![Cache Management](./docs/images/tevtex_cachemanagement_configuration.png)

### Using Command Line

> Run the following command to enable the module

```bash
bin/magento config:set tevtex_cachemanagement/general/enabled 1
```

## License

This project is licensed under the GPL-3.0 License - see
the [LICENSE.txt](./LICENSE.txt) file
for details.

## Authors

Ahmad Farzan - <a.farzan@tevtex.com>.
