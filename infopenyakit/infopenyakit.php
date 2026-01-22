<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Penyakit Malaria</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        :root{
            --navy: #2C5F8F;
            --toska: #17A2B8;
            --text-dark: #333;
            --white: #fff;
            --gradient-primary: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            --gradient-navy: linear-gradient(135deg, #2C5F8F 0%, #17A2B8 100%);
            --success: #10b981;
            --danger: #ef4444;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body{
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: var(--text-dark);
            font-family: "Poppins", sans-serif;
            min-height: 100vh;
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
                radial-gradient(circle at 20% 50%, rgba(255, 255, 255, 0.05) 0%, transparent 50%),
                radial-gradient(circle at 80% 80%, rgba(255, 255, 255, 0.05) 0%, transparent 50%),
                radial-gradient(circle at 40% 20%, rgba(255, 255, 255, 0.03) 0%, transparent 50%);
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

        /* NAVBAR */
        .navbar{
            background: linear-gradient(135deg, rgba(44,95,143,0.95) 0%, rgba(23,162,184,0.95) 100%) !important;
            backdrop-filter: blur(10px);
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.15);
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            padding: 1rem 0;
            position: relative;
            z-index: 100;
            animation: slideDown 0.6s ease-out;
        }

        @keyframes slideDown {
            from {
                opacity: 0;
                transform: translateY(-30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .navbar-brand {
            font-size: 1.5rem;
            font-weight: 800;
            text-shadow: 0 2px 10px rgba(0, 0, 0, 0.3);
            transition: all 0.3s ease;
        }

        .navbar-brand:hover {
            transform: scale(1.05);
            filter: brightness(1.2);
        }

        .navbar .nav-link{
            color: var(--white) !important;
            font-weight: 600;
            position: relative;
            padding: 0.6rem 1.2rem !important;
            margin: 0 0.25rem;
            border-radius: 10px;
            transition: all 0.3s ease;
        }

        .navbar .nav-link::before {
            content: '';
            position: absolute;
            bottom: 5px;
            left: 50%;
            width: 0;
            height: 2px;
            background: var(--white);
            transition: all 0.3s ease;
            transform: translateX(-50%);
        }

        .navbar .nav-link:hover{
            background: rgba(255, 255, 255, 0.15);
            transform: translateY(-2px);
        }

        .navbar .nav-link:hover::before {
            width: 60%;
        }

        .navbar-nav .nav-link.active{
            background: rgba(255,255,255,0.25);
            color: #fff !important;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        }

        /* CONTAINER */
        .container {
            position: relative;
            z-index: 10;
        }

        /* CARD */
        .card{
            border-radius: 24px;
            border: none;
            overflow: hidden;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.25);
            background: rgba(255, 255, 255, 0.98);
            backdrop-filter: blur(20px);
            margin-top: 3rem;
            margin-bottom: 3rem;
            animation: cardAppear 0.8s ease-out;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        @keyframes cardAppear {
            from {
                opacity: 0;
                transform: translateY(40px) scale(0.95);
            }
            to {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }

        .card:hover {
            transform: translateY(-8px);
            box-shadow: 0 30px 80px rgba(0, 0, 0, 0.3);
        }

        .card-header{
            background: var(--gradient-navy);
            color: var(--white);
            font-size: 1.75rem;
            padding: 1.75rem;
            letter-spacing: 1.5px;
            font-weight: 800;
            text-shadow: 0 2px 10px rgba(0, 0, 0, 0.3);
            position: relative;
            overflow: hidden;
        }

        .card-header::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(255,255,255,0.15) 0%, transparent 70%);
            animation: shimmer 4s linear infinite;
        }

        @keyframes shimmer {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        .card-body {
            padding: 2.5rem;
        }

        /* TABLE */
        .table-responsive {
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
            margin-bottom: 2rem;
        }

        table.table {
            margin: 0;
            font-size: 1rem;
        }

        table.table thead {
            background: var(--gradient-navy);
            color: var(--white);
            position: sticky;
            top: 0;
            z-index: 10;
        }

        table.table thead th {
            padding: 1.25rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.8px;
            border: none;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        table.table tbody tr {
            transition: all 0.3s ease;
            cursor: pointer;
            animation: fadeInRow 0.6s ease-out backwards;
        }

        table.table tbody tr:nth-child(1) { animation-delay: 0.1s; }
        table.table tbody tr:nth-child(2) { animation-delay: 0.2s; }
        table.table tbody tr:nth-child(3) { animation-delay: 0.3s; }
        table.table tbody tr:nth-child(4) { animation-delay: 0.4s; }

        @keyframes fadeInRow {
            from {
                opacity: 0;
                transform: translateX(-30px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        table.table tbody tr:hover{
            background: linear-gradient(90deg, rgba(102, 126, 234, 0.12) 0%, rgba(118, 75, 162, 0.12) 100%) !important;
            transform: scale(1.02);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
        }

        table.table tbody td {
            padding: 1.25rem;
            vertical-align: middle;
            border-color: rgba(0, 0, 0, 0.05);
        }

        /* Kode Penyakit Badge Style */
        table.table tbody td:nth-child(2) {
            font-weight: 700;
            color: var(--navy);
            font-family: 'Courier New', monospace;
            background: linear-gradient(135deg, rgba(102, 126, 234, 0.15), rgba(118, 75, 162, 0.15));
            border-radius: 10px;
            font-size: 1.05rem;
        }

        /* Jenis Penyakit dengan icon */
        table.table tbody td:nth-child(3) {
            font-weight: 600;
            position: relative;
            padding-left: 2.5rem;
        }

        table.table tbody td:nth-child(3)::before {
            content: '🦠';
            position: absolute;
            left: 1rem;
            font-size: 1.25rem;
            animation: pulse 2s ease-in-out infinite;
        }

        @keyframes pulse {
            0%, 100% { transform: scale(1); opacity: 1; }
            50% { transform: scale(1.1); opacity: 0.8; }
        }

        /* Nilai Styling */
        .nilai-tinggi{
            color: var(--success);
            font-weight: 800;
            background: rgba(16, 185, 129, 0.15);
            padding: 0.6rem 1.2rem;
            border-radius: 25px;
            display: inline-block;
            min-width: 70px;
            box-shadow: 0 4px 12px rgba(16, 185, 129, 0.25);
            transition: all 0.3s ease;
        }

        .nilai-tinggi:hover {
            transform: scale(1.1);
            box-shadow: 0 6px 20px rgba(16, 185, 129, 0.35);
        }

        .nilai-rendah{
            color: var(--danger);
            font-weight: 800;
            background: rgba(239, 68, 68, 0.15);
            padding: 0.6rem 1.2rem;
            border-radius: 25px;
            display: inline-block;
            min-width: 70px;
            box-shadow: 0 4px 12px rgba(239, 68, 68, 0.25);
            transition: all 0.3s ease;
        }

        .nilai-rendah:hover {
            transform: scale(1.1);
            box-shadow: 0 6px 20px rgba(239, 68, 68, 0.35);
        }

        /* Detail Penyakit Section */
        .detail-section {
            margin-top: 3rem;
        }

        .detail-card {
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.95), rgba(255, 255, 255, 0.98));
            border-radius: 20px;
            padding: 30px;
            margin-bottom: 25px;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.1);
            border-left: 6px solid;
            transition: all 0.3s ease;
            animation: slideIn 0.6s ease-out backwards;
        }

        .detail-card:nth-child(1) { 
            border-left-color: #8B5CF6;
            animation-delay: 0.1s;
        }
        .detail-card:nth-child(2) { 
            border-left-color: #EC4899;
            animation-delay: 0.2s;
        }
        .detail-card:nth-child(3) { 
            border-left-color: #F59E0B;
            animation-delay: 0.3s;
        }
        .detail-card:nth-child(4) { 
            border-left-color: #10B981;
            animation-delay: 0.4s;
        }

        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateX(-50px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        .detail-card:hover {
            transform: translateX(10px);
            box-shadow: 0 12px 40px rgba(0, 0, 0, 0.15);
        }

        .detail-card h4 {
            color: var(--navy);
            font-weight: 800;
            font-size: 1.5rem;
            margin-bottom: 15px;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .detail-card .badge-kode {
            font-family: 'Courier New', monospace;
            background: var(--gradient-navy);
            color: white;
            padding: 6px 16px;
            border-radius: 20px;
            font-size: 0.9rem;
            font-weight: 700;
        }

        .detail-card .info-row {
            display: flex;
            align-items: flex-start;
            margin-bottom: 12px;
            gap: 12px;
        }

        .detail-card .info-row i {
            color: var(--toska);
            font-size: 1.3rem;
            margin-top: 3px;
        }

        .detail-card .info-label {
            font-weight: 700;
            color: var(--navy);
            margin-right: 8px;
        }

        .detail-card .info-text {
            color: #555;
            line-height: 1.8;
            flex: 1;
        }

        .detail-card .parasit-name {
            background: rgba(102, 126, 234, 0.1);
            padding: 4px 12px;
            border-radius: 15px;
            font-style: italic;
            font-weight: 600;
            color: var(--navy);
        }

        /* Section Header */
        .section-header {
            text-align: center;
            margin: 4rem 0 3rem;
        }

        .section-header h3 {
            color: var(--white);
            font-size: 2rem;
            font-weight: 800;
            text-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
            margin-bottom: 15px;
        }

        .section-header .divider {
            width: 120px;
            height: 5px;
            background: rgba(255, 255, 255, 0.8);
            margin: 0 auto;
            border-radius: 30px;
            box-shadow: 0 2px 10px rgba(255, 255, 255, 0.3);
        }

        /* Empty state */
        .empty-state {
            padding: 4rem 2rem;
            text-align: center;
        }

        .empty-state i {
            font-size: 5rem;
            color: rgba(0, 0, 0, 0.2);
            margin-bottom: 1rem;
            display: block;
        }

        .empty-state p {
            color: #999;
            font-size: 1.1rem;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .card-header {
                font-size: 1.25rem;
                padding: 1.25rem;
            }

            .card-body {
                padding: 1.5rem;
            }

            table.table {
                font-size: 0.9rem;
            }

            table.table thead th,
            table.table tbody td {
                padding: 0.85rem 0.5rem;
            }

            .navbar-brand {
                font-size: 1.25rem;
            }

            table.table tbody td:nth-child(3) {
                padding-left: 1.5rem;
            }

            table.table tbody td:nth-child(3)::before {
                left: 0.5rem;
            }

            .detail-card {
                padding: 20px;
            }

            .detail-card h4 {
                font-size: 1.2rem;
                flex-direction: column;
                align-items: flex-start;
            }

            .section-header h3 {
                font-size: 1.5rem;
            }
        }

        /* Custom Scrollbar */
        .table-responsive::-webkit-scrollbar {
            height: 10px;
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

    </style>
</head>
<body>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-dark shadow-sm">
    <div class="container">
        <a class="navbar-brand fw-bold" href="../index.php">
            🦟 Penyakit Malaria
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link text-white" href="../index.php">
                        <i class="ri-home-line"></i> HOME
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- CONTENT -->
<div class="container mt-4 mb-4">
    <div class="card">
        <div class="card-header text-center">
            <strong>🕸️ MENU PENYAKIT</strong>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover text-center">
                    <thead>
                        <tr>
                            <th width="20px">NO</th>
                            <th width="150px">KODE PENYAKIT</th>
                            <th>JENIS PENYAKIT</th>
                            <th>NILAI Bobot</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $penyakit = [
                            ['kode_penyakit' => 'P0001', 'jenis_penyakit' => 'Malaria Tertiana', 'nilai_pembobotan' => 0.8],
                            ['kode_penyakit' => 'P0002', 'jenis_penyakit' => 'Malaria Tropika', 'nilai_pembobotan' => 0.6],
                            ['kode_penyakit' => 'P0003', 'jenis_penyakit' => 'Malaria Quartana', 'nilai_pembobotan' => 0.7],
                            ['kode_penyakit' => 'P0004', 'jenis_penyakit' => 'Malaria Ovale', 'nilai_pembobotan' => 0.5],
                        ];

                        if (!empty($penyakit)):
                            $no = 1;
                            foreach ($penyakit as $row): ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= htmlspecialchars($row['kode_penyakit']); ?></td>
                                    <td class="text-start"><?= htmlspecialchars($row['jenis_penyakit']); ?></td>
                                    <td>
                                        <span class="<?= $row['nilai_pembobotan'] >= 0.7 ? 'nilai-tinggi' : 'nilai-rendah'; ?>">
                                            <?= number_format($row['nilai_pembobotan'], 1); ?>
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

            <!-- Detail Penjelasan Penyakit -->
            <div class="section-header">
                <h3>📚 Penjelasan Jenis Penyakit Malaria</h3>
                <div class="divider"></div>
            </div>

            <div class="detail-section">
                <!-- Malaria Tertiana -->
                <div class="detail-card">
                    <h4>
                        <span>🦠 Malaria Tertiana</span>
                        <span class="badge-kode">P0001</span>
                    </h4>
                    
                    <div class="info-row">
                        <i class="ri-virus-line"></i>
                        <div class="info-text">
                            <span class="info-label">Penyebab:</span>
                            Disebabkan oleh parasit <span class="parasit-name">Plasmodium vivax</span>
                        </div>
                    </div>
                    
                    <div class="info-row">
                        <i class="ri-time-line"></i>
                        <div class="info-text">
                            <span class="info-label">Siklus Demam:</span>
                            Demam terjadi setiap 48 jam (2 hari sekali) dengan pola yang teratur. Fase demam diikuti dengan fase menggigil dan berkeringat.
                        </div>
                    </div>
                    
                    <div class="info-row">
                        <i class="ri-alert-line"></i>
                        <div class="info-text">
                            <span class="info-label">Karakteristik:</span>
                            Dapat menyebabkan relaps (kambuh) karena parasit dapat bertahan di hati dalam bentuk hipnozoit. Umumnya tidak fatal namun dapat sangat melemahkan.
                        </div>
                    </div>
                </div>

                <!-- Malaria Tropika -->
                <div class="detail-card">
                    <h4>
                        <span>☠️ Malaria Tropika</span>
                        <span class="badge-kode">P0002</span>
                    </h4>
                    
                    <div class="info-row">
                        <i class="ri-virus-line"></i>
                        <div class="info-text">
                            <span class="info-label">Penyebab:</span>
                            Disebabkan oleh parasit <span class="parasit-name">Plasmodium falciparum</span>
                        </div>
                    </div>
                    
                    <div class="info-row">
                        <i class="ri-skull-line"></i>
                        <div class="info-text">
                            <span class="info-label">Tingkat Bahaya:</span>
                            <strong style="color: #ef4444;">Jenis malaria paling berbahaya dan fatal!</strong> Dapat menyebabkan komplikasi serius seperti malaria serebral, gagal ginjal, dan kematian jika tidak ditangani dengan cepat.
                        </div>
                    </div>
                    
                    <div class="info-row">
                        <i class="ri-thermometer-line"></i>
                        <div class="info-text">
                            <span class="info-label">Karakteristik:</span>
                            Demam tidak teratur dan bisa terus menerus, parasit dapat menyumbat pembuluh darah kecil di organ vital seperti otak dan ginjal.
                        </div>
                    </div>
                </div>

                <!-- Malaria Quartana -->
                <div class="detail-card">
                    <h4>
                        <span>🔄 Malaria Quartana</span>
                        <span class="badge-kode">P0003</span>
                    </h4>
                    
                    <div class="info-row">
                        <i class="ri-virus-line"></i>
                        <div class="info-text">
                            <span class="info-label">Penyebab:</span>
                            Disebabkan oleh parasit <span class="parasit-name">Plasmodium malariae</span>
                        </div>
                    </div>
                    
                    <div class="info-row">
                        <i class="ri-calendar-line"></i>
                        <div class="info-text">
                            <span class="info-label">Siklus Demam:</span>
                            Demam terjadi setiap 72 jam (3 hari sekali) dengan pola yang sangat teratur dan dapat diprediksi.
                        </div>
                    </div>
                    
                    <div class="info-row">
                        <i class="ri-file-list-line"></i>
                        <div class="info-text">
                            <span class="info-label">Karakteristik:</span>
                            Infeksi dapat bertahan bertahun-tahun dalam darah dengan tingkat parasit yang rendah. Jarang fatal namun dapat menyebabkan sindrom nefrotik pada anak-anak.
                        </div>
                    </div>
                </div>

                <!-- Malaria Ovale -->
                <div class="detail-card">
                    <h4>
                        <span>🌿 Malaria Ovale</span>
                        <span class="badge-kode">P0004</span>
                    </h4>
                    
                    <div class="info-row">
                        <i class="ri-virus-line"></i>
                        <div class="info-text">
                            <span class="info-label">Penyebab:</span>
                            Disebabkan oleh parasit <span class="parasit-name">Plasmodium ovale</span>
                        </div>
                    </div>
                    
                    <div class="info-row">
                        <i class="ri-map-pin-line"></i>
                        <div class="info-text">
                            <span class="info-label">Distribusi:</span>
                            Paling jarang ditemukan, terutama di Afrika Barat. Memiliki karakteristik yang mirip dengan Malaria Tertiana.
                        </div>
                    </div>
                    
                    <div class="info-row">
                        <i class="ri-heart-pulse-line"></i>
                        <div class="info-text">
                            <span class="info-label">Karakteristik:</span>
                            Demam setiap 48 jam, dapat menyebabkan relaps karena stadium hipnozoit di hati. Umumnya bersifat jinak dengan gejala yang lebih ringan dibanding jenis lainnya.
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const links = document.querySelectorAll(".nav-link");
        links.forEach(link => {
            link.addEventListener("click", () => {
                links.forEach(l => l.classList.remove("active"));
                link.classList.add("active");
            });
        });
    });
</script>

</body>
</html>