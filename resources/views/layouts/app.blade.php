<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>

    @vite('resources/css/app.css')
    <style>
        .nav-item {
            transition: all 0.3s ease;
        }

        .nav-item:hover {
            background-color: rgba(34, 197, 94, 0.1);
            transform: translateX(5px);
        }

        .dropdown-content {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.3s ease;
        }

        .dropdown-content.open {
            max-height: 200px;
        }

        .icon {
            color: #22c55e;
        }

        .sidebar-loading .dropdown-content {
            transition: none !important;
        }

        .sidebar-loading .chevron-down {
            transition: none !important;
        }
    </style>
</head>

<body class="grid grid-cols-6 sidebar-loading">

    <x-sidebar />
    <main id="main" class="col-span-5 h-screen overflow-y-auto">
        <header class="sticky top-0 z-40 bg-white/90 backdrop-blur border-b border-gray-200">

            <div class="px-8 py-5 flex flex-col gap-2">

                <div class="flex items-center justify-between">

                    <div class="flex items-center gap-4">
                        <div class="p-3 rounded-xl bg-green-50 text-green-600">
                            {{ $svg }}
                        </div>

                        <div>
                            <h1 class="text-2xl font-semibold text-gray-800">
                                {{ $judul}}
                            </h1>
                            <p class="text-sm text-gray-500">
                                {{ $subjudul }}
                            </p>
                        </div>
                    </div>

                </div>

                {{-- <!-- BREADCRUMB -->
                <nav class="mt-4 text-sm text-gray-600">
                    <ol class="flex space-x-2">
                        <li><a href="#" class="hover:text-blue-600 transition duration-200">Home</a></li>
                        <li class="text-gray-400">></li>
                        <li><a href="#" class="hover:text-blue-600 transition duration-200">Admin</a></li>
                        <li class="text-gray-400">></li>
                        <li class="text-gray-800 font-medium">Dokumen</li>
                    </ol>
                </nav> --}}

            </div>
        </header>


        <section class="m-8">
            {{ $slot }}
        </section>
    </main>

    <x-modal-logout />

    <script src="{{ asset('js/sidebar.js') }}"></script>
    <script src="{{ asset('js/modalLogout.js') }}"></script>
</body>

</html>