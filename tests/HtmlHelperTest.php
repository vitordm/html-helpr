<?php

namespace Html\Tests;

use Html\FormHelper;
use Html\HtmlHelper;
use PHPUnit\Framework\TestCase;

class HtmlHelperTest extends TestCase
{
    public function testTagEscapesTextAndAttributes(): void
    {
        $html = HtmlHelper::tag(
            'span',
            '<script>alert(1)</script>',
            'btn btn-danger',
            'status',
            ['data-message' => 'A&B', 'aria-label' => '<hi>']
        );

        $this->assertSame(
            '<span class="btn btn-danger" id="status" data-message="A&amp;B" aria-label="&lt;hi&gt;">&lt;script&gt;alert(1)&lt;/script&gt;</span>',
            $html
        );
    }

    public function testFormInputGeneratesLabelAndAttributes(): void
    {
        $html = FormHelper::input(
            'email',
            'email_address',
            'form-control',
            'email_address',
            'user@example.com',
            'Email'
        );

        $this->assertStringContainsString('<label for="email_address">Email</label>', $html);
        $this->assertStringContainsString('type="email"', $html);
        $this->assertStringContainsString('name="email_address"', $html);
        $this->assertStringContainsString('value="user@example.com"', $html);
    }
}
