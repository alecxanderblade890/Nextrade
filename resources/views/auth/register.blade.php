<x-layout>
    <div class="max-w-md mx-auto mt-10 bg-white rounded-xl shadow-md p-4">
        <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
            <div class="sm:mx-auto sm:w-full sm:max-w-sm">
                <img class="mx-auto h-16 w-28" src="{{asset('images/nextrade_logo_transparent.png')}}" alt="Nextrade" />
                <h2 class="mt-10 text-center text-2xl/9 font-bold tracking-tight text-gray-900">Sign up with an account</h2>
            </div>

            <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
                <!-- validation errors -->
                @if ($errors->any())
                <ul class="px-4 py-2 bg-red-100">
                    @foreach ($errors->all() as $error)
                    <li class="my-2 text-red-500">{{ $error }}</li>
                    @endforeach
                </ul>
                @endif

                <form class="space-y-6" action="{{route('register')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-4 flex flex-col items-center justify-center">
                        <label for="image" class="block text-sm/6 font-medium text-gray-900 mb-2">Profile Image</label>
                        <div class="relative">
                            <img id="imagePreview" class="w-24 h-24 rounded-full object-cover border-2 border-black shadow mb-2" />
                            <label for="image" class="absolute bottom-0 right-0 bg-black hover:bg-gray-500 text-white rounded-full p-2 cursor-pointer shadow-lg">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 12a.75.75 0 01.75-.75h9a.75.75 0 01.75.75v6a2.25 2.25 0 01-2.25 2.25h-6A2.25 2.25 0 016.75 18v-6zm0 0V9A2.25 2.25 0 019 6.75h6A2.25 2.25 0 0117.25 9v3" />
                                </svg>
                            </label>
                            <input type="file" name="image" id="image" accept="image/*" required class="hidden" />
                        </div>
                    </div>
                    <div>
                        <label for="first_name" class="block text-sm/6 font-medium text-gray-900">First Name</label>
                        <div class="mt-2">
                            <input type="text" name="first_name" id="first_name" autocomplete="given-name" required class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" />
                        </div>
                    </div>
                    <div>
                        <label for="last_name" class="block text-sm/6 font-medium text-gray-900">Last Name</label>
                        <div class="mt-2">
                            <input type="text" name="last_name" id="last_name" autocomplete="family-name" required class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" />
                        </div>
                    </div>
                    <div>
                        <label for="email" class="block text-sm/6 font-medium text-gray-900">Email</label>
                        <div class="mt-2">
                            <input type="email" name="email" id="email" autocomplete="email" required class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" />
                        </div>
                    </div>
                    <div>
                        <div class="flex items-center justify-between">
                            <label for="password" class="block text-sm/6 font-medium text-gray-900">Password</label>
                        </div>
                        <div class="mt-2">
                            <input type="password" name="password" id="password" autocomplete="new-password" required class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" />
                        </div>
                    </div>
                    <div>
                        <div class="flex items-center justify-between">
                            <label for="password_confirmation" class="block text-sm/6 font-medium text-gray-900">Confirm Password</label>
                        </div>
                        <div class="mt-2">
                            <input type="password" name="password_confirmation" id="password_confirmation" autocomplete="new-password" required class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" />
                        </div>
                    </div>
                    <div>
                        <x-auth-button class="bg-black text-white hover:bg-gray-500 hover:text-white">Sign up</x-auth-button>
                    </div>
                    <p class="mt-8 text-center text-sm text-gray-500">
                        Already a member?
                        <a href="{{route('show.login')}}" class="font-semibold text-black hover:text-gray-500">Sign in</a>
                    </p>
                </form>
            </div>
        </div>
    </div>
</x-layout>