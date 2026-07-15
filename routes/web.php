<?php

use App\Http\Controllers\v1\Frontend\FrontendController;
use Illuminate\Support\Facades\Route;

Route::get('/', [FrontendController::class, 'home'])->name('home');
Route::get('/about/our-clients', [FrontendController::class, 'clients'])->name('our-clients');
Route::get('/about/why-choose-us', [FrontendController::class, 'whyChoose'])->name('why-us');
Route::get('/page/contact-us', [FrontendController::class, 'contactUs'])->name('contact');
Route::get('/page/certificates', [FrontendController::class, 'getCartificatePage'])->name('certificates');
Route::get('/page/our-business', [FrontendController::class, 'ourBusiness'])->name('our-business');
Route::get('/about/our-team', [FrontendController::class, 'team'])->name('our-team');
Route::get('/about/our-story', [FrontendController::class, 'ourStory'])->name('our-story');
Route::get('/about/our-gallery', [FrontendController::class, 'gallery'])->name('gallery');

Route::post('/contact/query', [FrontendController::class, 'contactSubmit'])->name('contact.form.submit');

Route::get('/service-area', [FrontendController::class, 'serviceArea'])->name('service.area');
Route::get('/service-area/{area_slug}', [FrontendController::class, 'singleServiceArea'])->name('single.service.area');

Route::get('/page/blog', [FrontendController::class, 'blogs'])->name('blogs');
Route::get('/blog/{slug}', [FrontendController::class, 'singleBlog'])->name('single.blog');
Route::get('/blog/category/{slug}', [FrontendController::class, 'categoryBlog'])->name('category.blog');

Route::get('/product/our-product-list', [FrontendController::class, 'productList'])->name('product-list');

Route::get('/service/category/{category_slug}', [FrontendController::class, 'categoryServices'])->name('category.services');
Route::get('/{slug}', [FrontendController::class, 'serviceDetail'])->name('service.detail');
Route::get('/project/{slug}', [FrontendController::class, 'projectDetail'])->name('project-details');

Route::get('/page/services', [FrontendController::class, 'services'])->name('services');
Route::get('/page/projects', [FrontendController::class, 'projects'])->name('projects');
Route::get('/page/{page}', [FrontendController::class, 'getPage'])->name('page')->where('page', '^(?!blog|services|projects|contact-us).*$');
