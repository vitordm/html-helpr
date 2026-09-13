# HTML-helpr

Helper para geração de HTML e formulários em PHP com foco em simplicidade e produtividade.

## Visão geral

Esta biblioteca oferece helpers de baixo acoplamento para montar tags, inputs, formulários e componentes Bootstrap com PHP.

## Requisitos

- PHP 8.0+
- Composer

## Instalação

```bash
composer require vtr/html-helpr
```

## Uso básico

```php
<?php

require 'vendor/autoload.php';

use Html\HtmlHelper;
use Html\FormHelper;

HtmlHelper::setBaseSite('https://example.com');

echo HtmlHelper::doctype();
echo HtmlHelper::tag('h1', 'Olá mundo', 'title');
echo FormHelper::input('text', 'username', 'form-control', 'username', null, 'Usuário');
```

## Helpers importantes

### Tag simples

```php
HtmlHelper::tag('hr');
HtmlHelper::tag('span', 'Texto', 'badge', 'status');
```

### Link com base site

```php
HtmlHelper::a('/sobre', 'Sobre nós');
```

### Formulário

```php
$form = FormHelper::open('login', 'form-horizontal', 'login-form', 'POST', '/login');
$form .= FormHelper::input('email', 'email', 'form-control', 'email', null, 'E-mail');
$form .= FormHelper::button('submit', 'btn btn-primary', 'submit-btn', 'Entrar');
$form .= FormHelper::close();
```

## Segurança

Todos os textos e atributos gerados pelos helpers são escapados para evitar injeção de HTML e de atributos.

## Observações

- A biblioteca mantém uma abordagem estática, compatível com uso simples em aplicações e templates.
- Novos helpers devem priorizar clareza, compatibilidade e testes.

by: Vítor Oliveira
