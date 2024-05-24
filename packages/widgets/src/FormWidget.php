<?php

namespace Filament\Widgets;

use Filament\Forms;
use Illuminate\Contracts\Support\Htmlable;

abstract class FormWidget extends Widget implements Forms\Contracts\HasForms
{
    use Forms\Concerns\InteractsWithForms;

    protected static ?string $heading = null;

    protected static ?string $headerEnd = null;

    protected static ?string $description = null;

    public string $color = 'primary';

    public ?string $icon = '';

    public ?string $iconColor = null;

    public ?array $data = [];

    /**
     * @var view-string
     */
    protected static string $view = 'filament-widgets::form-widget';

    public function mount(): void
    {
        $this->form->fill();
    }

    public function form(Forms\Form $form): Forms\Form
    {
        return $form;
    }

    public function getSubmitLabel(): string
    {
        return __('Submit');
    }

    public function getHeading(): string | Htmlable | null
    {
        return static::$heading;
    }

    public function getHeaderEnd(): string | Htmlable | null
    {
        return static::$headerEnd;
    }

    public function getDescription(): string | Htmlable | null
    {
        return static::$description;
    }

    public function getColor(): string
    {
        return $this->color;
    }

    public function getIcon(): string
    {
        return $this->icon;
    }

    public function getIconColor(): string
    {
        return $this->iconColor ?? $this->color;
    }
}
