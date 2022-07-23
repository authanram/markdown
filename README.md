# Markdown

[WIP] Converts markdown into HTML.

```php
use Authanram\Markdown\Converter;

$html = (new Converter([
    'base_url' => 'https://base-url.test',
]))->withMarkdown($markdown)->toHtml();
```

Take a look at the directory `tests` if you'll want to find out more.
