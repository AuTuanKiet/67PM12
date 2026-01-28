<!DOCTYPE html>
<html lang="vi">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Đăng nhập</title>
        <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&display=swap" rel="stylesheet">
        <style>
            :root {
                --bg: linear-gradient(135deg, #0f172a 0%, #1e293b 50%, #111827 100%);
                --card: #0b1220;
                --text: #e2e8f0;
                --muted: #94a3b8;
                --primary: #38bdf8;
                --primary-dark: #0ea5e9;
                --border: #1f2937;
            }
            * { box-sizing: border-box; }
            body {
                margin: 0;
                min-height: 100vh;
                display: grid;
                place-items: center;
                background: var(--bg);
                font-family: 'DM Sans', 'Segoe UI', sans-serif;
                color: var(--text);
                padding: 24px;
            }
            .card {
                width: min(420px, 100%);
                background: var(--card);
                border: 1px solid var(--border);
                border-radius: 16px;
                padding: 28px;
                box-shadow: 0 20px 60px rgba(0,0,0,0.35);
            }
            .title {
                margin: 0 0 8px;
                font-size: 26px;
                font-weight: 700;
                letter-spacing: -0.3px;
            }
            .subtitle {
                margin: 0 0 24px;
                color: var(--muted);
                font-size: 15px;
            }
            label {
                display: block;
                font-weight: 600;
                margin-bottom: 6px;
            }
            .field {
                width: 100%;
                padding: 12px 14px;
                border-radius: 10px;
                border: 1px solid var(--border);
                background: #0f172a;
                color: var(--text);
                font-size: 15px;
                outline: none;
                transition: border-color 0.2s, box-shadow 0.2s;
            }
            .field:focus {
                border-color: var(--primary);
                box-shadow: 0 0 0 3px rgba(56, 189, 248, 0.2);
            }
            .group { margin-bottom: 18px; }
            .actions {
                display: flex;
                align-items: center;
                justify-content: space-between;
                gap: 12px;
            }
            .btn {
                display: inline-flex;
                align-items: center;
                justify-content: center;
                gap: 8px;
                padding: 12px 16px;
                border-radius: 12px;
                border: none;
                cursor: pointer;
                font-weight: 700;
                font-size: 15px;
                text-decoration: none;
                transition: transform 0.15s, box-shadow 0.15s, background 0.15s;
            }
            .btn-primary {
                background: var(--primary);
                color: #0b1220;
                box-shadow: 0 12px 30px rgba(56, 189, 248, 0.28);
            }
            .btn-primary:hover { background: var(--primary-dark); transform: translateY(-1px); }
            .btn-ghost {
                background: transparent;
                color: var(--text);
                border: 1px solid var(--border);
            }
            .hint {
                margin-top: 12px;
                color: var(--muted);
                font-size: 14px;
            }
            .alert {
                padding: 12px 14px;
                border-radius: 10px;
                margin: 12px 0 18px;
                border: 1px solid transparent;
                font-weight: 600;
            }
            .alert-success {
                background: #ecfdf3;
                border-color: #bbf7d0;
                color: #166534;
            }
            .alert-error {
                background: #fef2f2;
                border-color: #fecdd3;
                color: #b91c1c;
            }
        </style>
    </head>
    <body>
        <div class="card">
            <h1 class="title">Đăng nhập</h1>
            <p class="subtitle">Truy cập trang quản lý sản phẩm.</p>

            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @elseif (session('error'))
                <div class="alert alert-error">{{ session('error') }}</div>
            @endif

            <form action="/product/checklogin" method="POST">
                @csrf
                <div class="group">
                    <label for="username">Tên đăng nhập</label>
                    <input type="text" id="username" name="username" class="field" placeholder="Nhập tên đăng nhập" required>
                </div>
                <div class="group">
                    <label for="password">Mật khẩu</label>
                    <input type="password" id="password" name="password" class="field" placeholder="Nhập mật khẩu" required>
                </div>
                <div class="group">
                    <label for="age">Tuổi</label>
                    <input type="number" id="age" name="age" class="field" placeholder="Nhập tuổi của bạn" min="1" required>
                </div>
                <div class="actions">
                    <button type="submit" class="btn btn-primary">Đăng nhập</button>
                    <a href="/home" class="btn btn-ghost">Về trang chủ</a>
                </div>
            </form>
            <p class="hint">Bạn cần đủ 18 tuổi để đăng nhập. Dùng tài khoản demo: hieulx / 123456.</p>
        </div>
    </body>
</html>