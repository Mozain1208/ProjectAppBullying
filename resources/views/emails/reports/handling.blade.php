<x-mail::message>
# Update Laporan Bullying

Halo {{ $report->reporter_name ?? 'Pelapor' }},

Laporan Anda dengan ID #{{ $report->id }} telah menerima pembaruan dari tim admin.

**Status Terbaru:** {{ $report->status }}
**Catatan Admin:**
{{ $handling->note ?? 'Tidak ada catatan tambahan.' }}

<x-mail::button :url="route('report.show', $report->id)">
Lihat Update Laporan
</x-mail::button>

Tetap tenang dan aman,<br>
Tim {{ config('app.name') }}
</x-mail::message>
