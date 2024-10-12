<?php

/*

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ForumController extends Controller
{

	public function index() {
    $posts = ForumPost::all();
    return view('forum.index', compact('posts'));
}

public function create() {
    return view('forum.create');
}

public function store(Request $request) {
    $post = new ForumPost();
    $post->user_id = auth()->id();
    $post->title = $request->title;
    $post->content = $request->content;
    $post->save();
    return redirect()->route('forum.index');
}


}

 */




namespace App\Http\Controllers;

use App\Models\ForumPost; // Убедитесь, что у вас есть импорт модели
use Illuminate\Http\Request;

class ForumController extends Controller
{
    public function index()
    {
        // Получаем все посты форума
        $posts = ForumPost::all();
        return view('forum.index', compact('posts')); // Отправляем данные в представление
    }

    public function create()
    {
        return view('forum.create'); // Отправляем на страницу создания поста
    }

    public function store(Request $request)
    {
        // Валидируем данные
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        // Создаем новый пост
        $post = new ForumPost();
        $post->user_id = auth()->id(); // Заполняем идентификатор пользователя
        $post->title = $request->title; // Заполняем заголовок
        $post->content = $request->content; // Заполняем содержимое
        $post->save(); // Сохраняем в базе данных

        return redirect()->route('forum.index'); // Перенаправляем на главную страницу форума
    }

    public function show($id)
    {
        $post = ForumPost::findOrFail($id); // Находим пост по ID
        return view('forum.show', compact('post')); // Отправляем пост в представление
    }
}
