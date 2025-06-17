<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReportPdfController;


Route::get('/',function(){
    return view('index');
});
Route::get('/reportpdf',[ReportPdfController::class,'index'])->name('reportPdf');
