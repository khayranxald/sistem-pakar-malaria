<script>
    // Fungsi untuk menampilkan atau menyembunyikan proses perhitungan
    function toggleProses() {

        // Mengambil elemen container proses
        const container = document.getElementById('prosesContainer');

        // Mengambil tombol toggle
        const btn = document.getElementById('btnToggle');

        // Mengambil ikon pada tombol
        const icon = document.getElementById('iconToggle');

        // Mengambil teks pada tombol
        const text = document.getElementById('textToggle');
        
        // Cek apakah container sedang ditampilkan
        if (container.classList.contains('show')) {
            // ===== KONDISI SEMBUNYIKAN =====
            container.classList.remove('show');     // Sembunyikan container
            btn.classList.remove('active');         // Hilangkan status aktif tombol
            icon.className = 'ri-eye-line';          // Ubah ikon jadi "lihat"
            text.textContent = 'Lihat Proses Perhitungan'; // Ubah teks tombol
        } else {
            // ===== KONDISI TAMPILKAN =====
            container.classList.add('show');         // Tampilkan container
            btn.classList.add('active');             // Aktifkan tombol
            icon.className = 'ri-eye-off-line';      // Ubah ikon jadi "sembunyikan"
            text.textContent = 'Sembunyikan Proses Perhitungan'; // Ubah teks
        }
    }
</script>
<?php
// Menghubungkan ke database
include 'koneksi.php';

// Mengambil data gejala yang dipilih user dari form
$gejala_user = $_POST['gejala'] ?? [];

// Validasi: pastikan data berbentuk array
if (!is_array($gejala_user)) {
    $gejala_user = [];
}

// Mengambil seluruh aturan (rule) dari database
$query = "SELECT * FROM aturan";
$result = mysqli_query($conn, $query);

// Menyimpan data diagnosa sementara
$diagnosa = [];

// Loop setiap aturan
while ($row = mysqli_fetch_assoc($result)) {

    // Ambil ID penyakit dan ID gejala dari aturan
    $id_penyakit = $row['id_penyakit'];
    $id_gejala = $row['id_gejala'];

    // Ambil nilai pakar dari tabel gejala
    $query_gejala = "SELECT nilai_pakar FROM gejala WHERE id_gejala='$id_gejala'";
    $result_gejala = mysqli_query($conn, $query_gejala);
    $data_gejala = mysqli_fetch_assoc($result_gejala);

    // Jika data gejala ditemukan
    if ($data_gejala !== null) {

        // Ambil nilai keyakinan user (default 0 jika tidak dipilih)
        $nilai_user = $gejala_user[$id_gejala] ?? 0;

        // Hitung CF gejala (CF user x CF pakar)
        $cf_gejala = $nilai_user * $data_gejala['nilai_pakar'];

        // Inisialisasi array penyakit jika belum ada
        if (!isset($diagnosa[$id_penyakit])) {
            $diagnosa[$id_penyakit] = [];
        }

        // Simpan data CF setiap gejala
        $diagnosa[$id_penyakit][$id_gejala] = [
            'cf' => $cf_gejala,
            'nilai_user' => $nilai_user,
            'nilai_pakar' => $data_gejala['nilai_pakar']
        ];
    }
}

// =====================
// PROSES COMBINE CF
// =====================
$hasil_diagnosa = [];

foreach ($diagnosa as $penyakit => $cf_values) {

    // Nilai awal CF gabungan
    $cf_combine = 0;

    // Menyimpan langkah perhitungan CF
    $cf_process = [];

    // Loop setiap CF gejala
    foreach ($cf_values as $id_gejala => $cf_data) {

        // CF baru dari satu gejala
        $cf_new = $cf_data['cf'];

        // Rumus kombinasi CF
        $cf_combine = $cf_combine + ($cf_new * (1 - $cf_combine));

        // Simpan proses perhitungan (untuk ditampilkan)
        $cf_process[] = "CF Baru = {$cf_combine} + ({$cf_new} * (1 - {$cf_combine}))";
    }

    // Simpan hasil akhir per penyakit
    $hasil_diagnosa[$penyakit] = [
        'cf' => $cf_combine,
        'gejala' => $cf_values,
        'proses' => $cf_process
    ];
}

