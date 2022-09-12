@extends('admin.layouts.main')

@section('content')
<div class="flex flex-col p-6 mt-4 rounded-3xl bg-gray-100 ">
    <div class="text-lg font-bold text-primary mb-4">Data Pengerjaan Tantangan</div>
    <div class="grid grid-cols-2 gap-4">
        <div>
            <div class="mb-2">
                <p class="text-sm text-gray-700">ID User</p>
                <p class="font-semibold text-primary">{{ $c->user->id }}</p>
            </div>
        
            <div class="mb-2">
                <p class="text-sm text-gray-700">Nama</p>
                <p class="font-semibold text-primary">{{ $c->user->name }}</p>
            </div>
        
            <div class="mb-2">
                <p class="text-sm text-gray-700">Judul Tantangan</p>
                <p class="font-semibold text-primary">{{ $c->challenge->judul }}</p>
            </div>
        
            <div class="mb-2">
                <p class="text-sm text-gray-700">Status</p>
                @if ($c->status == 0)
                    <div class="badge badge-error text-white">Belum Mengerjakan</div></td>
                    @else
                        @if ($c->status == 1)
                            <div class="badge badge-primary text-white">Belum Diperiksa</div></td>
                        @else 
                        @if ($c->status == 2)
                            <div class="badge badge-success text-white">Selesai</div></td>
                            @else 
                            @if ($c->status == 3)
                            <div class="badge badge-error text-white">Perbaikan</div></td>
                            @endif
                        @endif
                        @endif
                @endif
            </div>
        </div>

        <div>
            <div class="mb-2">
                <p class="text-sm text-gray-700">File Evaluasi</p>
                <a href="/admin/challenge/detail/download/{{ $c->id }}" class="btn btn-sm btn-info rounded-lg normal-case text-white shadow-lg">
                    <div class="flex">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                          </svg>
                        <p>Download</p> 
                    </div>
                </a>
            </div>

            <form action="/admin/challenge/update" method="POST" class="mb-2">
                <p class="text-sm text-gray-700">Nilai</p>
                @csrf
                    <div class="form-control w-24 max-w-xs">
                        <input name="nilai" type="number" maxlength="100" placeholder="0" class="input input-bordered shadow-lg @error('nilai') input-error @enderror" required value="{{ $c->score }}" />
                        @error('nilai')
                        <p class="my-2 text-sm text-red-400">{{ $message }}</p>
                        @enderror
                    </div>
                    <input type="hidden" name="c_id" value="{{ $c->id }}">
                    <textarea class="textarea textarea-bordered mt-4" name="comment" placeholder="Komentar">{{ $c->comment }}</textarea>
                    <input type="submit" class="btn btn-primary mt-6 text-white normal-case w-full" value="Update Nilai">
            </form>
        </div>
    </div>
    
</div>
@endsection