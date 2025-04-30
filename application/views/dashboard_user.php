<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Belanja | Paket - Kangkung</title>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&family=Montserrat:wght@700&family=Lobster&display=swap" rel="stylesheet">

    
    <!-- Bootstrap via CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    
    <!-- FontAwesome CDN -->
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8f9fa;
        }

        /* Hero Section */
        .hero-section {
            background: url('<?= base_url("assets/img/knkng.jpg") ?>') no-repeat center center/cover;
            height: 500px;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            color: black;
            font-weight: bold;
            flex-direction: column;
            padding: 20px;
        }

        .hero-section h1 {
            font-size: 3rem;
            font-weight: bold;
        }

        /* Promo Banner */
        .promo-banner img {
            width: 100%;
            height: auto;
            border-radius: 10px;
        }

        /* Product Section */
        .product-card {
            text-align: center;
            border-radius: 10px;
            overflow: hidden;
            background: white;
            padding: 15px;
            transition: 0.3s;
            box-shadow: 0px 2px 6px rgba(0, 0, 0, 0.1);
        }
        
        .product-card:hover {
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
            transform: translateY(-5px);
        }

        .product-card img {
            width: 100%;
            height: 200px;
            object-fit: contain;
            border-radius: 8px;
        }

        .promo-banner img {
        width: 80%;
        height: 350px; /* Sesuaikan tinggi gambar sesuai kebutuhan */
        object-fit: cover; /* Memastikan gambar tidak terdistorsi */
        border-radius: 10px;
    }

        .promo-banner {
        text-align: center;
        font-family: 'Poppins', sans-serif; /* Menggunakan font stylish */
    }

        .custom-modal-content {
        display: flex;
        gap: 20px;
        padding: 20px;
        align-items: center;
        justify-content: center;
    }

    .custom-modal-left img {
        width: 220px;
        height: 220px;
        object-fit: cover;
        border-radius: 10px;
        border: 1px solid #ccc;
    }

    .custom-modal-right {
        text-align: left;
        width: 100%;
    }

    .custom-modal-right p, .custom-modal-right label {
        margin: 6px 0;
        font-size: 16px;
    }

    .custom-modal-right input {
        width: 80px;
        display: inline-block;
        padding: 5px;
    }

    .modal-footer-custom {
        display: flex;
        flex-direction: column;
        gap: 10px;
        padding: 0 20px 20px;
        align-items: stretch;
    }

    .btn-buy {
        background-color: blue;
        color: white;
        font-weight: bold;
    }

    .btn-cart {
        background-color: orange;
        color: white;
        font-weight: bold;
    }

    .btn-cancel {
        background-color: red;
        color: white;
        font-weight: bold;
    }
    </style>
