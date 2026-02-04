@extends('layouts.app')

@section('title', 'Laporkan Bullying - StopBullying')

@section('styles')
<style>
.dashboard-card {
    border-radius: 1rem;
    box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px 0 rgba(0, 0, 0, 0.06);
    transition: all 0.3s ease;
}

.dashboard-card:hover {
    box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
}

.bullying-type-card {
    cursor: pointer;
    transition: all 0.3s ease;
    border: 2px solid #e5e7eb;
    display: block;
    position: relative;
}

.bullying-type-card:hover {
    border-color: #3b82f6;
    transform: translateY(-2px);
}

.bullying-type-card.selected {
    border-color: #3b82f6 !important;
    background: #eff6ff !important;
    box-shadow: 0 4px 12px rgba(59, 130, 246, 0.3) !important;
}

.bullying-type-card input[type="radio"] {
    position: absolute;
    opacity: 0;
    width: 100%;
    height: 100%;
    top: 0;
    left: 0;
    cursor: pointer;
    z-index: 10;
}

.stat-card {
    border-radius: 1rem;
    padding: 1.5rem;
    color: white;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
}
</style>
@endsection

@section('content')

<div class="container mx-auto px-4 py-12">
    
    <div class="mb-8">
        <h1 class="text-3xl md:text-4xl font-bold text-gray-900 mb-2">Laporkan Bullying</h1>
        <p class="text-gray-600">Laporkan kejadian bullying dengan aman dan terpercaya. Identitas Anda akan dilindungi.</p>
    </div>

    @if(session('success'))
        <div class="bg-green-50 border-l-4 border-green-500 rounded-lg p-4 mb-6">
            <p class="text-green-700 font-medium flex items-center">
                <i class="fas fa-check-circle mr-2"></i>{{ session('success') }}
            </p>
        </div>
    @endif

    @if($errors->any())
        <div class="bg-red-50 border-l-4 border-red-500 rounded-lg p-4 mb-6">
            <p class="text-red-700 font-medium flex items-center">
                <i class="fas fa-times-circle mr-2"></i>{{ $errors->first() }}
            </p>
        </div>
    @endif

    
    <div class="grid md:grid-cols-3 gap-6 mb-8">
        <div class="stat-card" style="background: linear-gradient(135deg, #5B8DEF 0%, #6B9DF1 100%);">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-white/80 text-sm font-medium">Langkah</p>
                    <p class="text-3xl font-bold mt-1">1</p>
                </div>
                <div class="w-12 h-12 bg-white/20 rounded-lg flex items-center justify-center">
                    <i class="fas fa-clipboard-list text-2xl"></i>
                </div>
            </div>
            <p class="text-white/90 text-sm mt-2">Isi formulir laporan</p>
        </div>
        
        <div class="stat-card" style="background: linear-gradient(135deg, #7BA5F3 0%, #8BB3F5 100%);">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-white/80 text-sm font-medium">Langkah</p>
                    <p class="text-3xl font-bold mt-1">2</p>
                </div>
                <div class="w-12 h-12 bg-white/20 rounded-lg flex items-center justify-center">
                    <i class="fas fa-cloud-upload-alt text-2xl"></i>
                </div>
            </div>
            <p class="text-white/90 text-sm mt-2">Upload bukti pendukung</p>
        </div>
        
        <div class="stat-card" style="background: linear-gradient(135deg, #A0C4F8 0%, #B5D4FA 100%);">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-white/80 text-sm font-medium">Langkah</p>
                    <p class="text-3xl font-bold mt-1">3</p>
                </div>
                <div class="w-12 h-12 bg-white/20 rounded-lg flex items-center justify-center">
                    <i class="fas fa-paper-plane text-2xl"></i>
                </div>
            </div>
            <p class="text-white/90 text-sm mt-2">Kirim & kami akan tindak lanjuti</p>
        </div>
    </div>

   
    <form method="POST" action="{{ route('report.store') }}" enctype="multipart/form-data" class="space-y-6">
        @csrf
        
        <div class="dashboard-card p-6 bg-gradient-to-br from-white to-yellow-50">
            <h2 class="text-xl font-bold text-gray-900 mb-4 flex items-center">
                <i class="fas fa-tags text-orange-600 mr-2"></i>
                Pilih Jenis Bullying
            </h2>
            <p class="text-gray-600 mb-4">Pilih salah satu jenis bullying yang terjadi</p>
            
            <div class="space-y-3">
                @php
                    $categories = explode(',', $site_settings['bullying_categories'] ?? 'verbal,fisik,sosial,cyberbullying');
                    $icons = ['verbal' => 'fa-comment-dots', 'fisik' => 'fa-hand-rock', 'sosial' => 'fa-user-slash', 'sosial/relasional' => 'fa-user-slash', 'cyberbullying' => 'fa-globe'];
                    $colors = ['verbal' => 'red', 'fisik' => 'orange', 'sosial' => 'purple', 'sosial/relasional' => 'purple', 'cyberbullying' => 'blue'];
                @endphp
                @foreach($categories as $category)
                    @php 
                        $catClean = trim($category);
                        $catLower = strtolower($catClean);
                        $icon = $icons[$catLower] ?? 'fa-exclamation-circle';
                        $color = $colors[$catLower] ?? 'gray';
                    @endphp
                    <label class="flex items-start p-4 border-2 border-gray-300 rounded-xl cursor-pointer hover:border-blue-500 hover:bg-blue-50 transition-all bullying-option {{ old('bullying_type') == $catClean ? 'border-blue-500 bg-blue-50' : '' }}">
                        <input type="radio" name="bullying_type" value="{{ $catClean }}" class="mt-1 w-5 h-5 text-blue-600" required {{ old('bullying_type') == $catClean ? 'checked' : '' }}>
                        <div class="ml-4 flex-1">
                            <div class="flex items-center mb-2">
                                <div class="w-12 h-12 bg-{{ $color }}-100 rounded-full flex items-center justify-center mr-3">
                                    <i class="fas {{ $icon }} text-2xl text-{{ $color }}-600"></i>
                                </div>
                                <div>
                                    <h3 class="font-bold text-gray-900">{{ $catClean }}</h3>
                                    <p class="text-sm text-gray-600">Sesuai dengan kategori perundungan</p>
                                </div>
                            </div>
                        </div>
                    </label>
                @endforeach
            </div>
        </div>


        
        <div class="dashboard-card p-6 bg-gradient-to-br from-white to-indigo-50">
            <h2 class="text-xl font-bold text-gray-900 mb-4 flex items-center">
                <i class="fas fa-id-card text-indigo-600 mr-2"></i>
                Identitas Pelapor
            </h2>
            <div class="grid md:grid-cols-2 gap-6">
                <div>
                    <label for="reporter_name" class="block text-gray-700 font-semibold mb-2">Nama Lengkap <span id="name_required_indicator" class="text-red-500">*</span></label>
                    <input 
                        type="text" 
                        class="w-full px-4 py-3 border-2 border-gray-200 rounded-lg focus:border-indigo-500 focus:outline-none transition bg-white" 
                        id="reporter_name" 
                        name="reporter_name" 
                        placeholder="Masukkan nama lengkap Anda"
                        value="{{ old('reporter_name') }}"
                        required
                    >
                </div>
                <div>
                    <label for="reporter_age" class="block text-gray-700 font-semibold mb-2">Umur (Tahun)</label>
                    <input 
                        type="number" 
                        class="w-full px-4 py-3 border-2 border-gray-200 rounded-lg focus:border-indigo-500 focus:outline-none transition bg-white" 
                        id="reporter_age" 
                        name="reporter_age" 
                        placeholder="Contoh: 15 atau 9"
                        min="1" 
                        max="99"
                        value="{{ old('reporter_age') }}"
                    >
                </div>
            </div>
            <div class="mt-4">
                <label class="block text-gray-700 font-semibold mb-2">Peran Pelapor</label>
                <div class="flex space-x-4">
                    <label class="flex items-center space-x-2 cursor-pointer">
                        <input type="radio" name="reporter_role" value="korban" class="w-5 h-5 text-indigo-600" required {{ old('reporter_role', 'korban') == 'korban' ? 'checked' : '' }}>
                        <span class="text-gray-700">Saya sebagai Korban</span>
                    </label>
                    <label class="flex items-center space-x-2 cursor-pointer">
                        <input type="radio" name="reporter_role" value="saksi" class="w-5 h-5 text-indigo-600" required {{ old('reporter_role') == 'saksi' ? 'checked' : '' }}>
                        <span class="text-gray-700">Saya sebagai Saksi</span>
                    </label>
                </div>
            </div>
        </div>

        
        <div class="dashboard-card p-6 bg-gradient-to-br from-white to-blue-50">
            <h2 class="text-xl font-bold text-gray-900 mb-4 flex items-center">
                <i class="fas fa-file-alt text-blue-600 mr-2"></i>
                Detail Kejadian
            </h2>
            
            <div class="space-y-4">
                <div>
                    <label for="description" class="block text-gray-700 font-semibold mb-2">Deskripsi Kejadian</label>
                    <textarea 
                        class="w-full px-4 py-3 border-2 border-gray-200 rounded-lg focus:border-blue-500 focus:outline-none transition min-h-[150px] resize-none bg-white font-medium" 
                        id="description" 
                        name="description" 
                        placeholder="Ceritakan detail kejadian bullying yang terjadi..."
                        required
                    >{{ old('description') }}</textarea>
                </div>
                
                <div class="grid md:grid-cols-2 gap-4">
                    <div>
                        <label for="location" class="block text-gray-700 font-semibold mb-2">Lokasi Kejadian</label>
                        <input 
                            type="text" 
                            class="w-full px-4 py-3 border-2 border-gray-200 rounded-lg focus:border-blue-500 focus:outline-none transition bg-white" 
                            id="location" 
                            name="location" 
                            placeholder="Contoh: Kelas 7A, Kantin Sekolah"
                            value="{{ old('location') }}"
                            required
                        >
                    </div>
                    
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label for="incident_date" class="block text-gray-700 font-semibold mb-2">Tanggal Kejadian</label>
                            <input 
                                type="date" 
                                class="w-full px-4 py-3 border-2 border-gray-200 rounded-lg focus:border-blue-500 focus:outline-none transition bg-white" 
                                id="incident_date" 
                                name="incident_date" 
                                value="{{ old('incident_date', date('Y-m-d')) }}"
                                max="{{ date('Y-m-d') }}"
                                required
                            >
                            <p class="text-[10px] text-gray-500 mt-1">Maksimal hari ini ({{ \Carbon\Carbon::now()->locale('id')->translatedFormat('d F Y') }})</p>
                        </div>
                        <div>
                            <label class="block text-gray-700 font-semibold mb-2">Waktu (Jam : Menit)</label>
                            <div class="flex items-center space-x-2">
                                <input 
                                    type="number" 
                                    name="incident_hour" 
                                    id="incident_hour"
                                    min="0" 
                                    max="23" 
                                    placeholder="HH"
                                    class="w-16 px-2 py-3 border-2 border-gray-200 rounded-lg text-center focus:border-blue-500 focus:outline-none"
                                    required
                                    value="{{ old('incident_hour') }}"
                                >
                                <span class="font-bold text-xl">:</span>
                                <input 
                                    type="number" 
                                    name="incident_minute" 
                                    id="incident_minute"
                                    min="0" 
                                    max="59" 
                                    placeholder="MM"
                                    class="w-16 px-2 py-3 border-2 border-gray-200 rounded-lg text-center focus:border-blue-500 focus:outline-none"
                                    required
                                    value="{{ old('incident_minute') }}"
                                >
                                <input type="hidden" name="incident_time" id="incident_time">
                            </div>
                            <p class="text-[10px] text-gray-500 mt-1">Gunakan format 24 Jam (00:00 - 23:59)</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Evidence Upload -->
        <div class="dashboard-card p-6 bg-gradient-to-br from-white to-green-50">
            <h2 class="text-xl font-bold text-gray-900 mb-4 flex items-center">
                <i class="fas fa-images text-green-600 mr-2"></i>
                Bukti Pendukung
            </h2>
            
            <div id="drop-zone" class="border-2 border-dashed border-gray-300 rounded-lg p-8 text-center hover:border-blue-500 transition bg-white">
                <i id="upload-icon" class="fas fa-cloud-upload-alt text-6xl text-gray-400 mb-4"></i>
                <div class="mb-4">
                    <button type="button" id="upload-button" class="px-6 py-3 bg-blue-600 text-white rounded-lg font-semibold hover:bg-blue-700 transition">
                        <i class="fas fa-upload mr-2"></i><span id="upload-btn-text">Pilih File</span>
                    </button>
                    <p class="text-gray-600 mt-2">atau tarik & drop file ke area ini</p>
                </div>
                <p class="text-sm text-gray-500 mt-2">Gambar (JPG, PNG, JFIF), Video, Audio, PDF</p>
                <p class="text-xs text-gray-400 mt-1">Maksimal 50MB per file, total 200MB</p>
                <input 
                    type="file" 
                    style="display: none;" 
                    id="evidence" 
                    name="evidence[]" 
                    accept=".jpg,.jpeg,.png,.jfif,.mp4,.mp3,.pdf,.wav,.mkv,.avi,.mov,.flac,.aac" 
                    multiple 
                    required
                    onchange="handleFileSelect(this.files)"
                >
            </div>
            
            <div id="file-list" class="mt-4 space-y-2 hidden">
               
            </div>
        </div>

        
        <div class="dashboard-card p-6 bg-gradient-to-br from-white to-purple-50">
            <div class="flex items-start">
                <input 
                    type="checkbox" 
                    class="w-5 h-5 text-blue-600 border-gray-300 rounded focus:ring-blue-500 mt-1" 
                    id="anonymous" 
                    name="anonymous"
                    {{ old('anonymous') ? 'checked' : '' }}
                >
                <label for="anonymous" class="ml-3">
                    <span class="font-semibold text-gray-900 block">
                        <i class="fas fa-user-secret text-purple-600 mr-2"></i>Laporkan secara anonim
                    </span>
                    <span class="text-sm text-gray-600">Identitas Anda akan dirahasiakan (wajib menyertakan bukti)</span>
                </label>
            </div>
        </div>

       
        <div class="flex justify-end space-x-4">
            <a href="{{ route('dashboard') }}" class="px-8 py-3 border-2 border-gray-300 text-gray-700 rounded-lg font-semibold hover:bg-gray-50 transition duration-200">
                Batal
            </a>
            <button 
                type="submit" 
                class="px-8 py-3 bg-blue-600 text-white rounded-lg font-semibold hover:bg-blue-700 transition duration-200 shadow-lg hover:shadow-xl"
            >
                <i class="fas fa-paper-plane mr-2"></i>
                Kirim Laporan
            </button>
        </div>
    </form>
