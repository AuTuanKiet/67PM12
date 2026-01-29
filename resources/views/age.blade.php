<!DOCTYPE html>
<html lang="vi">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Nhập tuổi</title>
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
                font-size: 14px;
                margin-bottom: 6px;
            }
            input {
                width: 100%;
                padding: 12px 14px;
                border: 1px solid var(--border);
                border-radius: 8px;
                background: rgba(15, 23, 42, 0.5);
                color: var(--text);
                margin-bottom: 20px;
                font-size: 16px;
                transition: all 0.2s;
            }
            input:focus {
                outline: none;
                border-color: var(--primary);
                background: rgba(15, 23, 42, 0.8);
                box-shadow: 0 0 0 3px rgba(56, 189, 248, 0.1);
            }
            input::placeholder {
                color: var(--muted);
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
            .info {
                background: rgba(56, 189, 248, 0.1);
                border: 1px solid var(--primary);
                padding: 12px 14px;
                border-radius: 8px;
                margin-top: 16px;
                font-size: 14px;
                color: #38bdf8;
            }
        </style>
    </head>
    <body>
        <div class="card">
            <h1 class="title">Xác nhận tuổi</h1>
            <p class="subtitle">Vui lòng nhập tuổi của bạn để tiếp tục</p>

            @if(session('message'))
                <div class="message @if(session('type') == 'success') success @else error @endif">
                    {{ session('message') }}
                </div>
            @endif

            <form method="POST" action="{{ route('age.verify') }}">
                @csrf

                <div>
                    <label for="age">Tuổi của bạn</label>
                    <input type="number" id="age" name="age" placeholder="Nhập tuổi (ví dụ: 20)" min="1" max="100" required>
                </div>

                <button type="submit">Xác nhận</button>
            </form>

            <div class="info">
                ℹ️ Bạn cần phải đủ 18 tuổi để truy cập nội dung
            </div>
        </div>
    </body>
</html>