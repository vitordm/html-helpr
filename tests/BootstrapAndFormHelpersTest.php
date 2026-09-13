<?php

namespace Html\Tests;

use Html\BootstrapHelper;
use Html\FormHelper;
use Html\HtmlHelper;
use PHPUnit\Framework\TestCase;

class BootstrapAndFormHelpersTest extends TestCase
{
    public function testBootstrapPanelAndPageHeader(): void
    {
        $panel = BootstrapHelper::panel('primary', 'Conteúdo');
        $header = BootstrapHelper::page_header('Dashboard');

        $this->assertStringContainsString('panel panel-primary', $panel);
        $this->assertStringContainsString('Conteúdo', $panel);
        $this->assertStringContainsString('<h1', $header);
        $this->assertStringContainsString('Dashboard', $header);
    }

    public function testSelectAndTextareaRenderExpectedHtml(): void
    {
        $options = ['br' => 'Brasil', 'us' => 'Estados Unidos'];
        $select = FormHelper::select('country', 'form-control', 'country', $options, 'us', 'País');

        $this->assertStringContainsString('<label for="country">País</label>', $select);
        $this->assertStringContainsString('name="country"', $select);
        $this->assertStringContainsString('value=&quot;us&quot;', $select);
        $this->assertStringContainsString('selected=&quot;selected&quot;', $select);

        $textarea = FormHelper::textarea('bio', 'form-control', 'bio', '<script>alert(1)</script>', 'Bio');
        $this->assertStringContainsString('&lt;script&gt;alert(1)&lt;/script&gt;', $textarea);
        $this->assertStringContainsString('name="bio"', $textarea);
    }

    public function testBasicHelpersAndBaseSite(): void
    {
        HtmlHelper::setBaseSite('https://example.com');

        $link = HtmlHelper::a('/docs', 'Docs');
        $this->assertSame('https://example.com/docs', HtmlHelper::url('/docs'));
        $this->assertStringContainsString('href="https://example.com/docs"', $link);
        $this->assertStringContainsString('>Docs</a>', $link);
    }
}
