<?php
include 'koneksi.php';

// Ambil data gejala dari database
$query = "SELECT * FROM gejala";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Gejala</title>

    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        :root {
            --navy: #2C5F8F;
            --toska: #17A2B8;
            --text-dark: #333333;
            --white: #FFFFFF;
            --alert-red: #D9534F;
            --gradient-primary: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            --gradient-navy: linear-gradient(135deg, #2C5F8F 0%, #17A2B8 100%);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            padding: 40px 15px;
            color: var(--text-dark);
            position: relative;
            overflow-x: hidden;
        }

        /* Animated background particles */
        body::before {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: 
                radial-gradient(circle at 20% 50%, rgba(255, 255, 255, 0.1) 0%, transparent 50%),
                radial-gradient(circle at 80% 80%, rgba(255, 255, 255, 0.1) 0%, transparent 50%),
                radial-gradient(circle at 40% 20%, rgba(255, 255, 255, 0.05) 0%, transparent 50%);
            animation: float 20s ease-in-out infinite;
            pointer-events: none;
            z-index: 0;
        }

        @keyframes float {
            0%, 100% { transform: translate(0, 0); }
            25% { transform: translate(10px, -10px); }
            50% { transform: translate(-10px, 10px); }
            75% { transform: translate(10px, 10px); }
        }

        /* Back Button */
        .btn-back {
            position: fixed;
            top: 30px;
            left: 30px;
            background: rgba(255, 255, 255, 0.95);
            color: var(--navy);
            padding: 12px 24px;
            border-radius: 50px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.15);
            backdrop-filter: blur(10px);
            z-index: 1000;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .btn-back:hover {
            background: var(--white);
            color: var(--toska);
            transform: translateX(-5px);
            box-shadow: 0 6px 30px rgba(0, 0, 0, 0.2);
        }

        .container {
            max-width: 920px;
            background: rgba(255, 255, 255, 0.98);
            backdrop-filter: blur(20px);
            padding: 50px 60px;
            margin: auto;
            border-radius: 30px;
            box-shadow: 0 25px 70px rgba(0, 0, 0, 0.3);
            border: 1px solid rgba(255, 255, 255, 0.3);
            position: relative;
            z-index: 10;
            animation: slideUp 0.8s ease-out;
        }

        @keyframes slideUp {
            from { 
                opacity: 0; 
                transform: translateY(50px) scale(0.95); 
            }
            to { 
                opacity: 1; 
                transform: translateY(0) scale(1); 
            }
        }

        /* Header Section */
        .title-wrapper {
            text-align: center;
            margin-bottom: 45px;
            position: relative;
        }

        .title-wrapper .icon-wrapper {
            width: 90px;
            height: 90px;
            background: var(--gradient-navy);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
            box-shadow: 0 10px 30px rgba(44, 95, 143, 0.3);
            animation: pulse 2s ease-in-out infinite;
        }

        @keyframes pulse {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.05); }
        }

        .title-wrapper i {
            font-size: 45px;
            color: var(--white);
        }

        h1 {
            font-size: 36px;
            background: var(--gradient-navy);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            font-weight: 800;
            margin: 0 0 12px;
            letter-spacing: 0.5px;
        }

        .subtitle {
            color: #666666ff;
            font-size: 16px;
            font-weight: 400;
            margin-bottom: 15px;
        }

        .divider {
            width: 100px;
            height: 5px;
            background: var(--gradient-navy);
            margin: 0 auto;
            border-radius: 30px;
            box-shadow: 0 2px 10px rgba(44, 95, 143, 0.3);
        }

        /* Form Section */
        .form-section {
            margin-top: 40px;
        }

        /* CARD GEJALA */
        .gejala-card {
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.9), rgba(255, 255, 255, 0.95));
            border: 2px solid rgba(102, 126, 234, 0.1);
            padding: 24px 28px;
            border-radius: 18px;
            margin-bottom: 20px;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.06);
            position: relative;
            overflow: hidden;
            animation: fadeInCard 0.6s ease-out backwards;
        }

        .gejala-card:nth-child(1) { animation-delay: 0.1s; }
        .gejala-card:nth-child(2) { animation-delay: 0.15s; }
        .gejala-card:nth-child(3) { animation-delay: 0.2s; }
        .gejala-card:nth-child(4) { animation-delay: 0.25s; }
        .gejala-card:nth-child(5) { animation-delay: 0.3s; }

        @keyframes fadeInCard {
            from {
                opacity: 0;
                transform: translateX(-30px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        .gejala-card::before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            height: 100%;
            width: 5px;
            background: var(--gradient-navy);
            transform: scaleY(0);
            transition: transform 0.3s ease;
            border-radius: 18px 0 0 18px;
        }

        .gejala-card:hover {
            border-color: rgba(102, 126, 234, 0.3);
            box-shadow: 0 10px 35px rgba(102, 126, 234, 0.2);
            transform: translateX(5px);
        }

        .gejala-card:hover::before {
            transform: scaleY(1);
        }

        .gejala-title {
            display: flex;
            align-items: center;
            font-size: 17px;
            font-weight: 700;
            margin-bottom: 14px;
            color: var(--navy);
            letter-spacing: 0.3px;
        }

        .gejala-title i {
            margin-right: 12px;
            font-size: 22px;
            color: var(--toska);
            animation: bounce 2s ease-in-out infinite;
        }

        @keyframes bounce {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-3px); }
        }

        /* Custom Select */
        select {
            width: 100%;
            padding: 14px 18px;
            border: 2px solid #e3e6ea;
            border-radius: 12px;
            font-size: 16px;
            font-weight: 500;
            background: var(--white);
            transition: all 0.3s ease;
            cursor: pointer;
            font-family: 'Poppins', sans-serif;
            color: var(--text-dark);
            appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24'%3E%3Cpath fill='%232C5F8F' d='M7 10l5 5 5-5z'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 12px center;
            padding-right: 45px;
        }

        select:hover {
            border-color: var(--toska);
            background-color: #f8f9fb;
        }

        select:focus {
            border-color: var(--navy);
            box-shadow: 0 0 0 4px rgba(44, 95, 143, 0.1);
            outline: none;
            background-color: var(--white);
        }

        /* Option styling */
        select option {
            padding: 12px;
            font-weight: 500;
        }

        select option:checked {
            background: var(--gradient-navy);
            color: blue;
        }

        /* TOMBOL PROSES */
        .btn-submit {
            width: 100%;
            background: var(--gradient-navy);
            color: var(--white);
            padding: 18px 32px;
            border: none;
            border-radius: 50px;
            font-size: 18px;
            font-weight: 700;
            cursor: pointer;
            margin-top: 35px;
            transition: all 0.4s ease;
            letter-spacing: 1px;
            box-shadow: 0 10px 30px rgba(44, 95, 143, 0.4);
            position: relative;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }

        .btn-submit::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
            transition: left 0.5s ease;
        }

        .btn-submit:hover::before {
            left: 100%;
        }

        .btn-submit:hover {
            transform: translateY(-4px);
            box-shadow: 0 15px 40px rgba(44, 95, 143, 0.5);
        }

        .btn-submit:active {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(44, 95, 143, 0.4);
        }

        .btn-submit i {
            font-size: 22px;
        }

        /* Progress indicator */
        .progress-indicator {
            text-align: center;
            margin-top: 30px;
            padding-top: 30px;
            border-top: 2px dashed rgba(102, 126, 234, 0.2);
        }

        .progress-text {
            color: #666;
            font-size: 14px;
            font-weight: 500;
        }

        .progress-count {
            display: inline-block;
            background: var(--gradient-navy);
            color: white;
            padding: 4px 12px;
            border-radius: 20px;
            font-weight: 700;
            margin: 0 4px;
        }

        /* Responsive */
        @media (max-width: 768px) {
            body {
                padding: 20px 10px;
            }

            .btn-back {
                top: 15px;
                left: 15px;
                padding: 10px 18px;
                font-size: 14px;
            }

            .container {
                padding: 35px 25px;
                border-radius: 20px;
            }

            .title-wrapper .icon-wrapper {
                width: 70px;
                height: 70px;
            }

            .title-wrapper i {
                font-size: 35px;
            }

            h1 {
                font-size: 28px;
            }

            .gejala-card {
                padding: 18px 20px;
            }

            .gejala-title {
                font-size: 15px;
            }

            select {
                font-size: 14px;
            }

            .btn-submit {
                font-size: 16px;
                padding: 16px 28px;
            }
        }

        /* Loading animation */
        @keyframes shimmer {
            0% {
                background-position: -1000px 0;
            }
            100% {
                background-position: 1000px 0;
            }
        }

        .loading {
            pointer-events: none;
            opacity: 0.6;
        }

    </style>