</head>
<body>

    <?php if ($this->session->flashdata('welcome')): ?>
        <div id="alertOverlay" style="
            position: fixed;
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh;
            z-index: 9998;
            pointer-events: none;
        "></div>

        <div id="welcomeAlert" style="
            position: fixed;
            top: 80px;
            left: 50%;
            transform: translateX(-50%);
            background-color: rgb(255, 255, 255);
            color: #388e3c;
            padding: 15px 25px;
            border-radius: 10px;
            border: 1px solid #c3e6cb;
            z-index: 9999;
            box-shadow: 0 2px 6px rgba(0,0,0,0.2);
            font-weight: bold;
        ">
            <?= $this->session->flashdata('welcome'); ?>
            <span onclick="closeWelcomeAlert()" style="
                position: absolute;
                right: 10px;
                top: 5px;
                cursor: pointer;
                color: #155724;
            ">&times;</span>
        </div>
    <?php endif; ?>

    <div id="pageContent">
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

    <!-- Hero Section -->
    <section class="hero-section">
        <h1 style="color:white;">Belanja Sayur Kangkung & Bumbu Hemat</h1>
    </section>

    <!-- Promo Banners -->
    <div class="container my-5">
        <h2 class="text-center fw-bold text-success">Pakbum (Paket + Bumbu)</h2>
        <div class="row mt-4 g-3">
            <?php if (!empty($promo)) : ?>
                <?php foreach ($promo as $prm): ?>
                    <div class="col-md-4">
                        <div class="product-card" onclick="showModal('<?= $prm->id_sayur ?>', '<?= $prm->nama_sayur ?>', <?= $prm->harga ?>, '<?= base_url('uploads/' . $prm->foto) ?>', <?= $prm->stok ?>)">
                            <img src="<?= base_url('uploads/' . $prm->foto) ?>" alt="<?= $prm->nama_sayur ?>">
                            <h5><?= $prm->nama_sayur ?></h5>
                            <p>Rp<?= number_format($prm->harga, 0, ',', '.') ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="col-12 text-center">
                    <p class="text-muted">Tidak ada promo tersedia.</p>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <!-- Produk Section -->
    <div class="container my-5">
        <h2 class="text-center fw-bold text-success">Kangkung & Bumbu</h2>
        <div class="row mt-4 g-3">
            <?php if (isset($sayuran) && !empty($sayuran)) : ?>
                <?php foreach($sayuran as $syr): ?>
                    <div class="col-md-3">
                        <div class="product-card" onclick="showModal('<?= $syr->id_sayur ?>', '<?= $syr->nama_sayur ?>', <?= $syr->harga ?>, '<?= base_url('uploads/' . $syr->foto) ?>', <?= $syr->stok ?>)">
                            <img src="<?= base_url('uploads/' . $syr->foto) ?>" alt="<?= $syr->nama_sayur ?>">
                            <h5><?= $syr->nama_sayur ?></h5>
                            <p class="price">Rp<?= number_format($syr->harga, 0, ',', '.') ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="col-12 text-center">
                    <p class="text-muted">Tidak ada produk tersedia.</p>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-success text-white text-center py-3 mt-5 w-100">
        <p>&copy; @Paketkangkungofficial | Paket - kangkung 2025</p>
    </footer>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Modal Produk Custom (Sudah diperbaiki dan disesuaikan) -->
    <div class="modal fade" id="productModal" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header justify-content-end border-0">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
            <div class="modal-body">
                <div class="custom-modal-content">
                    <div class="custom-modal-left">
                        <img id="productImage" src="" alt="Product Image">
                    </div>
                <div class="custom-modal-right">
                    <p><strong id="productName">Nama Produk</strong></p>
                    <p>Harga : Rp<span id="productPrice">0</span>/Pcs</p>
                    <p>Jumlah : <input type="number" id="quantity" min="1" value="1" oninput="calculateTotal()"> /Pcs</p>
                    <p>Stok : <span id="productStock"></span> Pcs</p>
                    <p class="mt-2"><strong>Total Harga:</strong> <span id="totalPrice">Rp0</span></p>
                </div>
            </div>
        </div>
                <div class="modal-footer-custom">
                    <button class="btn btn-buy" onclick="buyNow()">Beli</button>
                    <button class="btn btn-cart" onclick="addToCart()">Simpan Keranjang</button>
                    <button class="btn btn-cancel" data-bs-dismiss="modal">Batal</button>
                </div>
            </div>
        </div>
    </div>

    <!-- ALERT TAMBAH KE KERANJANG -->
    <div id="cartAlertOverlay" style="display: none; position: fixed; top: 0; left: 0; width: 100vw; height: 100vh; background-color: rgba(0, 0, 0, 0.3); z-index: 9998;"></div>

    <div id="cartAlert" style="display: none; position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); background-color: white; padding: 30px; border-radius: 10px; box-shadow: 0 2px 10px rgba(0,0,0,0.2); z-index: 9999; text-align: center; width: 350px;">
        <span onclick="closeCartAlert()" style="position: absolute; top: 10px; right: 15px; cursor: pointer; font-weight: bold;">&times;</span>
        <p style="color: #2e7d32; font-weight: 500;">Barang berhasil di simpan dalam keranjang</p>
        <button onclick="goToCart()" style="margin-top: 10px; padding: 8px 15px; border: none; background-color: orange; color: white; border-radius: 5px; font-weight: bold; cursor: pointer;">Lihat Keranjang</button>
    </div>

