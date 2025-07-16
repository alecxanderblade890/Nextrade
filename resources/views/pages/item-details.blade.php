<x-layout>
    <x-nav>
    </x-nav>
    <!-- Main Content -->
    <main class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
        <div class="bg-white rounded-lg shadow-lg overflow-hidden">
            <div class="md:grid md:grid-cols-3 md:gap-x-8 p-8">
                
                <!-- Item Image -->
                <div class="md:col-span-1">
                    <img class="w-full h-auto rounded-lg shadow-md object-cover" src="{{$item->image_url}}" alt="Vintage Camera">
                </div>

                <!-- Item Details & Message Form -->
                <div class="md:col-span-2 mt-6 md:mt-0">
                    <h1 class="text-3xl font-bold text-gray-900">{{$item->title}}</h1>
                    
                    <div class="flex items-center mt-2">
                        <img class="w-10 h-10 rounded-full object-cover" src="{{$item->user->image_url}}" alt="Avatar">
                        <div class="ml-3">
                            <p class="text-sm font-medium text-gray-500">Posted by</p>
                            <p class="text-lg font-semibold text-gray-800">{{$item->user->first_name . ' ' . $item->user->last_name}}</p>
                        </div>
                    </div>

                    <div class="mt-6">
                        <h2 class="text-xl font-semibold text-gray-800">Description</h2>
                        <p class="text-gray-700 mt-2">
                            {{$item->description}}
                        </p>
                        <h2 class="text-xl font-semibold text-gray-800 mt-4">Looking for</h2>
                        <p class="text-gray-700 mt-2">
                           {{$item->exchange_item_for ?? 'N/A'}}
                        </p>
                    </div>

                    <!-- Message Form -->
                    <div class="mt-8">
                        <h3 class="text-xl font-semibold text-gray-800">Interested? Send a message.</h3>
                        <form action="#" method="POST" class="mt-4 space-y-4">
                            <div>
                                <label for="message" class="sr-only">Message</label>
                                <textarea id="message" name="message" rows="4" class="w-full p-3 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" placeholder="Hi Alice, I have a tripod I'd be interested in trading for your camera..."></textarea>
                            </div>
                            <div>
                                <button type="submit" class="w-full flex justify-center py-3 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-700">
                                    Send Message
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
</x-layout>