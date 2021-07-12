<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\account\AccountController;
use App\Http\Controllers\Blog\BlogCategoryController;
use App\Http\Controllers\Blog\BlogCommentController;
use App\Http\Controllers\Blog\BlogTagController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\customer\UCustomerController;
use App\Http\Controllers\Blog\BlogController;
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


Route::get('/', [UserController::class,'blog'])->name('home'); //Welcome Blade (redirect to login)

Route::get('/register',[UserController::class, 'register'])->name('reg.register');//Registration
Route::post('/auth/save',[UserController::class, 'save'])->name('auth.save'); //Registration Save
Route::get('/login',[LoginController::class, 'index'])->name('login.index');//Login
Route::post('/auth/check',[LoginController::class, 'verify'])->name('auth.check');//Login verification
Route::get('/logout',[LogoutController::class, 'logout'])->name('auth.logout');//Logout



// Blog
//Route::get('/blog',[UserController::class,'blog'])->name('blog');
Route::get('/blog-detail/{slug}',[UserController::class,'blogDetail'])->name('blog.detail');
Route::get('/blog/search',[UserController::class,'blogSearch'])->name('blog.search');
Route::post('/blog/filter',[UserController::class,'blogFilter'])->name('blog.filter');
Route::get('blog-cat/{slug}',[UserController::class,'blogByCategory'])->name('blog.category');
Route::get('blog-tag/{slug}',[UserController::class,'blogByTag'])->name('blog.tag');


// Post Comment 
Route::post('Blog/{slug}/comment',[BlogCommentController::class,'store'])->name('post-comment.store')->middleware('sess');






       
        

//Account routing Start
Route::group(['prefix'=>'/user','middleware'=>['sess']],function(){
    

   Route::get('/dashboard',[UCustomerController::class, 'userdashboard'])->name('user.dashboard');

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
Route::group(['prefix'=>'/admin','middleware'=>['sess','admin']],function(){
    
    Route::get('/dashboard',[AccountController::class, 'accountdashboard'])->name('admin.dashboard');


    //Accont ->profile
    Route::get("/dashboard/profile",[AccountController::class,'profile'])->name('admin.profile');
    Route::get("/dashboard/editprofile/{id}",[AccountController::class,'edit'])->name('admin.edit');
    Route::post("/dashboard/editprofile/{id}",[AccountController::class,'update'])->name('admin.update');


     //Account -> BLOG category
     Route::get('/blog-category', [BlogCategoryController::class,'index'])->name('admin.blog.cat');
     Route::get('/blog-category/create', [BlogCategoryController::class,'create'])->name('admin.blog.create.cat');
     Route::post('/blog-category/store',[BlogCategoryController::class,'store'])->name('admin.blog.store.cat');
        Route::get('/blog-category/edit/{id}',[BlogCategoryController::class,'edit'])->name('admin.blog.edit.cat');
        Route::patch('/blog-category/update/{id}',[BlogCategoryController::class,'update'])->name('admin.blog.update.cat');
        Route::delete('/blog-category/delete/{id}',[BlogCategoryController::class,'destroy'])->name('admin.blog.delete.cat');
     
        //Account -> BLOG tag
     Route::get('/blog-tag', [BlogTagController::class,'index'])->name('admin.blog.tag');
     Route::get('/blog-tag/create', [BlogTagController::class,'create'])->name('admin.blog.create.tag');
     Route::post('/blog-tag/store',[BlogTagController::class,'store'])->name('admin.blog.store.tag');
        Route::get('/blog-tag/edit/{id}',[BlogTagController::class,'edit'])->name('admin.blog.edit.tag');
        Route::patch('/blog-tag/update/{id}',[BlogTagController::class,'update'])->name('admin.blog.update.tag');
        Route::delete('/blog-tag/delete/{id}',[BlogTagController::class,'destroy'])->name('admin.blog.delete.tag');
    
        //Account -> BLOG
     Route::get('/blog', [BlogController::class,'index'])->name('blog.index');
     Route::get('/blog/create', [BlogController::class,'create'])->name('admin.create.blog');
     Route::post('/blog/store',[BlogController::class,'store'])->name('admin.store.blog');
        Route::get('/blog/edit/{id}',[BlogController::class,'edit'])->name('admin.edit.blog');
        Route::post('/blog/update/{id}',[BlogController::class,'update'])->name('admin.update.blog');
        Route::delete('/blog/delete/{id}',[BlogController::class,'destroy'])->name('admin.delete.blog');

        //Account ->Website details Settings
    Route::get('settings',[SettingsController::class,'settings'])->name('settings');
    Route::post('setting/update',[SettingsController::class,'settingsUpdate'])->name('settings.update');

    //Account ->Blog Comment crud
    Route::get('/comment',[BlogCommentController::class,'index'])->name('admin.comment');
      Route::post('/comment/store',[BlogCommentController::class,'store'])->name('admin.comment.store');
      Route::get('/comment/edit/{id}',[BlogCommentController::class,'edit'])->name('admin.comment.edit');
      Route::post('/comment/update/{id}',[BlogCommentController::class,'update'])->name('admin.comment.update');
      Route::delete('/comment/delete/{id}',[BlogCommentController::class,'destroy'])->name('admin.comment.delete');
      });
//Account routing END