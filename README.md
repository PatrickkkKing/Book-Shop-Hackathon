Cara Install atau Run Project
'''
'''
Jalankan perintah berikut untuk menginstal dependensi php

```
composer install
```

Jalankan perintah berikut untuk mengatur _environment variable_

```
cp .env.example .env
```

Pastikan Anda telah membuat database baru di MySQL dan silakan sesuaikan file `.env` dengan database Anda.
Jalankan perintah berikut untuk membuat _key_ untuk web app Anda

```
php artisan key:generate
```

Jalankan perintah berikut untuk membuat skema database

```
php artisan migrate
```

Selanjutnya masukkan Seeder dibawah

```
php artisan db:seed --class=DatabaseSeeder
```
Perintah Untuk Install Node.js (optional jika error .vite js)

```
npm install && npn run build
```
Terakhir jalankan perintah dibawah ini

```
php artisan serve
```



## Sistem Pendaftaran Pelatihan Digital Talent Schoolarship
Halaman Home
![image](https://github.com/PatrickkkKing/SIP-KOMINFO-JWD/assets/116421423/8cacc2af-2758-4fcd-be70-3e3f994016eb)


