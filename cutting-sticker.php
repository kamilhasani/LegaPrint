<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jasa Cutting Sticker</title>

    <style>
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

        /* HERO */
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

        /* CONTENT */
        .container{
            max-width:1200px;
            margin:auto;
            padding:60px 20px;
        }

        /* SECTION TITLE + LAYANAN */
        .section-wrapper{
            display:flex;
            justify-content:space-between;
            align-items:flex-start;
            gap:40px;
            margin-bottom:60px;
        }

        .section-title{
            flex:1;
            text-align:left; /* rata kiri */
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

        /*LAYANAN LIST*/
        .layanan-list{
            flex:1;
            display:grid;
            grid-template-columns:1fr 1fr;
            gap:15px;
        }

        .layanan-item{
            background:#fff;
            padding:18px;
            border-radius:14px;
            box-shadow:0 5px 15px rgba(0,0,0,0.06);
            font-weight:600;
        }

        /* PRODUK GRID */
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

        /* BUTTON */
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

        /* TABLET */
        @media(max-width:992px){

            .section-wrapper{
                flex-direction:column;
            }

            .layanan-list{
                width:100%;
            }

            .produk-grid{
                grid-template-columns:repeat(2,1fr);
            }

        }

        /* SMARTPHONE */
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

            .section-title h2{
                font-size:28px;
            }

            .section-title p{
                font-size:15px;
            }

            .layanan-list{
                grid-template-columns:1fr;
            }

            /* PRODUK 2 KE SAMPING */
            .produk-grid{
                grid-template-columns:repeat(2,1fr);
                gap:12px;
            }

            .produk-card img{
                height:150px;
            }

            .produk-content{
                padding:12px;
            }

            .produk-content h3{
                font-size:16px;
            }

            .produk-content p{
                font-size:13px;
            }

        }

    </style>
</head>
<body>

    <!-- HERO -->
    <section class="hero">
        <img src="assets/images/iklan/iklan1.png" alt="Cutting Sticker">

        <div class="overlay">
            <h1>Jasa Cutting Sticker</h1>

            <p>
                Solusi branding terbaik dengan hasil cutting presisi,
                modern, dan berkualitas premium.
            </p>
        </div>
    </section>

    <!-- ARTIKEL -->
    <section class="container">
        <div class="section-title">

            <span class="badge">Layanan Profesional</span>
            <h2>Solusi Cutting Sticker Berkualitas Premium</h2>
            <p>
                Kami menghadirkan layanan cutting sticker modern dengan hasil
                presisi tinggi, desain elegan, dan material berkualitas premium.
                Cocok untuk kebutuhan branding usaha, dekorasi kendaraan,
                toko, promosi bisnis, hingga kebutuhan custom sesuai keinginan Anda.
            </p>
            <div class="layanan-list">

                <div class="layanan-item">
                    ✔ Desain Custom & Modern
                </div>

                <div class="layanan-item">
                    ✔ Bahan Tahan Air & Tahan Panas
                </div>

                <div class="layanan-item">
                    ✔ Pengerjaan Cepat & Rapi
                </div>

                <div class="layanan-item">
                    ✔ Cocok Untuk Branding Usaha
                </div>
            </div>
        </div>


        <!-- DISPLAY PRODUK -->
        <div class="section-title">
            <h2>Produk Kami</h2>
            <p>Berbagai hasil cutting sticker terbaik dan berkualitas.</p>
        </div>

        <div class="produk-grid">

            <!-- PRODUK 1 -->
            <div class="produk-card">
                <img src="assets/images/display/StickerVinylMeteran.jpeg" alt="Sticker Mobil">

                <div class="produk-content">
                    <h3>Sticker Vynil Meteran</h3>

                    <p>
                        Cutting sticker kendaraan dengan desain modern,
                        tahan air, dan tahan panas.
                    </p>
                </div>
            </div>

            <!-- PRODUK 2 -->
            <div class="produk-card">
                <img src="assets/images/display/Sticker.png" alt="Sticker Toko">

                <div class="produk-content">
                    <h3>Sticker </h3>

                    <p>
                        Cocok untuk branding toko, kaca, dan promosi
                        usaha dengan hasil elegan.
                    </p>
                </div>
            </div>

            <!-- PRODUK 3 -->
            <div class="produk-card">
                <img src="assets/images/display/stikertoples.jpeg" alt="Sticker Custom">

                <div class="produk-content">
                    <h3>Sticker Custom</h3>

                    <p>
                        Melayani desain custom sesuai kebutuhan dengan
                        kualitas premium dan presisi tinggi.
                    </p>
                </div>
            </div>

            <!-- PRODUK 4 -->
            <div class="produk-card">
                <img src="assets/images/display/StickerVinylBlockout.jpeg" alt="Sticker Custom">

                <div class="produk-content">
                    <h3>Sticker </h3>

                    <p>
                        Melayani desain custom sesuai kebutuhan dengan
                        kualitas premium dan presisi tinggi.
                    </p>
                </div>
            </div>

        </div>

        <!-- BUTTON -->
        <div class="btn-wrapper">
            <a href="index.php" class="btn">Kembali ke Beranda</a>
        </div>

    </section>

    <?php include "layout/footer.php"; ?>

</body>
</html>
