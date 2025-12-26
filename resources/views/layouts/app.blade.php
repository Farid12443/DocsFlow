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
    </style>
</head>

<body class="grid grid-cols-6">

    <x-sidebar />

    <div class="p-8 col-span-5">
        {{ $slot }}
    </div>

    <x-modal-logout />

    <script src="{{ asset('js/sidebar.js') }}"></script>
    <script src="{{ asset('js/modalLogout.js') }}"></script>
</body>

</html>