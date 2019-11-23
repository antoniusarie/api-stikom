## API dengan PHP Native
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
2. Query sample database `mahasiswa.sql` ke DMBS. 
3. Sesuaikan `username`, `password` dan `nama db` pada file `koneksi.php`.
3. Gunakan `Postman` untuk menammpilkan hasil `API`.

## Update (23/11/2019)
1. Untuk memilih output `XML` atau `JSON`, pada file `services.php` adalah sbb:
* XML - Uncomment untuk report dengan format XML
```
require_once("XML/report.php");
require_once("XML/functions.php");
```

* JSON - Uncomment untuk report dengan format JSON
```
require_once("JSON/report.php");
require_once('JSON/functions.php');
```
2. Fungsi-fungsi pada API disini adalah sbb:
> Menampilkan siswa menggunakan fungsi tampil dan nis 7003.
```
http://localhost/services.php?fungsi=tampil&nim=7003;
```
> Menambahkan siswa ke DB menggunakan fungsi tambah dengan value nim, nama dan alamat.
```
http://localhost/services.php?fungsi=tambah&nim=[nomor-induk-siswa]&nama=[nama]&alamat=[alamat];
```
> Menampilkan semua siswa menggunakan fungsi semua mahasiswa.
```
http://localhost/services.php?fungsi=tampilsemua;
```
3. Preview Page `index.php` menampilkan output API (JSON) ke Datatable
4. Screenshot output (XML & JSON) 

## Penutup
Itu saja dulu, lain kali diupdate jika ada tambahan dari `teman-teman`.
