<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Socialite</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 dark:bg-gray-900">

<div class="flex justify-center items-center h-screen">
    <div class="w-full max-w-md">
        <div class="bg-white dark:bg-slate-900 shadow-md rounded px-8 pt-6 pb-8 mb-4">
            <div class="mb-8 text-center">
                <a href="#"><img src="assets/images/logo.png" alt="Logo" class="w-28"></a>
                <a href="#"><img src="assets/images/logo-light.png" alt="Logo" class="w-28 hidden dark:block"></a>
                <h2 class="text-2xl font-semibold mt-4">Sign up to get started</h2>
                <p class="text-sm text-gray-700 mt-2">If you already have an account, <a href="{{ route('login') }}" class="text-blue-700">Login here!</a></p>
            </div>
            <form method="post" action="{{ route('registerUser') }}">
                @csrf
                <div class="space-y-4">
                    <div>
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="name">User name</label>
                        <input id="name" name="name" type="text" autofocus="" placeholder="Name" required="" class="w-full appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline dark:bg-white/5 dark:border-slate-800 dark:text-white">
                    </div>
                    <div>
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="email">Email address</label>
                        <input id="email" name="email" type="email" placeholder="Email" required="" class="w-full appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline dark:bg-white/5 dark:border-slate-800 dark:text-white">
                    </div>
                    <div>
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="password">Password</label>
                        <input id="password" name="password" type="password" placeholder="***" class="w-full appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline dark:bg-white/5 dark:border-slate-800 dark:text-white">
                    </div>
                    <div>
                        <button type="submit" class="bg-gray-900 text-white font-bold py-2 px-4 rounded w-full">Get Started</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

</body>
</html>
