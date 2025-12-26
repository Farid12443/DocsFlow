<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Docflow</title>

    @vite('resources/css/app.css')
</head>

<body class="min-h-screen flex">

    <div class="w-full flex items-center justify-center bg-gray-100">
        <div class="w-[500px] rounded-xl shadow-lg space-y-6 bg-white p-12">

            <div>
                <h1 class="text-3xl font-bold text-gray-900">
                    Manage documents easily from now on!
                </h1>
                <p class="text-gray-500 mt-2">
                    Get started for free today!
                </p>
            </div>

            <form action="/register" method="POST" class="space-y-4">
                @csrf
                @method('post')

                <div>
                    <label class="text-sm font-medium text-gray-700">Name *</label>
                    <input type="text" name="nama" value="{{ old('nama') }}"
                        class="w-full mt-1 px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500" />
                    @error('nama')
                        <div class="text-red-900">{{$message}}</div>
                    @enderror
                </div>

                <div>
                    <label class="text-sm font-medium text-gray-700">Work Email *</label>
                    <input type="email" name="email" value="{{ old('email') }}"
                        class="w-full mt-1 px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500" />
                    @error('email')
                        <div class="text-red-900">{{$message}}</div>
                    @enderror
                </div>

                <div>
                    <label class="text-sm font-medium text-gray-700">Password *</label>
                    <input type="password" name="password"
                        class="w-full mt-1 px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500" />
                    @error('password')
                        <div class="text-red-900">{{$message}}</div>
                    @enderror
                </div>
                <div>
                    <label class="text-sm font-medium text-gray-700">Password *</label>
                    <input type="password" name="password_confirmation"
                        class="w-full mt-1 px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500" />
                    @error('password_confirmation')
                        <div class="text-red-900">{{$message}}</div>
                    @enderror
                </div>

                <button type="submit"
                    class="w-full bg-gray-900 text-white py-3 rounded-lg font-semibold hover:bg-gray-800 transition">
                    Create Account
                </button>
            </form>

            <p class="text-sm text-center text-gray-500">
                Already have an account?
                <a href="/login" class="text-green-600 font-medium">Login Here</a>
            </p>
        </div>
    </div>
</body>

</html>