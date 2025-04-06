<?php

use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::redirect('/', '/admin/login');

Route::get('/test-email', function(){
  $user = [
    'nom' => 'Barry',
    'prenom' => 'Mamadou',
    'email' => 'mamadou54321barry@gmail.com'
  ];

  Mail::raw('Ceci est un test pour vérifier la configuration des e-mails, La methode avec un tableau!',
  function($message) use ($user){
    $message->to($user['email'])
            ->subject('Test de configuration Email');
  });

  return "L'email a été envoyé avec Succès !";
});

// Route::get('/', function () {
//     return view('welcome');
// });
