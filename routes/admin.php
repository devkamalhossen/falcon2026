<?php

use App\Http\Controllers\v1\Backend\Admin\AdminController;
use App\Http\Controllers\v1\Backend\Authentication\AuthController;
use App\Http\Controllers\v1\Backend\Authorization\RoleManageController;
use App\Http\Controllers\v1\Backend\Blog\BlogCategoryController;
use App\Http\Controllers\v1\Backend\Blog\BlogController;
use App\Http\Controllers\v1\Backend\Business\BusinessCategoryController;
use App\Http\Controllers\v1\Backend\Business\BusinessController;
use App\Http\Controllers\v1\Backend\CMS\AboutContentController;
use App\Http\Controllers\v1\Backend\CMS\AchievementContentController;
use App\Http\Controllers\v1\Backend\CMS\AchievementController;
use App\Http\Controllers\v1\Backend\CMS\AchievementSliderController;
use App\Http\Controllers\v1\Backend\CMS\CertificateBadgeController;
use App\Http\Controllers\v1\Backend\CMS\CertificationsController;
use App\Http\Controllers\v1\Backend\CMS\ClientController;
use App\Http\Controllers\v1\Backend\CMS\CompanyFilesController;
use App\Http\Controllers\v1\Backend\CMS\CoreValueController;
use App\Http\Controllers\v1\Backend\CMS\FounderMessageController;
use App\Http\Controllers\v1\Backend\CMS\GalleryCategoryController;
use App\Http\Controllers\v1\Backend\CMS\GalleryController;
use App\Http\Controllers\v1\Backend\CMS\GoogleReviewController;
use App\Http\Controllers\v1\Backend\CMS\HomeCategoryIntroController;
use App\Http\Controllers\v1\Backend\CMS\HomeIntroController;
use App\Http\Controllers\v1\Backend\CMS\ImportController;
use App\Http\Controllers\v1\Backend\CMS\LocationController;
use App\Http\Controllers\v1\Backend\CMS\ManageCustomerMessageController;
use App\Http\Controllers\v1\Backend\CMS\PageController;
use App\Http\Controllers\v1\Backend\CMS\ServiceAreaController;
use App\Http\Controllers\v1\Backend\CMS\SocialMediaController;
use App\Http\Controllers\v1\Backend\CMS\TeamController;
use App\Http\Controllers\v1\Backend\CMS\TeamTypeController;
use App\Http\Controllers\v1\Backend\CMS\VisionMisionController;
use App\Http\Controllers\v1\Backend\CMS\WhyChooseUsController;
use App\Http\Controllers\v1\Backend\Home\HomeBannerController;
use App\Http\Controllers\v1\Backend\Pages\CertificationPageController;
use App\Http\Controllers\v1\Backend\Pages\ClientPageController;
use App\Http\Controllers\v1\Backend\Pages\ContactPageController;
use App\Http\Controllers\v1\Backend\Pages\OurBusinessPageController;
use App\Http\Controllers\v1\Backend\Pages\OurStoryPageController;
use App\Http\Controllers\v1\Backend\Pages\ServiceAreaPageController;
use App\Http\Controllers\v1\Backend\Pages\ServicePageController;
use App\Http\Controllers\v1\Backend\Pages\TeamPageController;
use App\Http\Controllers\v1\Backend\Pages\WhyChoosePageController;
use App\Http\Controllers\v1\Backend\Product\ProductCategoryController;
use App\Http\Controllers\v1\Backend\Product\ProductController;
use App\Http\Controllers\v1\Backend\Project\ProjectController;
use App\Http\Controllers\v1\Backend\Project\ProjectGalleryController;
use App\Http\Controllers\v1\Backend\Service\ServiceBenefitController;
use App\Http\Controllers\v1\Backend\Service\ServiceCategoryController;
use App\Http\Controllers\v1\Backend\Service\ServiceController;
use App\Http\Controllers\v1\Backend\Service\ServiceDescriptionController;
use App\Http\Controllers\v1\Backend\Service\ServiceFAQController;
use App\Http\Controllers\v1\Backend\Service\ServiceFeatureController;
use App\Http\Controllers\v1\Backend\Service\ServiceGalleryController;
use App\Http\Controllers\v1\Backend\Service\ServiceUsageAreaController;
use App\Http\Controllers\v1\Backend\Setting\GeneralSettingController;
use App\Http\Controllers\v1\Backend\Setting\ProfileController;
use Illuminate\Support\Facades\Route;


