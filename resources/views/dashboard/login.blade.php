<!DOCTYPE html>
<html lang="en" >
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="icon" href="/images/icone.png" />
        <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
            integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
            crossorigin="anonymous"
            referrerpolicy="no-referrer"
        />
        <script src="https://cdn.tailwindcss.com"></script>
        <script>
            tailwind.config = {
                theme: {
                    extend: {
                        colors: {
                            laravel: "#483d8b",
                            hover: "#9400d3"
                        },
                    },
                },
            };
        </script>
         <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
        <title>LOGIN TO DASHBOARD</title>
    </head>
    <body>

    <div class="mx-4">
        <div class="bg-gray-50 border border-gray-200 p-10 rounded max-w-lg mx-auto mt-24">
            <header class="text-center">
                <h2 class="text-2xl font-bold uppercase mb-1">
Welcome DR Dima                </h2>
                <p class="mb-4">Login </p>
            </header>

            <form method="POST" action="/admin/auth">
                @csrf
                <div class="mb-6">
                    <label for="email" class="inline-block text-lg mb-2">Email</label>
                    <input type="email" class="border border-gray-200 rounded p-2 w-full" name="email">
                    @error("email")
                    <P class="text-red-500 text-xs mt-1">{{$message}}</P>

                    @enderror
                </div>


                <div class="mb-6">
                    <label for="password" class="inline-block text-lg mb-2">
                        Password
                    </label>
                    <input type="password" class="border border-gray-200 rounded p-2 w-full" name="password">
                    @error("password")
                    <P class="text-red-500 text-xs mt-1">{{$message}}</P>

                    @enderror
                </div>

                <div class="mb-6">
                    <button type="submit" class="hover:opacity-80 transition duration-700 ease-in-out bg-laravel text-white rounded py-2 px-4 hover:bg-black">
                        Sign In
                    </button>
                </div>

                <div class="mt-8">
                    <p>
                        You are not admin?
                        <a href="/" class="text-laravel">Go to public page </a>
                    </p>
                </div>
            </form>
        </div>
    </div>
</body>
