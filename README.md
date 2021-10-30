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

$document = (new Markdown())->with($markdown);
```

### FrontMatter

```php
$document->getFrontMatter();
```

### HTML

```php
$document->toHtml();
```
