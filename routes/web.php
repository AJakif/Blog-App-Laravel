<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\account\AccountController;
use App\Http\Controllers\account\Blog\BlogCategoryController;
use App\Http\Controllers\account\Blog\BlogCommentController;
use App\Http\Controllers\account\Blog\BlogTagController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\customer\UCustomerController;
use App\Http\Controllers\account\Blog\BlogController;
use App\Http\Controllers\account\SettingsController;


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


Route::get('/', [UserController::class,'home'])->name('home'); //Welcome Blade (redirect to login)

Route::get('/register',[UserController::class, 'register'])->name('reg.register');//Registration
Route::post('/auth/save',[UserController::class, 'save'])->name('auth.save'); //Registration Save
Route::get('/login',[LoginController::class, 'index'])->name('login.index');//Login
Route::post('/auth/check',[LoginController::class, 'verify'])->name('auth.check');//Login verification
Route::get('/logout',[LogoutController::class, 'logout'])->name('auth.logout');//Logout



// Blog
Route::get('/blog',[UserController::class,'blog'])->name('blog');
Route::get('/blog-detail/{slug}',[UserController::class,'blogDetail'])->name('blog.detail');
Route::get('/blog/search',[UserController::class,'blogSearch'])->name('blog.search');
Route::post('/blog/filter',[UserController::class,'blogFilter'])->name('blog.filter');
Route::get('blog-cat/{slug}',[UserController::class,'blogByCategory'])->name('blog.category');
Route::get('blog-tag/{slug}',[UserController::class,'blogByTag'])->name('blog.tag');


// Post Comment 
Route::post('Blog/{slug}/comment',[BlogCommentController::class,'store'])->name('post-comment.store')->middleware('sess');






       
        

//Account routing Start
Route::group(['prefix'=>'/user','middleware'=>['sess']],function(){
    
   Route::get('/dashboard',[AccountController::class, 'accountdashboard'])->name('account.dashboard');



  //User Blog comment
  Route::get('blog/comment',[UCustomerController::class, 'userComment'])->name('user.blog-comment.index');
  Route::delete('blog/comment/delete/{id}',[UCustomerController::class, 'userCommentDelete'])->name('user.blog-comment.delete');
  Route::get('blog/comment/edit/{id}',[UCustomerController::class, 'userCommentEdit'])->name('user.blog-comment.edit');
  Route::patch('blog/comment/udpate/{id}',[UCustomerController::class, 'userCommentUpdate'])->name('user.blog-comment.update');
  
     });


//**************** */
//**************** */
//**************** */


//Account routing Start
Route::group(['prefix'=>'/admin','middleware'=>['sess','account']],function(){
    
    Route::get('/dashboard',[AccountController::class, 'accountdashboard'])->name('account.dashboard');


    //Accont ->profile
    Route::get("/dashboard/profile",[AccountController::class,'profile'])->name('account.profile');
    Route::get("/dashboard/editprofile/{id}",[AccountController::class,'edit'])->name('account.edit');
    Route::post("/dashboard/editprofile/{id}",[AccountController::class,'update'])->name('account.update');


     //Account -> BLOG category
     Route::get('/blog-category', [BlogCategoryController::class,'index'])->name('account.blog.cat');
     Route::get('/blog-category/create', [BlogCategoryController::class,'create'])->name('account.blog.create.cat');
     Route::post('/blog-category/store',[BlogCategoryController::class,'store'])->name('account.blog.store.cat');
        Route::get('/blog-category/edit/{id}',[BlogCategoryController::class,'edit'])->name('account.blog.edit.cat');
        Route::patch('/blog-category/update/{id}',[BlogCategoryController::class,'update'])->name('account.blog.update.cat');
        Route::delete('/blog-category/delete/{id}',[BlogCategoryController::class,'destroy'])->name('account.blog.delete.cat');
     
        //Account -> BLOG tag
     Route::get('/blog-tag', [BlogTagController::class,'index'])->name('account.blog.tag');
     Route::get('/blog-tag/create', [BlogTagController::class,'create'])->name('account.blog.create.tag');
     Route::post('/blog-tag/store',[BlogTagController::class,'store'])->name('account.blog.store.tag');
        Route::get('/blog-tag/edit/{id}',[BlogTagController::class,'edit'])->name('account.blog.edit.tag');
        Route::patch('/blog-tag/update/{id}',[BlogTagController::class,'update'])->name('account.blog.update.tag');
        Route::delete('/blog-tag/delete/{id}',[BlogTagController::class,'destroy'])->name('account.blog.delete.tag');
    
        //Account -> BLOG
     Route::get('/blog', [BlogController::class,'index'])->name('blog.index');
     Route::get('/blog/create', [BlogController::class,'create'])->name('account.create.blog');
     Route::post('/blog/store',[BlogController::class,'store'])->name('account.store.blog');
        Route::get('/blog/edit/{id}',[BlogController::class,'edit'])->name('account.edit.blog');
        Route::post('/blog/update/{id}',[BlogController::class,'update'])->name('account.update.blog');
        Route::delete('/blog/delete/{id}',[BlogController::class,'destroy'])->name('account.delete.blog');

        //Account ->Website details Settings
    Route::get('settings',[SettingsController::class,'settings'])->name('settings');
    Route::post('setting/update',[SettingsController::class,'settingsUpdate'])->name('settings.update');

    //Account ->Blog Comment crud
    Route::get('/comment',[BlogCommentController::class,'index'])->name('account.comment');
      Route::post('/comment/store',[BlogCommentController::class,'store'])->name('account.comment.store');
      Route::get('/comment/edit/{id}',[BlogCommentController::class,'edit'])->name('account.comment.edit');
      Route::post('/comment/update/{id}',[BlogCommentController::class,'update'])->name('account.comment.update');
      Route::delete('/comment/delete/{id}',[BlogCommentController::class,'destroy'])->name('account.comment.delete');
      });
//Account routing END