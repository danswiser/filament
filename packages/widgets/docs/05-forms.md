---
title: Form widgets
---

## Overview

Filament comes with a "form" widget template, which you can use to display a form in a single widget, without needing to write a custom view.

Start by creating a widget with the command:

```bash
php artisan make:filament-widget SubmitForm --form
```

This command will create a new `SubmitForm.php` file. Open it, and add your form schema like you would with filament/forms:

```php
<?php

namespace App\Filament\Widgets;

use Filament\Forms;
use Filament\Widgets\FormWidget;

class SubmitForm extends FormWidget
{
    public string $color = 'primary';

    public ?string $icon = '';

    public ?string $iconColor = null;

    public ?array $data = [];

    public function form(Forms\Form $form): Forms\Form
    {
        return $form
            ->schema([
                // ...
            ])
            ->statePath('data');
    }

    public function submit()
    {
        // $data = $this->form->getState();
    }

    public function getSubmitLabel(): string
    {
        return __('Submit');
    }
}
```

Now, check out your widget in the dashboard.

## Customizing the widget component

The widget form is wrapped in a (Filament Section Blade component)[https://filamentphp.com/docs/3.x/support/blade-components/section]. Some of the slots are available to you. 

```php
use Illuminate\Contracts\Support\Htmlable;

    public function getHeading(): string | Htmlable | null
    {
        return 'This is my heading';
    }

    public function getDescription(): string | Htmlable | null
    {
        return 'This is my description.';
    }

    public function getIcon(): string
    {
        return 'heroicon-o-document-check';
    }

    public function getIconColor(): string
    {
        return 'primary';
    }
```

## Disabling lazy loading

By default, widgets are lazy-loaded. This means that they will only be loaded when they are visible on the page.

To disable this behavior, you may override the `$isLazy` property on the widget class:

```php
protected static bool $isLazy = false;
```
