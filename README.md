# A conversation package

[![Latest Version on Packagist](https://img.shields.io/packagist/v/vsellis/laravel-converse.svg?style=flat-square)](https://packagist.org/packages/vsellis/laravel-converse)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/vsellis/laravel-converse/run-tests?label=tests)](https://github.com/vsellis/laravel-converse/actions?query=workflow%3Arun-tests+branch%3Amaster)
[![Total Downloads](https://img.shields.io/packagist/dt/vsellis/laravel-converse.svg?style=flat-square)](https://packagist.org/packages/vsellis/laravel-converse)


This is where your description should go. Limit it to a paragraph or two. Consider adding a small example.

## Installation

You can install the package via composer:

```bash
composer require vsellis/laravel-converse
```

Add the CanConverse trait to your user model
```php
class User
{
    use JuanRangel\Converse\Traits\CanConverse;
}    
```

You can publish and run the migrations with:

```bash
php artisan vendor:publish --provider="JuanRangel\Converse\ConverseServiceProvider" --tag="migrations"
php artisan migrate
```

You can publish the config file with:
```bash
php artisan vendor:publish --provider="JuanRangel\Converse\ConverseServiceProvider" --tag="config"
```

This is the contents of the published config file:

```php
return [
];
```
## Realtime Messages

Add your pusher info in the.env file

```
PUSHER_APP_ID=12345
PUSHER_APP_KEY=12345
PUSHER_APP_SECRET=12345
PUSHER_APP_CLUSTER=us2
```

Set your broadcast driver to pusher in the .env file

```
BROADCAST_DRIVER=pusher
```

Enable the broadcast driver by uncommenting the `App\Providers\BroadcastServiceProvider::class` in `js/config/app.php`

```javascript
import Echo from 'laravel-echo';

window.Pusher = require('pusher-js');

window.Echo = new Echo({
    broadcaster: 'pusher',
    key: process.env.MIX_PUSHER_APP_KEY,
    cluster: process.env.MIX_PUSHER_APP_CLUSTER,
    forceTLS: true
});
``` 


Install laravel-echo and pusher 
https://laravel.com/docs/7.x/broadcasting

be sure and uncomment or add this to your `bootstrap.js` file

`npm install --save laravel-echo pusher-js`
Now we can run the migration command

Run `npm run dev` to compile the assets

```bash
php artisan migrate
```

Make sure that the `BroadcastServiceProvider` is active in `app.php`

## Usage

``` php
$laravel-converse = new JuanRangel\Converse();
echo $laravel-converse->echoPhrase('Hello, JuanRangel!');
```

We now have to install laravel-echo and pusher-js
```bash
npm install laravel-echo pusher-js
```

## Testing

``` bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security

If you discover any security related issues, please email juan@vsellis.com instead of using the issue tracker.

## Credits

- [Juan](https://github.com/JuanRangel)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
