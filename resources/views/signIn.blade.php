<!DOCTYPE html>
<html lang="vi">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Đăng ký tài khoản</title>
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
                --error: #ef4444;
                --success: #10b981;
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
                width: min(450px, 100%);
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
                font-size: 14px;
                margin-bottom: 6px;
            }
            input, select {
                width: 100%;
                padding: 10px 14px;
                border: 1px solid var(--border);
                border-radius: 8px;
                background: rgba(15, 23, 42, 0.5);
                color: var(--text);
                margin-bottom: 14px;
                font-size: 14px;
                transition: all 0.2s;
            }
            input:focus, select:focus {
                outline: none;
                border-color: var(--primary);
                background: rgba(15, 23, 42, 0.8);
                box-shadow: 0 0 0 3px rgba(56, 189, 248, 0.1);
            }
            input::placeholder {
                color: var(--muted);
            }
            .form-group {
                margin-bottom: 14px;
            }
            .form-row {
                display: grid;
                grid-template-columns: 1fr 1fr;
                gap: 12px;
            }
            .form-row .form-group {
                margin-bottom: 0;
            }
            button {
                width: 100%;
                padding: 12px;
                background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
                color: #0f172a;
                border: none;
                border-radius: 8px;
                font-weight: 700;
                font-size: 15px;
                cursor: pointer;
                transition: all 0.3s;
                margin-top: 8px;
            }
            button:hover {
                transform: translateY(-2px);
                box-shadow: 0 10px 20px rgba(56, 189, 248, 0.3);
            }
            button:active {
                transform: translateY(0);
            }
            .message {
                padding: 12px 14px;
                border-radius: 8px;
                margin-bottom: 16px;
                font-weight: 600;
                font-size: 14px;
            }
            .message.success {
                background: rgba(16, 185, 129, 0.1);
                border: 1px solid var(--success);
                color: #86efac;
            }
            .message.error {
                background: rgba(239, 68, 68, 0.1);
                border: 1px solid var(--error);
                color: #fca5a5;
            }
        </style>
    </head>
    <body>
        <div class="card">
            <h1 class="title">Đăng ký tài khoản</h1>
            <p class="subtitle">Nhập thông tin của bạn để tạo tài khoản mới</p>

            @if(session('message'))
                <div class="message @if(session('type') == 'success') success @else error @endif">
                    {{ session('message') }}
                </div>
            @endif

            <form method="POST" action="{{ route('auth.checksignin') }}">
                @csrf

                <div class="form-group">
                    <label for="username">Tên đăng nhập</label>
                    <input type="text" id="username" name="username" placeholder="VD: hieulx" required>
                </div>

                <div class="form-group">
                    <label for="password">Mật khẩu</label>
                    <input type="password" id="password" name="password" placeholder="VD: 123abc" required>
                </div>

                <div class="form-group">
                    <label for="repass">Xác nhận mật khẩu</label>
                    <input type="password" id="repass" name="repass" placeholder="Nhập lại mật khẩu" required>
                </div>

                <div class="form-group">
                    <label for="mssv">MSSV</label>
                    <input type="text" id="mssv" name="mssv" placeholder="VD: 26867" required>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="lopmonhoc">Lớp môn học</label>
                        <input type="text" id="lopmonhoc" name="lopmonhoc" placeholder="VD: 67PM1" required>
                    </div>

                    <div class="form-group">
                        <label for="gioitinh">Giới tính</label>
                        <select id="gioitinh" name="gioitinh" required>
                            <option value="">-- Chọn --</option>
                            <option value="nam">Nam</option>
                            <option value="nữ">Nữ</option>
                            <option value="khác">Khác</option>
                        </select>
                    </div>
                </div>

                <button type="submit">Đăng ký</button>
            </form>
        </div>
    </body>
</html>
