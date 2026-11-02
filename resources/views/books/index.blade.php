<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Daftar Buku') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                
                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1.5rem;">
                    <h3 class="text-lg font-medium text-gray-900">Daftar Buku Perpustakaan</h3>
                    
                    @hasanyrole('Admin|Dosen')
                        <a href="{{ route('books.create') }}" style="background-color: #2563eb; color: #ffffff; font-weight: bold; padding: 0.5rem 1rem; border-radius: 0.375rem; text-decoration: none;">
                            + Tambah Buku
                        </a>
                    @endhasanyrole
                </div>

                <div class="divide-y divide-gray-200">
                    @forelse($books as $book)
                        <div style="padding: 1rem 0; display: flex; justify-content: space-between; align-items: center; border-bottom: 1px solid #e5e7eb;">
                            <div>
                                <h4 style="font-weight: bold; color: #1f2937; font-size: 1rem;">{{ $book->title }}</h4>
                                <p style="font-size: 0.875rem; color: #6b7280;">Penulis: {{ $book->author }}</p>
                            </div>
                            
                            <div style="display: flex; gap: 1rem; align-items: center;">
                                @hasanyrole('Admin|Dosen')
                                    <a href="{{ route('books.edit', $book->id) }}" style="color: #4f46e5; font-weight: 500; text-decoration: none;">Edit</a>
                                @endhasanyrole

                                @role('Admin')
                                    <form action="{{ route('books.destroy', $book->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Yakin ingin menghapus buku ini?');">
                                        @csrf 
                                        @method('DELETE')
                                        <button type="submit" style="color: #dc2626; font-weight: 500; background: none; border: none; cursor: pointer; padding: 0;">Hapus</button>
                                    </form>
                                @endrole
                            </div>
                        </div>
                    @empty
                        <p style="padding: 1rem 0; text-align: center; color: #6b7280;">Belum ada data buku.</p>
                    @endforelse
                </div>

            </div>
        </div>
    </div>
</x-app-layout>