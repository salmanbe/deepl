Deepl
====
This easy to use library to import translations from Deepl Api.

Laravel Installation
-------
Install using composer:

```bash
composer require salmanbe/deepl
```

There is a service provider included for integration with the Laravel framework. This service should automatically be registered else to register the service provider, add the following to the providers array in `config/app.php`:

```php
Salmanbe\Deepl\DeeplServiceProvider::class,
```
You can also add it as a Facade in `config/app.php`:
```php
'Deepl' => Salmanbe\Deepl\Deepl::class,
```
Add 2 lines to config/app.php
```php
'deepl_url' => env('DEEPL_URL', ''),
'deepl_key' => env('DEEPL_KEY', ''),
```

Add 2 lines to .env
```php
DEEPL_URL=https://api-free.deepl.com/v2/translate
DEEPL_KEY=your_deepl_api_key
```

Basic Usage
-----

Add `use Salmanbe\Deepl\Deepl;` or `use Deepl;` at top of the class where you want to use it. Then create class instance.

```php
$deepl = new Deepl();
```
Set text, target and source language. source language is optional.
```php
$deepl->get($text, $target_lang, $source_lang);
$deepl->get('Welcome', 'fr', 'en');
```

Uninstall
-----
First remove `Salmanbe\Deepl\DeeplServiceProvider::class,` and 
`'Deepl' => Salmanbe\Deepl\Deepl::class,` from `config/app.php` if it was added.
Then Run `composer remove salmanbe/deepl` 

## License

This library is licensed under THE MIT License. Please see [License File](https://github.com/salmanbe/deepl/blob/master/LICENSE) for more information.

## Security contact information

To report a security vulnerability, follow [these steps](https://tidelift.com/security).