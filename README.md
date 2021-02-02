# Metamata-code-challenge-backend

Membuat media untuk berbagi cerita; website sederhana untuk membaca dan memposting cerita;

## Cara instalasi dan run
- Git clone repository github ini.
```bash
git clone https://github.com/zxOrton/Metamata-code-challenge-backend.git
```
- Masuk dan buka folder project ini di local computer dengan menggunakan text editor atau IDE
```bash
cd metamata-challenge/
```
- Jalankan composer install di terminal atau cmd untuk menginstall semua dependencies
```bash
composer install
```
- Copy file .env.example dan ganti nama file tersebut menjadi .env
- Jalankan key generate untuk mendapatkan APP_KEY di .env
```bash
php artisan key:generate
```
- Buka XAMPP/web server lainnya.
- Buka phpmyadmin di browser dan buatlah database baru dengan nama "metamata"
- Jika menggunakan MAMP:
  - Ganti DB_PORT di file .env menjadi 8889
  - Ganti DB_DATABASE di file .env menjadi nama database tadi yaitu "metamata" (tanpa tanda petik)
  - DB_USERNAME DB_PASSWORD di .env diganti menjadi "root" (tanpa tanda petik)
- Jika menggunakan XAMPP/web server lain, maka hanya perlu mengganti DB_DATABASE menjadi nama database tadi yaitu "metamata" (tanpa tanda petik)
- Lalu jalankan php artisan migrate untuk memigrasi dan menghubungkan database phpmyadmin ke project ini.
```bash
php artisan migrate
```
- Terakhir, jalankan php artisan serve di terminal untuk run project.
```bash
php artisan serve
```
- Ketika menjalankan php artisan serve, akan muncul link "http://localhost:8000" atau "http://127.0.0.1:8000/"
