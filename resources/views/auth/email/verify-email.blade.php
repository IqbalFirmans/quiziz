<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verifikasi Email</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body style="background-color: #f8f9fa; padding: 20px;">

    <div class="container" style="max-width: 600px; margin: 0 auto; background-color: #ffffff; padding: 20px; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">

        <h2 style="color: #e91e63;">Verifikasi Email</h2>
        <p>Halo {{ $name }}!</p>
        <p>Silakan klik tautan berikut untuk melakukan verifikasi email Anda:</p>

        <a href="{{ $url }}" class="btn btn-primary" style="background-color: #e91e63; border-color: #e91e63; color: #ffffff; text-decoration: none;">Verifikasi Email</a>

        <p style="margin-top: 20px;">Jika Anda tidak membuat akun, tidak perlu melakukan tindakan lebih lanjut.</p>

    </div>

</body>
</html>
