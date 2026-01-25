<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 - Không tìm thấy trang</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .container {
            text-align: center;
            background: white;
            padding: 50px;
            border-radius: 10px;
            box-shadow: 0 10px 40px rgba(0,0,0,0.2);
            max-width: 600px;
        }
        h1 {
            font-size: 120px;
            margin: 0;
            color: #667eea;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.1);
        }
        h2 {
            font-size: 32px;
            margin: 20px 0;
            color: #333;
        }
        p {
            font-size: 18px;
            color: #666;
            margin: 20px 0 30px;
        }
        .btn {
            display: inline-block;
            padding: 15px 30px;
            background-color: #667eea;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-size: 16px;
            transition: background-color 0.3s;
        }
        .btn:hover {
            background-color: #764ba2;
        }
        .emoji {
            font-size: 80px;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="emoji">😕</div>
        <h1>404</h1>
        <h2>Không tìm thấy trang</h2>
        <p>Xin lỗi, trang bạn đang tìm kiếm không tồn tại hoặc đã bị xóa.</p>
        <a href="/home" class="btn">← Quay về trang chủ</a>
    </div>
</body>
</html>