<?php
session_start();

if(!isset($_SESSION['login'])){
    header("Location: login.php");
    exit;
}

include "../config/koneksi.php";
include "../layout/admin_header.php";

if(isset($_POST['simpan'])){

    $nama = trim($_POST['nama']);
    $kategori = (int) $_POST['kategori'];
    $harga = (int) $_POST['harga'];
    $deskripsi = trim($_POST['deskripsi']);

    // Folder upload
    $upload_dir = "../assets/images/produk/";

    // Validasi ekstensi & mime
    $allowed_ext = ['jpg', 'jpeg', 'png', 'webp'];
    $allowed_mime = [
        'image/jpeg',
        'image/png',
        'image/webp'
    ];

    // =========================
    // VALIDASI GAMBAR UTAMA
    // =========================

    if(empty($_FILES['gambar']['name'])){
        die("Gambar utama wajib diupload!");
    }

    $gambar_utama = $_FILES['gambar']['name'];
    $tmp_utama = $_FILES['gambar']['tmp_name'];
    $size_utama = $_FILES['gambar']['size'];

    // Ambil ekstensi
    $ext_utama = strtolower(pathinfo($gambar_utama, PATHINFO_EXTENSION));

    // Validasi ekstensi
    if(!in_array($ext_utama, $allowed_ext)){
        die("Format gambar utama tidak diizinkan!");
    }

    // Validasi ukuran (max 2MB)
    if($size_utama > 2 * 1024 * 1024){
        die("Ukuran gambar utama maksimal 2MB!");
    }

    // Validasi mime type
    $finfo = finfo_open(FILEINFO_MIME_TYPE);
    $mime_utama = finfo_file($finfo, $tmp_utama);

    if(!in_array($mime_utama, $allowed_mime)){
        die("File utama bukan gambar valid!");
    }

    // Nama file aman
    $nama_utama_baru = uniqid('produk_', true) . '.' . $ext_utama;

    // Upload gambar utama
    if(move_uploaded_file($tmp_utama, $upload_dir . $nama_utama_baru)){

        // =========================
        // INSERT PRODUK
        // =========================

        $stmt = $conn->prepare("
            INSERT INTO produk 
            (nama_produk, id_kategori, harga, deskripsi, gambar)
            VALUES (?, ?, ?, ?, ?)
        ");

        $stmt->bind_param(
            "sisss",
            $nama,
            $kategori,
            $harga,
            $deskripsi,
            $nama_utama_baru
        );

        if($stmt->execute()){

            $id_produk_baru = $stmt->insert_id;

            // =========================
            // UPLOAD GALERI TAMBAHAN
            // =========================

            if(!empty($_FILES['gambar_tambahan']['name'][0])){

                foreach($_FILES['gambar_tambahan']['name'] as $key => $val){

                    $nama_file = $_FILES['gambar_tambahan']['name'][$key];
                    $tmp_file = $_FILES['gambar_tambahan']['tmp_name'][$key];
                    $size_file = $_FILES['gambar_tambahan']['size'][$key];

                    $ext = strtolower(pathinfo($nama_file, PATHINFO_EXTENSION));

                    // Validasi ekstensi
                    if(!in_array($ext, $allowed_ext)){
                        continue;
                    }

                    // Validasi ukuran
                    if($size_file > 2 * 1024 * 1024){
                        continue;
                    }

                    // Validasi MIME
                    $mime = finfo_file($finfo, $tmp_file);

                    if(!in_array($mime, $allowed_mime)){
                        continue;
                    }

                    // Nama file aman
                    $nama_galeri_baru = uniqid('galeri_', true) . '.' . $ext;

                    // Upload file
                    if(move_uploaded_file($tmp_file, $upload_dir . $nama_galeri_baru)){

                        $stmt_gambar = $conn->prepare("
                            INSERT INTO produk_gambar 
                            (id_produk, gambar_tambahan)
                            VALUES (?, ?)
                        ");

                        $stmt_gambar->bind_param(
                            "is",
                            $id_produk_baru,
                            $nama_galeri_baru
                        );

                        $stmt_gambar->execute();
                    }
                }
            }

            echo "
            <script>
                alert('Produk berhasil dipublish!');
                window.location.href='produk.php';
            </script>
            ";

        }else{
            echo "<script>alert('Gagal menyimpan produk!');</script>";
        }

    }else{
        echo "<script>alert('Gagal upload gambar utama!');</script>";
    }

    finfo_close($finfo);
}
?>

<style>
    /* CSS Styling tetap seperti milik Anda dengan tambahan preview */
    body { background-color: #f8fafc; font-family: 'Inter', sans-serif; color: #1e293b; }
    .form-container { max-width: 800px; margin: 50px auto; padding: 0 20px; }
    .form-card { background: white; padding: 40px; border-radius: 20px; box-shadow: 0 10px 25px rgba(0,0,0,0.05); border: 1px solid #f1f5f9; }
    .form-header { margin-bottom: 30px; text-align: center; }
    .form-header h2 { font-size: 1.8rem; font-weight: 800; color: #0f172a; }
    .input-group { margin-bottom: 20px; }
    .input-group label { display: block; margin-bottom: 8px; font-weight: 600; color: #334155; font-size: 0.9rem; }
    .input-group input, .input-group textarea, .input-group select { width: 100%; padding: 12px 15px; border: 1.5px solid #e2e8f0; border-radius: 10px; font-size: 1rem; box-sizing: border-box; }
    .input-group textarea { min-height: 150px; }
    
    /* Preview Gambar Style */
    .preview-container { display: flex; gap: 10px; flex-wrap: wrap; margin-top: 10px; }
    .preview-box { width: 100px; height: 100px; border-radius: 10px; overflow: hidden; border: 1px solid #e2e8f0; position: relative; }
    .preview-box img { width: 100%; height: 100%; object-fit: cover; }
    .main-label { background: #0ea5e9; color: white; font-size: 10px; position: absolute; top: 0; left: 0; padding: 2px 5px; }

    .btn-submit { width: 100%; background: linear-gradient(135deg, #0ea5e9, #38bdf8); color: white; padding: 14px; border: none; border-radius: 12px; font-weight: 700; cursor: pointer; transition: 0.3s; margin-top: 20px; }
    .btn-submit:hover { transform: translateY(-2px); box-shadow: 0 8px 20px rgba(14, 165, 233, 0.4); }
</style>

<?php
$query_kategori = mysqli_query($conn, "SELECT * FROM kategori");
?>
<div class="form-container">
    <div class="form-card">
        <div class="form-header">
            <h2>Tambah Produk Baru</h2>
            <p>Lengkapi data produk untuk menarik perhatian pelanggan</p>
        </div>

        <form method="POST" enctype="multipart/form-data">
            <div class="input-group">
                <label>Nama Produk</label>
                <input type="text" name="nama" placeholder="Contoh: Neon Box Bundar 2 Sisi" required>
            </div>

            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
                <div class="input-group">
                    <div class="input-group">

                    <label>Kategori</label>
                    <select name="kategori" required>
                        <option value="">-- Pilih Kategori --</option>

                        <?php while($k = mysqli_fetch_assoc($query_kategori)) { ?>
                            <option value="<?= $k['id_kategori']; ?>">
                                <?= $k['nama_kategori']; ?>
                            </option>
                        <?php } ?>

                    </select>
                </div>
                </div>
                <div class="input-group">
                    <label>Harga (Rp)</label>
                    <input type="number" name="harga" placeholder="650000" required>
                </div>
            </div>

            <div class="input-group">
                <label>Deskripsi Lengkap</label>
                <textarea name="deskripsi" placeholder="Jelaskan spesifikasi detail produk..." required></textarea>
            </div>

            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
                <div class="input-group">
                    <label>Gambar Utama (Thumbnail)</label>
                    <input type="file" name="gambar" accept="image/*" required onchange="previewMain(this)">
                    <div id="main-preview" class="preview-container"></div>
                </div>

                <div class="input-group">
                    <label>Gambar Galeri (Bisa pilih banyak)</label>
                    <input type="file" name="gambar_tambahan[]" accept="image/*" multiple onchange="previewMulti(this)">
                    <div id="multi-preview" class="preview-container"></div>
                </div>
            </div>

            <button type="submit" name="simpan" class="btn-submit">
                Publikasikan Produk
            </button>
            <a href="produk.php" style="display: block; text-align: center; margin-top: 20px; color: #64748b; text-decoration: none;">Kembali ke Dashboard</a>
        </form>
    </div>
</div>

<script>
    // Preview Gambar Utama
    function previewMain(input) {
        const container = document.getElementById('main-preview');
        container.innerHTML = '';
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                container.innerHTML = `
                    <div class="preview-box">
                        <span class="main-label">UTAMA</span>
                        <img src="${e.target.result}">
                    </div>`;
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    // Preview Gambar Galeri (Banyak)
    function previewMulti(input) {
        const container = document.getElementById('multi-preview');
        container.innerHTML = '';
        if (input.files) {
            Array.from(input.files).forEach(file => {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const div = document.createElement('div');
                    div.className = 'preview-box';
                    div.innerHTML = `<img src="${e.target.result}">`;
                    container.appendChild(div);
                }
                reader.readAsDataURL(file);
            });
        }
    }
</script>