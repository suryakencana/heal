<?
DEFINE("TREE_LENGTH",10);
DEFINE("TREE_LENGTH_TIC",10);
DEFINE("TREE_DELIMITER","... ");

DEFINE("STATUS_REGISTRASI","A");
DEFINE("STATUS_REFRAKSI","R");
DEFINE("STATUS_PEMERIKSAAN","M");
DEFINE("STATUS_PREOP","P");
DEFINE("STATUS_OPERASI","O");
DEFINE("STATUS_OPERASI_JADWAL","J");
DEFINE("STATUS_BEDAH","B");
DEFINE("STATUS_DIAGNOSTIK","D");
DEFINE("STATUS_SELESAI","E");
DEFINE("STATUS_PREMEDIKASI","K");

$rawatStatus[STATUS_REGISTRASI] = "Registrasi";
$rawatStatus[STATUS_REFRAKSI] = "Refraksi";
$rawatStatus[STATUS_PEMERIKSAAN] = "Pemeriksaan";
$rawatStatus[STATUS_PREOP] = "PreOP";
$rawatStatus[STATUS_OPERASI] = "Operasi";
$rawatStatus[STATUS_OPERASI_JADWAL] = "Jadwal";
$rawatStatus[STATUS_BEDAH] = "Bedah Minor";
$rawatStatus[STATUS_DIAGNOSTIK] = "Diagnostik";
$rawatStatus[STATUS_SELESAI] = "Selesai";
$rawatStatus[STATUS_PREMEDIKASI] = "Premedikasi";

$biayaStatus[STATUS_REGISTRASI] = "Registrasi";
$biayaStatus[STATUS_REFRAKSI] = "Refraksi";
$biayaStatus[STATUS_PEMERIKSAAN] = "Pemeriksaan";
$biayaStatus[STATUS_PREOP] = "PreOP";
$biayaStatus[STATUS_OPERASI] = "Operasi";
$biayaStatus[STATUS_OPERASI_JADWAL] = "Jadwal";
$biayaStatus[STATUS_BEDAH] = "Bedah";
$biayaStatus[STATUS_DIAGNOSTIK] = "Diagnostik"; 
$biayaStatus[STATUS_PREMEDIKASI] = "Premedikasi";
 
$ruangProses[STATUS_REFRAKSI] = "Refraksi";
$ruangProses[STATUS_PEMERIKSAAN] = "Pemeriksaan";
$ruangProses[STATUS_PREOP] = "PreOP";
$ruangProses[STATUS_OPERASI] = "Operasi"; 
$ruangProses[STATUS_BEDAH] = "Bedah";
$ruangProses[STATUS_DIAGNOSTIK] = "Diagnostik"; 
$ruangProses[STATUS_PREMEDIKASI] = "Premedikasi";

DEFINE("STATUS_ANTRI","0");
DEFINE("STATUS_PROSES","1");

$rawatStatus[STATUS_ANTRI] = "Antri";
$rawatStatus[STATUS_PROSES] = "Proses";

DEFINE("PGW_JENIS_DOKTER",1);
DEFINE("PGW_JENIS_SUSTER",2);

$jenisPegawai[PGW_JENIS_DOKTER] = "Dokter";
$jenisPegawai[PGW_JENIS_SUSTER] = "Perawat";

DEFINE("RAWAT_KEADAAN_BAIK","B");
DEFINE("RAWAT_KEADAAN_LEMAH","L");
DEFINE("RAWAT_KEADAAN_JELEK","J");
DEFINE("RAWAT_KEADAAN_COMA","C");

$rawatKeadaan[RAWAT_KEADAAN_BAIK] = "Baik";
$rawatKeadaan[RAWAT_KEADAAN_LEMAH] = "Lemah";
$rawatKeadaan[RAWAT_KEADAAN_JELEK] = "Jelek";
$rawatKeadaan[RAWAT_KEADAAN_COMA] = "Coma";


DEFINE("JK_LAKILAKI","L");
DEFINE("JK_PEREMPUAN","P");

$jenisKelamin[JK_LAKILAKI] = "Laki-laki";
$jenisKelamin[JK_PEREMPUAN] = "Perempuan";


DEFINE("KAT_OBAT_ANESTESIS","01");
DEFINE("KAT_OBAT_INJEKSI","02");

DEFINE("ICD_DIAGNOSIS","1");
DEFINE("ICD_OPERASI","2");

DEFINE("INA_DIAGNOSIS","1");
DEFINE("INA_OPERASI","2");

DEFINE("BIAYA_LOKET","1");
DEFINE("BIAYA_GULA","2");
DEFINE("BIAYA_ARK","6");
DEFINE("BIAYA_USG","3");
DEFINE("BIAYA_GULA_PREOP","4");
DEFINE("BIAYA_INJEKSI","7");
DEFINE("BIAYA_KERATOMETRI","8");
DEFINE("BIAYA_BIOMETRI","9");
DEFINE("BIAYA_KARTU","10");
DEFINE("BIAYA_EKG","11");
DEFINE("BIAYA_FUNDUS","12");
DEFINE("BIAYA_OPTHALMOSCOPY","13");
DEFINE("BIAYA_OCT","14");
DEFINE("BIAYA_YAG","15");
DEFINE("BIAYA_ARGON","16");
DEFINE("BIAYA_GLAUKOMA","17");
DEFINE("BIAYA_HUMPREY","18");

// -- biaya pemeriksaan --
DEFINE("BIAYA_UJIMATA","19");

// --- biaya preop ---
DEFINE("BIAYA_GULA_PREOP","4");
DEFINE("BIAYA_GULAREGULASI_PREOP","20");

$bayarNama[BIAYA_KARTU] = "Cetak Kartu Identitas Pasien";

DEFINE("PASIEN_BARU","B");
DEFINE("PASIEN_LAMA","L");

$statusPasien[PASIEN_BARU] = "Baru";
$statusPasien[PASIEN_LAMA] = "Lama";


DEFINE("PASIEN_BAYAR_ASKES","1");
DEFINE("PASIEN_BAYAR_PNS","2");
DEFINE("PASIEN_BAYAR_SWADAYA","3");
DEFINE("PASIEN_BAYAR_JAMKESNAS_PUSAT","4");
DEFINE("PASIEN_BAYAR_JAMKESNAS_DAERAH","5");
DEFINE("PASIEN_KOMPLIMEN","6");

$bayarPasien[PASIEN_BAYAR_ASKES] = "Askes";
$bayarPasien[PASIEN_BAYAR_PNS] = "PNS";
$bayarPasien[PASIEN_BAYAR_SWADAYA] = "Swadaya";
$bayarPasien[PASIEN_BAYAR_JAMKESNAS_PUSAT] = "Jamkesmas Pusat";
$bayarPasien[PASIEN_BAYAR_JAMKESNAS_DAERAH] = "Jamkesmas Daerah";
$bayarPasien[PASIEN_KOMPLIMEN] = "Komplimen";

?>
