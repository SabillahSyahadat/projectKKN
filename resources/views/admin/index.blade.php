<x-layout>
    <x-slot:title>Dashboard Administrator</x-slot:title>

    <div id="react-dashboard" data-props='@json(["countWarga" => $countWarga, "countBerita" => $countBerita])'></div>

    {{-- Script Vite untuk memuat React --}}
    @viteReactRefresh
    @vite('resources/js/app.jsx')

    {{-- Sisa konten Blade lainnya --}}
    <div class="row g-4">
        {{-- Tabel atau log sistem tetap di sini --}}
    </div>
</x-layout>