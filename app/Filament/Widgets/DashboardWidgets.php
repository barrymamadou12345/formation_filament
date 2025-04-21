<?php

namespace App\Filament\Widgets;

use App\Models\User;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class DashboardWidgets extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Utilisateurs', User::count())
                ->description('Le nombre total des Utilisateurs')
                ->descriptionIcon('heroicon-o-users')
                ->color('success')->chart([7, 2, 8, 3, 4, 4, 17]),
            Stat::make('Admins', User::where('statut', 'admin')->count())
                ->description('Le nombre total des Admins')
                ->descriptionIcon('heroicon-o-users')
                ->color('info')->chart([7, 2, 10, 3, 15, 4, 17]),
            Stat::make('Etudiants', User::where('statut', 'etudiant')->count())
                ->description('Le nombre total des Etudiants')
                ->descriptionIcon('heroicon-o-users')
                ->color('danger')->chart([7, 2, 4, 3, 2, 4, 17]),
        ];
    }
}
