<?php
include "../config/koneksi.php";
include "../layout/admin_header.php";

$id = mysqli_real_escape_string($conn, $_GET['id']);
$data = mysqli_query($conn, "SELECT * FROM produk WHERE id='$id'");
$query_kategori = mysqli_query($conn, "SELECT * FROM kategori ORDER BY nama_kategori ASC");
$d = mysqli_fetch_array($data);

// Jika produk tidak ditemukan
if (!$d) {
    echo "<script>alert('Produk tidak ditemukan!'); window.location='produk.php';</script>";
    exit;
}

// Logika Hapus Gambar Galeri Satuan (via URL)
if (isset($_GET['hapus_foto'])) {
    $id_foto = $_GET['hapus_foto'];
    $cek_foto = mysqli_query($conn, "SELECT gambar_tambahan FROM produk_gambar WHERE id_gambar='$id_foto'");
    $f = mysqli_fetch_array($cek_foto);
    if ($f) {
        unlink("../assets/images/produk/" . $f['gambar_tambahan']);
        mysqli_query($conn, "DELETE FROM produk_gambar WHERE id_gambar='$id_foto'");
        echo "<script>alert('Foto galeri berhasil dihapus!'); window.location='edit_produk.php?id=$id';</script>";
    }
}

if (isset($_POST['update'])) {
    $nama = mysqli_real_escape_string($conn, $_POST['nama']);
    $kategori = mysqli_real_escape_string($conn, $_POST['kategori']);
    $harga = mysqli_real_escape_string($conn, $_POST['harga']);
    $deskripsi = mysqli_real_escape_string($conn, $_POST['deskripsi']);

    $gambar_query = "";

    // cek gambar utama
    if (!empty($_FILES['gambar']['name'])) {
        $gambar = $_FILES['gambar']['name'];
        $tmp = $_FILES['gambar']['tmp_name'];
        $nama_gambar_baru = time() . "_update_" . str_replace(' ', '_', $gambar);

        if (move_uploaded_file($tmp, "../assets/images/produk/" . $nama_gambar_baru)) {
            // Hapus gambar lama
            if (!empty($d['gambar']) && file_exists("../assets/images/produk/" . $d['gambar'])) {
                unlink("../assets/images/produk/" . $d['gambar']);
            }
            $gambar_query = ", gambar='$nama_gambar_baru'";
        }
    }

    // QUERY UPDATE
    $query = "UPDATE produk SET 
                nama_produk='$nama',
                id_kategori='$kategori',
                harga='$harga',
                deskripsi='$deskripsi'
                $gambar_query
              WHERE id='$id'";

    $result = mysqli_query($conn, $query);

    if (!$result) {
        die("ERROR UPDATE: " . mysqli_error($conn));
    }

    // Upload Galeri Tambahan
    if (!empty($_FILES['gambar_tambahan']['name'][0])) {
        foreach ($_FILES['gambar_tambahan']['name'] as $key => $val) {
            if ($_FILES['gambar_tambahan']['error'][$key] === 0) {
                $nama_file = $_FILES['gambar_tambahan']['name'][$key];
                $tmp_file = $_FILES['gambar_tambahan']['tmp_name'][$key];
                $nama_galeri_baru = time() . "_" . rand(10, 99) . "_galeri_" . str_replace(' ', '_', $nama_file);

                if (move_uploaded_file($tmp_file, "../assets/images/produk/" . $nama_galeri_baru)) {
                    mysqli_query($conn, "INSERT INTO produk_gambar (id_produk, gambar_tambahan)
                                         VALUES ('$id', '$nama_galeri_baru')");
                }
            }
        }
    }

    echo "<script>
        alert('Produk berhasil diupdate!');
        window.location.href='produk.php';
    </script>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <title>Edit Produk - Lega DigiPrint Admin</title>

    <style>
        /* ============================================================
                   VARIABLES
                   ============================================================ */
        :root {
            --primary: #004ea2;
            --primary-dark: #003d82;
            --primary-light: #3b82f6;
            --primary-gradient: linear-gradient(135deg, #004ea2 0%, #3b82f6 100%);
            --success: #10b981;
            --danger: #ef4444;
            --warning: #f59e0b;
            --dark: #0f172a;
            --dark-soft: #1e293b;
            --gray: #64748b;
            --gray-light: #94a3b8;
            --bg-light: #f1f5f9;
            --white: #ffffff;
            --shadow: 0 8px 30px rgba(0, 0, 0, 0.06);
            --shadow-hover: 0 20px 50px rgba(0, 0, 0, 0.12);
            --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            --radius: 16px;
        }

        /* ============================================================
                   RESET
                   ============================================================ */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
            background: #f1f5f9;
            color: var(--dark-soft);
            min-height: 100vh;
        }

        /* ============================================================
                   CONTAINER
                   ============================================================ */
        .edit-container {
            max-width: 900px;
            margin: 40px auto;
            padding: 0 20px;
        }

        /* ============================================================
                   CARD
                   ============================================================ */
        .edit-card {
            background: var(--white);
            padding: 40px;
            border-radius: var(--radius);
            box-shadow: var(--shadow);
            border: 1px solid #e8e4dc;
        }

        /* ============================================================
                   HEADER
                   ============================================================ */
        .edit-header {
            text-align: center;
            margin-bottom: 35px;
            padding-bottom: 25px;
            border-bottom: 2px solid #f1f5f9;
        }

        .edit-header .back-link {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            color: var(--gray);
            text-decoration: none;
            font-size: 0.85rem;
            font-weight: 500;
            margin-bottom: 15px;
            transition: var(--transition);
        }

        .edit-header .back-link:hover {
            color: var(--primary);
        }

        .edit-header h2 {
            font-size: 1.8rem;
            font-weight: 800;
            color: var(--dark);
            margin-bottom: 6px;
        }

        .edit-header p {
            color: var(--gray);
            font-size: 0.9rem;
        }

        /* ============================================================
                   FORM
                   ============================================================ */
        .form-group {
            margin-bottom: 22px;
        }

        .form-group label {
            display: block;
            font-weight: 600;
            color: var(--dark-soft);
            font-size: 0.85rem;
            margin-bottom: 8px;
        }

        .form-group label .required {
            color: var(--danger);
            margin-left: 2px;
        }

        .form-group input,
        .form-group select,
        .form-group textarea {
            width: 100%;
            padding: 12px 16px;
            border: 2px solid #e8e4dc;
            border-radius: 10px;
            font-size: 0.95rem;
            font-family: inherit;
            transition: var(--transition);
            background: #faf8f6;
            color: var(--dark-soft);
        }

        .form-group input:focus,
        .form-group select:focus,
        .form-group textarea:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 4px rgba(0, 78, 162, 0.08);
            background: var(--white);
        }

        .form-group textarea {
            min-height: 180px;
            resize: vertical;
        }

        .form-group select {
            appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 12 12'%3E%3Cpath fill='%2364748b' d='M6 8L1 3h10z'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 16px center;
            padding-right: 40px;
            cursor: pointer;
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }

        .form-hint {
            display: block;
            font-size: 0.75rem;
            color: var(--gray-light);
            margin-top: 6px;
        }

        /* ============================================================
                   SECTION TITLE
                   ============================================================ */
        .section-title {
            font-size: 1.1rem;
            font-weight: 700;
            color: var(--dark);
            margin: 30px 0 15px;
            padding-bottom: 10px;
            border-bottom: 2px solid #f1f5f9;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .section-title i {
            color: var(--primary);
            font-size: 1.1rem;
        }

        /* ============================================================
                   IMAGE PREVIEW
                   ============================================================ */
        .image-preview-section {
            background: #faf8f6;
            padding: 20px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            gap: 25px;
            border: 2px dashed #e8e4dc;
            margin-bottom: 25px;
            flex-wrap: wrap;
        }

        .current-img-wrapper {
            position: relative;
            width: 110px;
            height: 110px;
            flex-shrink: 0;
            border-radius: 12px;
            overflow: hidden;
            border: 3px solid var(--white);
            box-shadow: var(--shadow);
        }

        .current-img-wrapper img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .image-info p {
            margin: 0 0 8px;
            font-weight: 600;
            color: var(--dark-soft);
            font-size: 0.9rem;
        }

        .image-info input[type="file"] {
            font-size: 0.8rem;
            padding: 8px 0;
            border: none;
            background: transparent;
        }

        /* ============================================================
                   GALERI GRID
                   ============================================================ */
        .galeri-manage {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(130px, 1fr));
            gap: 15px;
            margin-bottom: 25px;
        }

        .galeri-item {
            position: relative;
            border-radius: 12px;
            overflow: hidden;
            height: 130px;
            border: 2px solid #e8e4dc;
            transition: var(--transition);
            background: #faf8f6;
        }

        .galeri-item:hover {
            border-color: var(--primary);
        }

        .galeri-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .galeri-item .btn-delete-foto {
            position: absolute;
            top: 6px;
            right: 6px;
            background: rgba(239, 68, 68, 0.92);
            color: var(--white);
            border: none;
            padding: 5px 10px;
            border-radius: 6px;
            cursor: pointer;
            font-size: 0.65rem;
            font-weight: 600;
            text-decoration: none;
            transition: var(--transition);
            display: flex;
            align-items: center;
            gap: 4px;
            backdrop-filter: blur(4px);
        }

        .galeri-item .btn-delete-foto:hover {
            background: var(--danger);
            transform: scale(1.05);
        }

        .galeri-empty {
            color: var(--gray-light);
            font-size: 0.85rem;
            padding: 20px;
            text-align: center;
            background: #faf8f6;
            border-radius: 12px;
            border: 2px dashed #e8e4dc;
            grid-column: span 4;
        }

        /* ============================================================
                   FILE INPUT GALERI
                   ============================================================ */
        .file-input-wrapper {
            position: relative;
            padding: 12px 16px;
            border: 2px dashed #e8e4dc;
            border-radius: 10px;
            background: #faf8f6;
            transition: var(--transition);
            cursor: pointer;
        }

        .file-input-wrapper:hover {
            border-color: var(--primary);
            background: rgba(0, 78, 162, 0.03);
        }

        .file-input-wrapper input[type="file"] {
            position: absolute;
            inset: 0;
            opacity: 0;
            cursor: pointer;
        }

        .file-input-wrapper .file-label {
            display: flex;
            align-items: center;
            gap: 12px;
            color: var(--gray);
            font-size: 0.9rem;
            pointer-events: none;
        }

        .file-input-wrapper .file-label i {
            font-size: 1.5rem;
            color: var(--primary);
        }

        .file-input-wrapper .file-label .file-text {
            font-weight: 500;
        }

        .file-input-wrapper .file-label .file-sub {
            font-size: 0.75rem;
            color: var(--gray-light);
        }

        /* ============================================================
                   BUTTONS
                   ============================================================ */
        .btn-update {
            width: 100%;
            background: var(--primary-gradient);
            color: var(--white);
            padding: 16px;
            border: none;
            border-radius: 12px;
            font-weight: 700;
            font-size: 1rem;
            cursor: pointer;
            transition: var(--transition);
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            margin-top: 25px;
        }

        .btn-update:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(0, 78, 162, 0.35);
        }

        .btn-update i {
            font-size: 1.1rem;
        }

        .btn-cancel {
            display: block;
            text-align: center;
            margin-top: 18px;
            color: var(--gray-light);
            text-decoration: none;
            font-size: 0.9rem;
            font-weight: 500;
            transition: var(--transition);
        }

        .btn-cancel:hover {
            color: var(--danger);
        }

        /* ============================================================
                   RESPONSIVE
                   ============================================================ */
        @media (max-width: 768px) {
            .edit-container {
                margin: 20px auto;
                padding: 0 15px;
            }

            .edit-card {
                padding: 25px 20px;
            }

            .form-row {
                grid-template-columns: 1fr;
                gap: 0;
            }

            .edit-header h2 {
                font-size: 1.4rem;
            }

            .image-preview-section {
                flex-direction: column;
                align-items: flex-start;
                text-align: left;
            }

            .current-img-wrapper {
                width: 90px;
                height: 90px;
            }

            .galeri-manage {
                grid-template-columns: repeat(auto-fill, minmax(100px, 1fr));
                gap: 12px;
            }

            .galeri-item {
                height: 100px;
            }

            .galeri-item .btn-delete-foto {
                font-size: 0.55rem;
                padding: 4px 8px;
            }

            .section-title {
                font-size: 1rem;
            }

            .form-group input,
            .form-group select,
            .form-group textarea {
                font-size: 0.9rem;
                padding: 10px 14px;
            }

            .btn-update {
                padding: 14px;
                font-size: 0.9rem;
            }
        }

        @media (max-width: 480px) {
            .edit-card {
                padding: 20px 16px;
            }

            .edit-header h2 {
                font-size: 1.2rem;
            }

            .galeri-manage {
                grid-template-columns: repeat(auto-fill, minmax(80px, 1fr));
                gap: 10px;
            }

            .galeri-item {
                height: 80px;
            }

            .galeri-item .btn-delete-foto {
                font-size: 0.5rem;
                padding: 3px 6px;
                top: 4px;
                right: 4px;
            }

            .current-img-wrapper {
                width: 75px;
                height: 75px;
            }
        }
    </style>
