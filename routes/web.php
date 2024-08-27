<?php

use App\Http\Controllers\Accountant\AccountantController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ItemController as AdminItemController;
use App\Http\Controllers\Accountant\ItemController as AccountantItemController;
use App\Http\Controllers\Customer\CustomerController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\SectionController;
use App\Http\Controllers\Customer\ItemController as CustomerItemController;
use App\Http\Controllers\Watcher\ItemController as WatcherItemController;
use App\Http\Controllers\Watcher\WatcherController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\CustomCssFile;

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth','role:admin'])->group(function(){
    Route::get('admin/dashboard',[AdminController::class,'index']);

    Route::prefix('admin/section')->group(function(){
        Route::get('/index',[SectionController::class,'index'])->name('section.index');
        Route::post('/store',[SectionController::class,'store'])->name('section.store');
        Route::patch('/update',[SectionController::class,'update'])->name('section.update');
        Route::delete('/destroy',[SectionController::class,'destroy'])->name('section.destroy');
    });

    Route::prefix('admin/item')->group(function(){
        Route::get('/',[AdminItemController::class,'index'])->name('item.index');
        Route::get('/ForPrice',[AdminItemController::class,'itemForPrice'])->name('item.ForPrice');
        Route::get('/edit/{id}',[AdminItemController::class,'edit'])->name('item.edit');
        Route::post('/update',[AdminItemController::class,'update'])->name('item.update');
        Route::delete('/destroy',[AdminItemController::class,'destroy'])->name('item.destroy');
        Route::post('/newPrice',[AdminItemController::class,'addPrice'])->name('item.add');
        Route::post('/price',[AdminItemController::class,'updatePrice'])->name('item.updatePrice');
    });

    Route::prefix('admin/user')->group(function(){
        Route::get('/list',[AdminController::class,'list'])->name('user.index');
        Route::get('/create',[AdminController::class,'create'])->name('user.create');
        Route::get('/edit/{id}',[AdminController::class,'edit'])->name('user.edit');
        Route::post('/store',[AdminController::class,'save'])->name('user.save');
        Route::patch('/update',[AdminController::class,'update'])->name('user.update');
        Route::delete('/delete',[AdminController::class,'delete'])->name('user.delete');
    });


});

Route::prefix('/user')->group(function(){
    Route::get('/regster',[AdminController::class,'regster'])->name('user.regster');
    Route::post('/store',[AdminController::class,'store'])->name('user.store');
});


Route::middleware(['auth','role:customer'])->group(function(){
    Route::get('customer/dashboard',[CustomerController::class,'index'])->name('customer.dashboard');

    Route::prefix('customer/order')->group(function(){
        Route::get('/create',[CustomerItemController::class,'create'])->name('orderCustomer.add');
        Route::post('/save',[CustomerItemController::class,'store'])->name('orderCustomer.store');
        Route::get('/print/{id}',[CustomerItemController::class,'send'])->name('orderCustomer.send');
        Route::get('/list',[CustomerItemController::class,'index'])->name('orderCustomer.list');
        Route::patch('/update', [CustomerItemController::class, 'update'])->name('orderCustomer.update');
        Route::delete('/delete', [CustomerItemController::class, 'destroy'])->name('orderCustomer.destroy');
    });


});


Route::middleware(['auth','role:accountant'])->group(function(){
    Route::get('accountant/dashboard',[AccountantController::class,'index']);

    Route::prefix('accountant/item')->group(function(){
        Route::get('/create',[AccountantItemController::class,'create'])->name('item.create');
        Route::post('/store',[AccountantItemController::class,'store'])->name('item.store');
        Route::post('/add',[AccountantItemController::class,'add'])->name('item.addItem');
        Route::get('/list',[AccountantItemController::class,'index'])->name('acc.item.index');
        Route::get('/addOrder',[AccountantItemController::class,'addOrder'])->name('item.addSell');
    });

    Route::prefix('accountant/order')->group(function(){
        Route::get('/add',[AccountantItemController::class,'addOrder'])->name('order.add');
        Route::post('/store',[AccountantItemController::class,'storeOrder'])->name('order.store');
        Route::post('/show',[AccountantItemController::class,'saveSell'])->name('order.show');
        Route::get('/show',[AccountantItemController::class,'orderCustomer'])->name('orderCustomer.show');
        Route::get('/showOrder/{id}',[AccountantItemController::class,'orderOneCustomer'])->name('orderOneCustomer.show');

    });

});


Route::middleware(['auth','role:watcher'])->group(function(){
    Route::get('watcher/dashboard',[WatcherController::class,'index']);

    Route::prefix('watcher/item')->group(function(){
        Route::get('/index',[WatcherItemController::class,'index'])->name('itemWatcher.index');
        Route::patch('/update',[WatcherItemController::class,'update'])->name('item.changePlace');
    });

});

require __DIR__.'/auth.php';
