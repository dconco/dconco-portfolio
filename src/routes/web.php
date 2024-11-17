<?php
/**
 * @format
 */

use PhpSlides\{Route, view};

/**
 * --------------------------------------------------------------------
 * | Register web routes here to render according to request
 * | NOTE - that browser or any other request cannot access any page
 * | that are not coming from route, it redirects to 404
 * --------------------------------------------------------------------
 */
Route::view(['/', '/index'], '::App')->name('index');
Route::view('/about', '::About')->name('about');
Route::view('/skills', '::Skills')->name('skills');
Route::view('/contact', '::Contact')->name('contact');
Route::view('/experience', '::Experience')->name('experience');
Route::view('/portfolio', '::Portfolio')->name('portfolio');
Route::any('*', view::render('::Errors::NotFound'));