Route::get('login', [AuthController::class, 'loginForm'])->name('admin.login');
Route::post('login', [AuthController::class, 'login'])->name('admin.login');
Route::get('forgot-password', [AuthController::class, 'forgotPasswordForm'])->name('admin.forgot.password');
Route::post('verify-password', [AuthController::class, 'verifyEmail'])->name('admin.password.email');
Route::get('reset-password', [AuthController::class, 'resetPasswordForm'])->name('admin.reset.password');
Route::post('reset-password', [AuthController::class, 'resetPassword'])->name('admin.reset-password.update');


Route::middleware(['admin'])->group(function () {
    Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::post('/profile/update/{admin}', [ProfileController::class, 'update'])->name('profile.update');
    Route::post('/profile/password/update/{admin}', [ProfileController::class, 'updatePassword'])->name('profile.password.update');
    // Route::get('check', [AuthController::class, 'check']);
    // Route::get('permissions', [AuthController::class, 'permissions']);
    Route::post('/logout', [AuthController::class, 'logout'])->name('admin.logout');

    Route::resource('/role', RoleManageController::class)->middleware('permission:role');
    Route::get('/role/status/update/{role}', [RoleManageController::class, 'statusUpdate'])->name('role.status.update')->middleware('permission:role');

    Route::resource('/user', AdminController::class)->middleware('permission:admin');
    Route::get('/user/status/update/{user}', [AdminController::class, 'statusUpdate'])->name('user.status.update')->middleware('permission:admin');

    Route::resource('/banner', HomeBannerController::class)->middleware('permission:banner');
    Route::get('/banner/status/update/{banner}', [HomeBannerController::class, 'statusUpdate'])->name('banner.status.update')->middleware('permission:banner');

    Route::resource('/social', SocialMediaController::class)->middleware('permission:social');
    Route::get('/social/status/update/{social}', [SocialMediaController::class, 'statusUpdate'])->name('social.status.update')->middleware('permission:social');

    Route::resource('/client', ClientController::class)->middleware('permission:client');
    Route::get('/client/status/update/{client}', [ClientController::class, 'statusUpdate'])->name('client.status.update')->middleware('permission:client');
    Route::resource('/certification', CertificationsController::class);
    Route::get('/certification/status/update/{certification}', [CertificationsController::class, 'statusUpdate'])->name('certification.status.update');

    Route::get('page/client', [ClientPageController::class, 'index'])->name('page.client')->middleware('permission:page.client');
    Route::put('page/client/update/{client?}', [ClientPageController::class, 'update'])->name('page.client.update')->middleware('permission:page.client');
    Route::get('page/team', [TeamPageController::class, 'index'])->name('page.team')->middleware('permission:page.team');
    Route::put('page/team/update/{team?}', [TeamPageController::class, 'update'])->name('page.team.update')->middleware('permission:page.team');
    Route::get('page/why-choose-us', [WhyChoosePageController::class, 'index'])->name('page.why.choose')->middleware('permission:page.why.choose');
    Route::put('page/why-choose-us/update/{why_choose?}', [WhyChoosePageController::class, 'update'])->name('page.why.choose.update')->middleware('permission:page.why.choose');
    Route::get('page/contact', [ContactPageController::class, 'index'])->name('page.contact')->middleware('permission:page.contact');
    Route::put('page/contact/update/{contact?}', [ContactPageController::class, 'update'])->name('page.contact.update')->middleware('permission:page.contact');

    Route::get('page/certificate', [CertificationPageController::class, 'index'])->name('page.certificate');
    Route::put('page/certificate/update/{certificate?}', [CertificationPageController::class, 'update'])->name('page.certificate.update');

    Route::get('page/service-area', [ServiceAreaPageController::class, 'index'])->name('page.service.area')->middleware('permission:page.service.area');
    Route::put('page/service-area/update/{service_area?}', [ServiceAreaPageController::class, 'update'])->name('page.service.area.update')->middleware('permission:page.service.area');
    Route::get('page/service', [ServicePageController::class, 'index'])->name('page.service')->middleware('permission:page.service');
    Route::put('page/service/update/{service?}', [ServicePageController::class, 'update'])->name('page.service.update')->middleware('permission:page.service');

    Route::get('page/our-story', [OurStoryPageController::class, 'index'])->name('page.our.story')->middleware('permission:page.our.story');
    Route::put('page/our-story/update/{our_story?}', [OurStoryPageController::class, 'update'])->name('page.our.story.update')->middleware('permission:page.our.story');
    Route::get('page/our-business', [OurBusinessPageController::class, 'index'])->name('page.our.business')->middleware('permission:page.our.business');
    Route::put('page/our-business/update/{our_business?}', [OurBusinessPageController::class, 'update'])->name('page.our.business.update')->middleware('permission:page.our.business');
    Route::get('home/home-intro', [HomeIntroController::class, 'index'])->name('home.intro')->middleware('permission:home.intro');
    Route::put('home/home-intro/update/{home_intro?}', [HomeIntroController::class, 'update'])->name('home.intro.update')->middleware('permission:home.intro');
    Route::get('home/home-category-intro', [HomeCategoryIntroController::class, 'index'])->name('home.category.intro')->middleware('permission:home.category.intro');
    Route::put('home/home-category-intro/update/{home_category_intro?}', [HomeCategoryIntroController::class, 'update'])->name('home.category.intro.update')->middleware('permission:home.category.intro');

    Route::get('/about-content', [AboutContentController::class, 'index'])->name('about.content')->middleware('permission:about.content');
    Route::put('about-content/update/{about_content?}', [AboutContentController::class, 'update'])->name('about.content.update')->middleware('permission:about.content');
    Route::get('/achievement-content', [AchievementContentController::class, 'index'])->name('achievement.content')->middleware('permission:achievement.content');
    Route::put('achievement-content/update/{achievement_content?}', [AchievementContentController::class, 'update'])->name('achievement.content.update')->middleware('permission:achievement.content');

    Route::get('company/core-value', [CoreValueController::class, 'index'])->name('core-value.index');
    Route::put('company/core-value/update/{core_value?}', [CoreValueController::class, 'update'])->name('core-value.update');

    Route::get('founder-message', [FounderMessageController::class, 'index'])->name('founder-message.index');
    Route::put('founder-message/update/{founder_message?}', [FounderMessageController::class, 'update'])->name('founder-message.update');

    Route::resource('/achievement', AchievementController::class)->middleware('permission:achievement');
    Route::get('/achievement/status/update/{achievement}', [AchievementController::class, 'statusUpdate'])->name('achievement.status.update')->middleware('permission:achievement');
    Route::resource('/achievement-content/slider', AchievementSliderController::class)->middleware('permission:achievement');
    Route::get('/achievement-content/slider/status/update/{slider}', [AchievementSliderController::class, 'statusUpdate'])->name('achievement.slider.status.update')->middleware('permission:achievement');
   
    Route::resource('/product-category', ProductCategoryController::class)->middleware('permission:product.category');
    Route::get('/product-category/status/update/{product_category}', [ProductCategoryController::class, 'statusUpdate'])->name('product-category.status.update')->middleware('permission:product.category');
    Route::resource('/product', ProductController::class)->middleware('permission:product');
    Route::get('/product/status/update/{product}', [ProductController::class, 'statusUpdate'])->name('product.status.update')->middleware('permission:product');
    Route::resource('/service-category', ServiceCategoryController::class)->middleware('permission:service.category');
    Route::get('/service-category/status/update/{service_category}', [ServiceCategoryController::class, 'statusUpdate'])->name('service.category.status.update')->middleware('permission:service.category');
    Route::resource('/service', ServiceController::class)->middleware('permission:service');
    Route::get('/service/status/update/{service}', [ServiceController::class, 'statusUpdate'])->name('service.status.update')->middleware('permission:service');
    Route::resource('/galleries', GalleryController::class)->middleware('permission:gallery');
    Route::get('/galleries/status/update/{gallery}', [GalleryController::class, 'statusUpdate'])->name('galleries.status.update')->middleware('permission:gallery');

    Route::resource('/gallery-category', GalleryCategoryController::class)->middleware('permission:gallery');
    Route::get('/gallery-category/status/update/{gallery_category}', [GalleryCategoryController::class, 'statusUpdate'])->name('gallery-category.status.update')->middleware('permission:gallery');


    Route::resource('/project', ProjectController::class)->middleware('permission:project');
    Route::get('/project/status/update/{project}', [ProjectController::class, 'statusUpdate'])->name('project.status.update')->middleware('permission:project');
    Route::resource('/certificate-badge', CertificateBadgeController::class)->middleware('permission:certificate.badge');
    Route::get('/certificate-badge/status/update/{certificate_badge}', [CertificateBadgeController::class, 'statusUpdate'])->name('certificate.badge.status.update')->middleware('permission:certificate.badge');

    Route::resource('/business-category', BusinessCategoryController::class)->middleware('permission:business.category');
    Route::get('/business-category/status/update/{business_category}', [BusinessCategoryController::class, 'statusUpdate'])->name('business.categories.status.update')->middleware('permission:business.category');
    Route::resource('/business', BusinessController::class)->middleware('permission:business');
    Route::get('/business/status/update/{business}', [BusinessController::class, 'statusUpdate'])->name('business.status.update')->middleware('permission:business');

    Route::prefix('project/{project}/manage')->group(function () {
        Route::resource('/pgallery', ProjectGalleryController::class)->middleware('permission:project');
        Route::get('/pgallery/status/update/{pgallery}', [ProjectGalleryController::class, 'statusUpdate'])->name('project.pgallery.status.update')->middleware('permission:project');
    });

    Route::prefix('service/{service}/manage/')->group(function () {
        Route::resource('/feature', ServiceFeatureController::class)->middleware('permission:service');
        Route::get('/feature/status/update/{feature}', [ServiceFeatureController::class, 'statusUpdate'])->name('feature.status.update')->middleware('permission:service');
        Route::resource('/benefit', ServiceBenefitController::class)->middleware('permission:service');
        Route::get('/benefit/status/update/{benefit}', [ServiceBenefitController::class, 'statusUpdate'])->name('benefit.status.update')->middleware('permission:service');
        Route::resource('/usage-area', ServiceUsageAreaController::class)->middleware('permission:service');
        Route::get('/usage-area/status/update/{usage_area}', [ServiceUsageAreaController::class, 'statusUpdate'])->name('usage-area.status.update')->middleware('permission:service');
        Route::resource('/gallery', ServiceGalleryController::class)->middleware('permission:service');
        Route::get('/gallery/status/update/{gallery}', [ServiceGalleryController::class, 'statusUpdate'])->name('service.gallery.status.update')->middleware('permission:service');
        Route::resource('/faq', ServiceFAQController::class)->middleware('permission:service');
        Route::get('/faq/status/update/{faq}', [ServiceFAQController::class, 'statusUpdate'])->name('service.faq.status.update')->middleware('permission:service');
        Route::resource('/description', ServiceDescriptionController::class)->middleware('permission:service');
        Route::get('/description/status/update/{faq}', [ServiceDescriptionController::class, 'statusUpdate'])->name('service.description.status.update')->middleware('permission:service');
    });

    Route::resource('/team-type', TeamTypeController::class)->middleware('permission:team.type');
    Route::get('/team-type/status/update/{team_type}', [TeamTypeController::class, 'statusUpdate'])->name('team.type.status.update')->middleware('permission:team.type');


    Route::resource('/team', TeamController::class)->middleware('permission:team');
    Route::get('/team/status/update/{team}', [TeamController::class, 'statusUpdate'])->name('team.status.update')->middleware('permission:team');

    Route::resource('/company-file', CompanyFilesController::class)->middleware('permission:company.file');
    Route::get('/company-file/status/update/{company_file}', [CompanyFilesController::class, 'statusUpdate'])->name('company.file.status.update')->middleware('permission:company.file');

    Route::resource('/blog/category', BlogCategoryController::class)->middleware('permission:blog.category');
    Route::get('/blog/category/status/update/{category}', [BlogCategoryController::class, 'statusUpdate'])->name('blog.category.status.update')->middleware('permission:blog.category');

    Route::resource('/why-choose-us', WhyChooseUsController::class)->middleware('permission:why.choose.us');
    Route::get('/why-choose-us/status/update/{why_choose_u}', [WhyChooseUsController::class, 'statusUpdate'])->name('why.choose.us.status.update')->middleware('permission:why.choose.us');

    Route::resource('/blog', BlogController::class)->middleware('permission:blog');
    Route::get('/blog/status/update/{blog}', [BlogController::class, 'statusUpdate'])->name('blog.status.update')->middleware('permission:blog');
    Route::resource('/importer', ImportController::class)->middleware('permission:importer');
    Route::get('/importer/status/update/{importer}', [ImportController::class, 'statusUpdate'])->name('importer.status.update')->middleware('permission:importer');
    Route::resource('/location', LocationController::class)->middleware('permission:location');
    Route::get('/location/status/update/{location}', [LocationController::class, 'statusUpdate'])->name('location.status.update')->middleware('permission:location');
    Route::resource('/vision', VisionMisionController::class)->middleware('permission:vision');
    Route::get('/vision/status/update/{vision}', [VisionMisionController::class, 'statusUpdate'])->name('vision.status.update')->middleware('permission:vision');

    Route::resource('/service-area', ServiceAreaController::class)->middleware('permission:service.area');
    Route::get('/service-area/status/update/{service_area}', [ServiceAreaController::class, 'statusUpdate'])->name('service.area.status.update')->middleware('permission:service.area');
    Route::resource('/page', PageController::class)->middleware('permission:page');
    Route::get('/page/status/update/{page}', [PageController::class, 'statusUpdate'])->name('page.status.update')->middleware('permission:page');
    Route::resource('/google-review', GoogleReviewController::class)->middleware('permission:google.review');
    Route::get('/google-review/status/update/{google_review}', [GoogleReviewController::class, 'statusUpdate'])->name('google.review.status.update')->middleware('permission:google.review');

    Route::get('get/customer/messages', [ManageCustomerMessageController::class, 'index'])->name('customer.message');

    Route::get('/system-information', [GeneralSettingController::class, 'systemInfo'])->name('system.info');
    Route::prefix('setting/')->group(function () {
        Route::get('/general-information', [GeneralSettingController::class, 'generalInformation'])->name('setting.general.info');
        Route::put('/general-information/update', [GeneralSettingController::class, 'generalInformationUpdate'])->name('setting.general.info.update');
        Route::get('/general-meta-seo', [GeneralSettingController::class, 'generalMetaSEO'])->name('setting.general.meta');
        Route::put('/general-meta-seo/update', [GeneralSettingController::class, 'updateMetaSEO'])->name('setting.general.meta.update');
        Route::get('/general-fb-pixel', [GeneralSettingController::class, 'generalFBPixel'])->name('setting.general.fb');
        Route::put('/general-fb-pixel/update', [GeneralSettingController::class, 'updateFBPixel'])->name('setting.general.fb.update');

        Route::get('/general-google', [GeneralSettingController::class, 'generalGoogleTag'])->name('setting.general.google');
        Route::put('/general-google/update', [GeneralSettingController::class, 'updateGoogleTag'])->name('setting.general.google.update');
        Route::get('/general-mail', [GeneralSettingController::class, 'generalMail'])->name('setting.general.mail');
        Route::put('/general-mail/update', [GeneralSettingController::class, 'updateMail'])->name('setting.general.mail.update');
    })->middleware('permissin:setting');


    // start of case stude CRUD from here 
     Route::controller(GeneralSettingController::class)->prefix('casestudy')->group(function(){
        Route::get('/view','viewCaseStudy')->name('view_case_study');
        Route::post('/store-case-study','StoreCaseStudy')->name('store_case_study');
        Route::get('/edit-case-study/{id}','editCaseStudy')->name('edit_case_study');
        Route::post('/update-case-study/{id}','updateCaseStudy')->name('update_case_study');
        Route::get('/delete-case-study/{id}','deleteCaseStudy')->name('delete_case_study');
    });

});
