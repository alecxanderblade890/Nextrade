<x-layout>
    <x-nav>
    </x-nav>
    <!-- Main Content -->
    <main class="max-w-4xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-bold text-gray-900 mb-8">My Inbox</h1>
        <div class="bg-white rounded-lg shadow-lg overflow-hidden">
            <ul class="divide-y divide-gray-200">
                <!-- Message Thread 1 (Unread) -->
                <li class="p-4 hover:bg-gray-50 cursor-pointer">
                    <a href="#" class="block">
                        <div class="flex items-center space-x-4">
                            <div class="flex-shrink-0">
                                <img class="h-12 w-12 rounded-full" src="https://placehold.co/40x40/bfdbfe/333?text=B" alt="Avatar">
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="text-sm font-semibold text-gray-800 truncate">Bob Smith</p>
                                <p class="text-sm text-gray-600">Regarding: <span class="font-medium">Acoustic Guitar</span></p>
                                <p class="text-sm text-gray-500 truncate mt-1">
                                    Hey! I saw your post for the guitar. I have a drone I'd be willing to trade...
                                </p>
                            </div>
                            <div class="flex flex-col items-end">
                                <span class="text-xs text-gray-500">5m ago</span>
                                <span class="mt-2 inline-flex items-center justify-center h-6 w-6 rounded-full bg-red-500">
                                    <span class="text-xs font-medium text-white">1</span>
                                </span>
                            </div>
                        </div>
                    </a>
                </li>
                <!-- Message Thread 2 (Read) -->
                <li class="p-4 hover:bg-gray-50 cursor-pointer">
                    <a href="#" class="block">
                        <div class="flex items-center space-x-4">
                            <div class="flex-shrink-0">
                                <img class="h-12 w-12 rounded-full" src="https://placehold.co/40x40/fca5a5/333?text=C" alt="Avatar">
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="text-sm font-semibold text-gray-800 truncate">Carol White</p>
                                <p class="text-sm text-gray-600">Regarding: <span class="font-medium">Vintage Film Camera</span></p>
                                <p class="text-sm text-gray-500 truncate mt-1">
                                    You: Sounds good, let's meet up this weekend to make the trade.
                                </p>
                            </div>
                            <div class="flex flex-col items-end">
                                <span class="text-xs text-gray-500">2h ago</span>
                            </div>
                        </div>
                    </a>
                </li>
                
                <!-- Add more message threads here -->
            </ul>
        </div>
    </main>
</x-layout> 