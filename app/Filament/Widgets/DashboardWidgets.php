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
            Stat::make('Professeurs', User::where('statut', 'professeur')->count())
                ->description('Le nombre total des Professeurs')
                ->descriptionIcon('heroicon-o-users')
                ->color('warning')->chart([7, 2, 10, 3, 15, 4, 17]),
            Stat::make('Secretaires', User::where('statut', 'secretaire')->count())
                ->description('Le nombre total des Secretaires')
                ->descriptionIcon('heroicon-o-users')->chart([1, 2, 2, 3, 8, 4, 17]),
            Stat::make('Parents', User::where('statut', 'parent')->count())
                ->description('Le nombre total des Parents')
                ->descriptionIcon('heroicon-o-users')
                ->color('info')->chart([1, 2, 27, 3, 8, 48, 17]),
        ];
    }
}
