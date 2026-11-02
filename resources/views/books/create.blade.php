<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Buku') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                
                <form action="{{ route('books.store') }}" method="POST">
                    @csrf
                    
                    <div style="margin-bottom: 1rem;">
                        <label style="display: block; font-weight: bold; margin-bottom: 0.5rem; color: #374151;">Judul Buku</label>
                        <input type="text" name="title" style="width: 100%; padding: 0.5rem; border: 1px solid #d1d5db; border-radius: 0.375rem;" required>
                    </div>

                    <div style="margin-bottom: 1.5rem;">
                        <label style="display: block; font-weight: bold; margin-bottom: 0.5rem; color: #374151;">Penulis</label>
                        <input type="text" name="author" style="width: 100%; padding: 0.5rem; border: 1px solid #d1d5db; border-radius: 0.375rem;" required>
                    </div>

                    <div style="display: flex; justify-content: space-between; align-items: center; margin-top: 1rem;">
                        <button type="submit" style="background-color: #2563eb; color: #ffffff; font-weight: bold; padding: 0.5rem 1rem; border-radius: 0.375rem; border: none; cursor: pointer;">
                            Simpan
                        </button>
                        <a href="{{ route('books.index') }}" style="color: #4b5563; text-decoration: underline;">Kembali</a>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>