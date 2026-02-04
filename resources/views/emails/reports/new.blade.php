<x-mail::message>
# Laporan Bullying Baru

Halo Admin, ada laporan bullying baru yang telah dikirimkan melalui sistem.

**Detail Laporan:**
- **Pelapor:** {{ $report->reporter_name ?? 'Anonim' }}
- **Jenis Bullying:** {{ $report->bullying_type }}
- **Lokasi:** {{ $report->location }}
- **Waktu:** {{ $report->incident_time->format('d M Y, H:i') }}

<x-mail::button :url="route('admin.report.show', $report->id)">
Lihat Detail Laporan
</x-mail::button>

Terima kasih,<br>
{{ config('app.name') }}
</x-mail::message>
