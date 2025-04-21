<x-filament-widgets::widget>
    <style>
        .titre{
            font-size: 20px;
            font-weight: bold;
            color: orange;
        }
        .widgets{
            margin-top: 20px;
        }
    </style>
    <x-filament::section>
        <h1 class="titre">Widget pour les Utilisateurs</h1>
        <p>Ces Widgets representent les données KPI des utilisateurs </p>
        <p class="widgets">
            @livewire('users')
        </p>
    </x-filament::section>
</x-filament-widgets::widget>