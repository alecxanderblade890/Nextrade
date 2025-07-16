@props(['items'])
<!-- Main Content -->
<main class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
    <h1 class="text-3xl font-bold text-gray-900 mb-8">Available for Barter</h1>

    <!-- Items Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">

        @foreach ($items as $item)
            <!-- Item Card Example 1 -->
            <div class="bg-white rounded-lg shadow-lg overflow-hidden transform hover:-translate-y-1 transition-transform duration-300">
                <a href="{{route('show.item.details', $item->id)}}">
                    <img class="w-full h-48 object-cover" src="{{$item->image_url}}" alt="Vintage Camera">
                    <div class="p-4">
                        <h3 class="font-bold text-lg text-gray-800">{{$item->Title}}</h3>
                        <p class="text-sm text-gray-600 mt-1 line-clamp-2">{{$item->description}}</p>
                        <div class="flex items-center mt-4">
                            <img class="w-8 h-8 rounded-full object-cover" src="{{$item->user->image_url}}" alt="Avatar">
                            <span class="ml-2 text-sm font-medium text-gray-700">{{$item->user->first_name . ' ' . $item->user->last_name}}</span>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
</main>