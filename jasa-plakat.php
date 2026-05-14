<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jasa Pembuatan Plakat</title>

    <style>
        /* =========================
        GLOBAL
        ========================= */

        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
            font-family:Arial, sans-serif;
        }

        body{
            background:#f4f8ff;
            color:#222;
        }

        /* =========================
        HERO
        ========================= */

        .hero{
            width:100%;
            height:450px;
            position:relative;
            overflow:hidden;
        }

        .hero img{
            width:100%;
            height:100%;
            object-fit:cover;
        }

        .overlay{
            position:absolute;
            top:0;
            left:0;
            width:100%;
            height:100%;
            background:rgba(0,0,0,0.45);
            display:flex;
            flex-direction:column;
            justify-content:center;
            align-items:center;
            text-align:center;
            color:#fff;
            padding:20px;
        }

        .overlay h1{
            font-size:48px;
            margin-bottom:15px;
        }

        .overlay p{
            max-width:700px;
            line-height:1.8;
            font-size:18px;
        }

        /* =========================
        CONTENT
        ========================= */

        .container{
            max-width:1200px;
            margin:auto;
            padding:60px 20px;
        }

        /* =========================
        SECTION TITLE + FITUR
        ========================= */

        .section-wrapper{
            display:flex;
            justify-content:space-between;
            align-items:flex-start;
            gap:40px;
            margin-bottom:60px;
        }

        /* SECTION TITLE */

        .section-title{
            flex:1;
            text-align:left;
            max-width:100%;
        }

        .badge{
            display:inline-block;
            background:#0057ff;
            color:#fff;
            padding:8px 18px;
            border-radius:30px;
            font-size:14px;
            margin-bottom:18px;
            font-weight:bold;
        }

        .section-title h2{
            font-size:40px;
            color:#0057ff;
            margin-bottom:20px;
            line-height:1.3;
        }

        .section-title p{
            color:#555;
            line-height:1.9;
            font-size:17px;
        }

        /* =========================
        FITUR LIST
        ========================= */

        .fitur-grid{
            flex:1;
            display:grid;
            grid-template-columns:1fr 1fr;
            gap:18px;
        }

        .fitur-item{
            background:#fff;
            padding:20px;
            border-radius:15px;
            box-shadow:0 5px 15px rgba(0,0,0,0.06);
            font-weight:600;
            text-align:center;
        }

        /* =========================
        PRODUK
        ========================= */

        .produk-title{
            text-align:center;
            margin:70px 0 40px;
        }

        .produk-title h2{
            color:#0057ff;
            font-size:36px;
            margin-bottom:10px;
        }

        .produk-grid{
            display:grid;
            grid-template-columns:repeat(3,1fr);
            gap:25px;
        }

        .produk-card{
            background:#fff;
            border-radius:18px;
            overflow:hidden;
            box-shadow:0 10px 20px rgba(0,0,0,0.08);
            transition:0.3s;
        }

        .produk-card:hover{
            transform:translateY(-8px);
        }

        .produk-card img{
            width:100%;
            height:220px;
            object-fit:cover;
        }

        .produk-content{
            padding:20px;
        }

        .produk-content h3{
            margin-bottom:10px;
            color:#0057ff;
        }

        .produk-content p{
            color:#555;
            line-height:1.6;
            font-size:15px;
        }

        /* =========================
        BUTTON
        ========================= */

        .btn-wrapper{
            text-align:center;
            margin-top:50px;
        }

        .btn{
            display:inline-block;
            padding:14px 30px;
            background:#0057ff;
            color:#fff;
            text-decoration:none;
            border-radius:12px;
            transition:0.3s;
        }

        .btn:hover{
            background:#003fc2;
        }

        /* =========================
        TABLET
        ========================= */

        @media(max-width:992px){

            .section-wrapper{
                flex-direction:column;
            }

            .fitur-grid{
                width:100%;
            }

            .produk-grid{
                grid-template-columns:repeat(2,1fr);
            }

        }

        /* =========================
        SMARTPHONE
        ========================= */

        @media(max-width:768px){

            .hero{
                height:300px;
            }

            .overlay h1{
                font-size:32px;
            }

            .overlay p{
                font-size:15px;
            }

            .section-title h2,
            .produk-title h2{
                font-size:28px;
            }

            .section-title p{
                font-size:15px;
            }

            /* FITUR LIST 1 KOLOM */
            .fitur-grid{
                grid-template-columns:1fr;
            }

            /* PRODUK 2 KE SAMPING */
            .produk-grid{
                grid-template-columns:repeat(2,1fr);
                gap:12px;
            }

            .produk-card img{
                height:140px;
            }

            .produk-content{
                padding:12px;
            }

            .produk-content h3{
                font-size:15px;
            }

            .produk-content p{
                font-size:12px;
                line-height:1.5;
            }

        }
    </style>
