<?php
$profileStats = [
    ["icon" => "👁", "label" => "Profile Views", "value" => "112.000"],
    ["icon" => "👤", "label" => "Followers", "value" => "183.000"],
    ["icon" => "➕", "label" => "Following", "value" => "80.000"],
    ["icon" => "📌", "label" => "Saved Post", "value" => "112"]
];
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-blue-50">

<div class="flex h-screen">
    <!-- Sidebar -->
    <aside class="w-64 bg-white p-4 shadow-lg">
        <div class="flex items-center gap-2 text-xl font-bold text-blue-600">
            👥 PENYAKIT JAGUNG
        </div>
        <nav class="mt-6">
            <div class="p-2 bg-blue-600 text-white rounded-lg">Dashboard</div>
            
        </nav>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 p-6">
        <h2 class="text-2xl font-semibold text-gray-800">Profile Statistics</h2>

        <div class="mt-4 grid grid-cols-4 gap-4">
            <?php foreach ($profileStats as $stat): ?>
                <div class="p-4 flex flex-col items-center bg-white shadow-md rounded-lg">
                    <span class="text-2xl"><?php echo $stat["icon"]; ?></span>
                    <p class="text-gray-600"><?php echo $stat["label"]; ?></p>
                    <p class="font-bold text-lg"><?php echo $stat["value"]; ?></p>
                </div>
            <?php endforeach; ?>
        </div>

        <!-- Bagian Baru: Informasi Pak Tani + Tombol Diagnosa -->
        <div class="mt-6 bg-white p-6 shadow-md rounded-lg text-center">
            <h2 class="text-xl font-semibold text-gray-800">Halo Pak Tani!</h2>
            <h1 class="text-2xl font-bold text-green-600"></h1>
            <h3 class="text-lg text-gray-700">
                Ayo Cari Tahu <span class="multiple-text font-semibold text-green-600"></span>
            </h3>
            <p class="mt-2 text-gray-600">
                Ayo Rawat dan Cari Tahu Tentang Tumbuhan Jagung Anda agar dapat memberikan Hasil yang Maksimal.
            </p>
            
            <!-- Tombol Diagnosa Sekarang -->
            <a href="./diagnosis/input_gejala.php" class="mt-4 inline-block px-6 py-3 bg-green-500 text-white font-semibold rounded-lg shadow-md hover:bg-green-600">
                Diagnosa Sekarang
            </a>
        </div>
    </main>
</div>

<script src="/assets/js/script.js"></script>
</body>
</html>
