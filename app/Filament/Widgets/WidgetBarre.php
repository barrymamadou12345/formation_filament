<?php

namespace App\Filament\Widgets;

use App\Models\User;
use Filament\Widgets\ChartWidget;

class WidgetBarre extends ChartWidget
{
    protected static ?string $heading = 'Utilisateurs par Statut';
    protected static ?string $description = 'Nombre d\'utilisateurs par statut';

    protected function getData(): array
    {
        $status = ['admin', 'directeur', 'professeur', 'secretaire', 'etudiant', 'parent'];
        $data = [];

        foreach ($status as $statut) {
            $count = User::where('statut', $statut)->count();
            $data[] = $count;
        }
        return [

            'datasets' => [
                [
                    'label' => 'Nombre d\'utilisateurs',
                    'data' => $data,
                    'backgroundColor' => [
                        'rgba(255, 99, 132)',
                        'rgba(54, 162, 235)',
                        'rgba(255, 206, 86)',
                        'rgba(75, 192, 192)',
                        'rgba(153, 102, 255)',
                        'rgba(255, 159, 64)',
                    ],
                ],
            ],
            'labels' => $status,
        ];
    }

    protected function getOptions(): array
    {
        return [
            'plugins' => [
                'legend' => [
                    'display' => true,
                ],
            ],

        ];
    }
    protected function getType(): string
    {
        return 'bar';
    }
}
