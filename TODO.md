# TODO in PhpSlides/framework

## In `Route::map()` route, make the `file()` method accept direct file with direct path

## Remove `$root_dir` property in `Route()` class

## Warning: Undefined array key "HTTP_X_REQUESTED_WITH" in C:\xampp\htdocs\Projects\dconco\portfolio\vendor\phpslides\framework\src\Http\Request.php on line 365

## Deprecated as of 10.7.0. highlightBlock will be removed entirely in v12.0

## Deprecated as of 10.7.0. Please use highlightElement now

## Add `Render::WebRoute();` to the end of HotReload in `Application.php`

## In `Request::urlParam()` make quote also be serialized using ENT_QUOTES

## Add validation to `Request::urlParam()` in `api.php`

## Add view route to accept `VIEW|GET` request method

## Make withGuard() to check if it's empty, not checking from the array that does not exist

```php - api.php
$convertedValue = (is_bool($value) || $type === 'boolean')
    ? (bool) $sanitizedValue
        : ((is_double($value) || is_float($value) || $type === 'double')
            ? (float) $sanitizedValue
          : ((is_numeric($value) || is_int($value) || $type === 'integer')
              ? ((is_bool((int) $value))
                  ? (bool) $sanitizedValue
                   : ((is_double((int) $value) || is_float((int) $value))
              ? (float) $sanitizedValue : (int) $sanitizedValue))
              : $sanitizedValue));
```
