# Changelog

## [1.0.0] - 2023-07-06

### Added

- WebAPI added to interact with Adobe Commerce's cache management.
  - New route `/V1/tevtex/cache/enable` via `PUT` method to enable cache. The method uses `CacheToggleInterface` service class with `enable` method.
  - New route `/V1/tevtex/cache/disable` via `PUT` method to disable cache. The method uses `CacheToggleInterface` service class with `disable` method.
  - New route `/V1/tevtex/cache/clean` via `POST` method to clean cache. The method uses `CachePurgeInterface` service class with `clean` method.
  - New route `/V1/tevtex/cache/flush` via `POST` method to flush cache. The method uses `CachePurgeInterface` service class with `flush` method.
- Resource authorization for all the routes is set to `Magento_Backend::cache` to ensure only authorized users can use these cache management functionalities.

### Security

- Added access control to the API endpoints to only allow authorized users access to the cache management functionalities.
