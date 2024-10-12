<!-- resources/views/admin/dashboard.blade.php -->

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Админ-панель</title>
</head>
<body>
    <h1>Добро пожаловать в Админ-панель!</h1>
    
    <!-- Выводим список пользователей -->
    <h2>Список пользователей</h2>
    <ul>
        @foreach ($users as $user)
            <li>{{ $user->name }} ({{ $user->email }})</li>
        @endforeach
    </ul>

    <!-- Форма для регистрации нового пользователя -->
    <h2>Добавить нового пользователя</h2>
    <form action="{{ route('admin.register') }}" method="POST">
        @csrf
        <label for="name">Имя</label>
        <input type="text" name="name" id="name" required><br>

        <label for="email">Email</label>
        <input type="email" name="email" id="email" required><br>

        <label for="password">Пароль</label>
        <input type="password" name="password" id="password" required><br>

        <label for="password_confirmation">Подтверждение пароля</label>
        <input type="password" name="password_confirmation" id="password_confirmation" required><br>

        <button type="submit">Добавить пользователя</button>
    </form>
</body>
</html>
