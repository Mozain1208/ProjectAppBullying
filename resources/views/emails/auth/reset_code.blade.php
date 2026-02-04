<x-mail::message>
# Lupa Kata Sandi

Halo,

Kami menerima permintaan untuk mereset kata sandi akun Anda. Gunakan kode verifikasi di bawah ini untuk melanjutkan proses reset kata sandi:

<x-mail::panel>
# {{ $code }}
</x-mail::panel>

Kode ini berlaku selama 60 menit. Jika Anda tidak meminta reset kata sandi, abaikan email ini.

Terima kasih,<br>
{{ config('app.name') }}
</x-mail::message>
