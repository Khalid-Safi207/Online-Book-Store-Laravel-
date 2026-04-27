<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Book;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function showDashboard(){
        $usersCount = User::count();
        $booksCount = Book::count();
        $adminsCount = Admin::count();

        $recentUsers = User::latest()->limit(5)->get();
        $recentBooks = Book::latest()->limit(5)->get();
        return view("admin.dashboard", ["usersCount"=>$usersCount, "booksCount"=>$booksCount, "adminsCount"=>$adminsCount, "recentUsers"=>$recentUsers, "recentBooks"=>$recentBooks]);
    }

}
