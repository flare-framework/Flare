## Router
```
  _____  _    _ _____             _____             _            
 |  __ \| |  | |  __ \           |  __ \           | |           
 | |__) | |__| | |__) |  ______  | |__) |___  _   _| |_ ___ _ __
 |  ___/|  __  |  ___/  |______| |  _  // _ \| | | | __/ _ \ '__|
 | |    | |  | | |               | | \ \ (_) | |_| | ||  __/ |   
 |_|    |_|  |_|_|               |_|  \_\___/ \__,_|\__\___|_|   

```
simple Router class for PHP. with the support of Controllers and Middlewares.

[![Total Downloads](https://poser.pugx.org/izniburak/router/d/total.svg)](https://packagist.org/packages/izniburak/router)
[![Latest Stable Version](https://poser.pugx.org/izniburak/router/v/stable.svg)](https://packagist.org/packages/izniburak/router)
[![Latest Unstable Version](https://poser.pugx.org/izniburak/router/v/unstable.svg)](https://packagist.org/packages/izniburak/router)
[![License](https://poser.pugx.org/izniburak/router/license.svg)](https://packagist.org/packages/izniburak/router)

### Features
- Supports GET, POST, PUT, DELETE, OPTIONS, PATCH, HEAD, AJAX and ANY request methods
- Easy access and manage Request and Response via `symfony/http-foundation` package.
- Controllers support (Example: HomeController@about)
- Before and after Route Middlewares support
- Static Route Patterns
- Dynamic Route Patterns
- Easy-to-use patterns
- Adding a new pattern supports. (with RegExp)
- Namespaces supports.
- Group Routing
- Custom 404 handling
- Debug mode (Error message open/close)

## Install

composer.json file:
```json
{
    "require": {
        "izniburak/router": "^2.0"
    }
}
```
after run the install command.
```
$ composer install
```

OR run the following command directly.

```
$ composer require izniburak/router
```

## Example Usage
```php
require 'vendor/autoload.php';

use Buki\Router\Router;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

$router = new Router;

// For basic GET URI
$router->get('/', function(Request $request, Response $response) {
    $response->setContent('Hello World');
    return $response;

    # OR
    # return 'Hello World!';
});

// For basic GET URI by using a Controller class.
$router->get('/test', 'TestController@main');

// For auto discovering all methods and URIs
$router->controller('/users', 'UserController');

$router->run();
```

## Docs
Documentation page: [Buki\Router Docs][doc-url]

Changelogs: [Buki\Router Changelogs][changelog-url]

## Support
[izniburak's homepage][author-url]

[izniburak's twitter][twitter-url]

## Licence
[MIT Licence][mit-url]

## Contributing

1. Fork it ( https://github.com/izniburak/php-router/fork )
2. Create your feature branch (git checkout -b my-new-feature)
3. Commit your changes (git commit -am 'Add some feature')
4. Push to the branch (git push origin my-new-feature)
5. Create a new Pull Request

## Contributors

- [izniburak](https://github.com/izniburak) İzni Burak Demirtaş - creator, maintainer

[mit-url]: http://opensource.org/licenses/MIT
[doc-url]: https://github.com/izniburak/php-router/wiki
[changelog-url]: https://github.com/izniburak/php-router/wiki/Changelogs
[author-url]: http://burakdemirtas.org
[twitter-url]: https://twitter.com/izniburak
