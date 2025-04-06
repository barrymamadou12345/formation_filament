<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use App\Mail\WelcomeUserMail;
use App\Models\User;
use Illuminate\Support\Str;
use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class CreateUser extends CreateRecord
{
  protected static string $resource = UserResource::class;

  protected function handleRecordCreation(array $data): User
  {
    // Génération du mot de passe
    $password = Str::random(8);
    $data['password'] = Hash::make($password);

    // Création de l'utilisateur
    try {
      $user = User::create($data);

      // Envoie du Mail
      Mail::to($user->email)->send(new WelcomeUserMail($user, $password));

      return $user;
    } catch (\Throwable $e) {

      // Supprimer l'utilisateur s'il existe
      if (isset($user) && $user instanceof User) {
        $user->delete();
      }

      throw new \Exception(" Une erreur est survenue lors de l'inscription de l'utilisateur : " . $data['email'] 
    . " Verifiez votre connexion internet !");
    }
  }

  protected function getCreatedNotification(): ?Notification
  {
    return Notification::make()
      ->success()
      ->title('Nouveau Utilisateur Inscrit')
      ->body("L'utilisateur a été crée avec succès vous pouvez consulter son profil");
  }

  protected function getRedirectUrl(): string
  {
    return $this->getResource()::getUrl('index');
  }
}
