<?php

use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\AdminsController;
use App\Http\Controllers\admin\BooksController;
use App\Http\Controllers\admin\UsersController;
use App\Http\Controllers\auth\AuthController;
use App\Http\Controllers\client\ClientController;
use App\Http\Middleware\isAdmin;
use Illuminate\Support\Facades\Route;

// ============================  Auth (Register)   ==========================================
Route::get("register", [AuthController::class, "registerPage"])->name("registerPage");
Route::post("register", [AuthController::class, "register"])->name("register");

// ============================  Auth (Login)   ==========================================
Route::get("login", [AuthController::class, "loginPage"])->name("loginPage");
Route::post("login", [AuthController::class, "login"])->name("login");
// ============================  Admin (Dashboard)   ==========================================

Route::middleware(['auth', isAdmin::class])->group(function () {
    Route::get("admin",[DashboardController::class, 'showDashboard'])->name("admin.dashboard");
// ============================  Admin (Books)   ==========================================
Route::get("admin/books",[BooksController::class, 'index'])->name("admin.books"); // Index
Route::get("admin/books/create", [BooksController::class, 'create'])->name("admin.books.create"); // Create
Route::post("admin/books", [BooksController::class, 'store'])->name("admin.book.store"); // Store
Route::get("admin/{book_id}/edit", [BooksController::class, 'edit'])->name("admin.book.edit"); // Edit
Route::put("admin/{book_id}", [BooksController::class, "update"])->name("admin.book.update"); // Update
Route::delete("admin/book/{book_id}", [BooksController::class, "destroy"])->name("admin.book.destroy"); // Destroy

// ============================  Admin (Admins)   ==========================================
Route::get("admin/admins",[AdminsController::class, 'index'])->name("admin.admins"); // Index
Route::get("admin/admin/create", [AdminsController::class, 'create'])->name("admin.admin.create"); // Create
Route::post("admin/admins", [AdminsController::class, 'store'])->name("admin.admin.store"); // Store
Route::delete("admin/admin/{admin_id}", [AdminsController::class, "destroy"])->name("admin.admin.destroy"); // Destroy

// ============================  Admin (Users)   ==========================================
Route::get("admin/users",[UsersController::class, 'index'])->name("admin.users");
Route::delete("admin/users/{users}",[UsersController::class, 'destroy'])->name("admin.users.destroy");
});


Route::middleware(['auth'])->group(function () {

// ============================##### START CLIENT #####==================================
Route::get("/", [ClientController::class, "index"])->name("client.index");
Route::get("/about", [ClientController::class, "about"])->name("client.about");
Route::get("/contact", [ClientController::class, "contact"])->name("client.contact");
Route::get("/profile", [ClientController::class, "profile"])->name("client.profile");
Route::put("/profile", [ClientController::class, "profileUpdate"])->name('client.profile.update');
Route::get("/book/{book_id}", [ClientController::class, "showBook"])->name("client.showbook");
Route::post("/book/{book_id}", [ClientController::class, "addBookToCart"])->name("client.addBookToCart");
Route::delete("/book/{book_id}", [ClientController::class, "deleteBookFromCart"])->name("client.deleteBookFromCart");
Route::get("/book/review/{book_id}", [ClientController::class, "showReview"])->name("client.showReview");
Route::post("/book/review/{book_id}", [ClientController::class, "addReview"])->name("client.addReview");
Route::get("/category/{category}", [ClientController::class, "showCategory"])->name("client.showCategory");
Route::get("/author/{author}", [ClientController::class, "showAuhor"])->name("client.showAuthor");
});