@extends(Auth::user()->isAdmin() ? 'layouts.admin' : 'layouts.app')

@section('title', 'Chat Konsultasi - StopBullying')

@section('content')
<div class="{{ Auth::user()->isAdmin() ? '' : 'container mx-auto px-4 py-8' }}">
    <div class="{{ Auth::user()->isAdmin() ? '' : 'max-w-4xl mx-auto' }}">
        <!-- Header -->
        <div class="mb-6 flex justify-between items-center">
            <div>
                <a href="{{ Auth::user()->isAdmin() ? route('admin.consultations') : route('consultation.index') }}" class="text-blue-600 hover:text-blue-800 mb-2 inline-block">
                    <i class="fas fa-arrow-left mr-1"></i> Kembali
                </a>
                <h1 class="text-2xl font-bold text-gray-800">
                    @if(Auth::user()->isAdmin())
                        Chat dengan 
                        @if($consultation->anonymous)
                            <span class="text-gray-500 italic"><i class="fas fa-user-secret mr-1"></i>Anonymous</span>
                        @else
                            <span class="text-blue-600">{{ $consultation->user->username ?? 'User Terhapus' }}</span>
                        @endif
                    @else
                        Konsultasi #{{ $consultation->id }}
                    @endif
                </h1>
                <p class="text-xs text-gray-500 mt-1">Dibuat pada {{ $consultation->created_at->format('d M Y, H:i') }}</p>
            </div>
            
            @if($consultation->anonymous && Auth::user()->isAdmin())
                <div class="px-3 py-1 bg-gray-100 rounded-full text-xs font-semibold text-gray-600">
                    <i class="fas fa-mask mr-1"></i> Mode Anonim
                </div>
            @endif
        </div>

        <!-- Chat Area -->
        <div class="bg-gray-50 rounded-xl shadow-lg border border-gray-200 overflow-hidden flex flex-col h-[600px]">
            <!-- Messages List -->
            <div class="flex-1 overflow-y-auto p-6 space-y-4" id="chatContainer">
                <!-- Initial Message (The 'Thread' Starter) -->
                @php
                    // Determine if the initial message is from 'user' (it always is)
                    // If current viewer is Admin, the initial message is from 'Other'.
                    // If current viewer is User, the initial message is from 'Me'.
                    $isMe = $consultation->user_id === Auth::id();
                @endphp
                <div class="flex flex-col {{ $isMe ? 'items-end' : 'items-start' }}">
                    <div class="max-w-[80%] {{ $isMe ? 'bg-blue-600 text-white rounded-br-none' : 'bg-white border border-gray-200 text-gray-800 rounded-bl-none' }} rounded-2xl px-4 py-3 shadow-sm">
                        <p class="text-sm">{{ $consultation->message }}</p>
                    </div>
                    <span class="text-[10px] text-gray-500 mt-1 mx-2">
                        {{ $isMe ? 'Anda' : ($consultation->anonymous ? 'Anonymous' : ($consultation->user->username ?? 'User')) }} • {{ $consultation->created_at->format('H:i') }}
                    </span>
                </div>

                <!-- Replies -->
                @foreach($consultation->replies as $reply)
                    @php
                        $isReplyMine = $reply->user_id === Auth::id();
                        $isAdmin = $reply->user && $reply->user->isAdmin();
                        
                        // Name logic
                        $displayName = 'User';
                        if ($isReplyMine) {
                            $displayName = 'Anda';
                        } elseif ($isAdmin) {
                            $displayName = 'Admin';
                        } else {
                            // If it's the other party
                            if ($consultation->anonymous && Auth::user()->isAdmin()) {
                                $displayName = 'Anonymous';
                            } else {
                                $displayName = $reply->user->username ?? 'User';
                            }
                        }
                    @endphp
                    <div class="flex flex-col {{ $isReplyMine ? 'items-end' : 'items-start' }}">
                        <div class="max-w-[80%] {{ $isReplyMine ? 'bg-blue-600 text-white rounded-br-none' : ($isAdmin ? 'bg-purple-100 border border-purple-200 text-purple-900 rounded-bl-none' : 'bg-white border border-gray-200 text-gray-800 rounded-bl-none') }} rounded-2xl px-4 py-3 shadow-sm">
                            <p class="text-sm whitespace-pre-wrap">{{ $reply->message }}</p>
                        </div>
                        <span class="text-[10px] text-gray-500 mt-1 mx-2">
                            {{ $displayName }} • {{ $reply->created_at->format('H:i') }}
                        </span>
                    </div>
                @endforeach
            </div>

            <!-- Input Area -->
            <div class="bg-white p-4 border-t border-gray-200">
                <form action="{{ route('consultation.reply', $consultation->id) }}" method="POST" class="flex gap-2">
                    @csrf
                    <input type="text" name="message" required placeholder="Ketik balasan Anda..." class="flex-1 bg-gray-100 border-0 rounded-full px-5 py-3 focus:ring-2 focus:ring-blue-500 focus:bg-white transition text-sm">
                    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white rounded-full w-12 h-12 flex items-center justify-center flex-shrink-0 shadow-md transition-all transform hover:scale-105">
                        <i class="fas fa-paper-plane"></i>
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    // Auto-scroll to bottom
    const chatContainer = document.getElementById('chatContainer');
    chatContainer.scrollTop = chatContainer.scrollHeight;
</script>
@endsection