</head>
<body>

<div class="edit-container">
    <div class="edit-card">
        <!-- HEADER -->
        <div class="edit-header">
            <a href="produk.php" class="back-link">
                <i class="fas fa-arrow-left"></i> Kembali ke Produk
            </a>
            <h2>✏️ Edit Produk</h2>
            <p>Kelola informasi produk dan galeri foto dengan mudah</p>
        </div>

        <!-- FORM -->
        <form method="POST" enctype="multipart/form-data">
            <!-- Informasi Produk -->
            <div class="form-row">
                <div class="form-group">
                    <label>Nama Produk <span class="required">*</span></label>
                    <input type="text" name="nama" value="<?php echo htmlspecialchars($d['nama_produk']); ?>" required>
                </div>
                <div class="form-group">
                    <label>Harga (Rp) <span class="required">*</span></label>
                    <input type="number" name="harga" value="<?php echo $d['harga']; ?>" required min="0">
                </div>
            </div>

            <div class="form-group">
                <label>Kategori <span class="required">*</span></label>
                <select name="kategori" required>
                    <option value="">-- Pilih Kategori --</option>
                    <?php while ($k = mysqli_fetch_assoc($query_kategori)) { ?>
                        <option value="<?= $k['id_kategori']; ?>" <?= ($d['id_kategori'] == $k['id_kategori']) ? 'selected' : '' ?>>
                            <?= htmlspecialchars($k['nama_kategori']); ?>
                        </option>
                    <?php } ?>
                </select>
            </div>

            <div class="form-group">
                <label>Deskripsi Detail <span class="required">*</span></label>
                <textarea name="deskripsi" required><?php echo htmlspecialchars($d['deskripsi']); ?></textarea>
                <span class="form-hint">Deskripsi lengkap tentang produk ini</span>
            </div>

            <!-- Gambar Utama -->
            <div class="section-title">
                <i class="fas fa-image"></i> Gambar Utama
            </div>

            <div class="image-preview-section">
                <div class="current-img-wrapper">
                    <img src="../assets/images/produk/<?php echo $d['gambar']; ?>" alt="Gambar Utama">
                </div>
                <div class="image-info">
                    <p>Ganti Gambar Utama?</p>
                    <input type="file" name="gambar" accept="image/*">
                    <span class="form-hint">Kosongkan jika tidak ingin mengganti gambar utama</span>
                </div>
            </div>

            <!-- Galeri Foto -->
            <div class="section-title">
                <i class="fas fa-images"></i> Galeri Foto Produk
            </div>

            <div class="galeri-manage">
                <?php
                $galeri = mysqli_query($conn, "SELECT * FROM produk_gambar WHERE id_produk='$id'");
                if (mysqli_num_rows($galeri) > 0) {
                    while ($g = mysqli_fetch_array($galeri)) {
                ?>
                        <div class="galeri-item">
                            <img src="../assets/images/produk/<?php echo $g['gambar_tambahan']; ?>" alt="Foto Galeri">
                            <a href="edit_produk.php?id=<?php echo $id; ?>&hapus_foto=<?php echo $g['id_gambar']; ?>"
                               class="btn-delete-foto"
                               onclick="return confirm('Yakin ingin menghapus foto ini dari galeri?')">
                                <i class="fas fa-trash"></i> Hapus
                            </a>
                        </div>
                <?php
                    }
                } else {
                    echo '<div class="galeri-empty"><i class="fas fa-images" style="display:block;font-size:2rem;margin-bottom:10px;color:#cbd5e1;"></i> Belum ada foto galeri tambahan.</div>';
                }
                ?>
            </div>

            <!-- Tambah Foto Galeri -->
            <div class="form-group">
                <label>Tambah Foto Galeri Baru</label>
                <div class="file-input-wrapper">
                    <input type="file" name="gambar_tambahan[]" accept="image/*" multiple>
                    <div class="file-label">
                        <i class="fas fa-cloud-upload-alt"></i>
                        <div>
                            <div class="file-text">Pilih foto untuk ditambahkan</div>
                            <div class="file-sub">Bisa pilih beberapa foto sekaligus</div>
                        </div>
                    </div>
                </div>
                <span class="form-hint">* Foto akan ditambahkan ke galeri produk</span>
            </div>

            <!-- Submit -->
            <button type="submit" name="update" class="btn-update">
                <i class="fas fa-save"></i> Simpan Perubahan
            </button>

            <a href="produk.php" class="btn-cancel">
                <i class="fas fa-times-circle"></i> Batalkan
            </a>
        </form>
    </div>
</div>

<?php include "../layout/footer.php"; ?>