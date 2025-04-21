<?php

namespace App\Filament\Widgets;

use App\Models\User;
use Filament\Widgets\ChartWidget;

class WidgetCourbe extends ChartWidget
{
    protected static ?string $heading = 'Utilisateurs inscrits';
    protected static ?string $description = 'Nombre d\'utilisateurs inscrits par mois sur les 12 derniers mois';

    protected function getData(): array
    {


        $data = [];
        $labels = [];

        // On récupère les 12 derniers mois
        for($i = 11; $i >= 0; $i--){
            $date = now()->subMonths($i);
            $labels[] = $date->format('M');

            // Compte le nombre d'utilisateurs créés dans le mois
            $count = User::WhereYear('created_at', $date->year)
                ->WhereMonth('created_at', $date->month)
                ->count();
            $data[] = $count;
        }

        return [
            'datasets' => [
                [
                    'label' => 'Utilisateurs Inscrits',
                    'data' => $data,
                ],
            ],
            'labels' => $labels,
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
