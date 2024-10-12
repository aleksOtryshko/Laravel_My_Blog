<?php

namespace App\Http\Controllers;

use App\Models\Post;  // Импортируем модель Post
use Illuminate\Http\Request;

class BlogController extends Controller
{
	    // Метод для отображения главной страницы блога
	     public function index()
	         {
		 // Получаем все посты из базы данны 
	                     $posts = Post::all(); 
	                            // Передаем данные в представление 'blog.index'
                                     return view('blog.index', compact('posts'));
                                         }
	                                         }
