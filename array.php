<?php

$data = <<<'EOD'
X, -9\\\10\100\-5\\\0\\\\, A
Y, \\13\\1\, B
Z, \\\5\\\-3\\2\\\800, C
EOD;

$lines = explode(PHP_EOL, $data); // Memisahkan data menjadi baris-baris

$output = array();

foreach ($lines as $line) {
    $parts = explode(',', $line); // Memisahkan baris menjadi bagian-bagian

    $firstPart = trim($parts[0]);
    $secondPart = trim($parts[1]);
    $thirdPart = trim($parts[2]);

    $values = explode('\\', $secondPart); // Memisahkan nilai di bagian kedua

    $counter = 1;
    foreach ($values as $value) {
        if (!empty($value)) {
            $output[] = $firstPart . ', ' . $value . ', ' . $thirdPart . ', ' . $counter;
            $counter++;
        }
    }
}

// Fungsi untuk mengurutkan output berdasarkan angka terkecil ke terbesar
usort($output, function($a, $b) {
    $aValue = (int)trim(explode(',', $a)[1]); // Mengambil nilai sebagai angka pada $a
    $bValue = (int)trim(explode(',', $b)[1]); // Mengambil nilai sebagai angka pada $b

    if ($aValue == $bValue) {
        return 0;
    }
    return ($aValue < $bValue) ? -1 : 1;
});

// Menampilkan output
foreach ($output as $line) {
    echo $line . '<br>';
}
?>