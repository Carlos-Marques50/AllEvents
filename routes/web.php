<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventoController;
use Doctrine\DBAL\Driver\Middleware;
use Illuminate\Support\Facades\Redirect;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Rota da pagina Principal
Route::get("/",[EventoController::class, "index"])->name("index");

//Rota para o formulario de criar evento
Route::get("eventos/create",[EventoController::class, "create"])->name("create")->middleware("auth");

// Rota para inserir evento no DataBase
Route::post("evento",[EventoController::class, "store"])->name("story");

//Rota para mostrar os detalhes dos eventos. 
Route::get('eventos/detalhes/{id}',[EventoController::class, "show"])->name("show");

//Rota para o Meus Evento(Dashboard)
Route::get("eventos/dashboard",[EventoController::class, "dashboard"])->name("dashboard")->middleware("auth");

//Rota para fazer Logout
Route::get('sair',[EventoController::class, "logout"])->name("sair");

//Rota para Deletar os eventos no DataBase
Route::delete("eventos/{id}",[EventoController::class, "destroy"])->name("deletar")->middleware("auth");

//Rota para Editar Evento postado
Route::get("eventos/editar/{id}",[EventoController::class, "edit"])->name("editar")->middleware("auth");

//Rota para actulizar dados(Eventos) no DataBase
Route::put("update/{id?}",[EventoController::class, "update"])->name("update")->middleware("auth");