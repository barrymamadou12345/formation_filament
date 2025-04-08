<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Filament\Resources\UserResource\Widgets\UserWidgets;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class UserResource extends Resource
{
  protected static ?string $model = User::class;

  protected static ?string $navigationIcon = 'heroicon-o-users';


  public static function form(Form $form): Form
  {
    return $form
      ->schema([
        Section::make("Informations personnelles")
          ->schema([
            TextInput::make('nom')->label("Nom")->placeholder("Nom de l'utilisateur")->required(),
            TextInput::make('prenom')->label("Prénom")->placeholder("Prénom de l'utilisateur")->required(),
            TextInput::make('email')->label("Email")->placeholder("Email de l'utilisateur")->required()->email()->unique(),
            TextInput::make('telephone')->label("Téléphone")->placeholder("Téléphone de l'utilisateur")->required(),
            Select::make('statut')->label("Statut")
              ->placeholder("Sélectionner le statut de l'utilisateur")
              ->options([
                'admin' => 'Administrateur',
                'directeur' => 'Directeur',
                'professeur' => 'Professeur',
                'secretaire' => 'Secrétaire',
                'etudiant' => 'Etudiant',
                'parent' => 'Parent',
              ])
              ->native(false)->required(),
            FileUpload::make('profil')->label("Photo de profil")->imagePreviewHeight('250px')->imageEditor()->circleCropper(),
          ])->columns(3),
      ]);
  }

  public static function table(Table $table): Table
  {
    return $table
      ->columns([
        ImageColumn::make('profil')->circular(),
        TextColumn::make('nom')->label("Nom"),
        TextColumn::make('prenom')->label("Prénom"),
        TextColumn::make('email')->label("Email"),
        TextColumn::make('telephone')->label("Télephone"),
      ])
      ->filters([
        //
      ])
      ->actions([
        Tables\Actions\ViewAction::make()->label("Infos")->color('success')->outlined()->button(),
        Tables\Actions\EditAction::make()->label("Modifier")->color('warning')->outlined()->button(),
        Tables\Actions\DeleteAction::make()->label("Supprimer")->color('danger')->outlined()->button(),
      ])
      ->bulkActions([
        Tables\Actions\BulkActionGroup::make([
          Tables\Actions\DeleteBulkAction::make(),
        ]),
      ]);
  }

  public static function getRelations(): array
  {
    return [
      //
    ];
  }

  // Gestion des Widgets
  public static function getWidgets(): array
  {
    return [
      UserWidgets::class,
    ];
  }

  public static function getPages(): array
  {
    return [
      'index' => Pages\ListUsers::route('/'),
      'create' => Pages\CreateUser::route('/create'),
      'edit' => Pages\EditUser::route('/{record}/edit'),
      'view' => Pages\ViewUser::route('/{record}/infos'),
    ];
  }
}
