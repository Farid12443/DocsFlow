<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>{{ $title ?? 'User Panel' }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100 text-gray-800">

    <div class="min-h-screen flex">

        {{-- Sidebar --}}
        <aside class="w-64 bg-white border-r hidden md:flex flex-col sticky top-0 h-screen">
            {{-- Logo --}}
            <div class="p-6 pb-7 border-b">
                <div class="flex items-center gap-2 font-bold text-lg text-blue-600">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24" class="w-6 h-6">
                        <path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm0 16H5V5h14v14zm-5.04-6.71l-2.75 3.54h2.63v2.17h-6v-2.17h2.77L6.5 6.75h2.73l3.15 4.07 3.15-4.07h2.73l-4.3 5.54z"/>
                    </svg>
                    <span>Dokumen App</span>
                </div>
            </div>

            {{-- Navigation --}}
            <nav class="flex-1 px-4 py-4 space-y-2">
                <a href="/user/dashboard"
                    class="flex items-center gap-3 px-4 py-2 rounded-lg hover:bg-blue-50 text-gray-700 transition duration-200">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 13.125C3 12.504 3.504 12 4.125 12h2.25m0 0H5.25m1.125 0H9m11.25 0h2.25m0 0H19.5m0 0h1.125c.621 0 1.125.504 1.125 1.125M3 13.125v6.75C3 20.496 3.504 21 4.125 21h15.75c.621 0 1.125-.504 1.125-1.125v-6.75m0 0v-1.5C21 9.504 20.496 9 19.875 9m1.125 0H15m-10.5 0h2.25m0 0H7.5M9 15h6m0 0h1.125c.621 0 1.125.504 1.125 1.125M9 15v2.25C9 17.496 9.504 18 10.125 18h3.75c.621 0 1.125-.504 1.125-1.125V15" />
                    </svg>
                    <span>Dashboard</span>
                </a>

                <a href="/user/dokumen"
                    class="flex items-center gap-3 px-4 py-2 rounded-lg hover:bg-blue-50 text-gray-700 transition duration-200">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h3.75M9 15h3.75M9 18h3.75m3-8.25H15a2.25 2.25 0 012.25 2.25v6.75H21V9a2.25 2.25 0 00-2.25-2.25H15M9 3v1.5m0 5.25v1.5m0 5.25v1.5" />
                    </svg>
                    <span>Semua Dokumen</span>
                </a>

                <a href="/user/dokumen-saya"
                    class="flex items-center gap-3 px-4 py-2 rounded-lg hover:bg-blue-50 text-gray-700 transition duration-200">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.734 20.84a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z" />
                    </svg>
                    <span>Dokumen Saya</span>
                </a>
            </nav>

            {{-- Logout --}}
            <div class="p-4 border-t">
                <form action="/logout" method="POST" class="w-full">
                    @csrf
                    <button type="submit" class="w-full flex items-center justify-between gap-3 px-4 py-2 rounded-lg bg-red-500 text-white hover:bg-red-600 transition duration-200">
                        <span class="flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15m3 0l3-3m0 0l-3-3m3 3H9" />
                            </svg>
                            <span>Logout</span>
                        </span>
                    </button>
                </form>
            </div>
        </aside>

        {{-- Main Content --}}
        <div class="flex-1 flex flex-col">

            {{-- Topbar --}}
            <header class="bg-white border-b px-6 py-4 flex items-center justify-between">
                <div>
                    <h1 class="text-lg font-semibold">
                        {{ $judul ?? 'Dashboard' }}
                    </h1>
                    <p class="text-sm text-gray-500">
                        {{ $subjudul ?? 'Panel pengguna' }}
                    </p>
                </div>

                {{-- User Info --}}
                <div class="flex items-center gap-3">
                    <div class="text-right text-sm">
                        <p class="font-medium">{{ auth()->user()->nama ?? 'User' }}</p>
                        <p class="text-gray-500">Pengguna</p>
                    </div>

                    <img src="https://ui-avatars.com/api/?name=User" class="w-9 h-9 rounded-full border">
                </div>
            </header>

            {{-- Page Content --}}
            <main class="p-6 flex-1">
                {{ $slot }}
            </main>

        </div>
    </div>

</body>

</html>