<?php 
include 'layout/header.php'; 
?>

<?php
$pesan_status = "";

if (isset($_POST['kirim_pesan'])) {
    $nama    = htmlspecialchars($_POST['nama']);
    $email   = htmlspecialchars($_POST['email']);
    $produk  = htmlspecialchars($_POST['produk']);
    $pesan   = htmlspecialchars($_POST['pesan']);

    if (!empty($nama) && !empty($pesan)) {
        $pesan_status = "success";
    } else {
        $pesan_status = "error";
    }
}
?>

<main class="contact-page">
    <!-- Hero Section -->
    <section class="contact-hero">
        <div class="hero-overlay"></div>
        <div class="container hero-content">
            <div class="hero-badge">Hubungi Kami</div>
            <h1 class="hero-title">Konsultasi <span>Gratis</span></h1>
            <p class="hero-subtitle">Tim profesional kami siap membantu kebutuhan cetak digital Anda</p>
            <div class="hero-contact-info">
                <div class="hero-contact-item">
                    <i class="fas fa-phone-alt"></i>
                    <span>+62 821 1777 3741</span>
                </div>
                <div class="hero-contact-item">
                    <i class="fas fa-envelope"></i>
                    <span>legadigiprint@gmail.com</span>
                </div>
            </div>
        </div>
        <div class="hero-wave">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" preserveAspectRatio="none">
                <path fill="#f8fafc" fill-opacity="1" d="M0,192L48,197.3C96,203,192,213,288,208C384,203,480,181,576,181.3C672,181,768,203,864,208C960,213,1056,203,1152,186.7C1248,171,1344,149,1392,138.7L1440,128L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
            </svg>
        </div>
    </section>

    <!-- Main Contact Section -->
    <section class="contact-main">
        <div class="container">
            <div class="contact-wrapper">
                <!-- Left Side - Info Cards -->
                <div class="contact-info">
                    <div class="section-header">
                        <span class="section-tag">Informasi</span>
                        <h2 class="section-title">Hubungi <span>Kami</span></h2>
                        <div class="section-divider"></div>
                        <p class="section-desc">Siap membantu Anda 24/7 untuk konsultasi dan pemesanan</p>
                    </div>

                    <div class="info-cards">
                        <a href="https://www.google.com/maps/search/?api=1&query=Pasar+Senen+Jakarta+Pusat" target="_blank" class="info-card-link">
                            <div class="info-card">
                                <div class="icon-box">
                                    <i class="fas fa-map-marker-alt"></i>
                                </div>
                                <div class="text-box">
                                    <h4>Alamat Workshop</h4>
                                    <p>Pasar Senen, Jakarta Pusat, DKI Jakarta</p>
                                    <span class="card-link">Lihat di Google Maps →</span>
                                </div>
                            </div>
                        </a>

                        <a href="https://wa.me/6282117773741?text=Halo%20Lega%20DigiPrint,%20saya%20ingin%20konsultasi%20tentang%20layanan%20cetak" target="_blank" class="info-card-link">
                            <div class="info-card">
                                <div class="icon-box whatsapp">
                                    <i class="fab fa-whatsapp"></i>
                                </div>
                                <div class="text-box">
                                    <h4>WhatsApp Business</h4>
                                    <p>+62 821 1777 3741</p>
                                    <span class="card-link whatsapp-link">Chat Sekarang →</span>
                                </div>
                            </div>
                        </a>

                        <div class="info-card">
                            <div class="icon-box email">
                                <i class="fas fa-envelope"></i>
                            </div>
                            <div class="text-box">
                                <h4>Email Resmi</h4>
                                <p>legadigiprint@gmail.com</p>
                                <span class="card-link">Balas dalam 1x24 jam</span>
                            </div>
                        </div>

                        <div class="info-card">
                            <div class="icon-box time">
                                <i class="fas fa-clock"></i>
                            </div>
                            <div class="text-box">
                                <h4>Jam Operasional</h4>
                                <p>Senin - Sabtu: 08.00 - 20.00</p>
                                <p>Minggu: 09.00 - 17.00</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right Side - Form -->
                <div class="contact-form-wrapper">
                    <div class="form-card">
                        <div class="form-header">
                            <i class="fas fa-paper-plane"></i>
                            <h3>Kirim Pesan Cepat</h3>
                            <p>Isi form di bawah, kami akan merespon segera</p>
                        </div>

                        <form id="whatsappForm" class="contact-form">
                            <div class="form-row">
                                <div class="form-group">
                                    <label><i class="fas fa-user"></i> Nama Lengkap <span>*</span></label>
                                    <input type="text" id="nama" placeholder="Contoh: Muhammad Farhan" required>
                                </div>
                                <div class="form-group">
                                    <label><i class="fas fa-envelope"></i> Email Aktif</label>
                                    <input type="email" id="email" placeholder="nama@email.com">
                                </div>
                            </div>

                            <div class="form-group">
                                <label><i class="fas fa-tag"></i> Layanan yang Dibutuhkan</label>
                                <select id="produk">
                                    <option value="Banner / Spanduk">📌 Banner / Spanduk</option>
                                    <option value="Kartu Nama">💳 Kartu Nama</option>
                                    <option value="Stiker / Label">🏷️ Stiker / Label</option>
                                    <option value="Flyer / Brosur">📄 Flyer / Brosur</option>
                                    <option value="Kalender">📅 Kalender</option>
                                    <option value="Lainnya">📝 Lainnya</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label><i class="fas fa-comment-dots"></i> Isi Pesan <span>*</span></label>
                                <textarea id="pesan" rows="5" placeholder="Tuliskan detail pesanan, ukuran, jumlah, atau pertanyaan Anda..." required></textarea>
                            </div>

                            <button type="button" onclick="sendToWhatsapp()" class="btn-send">
                                <i class="fab fa-whatsapp"></i>
                                Kirim ke WhatsApp
                                <i class="fas fa-arrow-right"></i>
                            </button>
                        </form>

                        <div class="form-footer">
                            <p><i class="fas fa-shield-alt"></i> Data Anda aman dan tidak akan disalahgunakan</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="faq-section">
        <div class="container">
            <div class="section-header center">
                <span class="section-tag">FAQ</span>
                <h2 class="section-title">Pertanyaan <span>Umum</span></h2>
                <div class="section-divider"></div>
                <p class="section-desc">Hal-hal yang sering ditanyakan pelanggan kami</p>
            </div>

            <div class="faq-grid">
                <div class="faq-item">
                    <div class="faq-question">
                        <i class="fas fa-question-circle"></i>
                        <h4>Berapa lama proses pengerjaan?</h4>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        <p>Proses pengerjaan biasanya memakan waktu 1-3 hari kerja tergantung kompleksitas dan jumlah pesanan. Untuk pesanan besar bisa disesuaikan dengan kebutuhan Anda.</p>
                    </div>
                </div>
                <div class="faq-item">
                    <div class="faq-question">
                        <i class="fas fa-question-circle"></i>
                        <h4>Apakah menerima desain dari customer?</h4>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        <p>Ya, kami menerima desain dari customer dalam format PDF, AI, CDR, EPS, atau JPG resolusi tinggi. Kami juga menyediakan jasa desain jika diperlukan.</p>
                    </div>
                </div>
                <div class="faq-item">
                    <div class="faq-question">
                        <i class="fas fa-question-circle"></i>
                        <h4>Apakah ada minimal order?</h4>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        <p>Minimal order tergantung jenis produk. Untuk stiker dan kartu nama minimal 1 lembar, untuk banner dan spanduk minimal 1 meter.</p>
                    </div>
                </div>
                <div class="faq-item">
                    <div class="faq-question">
                        <i class="fas fa-question-circle"></i>
                        <h4>Apakah melayani pengiriman luar kota?</h4>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        <p>Ya, kami melayani pengiriman ke seluruh Indonesia melalui ekspedisi terpercaya seperti JNE, J&T, dan SiCepat.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Map Section -->
    <section class="map-section">
        <div class="container">
            <div class="map-card">
                <div class="map-content">
                    <div class="map-text">
                        <h3>Kunjungi Workshop Kami</h3>
                        <p>Datang langsung untuk konsultasi atau mengambil pesanan Anda</p>
                        <div class="map-address">
                            <i class="fas fa-location-dot"></i>
                            <span>Pasar Senen, Jakarta Pusat, DKI Jakarta</span>
                        </div>
                        <a href="https://www.google.com/maps/search/?api=1&query=Pasar+Senen+Jakarta+Pusat" target="_blank" class="map-btn">
                            <i class="fas fa-map"></i> Buka Google Maps
                        </a>
                    </div>
                    <div class="map-preview">
                        <iframe 
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.174!2d106.8415!3d-6.1754!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f5d2e764b12d%3A0x8c0b7c2f0e8b5a0!2sPasar%20Senen!5e0!3m2!1sid!2sid!4v1700000000000!5m2!1sid!2sid" 
                            width="100%" 
                            height="200" 
                            style="border:0; border-radius: 15px;" 
                            allowfullscreen="" 
                            loading="lazy" 
                            referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<style>
    /* ==================== VARIABLES ==================== */
    :root {
        --primary: #004ea2;
        --primary-dark: #0284c7;
        --primary-light: #7dd3fc;
        --dark: #0f172a;
        --dark-soft: #1e293b;
        --gray: #64748b;
        --gray-light: #94a3b8;
        --bg-light: #f8fafc;
        --white: #ffffff;
        --whatsapp: #25D366;
        --whatsapp-dark: #1eb954;
        --transition: all 0.3s ease;
    }

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    .contact-page {
        overflow-x: hidden;
    }

    .container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 20px;
        width: 100%;
    }

    /* ==================== HERO SECTION ==================== */
    .contact-hero {
        position: relative;
        background: linear-gradient(135deg, var(--dark) 0%, var(--dark-soft) 100%);
        overflow: hidden;
        padding: 60px 0 80px;
    }

    .contact-hero .hero-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: radial-gradient(circle at 70% 30%, rgba(56, 189, 248, 0.08) 0%, transparent 60%);
    }

    .hero-content {
        position: relative;
        z-index: 2;
        text-align: center;
    }

    .hero-badge {
        display: inline-block;
        background: rgba(56, 189, 248, 0.15);
        backdrop-filter: blur(10px);
        padding: 6px 16px;
        border-radius: 50px;
        color: var(--primary);
        font-weight: 600;
        font-size: 0.75rem;
        letter-spacing: 1px;
        margin-bottom: 20px;
        border: 1px solid rgba(56, 189, 248, 0.3);
    }

    .hero-title {
        font-size: 2.5rem;
        font-weight: 800;
        color: var(--white);
        margin-bottom: 15px;
    }

    .hero-title span {
        color: var(--primary);
    }

    .hero-subtitle {
        font-size: 1rem;
        color: rgba(255, 255, 255, 0.8);
        margin-bottom: 30px;
        max-width: 600px;
        margin-left: auto;
        margin-right: auto;
    }

    .hero-contact-info {
        display: flex;
        justify-content: center;
        gap: 30px;
        flex-wrap: wrap;
    }

    .hero-contact-item {
        display: flex;
        align-items: center;
        gap: 10px;
        background: rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(10px);
        padding: 10px 20px;
        border-radius: 50px;
        color: white;
        font-size: 0.9rem;
    }

    .hero-contact-item i {
        color: var(--primary);
    }

    .hero-wave {
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        line-height: 0;
    }

    .hero-wave svg {
        width: 100%;
        height: 40px;
    }

    /* ==================== SECTION HEADER ==================== */
    .section-header {
        margin-bottom: 35px;
    }

    .section-header.center {
        text-align: center;
    }

    .section-tag {
        display: inline-block;
        background: rgba(56, 189, 248, 0.1);
        color: var(--primary);
        padding: 4px 12px;
        border-radius: 30px;
        font-size: 0.7rem;
        font-weight: 700;
        letter-spacing: 1px;
        margin-bottom: 12px;
    }

    .section-title {
        font-size: 1.8rem;
        font-weight: 800;
        color: var(--dark);
        margin-bottom: 12px;
    }

    .section-title span {
        color: var(--primary);
    }

    .section-divider {
        width: 50px;
        height: 3px;
        background: var(--primary);
        border-radius: 3px;
        margin-bottom: 15px;
    }

    .center .section-divider {
        margin: 0 auto 15px;
    }

    .section-desc {
        color: var(--gray);
        font-size: 0.9rem;
    }

    /* ==================== MAIN CONTACT ==================== */
    .contact-main {
        padding: 60px 0;
        background: var(--bg-light);
    }

    .contact-wrapper {
        display: grid;
        grid-template-columns: 1fr 1.2fr;
        gap: 40px;
    }

    .info-cards {
        display: flex;
        flex-direction: column;
        gap: 15px;
    }

    .info-card-link {
        text-decoration: none;
        display: block;
    }

    .info-card {
        display: flex;
        gap: 18px;
        background: var(--white);
        padding: 22px;
        border-radius: 20px;
        transition: var(--transition);
        border: 1px solid #e2e8f0;
    }

    .info-card-link:hover .info-card {
        transform: translateX(8px);
        border-color: var(--primary);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.05);
    }

    .icon-box {
        width: 55px;
        height: 55px;
        background: rgba(56, 189, 248, 0.1);
        color: var(--primary);
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 15px;
        font-size: 1.3rem;
        flex-shrink: 0;
        transition: var(--transition);
    }

    .info-card:hover .icon-box {
        background: var(--primary);
        color: white;
    }

    .icon-box.whatsapp {
        background: rgba(37, 211, 102, 0.1);
        color: var(--whatsapp);
    }

    .info-card:hover .icon-box.whatsapp {
        background: var(--whatsapp);
        color: white;
    }

    .icon-box.email {
        background: rgba(56, 189, 248, 0.1);
        color: var(--primary);
    }

    .icon-box.time {
        background: rgba(245, 158, 11, 0.1);
        color: #f59e0b;
    }

    .text-box h4 {
        font-size: 1rem;
        margin-bottom: 5px;
        color: var(--dark);
    }

    .text-box p {
        color: var(--gray);
        font-size: 0.85rem;
        margin-bottom: 5px;
    }

    .card-link {
        font-size: 0.75rem;
        color: var(--primary);
        font-weight: 600;
    }

    .whatsapp-link {
        color: var(--whatsapp);
    }

    /* Form Card */
    .form-card {
        background: var(--white);
        border-radius: 25px;
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.05);
        overflow: hidden;
    }

    .form-header {
        background: #004ea2;
        padding: 25px 30px;
        text-align: center;
        color: white;
    }

    .form-header i {
        font-size: 2rem;
        margin-bottom: 10px;
    }

    .form-header h3 {
        font-size: 1.3rem;
        margin-bottom: 5px;
    }

    .form-header p {
        font-size: 0.85rem;
        opacity: 0.9;
    }

    .contact-form {
        padding: 30px;
    }

    .form-row {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 15px;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-group label {
        display: block;
        margin-bottom: 8px;
        font-weight: 600;
        font-size: 0.85rem;
        color: var(--dark);
    }

    .form-group label i {
        color: var(--primary);
        margin-right: 5px;
    }

    .form-group label span {
        color: #ef4444;
    }

    .form-group input,
    .form-group select,
    .form-group textarea {
        width: 100%;
        padding: 12px 15px;
        border: 1.5px solid #e2e8f0;
        border-radius: 12px;
        font-family: inherit;
        transition: var(--transition);
        font-size: 0.9rem;
    }

    .form-group input:focus,
    .form-group select:focus,
    .form-group textarea:focus {
        outline: none;
        border-color: var(--primary);
        box-shadow: 0 0 0 3px rgba(56, 189, 248, 0.1);
    }

    .btn-send {
        width: 100%;
        padding: 14px;
        background: var(--whatsapp);
        color: white;
        border: none;
        border-radius: 12px;
        font-weight: 700;
        font-size: 1rem;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
        transition: var(--transition);
    }

    .btn-send:hover {
        background: var(--whatsapp-dark);
        transform: translateY(-2px);
    }

    .form-footer {
        padding: 15px 30px 30px;
        text-align: center;
        border-top: 1px solid #e2e8f0;
    }

    .form-footer p {
        font-size: 0.75rem;
        color: var(--gray);
    }

    .form-footer i {
        color: #10b981;
    }

    /* ==================== FAQ SECTION ==================== */
    .faq-section {
        padding: 60px 0;
        background: var(--white);
    }

    .faq-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 20px;
        margin-top: 40px;
    }

    .faq-item {
        background: var(--bg-light);
        border-radius: 16px;
        overflow: hidden;
        transition: var(--transition);
    }

    .faq-question {
        display: flex;
        align-items: center;
        gap: 12px;
        padding: 18px 20px;
        cursor: pointer;
        background: var(--white);
        border: 1px solid #e2e8f0;
        border-radius: 16px;
    }

    .faq-question i:first-child {
        color: var(--primary);
        font-size: 1.1rem;
    }

    .faq-question h4 {
        flex: 1;
        font-size: 0.95rem;
        font-weight: 600;
        color: var(--dark);
        margin: 0;
    }

    .faq-question i:last-child {
        color: var(--gray);
        transition: transform 0.3s;
    }

    .faq-item.active .faq-question i:last-child {
        transform: rotate(180deg);
    }

    .faq-answer {
        display: none;
        padding: 0 20px 20px 52px;
        background: var(--white);
        border: 1px solid #e2e8f0;
        border-top: none;
        border-radius: 0 0 16px 16px;
    }

    .faq-item.active .faq-answer {
        display: block;
    }

    .faq-answer p {
        font-size: 0.85rem;
        color: var(--gray);
        line-height: 1.6;
    }

    /* ==================== MAP SECTION ==================== */
    .map-section {
        padding: 0 0 60px;
        background: var(--bg-light);
    }

    .map-card {
        background: var(--white);
        border-radius: 25px;
        overflow: hidden;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
    }

    .map-content {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 30px;
        padding: 30px;
    }

    .map-text h3 {
        font-size: 1.3rem;
        margin-bottom: 10px;
        color: var(--dark);
    }

    .map-text p {
        color: var(--gray);
        font-size: 0.85rem;
        margin-bottom: 20px;
    }

    .map-address {
        display: flex;
        align-items: center;
        gap: 10px;
        padding: 12px 15px;
        background: var(--bg-light);
        border-radius: 12px;
        margin-bottom: 20px;
    }

    .map-address i {
        color: var(--primary);
        font-size: 1.1rem;
    }

    .map-address span {
        font-size: 0.85rem;
        color: var(--dark);
    }

    .map-btn {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        background: var(--primary);
        color: white;
        padding: 10px 20px;
        border-radius: 40px;
        text-decoration: none;
        font-weight: 600;
        font-size: 0.85rem;
        transition: var(--transition);
    }

    .map-btn:hover {
        background: var(--primary-dark);
        transform: translateY(-2px);
    }

    /* ==================== RESPONSIVE ==================== */
    @media (max-width: 992px) {
        .contact-wrapper {
            grid-template-columns: 1fr;
            gap: 30px;
        }
        
        .faq-grid {
            grid-template-columns: 1fr;
        }
        
        .map-content {
            grid-template-columns: 1fr;
        }
        
        .form-row {
            grid-template-columns: 1fr;
            gap: 0;
        }
    }

    @media (max-width: 768px) {
        .hero-title {
            font-size: 1.8rem;
        }
        
        .hero-subtitle {
            font-size: 0.85rem;
        }
        
        .hero-contact-info {
            gap: 15px;
        }
        
        .hero-contact-item {
            font-size: 0.75rem;
            padding: 6px 12px;
        }
        
        .hero-wave svg {
            height: 30px;
        }
        
        .section-title {
            font-size: 1.5rem;
        }
        
        .contact-main {
            padding: 40px 0;
        }
        
        .info-card {
            padding: 15px;
        }
        
        .icon-box {
            width: 45px;
            height: 45px;
            font-size: 1rem;
        }
        
        .text-box h4 {
            font-size: 0.9rem;
        }
        
        .text-box p {
            font-size: 0.75rem;
        }
        
        .contact-form {
            padding: 20px;
        }
        
        .form-header {
            padding: 20px;
        }
        
        .faq-question {
            padding: 14px 16px;
        }
        
        .faq-question h4 {
            font-size: 0.85rem;
        }
        
        .faq-answer {
            padding: 0 16px 16px 50px;
        }
        
        .map-content {
            padding: 20px;
        }
    }

    @media (max-width: 480px) {
        .container {
            padding: 0 15px;
        }
        
        .hero-title {
            font-size: 1.5rem;
        }
        
        .hero-contact-item {
            font-size: 0.7rem;
            padding: 5px 10px;
        }
        
        .btn-send {
            font-size: 0.85rem;
        }
    }
