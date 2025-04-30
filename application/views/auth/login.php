<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Paket - Kangkung</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #e8f5e9;
        }
        .login-container {
            display: flex;
            background: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 600px;
        }
        .image-section {
            background: url('<?= base_url("assets/img/kang.jpg") ?>') no-repeat center;
            background-size: cover;
            width: 300px;
            height: 412px;
        }
        .form-section {
            padding: 40px;
            width: 300px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
        h2 {
            text-align: center;
            color: #388e3c;
        }
        input {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        button {
            width: 100%;
            padding: 10px;
            background: #388e3c;
            border: none;
            color: white;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }
        button:hover {
            background: #2e7d32;
        }
        .register-link {
            text-align: center;
            margin-top: 10px;
        }
        .forgot-password {
            text-align: center;
            margin-top: 5px;
        }
        .forgot-password a {
            color: #ff6f00;
            text-decoration: none;
            font-size: 14px;
        }
        .forgot-password a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="image-section"></div>
        <div class="form-section">
            <h2>Login (Welcome) Paket - Kangkung</h2>
            <?php if ($this->session->flashdata('error')): ?>
                <div style="position: fixed; top: 20px; left: 50%; transform: translateX(-50%); background-color: #f8d7da; color: #721c24; padding: 15px 25px; border-radius: 10px; border: 1px solid #f5c6cb; z-index: 9999; box-shadow: 0 2px 6px rgba(0,0,0,0.2);">
                    <?= $this->session->flashdata('error'); ?>
                    <span onclick="this.parentElement.style.display='none';" style="position: absolute; right: 10px; top: 5px; cursor: pointer; color: #721c24;">&times;</span>
                </div>
            <?php endif; ?>

            <form action="<?= base_url('auth/login_aksi') ?>" method="POST">
                <input type="email" name="email" placeholder="Email" required>
                <input type="password" name="password" placeholder="Password" required>
                <button type="submit">Login</button>
            </form>
            <p class="register-link">Belum punya akun? <a href="<?= base_url('auth/register') ?>">Daftar</a></p>
            <p class="forgot-password"><a href="<?= base_url('auth/lupa_password') ?>">Lupa Password?</a></p>
        </div>
    </div>

<script>
    window.onload = function () {
        setTimeout(function () {
            var alerts = document.querySelectorAll('div[style*="position: fixed"]');
            alerts.forEach(function(alert) {
                alert.style.display = 'none';
            });
        }, 3000); // auto hide in 3 seconds
    };
</script>
</body>
</html>