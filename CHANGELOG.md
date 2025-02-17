# Changelog

All notable changes to this project will be documented in this file.

This project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html), and the format of this changelog is based on [Keep a Changelog](https://keepachangelog.com/en/1.0.0/).

Breaking changes are marked with ⚠️.

## [Unreleased]

## [v1.3.2] - 2021-07-01

**Fixed**

- Remove Babel preset to correctly transpile to ES5 by default ([d781b16](https://github.com/tighten/ziggy/commit/d781b164b8f455730fe8a8b0cbf91f0f8cb55a73))

## [v1.3.1] - 2021-06-19

**Changed**

- Use `Object.assign()` to merge routes ([#429](https://github.com/tighten/ziggy/pull/429))

## [v1.3.0] - 2021-06-17

**Added**

- Make `location` configurable (adds better support for SSR) ([#432](https://github.com/tighten/ziggy/pull/432))

## [v1.2.0] - 2021-05-24

**Added**

- Add Vue plugins ([#407](https://github.com/tighten/ziggy/pull/407), [#424](https://github.com/tighten/ziggy/pull/424))

## [v1.1.0] - 2021-04-02

**Added**

- Prepare for Laravel Octane ([#415](https://github.com/tighten/ziggy/pull/415))

## [v1.0.5] - 2021-02-05

**Added**

- Add support for appending 'extra' parameters to the query string ([#390](https://github.com/tighten/ziggy/pull/390))

**Changed**

- Remove source maps ([#395](https://github.com/tighten/ziggy/pull/395))

**Fixed**

- Use Laravel's `Reflector` class to get model parameter class name ([#396](https://github.com/tighten/ziggy/pull/396))

## [v1.0.4] - 2020-12-06

**Fixed**

- Fix bug where `route().current()` could incorrectly return `true` on URLs with no parameters ([#377](https://github.com/tighten/ziggy/pull/377))
- Fix several other bugs in `route().current()` with params ([#379](https://github.com/tighten/ziggy/pull/379))
- Revert [#334](https://github.com/tighten/ziggy/pull/334), default Ziggy's `url` back to `url('/')` instead of the `APP_URL` environment variable ([#386](https://github.com/tighten/ziggy/pull/386))

## [v1.0.3] - 2020-11-20

**Fixed**

- Filter out unnamed cached routes with randomly generated names ([#370](https://github.com/tighten/ziggy/pull/370))
- Fix collision with JavaScript built-in method names like `shift` by casting empty `defaults` to an object ([#371](https://github.com/tighten/ziggy/pull/371))

## [v1.0.2] - 2020-11-13

**Fixed**

- Make `ziggy:generate` URL behaviour consistent with Ziggy class and Blade directive ([#361](https://github.com/tighten/ziggy/pull/361))
- Fix `route().current()` error on unknown/unnamed routes ([#362](https://github.com/tighten/ziggy/pull/362))

## [v1.0.1] - 2020-11-10

**Fixed**

- Fix `route().current()` on routes at the domain root ([#356](https://github.com/tighten/ziggy/pull/356))

## [v1.0.0] - 2020-11-06

**Added**

- Document the `check()` method ([#294](https://github.com/tighten/ziggy/pull/294)) and how to install and use Ziggy via `npm` and over a CDN ([#299](https://github.com/tighten/ziggy/pull/299))
- Add support for [custom scoped route model binding](https://laravel.com/docs/7.x/routing#implicit-binding), e.g. `/users/{user}/posts/{post:slug}` ([#307](https://github.com/tighten/ziggy/pull/307))
- Add support for [implicit route model binding](https://laravel.com/docs/7.x/routing#implicit-binding) ([#315](https://github.com/tighten/ziggy/pull/315))
- Add support for passing parameters to `current()` to check against the current URL in addition to the route name ([#330](https://github.com/tighten/ziggy/pull/330))

**Changed**

- ⚠️ Update `ziggy:generate` output path for Laravel 5.7+ `resources` directory structure, thanks [@Somethingideally](https://github.com/Somethingideally)! ([#269](https://github.com/tighten/ziggy/pull/269))
- ⚠️ Update automatic `id` parameter detection to check for higher priority named route parameters and allow passing `id` as a query parameter ([#301](https://github.com/tighten/ziggy/pull/301))
- ⚠️ Rename the `RoutePayload` class to `Ziggy` and remove its `compile` method in favour of constructing a new instance and calling `->toArray()` or `->toJson()` ([#305](https://github.com/tighten/ziggy/pull/305))
    - Resolve the application router instance internally instead of passing it into the constructor – `new Ziggy(...)` now takes only 2 arguments, `$group` and `$url`
    - Change the default value of `basePort` from `false` to `null`
    - Remove the `getRoutePayload()` methods on the `BladeRouteGenerator` and `CommandRouteGenerator` classes
- ⚠️ Rename all `whitelist` and `blacklist` functionality to `only` and `except` ([#300](https://github.com/tighten/ziggy/pull/300))
- Use Jest instead of Mocha for JS tests ([#309](https://github.com/tighten/ziggy/pull/309))
- Use [microbundle](https://github.com/developit/microbundle) instead of Webpack to build and distribute Ziggy ([#312](https://github.com/tighten/ziggy/pull/312))
- ⚠️ Default Ziggy's `baseUrl` to the value of the `APP_URL` environment variable instead of `url('/')` ([#334](https://github.com/tighten/ziggy/pull/334))
- ⚠️ Return a literal string from the `route()` function when any arguments are passed to it ([#336](https://github.com/tighten/ziggy/pull/336))
- ⚠️ Rename `namedRoutes` → `routes`, `defaultParameters` → `defaults`, `baseUrl` → `url`, and `basePort` → `port` ([#338](https://github.com/tighten/ziggy/pull/338))
- ⚠️ Make the `filter()` method on the `Ziggy` class return an instance of that class instead of a collection of routes ([#341](https://github.com/tighten/ziggy/pull/341))
- ⚠️ Make the `nameKeyedRoutes()`, `resolveBindings()`, `applyFilters()`, and `group()` methods on the `Ziggy` class, and the `generate()` method on the `CommandRouteGenerator` class, private ([#341](https://github.com/tighten/ziggy/pull/341))
- ⚠️ Export from `index.js` instead of `route.js` ([#344](https://github.com/tighten/ziggy/pull/344))
- ⚠️ Encode boolean query parameters as integers ([#345](https://github.com/tighten/ziggy/pull/345))
- ⚠️ Ensure `.current()` respects the value of the `absolute` option ([#353](https://github.com/tighten/ziggy/pull/353))

**Deprecated**

- Deprecate the `with()` and `check()` methods ([#330](https://github.com/tighten/ziggy/pull/330))

**Removed**

- ⚠️ Remove `Route` Facade macros `Route::only()` and `Route::except()` (previously `Route::whitelist()` and `Route::blacklist()`) ([#306](https://github.com/tighten/ziggy/pull/306))
- ⚠️ Remove the following undocumented public properties and methods from the `Router` class returned by the `route()` function ([#330](https://github.com/tighten/ziggy/pull/330)):
    - `name`, `absolute`, `ziggy`, `urlBuilder`, `template`, `urlParams`, `queryParams`, and `hydrated`
    - `normalizeParams()`, `hydrateUrl()`, `matchUrl()`, `constructQuery()`, `extractParams()`, `parse()`, and `trimParam()`
- ⚠️ Remove the `UrlBuilder` class ([#330](https://github.com/tighten/ziggy/pull/330))
- ⚠️ Remove the `url()` method now that `route(...)` returns a string ([#336](https://github.com/tighten/ziggy/pull/336))
- ⚠️ Remove the `baseDomain` and `baseProtocol` properties on the Ziggy config object ([#337](https://github.com/tighten/ziggy/pull/337))
- ⚠️ Remove the `appendRouteToList()`, `isListedAs()`, `except()`, and `only()` methods from the `Ziggy` class ([#341](https://github.com/tighten/ziggy/pull/341))

**Fixed**

- Fix automatic `id` parameter detection by also excluding routes with an _optional_ `id` parameter (`{id?}`), thanks [@Livijn](https://github.com/Livijn)! ([#263](https://github.com/tighten/ziggy/pull/263))
- Fix port not being added to URL for routes with subdomains ([#293](https://github.com/tighten/ziggy/pull/293))
- Fix getting parameters of routes in apps installed in subfolders ([#302](https://github.com/tighten/ziggy/pull/302))
- Ensure fallback routes are always last, thanks [@davejamesmiller](https://github.com/davejamesmiller)! ([#310](https://github.com/tighten/ziggy/pull/310))
- Allow getting the route name with `current()` when the current URL has a query string ([#330](https://github.com/tighten/ziggy/pull/330))

## [v0.9.4] - 2020-06-05

**Fixed**

- Fix escaping of `.` characters in the `current()` method, thanks [@davejamesmiller](https://github.com/davejamesmiller)! ([#296](https://github.com/tighten/ziggy/pull/296))

## [v0.9.3] - 2020-05-08

**Added**

- Add support for passing a CSP `nonce` attribute to the `@routes` Blade directive to be set on the script tag, thanks [@tminich](https://github.com/tminich)! (#287)

**Changed**

- Improve support for using Ziggy with server-side rendering, thanks [@emielmolenaar](https://github.com/emielmolenaar)! ([#260](https://github.com/tighten/ziggy/pull/260))
- Avoid resolving the Blade compiler unless necessary, thanks [@axlon](https://github.com/axlon)! ([#267](https://github.com/tighten/ziggy/pull/267))
- Use `dist/js/route.js` as the npm package's main target, thanks [@ankurk91](https://github.com/ankurk91) and [@benallfree](https://github.com/benallfree)! ([#276](https://github.com/tighten/ziggy/pull/276))
- Readme and quality-of-life improvements ([#289](https://github.com/tighten/ziggy/pull/289))

**Fixed**

- Ensure Ziggy's assets are always generated in the correct location ([#290](https://github.com/tighten/ziggy/pull/290))

---

For previous changes see the [Releases](https://github.com/tighten/ziggy/releases) page.

[Unreleased]: https://github.com/tighten/ziggy/compare/v1.3.2...HEAD
[v1.3.2]: https://github.com/tighten/ziggy/compare/v1.3.1...v1.3.2
[v1.3.1]: https://github.com/tighten/ziggy/compare/v1.3.0...v1.3.1
[v1.3.0]: https://github.com/tighten/ziggy/compare/v1.2.0...v1.3.0
[v1.2.0]: https://github.com/tighten/ziggy/compare/v1.1.0...v1.2.0
[v1.1.0]: https://github.com/tighten/ziggy/compare/v1.0.5...v1.1.0
[v1.0.5]: https://github.com/tighten/ziggy/compare/v1.0.4...v1.0.5
[v1.0.4]: https://github.com/tighten/ziggy/compare/v1.0.3...v1.0.4
[v1.0.3]: https://github.com/tighten/ziggy/compare/v1.0.2...v1.0.3
[v1.0.2]: https://github.com/tighten/ziggy/compare/v1.0.1...v1.0.2
[v1.0.1]: https://github.com/tighten/ziggy/compare/v1.0.0...v1.0.1
[v1.0.0]: https://github.com/tighten/ziggy/compare/0.9.4...v1.0.0
[v0.9.4]: https://github.com/tighten/ziggy/compare/0.9.3...0.9.4
[v0.9.3]: https://github.com/tighten/ziggy/compare/v0.9.2...0.9.3
