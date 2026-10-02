<?PHP
$nama = "Rizky Sumarsono";
echo "Nama: " . $nama . "<br>";

$kelas = "XII RPL 1";
echo "Kelas: " . $kelas . "<br>";

$sekolah = "SMKN 1 PACITAN";
echo "Sekolah: " . $sekolah . "<br>";

$umur = "18";
echo "Umur: " . $umur . "<br>";

$mata_pelajaran = array("IPA", "IPS", "B-IGGRIS", "B-INDONESIA", "PRAKARYA", "KWU", "PKN", "MTK");
foreach ($mata_pelajaran as $mapel) {
    echo "$mapel ";
}
?>