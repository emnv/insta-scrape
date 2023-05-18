<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @include('dashboard.partials.add-new-profile-form')
                </div>
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="flex items-center mb-4">
                        <div class="pr-4">
                            <select id="ageFilter" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option selected value="">Choose age</option>
                                <option value="0">Age: 0 - 20</option>
                                <option value="21">Age: 21 - 30</option>
                                <option value="31">Age: 31 - 40</option>
                                <option value="41">Age: 41 - 50</option>
                                <option value="51">Age: 51+</option>
                            </select>
                        </div>
                        <div class="pr-4">
                            <select id="genderFilter" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option selected value="">Choose gender</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>
                        <div class="pr-4">
                            <select id="raceFilter" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option selected value="">Choose a Race</option>
                                <option value="White">White</option>
                                <option value="Black">Black</option>
                                <option value="Asian">Asian</option>
                            </select>
                        </div>
                    </div>

                    <div id="listUserNamesWrap">
                        @include('dashboard.partials.usernames-data-table')
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>