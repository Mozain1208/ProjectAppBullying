# Login Sequence Diagram

Diagram ini menggambarkan alur proses login pada aplikasi pelaporan bullying.

```mermaid
sequenceDiagram
    actor User
    participant Sistem
    participant Database
    
    User->>Sistem: Mengakses halaman login
    Sistem->>User: Tampilkan form login
    
    User->>Sistem: Input email & password
    User->>Sistem: Klik tombol login
    
    Sistem->>Sistem: Validasi input
    
    alt Input tidak valid
        Sistem->>User: Tampilkan pesan error validasi
    else Input valid
        Sistem->>Database: Query user by email
        
        alt User tidak ditemukan
            Database->>Sistem: User not found
            Sistem->>User: Tampilkan "Email tidak terdaftar"
        else User ditemukan
            Database->>Sistem: Return user data
            Sistem->>Sistem: Verify password (Hash::check)
            
            alt Password salah
                Sistem->>User: Tampilkan "Password salah"
            else Password benar
                Sistem->>Sistem: Create session & authenticate user
                
                alt User adalah Admin
                    Sistem->>User: Redirect ke /admin/dashboard
                else User adalah Regular User
                    Sistem->>User: Redirect ke /home
                end
            end
        end
    end
```

## Penjelasan Alur:

1. **Akses Halaman Login**: User mengakses halaman login
2. **Tampil Form**: Sistem menampilkan form login dengan field email dan password
3. **Submit Credentials**: User memasukkan email dan password, lalu submit
4. **Validasi Input**: Sistem memvalidasi format input (required, email format, dll)
5. **Cek Database**: Sistem mencari user berdasarkan email di database
6. **Verifikasi Password**: Jika user ditemukan, sistem memverifikasi password menggunakan hash
7. **Buat Session**: Jika password benar, sistem membuat session dan autentikasi user
8. **Redirect**: User diarahkan ke halaman sesuai role (admin → dashboard, user → home)

## Komponen yang Terlibat:

- **User**: Pengguna yang ingin login
- **Sistem**: Backend aplikasi Laravel (Controller, Middleware, Session)
- **Database**: Penyimpanan data user (tabel users)
```
