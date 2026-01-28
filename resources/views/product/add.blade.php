<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm mới sản phẩm</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f5f5f5;
        }
        .container {
            background: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        h1 {
            color: #000;
            margin-bottom: 30px;
        }
        .form-group {
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            color: #333;
            font-weight: bold;
        }
        input[type="text"],
        input[type="number"],
        textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 14px;
            box-sizing: border-box;
        }
        textarea {
            min-height: 100px;
            resize: vertical;
        }
        .btn-group {
            margin-top: 30px;
            display: flex;
            gap: 10px;
        }
        .btn {
            padding: 12px 25px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            text-decoration: none;
            display: inline-block;
            text-align: center;
        }
        .btn-primary {
            background-color: #28a745;
            color: white;
        }
        .btn-primary:hover {
            background-color: #218838;
        }
        .btn-secondary {
            background-color: #6c757d;
            color: white;
        }
        .btn-secondary:hover {
            background-color: #5a6268;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Thêm mới sản phẩm</h1>
        
        <form action="/product/store" method="POST">
            <div class="form-group">
                <label for="product_id">Mã sản phẩm <span style="color:red">*</span></label>
                <input type="text" id="product_id" name="product_id" required placeholder="Ví dụ: SP006">
            </div>

            <div class="form-group">
                <label for="product_name">Tên sản phẩm <span style="color:red">*</span></label>
                <input type="text" id="product_name" name="product_name" required placeholder="Nhập tên sản phẩm">
            </div>

            <div class="form-group">
                <label for="price">Giá (VNĐ) <span style="color:red">*</span></label>
                <input type="number" id="price" name="price" required placeholder="Nhập giá sản phẩm" min="0">
            </div>

            <div class="form-group">
                <label for="description">Mô tả</label>
                <textarea id="description" name="description" placeholder="Nhập mô tả sản phẩm"></textarea>
            </div>

            <div class="form-group">
                <label for="category">Danh mục</label>
                <input type="text" id="category" name="category" placeholder="Ví dụ: Điện thoại, Laptop, Phụ kiện, ...">
            </div>

            <div class="btn-group">
                <button type="submit" class="btn btn-primary">Thêm sản phẩm</button>
                <a href="/product" class="btn btn-secondary">Hủy</a>
            </div>
        </form>
    </div>
</body>
</html>