</head>
<body>

    <!-- HERO -->
    <section class="hero">

        <img src="assets/images/iklan/iklan3.png" alt="Plakat">

        <div class="overlay">

            <h1>Jasa Pembuatan Plakat</h1>

            <p>
                Hadirkan penghargaan eksklusif dengan desain elegan,
                material premium, dan kualitas terbaik untuk setiap momen spesial.
            </p>

        </div>

    </section>

    <!-- CONTENT -->
    <section class="container">

        <!-- TENTANG -->
        <div class="section-title">

            <span class="badge">Plakat Premium</span>

            <h2>Plakat Elegan Untuk Berbagai Acara</h2>

            <p>
                Kami menyediakan jasa pembuatan plakat eksklusif untuk
                penghargaan, seminar, wisuda, kenang-kenangan, event perusahaan,
                dan berbagai acara spesial lainnya. Menggunakan material berkualitas
                tinggi dengan desain modern sehingga menghasilkan plakat mewah,
                elegan, dan berkelas.
            </p>

            <div class="fitur-grid">

                <div class="fitur-item">
                    ✔ Material Premium & Berkualitas
                </div>

                <div class="fitur-item">
                    ✔ Desain Elegan & Modern
                </div>

                <div class="fitur-item">
                    ✔ Cocok Untuk Semua Acara
                </div>

                <div class="fitur-item">
                    ✔ Custom Sesuai Kebutuhan
                </div>

            </div>

        </div>

        <!-- PRODUK -->
        <div class="produk-title">

            <h2>Display Produk Plakat</h2>

            <p>
                Berbagai jenis plakat eksklusif dengan desain premium dan elegan.
            </p>

        </div>

        <div class="produk-grid">

            <!-- PRODUK 1 -->
            <div class="produk-card">

                <img src="assets/images/display/plakatakrilik.jpeg" alt="Plakat Akrilik">

                <div class="produk-content">

                    <h3>Plakat Akrilik</h3>

                    <p>
                        Plakat modern dengan bahan akrilik premium,
                        cocok untuk penghargaan dan seminar.
                    </p>

                </div>

            </div>

            <!-- PRODUK 2 -->
            <div class="produk-card">

                <img src="assets/images/display/plakatwisuda.png" alt="Plakat Wisuda">

                <div class="produk-content">

                    <h3>Plakat Wisuda</h3>

                    <p>
                        Desain elegan dan mewah untuk kenang-kenangan
                        wisuda maupun acara spesial lainnya.
                    </p>

                </div>

            </div>

            <!-- PRODUK 3 -->
            <div class="produk-card">

                <img src="assets/images/display/plakatcustom.png" alt="Plakat Custom">

                <div class="produk-content">

                    <h3>Plakat Custom</h3>

                    <p>
                        Melayani pembuatan plakat custom sesuai desain,
                        logo, dan kebutuhan acara Anda.
                    </p>

                </div>

            </div>

        </div>

        <!-- BUTTON -->
        <div class="btn-wrapper">
            <a href="index.php" class="btn">Kembali ke Beranda</a>
        </div>

    </section>

</body>
</html>
<?php include "layout/footer.php"; ?>