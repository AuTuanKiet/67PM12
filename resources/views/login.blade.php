<!DOCTYPE html>
<html lang="vi">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Đăng nhập</title>
    </head>
    <body>
        <h1>Đăng nhập</h1>
        <form action="/product/checklogin" method="POST">
            @csrf
            <label for="username">Tên đăng nhập:</label>
            <input type="text" id="username" name="username" required><br><br>
            <label for="password">Mật khẩu:</label>
            <input type="password" id="password" name="password" required><br><br>
            <button type="submit">Đăng nhập</button>
        </form>
    </body>
</html>