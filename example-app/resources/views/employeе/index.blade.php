<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Employees') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <table class="table-auto w-full text-left whitespace-no-wrap">
                        <thead>
                        <tr>
                            <th class="px-4 py-3 title-font font-medium bg-gray-800 text-white border-b border-gray-700">ID</th>
                            <th class="px-4 py-3 title-font font-medium bg-gray-800 text-white border-b border-gray-700">First Name</th>
                            <th class="px-4 py-3 title-font font-medium bg-gray-800 text-white border-b border-gray-700">Last Name</th>
                            <th class="px-4 py-3 title-font font-medium bg-gray-800 text-white border-b border-gray-700">Company</th>
                            <th class="px-4 py-3 title-font font-medium bg-gray-800 text-white border-b border-gray-700">Email</th>
                            <th class="px-4 py-3 title-font font-medium bg-gray-800 text-white border-b border-gray-700">Phone Number</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($employees as $employee)
                            <tr>
                                <td class="px-4 py-3 border-b border-gray-700">{{ $employee->id }}</td>
                                <td class="px-4 py-3 border-b border-gray-700">{{ $employee->first_name }}</td>
                                <td class="px-4 py-3 border-b border-gray-700">{{ $employee->last_name }}</td>
                                <td class="px-4 py-3 border-b border-gray-700">{{ $employee->company }}</td>
                                <td class="px-4 py-3 border-b border-gray-700">{{ $employee->email }}</td>
                                <td class="px-4 py-3 border-b border-gray-700">{{ $employee->phone_number }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
