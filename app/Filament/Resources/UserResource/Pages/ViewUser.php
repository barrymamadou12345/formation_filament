<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;
use Filament\Infolists;
use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Infolist;
use Filament\Infolists\Components\Section;
use Filament\Infolists\Components\TextEntry\TextEntrySize;
use Filament\Support\Enums\FontWeight;

class ViewUser extends ViewRecord
{
  protected static string $resource = UserResource::class;
  public function infolist(Infolist $infolist): Infolist


  {
    return $infolist
      ->schema([

        
        Section::make($this->record->prenom . ' ' . $this->record->nom)
        ->description("Les Information de l'utilisateur")
        ->schema([

            Section::make("Photo de profil")
              ->schema([
                ImageEntry::make('profil')->label("Photo de profil")->size(180)->circular()->alignCenter(),
              ])->collapsible(),

            TextEntry::make('prenom')->size(TextEntrySize::Large)
              ->weight(FontWeight::Bold),

            TextEntry::make('nom')
              ->size(TextEntrySize::Large)
              ->weight(FontWeight::Bold),

            TextEntry::make('email')->icon('heroicon-o-envelope')
              ->copyable()
              ->copyMessage('Copié !')
              ->iconColor("primary")->size(TextEntrySize::Large)
              ->weight(FontWeight::Bold),

            TextEntry::make('telephone')->label('Numéro de téléphone')
              ->icon('heroicon-o-phone-arrow-down-left')
              ->iconColor("primary")
              ->size(TextEntrySize::Large)
              ->weight(FontWeight::Bold),

            TextEntry::make('created_at')->label('Inscrit le')
              ->badge()->since()
              ->dateTimeTooltip()->size(TextEntrySize::Large)
              ->weight(FontWeight::Bold),
          ])->columns(3),

      ]);
  }

  protected function getHeaderActions(): array
  {
    return [
      Actions\EditAction::make()->label('Modifier')
      ->icon("heroicon-o-pencil-square")
      ->color('primary')->outlined(),
      Actions\DeleteAction::make()->label('Supprimer')
      ->icon("heroicon-o-trash")
      ->color('danger')->outlined(),
    ];
  }

}
