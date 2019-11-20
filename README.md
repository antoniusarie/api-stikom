# API dengan PHP Native
API dengan PHP Native 

## Informasi
Bagian dari Dasar Pemrograman Web / `Web Base Programming`.
Membuat `API` dengan `PHP Native` dengan output `XML` maupun `JSON`.

## Tools
| NAMA | VERSI |
| :--- | :---: | 
| Laragon | 4.0.15 |
| PHP | 5.6 |
| Nginx | 1.1.16 |
| MySQL | 5.7.24 |
| Navicat | 12.0.24 |
| Postman | 7.1.20 |
| Visual Studio Code | 1.40.1 |
| OS Windows | 10 - 1903 |

Catatan: `Laragon` sudah mencakup Nginx, PHP, MySQL.

## Instalasi
1. `Clone` Git atau `Extract` file zip.
2. Query sample database `siswa.sql` ke DMBS. 
3. Sesuaikan `username`, `password` dan `nama db` pada file `koneksi.php`.
3. Gunakan `Postman` untuk menammpilkan hasil `API`.
4. Untuk memilih output XML `(default)` atau JSON, pada file `services.php` adalah sbb:
```
/* XML - Uncomment untuk report dengan format XML */
require_once("XML/report.php");
require_once("XML/functions.php");

atau 

/* JSON - Uncomment untuk report dengan format XML */
// require_once("JSON/report.php");
// require_once('JSON/functions.php');
```
5. Fungsi-fungsi pada API disini adalah sbb:
```
// Menampilkan siswa menggunakan fungsi viewsiswa dan nis 7003.
http://localhost/services.php?fungsi=viewsiswa&nis=7003;

// Menambahkan siswa ke DB menggunakan fungsi register dengan value nis, nama dan alamat.
http://localhost/services.php?fungsi=register&nis=[nomor-induk-siswa]&nama=[nama]&alamat=[alamat];

// Menampilkan semua siswa menggunakan fungsi semuasiswa (hanya ouput JSON).
http://localhost/services.php?fungsi=semuasiswa;
```

## Penutup
Itu saja dulu, lain kali diupdate jika ada tambahan dari `teman-teman`.