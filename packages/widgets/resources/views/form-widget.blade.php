<x-filament::widget>
    <form wire:submit.prevent="submit">
        <x-filament::section icon="{{ $this->getIcon() }}" icon-color="{{ $this->getIconColor() }}">

            @if ($this->getHeading())
                <x-slot name="heading">
                    {{ $this->getHeading() }}
                </x-slot>
            @endif

            @if ($this->getHeaderEnd())
                <x-slot name="headerEnd">
                    {{ $this->getHeaderEnd() }}
                </x-slot>
            @endif

            @if ($this->getDescription())
                <x-slot name="description">
                    {{ $this->getDescription() }}
                </x-slot>
            @endif

            {{ $this->form }}

            <div class="flex items-center justify-end pt-6">
                <x-filament::button color="{{ $this->getColor() }}" type="submit">
                    {{ __('Submit') }}
                </x-filament::button>
            </div>

        </x-filament::section>
    </form>
    <x-filament-actions::modals />
</x-filament::widget>
