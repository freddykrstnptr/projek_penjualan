<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Ubah Password - Paket Kangkung</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #e8f5e9;
            margin: 0;
        }
        .ubah-password-container {
            background: white;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 400px;
            text-align: center;
        }
        h2 {
            color: #388e3c;
            margin-bottom: 30px;
        }
        input {
            width: 100%;
            padding: 10px;
            margin: 10px 0 20px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }
        button {
            width: 100%;
            padding: 10px;
            background-color: #388e3c;
            border: none;
            color: white;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        button:hover {
            background-color: #2e7d32;
        }
    </style>
</head>
<body>

<div class="ubah-password-container">
    <h2>Ubah Password Baru</h2>
    <form action="<?= base_url('auth/ubah_password') ?>" method="POST">
        <input type="hidden" name="email" value="<?= $email ?>">
        <input type="password" name="password" placeholder="Masukkan Password Baru" required>
        <button type="submit">Ubah Password</button>
    </form>
</div>

</body>
</html>