</style>

<script>
// Fungsi untuk mengirim ke WhatsApp (TIDAK DIUBAH)
function sendToWhatsapp() {
    const nama = document.getElementById('nama').value;
    const email = document.getElementById('email').value;
    const produk = document.getElementById('produk').value;
    const pesan = document.getElementById('pesan').value;
    
    const nomorAdmin = "6282117773741";

    if (nama === "" || pesan === "") {
        alert("Mohon lengkapi Nama dan Pesan Anda.");
        return;
    }

    const teksPesan = 
        "*Halo Lega DigiPrint!*%0A" +
        "Saya ingin bertanya tentang layanan percetakan:%0A%0A" +
        "*Nama:* " + nama + "%0A" +
        "*Email:* " + email + "%0A" +
        "*Produk:* " + produk + "%0A" +
        "*Pesan:* " + pesan;

    const url = "https://api.whatsapp.com/send?phone=" + nomorAdmin + "&text=" + teksPesan;
    window.open(url, '_blank');
}

// FAQ Accordion (Toggle)
document.querySelectorAll('.faq-question').forEach(question => {
    question.addEventListener('click', () => {
        const faqItem = question.parentElement;
        faqItem.classList.toggle('active');
    });
});
</script>

<?php 
include 'layout/footer.php'; 
?>