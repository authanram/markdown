# Markdown

...

## Basic Usage

```php
use Authanram\Markdown\Markdown;

$markdown = <<<MD
---
index:
    First:
        first-link: First Link
        second-link: Second Link
    Second
        third-link: Third Link 
        fourth-link: Fourth Link
---
 
# Document Headline
MD;

$config = [
    // See ### Config
];

$document = (new Markdown($config)->with($markdown);
```

### FrontMatter

```php
$document->getFrontMatter();
```

### HTML

```php
$document->toHtml();
```

### Config

```php
$config = [

    'base_url' => 'https://docs.test/docs',

    'plugins' => [
        Plugins\AutoLinks::class,
        Plugins\DefaultAttributes::class,
        Plugins\ExternalLinks::class,
        Plugins\FootNote::class,
        Plugins\FrontMatter::class,
        Plugins\Mentions::class,
        Plugins\TaskList::class,
    ],

    'renderer' => [
        'block_separator' => "\n",
        'inner_separator' => "\n",
        'soft_break'      => "\n",
    ],

    'commonmark' => [
        'enable_em' => true,
        'enable_strong' => true,
        'use_asterisk' => true,
        'use_underscore' => true,
        'unordered_list_markers' => ['-', '*', '+'],
    ],

    'html_input' => 'escape',

    'allow_unsafe_links' => false,

    'max_nesting_level' => PHP_INT_MAX,

    'slug_normalizer' => [
        'max_length' => 255,
    ],

];
```
