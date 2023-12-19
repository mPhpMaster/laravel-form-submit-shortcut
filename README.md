# Laravel form submit shortcut package.

## Dependencies:

* php >=8.1 **REQUIRED IN YOUR PROJECT**
* laravel >=9 **REQUIRED IN YOUR PROJECT**
* illuminate/support >=9 _composer will install it automaticly_
* laravel/helpers ^1.5 _composer will install it automaticly_

## Installation:

```shell
composer require mphpmaster/laravel-form-submit-shortcut
```

You can publish the config file with:

```shell
php artisan vendor:publish --tag="form-submit-shortcut-config"
```

This is the contents of the published config file:

```php
return [
	// accepts empty|string
	'key' => 'ctrl+s',
];
```

You can publish the js file to `public/js` with:

```shell
php artisan vendor:publish --tag="form-submit-shortcut-js"
```

## Usage:

### Laravel Nova (4+):

No need to add anything. Just edit the config as you like.

### Laravel:

You need to add the script tag to your front code:

```html

<script src="{{url('js/formSubmitShortcut.js')}}"></script>
```

> **Important**: Do not forget to modify the config.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

This Helper is open-sourced software licensed under
the [MIT license](https://github.com/mPhpMaster/laravel-form-submit-shortcut/blob/master/LICENSE).

***

## Stand with Palestine 🇵🇸 <i>#FreePalestine</i>
