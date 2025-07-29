<x-layout>
    <x-nav>
    </x-nav>
    <!-- Main Content -->
    <main class="max-w-3xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
        <div class="bg-white rounded-lg shadow-lg p-8">
            <!-- validation errors -->
            @if ($errors->any())
            <ul class="px-4 py-2 bg-red-100">
                @foreach ($errors->all() as $error)
                <li class="my-2 text-red-500">{{ $error }}</li>
                @endforeach
            </ul>
            @endif
            <h1 class="text-3xl font-bold text-gray-900 mb-6">Post a New Item for Barter</h1>
            <form action="{{route('add.item')}}" method="POST" class="space-y-6" enctype="multipart/form-data">
                @csrf
                <!-- Item Title -->
                <div>
                    <label for="title" class="block text-sm font-medium text-gray-700">Item Title</label>
                    <input type="text" name="title" id="title" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" placeholder="e.g., Vintage Film Camera">
                </div>
                <!-- Description -->
                <div>
                    <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                    <textarea id="description" name="description" rows="4" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" placeholder="Describe your item in detail. Mention its condition, age, etc."></textarea>
                </div>
                <!-- What you want in return -->
                <div>
                    <label for="exchange" class="block text-sm font-medium text-gray-700">What you'd like in return (optional)</label>
                    <textarea id="exchange" name="exchange" rows="2" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" placeholder="e.g., A modern tripod, electronic gadgets, etc."></textarea>
                </div>
                <!-- Image Upload -->
                <div>
                    <label class="block text-sm font-medium text-gray-700">Upload Photo</label>
                    <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                        <div class="space-y-1 text-center">
                            <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                                <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <div class="flex text-sm text-gray-600">
                                <label for="image" class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                                    <span>Upload a file</span>
                                    <input id="image" name="image" type="file" accept="image/*" class="sr-only">
                                </label>
                                <p class="pl-1">or drag and drop</p>
                            </div>
                            <p class="text-xs text-gray-500">PNG, JPG, GIF up to 10MB</p>
                            <div class="mt-4 flex justify-center">
                                <img id="imagePreview" src="#" alt="Image Preview" class="hidden w-32 h-32 object-cover rounded-lg border border-gray-300" />
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Submit Button -->
                <div>
                    <button type="submit" class="w-full flex justify-center py-3 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-gray-800 hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-700">
                        Post My Item
                    </button>
                </div>
            </form>
        </div>
    </main>
</x-layout>