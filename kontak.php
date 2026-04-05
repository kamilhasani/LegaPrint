<?php 
// Panggil Header
include 'layout/header.php'; 
?>

<?php
// LOGIKA PHP (Diletakkan paling atas)
$pesan_status = "";

if (isset($_POST['kirim_pesan'])) {
    // Simulasi pengiriman pesan atau simpan ke database
    // include "config/koneksi.php";
    
    $nama    = htmlspecialchars($_POST['nama']);
    $email   = htmlspecialchars($_POST['email']);
    $produk  = htmlspecialchars($_POST['produk']);
    $pesan   = htmlspecialchars($_POST['pesan']);

    // Contoh validasi sederhana
    if (!empty($nama) && !empty($pesan)) {
        $pesan_status = "success";
    } else {
        $pesan_status = "error";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hubungi Kami | Lega DigiPrint</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        /* ===== CSS INTERNAL ===== */
        :root {
            --primary: #38bdf8;
            --primary-dark: #0284c7;
            --dark: #0f172a;
            --text-main: #1e293b;
            --text-muted: #64748b;
            --bg-light: #f8fafc;
            --white: #ffffff;
        }

        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            font-family: 'Inter', sans-serif;
            color: var(--text-main);
            background-color: var(--white);
            line-height: 1.6;
        }

        .container {
            max-width: 1100px;
            margin: 0 auto;
            padding: 0 20px;
        }

        section { padding: 80px 0; }

        .section-title {
            text-align: center;
            margin-bottom: 50px;
        }

        .section-title h2 { font-size: 2.5rem; margin-bottom: 10px; }
        .section-title h2 span { color: var(--primary); }

        /* Layout Wrapper */
        .kontak-wrapper {
            display: grid;
            grid-template-columns: 1fr 1.5fr;
            gap: 40px;
            align-items: start;
        }

        /* Info Side */
        .info-card-link {
        text-decoration: none; /* Menghilangkan garis bawah link */
        color: inherit; /* Menjaga warna teks tetap sama */
        display: block; /* Agar seluruh area kartu bisa diklik */
        margin-bottom: 20px;
        }

        .info-card-link:hover .info-card {
            background: #f0f9ff; /* Memberi feedback warna saat di-hover */
            border-color: var(--primary);
        }

        .info-card {
            display: flex;
            gap: 20px;
            background: var(--bg-light);
            padding: 25px;
            border-radius: 15px;
            margin-bottom: 20px;
            transition: 0.3s;
        }

        .info-card-link:hover .info-card {
        background: #f0fff4; /* Warna hijau sangat muda */
        border-color: #25D366;
        transform: translateX(10px);
        transition: 0.3s;
        }

        .info-card:hover { transform: translateX(10px); background: #e0f2fe; }

        .icon-box {
            width: 50px;
            height: 50px;
            background: var(--primary);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 10px;
            font-size: 1.2rem;
            flex-shrink: 0;
        }

        .text-box h4 { margin-bottom: 5px; font-size: 1.1rem; }
        .text-box p { color: var(--text-muted); font-size: 0.9rem; }

        /* Form Side */
        .kontak-form {
            background: white;
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 15px 35px rgba(0,0,0,0.05);
            border: 1px solid #f1f5f9;
        }

        .form-group { margin-bottom: 20px; }
        .form-group label { display: block; margin-bottom: 8px; font-weight: 600; font-size: 0.9rem; }
        
        .form-group input, .form-group select, .form-group textarea {
            width: 100%;
            padding: 12px 15px;
            border: 1.5px solid #e2e8f0;
            border-radius: 10px;
            font-family: inherit;
            transition: 0.3s;
        }

        .form-group input:focus, .form-group textarea:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 4px rgba(56, 189, 248, 0.1);
        }

        .btn-send {
            width: 100%;
            padding: 15px;
            background: var(--primary);
            color: white;
            border: none;
            border-radius: 10px;
            font-weight: 700;
            cursor: pointer;
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 10px;
            transition: 0.3s;
        }

        .btn-send:hover { background: var(--primary-dark); transform: translateY(-2px); }

        /* Alert */
        .alert {
            padding: 15px;
            border-radius: 10px;
            margin-bottom: 25px;
            text-align: center;
            font-weight: 600;
        }
        .alert-success { background: #dcfce7; color: #15803d; }
        .alert-error { background: #fee2e2; color: #b91c1c; }

        @media (max-width: 768px) {
            .kontak-wrapper { grid-template-columns: 1fr; }
        }
    </style>
</head>
<body>

<section id="kontak">
    <div class="container">
        <div class="section-title">
            <h2>Hubungi <span>Kami</span></h2>
            <p>Punya ide cetak menarik? Diskusikan dengan tim profesional kami sekarang.</p>
        </div>

        <div class="kontak-wrapper">
            <div class="info-side">
                <a href="https://www.google.com/maps/search/?api=1&query=Pasar+Kemis+Tangerang+Banten" target="_blank" class="info-card-link">
                    <div class="info-card">
                        <div class="icon-box"><i class="fas fa-map-marker-alt"></i></div>
                        <div class="text-box">
                            <h4>Alamat Workshop</h4>
                            <p>Pasar Kemis, Tangerang, Banten</p>
                            <small style="color: var(--primary); font-weight: 600;">Lihat di Google Maps &raquo;</small>
                        </div>
                    </div>
                </a>
                <a href="https://wa.me/6281234567890?text=Halo%20Lega%20DigiPrint,%20saya%20ingin%20tanya%20tentang%20layanan%20cetak" target="_blank" class="info-card-link">
                    <div class="info-card">
                        <div class="icon-box"><i class="fab fa-whatsapp"></i></div>
                        <div class="text-box">
                            <h4>WhatsApp Kami</h4>
                            <p>0812-3456-7890</p>
                            <small style="color: #25D366; font-weight: 600;">Klik untuk Chat Sekarang »</small>
                        </div>
                    </div>
                </a>
                <div class="info-card">
                    <div class="icon-box"><i class="fas fa-envelope"></i></div>
                    <div class="text-box">
                        <h4>Email Bisnis</h4>
                        <p>legadigiprint@gmail.com</p>
                    </div>
                </div>
            </div>

            <div class="kontak-form">
            <h3 style="margin-bottom: 20px; font-size: 1.2rem;">Kirim Pesan Cepat</h3>

            <form id="whatsappForm">
                <div class="form-group">
                    <label>Nama Lengkap</label>
                    <input type="text" id="nama" placeholder="Contoh: Muhammad Farhan" required>
                </div>
                <div class="form-group">
                    <label>Email Aktif</label>
                    <input type="email" id="email" placeholder="nama@email.com" required>
                </div>
                <div class="form-group">
                    <label>Layanan yang Dibutuhkan</label>
                    <select id="produk">
                        <option value="Banner / Spanduk">Banner / Spanduk</option>
                        <option value="Kartu Nama">Kartu Nama</option>
                        <option value="Stiker / Label">Stiker / Label</option>
                        <option value="Lainnya">Lainnya</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Isi Pesan</label>
                    <textarea id="pesan" rows="4" placeholder="Tuliskan detail pesanan Anda..." required></textarea>
                </div>
                
                <button type="button" onclick="sendToWhatsapp()" class="btn-send" style="background-color: #25D366; border: none;">
                    Kirim ke WhatsApp <i class="fab fa-whatsapp"></i>
                </button>
            </form>
        </div>

        <script>
        function sendToWhatsapp() {
            // 1. Ambil data dari input
            const nama = document.getElementById('nama').value;
            const email = document.getElementById('email').value;
            const produk = document.getElementById('produk').value;
            const pesan = document.getElementById('pesan').value;
            
            // 2. Ganti nomor WhatsApp admin di bawah ini (Gunakan kode negara, tanpa tanda +)
            const nomorAdmin = "6281317908079"; 

            // 3. Validasi sederhana
            if (nama === "" || pesan === "") {
                alert("Mohon lengkapi Nama dan Pesan Anda.");
                return;
            }

            // 4. Susun format pesan
            const teksPesan = 
                "*Halo Lega DigiPrint!*%0A" +
                "Saya ingin bertanya tentang layanan percetakan:%0A%0A" +
                "*Nama:* " + nama + "%0A" +
                "*Email:* " + email + "%0A" +
                "*Produk:* " + produk + "%0A" +
                "*Pesan:* " + pesan;

            // 5. Redirect ke WhatsApp API
            const url = "https://api.whatsapp.com/send?phone=" + nomorAdmin + "&text=" + teksPesan;
            
            // Buka di tab baru
            window.open(url, '_blank').focus();
        }
        </script>
        </div>
    </div>
</section>

</body>
</html>

<?php 
// Panggil Footer
include 'layout/footer.php'; 
?>