</head>

<body>

    <!-- TOMBOL KEMBALI KE HALAMAN UTAMA -->
    <a href="../index.php" class="btn-back">
        <i class="ri-arrow-left-line"></i>
        Kembali
    </a>

    <!-- CONTAINER UTAMA HALAMAN -->
    <div class="container">

        <!-- JUDUL HALAMAN -->
        <div class="title-wrapper">

            <!-- IKON JUDUL -->
            <div class="icon-wrapper">
                <i class="ri-stethoscope-line"></i>
            </div>

            <!-- JUDUL UTAMA -->
            <h1>Pilih Gejala Anda</h1>

            <!-- SUB JUDUL / DESKRIPSI -->
            <p class="subtitle">
                Pilih tingkat keyakinan untuk setiap gejala yang Anda alami
            </p>

            <!-- GARIS PEMBATAS DEKORATIF -->
            <div class="divider"></div>
        </div>

        <!-- FORM INPUT GEJALA -->
        <form action="proses_diagnosa.php" method="POST" class="form-section">

            <?php 
            // Variabel untuk menghitung total gejala
            $count = 0;

            // Loop data gejala dari database
            while ($row = mysqli_fetch_assoc($result)) { 
                $count++;
            ?>
                <!-- KARTU GEJALA -->
                <div class="gejala-card">

                    <!-- NAMA GEJALA -->
                    <div class="gejala-title">
                        <i class="ri-pulse-line"></i>
                        <?php echo htmlspecialchars($row['nama_gejala']); ?>
                    </div>

                    <!-- PILIHAN NILAI KEYAKINAN USER -->
                    <select name="gejala[<?php echo $row['id_gejala']; ?>]">
                        <option value="1.0">🟢 Sangat Yakin</option>
                        <option value="0.8">🟢 Yakin</option>
                        <option value="0.6">🟡 Cukup Yakin</option>
                        <option value="0.4">🟡 Sedikit Yakin</option>
                        <option value="0.2">🟠 Tidak Tahu</option>
                        <!-- Default tidak mengalami gejala -->
                        <option value="0.0" selected>🔴 Tidak</option>
                    </select>
                </div>
            <?php } ?>

            <!-- INFORMASI TOTAL GEJALA -->
            <div class="progress-indicator">
                <p class="progress-text">
                    Total Gejala: 
                    <span class="progress-count">
                        <?php echo $count; ?>
                    </span>
                </p>
            </div>

            <!-- TOMBOL SUBMIT FORM -->
            <button type="submit" class="btn-submit">
                <i class="ri-search-eye-line"></i>
                Proses Diagnosa Sekarang
            </button>

        </form>
    </div>

    <!-- ================= JAVASCRIPT ================= -->
    <script>
        // MENAMBAHKAN EFEK LOADING SAAT FORM DIKIRIM
        document.querySelector('form').addEventListener('submit', function() {
            const btn = document.querySelector('.btn-submit');
            btn.innerHTML = '<i class="ri-loader-4-line"></i> Memproses...';
            btn.classList.add('loading');
        });

        // ANIMASI HALUS SAAT USER MEMILIH NILAI GEJALA
        document.querySelectorAll('.gejala-card select').forEach((select) => {
            select.addEventListener('change', function() {
                // Memberi efek highlight sementara
                this.parentElement.style.background =
                    'linear-gradient(135deg, rgba(102, 126, 234, 0.05), rgba(118, 75, 162, 0.05))';

                // Menghapus efek setelah 300ms
                setTimeout(() => {
                    this.parentElement.style.background = '';
                }, 300);
            });
        });
    </script>

</body>
</html>
