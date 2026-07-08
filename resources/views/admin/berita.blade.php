<x-layout>
    <x-slot:title>Berita Desa Sidomulyo</x-slot:title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- Container utama untuk React --}}
    <div id="react-news-list" data-props='@json([
        "beritas" => $beritas, 
        "addRoute" => route("addBerita"),
        "storagePath" => asset("storage/")
    ])'>
        {{-- Placeholder sederhana saat loading --}}
        <div class="row g-4 mt-4">
            <div class="col-md-4 placeholder-glow"><div class="placeholder col-12" style="height: 300px; border-radius: 24px;"></div></div>
            <div class="col-md-4 placeholder-glow"><div class="placeholder col-12" style="height: 300px; border-radius: 24px;"></div></div>
            <div class="col-md-4 placeholder-glow"><div class="placeholder col-12" style="height: 300px; border-radius: 24px;"></div></div>
        </div>
    </div>

    {{-- Integrasi Vite --}}
    @viteReactRefresh
    @vite('resources/js/app.jsx')
</x-layout>