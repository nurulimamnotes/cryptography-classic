<form action="" method="POST">
    <table style="width: 60%; margin: 0 20%;">
        <tr>
            <td><input type="text" name="teks" class="form-control" style="margin: 10px 0;" placeholder="Masukkan teks yang ingin di decrypt..." /></td>
        </tr>
        <tr>
            <td><input type="text" name="kunci" class="form-control" style="margin: 10px 0;" placeholder="Masukkan kunci yang ingin di coba..." /></td>
        </tr>
        <tr>
            <td><input type="submit" name="submit" class="btn btn-primary" style="float: right;" value="Decrypt" /></td>
        </tr>
    </table>
    
    <br />
    <br />
    <br />
</form>
<?php
$awal = "a b c d e f g h i j k l m n o p q r s t u v w x y z";
$input = $_POST['teks'];
$kunci = $_POST['kunci'];
/**
 * Alur Cryptography Classic
 * Buat Array
 * Inisialisasi Nilai Default Index Array
 * 
 * Buat Array dari S_POST['teks']
 * Convert isi Array ke nilai default Index Array
 *
 * Lakukan perhitungan mod dengan angka dari hasil Index Array, Kunci & mod
 * Hasilnya cocokkan dengan angka Index Array Default
 * Convert Index Array ke dalam huruf sesuai Array Default
*/

/**
 * Untuk memecah string menjadi array dengan gap spasi
 * @param string $input Data / String yang ingin di pecah
 */
function PecahHuruf($input)
{
    $hurufpecah = explode(" ", $input);
    return $hurufpecah;
}
echo '<table style="width: 60%; margin: 0 20%;text-align:center" class="table table-responsive table-hover">';
echo "<tr>";
echo "<td>Index Awal</td>";
echo "<td>Huruf Awal</td>";
echo "<td>Index Akhir</td>";
echo "<td>Huruf Akhir</td>";
echo "</tr>";
//  Mulai dari sini rulenya
foreach (str_split($input, 1) as $index => $isi) {
    $huruf = $isi;
    foreach (PecahHuruf($awal) as $key => $value) {
        if ($huruf==$value) {
            $kurang = $key - $kunci;
            $hitung = (26 + ($kurang % 26)) % 26;
            $baru = str_split($hitung, 2);
            foreach ($baru as $keyakhir => $valueakhir) {
                echo "<tr>";
                echo "<td>".$key."</td><td>".$isi."</td>";
                foreach (PecahHuruf($awal) as $key => $value) {
                    if ($valueakhir==$key) {
                        echo "<td>".$key."</td><td>".$value."</td>";
                        echo "</tr>";
                    }
                }
            }
        }
    }
}
echo "</table>";
?>