<!-- Script untuk modal -->
<script>
let productStock = {};
let cart = JSON.parse(localStorage.getItem('cart')) || [];

    function showModal(id, name, price, imageSrc, stock = 100) {
        if (!(id in productStock)) {
            productStock[id] = stock;
        }

        document.getElementById('productName').innerText = name;
        document.getElementById('productPrice').innerText = price.toLocaleString('id-ID');
        document.getElementById('productImage').src = imageSrc;
        document.getElementById('quantity').value = 1;
        document.getElementById('productStock').innerText = stock;
        document.getElementById('totalPrice').innerText = "Rp" + price.toLocaleString('id-ID');

        document.getElementById('productModal').dataset.idProduct = id; // ini buat disimpan id produk

        const modal = new bootstrap.Modal(document.getElementById('productModal'));
        modal.show();
    }

    function calculateTotal() {
        let quantity = parseInt(document.getElementById('quantity').value) || 0;
        let price = parseInt(document.getElementById('productPrice').innerText.replace(/\./g, "")) || 0;
        
        let total = quantity * price;
        document.getElementById('totalPrice').innerText = "Rp" + total.toLocaleString('id-ID');
    }

    function buyNow() {
    let id = document.getElementById('productModal').dataset.idProduct;
    let quantity = parseInt(document.getElementById('quantity').value) || 0;

    if (quantity > 0 && productStock[id] >= quantity) {
        productStock[id] -= quantity;

        fetch("<?= base_url('user/update_stok') ?>", {
            method: "POST",
            headers: {
                "Content-Type": "application/x-www-form-urlencoded",
            },
            body: `id=${encodeURIComponent(id)}&quantity=${quantity}`
        })
        .then(response => response.text())
        .then(data => {
            alert("Pesanan telah diproses!");
            console.log(data);
            location.reload(); // <-- langsung reload
        })
        .catch(error => {
            console.error("Error updating stok:", error);
        });
    } else {
        alert("Stok tidak mencukupi!");
    }
}


function addToCart() {
    let name = document.getElementById('productName').innerText;
    let price = parseInt(document.getElementById('productPrice').innerText.replace(/\./g, "")) || 0;
    let quantity = parseInt(document.getElementById('quantity').value) || 0;
    let image = document.getElementById('productImage').src;

    if (quantity > 0) {
        let existingItem = cart.find(item => item.name === name);

        if (existingItem) {
            existingItem.quantity += quantity;
        } else {
            cart.push({ name, price, quantity, image });
        }

        localStorage.setItem('cart', JSON.stringify(cart));

        // 🔥 Tambahkan ini supaya stok berkurang
        fetch("<?= base_url('user/update_stok') ?>", {
            method: "POST",
            headers: {
                "Content-Type": "application/x-www-form-urlencoded",
            },
            body: `name=${encodeURIComponent(name)}&quantity=${quantity}`
        })
        .then(response => response.text())
        .then(data => {
            console.log(data);
            location.reload();
        })
        .catch(error => {
            console.error("Error updating stok:", error);
        });

        // Munculkan alert
        document.getElementById('cartAlertOverlay').style.display = 'block';
        document.getElementById('cartAlert').style.display = 'block';
    } else {
        alert("Jumlah tidak valid!");
    }
}

    function closeCartAlert() {
        document.getElementById('cartAlert').style.display = 'none';
        document.getElementById('cartAlertOverlay').style.display = 'none';
    }

    function goToCart() {
        window.location.href = "<?= base_url('keranjang'); ?>";
    }

    function closeWelcomeAlert() {
        document.getElementById('welcomeAlert').style.display = 'none';
        document.getElementById('alertOverlay').style.display = 'none';
        document.getElementById('pageContent').style.opacity = '1';
    }

    window.onload = function () {
        var alertBox = document.getElementById('welcomeAlert');
        var pageContent = document.getElementById('pageContent');
        var overlay = document.getElementById('alertOverlay');

        if (alertBox && pageContent && overlay) {
            pageContent.style.opacity = '0.3';
            overlay.style.backgroundColor = 'rgba(0, 0, 0, 0.3)';

            setTimeout(() => {
                closeWelcomeAlert();
            }, 2000);
        }
    };
</script>
</body>
</html>