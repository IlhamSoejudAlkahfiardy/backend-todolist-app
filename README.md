# ToDO List App with Laravel 10
Ini adalah bagian Back End berbasis Laravel 10 dari proyek todolist app

## Requirement
- PHP 8.2.0 atau versi lebih tinggi
- Database menggunakan postgreSQL
- Composer 
- Node.js dan npm

## Instalasi
### 1. Clone Repository
Clone repositori proyek ke direktori lokal anda

```bash
git clone https://github.com/IlhamSoejudAlkahfiardy/backend-todolist-app.git
cd repository
```

### 2. Install Dependencies
Install dependencies PHP dan Node.js
```bash
composer install
npm install
```

### 3. Konfigurasi Environtment
Salin file `.env.example` menjadi `.env`
```bash
cp .env.example .env
```

Edit file `.env` untuk mengkonfigurasi database dan pengaturan lainnya. Contoh pengaturan database untuk PostgreSQL:
```bash
DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=your_database_name
DB_USERNAME=your_database_username
DB_PASSWORD=your_database_password
```

### 4. Generate Key Aplikasi
Generate key aplikasi Laravel
```bash
php artisan key:generate
```

### 5. Jalankan Artisan Migrate
Jalankan migrasi untuk membuat tabel-tabel di database.
```bash
php artisan migrate
```

### 6. Seed Database
Jalankan seeder untuk mengisi tabel categories
```bash
php artisan db:seed
```

### 7. Jalankan Server
Jalankan command berikut ini untuk membuka proyek pada browser anda
```bash
php artisan serve
# atau
php artisan ser
```
Aplikasi Anda secara default dapat diakses di `http://localhost:8000`

## Testing
Jalankan command berikut ini untuk melakukan testing menggunakan unit testing
```bash
php artisan test
```































