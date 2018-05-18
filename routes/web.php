<?php

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
//Auth Routes
$this->get('login', 'Auth\LoginController@show')->name('login');
$this->post('login', 'Auth\LoginController@login');
$this->post('logout', 'Auth\LoginController@logout')->name('logout');



$this->get('/blog/{slug}', 'BlogController@show')->name('blog.show');;
$this->get('/blog/', 'BlogController@index')->name('blog.index');

$this->get('/project/{project}', 'ProjectController@show')->name('project.show');
$this->get('/project/', 'ProjectController@index')->name('project.index');

$this->get('/', 'HomeController@about')->name('about');
