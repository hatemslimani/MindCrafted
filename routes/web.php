<?php
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', function () {
    return view('index');
});
Auth::routes();
//admin route
Route::middleware(['is_admin', 'auth'])->prefix('admin')->group(function () 
{
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('controluser',[AdminController::class,'getusers']);
    Route::post('addGroup',[AdminController::class,'addGroup']);
    Route::get('controlGroup',[AdminController::class,'index']);
    Route::get('newusers',[AdminController::class,'getNewNumber']);
    Route::get('deleteuser/{id}',[AdminController::class,'DeleteUser']);
    Route::put('updateGat/{id}',[AdminController::class,'updateGatg']);
    Route::get('deleteGroup/{id}',[AdminController::class,'deleteGroupe']);
    Route::post('updateNameGroupe/{id}',[AdminController::class,'updateNameGroupe']);
    Route::prefix('infoGroup')->group(function(){
        Route::get('/{id}',[AdminController::class,'infoGroup']);
        Route::get('delete_studiant_from_group/{id}',[AdminController::class,'delete_studiant_from_group']);
        Route::get('delete_section_from_group/{id}',[AdminController::class,'delete_section_from_group']);
        Route::post('addteacher/{id}',[AdminController::class,'addteacher']);
        Route::post('affecterEtucdiant/{id}',[AdminController::class,'affecterEtucdiant']);
    });
    
});
//teacher route
Route::middleware(['is_Teacher', 'auth'])->prefix('teacher')->group(function () 
{
    Route::get('/', 'HomeController@index')->name('home');
    Route::prefix('mesCours')->group(function () 
    {
        Route::get('/', [TeacherController::class, 'getsection']);
        Route::get('/{id}', [TeacherController::class, 'getInfo']);
        Route::post('addCours/{id}', [TeacherController::class, 'addCours']);
        Route::post('addExam/{id}', [TeacherController::class, 'addExam']);
        Route::post('addTest/{id}', [TeacherController::class, 'addTest']);
        Route::get('pdf/{id}', [TeacherController::class, 'generate']);

        // Routes pour les examens
        Route::prefix('viewExam')->group(function () 
        {
            Route::get('/{id}', [TeacherController::class, 'viewExam']);
            Route::post('addQuestion/{id}', [TeacherController::class, 'addQuestion']);
        });

        // Routes pour les tests
        Route::prefix('viewTest')->group(function () 
        {
            Route::get('/{id}', [TeacherController::class, 'viewTest']);
            Route::post('addQuestionTest/{id}', [TeacherController::class, 'addQuestionTest']);
        });
    });
});
//studiant route
Route::middleware(['is_Studiant', 'auth'])->prefix('home')->group(function () 
{
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/cours/{id}',[UserController::class,'genratePdf']);
    Route::get('/historique/{id}',[UserController::class,'getHistorique']);
   Route::prefix('mesCours')->group(function () 
    {
        Route::get('/',[UserController::class,'getMesSection']);
        Route::get('/{id}',[UserController::class,'getMesCours']);
        Route::prefix('examen')->group(function () {
            Route::get('/{id}',[UserController::class,'getExam']);
            Route::get('/storeOptionExam/{id}',[UserController::class,'storeOptionExam']);
        });
        
        Route::prefix('test')->group(function () {
            Route::get('/{id}',[UserController::class,'getTest']);
            Route::get('/storeOptiontest/{id}',[UserController::class,'storeOptiontest']);
        });
    });
    
});
// Route pour le profil
Route::middleware(['auth'])->group(function () {
    Route::get('/profile', 'UserController@profile')->name('profile');
    Route::put('/profile/update', 'UserController@updateProfile')->name('profile.update');
});