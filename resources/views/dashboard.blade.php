<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Profil') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-300 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-black dark:text-black">
                    {{ __("You're logged in!") }}
                </div>
                <div class="p-6 text-black dark:text-black">
                    <a href="/cart" class="inline-block px-4 py-2 bg-blue-500 text-black font-semibold rounded-lg shadow-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-75">
                        {{ __('View Carts') }}
                    </a>
                    <br><br><br>
                    <a href="/payment" class="inline-block px-4 py-2 bg-green-500 text-black font-semibold rounded-lg shadow-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-400 focus:ring-opacity-75">
                        {{ __('View Payments') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
