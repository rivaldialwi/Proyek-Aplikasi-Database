<?php
require "../config/koneksi.php";

$next = $_POST['next'];
$id_customer = $_POST['id_customer'];
$nama = $_POST['nama'];
$no_hp = $_POST['no_hp'];
$alamat = $_POST['alamat'];
$nomor_plat = $_POST['nomor_plat'];
$type_mobil = $_POST['type_mobil'];
$no_antrian = $_POST['no_antrian'];
$id_jenis_service = $_POST['id_jenis_service'];
$nomor_plat = $_POST['nomor_plat'];
$total_biaya = $_POST['total_biaya'];
$tgl_pendaftaran = $_POST['tgl_pendaftaran'];
$tgl_boking = $_POST['tgl_boking'];
$jam_pendaftaran = $_POST['jam_pendaftaran'];

date_default_timezone_set('Asia/Jakarta');

// Hitung waktu selesai dengan menambahkan 30 menit ke waktu booking yang dipilih
$end_time = date('H:i:s', strtotime($jam_pendaftaran . ' +30 minutes'));

// Periksa apakah ada booking yang tumpang tindih dalam rentang waktu yang dipilih
$check_overlap_query = "SELECT COUNT(id_pendaftaran) AS jumlah_daftar FROM pendaftaran 
                        WHERE tgl_boking = '$tgl_boking' 
                        AND ((jam_pendaftaran >= '$jam_pendaftaran' AND jam_pendaftaran < '$end_time') 
                             OR (jam_pendaftaran < '$jam_pendaftaran' AND '$jam_pendaftaran' < ADDTIME(jam_pendaftaran, '00:30:00')))";

$overlap_result = mysql_query($check_overlap_query);
$overlap_data = mysql_fetch_array($overlap_result);
$overlap_count = $overlap_data['jumlah_daftar'];

if ($overlap_count != 0) {
    ?>
    <script language="JavaScript">
        alert('Maaf, Jam Yang Anda Pilih Sudah Dibooking atau Tidak Tersedia, Silahkan Pilih Jam Lainnya');
        document.location = '../index.php';
    </script>
    <?php
} else {
    // Kode Anda yang sudah ada untuk memproses pendaftaran
    if ($next > '20') {
        ?>
        <script language="JavaScript">
            alert('Maaf, Antrian Hari Ini Sudah Penuh, Silahkan Daftar Kembali Di Hari Berikutnya');
            document.location = '../index.php';
        </script>
    <?php
    } elseif ($next <= '30') {
        $queryy = "insert into customer(id_customer, nama, no_hp, alamat, nomor_plat, type_mobil) values('$id_customer','$nama', '$no_hp', '$alamat', '$nomor_plat', '$type_mobil')";
        $hasill = mysql_query($queryy);

        $query = "insert into pendaftaran(id_pendaftaran, no_antrian, id_customer, id_jenis_service, tgl_pendaftaran, jam_pendaftaran, tgl_boking, total_biaya, status) values(NULL,'$no_antrian', '$id_customer', '$id_jenis_service', '$tgl_pendaftaran', '$jam_pendaftaran', '$tgl_boking', '$total_biaya', 'Pendaftaran')";
        $hasil = mysql_query($query);
    }
    // Lihat hasil
    if ($hasil) {
        ?>
        <script language="JavaScript">
            alert('Pendaftaran Anda Berhasil Dilakukan, Silahkan Datang Ke service Kami');
            window.location.replace('../index.php');
        </script>
    <?php
    } else {
        ?>
        <script language="JavaScript">
            alert('Pendaftaran Gagal Dilakukan');
            document.location = '../index.php';
        </script>
<?php
    }
}
?>