// Mengurutkan hasil diagnosa dari CF tertinggi
arsort($hasil_diagnosa);

// =====================
// MENYIAPKAN OUTPUT
// =====================
$daftar_penyakit = [];
$penyakit_tertinggi = null;

foreach ($hasil_diagnosa as $penyakit_id => $data) {

    // Hanya tampilkan penyakit dengan CF > 0
    if ($data['cf'] > 0) {

        // Ambil nama penyakit dan solusi
        $query_penyakit = "SELECT nama_penyakit, solusi FROM penyakit WHERE id_penyakit='$penyakit_id'";
        $result_penyakit = mysqli_query($conn, $query_penyakit);
        $data_penyakit = mysqli_fetch_assoc($result_penyakit);

        // Jika data penyakit ditemukan
        if ($data_penyakit) {

            // Data penyakit yang akan ditampilkan
            $penyakit_info = [
                'id' => $penyakit_id,
                'nama' => htmlspecialchars($data_penyakit['nama_penyakit']),
                'cf' => $data['cf'] * 100, // Konversi ke persen
                'solusi' => htmlspecialchars($data_penyakit['solusi']),
                'gejala' => $data['gejala'],
                'proses' => $data['proses']
            ];

            // Tambahkan ke daftar penyakit
            $daftar_penyakit[] = $penyakit_info;

            // Simpan penyakit dengan CF tertinggi
            if (!$penyakit_tertinggi) {
                $penyakit_tertinggi = $penyakit_info;
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Diagnosa</title>

    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        :root {
            --navy: #2C5F8F;
            --toska: #17A2B8;
            --text-dark: #333333;
            --white: #FFFFFF;
            --success: #10b981;
            --warning: #f59e0b;
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
            padding: 40px 20px;
            color: var(--text-dark);
            position: relative;
            overflow-x: hidden;
        }

        /* Animated background */
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

        .container {
            max-width: 1100px;
            margin: 0 auto;
            position: relative;
            z-index: 10;
        }

        /* Header */
        .header {
            text-align: center;
            margin-bottom: 50px;
            animation: fadeInDown 0.8s ease-out;
        }

        .header .icon-wrapper {
            width: 100px;
            height: 100px;
            background: rgba(255, 255, 255, 0.95);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 25px;
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.2);
            animation: pulse 2s ease-in-out infinite;
        }

        @keyframes pulse {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.05); }
        }

        .header .icon-wrapper i {
            font-size: 50px;
            background: var(--gradient-navy);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        h1 {
            color: var(--white);
            font-size: 42px;
            font-weight: 800;
            margin-bottom: 12px;
            text-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
            letter-spacing: 1px;
        }

        h2 {
            color: var(--white);
            font-size: 28px;
            font-weight: 700;
            margin: 40px 0 25px;
            text-align: center;
            text-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
            animation: fadeIn 0.6s ease;
        }

        h3 {
            color: var(--navy);
            font-size: 22px;
            font-weight: 700;
            margin: 35px 0 20px;
            padding-left: 15px;
            border-left: 5px solid var(--toska);
            animation: fadeIn 0.6s ease;
        }

        /* Cards */
        .card {
            background: rgba(255, 255, 255, 0.98);
            backdrop-filter: blur(20px);
            margin: 15px 0;
            padding: 25px 30px;
            border-radius: 18px;
            border: 1px solid rgba(255, 255, 255, 0.3);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
            transition: all 0.3s ease;
            animation: fadeInUp 0.6s ease backwards;
            position: relative;
            overflow: hidden;
        }

        .card::before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            height: 100%;
            width: 5px;
            background: var(--gradient-navy);
            transform: scaleY(0);
            transition: transform 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.2);
        }

        .card:hover::before {
            transform: scaleY(1);
        }

        .card:nth-child(1) { animation-delay: 0.1s; }
        .card:nth-child(2) { animation-delay: 0.15s; }
        .card:nth-child(3) { animation-delay: 0.2s; }
        .card:nth-child(4) { animation-delay: 0.25s; }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeInDown {
            from {
                opacity: 0;
                transform: translateY(-30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        .card p {
            line-height: 1.8;
            color: var(--text-dark);
        }

        .card strong {
            color: var(--navy);
            font-weight: 700;
            font-size: 1.05em;
        }

        /* Highlight Card */
        .highlight {
            background: var(--gradient-navy);
            color: var(--white);
            padding: 35px 40px;
            border-radius: 20px;
            box-shadow: 0 20px 50px rgba(44, 95, 143, 0.4);
            animation: scaleIn 0.8s ease-out;
            border: 2px solid rgba(255, 255, 255, 0.2);
            position: relative;
            overflow: hidden;
        }

        .highlight::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(255,255,255,0.1) 0%, transparent 70%);
            animation: shimmer 4s linear infinite;
        }

        @keyframes shimmer {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        @keyframes scaleIn {
            from {
                opacity: 0;
                transform: scale(0.9);
            }
            to {
                opacity: 1;
                transform: scale(1);
            }
        }

        .highlight strong {
            font-size: 26px;
            display: block;
            margin-bottom: 15px;
            color: var(--white);
        }

        .highlight-content {
            position: relative;
            z-index: 1;
        }

        .cf-badge {
            display: inline-block;
            background: rgba(255, 255, 255, 0.25);
            padding: 8px 20px;
            border-radius: 25px;
            font-weight: 700;
            font-size: 20px;
            margin: 10px 0;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        }

        .solusi-box {
            background: rgba(255, 255, 255, 0.15);
            padding: 20px;
            border-radius: 15px;
            margin-top: 20px;
            border-left: 4px solid rgba(255, 255, 255, 0.5);
        }

        .solusi-box strong {
            color: var(--white);
        }

        /* Process Card */
        .process-card {
            background: linear-gradient(135deg, rgba(102, 126, 234, 0.08), rgba(118, 75, 162, 0.08));
            border-left: 5px solid var(--toska);
            padding: 20px 25px;
            margin: 15px 0;
            border-radius: 12px;
            font-family: 'Courier New', monospace;
            font-size: 15px;
            line-height: 2;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
            transition: all 0.3s ease;
        }

        .process-card:hover {
            transform: translateX(5px);
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.12);
        }

        .process-card strong {
            display: block;
            margin-bottom: 12px;
            font-family: 'Poppins', sans-serif;
            color: var(--navy);
            font-size: 16px;
        }

        .process-card .formula {
            color: #ffffffff;
            margin: 8px 0;
            font-size: 14px;
        }

        .process-card .result {
            margin-top: 10px;
            font-size: 15px;
        }

        .process-card .result .value-highlight {
            color: #2bff00ff;
            font-weight: 700;
            font-size: 16px;
        }

        .process-card .result .percent-highlight {
            color: yellow;
            font-weight: 700;
            font-size: 16px;
        }

        /* Toggle Button untuk Proses Perhitungan */
        .btn-toggle {
            background: var(--gradient-navy);
            color: var(--white);
            padding: 12px 28px;
            border: none;
            border-radius: 50px;
            cursor: pointer;
            font-weight: 700;
            font-size: 16px;
            transition: all 0.3s ease;
            box-shadow: 0 8px 25px rgba(44, 95, 143, 0.3);
            display: inline-flex;
            align-items: center;
            gap: 10px;
            margin: 20px 0;
        }

        .btn-toggle:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 35px rgba(44, 95, 143, 0.4);
        }

        .btn-toggle i {
            font-size: 20px;
            transition: transform 0.3s ease;
        }

        .btn-toggle.active i {
            transform: rotate(180deg);
        }

        /* Process Container dengan animasi slide */
        .process-container {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.5s ease-out, opacity 0.5s ease-out;
            opacity: 0;
        }

        .process-container.show {
            max-height: 5000px;
            opacity: 1;
        }

        /* Wrapper untuk button toggle */
        .toggle-wrapper {
            text-align: center;
            margin: 30px 0;
        }

        /* Total CF */
        .total-cf {
            text-align: center;
            margin: 40px 0;
            padding: 30px;
            background: rgba(255, 255, 255, 0.95);
            border-radius: 20px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.15);
            animation: scaleIn 1s ease-out;
        }

        .total-cf strong {
            font-size: 32px;
            background: var(--gradient-navy);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        /* Buttons */
        .footer {
            text-align: center;
            margin-top: 50px;
            animation: fadeIn 1s ease 0.5s backwards;
        }

        .footer p {
            color: var(--white);
            font-size: 16px;
            margin-bottom: 20px;
            text-shadow: 0 2px 8px rgba(0, 0, 0, 0.2);
        }

        .btn-home {
            background: rgba(255, 255, 255, 0.95);
            color: var(--navy);
            padding: 14px 32px;
            border-radius: 50px;
            text-decoration: none;
            transition: all 0.3s ease;
            margin: 8px;
            display: inline-block;
            font-weight: 700;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.2);
            position: relative;
            overflow: hidden;
        }

        .btn-home::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: var(--gradient-navy);
            transition: left 0.4s ease;
            z-index: -1;
        }

        .btn-home:hover {
            color: var(--white);
            transform: translateY(-3px);
            box-shadow: 0 12px 35px rgba(0, 0, 0, 0.3);
        }

        .btn-home:hover::before {
            left: 0;
        }



        /* Empty State */
        .empty-state {
            text-align: center;
            padding: 60px 20px;
            background: rgba(255, 255, 255, 0.95);
            border-radius: 20px;
            margin: 30px 0;
        }

        .empty-state i {
            font-size: 80px;
            color: rgba(44, 95, 143, 0.3);
            margin-bottom: 20px;
        }

        .empty-state p {
            color: #666;
            font-size: 18px;
        }

        /* Badge untuk nilai */
        .badge {
            display: inline-block;
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 13px;
            font-weight: 600;
            margin: 0 4px;
        }

        .badge-user {
            background: rgba(16, 185, 129, 0.15);
            color: var(--success);
        }

        .badge-pakar {
            background: rgba(245, 158, 11, 0.15);
            color: var(--warning);
        }

        .badge-cf {
            background: rgba(44, 95, 143, 0.15);
            color: var(--navy);
        }

        /* Responsive */
        @media (max-width: 768px) {
            body {
                padding: 20px 10px;
            }

            h1 {
                font-size: 30px;
            }

            h2 {
                font-size: 22px;
            }

            h3 {
                font-size: 18px;
            }

            .header .icon-wrapper {
                width: 80px;
                height: 80px;
            }

            .header .icon-wrapper i {
                font-size: 40px;
            }

            .card {
                padding: 20px;
            }

            .highlight {
                padding: 25px 20px;
            }

            .highlight strong {
                font-size: 20px;
            }

            .btn-home {
                padding: 12px 24px;
                font-size: 14px;
                display: block;
                margin: 10px auto;
                max-width: 250px;
            }

            .btn-toggle {
                padding: 10px 24px;
                font-size: 14px;
            }

            .process-card {
                font-size: 13px;
            }

            .process-card .formula {
                font-size: 12px;
            }



            .total-cf strong {
                font-size: 24px;
            }
        }

        /* Section wrapper */
        .section {
            margin: 40px 0;
        }

    </style>
