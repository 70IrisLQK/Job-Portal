<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\crud\AdminAdvertisementController;
use App\Http\Controllers\Admin\crud\AdminCategoryController;
use App\Http\Controllers\Admin\crud\AdminCompanyFoundedController;
use App\Http\Controllers\Admin\crud\AdminCompanyIndustryController;
use App\Http\Controllers\Admin\crud\AdminCompanyLocationController;
use App\Http\Controllers\Admin\crud\AdminCompanySizeController;
use App\Http\Controllers\Admin\crud\AdminExperienceController;
use App\Http\Controllers\Admin\crud\AdminFAQController;
use App\Http\Controllers\Admin\crud\AdminGenderController;
use App\Http\Controllers\Admin\crud\AdminJobLocationController;
use App\Http\Controllers\Admin\crud\AdminPackageController;
use App\Http\Controllers\Admin\crud\AdminPostController;
use App\Http\Controllers\Admin\crud\AdminSalaryController;
use App\Http\Controllers\Admin\crud\AdminTestimonialController;
use App\Http\Controllers\Admin\crud\AdminTypeController;
use App\Http\Controllers\Admin\crud\AdminWhyChooseController;
use App\Http\Controllers\Admin\homepage\AdminHomePageController;
use App\Http\Controllers\Admin\page\AdminOtherItemsController;
use App\Http\Controllers\Admin\page\AdminPageCategoryController;
use App\Http\Controllers\Admin\page\AdminPageContactController;
use App\Http\Controllers\Admin\page\AdminPageFAQController;
use App\Http\Controllers\Admin\page\AdminPagePricingController;
use App\Http\Controllers\Admin\page\AdminPagePrivacyController;
use App\Http\Controllers\Admin\page\AdminPageTermController;
use App\Http\Controllers\Admin\page\AdminPageBlogController;
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
        Route::get('homepage/setting', [AdminHomePageController::class, 'homePage'])->name('admin.homepage');
        Route::put('homepage/{id}', [AdminHomePageController::class, 'updateHomePage'])->name('admin.update-homepage');
        //Job Category
        Route::get('homepage/job-category', [AdminHomePageController::class, 'jobCategory'])->name('admin.job-category');
        Route::put('job-category/{id}', [AdminHomePageController::class, 'updateJobCategory'])->name('admin.update-job-category');
        //Why choose us
        Route::get('homepage/why-choose', [AdminHomePageController::class, 'whyChoose'])->name('admin.why-choose');
        Route::put('why-choose/{id}', [AdminHomePageController::class, 'updateWhyChoose'])->name('admin.update-why-choose');
        //Feature job
        Route::get('homepage/feature-job', [AdminHomePageController::class, 'featureJob'])->name('admin.feature-job');
        Route::put('feature-job/{id}', [AdminHomePageController::class, 'updateFeatureJob'])->name('admin.update-feature-job');
        //Testimonial
        Route::get('homepage/testimonial', [AdminHomePageController::class, 'testimonial'])->name('admin.testimonial');
        Route::put('testimonial/{id}', [AdminHomePageController::class, 'updateTestimonial'])->name('admin.update-testimonial');
        //Last News
        Route::get('homepage/last-news', [AdminHomePageController::class, 'lastNews'])->name('admin.last-news');
        Route::put('last-news/{id}', [AdminHomePageController::class, 'updateLastNews'])->name('admin.update-last-news');

        //Page Setting
        //Page FAQs
        Route::get('page/faqs', [AdminPageFAQController::class, 'pageFAQ'])->name('admin.page-faqs');
        Route::put('page/faqs/{id}', [AdminPageFAQController::class, 'updatePageFAQ'])->name('admin.update-page-faqs');
        //Page Blogs
        Route::get('page/blogs', [AdminPageBlogController::class, 'pageBlog'])->name('admin.page-blogs');
        Route::put('page/blogs/{id}', [AdminPageBlogController::class, 'updatePageBlog'])->name('admin.update-page-blogs');
        //Page Blogs
        Route::get('page/terms', [AdminPageTermController::class, 'pageTerm'])->name('admin.page-terms');
        Route::put('page/terms/{id}', [AdminPageTermController::class, 'updatePageTerm'])->name('admin.update-page-terms');
        //Page Blogs
        Route::get('page/privacy', [AdminPagePrivacyController::class, 'pagePrivacy'])->name('admin.page-privacy');
        Route::put('page/privacy/{id}', [AdminPagePrivacyController::class, 'updatePagePrivacy'])->name('admin.update-page-privacy');
        //Page Contacts
        Route::get('page/contacts', [AdminPageContactController::class, 'pageContact'])->name('admin.page-contacts');
        Route::put('page/contacts/{id}', [AdminPageContactController::class, 'updatePageContact'])->name('admin.update-page-contacts');
        //Page Categories
        Route::get('page/categories', [AdminPageCategoryController::class, 'pageCategory'])->name('admin.page-categories');
        Route::put('page/categories/{id}', [AdminPageCategoryController::class, 'updatePageCategory'])->name('admin.update-page-categories');
        //Page Pricing
        Route::get('page/pricing', [AdminPagePricingController::class, 'pagePricing'])->name('admin.page-pricing');
        Route::put('page/pricing/{id}', [AdminPagePricingController::class, 'updatePagePricing'])->name('admin.update-page-pricing');
        //Page Pricing
        Route::get('page/other-item', [AdminOtherItemsController::class, 'edit'])->name('admin.other-item');
        Route::put('page/other-item/{id}', [AdminOtherItemsController::class, 'update'])->name('admin.update-other-item');
        //Page Advertisement
        Route::get('page/advertisement', [AdminAdvertisementController::class, 'edit'])->name('admin.advertisement');
        Route::put('page/advertisement/{id}', [AdminAdvertisementController::class, 'update'])->name('admin.update-advertisement');

        // Category route
        Route::resource('categories', AdminCategoryController::class);

        // Why Choose Us route
        Route::resource('chooses', AdminWhyChooseController::class);

        // Testimonial route
        Route::resource('testimonials', AdminTestimonialController::class);

        // Post route
        Route::resource('posts', AdminPostController::class);

        // FAQ route
        Route::resource('faqs', AdminFAQController::class);

        // Package route
        Route::resource('packages', AdminPackageController::class);

        // Job Location route
        Route::resource('locations', AdminJobLocationController::class);

        // Job Type route
        Route::resource('types', AdminTypeController::class);

        // Job Experience route
        Route::resource('experiences', AdminExperienceController::class);

        // Job Salary route
        Route::resource('salaries', AdminSalaryController::class);

        // Job Genre route
        Route::resource('genres', AdminGenderController::class);

        // Company Location route
        Route::resource('company-locations', AdminCompanyLocationController::class);
        Route::resource('industry', AdminCompanyIndustryController::class);
        Route::resource('size', AdminCompanySizeController::class);
        Route::resource('founded', AdminCompanyFoundedController::class);
    });
});