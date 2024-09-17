<head>
    <title>Companies</title>
    <style>
        .company-logo {
            max-width: 50px;
            max-height: 50px;
        }
    </style>
</head>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Companies') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="flex justify-between mb-4">
                        <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100">Companies</h3>
                        <a href="{{ route('company.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Create company
                        </a>
                    </div>
                    <table class="table-auto w-full text-left whitespace-no-wrap">
                        <thead>
                        <tr>
                            <th class="px-4 py-3 title-font font-medium bg-gray-800 text-white border-b border-gray-700">ID</th>
                            <th class="px-4 py-3 title-font font-medium bg-gray-800 text-white border-b border-gray-700">Logotype</th>
                            <th class="px-4 py-3 title-font font-medium bg-gray-800 text-white border-b border-gray-700">Company Name</th>
                            <th class="px-4 py-3 title-font font-medium bg-gray-800 text-white border-b border-gray-700">Email</th>
                            <th class="px-4 py-3 title-font font-medium bg-gray-800 text-white border-b border-gray-700">Website</th>
                            <th class="px-4 py-3 title-font font-medium bg-gray-800 text-white border-b border-gray-700">DEL</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($companies as $company)
                            <tr>
                                <td class="px-4 py-3 border-b border-gray-700"><a href="{{ route('company.edit', $company) }}">{{ $company->id }}</a></td>
                                <td class="px-4 py-3 border-b border-gray-700">
                                    @if ($company->logotype)
                                        <img src="{{ asset('storage/' . $company->logotype) }}" alt="{{ $company->company_name }} Logo" class="company-logo">
                                    @else
                                        <span class="ml-5">-</span>
                                    @endif
                                </td>
                                <td class="px-4 py-3 border-b border-gray-700">{{ $company->company_name }}</td>
                                <td class="px-4 py-3 border-b border-gray-700">{{ $company->email }}</td>
                                <td class="px-4 py-3 border-b border-gray-700">{{ $company->website }}</td>
                                <td class="px-4 py-3 border-b border-gray-700">
                                    <form class="my-0" action="{{ route('company.delete', $company) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger">DEL</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="p-6">
                        {{ $companies->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
