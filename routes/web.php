<?php 
use Illuminate\Support\Facades\Route;

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


Route::get('/', 'WelcomeController@showWelcomeView')->name('welcome-view');
Route::get('/todo/create', 'todo\ToDoController@showCreateView')->name('todo-create-view');
Route::post('/todo/create', 'todo\ToDoController@createToDo')->name('todo-create');
Route::get('/todo/list', 'todo\ToDoController@showToDo')->name('todo-show-view');
Route::get('/todo/edit/{id}', 'todo\ToDoController@updateToDoView')->name('todo-update-view');
Route::post('/todo/edit/', 'todo\ToDoController@updateToDo')->name('todo-update');
Route::get('/todo/delete/{id}', 'todo\ToDoController@deleteToDo')->name('todo-delete');

?>