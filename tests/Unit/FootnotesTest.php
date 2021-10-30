<?php

declare(strict_types=1);

beforeEach(function () {
    $this->converter = converter('footnotes');
});

it('renders footnotes', function () {
    $footnote = '<a class="footnote-backref" rev="footnote" href="#fnref:note1"'
        .' role="doc-backlink">↩</a>';

    expect($this->converter->toHtml())->toContain($footnote);
});
