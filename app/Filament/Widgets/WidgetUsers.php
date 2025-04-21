<?php

namespace App\Filament\Widgets;

use Filament\Widgets\Widget;

class WidgetUsers extends Widget
{
    protected static string $view = 'filament.widgets.widget-users';
    protected int|string|array $columnSpan = 'full';

}
