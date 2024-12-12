<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
Route::get("/", [PostController::class, "index"]);
//hiển thị index
//thêm mới
//hiện thị mới ở csdl
//hiển thị chi tiết 1 sản phẩm
//sửa sản phẩm, hiển thị view sửa
//sửa, làm việc model