</head>

<body>
    <div class="container">
        
        <div class="header">
            <div class="icon-wrapper">
                <i class="ri-file-list-3-line"></i>
            </div>
            <h1>Hasil Diagnosa Malaria</h1>
        </div>

        <h2>📊 Semua Penyakit yang Terdeteksi</h2>
        <div class="section">
            <?php if (!empty($daftar_penyakit)) { ?>
                <?php foreach ($daftar_penyakit as $penyakit) { ?>
                    <div class="card">
                        <p>
                            <strong>🦠 <?php echo $penyakit['nama']; ?></strong><br>
                            <span class="badge badge-cf">Tingkat Keyakinan: <?php echo number_format($penyakit['cf'], 2); ?>%</span>
                        </p>
                    </div>
                <?php } ?>
            <?php } else { ?>
                <div class="empty-state">
                    <i class="ri-error-warning-line"></i>
                    <p>Tidak ada penyakit yang terdeteksi berdasarkan gejala yang dipilih</p>
                </div>
            <?php } ?>
        </div>

        <?php if ($penyakit_tertinggi) { ?>

            <h2>🎯 Diagnosa Utama</h2>
            <div class="highlight">
                <div class="highlight-content">
                    <strong>🏆 <?php echo $penyakit_tertinggi['nama']; ?></strong>
                    <div class="cf-badge">
                        📈 Tingkat Keyakinan: <?php echo number_format($penyakit_tertinggi['cf'], 2); ?>%
                    </div>
                    
                    <div class="solusi-box">
                        <strong>💊 Solusi & Rekomendasi:</strong><br>
                        <?php echo $penyakit_tertinggi['solusi']; ?>
                    </div>
                </div>
            </div>

            <h3>✅ Gejala yang Anda Pilih</h3>
            <div class="section">
                <?php 
                $ada_gejala = false;
                foreach ($penyakit_tertinggi['gejala'] as $id_gejala => $data) { 
                    if ($data['nilai_user'] > 0) {
                        $ada_gejala = true;
                        $q = mysqli_query($conn, "SELECT nama_gejala FROM gejala WHERE id_gejala='$id_gejala'");
                        $nama_gejala = mysqli_fetch_assoc($q)['nama_gejala'] ?? 'Gejala Tidak Ditemukan';
                ?>
                        <div class="card">
                            <p>
                                <strong>🔹 <?php echo htmlspecialchars($nama_gejala); ?></strong><br>
                                <span class="badge badge-user">Nilai User: <?php echo $data['nilai_user']; ?></span>
                                <span class="badge badge-pakar">Nilai Pakar: <?php echo $data['nilai_pakar']; ?></span>
                                <span class="badge badge-cf">CF Gejala: <?php echo number_format($data['cf'], 2); ?></span>
                            </p>
                        </div>
                <?php 
                    }
                } 
                if (!$ada_gejala) {
                    echo "<div class='empty-state'><p>Tidak ada gejala yang dipilih</p></div>";
                }
                ?>
            </div>

            <h3>❌ Gejala yang Tidak Dipilih</h3>
            <div class="section">
                <?php
                $ada = false;
                foreach ($penyakit_tertinggi['gejala'] as $id_gejala => $data) {
                    if ($data['nilai_user'] == 0) $ada = true;
                }

                if (!$ada) {
                    echo "<div class='card'><p><strong>✨ Semua gejala terkait penyakit ini sudah dipilih.</strong></p></div>";
                } else {
                    foreach ($penyakit_tertinggi['gejala'] as $id_gejala => $data) {
                        if ($data['nilai_user'] == 0) {
                            $q = mysqli_query($conn, "SELECT nama_gejala FROM gejala WHERE id_gejala='$id_gejala'");
                            $nama_gejala = mysqli_fetch_assoc($q)['nama_gejala'] ?? 'Gejala Tidak Ditemukan';
                            echo "<div class='card'><p><strong>⚪ " . htmlspecialchars($nama_gejala) . "</strong> — <span class='badge badge-pakar'>Nilai Pakar: {$data['nilai_pakar']}</span></p></div>";
                        }
                    }
                }
                ?>
            </div>

            <!-- TOMBOL TOGGLE UNTUK PROSES PERHITUNGAN -->
            <div class="toggle-wrapper">
                <button class="btn-toggle" onclick="toggleProses()" id="btnToggle">
                    <i class="ri-eye-line" id="iconToggle"></i>
                    <span id="textToggle">Lihat Proses Perhitungan</span>
                </button>
            </div>

            <!-- CONTAINER UNTUK MENAMPILKAN PROSES PERHITUNGAN CF -->
            <div class="process-container" id="prosesContainer">

                <!-- Judul proses perhitungan -->
                <h3>🧮 Proses Perhitungan CF Kombinasi</h3>

                <!-- Section berisi detail iterasi perhitungan -->
                <div class="section">
                    <?php
                    // Inisialisasi nilai CF gabungan awal (dimulai dari 0)
                    $cf_combine_calc = 0;

                    // Counter untuk menandai iterasi keberapa
                    $counter = 0;

                    // Loop setiap gejala dari penyakit dengan CF tertinggi
                    foreach ($penyakit_tertinggi['gejala'] as $id_gejala => $data) {

                        // Hanya memproses gejala yang dipilih user
                        if ($data['nilai_user'] > 0) {

                            // Menambah nomor iterasi
                            $counter++;

                            // CF baru dari gejala saat ini
                            $cf_new = $data['cf'];

                            // Menyimpan nilai CF lama sebelum dikombinasikan
                            $cf_old = $cf_combine_calc;

                            // Rumus kombinasi Certainty Factor
                            $cf_combine_calc = $cf_combine_calc + ($cf_new * (1 - $cf_combine_calc));

                            // Konversi CF ke bentuk persen
                            $percent = $cf_combine_calc * 100;

                            // Mengambil nama gejala dari database
                            $q = mysqli_query($conn, "SELECT nama_gejala FROM gejala WHERE id_gejala='$id_gejala'");
                            $nama_gejala = mysqli_fetch_assoc($q)['nama_gejala'] ?? 'Gejala Tidak Ditemukan';
                    ?>

                        <!-- KARTU UNTUK MENAMPILKAN HASIL SETIAP ITERASI -->
                        <div class="process-card">

                            <!-- Judul iterasi dan nama gejala -->
                            <strong>
                                📍 Iterasi <?php echo $counter; ?>: 
                                <?php echo htmlspecialchars($nama_gejala); ?>
                            </strong>
                            
                            <!-- Menampilkan rumus CF secara matematis -->
                            <div class="formula">
                                CF<sub>combine</sub> = 
                                <?php echo number_format($cf_old, 4); ?> + 
                                (<?php echo number_format($cf_new, 4); ?> × 
                                (1 - <?php echo number_format($cf_old, 4); ?>))
                            </div>
                            
                            <!-- Label hasil perhitungan -->
                            <div class="formula">
                                CF<sub>combine</sub> = 
                            </div>
                            
                            <!-- Hasil CF dalam bentuk desimal -->
                            <div class="result">
                                <span class="value-highlight">
                                    <?php echo number_format($cf_combine_calc, 4); ?>
                                </span>
                            </div>
                            
                            <!-- Penanda alternatif tampilan persen -->
                            <div style="margin-top: 8px; color: #000;">atau</div>
                            
                            <!-- Hasil CF dalam bentuk persen -->
                            <div class="result">
                                <span class="percent-highlight">
                                    <?php echo number_format($percent, 2); ?>%
                                </span>
                            </div>
                        </div>

                    <?php 
                        } 
                    } 
                    ?>
                </div>

                <!-- MENAMPILKAN HASIL AKHIR CF -->
                <div class="total-cf">
                    <strong>
                        🎯 Hasil CF Akhir: 
                        <?php echo number_format($cf_combine_calc * 100, 2); ?>%
                    </strong>
                </div>
            </div>

        <?php } ?>

        <div class="footer">
            <p>✨ Terima kasih telah menggunakan Sistem Diagnosa Malaria</p>
            <a href="input_gejala.php" class="btn-home">
                 <i class="ri-refresh-line"></i> Diagnosa Ulang
            </a>

            <a href="../index.php" class="btn-home">
                <i class="ri-home-line"></i> Halaman Utama
            </a>
        </div>
    </div>
</body>
</html>