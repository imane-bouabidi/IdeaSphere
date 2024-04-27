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
                <h2 class="text-2xl font-semibold mt-4">Sign in to your account</h2>
                <p class="text-sm text-gray-700 mt-2">If you haven’t signed up yet. <a href="{{route('register')}}" class="text-blue-700">Register here!</a></p>
            </div>
            <form method="post" action="{{ route('loginUser') }}">
                @csrf
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="email">Email address</label>
                    <input id="email" name="email" type="email" autofocus="" placeholder="Email" required="" class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline dark:bg-white/5 dark:border-slate-800 dark:text-white">
                </div>
                <div class="mb-6">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="password">Password</label>
                    <input id="password" name="password" type="password" placeholder="***" required class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline dark:bg-white/5 dark:border-slate-800 dark:text-white">
                </div>
                <div class="mb-6">
                    <button type="submit" class="bg-gray-900 text-white font-bold py-2 px-4 rounded w-full">Sign in</button>
                </div>
            </form>
        </div>
    </div>
</div>

</body>
</html>
