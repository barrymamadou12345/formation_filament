<?php

namespace App\Filament\Resources\UserResource\Widgets;

use App\Models\User;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class UserWidgets extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Utilisateurs', User::count())
                ->description('Le nombre total des Utilisateurs')
                ->descriptionIcon('heroicon-o-users')
                ->color('success')->chart([7, 2, 8, 3, 4, 4, 17]),
            Stat::make('Etudiants', User::where('statut', 'etudiant')->count())
                ->description('Le nombre total des Etudiants')
                ->descriptionIcon('heroicon-o-users')
                ->color('danger')->chart([7, 2, 4, 3, 2, 4, 17]),
            Stat::make('Professeurs', User::where('statut', 'professeur')->count())
                ->description('Le nombre total des Professeurs')
                ->descriptionIcon('heroicon-o-users')
                ->color('warning')->chart([1, 2, 2, 3, 8, 4, 17]),
        ];
    }
}
