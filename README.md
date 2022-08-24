Aplikasi Ini dibuat sebagai test backend enginer pada sekawanMedia namun belum selesai ketika tenggat waktu yang ditentukan namun akan terus saya kembangkan. 

teknologi yang digunakan : 
1. PHP 8.1.6
2. laravel 9
3. mysql
4. Xampp 

penggunaan Aplikasi ini : 
1. Harus sudah terinstal laravel dan composer serta PHP versi 8.1
2. setelah itu jalankan git clone https://github.com/alfeushersandy/sekawanmedia.git
3. kemudian jalan kan perintah "composer update"
4. lalu jalankan perintah "cp .env.example .env" untuk membuat file .env
5. kemudian jalankan XAMPP atau LAMPP atau LARAGON 
6. jalan kan mysql server 
7. buat database bernama apapun
8. pada file .env pada DB_DATABASE tuliskan nama database 
9. kemudian jalankan "php artisan migrate" 
10. kemudian jalankan "php artisan key:generate"
11. kemdian jalankan server dengan menjalankan "php artisan serve"
12. buka pada browser localhost:8000 
13. aplikasi dapat digunakan.