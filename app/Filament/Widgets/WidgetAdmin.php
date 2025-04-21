<?php

namespace App\Filament\Widgets;

use App\Models\User;
use Filament\Widgets\Widget;

class WidgetAdmin extends Widget
{
    protected static string $view = 'filament.widgets.widget-admin';
    // protected int|string|array $columnSpan = 'full';

    protected static ?int $sort = 1;

    public function getUsers():array
    {

        $profs = User::where('statut', 'professeur')->count();
        $etudiants = User::where('statut', 'etudiant')->count();
        return [
            'profs' => $profs,
            'etudiants' => $etudiants,
        ];
    }
}
