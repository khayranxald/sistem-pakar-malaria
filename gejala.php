<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Gejala Malaria</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        :root{
            --navy: #2C5F8F;
            --toska: #17A2B8;
            --darktext: #333;
            --white: #FFF;
            --gradient-primary: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            --gradient-navy: linear-gradient(135deg, #2C5F8F 0%, #17A2B8 100%);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background: url('../images/bg.png') no-repeat center center fixed;
            background-size: cover;
            font-family: 'Poppins', sans-serif;
            color: var(--darktext);
            min-height: 100vh;
            position: relative;
        }

        body::before {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, rgba(102, 126, 234, 0.1) 0%, rgba(118, 75, 162, 0.1) 100%);
            z-index: -1;
        }

        /* NAVBAR */
        nav.navbar {
            background: linear-gradient(135deg, rgba(44,95,143,0.95) 0%, rgba(23,162,184,0.95) 100%) !important;
            backdrop-filter: blur(10px);
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            padding: 1rem 0;
            animation: slideDown 0.5s ease-out;
        }

        @keyframes slideDown {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .navbar-brand {
            font-size: 1.5rem;
            font-weight: 800;
            text-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
            transition: transform 0.3s ease;
        }

        .navbar-brand:hover {
            transform: scale(1.05);
        }

        .navbar a.nav-link {
            color: #fff !important;
            font-weight: 600;
            transition: all 0.3s ease;
            position: relative;
            padding: 0.5rem 1rem;
            margin: 0 0.25rem;
            border-radius: 8px;
        }

        .navbar a.nav-link::before {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            width: 0;
            height: 2px;
            background: var(--white);
            transition: all 0.3s ease;
            transform: translateX(-50%);
        }

        .navbar a.nav-link:hover {
            background: rgba(255, 255, 255, 0.1);
            color: var(--white) !important;
        }

        .navbar a.nav-link:hover::before {
            width: 60%;
        }

        /* CONTAINER */
        .batas {
            margin-top: 40px;
            margin-bottom: 60px;
            animation: fadeUp 0.8s ease-out;
        }

        @keyframes fadeUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* CARD */
        .card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            border-radius: 24px;
            border: 1px solid rgba(255, 255, 255, 0.3);
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.2), 0 0 0 1px rgba(255, 255, 255, 0.1);
            overflow: hidden;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 25px 70px rgba(0, 0, 0, 0.25);
        }

        .card-header {
            background: var(--gradient-navy);
            color: var(--white);
            font-size: 1.75rem;
            font-weight: 800;
            letter-spacing: 1.5px;
            border-radius: 0 !important;
            text-shadow: 0 2px 8px rgba(0, 0, 0, 0.3);
            padding: 1.5rem;
            position: relative;
            overflow: hidden;
        }

        .card-header::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(255,255,255,0.1) 0%, transparent 70%);
            animation: shimmer 3s infinite linear;
        }

        @keyframes shimmer {
            0% {
                transform: rotate(0deg);
            }
            100% {
                transform: rotate(360deg);
            }
        }

        .card-body {
            padding: 2rem;
        }

        /* TABLE */
        .table-responsive {
            border-radius: 12px;
            overflow: hidden;
        }

        table {
            font-size: 0.95rem;
            margin: 0;
        }

        thead {
            background: var(--gradient-navy);
            color: white;
            position: sticky;
            top: 0;
            z-index: 10;
        }

        thead th {
            padding: 1rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            border: none;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        tbody tr {
            transition: all 0.25s ease;
            cursor: pointer;
        }

        tbody tr:hover {
            background: linear-gradient(90deg, rgba(102, 126, 234, 0.08) 0%, rgba(118, 75, 162, 0.08) 100%) !important;
            transform: scale(1.01);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
        }

        tbody td {
            padding: 1rem;
            vertical-align: middle;
            border-color: rgba(0, 0, 0, 0.05);
        }

        /* Animasi row by row */
        tbody tr {
            animation: fadeInRow 0.5s ease-out backwards;
        }

        tbody tr:nth-child(1) { animation-delay: 0.05s; }
        tbody tr:nth-child(2) { animation-delay: 0.1s; }
        tbody tr:nth-child(3) { animation-delay: 0.15s; }
        tbody tr:nth-child(4) { animation-delay: 0.2s; }
        tbody tr:nth-child(5) { animation-delay: 0.25s; }

        @keyframes fadeInRow {
            from {
                opacity: 0;
                transform: translateX(-20px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        /* Badge Style untuk Kode Gejala */
        tbody td:nth-child(2) {
            font-weight: 700;
            color: var(--navy);
            font-family: 'Courier New', monospace;
            background: linear-gradient(135deg, rgba(102, 126, 234, 0.1), rgba(118, 75, 162, 0.1));
            padding: 0.75rem;
            border-radius: 8px;
        }

        /* Nilai Pakar Styling */
        .nilai-tinggi {
            font-weight: 800;
            color: #10b981;
            background: rgba(16, 185, 129, 0.1);
            padding: 0.5rem 1rem;
            border-radius: 20px;
            display: inline-block;
            min-width: 60px;
            box-shadow: 0 2px 8px rgba(16, 185, 129, 0.2);
        }

        .nilai-rendah {
            font-weight: 800;
            color: #ef4444;
            background: rgba(239, 68, 68, 0.1);
            padding: 0.5rem 1rem;
            border-radius: 20px;
            display: inline-block;
            min-width: 60px;
            box-shadow: 0 2px 8px rgba(239, 68, 68, 0.2);
        }

        /* Responsive */
        @media (max-width: 768px) {
            .card-header {
                font-size: 1.25rem;
                padding: 1rem;
            }

            .card-body {
                padding: 1rem;
            }

            table {
                font-size: 0.85rem;
            }

            thead th, tbody td {
                padding: 0.75rem 0.5rem;
            }

            .navbar-brand {
                font-size: 1.25rem;
            }
        }

        /* Scrollbar Custom */
        .table-responsive::-webkit-scrollbar {
            height: 8px;
        }

        .table-responsive::-webkit-scrollbar-track {
            background: rgba(0, 0, 0, 0.05);
            border-radius: 10px;
        }

        .table-responsive::-webkit-scrollbar-thumb {
            background: var(--gradient-navy);
            border-radius: 10px;
        }

        .table-responsive::-webkit-scrollbar-thumb:hover {
            background: var(--navy);
        }

        /* Empty State */
        .empty-state {
            text-align: center;
            padding: 3rem;
            color: #999;
        }

        .empty-state i {
            font-size: 4rem;
            margin-bottom: 1rem;
            opacity: 0.3;
        }

    </style>
</head>

<body>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container">
        <a class="navbar-brand fw-bold" href="../index.php">🦟 Penyakit Malaria</a>

        <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link text-white" href="index.php">
                        <i class="ri-home-wifi-line"></i> HOME
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>


<!-- CARD TABEL -->
<div class="container batas">
    <div class="card shadow">
        <div class="card-header text-center">
            🕸️ MENU GEJALA
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead class="text-center">
                        <tr>
                            <th width="20px">NO</th>
                            <th width="150px">KODE GEJALA</th>
                            <th>NAMA GEJALA</th>
                            <th>NILAI PAKAR</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $gejala = [
                            ['id_gejala' => 'G001', 'nama_gejala' => 'Demam', 'nilai_pakar' => 0.8],
                            ['id_gejala' => 'G002', 'nama_gejala' => 'Menggigil', 'nilai_pakar' => 0.6],
                            ['id_gejala' => 'G003', 'nama_gejala' => 'Berkeringan', 'nilai_pakar' => 0.7],
                            ['id_gejala' => 'G004', 'nama_gejala' => 'Sakit Kepala', 'nilai_pakar' => 0.8],
                            ['id_gejala' => 'G005', 'nama_gejala' => 'Hilang kesadaran / Pingsan', 'nilai_pakar' => 0.6],
                            ['id_gejala' => 'G006', 'nama_gejala' => 'Anemia', 'nilai_pakar' => 0.7],
                            ['id_gejala' => 'G007', 'nama_gejala' => 'Denyut Nadi Melambat', 'nilai_pakar' => 0.4],
                            ['id_gejala' => 'G008', 'nama_gejala' => 'Muncul bintik-bintik merah', 'nilai_pakar' => 0.6],
                            ['id_gejala' => 'G009', 'nama_gejala' => 'Badan lesu / Lemah', 'nilai_pakar' => 0.7],
                            ['id_gejala' => 'G010', 'nama_gejala' => 'Muka merah', 'nilai_pakar' => 0.3],
                            ['id_gejala' => 'G011', 'nama_gejala' => 'Muntah-muntah', 'nilai_pakar' => 0.8],
                            ['id_gejala' => 'G012', 'nama_gejala' => 'Diare', 'nilai_pakar' => 0.6],
                            ['id_gejala' => 'G013', 'nama_gejala' => 'Pegal-pegal', 'nilai_pakar' => 0.4],
                            ['id_gejala' => 'G014', 'nama_gejala' => 'Kejang-kejang', 'nilai_pakar' => 0.8],
                            ['id_gejala' => 'G015', 'nama_gejala' => 'Dehidrasi', 'nilai_pakar' => 0.4],
                            ['id_gejala' => 'G016', 'nama_gejala' => 'Sesak nafas', 'nilai_pakar' => 0.4],
                            ['id_gejala' => 'G017', 'nama_gejala' => 'Mual', 'nilai_pakar' => 0.8],
                            ['id_gejala' => 'G018', 'nama_gejala' => 'Gagal ginjal', 'nilai_pakar' => 0.3],
                            ['id_gejala' => 'G019', 'nama_gejala' => 'Nyeri otot', 'nilai_pakar' => 0.3],
                            ['id_gejala' => 'G020', 'nama_gejala' => 'Kurang nafsu makan', 'nilai_pakar' => 0.5],
                        ];

                        if (!empty($gejala)):
                            $no = 1;
                            foreach ($gejala as $row): ?>
                            <tr class="text-center">
                                <td><?= $no++; ?></td>
                                <td><?= $row['id_gejala']; ?></td>
                                <td class="text-start"><?= $row['nama_gejala']; ?></td>
                                <td>
                                    <span class="<?= $row['nilai_pakar'] >= 0.7 ? 'nilai-tinggi' : 'nilai-rendah'; ?>">
                                        <?= number_format($row['nilai_pakar'], 1); ?>
                                    </span>
                                </td>
                            </tr>
                            <?php endforeach;
                        else: ?>
                            <tr>
                                <td colspan="4" class="empty-state">
                                    <i class="ri-file-search-line"></i>
                                    <p>Data tidak ditemukan</p>
                                </td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>