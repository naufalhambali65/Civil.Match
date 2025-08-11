<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $title = 'Dashboard';
        $post = Post::all()->count();
        return view('admin.index', compact('title', 'post'));
    }
}
