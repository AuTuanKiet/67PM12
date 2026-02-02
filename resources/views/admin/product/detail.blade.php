<!DOCTYPE html>
<html lang="vi">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Chi tiết sản phẩm</title>
        <style>
            :root {
                --bg: linear-gradient(135deg, #0f172a 0%, #1e293b 50%, #0b1220 100%);
                --card: #0b1220;
                --text: #e2e8f0;
                --muted: #94a3b8;
                --primary: #38bdf8;
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
                width: min(520px, 100%);
                background: var(--card);
                border: 1px solid var(--border);
                border-radius: 16px;
                box-shadow: 0 20px 60px rgba(0,0,0,0.35);
                padding: 28px;
            }
            .title {
                font-size: 26px;
                font-weight: 700;
                margin: 0 0 10px;
            }
            .subtitle {
                margin: 0 0 22px;
                color: var(--muted);
                font-size: 16px;
            }
            .info {
                display: grid;
                gap: 12px;
            }
            .row {
                display: flex;
                justify-content: space-between;
                align-items: center;
                padding: 12px 14px;
                border: 1px solid var(--border);
                border-radius: 8px;
                background: #0f172a;
            }
            .label {
                color: var(--muted);
                font-size: 14px;
            }
            .value {
                font-size: 16px;
                font-weight: 700;
                color: var(--text);
            }
            .actions {
                margin-top: 18px;
                display: flex;
                gap: 10px;
            }
            .btn {
                padding: 12px 16px;
                border-radius: 12px;
                border: 1px solid var(--border);
                text-decoration: none;
                color: var(--text);
                font-weight: 700;
                text-align: center;
                flex: 1;
                transition: transform 0.15s, background 0.15s;
            }
            .btn:hover { transform: translateY(-1px); }
            .btn-primary {
                background: var(--primary);
                color: #0b1220;
                border: none;
                box-shadow: 0 12px 30px rgba(56, 189, 248, 0.28);
            }
            .btn-ghost { background: transparent; }
        </style>
    </head>
    <body>
        <div class="card">
            <h1 class="title">Chi tiết sản phẩm</h1>
            <p class="subtitle">Thông tin định danh sản phẩm của bạn.</p>

            <div class="info">
                <div class="row">
                    <div class="label">Mã sản phẩm</div>
                    <div class="value">{{ $product->id }}</div>
                </div>
                <div class="row">
                    <div class="label">Tên</div>
                    <div class="value">{{ $product->name }}</div>
                </div>
                <div class="row">
                    <div class="label">Giá</div>
                    <div class="value">{{ number_format($product->price, 0, ',', '.') }} VNĐ</div>
                </div>
                <div class="row">
                    <div class="label">Số lượng</div>
                    <div class="value">{{ $product->stock }}</div>
                </div>
            </div>

            <div class="actions">
                <a href="{{ route('product.index') }}" class="btn btn-ghost">← Danh sách</a>
                <a href="{{ route('product.edit', $product->id) }}" class="btn btn-primary">Sửa sản phẩm</a>
            </div>
        </div>
    </body>
</html>
