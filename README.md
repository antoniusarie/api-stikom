## API dengan PHP Native (branch Original)
API dengan PHP Native versi `teman-teman`.

## Informasi
Bagian dari Dasar Pemrograman Web / `Web Base Programming`.
Membuat `API` dengan `PHP Native` dengan output `XML` maupun `JSON` dan method `POST` maupun `GET`.

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
3. Gunakan `Postman` untuk menampilkan hasil `API`.

## Update (08/12/2019)
1. Untuk memilih report `XML` atau `JSON` pada file `services.php` adalah sbb:
> Uncomment untuk report dengan format XML
```
$option = "XML"
```

> Uncomment untuk report dengan format JSON
```
$option = "JSON"
```
2. Untuk memilih method `POST` atau `GET`, pada file `services.php` adalah sbb:
> Uncomment untuk method POST
```
$method = "POST"
```

> Uncomment untuk method GET
```
$method = "GET"
```

3. Fungsi-fungsi pada API disini adalah sbb:
> Menampilkan siswa menggunakan fungsi viewsiswa dan nis 1002 dengan metode POST.

![Fungsi Tampil - JSON](https://github.com/antoniusarie/api-stikom/blob/original/screenshots/JSON-POST-TampilData.png)

> Menambahkan siswa ke DB menggunakan fungsi register dengan value nis, nama dan alamat.

![Fungsi Tampil - JSON](https://github.com/antoniusarie/api-stikom/blob/original/screenshots/JSON-POST-TambahData.png)

> Menampilkan semua siswa menggunakan fungsi listsiswa.

![Fungsi Tampil - JSON](https://github.com/antoniusarie/api-stikom/blob/original/screenshots/JSON-POST-TampilSemua.png)

## Penutup
Itu saja dulu, lain kali diupdate jika ada tambahan dari `teman-teman`.
