<!-- resources/views/profile/index.blade.php -->

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Личный кабинет</title>
</head>
<body>
    <h1>Личный кабинет</h1>
    <p>Привет, {{ auth()->user()->name }}!</p>

    <h2>Ваши данные</h2>
    <ul>
        <li>Имя: {{ auth()->user()->name }}</li>
        <li>Email: {{ auth()->user()->email }}</li>
    </ul>

    <h2>Изменить данные</h2>
    <form action="{{ route('profile.update') }}" method="POST">
        @csrf
        <label for="name">Имя</label>
        <input type="text" name="name" id="name" value="{{ auth()->user()->name }}" required><br>

        <label for="email">Email</label>
        <input type="email" name="email" id="email" value="{{ auth()->user()->email }}" required><br>

        <button type="submit">Сохранить изменения</button>
    </form>
</body>
</html>
