<x-mail::message>
# Verifikasi Email Anda

Halo,

Terima kasih telah mendaftar di **StopBullying**. Untuk menyelesaikan proses pendaftaran dan memastikan email Anda valid, silakan gunakan kode verifikasi di bawah ini:

<x-mail::panel>
# {{ $code }}
</x-mail::panel>

Kode ini berlaku selama 30 menit. Silakan masukkan kode ini di halaman verifikasi untuk mengaktifkan akun Anda.

Terima kasih,<br>
{{ config('app.name') }}
</x-mail::message>
