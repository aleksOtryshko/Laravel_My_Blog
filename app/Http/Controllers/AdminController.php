<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    // Логика для отображения админки
    public function index()
    {
        // Проверяем, что пользователь аутентифицирован и является администратором
        if (auth()->check() && auth()->user()->is_admin) {
            // Получаем список всех пользователей для отображения в админке
            $users = User::all();
            return view('admin.dashboard', ['users' => $users]);
        }

        // Если пользователь не администратор, перенаправляем его на главную страницу
        return redirect('/')->with('error', 'У вас нет доступа к админ панели.');
    }

    // Логика для регистрации нового пользователя
    public function register(Request $request)
    {
        // Валидация данных
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Создание нового пользователя
        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->save();

        // Перенаправление с сообщением об успешной регистрации
        return redirect()->back()->with('success', 'Пользователь успешно зарегистрирован.');
    }
}
