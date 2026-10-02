<?php
$nama = "";
$matematika = "";
$bahasa = "";
$produktif = "";

$rataRata = null;
$predikat = "";
$status = "";
$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nama = trim($_POST["nama"]);
    $matematika = trim($_POST["matematika"]);
    $bahasa = trim($_POST["bahasa"]);
    $produktif = trim($_POST["produktif"]);

    // Validasi input kosong
    if ($nama == "" || $matematika == "" || $bahasa == "" || $produktif == "") {
        $error = "Semua input harus diisi!";
    }

    // Validasi harus angka
    elseif (
        !is_numeric($matematika) ||
        !is_numeric($bahasa) ||
        !is_numeric($produktif)
    ) {
        $error = "Nilai harus berupa angka!";
    }

    // Validasi nilai 0-100
    elseif (
        $matematika < 0 || $matematika > 100 ||
        $bahasa < 0 || $bahasa > 100 ||
        $produktif < 0 || $produktif > 100
    ) {
        $error = "Nilai harus berada di antara 0 sampai 100!";
    }

    else {
        // Menghitung rata-rata
        $rataRata = (
            $matematika +
            $bahasa +
            $produktif
        ) / 3;

        // Menentukan predikat
        if ($rataRata >= 85) {
            $predikat = "A";
        } elseif ($rataRata >= 75) {
            $predikat = "B";
        } elseif ($rataRata >= 65) {
            $predikat = "C";
        } elseif ($rataRata >= 50) {
            $predikat = "D";
        } else {
            $predikat = "E";
        }

        // Menentukan status
        if ($rataRata >= 75) {
            $status = "Lulus";
        } else {
            $status = "Remedial";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kalkulator Nilai Siswa</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background: #f2f4f7;
            margin: 0;
            padding: 40px;
        }

        .container {
            width: 450px;
            max-width: 100%;
            margin: auto;
            background: white;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            margin-bottom: 25px;
            color: #333;
        }

        label {
            display: block;
            margin-bottom: 6px;
            font-weight: bold;
            color: #444;
        }

        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 14px;
        }

        input:focus {
            border-color: #007bff;
            outline: none;
        }

        button {
            width: 100%;
            padding: 11px;
            border: none;
            border-radius: 6px;
            background: #007bff;
            color: white;
            font-size: 16px;
            cursor: pointer;
        }

        button:hover {
            background: #0056b3;
        }

        .error {
            background: #ffe0e0;
            color: #c00;
            padding: 10px;
            border-radius: 6px;
            margin-bottom: 15px;
        }

        .hasil {
            margin-top: 25px;
            padding: 20px;
            background: #f5f9ff;
            border-radius: 8px;
        }

        .hasil h2 {
            margin-top: 0;
            color: #333;
        }

        .hasil p {
            margin: 8px 0;
        }

        .lulus {
            color: green;
            font-weight: bold;
        }

        .remedial {
            color: red;
            font-weight: bold;
        }
    </style>
</head>

<body>

<div class="container">

    <h1>Kalkulator Nilai Siswa</h1>

    <?php if ($error != ""): ?>
        <div class="error">
            <?= htmlspecialchars($error); ?>
        </div>
    <?php endif; ?>

    <form method="POST">

        <label for="nama">Nama Siswa</label>
        <input
            type="text"
            id="nama"
            name="nama"
            value="<?= htmlspecialchars($nama); ?>"
            placeholder="Masukkan nama siswa"
        >

        <label for="matematika">Matematika</label>
        <input
            type="number"
            id="matematika"
            name="matematika"
            value="<?= htmlspecialchars($matematika); ?>"
            placeholder="0 - 100"
            min="0"
            max="100"
        >

        <label for="bahasa">Bahasa Indonesia</label>
        <input
            type="number"
            id="bahasa"
            name="bahasa"
            value="<?= htmlspecialchars($bahasa); ?>"
            placeholder="0 - 100"
            min="0"
            max="100"
        >

        <label for="produktif">Produktif</label>
        <input
            type="number"
            id="produktif"
            name="produktif"
            value="<?= htmlspecialchars($produktif); ?>"
            placeholder="0 - 100"
            min="0"
            max="100"
        >

        <button type="submit">Hitung Nilai</button>

    </form>


    <?php if ($rataRata !== null): ?>

        <div class="hasil">

            <h2>Hasil Nilai</h2>

            <p>
                <strong>Nama:</strong>
                <?= htmlspecialchars($nama); ?>
            </p>

            <p>
                <strong>Matematika:</strong>
                <?= $matematika; ?>
            </p>

            <p>
                <strong>Bahasa Indonesia:</strong>
                <?= $bahasa; ?>
            </p>

            <p>
                <strong>Produktif:</strong>
                <?= $produktif; ?>
            </p>

            <p>
                <strong>Rata-rata:</strong>
                <?= number_format($rataRata, 2); ?>
            </p>

            <p>
                <strong>Predikat:</strong>
                <?= $predikat; ?>
            </p>

            <p>
                <strong>Status:</strong>

                <?php if ($status == "Lulus"): ?>
                    <span class="lulus"><?= $status; ?></span>
                <?php else: ?>
                    <span class="remedial"><?= $status; ?></span>
                <?php endif; ?>

            </p>

        </div>

    <?php endif; ?>

</div>

</body>
</html>