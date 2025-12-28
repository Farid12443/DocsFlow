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
        <header class="flex flex-col sticky top-0 py-6 px-8 bg-[#FFFFFF]">
            <h1 class="text-[30px] font-[600] text-gray-800">judul</h1>
            <span>subjurl</span>
        </header>

        <section class="p-8">
            {{ $slot }}
        </section>
    </main>


    <x-modal-logout />

    <script src="{{ asset('js/sidebar.js') }}"></script>
    <script src="{{ asset('js/modalLogout.js') }}"></script>
</body>

</html>