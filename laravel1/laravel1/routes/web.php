<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\Author;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentCotroller;
use App\Http\Controllers\CustomAuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
session_start();
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
 */
Route::controller(CommentCotroller::class)->group(function () {
    Route::post('auth/detail', 'store')->name('auth.store');
});

// [ArticleController::class,'store']
Route::post('createCMT/{user_id}{article_id}', function (Request $request,$user_id,$article_id) {
    if (!empty($_SESSION['id_user'])) {
        $comment = new CommentCotroller();
        $comment->addComment($request->comment,$user_id,$article_id);
        return redirect('auth/detail/'.$article_id);
    } else {
        echo "<script>alert('Dang nhap tai khoan moi binh luan duoc (Vui long dang nhap tai khoan)')</script>";
        return view('auth.login');
    }
});
Route::post('dn', [CustomAuthController::class, 'customLogin'])->name('dn');

Route::get('dashboard', [CustomAuthController::class, 'dashboard']);
Route::get('index', function () {
    return view('index');
});
Route::resource('admin/category', CategoryController::class);
Route::resource('admin/articles/article', ArticleController::class);
Route::get('login', [CustomAuthController::class, 'index'])->name('login');
Route::post('custom-login', [CustomAuthController::class, 'customLogin'])->name('login.custom');

Route::post('customLogin/{id}', [CustomAuthController::class, '']);
Route::get('registration', [CustomAuthController::class, 'registration'])->name('register-user');
Route::post('custom-registration', [CustomAuthController::class, 'customRegistration'])->name('register.custom');
Route::get('signout', [CustomAuthController::class, 'signOut'])->name('signout');
Route::controller(ImageController::class)->group(function () {
    Route::get('/image-upload', 'index')->name('image.form');
    Route::post('/upload-image', 'storeImage')->name('image.store');
});
Route::get('viewuser/{id}', [CustomAuthController::class, 'viewUser'])->name('viewuser.id');
Route::get('viewall', [CustomAuthController::class, 'viewAll'])->name('viewall');

// Display home 1
Route::get('auth/home-1', [ArticleController::class, 'DisplayHome1']);
Route::get('auth/most-comment', [ArticleController::class, 'mostComment'])->name('mostcomment');
Route::put('auth/change/{id}', [ArticleController::class, 'changePassword'])->name('auth.change.id');
Route::get('auth/listArticle_Category/{id}', [ArticleController::class, 'DisplayArticle_Category']);
Route::get('auth/detail/{id}', [ArticleController::class, 'show'])->name('auth.detail.id');
Route::get('auth/search', function () {
    return view('auth.search');
});
Route::get('auth/search_article', [ArticleController::class, 'Search_Article']);
Route::get('auth/featurednew', [ArticleController::class, 'getArticleDESC']);

//-------------------------  author
// lay tat ca author
Route::get('admin/getAllAuthor', function () {
    return view('admin.author');
});

//delete author
Route::get('delete/author/{id}', [Author::class, 'DeleteAuthor']);

// form them  author
Route::get('formadd/author', function () {
    return view('admin.addauthor');
});

// them author
Route::post('add/author', [Author::class, 'addAuthor']);

// form edit author
Route::get('formEdit/author/{id}', [Author::class, 'getAuthorID']);

// update author
Route::post('edit/author/{id}', [Author::class, 'editAuthor']);
