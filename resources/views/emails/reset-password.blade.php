<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <style>
        body {
            direction: rtl;
            text-align: right;
            font-family: 'Vazirmatn', sans-serif;
            background-color: #f5f5f5;
            padding: 20px;
        }
        .card {
            background: white;
            padding: 25px;
            border-radius: 12px;
            max-width: 500px;
            margin: auto;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        a.button {
            background: #2563eb;
            color: white !important;
            padding: 10px 25px;
            border-radius: 8px;
            text-decoration: none;
            display: inline-block;
            margin-top: 15px;
        }
    </style>
</head>
<body dir="rtl">
    <div class="card">
        <h2>سلام {{ $user->name ?? 'کاربر عزیز' }} 👋</h2>
        <p>این ایمیل برای بازیابی رمز عبور شما ارسال شده است.</p>
        <p>برای ادامه، روی دکمه زیر کلیک کنید:</p>
        <p><a href="{{ $url }}" class="button">بازیابی رمز عبور</a></p>
        <p>اگر شما چنین درخواستی نداشتید، لطفاً این ایمیل را نادیده بگیرید.</p>
        <p style="margin-top: 20px;">با احترام ❤️<br>{{ config('app.name') }}</p>
    </div>
</body>
</html>
