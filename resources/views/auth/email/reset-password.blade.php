<!DOCTYPE html>
<html>

<head>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            padding: 20px;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff;
            padding: 40px;
            text-align: center;
            border-radius: 5px;
            border: 1px solid grey;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #333;
            font-size: 24px;
            margin-bottom: 20px;
        }

        p {
            color: #666;
            font-size: 16px;
            line-height: 1.5;
            margin-bottom: 20px;
        }

        .button {
            display: inline-block;
            background-color: #e91e63;
            color: #fff;
            text-decoration: none;
            padding: 10px 20px;
            border-radius: 5px;
            font-size: 16px;
            margin-top: 20px;
        }

        .button:hover {
            background-color: #e91e63;
        }
    </style>
</head>

<body>

    <div class="container">
        <img src="{{ $message->embed('admin/assets/img/favicon.png') }}" alt=""> <br>
        <b>Quiziz Web</b>
        <h1>Reset Password</h1>
        <p>Silakan klik tombol di bawah ini untuk mengarah ke halaman ganti password anda.</p>
        <a href="{{ $url }}" class="button">
            <span style="color: white;">Ganti Password</span>
        </a>
        <br> <br>
        <small style="text-align: left;color: #666;">
            nb: batas waktu 60 menit
        </small>
    </div>

</body>

</html>
