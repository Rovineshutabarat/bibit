<header class="bg-white shadow">
    <div class="flex justify-between items-center py-4 px-6">
        <!-- Mobile Menu Button -->
        <button class="md:hidden" @click="mobileSidebar = !mobileSidebar">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M4 6h16M4 12h16M4 18h16"></path>
            </svg>
        </button>

        <!-- Search -->
        <div class="flex-1 mx-4">
            <div class="relative">
                <input type="text"
                       class="w-full pl-10 pr-4 py-2 rounded-lg border focus:outline-none focus:border-green-500"
                       placeholder="Cari...">
                <div class="absolute left-3 top-2">
                    <i class="fas fa-search text-gray-400"></i>
                </div>
            </div>
        </div>

        <!-- Right Navigation -->
        <div class="flex items-center">
            <!-- Notifications -->
            <div class="relative mr-4">
                <button class="text-gray-500 hover:text-gray-600">
                    <i class="fas fa-bell"></i>
                    <span class="absolute top-0 right-0 h-2 w-2 bg-red-500 rounded-full"></span>
                </button>
            </div>

            <!-- Profile Dropdown -->
            <div x-data="{ open: false }" class="relative">
                <button @click="open = !open"
                        class="flex items-center space-x-2 text-gray-700 hover:text-gray-900 focus:outline-none">
                    <img class="h-8 w-8 rounded-full object-cover"
                         src="{{ Auth::user()->avatar ?? 'https://ui-avatars.com/api/?name=Admin' }}"
                         alt="Profile">
                    <span></span>
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M19 9l-7 7-7-7"></path>
                    </svg>
                </button>
                <div x-show="open"
                     @click.away="open = false"
                     class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1">
                    <a href="" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                        Profile
                    </a>
                    <a href="" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                        Settings
                    </a>
                    <div class="border-t border-gray-100"></div>
                    <form method="POST" action="">
                        @csrf
                        <button type="submit"
                                class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                            Logout
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</header>
