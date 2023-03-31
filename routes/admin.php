<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\FAQController;
use App\Http\Controllers\Admin\HomePageController;
use App\Http\Controllers\Admin\PackageController;
use App\Http\Controllers\Admin\PageBlogController;
use App\Http\Controllers\Admin\PageCategoryController;
use App\Http\Controllers\Admin\PageContactController;
use App\Http\Controllers\admin\PageFAQController;
use App\Http\Controllers\Admin\PagePricingController;
use App\Http\Controllers\Admin\PagePrivacyController;
use App\Http\Controllers\Admin\PageTermController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\WhyChooseController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->group(function () {
    Route::get('login', [AdminController::class, 'adminLogin'])->name('admin.login');
    Route::post('login-submit', [AdminController::class, 'adminLoginSubmit'])->name('admin.login-submit');
    Route::get('forget-password', [AdminController::class, 'adminForgetPassword'])->name('admin.forget-password');
    Route::post('forget-password-submit', [AdminController::class, 'adminForgetPasswordSubmit'])->name('admin.forget-password-submit');
    Route::get('reset-password/{token}/{email}', [AdminController::class, 'adminResetPassword']);
    Route::post('reset-password-submit', [AdminController::class, 'adminResetPasswordSubmit'])->name('admin.reset-password-submit');

    Route::group(['middleware' => ['admin']], function () {
        Route::get('dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
        Route::get('profile/{id}', [AdminController::class, 'showProfile'])->name('admin.profile');
        Route::post('logout', [AdminController::class, 'adminLogout'])->name('admin.logout');
        Route::put('update-profile/{id}', [AdminController::class, 'updateProfile'])->name('admin.update-profile');

        // Setting home
        // Homepage
        Route::get('homepage/setting', [HomePageController::class, 'homePage'])->name('admin.homepage');
        Route::put('homepage/{id}', [HomePageController::class, 'updateHomePage'])->name('admin.update-homepage');
        //Job Category
        Route::get('homepage/job-category', [HomePageController::class, 'jobCategory'])->name('admin.job-category');
        Route::put('job-category/{id}', [HomePageController::class, 'updateJobCategory'])->name('admin.update-job-category');
        //Why choose us
        Route::get('homepage/why-choose', [HomePageController::class, 'whyChoose'])->name('admin.why-choose');
        Route::put('why-choose/{id}', [HomePageController::class, 'updateWhyChoose'])->name('admin.update-why-choose');
        //Feature job
        Route::get('homepage/feature-job', [HomePageController::class, 'featureJob'])->name('admin.feature-job');
        Route::put('feature-job/{id}', [HomePageController::class, 'updateFeatureJob'])->name('admin.update-feature-job');
        //Testimonial
        Route::get('homepage/testimonial', [HomePageController::class, 'testimonial'])->name('admin.testimonial');
        Route::put('testimonial/{id}', [HomePageController::class, 'updateTestimonial'])->name('admin.update-testimonial');
        //Last News
        Route::get('homepage/last-news', [HomePageController::class, 'lastNews'])->name('admin.last-news');
        Route::put('last-news/{id}', [HomePageController::class, 'updateLastNews'])->name('admin.update-last-news');

        //Page Setting
        //Page FAQs
        Route::get('page/faqs', [PageFAQController::class, 'pageFAQ'])->name('admin.page-faqs');
        Route::put('page/faqs/{id}', [PageFAQController::class, 'updatePageFAQ'])->name('admin.update-page-faqs');
        //Page Blogs
        Route::get('page/blogs', [PageBlogController::class, 'pageBlog'])->name('admin.page-blogs');
        Route::put('page/blogs/{id}', [PageBlogController::class, 'updatePageBlog'])->name('admin.update-page-blogs');
        //Page Blogs
        Route::get('page/terms', [PageTermController::class, 'pageTerm'])->name('admin.page-terms');
        Route::put('page/terms/{id}', [PageTermController::class, 'updatePageTerm'])->name('admin.update-page-terms');
        //Page Blogs
        Route::get('page/privacy', [PagePrivacyController::class, 'pagePrivacy'])->name('admin.page-privacy');
        Route::put('page/privacy/{id}', [PagePrivacyController::class, 'updatePagePrivacy'])->name('admin.update-page-privacy');
        //Page Contacts
        Route::get('page/contacts', [PageContactController::class, 'pageContact'])->name('admin.page-contacts');
        Route::put('page/contacts/{id}', [PageContactController::class, 'updatePageContact'])->name('admin.update-page-contacts');
        //Page Categories
        Route::get('page/categories', [PageCategoryController::class, 'pageCategory'])->name('admin.page-categories');
        Route::put('page/categories/{id}', [PageCategoryController::class, 'updatePageCategory'])->name('admin.update-page-categories');
        //Page Pricing
        Route::get('page/pricing', [PagePricingController::class, 'pagePricing'])->name('admin.page-pricing');
        Route::put('page/pricing/{id}', [PagePricingController::class, 'updatePagePricing'])->name('admin.update-page-pricing');

        // Category route
        Route::resource('categories', CategoryController::class);

        // Why Choose Us route
        Route::resource('chooses', WhyChooseController::class);

        // Testimonial route
        Route::resource('testimonials', TestimonialController::class);

        // Post route
        Route::resource('posts', PostController::class);

        // FAQ route
        Route::resource('faqs', FAQController::class);

        // Package route
        Route::resource('packages', PackageController::class);
    });
});