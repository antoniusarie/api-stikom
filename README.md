## API dengan PHP Native
API dengan PHP Native 

## Informasi
Bagian dari Dasar Pemrograman Web / `Web Base Programming`.
Membuat `API` dengan `PHP Native` dengan method `POST` maupun `GET` dan output format `JSON` maupun `XML`.

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
4. Gunakan `Postman` untuk menampilkan hasil `API`.

## Update (14/12/2019)
1. Tambah fungsi `hapus` untuk menghapus `mahasiswa` berdasarkan `nim`.
2. Ubah nama fungsi `tampilsemua` menjadi `semua`
3. Opsi untuk `POST` atau `GET` dan `JSON` atau `XML` ada di `services.php`, tinggal comment/uncomment.
4. Fungsi-fungsi pada API disini dengan method GET adalah sbb:
> Menampilkan mahasiswa menggunakan fungsi `tampil` by nim.
```
http://localhost/services.php?fungsi=tampil&nim=7003
```
> Menambahkan mahasiswa ke DB menggunakan fungsi `tambah` dengan value nim, nama dan alamat.
```
http://localhost/services.php?fungsi=tambah&nim=[nomor-induk-siswa]&nama=[nama]&alamat=[alamat]
```
> Menghapus mahasiswa menggunakan fungsi `hapus` by nim.
```
http://localhost/services.php?fungsi=hapus&nim=7003
```
> Menampilkan semua mahasiswa menggunakan fungsi `semua`.
```
http://localhost/services.php?fungsi=semua
```

5. Fungsi-fungsi pada API disini dengan method POST adalah sbb:
> Menampilkan mahasiswa menggunakan fungsi `tampil` by nim.
```
URL : http://localhost/services.php
Body, Raw, JSON
{
    "fungsi" : "tampil",
    "nim" : "nomor induk mahasiswa"
}
```
> Menambahkan mahasiswa ke DB menggunakan fungsi `tambah` dengan value nim, nama dan alamat.
```
URL : http://localhost/services.php
Body, Raw, JSON
{
    "fungsi" : "tambah",
    "nim" : "nomor induk mahasiswa",
    "nama" : "nama mahasiswa",
    "alamat" : "alamat mahasiswa"
}
```
> Manghapus mahasiswa menggunakan fungsi `hapus` by nim.
```
URL : http://localhost/services.php
Body, Raw, JSON
{
    "fungsi" : "hapus",
    "nim" : "nomor induk mahasiswa"
}
```
> Menampilkan semua mahasiswa menggunakan `fungsi` semua.
```
URL : http://localhost/services.php
Body, Raw, JSON
{
    "fungsi" : "semua"
}
```

6. Preview Page `index.php` menampilkan output API (JSON) ke Datatable.

![Preview Index Page - JSON](https://github.com/antoniusarie/api-stikom/blob/master/screenshots/JSON-DatatablesView.png)

## Screenshot Output
1. XML Tambah Data.

![Fungsi Tampil Semua - XML](https://github.com/antoniusarie/api-stikom/blob/master/screenshots/XML-TambahData.png)

2. XML Tampil Data.

![Fungsi Tampil Semua - XML](https://github.com/antoniusarie/api-stikom/blob/master/screenshots/XML-TampilData.png)

3. XML Tampil Semua.

![Fungsi Tampil Semua - XML](https://github.com/antoniusarie/api-stikom/blob/master/screenshots/XML-TampilSemua.png)

4. JSON Tambah Data.

![Fungsi Tambah - JSON](https://github.com/antoniusarie/api-stikom/blob/master/screenshots/JSON-TambahData.png)

5. JSON Tampil Data.

![Fungsi Tampil - JSON](https://github.com/antoniusarie/api-stikom/blob/master/screenshots/JSON-TampilData.png)

6. JSON Tampil Semua.

![Fungsi Tampil Semua - JSON](https://github.com/antoniusarie/api-stikom/blob/master/screenshots/JSON-TampilSemua.png)

## Penutup
The End.