</div>
@endsection

@section('scripts')
<script>
    console.log('=== REPORT FORM SCRIPT LOADED ===');
    
    
    const anonymousCheckbox = document.getElementById('anonymous');
    const reporterNameInput = document.getElementById('reporter_name');
    const nameRequiredIndicator = document.getElementById('name_required_indicator');

    function toggleNameRequirement() {
        if (anonymousCheckbox.checked) {
            reporterNameInput.required = false;
            reporterNameInput.placeholder = "Nama disembunyikan (Anonim)";
            reporterNameInput.value = "";
            reporterNameInput.disabled = true;
            reporterNameInput.classList.add('bg-gray-100');
            nameRequiredIndicator.classList.add('hidden');
        } else {
            reporterNameInput.required = true;
            reporterNameInput.placeholder = "Masukkan nama lengkap Anda";
            reporterNameInput.disabled = false;
            reporterNameInput.classList.remove('bg-gray-100');
            nameRequiredIndicator.classList.remove('hidden');
        }
    }

    anonymousCheckbox.addEventListener('change', toggleNameRequirement);
    toggleNameRequirement(); 


    
    const hourInput = document.getElementById('incident_hour');
    const minuteInput = document.getElementById('incident_minute');
    const hiddenTimeInput = document.getElementById('incident_time');

    function updateHiddenTime() {
        const hh = hourInput.value.padStart(2, '0');
        const mm = minuteInput.value.padStart(2, '0');
        if (hourInput.value !== "" && minuteInput.value !== "") {
            hiddenTimeInput.value = `${hh}:${mm}`;
        } else {
            hiddenTimeInput.value = "";
        }
    }

    hourInput.addEventListener('input', (e) => {
        if (e.target.value > 23) e.target.value = 23;
        if (e.target.value < 0) e.target.value = 0;
        updateHiddenTime();
    });

    minuteInput.addEventListener('input', (e) => {
        if (e.target.value > 59) e.target.value = 59;
        if (e.target.value < 0) e.target.value = 0;
        updateHiddenTime();
    });


    
    const incidentDateInput = document.getElementById('incident_date');

    function getLocalNow() {
        const d = new Date();
        return {
            date: d.getFullYear() + '-' + String(d.getMonth() + 1).padStart(2, '0') + '-' + String(d.getDate()).padStart(2, '0'),
            hour: d.getHours(),
            minute: d.getMinutes()
        };
    }

    
    function updateDateLimit() {
        const now = getLocalNow();
        incidentDateInput.max = now.date;
        if (!incidentDateInput.value) incidentDateInput.value = now.date;
    }
    updateDateLimit();

    function validateDateTime() {
        const now = getLocalNow();
        const selectedDate = incidentDateInput.value;
        const hh = hourInput.value !== "" ? parseInt(hourInput.value) : null;
        const mm = minuteInput.value !== "" ? parseInt(minuteInput.value) : null;

        
        hourInput.classList.remove('border-red-500', 'bg-red-50');
        minuteInput.classList.remove('border-red-500', 'bg-red-50');

        if (selectedDate === now.date) {
            
            hourInput.max = now.hour;
            
            if (hh !== null && hh === now.hour) {
                minuteInput.max = now.minute;
            } else {
                minuteInput.max = 59;
            }

            
            if (hh !== null && (hh > now.hour || (hh === now.hour && mm !== null && mm > now.minute))) {
                
                hourInput.classList.add('border-red-500', 'bg-red-50');
                if (mm !== null && mm > now.minute && hh === now.hour) {
                    minuteInput.classList.add('border-red-500', 'bg-red-50');
                }
            }
        } else {
          
            hourInput.max = 23;
            minuteInput.max = 59;
        }

      
        if (hourInput.value !== "" && minuteInput.value !== "") {
            hiddenTimeInput.value = `${hourInput.value.padStart(2, '0')}:${minuteInput.value.padStart(2, '0')}`;
        } else {
            hiddenTimeInput.value = "";
        }
    }


    setInterval(updateDateLimit, 60000);

    incidentDateInput.addEventListener('change', validateDateTime);
    hourInput.addEventListener('input', validateDateTime);
    minuteInput.addEventListener('input', validateDateTime);


    
    const dropZone = document.getElementById('drop-zone');
    const uploadButton = document.getElementById('upload-button');
    const fileInput = document.getElementById('evidence');
    const fileListContainer = document.getElementById('file-list');
    const uploadIcon = document.getElementById('upload-icon');
    
    console.log('Upload elements:', {
        dropZone: !!dropZone,
        uploadButton: !!uploadButton,
        fileInput: !!fileInput,
        fileListContainer: !!fileListContainer,
        uploadIcon: !!uploadIcon
    });
    
    let allFiles = []; 

    if (uploadButton && fileInput) {
        uploadButton.addEventListener('click', function(e) {
            e.preventDefault();
            e.stopPropagation();
            console.log('Upload button clicked');
            fileInput.click();
        });
        console.log('Upload button event listener attached');
    } else {
        console.error('Upload button or file input not found!');
    }

    ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
        dropZone.addEventListener(eventName, preventDefaults, false);
    });

    function preventDefaults(e) {
        e.preventDefault();
        e.stopPropagation();
    }

    ['dragenter', 'dragover'].forEach(eventName => {
        dropZone.addEventListener(eventName, () => dropZone.classList.add('border-blue-500', 'bg-blue-50'), false);
    });

    ['dragleave', 'drop'].forEach(eventName => {
        dropZone.addEventListener(eventName, () => dropZone.classList.remove('border-blue-500', 'bg-blue-50'), false);
    });

    dropZone.addEventListener('drop', (e) => {
        console.log('Files dropped');
        const dt = e.dataTransfer;
        const files = dt.files;
        handleFileSelect(files);
    }, false);

    window.handleFileSelect = function(files) {
        console.log('Handling files:', files.length);
        const newFiles = Array.from(files);
        let currentTotalSize = allFiles.reduce((acc, f) => acc + f.size, 0);
        
        const allowedExtensions = ['jpg', 'jpeg', 'png', 'jfif', 'mp4', 'mp3', 'pdf', 'wav', 'mkv', 'avi', 'mov', 'flac', 'aac'];
        const maxFileSize = 50 * 1024 * 1024; // 50MB
        const maxTotalSize = 200 * 1024 * 1024; // 200MB

        newFiles.forEach(file => {
            const ext = file.name.split('.').pop().toLowerCase();
            
            if (!allowedExtensions.includes(ext)) {
                alert(`File "${file.name}" tidak didukung. Harap hanya lampirkan Gambar (termasuk .jfif), Video, Audio, atau PDF.`);
                return;
            }

            if (file.size > maxFileSize) {
                alert(`File "${file.name}" terlalu besar (Max 50MB).`);
                return;
            }

            if (currentTotalSize + file.size > maxTotalSize) {
                alert("Total ukuran file melebihi 200MB. Silakan hapus beberapa file.");
                return;
            }

           
            const isDuplicate = allFiles.some(f => f.name === file.name && f.size === file.size && f.lastModified === file.lastModified);
            if (!isDuplicate) {
                allFiles.push(file);
                currentTotalSize += file.size;
            }
        });

        updateFileInput();
        renderFileList();
    }

    window.removeFile = function(index) {
        allFiles.splice(index, 1);
        updateFileInput();
        renderFileList();
    }

    function updateFileInput() {
        const dataTransfer = new DataTransfer();
        allFiles.forEach(file => dataTransfer.items.add(file));
        fileInput.files = dataTransfer.files;

        const btnText = document.getElementById('upload-btn-text');

        
        if (allFiles.length > 0) {
            uploadIcon.className = 'fas fa-check-circle text-6xl text-green-500 mb-4';
            if (btnText) btnText.innerText = `${allFiles.length} File Terpilih`;
            uploadButton.className = 'px-6 py-3 bg-green-600 text-white rounded-lg font-semibold hover:bg-green-700 transition shadow-lg';
        } else {
            uploadIcon.className = 'fas fa-cloud-upload-alt text-6xl text-gray-400 mb-4';
            if (btnText) btnText.innerText = 'Pilih File';
            uploadButton.className = 'px-6 py-3 bg-blue-600 text-white rounded-lg font-semibold hover:bg-blue-700 transition shadow-lg';
        }
    }

    function renderFileList() {
        if (allFiles.length > 0) {
            fileListContainer.innerHTML = '';
            fileListContainer.classList.remove('hidden');
            allFiles.forEach((file, index) => {
                const div = document.createElement('div');
                div.className = 'flex items-center justify-between bg-white p-3 rounded-lg border border-gray-100 text-sm hover:border-blue-200 transition group';
                div.innerHTML = `
                    <div class="flex items-center">
                        <i class="fas ${getFileWeightIcon(file.name)} mr-3 text-blue-500"></i>
                        <span class="truncate max-w-[250px] font-medium text-gray-700">${file.name}</span>
                    </div>
                    <div class="flex items-center space-x-4">
                        <span class="text-xs text-gray-400 font-mono">${(file.size / (1024 * 1024)).toFixed(2)} MB</span>
                        <button type="button" onclick="removeFile(${index})" class="remove-file text-red-400 hover:text-red-600 p-1 opacity-0 group-hover:opacity-100 transition">
                            <i class="fas fa-times-circle"></i>
                        </button>
                    </div>
                `;
                fileListContainer.appendChild(div);
            });
        } else {
            fileListContainer.classList.add('hidden');
        }
    }

    function getFileWeightIcon(filename) {
        const ext = filename.split('.').pop().toLowerCase();
        if (['jpg', 'jpeg', 'png', 'jfif'].includes(ext)) return 'fa-image';
        if (['mp4', 'mov', 'mkv', 'avi'].includes(ext)) return 'fa-video';
        if (['mp3', 'wav', 'flac', 'aac'].includes(ext)) return 'fa-volume-up';
        if (ext === 'pdf') return 'fa-file-pdf';
        return 'fa-file';
    }


   
    document.querySelector('form').addEventListener('submit', function(e) {
        updateHiddenTime();
        if (!hiddenTimeInput.value) {
            alert("Silakan isi waktu kejadian dengan lengkap.");
            e.preventDefault();
            return;
        }

        const now = getLocalNow();
        const selectedDate = incidentDateInput.value;
        const hh = parseInt(hourInput.value);
        const mm = parseInt(minuteInput.value);

        if (selectedDate > now.date || (selectedDate === now.date && (hh > now.hour || (hh === now.hour && mm > now.minute)))) {
            alert("Maaf, waktu kejadian tidak boleh melampaui waktu sekarang.");
            e.preventDefault();
            return;
        }

        const confirmed = confirm("PENTING: Pastikan laporan Anda benar. Segala bentuk manipulasi atau laporan palsu akan dikenakan sanksi sesuai aturan sekolah. Apakah Anda yakin ingin mengirim laporan ini?");
        if (!confirmed) {
            e.preventDefault();
        }
    });

    
    document.querySelectorAll('input[name="bullying_type"]').forEach(radio => {
        radio.addEventListener('change', function() {
           
            document.querySelectorAll('.bullying-option').forEach(option => {
                option.classList.remove('border-blue-500', 'bg-blue-50');
            });
            
            if (this.checked) {
                this.closest('.bullying-option').classList.add('border-blue-500', 'bg-blue-50');
            }
        });
    });
</script>
@endsection
