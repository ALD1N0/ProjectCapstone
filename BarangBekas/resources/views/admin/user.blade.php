@extends('mainlayouta')

@section('maincontent')

<head>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen p-6 mx-auto mt-16">

    <div class="max-w-6xl mx-auto">

        {{-- Flash message jika ada --}}
        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4">
                {{ session('success') }}
            </div>
        @endif

        {{-- Search Bar --}}
        <div class="mb-6">
            <form action="{{ route('user.search') }}" method="GET" class="flex space-x-2">
                <input
                    type="text"
                    name="query"
                    placeholder="Cari toko..."
                    class="w-full px-4 py-3 rounded-xl shadow-sm border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    value="{{ request('query') }}"
                />
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-xl shadow-sm hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    Cari
                </button>
            </form>
        </div>

        {{-- Daftar Toko --}}
        <div class="space-y-4">
            @if ($users->count() > 0)
                @foreach ($users as $user)
                    <div class="bg-white shadow-md p-4 rounded-full flex items-center justify-between">
                        <div class="flex items-center space-x-4">
                            <img src="{{ asset($user->foto ?? 'https://via.placeholder.com/60') }}" alt="Toko" class="w-14 h-14 rounded-full object-cover border border-gray-300">
                            <div>
                                <h2 class="text-lg font-semibold text-gray-800">{{ $user->username }}</h2>
                                <p class="text-sm text-gray-500">{{ $user->name }}</p>
                            </div>
                        </div>

                        {{-- Tombol --}}
                        <div class="flex space-x-2">
                            {{-- Lihat Profil --}}
                            <button onclick="window.location.href='{{ route('toko', $user->id) }}'" class="bg-blue-500 text-white px-4 py-2 rounded-full hover:bg-blue-600 text-sm">
                                Lihat Profil
                            </button>

                            {{-- Hapus User --}}
                            <form action="{{ route('user.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus user ini beserta produknya?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-full hover:bg-red-600 text-sm">
                                    Hapus User
                                </button>
                            </form>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="text-center py-10 text-gray-600">
                    <p class="mb-4">Tidak ada toko ditemukan.</p>
                    {{-- Tombol Kembali --}}
                    <button onclick="history.back()" class="bg-gray-300 text-gray-800 px-6 py-2 rounded-full hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-500 text-base">
                        Kembali
                    </button>
                </div>
            @endif
        </div>
    </div>
</body>

@endsection