<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bàn cờ {{ $n }}x{{ $n }}</title>
    <style>
        body { font-family: Arial, sans-serif; padding: 24px; background: #f5f5f5; }
        h1 { margin-bottom: 16px; }
        .board { border-collapse: collapse; }
        .board td { width: 40px; height: 40px; }
        .black { background: #000; }
        .white { background: #fff; }
    </style>
</head>
<body>
    <h1>Bàn cờ {{ $n }} x {{ $n }}</h1>
    <table class="board" style="border: 1px solid #000;">
        @for ($i = 0; $i < $n; $i++)
            <tr>
                @for ($j = 0; $j < $n; $j++)
                    @php $isBlack = (($i + $j) % 2) === 0; @endphp
                    <td class="{{ $isBlack ? 'black' : 'white' }}"></td>
                @endfor
            </tr>
        @endfor
    </table>
</body>
</html>