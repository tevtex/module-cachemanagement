# Tevtex Magento 2 Cache Management Module

The `tevtex/module-cachemanagement` is a Adobe Commerce module that provides
functionalities for managing Adobe Commerce's cache via API calls.

## Features

- Enable, disable, clean, and flush Adobe Commerce cache via API.

## Installation

You can install this package via Composer:

```bash
composer require tevtex/module-cachemanagement
```

## Usage

### Enable Module

```bash
bin/magento module:enable Tevtex_CacheManagement
bin/magento setup:upgrade
```

### Enable Configuration

#### via Admin Panel

```bash
Stores > Configuration > TEVTEX > Cache Management > General > Enabled
```

![TEVTEX Cache Management](./docs/images/tevtex_cachemanagement_configuration.png)

#### via Command Line:

```bash
bin/magento config:set tevtex_cachemanagement/general/enabled 1
```

### API Endpoints

#### Enable Cache

Enable all cache types.

```bash
PUT /V1/tevtex/cache/enable
```

Enable specific cache types.

```bash
PUT /V1/tevtex/cache/enable

{
    "cache_types":[
        "eav",
        "config",
        ...
    ]
}
```

#### Disable Cache

Disable all cache types.

```bash
PUT /V1/tevtex/cache/disable
```

Disable specific cache types.

```bash 
PUT /V1/tevtex/cache/disable

{
    "cache_types":[
        "eav",
        "config",
        ...
    ]
}
```

#### Clean Cache

Clean all cache types.

```bash
POST /V1/tevtex/cache/clean
```

Clean specific cache types.

```bash
POST /V1/tevtex/cache/clean

{
    "cache_types":[
        "eav",
        "config",
        ...
    ]
}
```

#### Flush Cache

Flush all cache types.

```bash
POST /V1/tevtex/cache/flush
```

Flush specific cache types.

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

## Security

The API endpoints are secured and require the `Magento_Backend::cache` resource
access right for authorization.

## License

This project is licensed under the GPL-3.0 License - see
the [LICENSE.txt](./LICENSE.txt) file
for details.

## Authors

Ahmad Farzan - <a.farzan@tevtex.com>.
