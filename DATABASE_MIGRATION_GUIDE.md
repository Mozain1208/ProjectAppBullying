# Database Migration Guide

## Migrasi Database Laravel untuk StopBullying

### 📋 Tabel yang Dibuat

1. **users** - Tabel pengguna dengan role dan status
2. **reports** - Tabel laporan bullying
3. **evidences** - Tabel bukti laporan (file upload)
4. **consultations** - Tabel konsultasi
5. **audit_logs** - Tabel log aktivitas admin
6. **site_settings** - Tabel pengaturan website
7. **password_reset_tokens** - Tabel reset password
8. **sessions** - Tabel session Laravel

### 🚀 Cara Menjalankan Migration

#### 1. **Fresh Migration** (Hapus semua data & buat ulang)
```bash
php artisan migrate:fresh --seed
```

#### 2. **Migration Biasa** (Jika database kosong)
```bash
php artisan migrate --seed
```

#### 3. **Rollback** (Jika ada error)
```bash
php artisan migrate:rollback
```

### 👤 Default Accounts

Setelah menjalankan seeder, Anda akan mendapatkan 2 akun default:

**Admin Account:**
- Username: `admin`
- Email: `admin@stopbullying.com`
- Password: `admin123`
- Role: `admin`

**Demo User Account:**
- Username: `user_demo`
- Email: `user@example.com`
- Password: `password`
- Role: `user`

### 📊 Struktur Tabel

#### **users**
- id, username (unique), nis (unique), email (unique)
- password, role (user/admin), age_category (child/teen/adult)
- status (active/banned), trust_score (default: 100)
- remember_token, timestamps

#### **reports**
- id, user_id (nullable), age_category
- description, bullying_type (verbal/fisik/sosial/emosional)
- status (pending/process/resolved), location, incident_time
- anonymous (boolean), timestamps

#### **evidences**
- id, report_id (foreign key)
- file_path, file_type, file_size
- timestamps

#### **consultations**
- id, user_id (nullable)
- message, anonymous (boolean)
- timestamps

#### **audit_logs**
- id, user_id (nullable)
- action, details, ip_address
- timestamps

#### **site_settings**
- id, setting_key (unique)
- setting_value
- timestamps

### ⚠️ Catatan Penting

1. **Backup Database Lama**: Jika Anda sudah punya database `bullying_report`, backup dulu sebelum migrasi!

2. **File .env**: Pastikan konfigurasi database di `.env` sudah benar:
   ```
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=bullying_report
   DB_USERNAME=root
   DB_PASSWORD=
   ```

3. **Storage Link**: Untuk file upload, jalankan:
   ```bash
   php artisan storage:link
   ```

4. **Permissions**: Pastikan folder `storage` dan `bootstrap/cache` writable:
   ```bash
   chmod -R 775 storage bootstrap/cache
   ```

### 🔄 Migrasi Data Lama (Opsional)

Jika Anda punya data di database lama dan ingin migrasi:

1. Export data dari database lama
2. Jalankan migration Laravel
3. Import data ke tabel baru dengan mapping yang sesuai

### 🐛 Troubleshooting

**Error: "SQLSTATE[42S01]: Base table or view already exists"**
- Solusi: Jalankan `php artisan migrate:fresh --seed` untuk drop & recreate semua tabel

**Error: "Class 'Database\Seeders\DB' not found"**
- Solusi: Sudah diperbaiki, pastikan ada `use Illuminate\Support\Facades\DB;` di seeder

**Error: "Storage directory not found"**
- Solusi: Jalankan `php artisan storage:link`
