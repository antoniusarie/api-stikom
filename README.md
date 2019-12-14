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
4. Gunakan `Postman` untuk menampilkan hasil `API`.

## Update (08/12/2019)
1. Opsi untuk `POST` atau `GET` dan `JSON` atau `XML` ada di `services.php`, tinggal comment/uncomment.
2. Fungsi-fungsi pada API disini adalah sbb:
> Menampilkan siswa menggunakan fungsi viewsiswa dan nis 1002 dengan metode POST.

![Fungsi Tampil - JSON](https://github.com/antoniusarie/api-stikom/blob/original/screenshots/JSON-POST-TampilData.png)

> Menambahkan siswa ke DB menggunakan fungsi register dengan value nis, nama dan alamat.

![Fungsi Tampil - JSON](https://github.com/antoniusarie/api-stikom/blob/original/screenshots/JSON-POST-TambahData.png)

> Menampilkan semua siswa menggunakan fungsi listsiswa.

![Fungsi Tampil - JSON](https://github.com/antoniusarie/api-stikom/blob/original/screenshots/JSON-POST-TampilSemua.png)

## Penutup
The End.
