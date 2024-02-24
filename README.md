# Magento 2 QuickLink Extension

The Collab_QuickLink module allows You to embeed and configure [quicklink](https://getquick.link/) in Your 
Magento 2 store.

## How it works

Quicklink attempts to make navigations to subsequent pages load faster. It:

- **Detects links within the viewport** (using [Intersection Observer](https://developer.mozilla.org/en-US/docs/Web/API/Intersection_Observer_API))
- **Waits until the browser is idle** (using [requestIdleCallback](https://developer.mozilla.org/en-US/docs/Web/API/Window/requestIdleCallback))
- **Checks if the user isn't on a slow connection** (using `navigator.connection.effectiveType`) or has data-saver enabled (using `navigator.connection.saveData`)
- **Prefetches** (using [`<link rel=prefetch>`](https://www.w3.org/TR/resource-hints/#prefetch) or XHR) or **prerenders** (using [Speculation Rules API](https://github.com/WICG/nav-speculation/blob/main/triggers.md)) URLs to the links. Provides some control over the request priority (can switch to `fetch()` if supported).

## Configuration
You can configure the module in the admin panel under `Stores > Configuration > Collab Extensions > Quicklink`.
Full options description can be found in the [quicklink documentation](https://getquick.link/api/).


## Installation details
```bash
composer require collab/module-quicklink
bin/magento setup:upgrade
```
