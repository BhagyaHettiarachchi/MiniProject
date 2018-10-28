<?php

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;



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



Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::resource('users', 'UserController');

Route::resource('roles', 'RoleController');

Route::resource('permissions', 'PermissionController');

Route::resource('posts', 'PostController');





Route::get('/create_role_permission', function(){

   $role = Role::create(['name' => 'Administer']);
    $permission = Permission::create(['name' => 'Administer roles & Permissions']);

    auth()->users()->assignRole('Administer');
    auth()->users()->givePermissionTo('Administer roles & Permissions');
});

