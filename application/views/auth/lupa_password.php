<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Lupa Password - Paket Kangkung</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #e8f5e9; /* sama kayak login */
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0;
        }
        .forgot-container {
            background: white;
            padding: 40px;
            border-radius: 10px;
            width: 400px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        h2 {
            color: #388e3c;
            margin-bottom: 20px;
        }
        form {
            display: flex;
            flex-direction: column;
        }
        input[type="email"] {
            padding: 12px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }
        button {
            padding: 12px;
            background-color: #388e3c;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        button:hover {
            background-color: #2e7d32;
        }
        .error-message {
            color: red;
            margin-bottom: 15px;
        }
        .back-to-login {
            margin-top: 15px;
            font-size: 14px;
        }
        .back-to-login a {
            color: #ff6f00;
            text-decoration: none;
        }
        .back-to-login a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<div class="forgot-container">
    <h2>Lupa Password</h2>
    <?php if ($this->session->flashdata('error')): ?>
        <p class="error-message"><?= $this->session->flashdata('error'); ?></p>
    <?php endif; ?>

    <form action="<?= base_url('auth/cek_email') ?>" method="POST">
        <input type="email" name="email" placeholder="Masukkan Email Anda" required>
        <button type="submit">Lanjut</button>
    </form>

    <div class="back-to-login">
        <a href="<?= base_url('auth/login') ?>">Kembali ke Login</a>
    </div>
</div>

</body>
</html>
