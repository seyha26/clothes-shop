<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/js/all.min.js" integrity="sha512-b+nQTCdtTBIRIbraqNEwsjB6UvL3UEMkXnhzd8awtCYh0Kcsjl9uEgwVFVbhoj3uu1DO1ZMacNvLoyJJiNfcvg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>
<body>
<main>
        <div class="flex items-center h-screen px-2 sm:px-0">
            <form class="bg-gray-100 w-full max-w-sm sm:max-w-xl mx-auto p-4 rounded-xl shadow-md" action="/login" method="post">
                @csrf
                <div class="px-4 m-4 text-center">
                    <h2 class="text-xl font-bold">Login to your account</h2>
                </div>

                <div class="inputs p-4 w-full">
                    <div class="grid grid-cols-1 max-w-md mx-auto">
                        <div class="form-group gap-2">
                            <label class="block my-2" for="username">Email: </label>
                            <input class="w-full border-2 rounded-md px-3 py-2 my-1 shadow-sm" type="text" id="username"
                                name="email" placeholder="Enter your email" required>
                        </div>
                        <div class="form-group">
                            <label class="block my-2" for="password">Password</label>
                            <div class="relative">
                                <input class="w-full border-2 rounded-md px-3 py-2 my-1 shadow-sm" type="password" placeholder="Enter your password"
                                    id="password" name="password" required>
                                <button type="button"
                                    class="absolute right-2.5 top-1/2 -translate-y-1/2 text-neutral-600 dark:text-neutral-300"
                                    aria-label="Show password">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" aria-hidden="true" class="size-5">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                    </svg>
                                    <svg class="hidden" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true"
                                        class="size-5">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M3.98 8.223A10.477 10.477 0 0 0 1.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.451 10.451 0 0 1 12 4.5c4.756 0 8.773 3.162 10.065 7.498a10.522 10.522 0 0 1-4.293 5.774M6.228 6.228 3 3m3.228 3.228 3.65 3.65m7.894 7.894L21 21m-3.228-3.228-3.65-3.65m0 0a3 3 0 1 0-4.243-4.243m4.242 4.242L9.88 9.88" />
                                    </svg>
                                </button>
                            </div>
                            <div class="pt-2">
                                <a href="/register" class="text-blue-500 underline">If you don't have any account please register here</a>
                            </div>
                        </div>
                        <button
                            class="w-full bg-blue-700 text-gray-50 rounded-md shadow-sm px-3 py-2 my-4 hover:bg-blue-600"
                            type="submit">Login</button>
                    </div>

                </div>

            </form>
        </div>
    </main> 
</body>
</html>
