<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Transaksi Berhasil - Tokin Games</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f6f8;
            color: #333;
            padding: 20px;
        }

        .container {
            background: #ffffff;
            padding: 25px;
            border-radius: 8px;
            max-width: 600px;
            margin: 0 auto;
            box-shadow: 0 2px 8px rgba(0,0,0,0.05);
        }

        h2 {
            color: #28a745;
        }

        ul {
            padding-left: 20px;
        }

        li {
            margin-bottom: 6px;
        }

        .footer {
            margin-top: 30px;
            font-size: 12px;
            color: #888;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Transaksi Berhasil</h2>

        <p>Halo <strong>{{ $order->user->name }}</strong>,</p>

        <p>Pesanan top-up Anda untuk game <strong>{{ $order->product->title }}</strong> telah berhasil <strong>diverifikasi</strong> oleh admin.</p>

        <ul>
            <li><strong>Invoice:</strong> {{ $order->invoice }}</li>
            <li><strong>Jumlah Diamond:</strong> {{ $order->topup->jumlah }}</li>
            <li><strong>Total Harga:</strong> Rp {{ number_format($order->topup->price, 0, ',', '.') }}</li>
            <li><strong>Status:</strong> {{ ucfirst($order->status) }}</li>
        </ul>

        <p>Jika Anda belum menerima top-up, silakan hubungi tim support kami.</p>

        <p>Terima kasih telah menggunakan layanan <strong>Tokin Games</strong>! 🎮</p>

        <div class="footer">
            &copy; {{ now()->year }} Tokin Games. All rights reserved.
        </div>
    </div>
</body>
</html>
