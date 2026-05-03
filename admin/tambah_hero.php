<?php
include "../config/koneksi.php";

// Penanganan Upload
if (isset($_POST['upload'])) {
    $gambar = $_FILES['gambar']['name'];
    $tmp    = $_FILES['gambar']['tmp_name'];
    $target = "../assets/images/hero/" . $gambar;

    if (move_uploaded_file($tmp, $target)) {
        // Gunakan prepared statement atau minimal mysqli_real_escape_string untuk keamanan
        $safe_gambar = mysqli_real_escape_string($conn, $gambar);
        mysqli_query($conn, "INSERT INTO hero (gambar) VALUES ('$safe_gambar')");
        
        header("Location: hero.php?status=success");
        exit;
    } else {
        $error = "Gagal mengunggah gambar ke server.";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Hero | Admin Lega DigiPrint</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        :root {
            --primary: #0284c7;
            --bg-body: #f8fafc;
            --white: #ffffff;
            --text-main: #1e293b;
            --text-muted: #64748b;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: var(--bg-body);
            color: var(--text-main);
            padding: 40px 20px;
            display: flex;
            justify-content: center;
        }

        .upload-container {
            background: var(--white);
            width: 100%;
            max-width: 500px;
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.05);
            border: 1px solid #e2e8f0;
        }

        .header-form {
            text-align: center;
            margin-bottom: 30px;
        }

        .header-form h2 {
            font-size: 1.5rem;
            margin-bottom: 8px;
        }

        .header-form p {
            color: var(--text-muted);
            font-size: 0.9rem;
        }

        /* --- Custom File Input --- */
        .drop-zone {
            width: 100%;
            height: 200px;
            padding: 25px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
            border: 2px dashed #cbd5e1;
            border-radius: 12px;
            cursor: pointer;
            transition: 0.3s;
            background: #fdfdfd;
            position: relative;
            margin-bottom: 25px;
        }

        .drop-zone:hover {
            border-color: var(--primary);
            background: #f0f9ff;
        }

        .drop-zone i {
            font-size: 3rem;
            color: var(--primary);
            margin-bottom: 15px;
        }

        .drop-zone input {
            position: absolute;
            width: 100%;
            height: 100%;
            opacity: 0;
            cursor: pointer;
        }

        #preview-img {
            max-width: 100%;
            max-height: 150px;
            border-radius: 8px;
            display: none;
            margin-top: 10px;
        }

        /* --- Buttons --- */
        .btn-submit {
            background: var(--primary);
            color: white;
            width: 100%;
            padding: 14px;
            border: none;
            border-radius: 10px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: 0.3s;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }

        .btn-submit:hover {
            background: #0369a1;
            transform: translateY(-2px);
        }

        .btn-back {
            display: block;
            text-align: center;
            margin-top: 20px;
            color: var(--text-muted);
            text-decoration: none;
            font-size: 0.9rem;
        }

        .btn-back:hover {
            color: var(--text-main);
        }

        .alert-error {
            background: #fee2e2;
            color: #b91c1c;
            padding: 12px;
            border-radius: 8px;
            margin-bottom: 20px;
            font-size: 0.85rem;
            border-left: 4px solid #ef4444;
        }
    </style>
</head>
<body>

    <div class="upload-container">
        <div class="header-form">
            <h2><i class="fas fa-image"></i> Upload Gambar Hero</h2>
            <p>Gunakan gambar resolusi tinggi (min. 1920x1080 px) untuk hasil terbaik.</p>
        </div>

        <?php if(isset($error)): ?>
            <div class="alert-error">
                <i class="fas fa-exclamation-triangle"></i> <?= $error; ?>
            </div>
        <?php endif; ?>

        <form method="POST" enctype="multipart/form-data">
            <div class="drop-zone" id="drop-zone">
                <div id="upload-icon">
                    <i class="fas fa-cloud-upload-alt"></i>
                    <p>Klik atau Seret Gambar ke Sini</p>
                    <small style="color: #94a3b8;">PNG, JPG atau WEBP (Max 2MB)</small>
                </div>
                <img id="preview-img" src="#" alt="Preview">
                <input type="file" name="gambar" id="file-input" accept="image/*" required>
            </div>

            <button type="submit" name="upload" class="btn-submit">
                <i class="fas fa-upload"></i> Unggah Sekarang
            </button>
        </form>

        <a href="hero.php" class="btn-back"><i class="fas fa-arrow-left"></i> Kembali ke Kelola Hero</a>
    </div>

    <script>
        // Script untuk menampilkan preview gambar
        const fileInput = document.getElementById('file-input');
        const previewImg = document.getElementById('preview-img');
        const uploadIcon = document.getElementById('upload-icon');

        fileInput.onchange = evt => {
            const [file] = fileInput.files;
            if (file) {
                previewImg.src = URL.createObjectURL(file);
                previewImg.style.display = 'block';
                uploadIcon.style.display = 'none';
            }
        }
    </script>

</body>
</html>