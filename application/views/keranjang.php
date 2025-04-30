<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keranjang | Paket Kangkung</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
    body {
        font-family: 'Poppins', sans-serif;
        background-color: #f8f9fa;
    }

    .hero-section {
        background: url('assets/img/knkng.jpg') no-repeat center center/cover;
        height: 400px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        text-shadow: 1px 1px 2px black;
        font-size: 2.5rem;
        font-weight: bold;
    }   

    .cart-container {
        background: white;
        border-radius: 10px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        padding: 30px;
        margin: 30px auto;
        max-width: 700px;
    }

    .cart-item {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 15px;
        border: 1px solid #ddd;
        border-radius: 8px;
        margin-bottom: 15px;
    }

    .cart-item img {
        width: 60px;
        height: 60px;
        object-fit: cover;
        border-radius: 8px;
    }

    .cart-item span {
        flex-grow: 1;
        margin-left: 15px;
    }

    .btn-buy {
        background-color: blue;
        color: white;
        font-weight: bold;
        border: none;
        padding: 6px 14px;
        border-radius: 5px;
    }

    .btn-delete {
        background-color: red;
        color: white;
        font-weight: bold;
        border: none;
        padding: 6px 14px;
        border-radius: 5px;
    }

    footer {
        background-color: #198754;
        color: white;
        text-align: center;
        padding: 10px 0;
        margin-top: 50px;
    }
</style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
    <div class="container">
        <a class="navbar-brand fw-bold text-success" href="#">Paket - Kangkung</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link" href="<?= base_url('user/home'); ?>">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="#" onclick="goToCart()"><i class="fas fa-shopping-cart"></i><span style='font-size:18px;'>&#128722;</span></a></li>
                <li class="nav-item"><a class="nav-link" href="<?= base_url('auth/logout') ?>">Logout</a></li>
            </ul>
        </div>
    </div>
</nav>

<div class="hero-section">
    Belanja Sayur Kangkung Hemat
</div>

<div class="container">
    <h4 class="text-center text-success my-4">Barang dalam keranjang anda :</h4>
    <div class="cart-container" id="cartList">
    <!-- List keranjang akan di-render lewat JavaScript -->
    </div>
</div>

<footer class="bg-success text-white text-center py-3 mt-5">
    <p>&copy; @Paketkangkungofficial | Paket - kangkung 2025</p>
</footer>

<!-- Bootstrap JS via CDN -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

<script>
const cart = JSON.parse(localStorage.getItem('cart')) || [];
const cartList = document.getElementById('cartList');

    if (cart.length === 0) {
        cartList.innerHTML = '<p class="text-center">Keranjang kamu kosong!</p>';
    } else {
        cart.forEach((item, index) => {
            const itemHTML = `
                <div class="cart-item">
                    <img src="${item.image}" alt="${item.name}">
                    <span>${item.name} Harga Rp${item.price.toLocaleString('id-ID')}</span>
                    <div class="d-flex gap-2">
                        <button class="btn-buy" onclick="beliItem(${index})">Beli</button>
                        <button class="btn-delete" onclick="hapusItem(${index})">Hapus</button>
                    </div>
                </div>
        `;
            cartList.innerHTML += itemHTML;
        });
    }

    function hapusItem(index) {
        cart.splice(index, 1);
        localStorage.setItem('cart', JSON.stringify(cart));
        location.reload();
    }

    function beliItem(index) {
        alert(`Terima kasih sudah membeli: ${cart[index].name}`);
        hapusItem(index);
    }

    function goToCart() {
        window.location.href = "<?= base_url('keranjang'); ?>";
    }
</script>
</body>
</html>