<!-- Navigation Bar -->
<nav class="bg-white shadow-md">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center h-16 justify-between">
            <div class="flex items-center">
                <!-- Profile Picture -->
                <div class="items-center">
                    <img src="{{ Auth::user()->image_url ?? asset('images/default-profile.png') }}" alt="Profile" class="w-10 h-10 rounded-full object-cover border-2 border-gray-300 shadow" />
                </div>
                <div class="ml-6 flex-shrink-0">
                    <a href="{{route('pages.home')}}" class="text-2xl font-bold text-gray-800">Nextrade</a>
                </div>
            </div>
            <div class="md:block flex items-center">
                <div class="ml-10 flex items-baseline space-x-4">
                    <a href="{{route('pages.home')}}" class="{{request()->routeIs('pages.home') ? 'bg-gray-900 text-white' : 'text-gray-500 hover:bg-gray-700 hover:text-white'}} px-3 py-2 rounded-md text-sm font-medium">Home</a>
                    <a href="{{route('show.inbox')}}" class="{{request()->routeIs('show.inbox') ? 'bg-gray-900 text-white' : 'text-gray-500 hover:bg-gray-700 hover:text-white'}} px-3 py-2 rounded-md text-sm font-medium">Inbox</a>
                    <a href="{{route('show.add.item')}}" class="{{request()->routeIs('show.add.item') ? 'bg-gray-900 text-white' : 'text-gray-500 hover:bg-gray-700 hover:text-white'}} px-3 py-2 rounded-md text-sm font-medium">Add Item</a>
                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <button type="submit" class="text-gray-500 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium {{ request()->routeIs('logout') ? 'bg-gray-900 text-white' : '' }}">
                            Logout
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</nav>