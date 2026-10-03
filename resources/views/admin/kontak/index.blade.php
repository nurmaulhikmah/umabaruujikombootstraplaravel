@extends('layouts.admin')

@section('content')
<div class="container-fluid px-0">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold text-dark mb-0">Pesan Masuk</h2>
        
        <div class="d-flex align-items-center gap-3">
            @if($unreadCount > 0)
                <span class="badge bg-danger rounded-pill px-3 py-2 fw-normal" style="font-size: 13px;">
                    {{ $unreadCount }} belum terbaca
                </span>
            @endif
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show rounded-3 mb-4" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="d-flex flex-column gap-3 w-100">
        @forelse($messages as $msg)
            <div class="card border-0 shadow-sm rounded-4 position-relative overflow-hidden cursor-pointer w-100" 
                 style="background-color: #ffffff; transition: transform 0.2s;"
                 data-bs-toggle="modal" 
                 data-bs-target="#emailModal{{ $msg->id }}">
                
                <div class="card-body p-3 p-md-4 d-flex align-items-center justify-content-between">
                    <div class="d-flex align-items-center gap-3 flex-grow-1 overflow-hidden">
                        
                        <div class="position-relative flex-shrink-0" style="width: 52px; height: 52px;">
                            <div class="bg-dark text-white rounded-circle d-flex align-items-center justify-content-center fw-bold w-100 h-100" 
                                 style="font-size: 20px;">
                                {{ strtoupper(substr($msg->nama ?? $msg->email, 0, 1)) }}
                            </div>
                            
                            @if(!$msg->is_read)
                                <span class="position-absolute rounded-circle border border-white" 
                                      style="width: 14px; height: 14px; background-color: #001E6B; top: 2px; right: 2px;">
                                </span>
                            @endif
                        </div>

                        <div class="overflow-hidden me-3">
                            <h6 class="fw-bold mb-1 text-dark" style="font-size: 16px;">{{ $msg->email }}</h6>
                            <p class="text-secondary mb-0 small text-truncate">
                                {{ $msg->pesan }}
                            </p>
                        </div>
                    </div>

                    <div class="text-end flex-shrink-0 ms-2">
                        <span class="text-muted small" style="font-size: 13px;">
                            {{ $msg->created_at->diffForHumans() }}
                        </span>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="emailModal{{ $msg->id }}" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content border-0 rounded-4 shadow-lg" style="background-color: #e5e5e5;">
        
                        <div class="p-3 d-flex align-items-center justify-content-between border-bottom bg-transparent">
                            <div class="d-flex align-items-center gap-3">
                                <button type="button" class="btn btn-sm p-0 border-0 text-dark" data-bs-dismiss="modal" title="Kembali">
                                    <i class="bi bi-arrow-left fs-4"></i>
                                </button>
                                <form action="{{ route('admin.kontak.destroy', $msg->id) }}" method="POST" onsubmit="return confirm('Hapus pesan ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm p-0 border-0 text-dark" title="Hapus">
                                        <i class="bi bi-trash fs-5"></i>
                                    </button>
                                </form>
                                <form action="{{ route('admin.kontak.toggleRead', $msg->id) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="btn btn-sm p-0 border-0 text-dark" title="Tandai Status">
                                        <i class="bi bi-envelope fs-5"></i>
                                    </button>
                                </form>
                            </div>
                        </div>

                        <div class="modal-body p-4 p-md-5">
                    
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <div class="d-flex align-items-center gap-3">
                                    <div class="bg-dark text-white rounded-circle d-flex align-items-center justify-content-center fw-bold" 
                                         style="width: 52px; height: 52px; font-size: 20px;">
                                        {{ strtoupper(substr($msg->nama ?? $msg->email, 0, 1)) }}
                                    </div>
                                    <div>
                                        <h5 class="fw-bold mb-0 text-dark" style="font-size: 18px;">{{ $msg->email }}</h5>
                                        <small class="text-secondary">kepada <strong>Admin SMK Negeri 4 Bogor</strong></small>
                                    </div>
                                </div>
                                <span class="text-muted small">{{ $msg->created_at->diffForHumans() }}</span>
                            </div>

                            <div class="mb-5 text-dark fs-6" style="white-space: pre-line; line-height: 1.7; font-size: 15px;">
                                {{ $msg->pesan }}
                            </div>

                            <form action="{{ route('admin.kontak.reply', $msg->id) }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label class="form-label fw-bold text-dark">Balas pesan</label>
                                    <textarea name="balasan" class="form-control rounded-3 p-3 border-secondary-subtle" rows="3" placeholder="Tulis balasan disini......" required></textarea>
                                </div>
                                <button type="submit" class="btn px-4 py-2 rounded-3 text-white fw-semibold" style="background-color: #001E6B;">
                                    Kirim balasan
                                </button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>

        @empty
            <div class="card border-0 shadow-sm rounded-4 p-5 text-center text-muted w-100">
                Belum ada pesan masuk.
            </div>
        @endforelse
    </div>
</div>
@endsection