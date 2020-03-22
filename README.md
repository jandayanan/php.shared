# Laravel-Shared Submodule

## Submodule containing the base classes, helpers,middlewares, extensions, etc. anything that is required to build your next Laravel REST API project.


### 1. Fetch the shared submodule using:
> git submodule add git@github.com:jandayanan/php.shared.git shared

### 2. Register the shared submodule and allow proper namespacing in composer.json under autoload below:
> "Shared\\\\": "shared/"

### 3. Register the HelperServiceProvider.php in /config/app.php under providers with:
> Shared\Providers\HelperServiceProvider::class

## Happy Coding!
