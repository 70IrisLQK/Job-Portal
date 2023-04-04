<?php

use App\Http\Controllers\Frontend\candidate\CandidateAwardController;
use App\Http\Controllers\Frontend\candidate\CandidateController;
use App\Http\Controllers\Frontend\candidate\CandidateEducationController;
use App\Http\Controllers\Frontend\candidate\CandidateExperienceController;
use App\Http\Controllers\Frontend\candidate\CandidateForgerPasswordController;
use App\Http\Controllers\Frontend\candidate\CandidateHomeController;
use App\Http\Controllers\Frontend\candidate\CandidateLoginController;
use App\Http\Controllers\Frontend\candidate\CandidateRegisterController;
use App\Http\Controllers\Frontend\candidate\CandidateResumeController;
use App\Http\Controllers\Frontend\candidate\CandidateSkillController;
use App\Models\CandidateResume;
use Illuminate\Support\Facades\Route;

// Auth
Route::prefix('candidate')->group(function () {
    Route::post('register', [CandidateRegisterController::class, 'candidateRegister'])->name('candidate.register');
    Route::get('verify-account/{token}/{email}', [CandidateRegisterController::class, 'verifyAccount']);

    Route::post('login', [CandidateLoginController::class, 'candidateLogin'])->name('candidate.login');

    Route::get('forget-password', [CandidateForgerPasswordController::class, 'index']);
    Route::post('forget-password-submit', [CandidateForgerPasswordController::class, 'candidateForgetPasswordSubmit'])->name("candidate.forget-password-submit");

    Route::get('reset-password/{token}/{email}', [CandidateForgerPasswordController::class, 'candidateResetPassword']);
    Route::post('reset-password', [CandidateForgerPasswordController::class, 'candidateResetPasswordSubmit'])->name('candidate.reset-password');

    Route::middleware(['candidate'])->group(function () {
        Route::get('dashboard', [CandidateHomeController::class, 'dashboard'])->name('candidate.dashboard');
        Route::post('logout', [CandidateLoginController::class, 'logout'])->name('candidate.logout');

        // Profile
        Route::get('edit/profile', [CandidateController::class, 'editProfile'])->name('candidate_edit_profile');
        Route::put('update/profile/{id}', [CandidateController::class, 'updateProfile'])->name('candidate_update_profile');

        //Password
        Route::get('edit/password', [CandidateController::class, 'editPassword'])->name('candidate_edit_password');
        Route::put('update/password', [CandidateController::class, 'updatePassword'])->name('candidate_update_password');

        //Education
        Route::resource('education', CandidateEducationController::class);

        //Education
        Route::resource('skill', CandidateSkillController::class);

        //Education
        Route::resource('experience', CandidateExperienceController::class);

        //Education
        Route::resource('award', CandidateAwardController::class);

        //Resume
        Route::resource('resume', CandidateResumeController::class);

        //Bookmark
        Route::get('bookmark/{id}', [CandidateController::class, 'bookmark'])->name('candidate.bookmark');
        Route::get('bookmarks', [CandidateController::class, 'bookmarks'])->name('bookmark.index');
        Route::delete('bookmarks/{id}/delete', [CandidateController::class, 'deleteBookmark'])->name('bookmark.destroy');

        // Apply route
        Route::get('apply', [CandidateController::class, 'index'])->name('apply.index');
        Route::get('apply/{slug}', [CandidateController::class, 'apply'])->name('candidate.apply');
        Route::post('apply/store/{slug}', [CandidateController::class, 'applyStore'])->name('apply.store');
    });
});