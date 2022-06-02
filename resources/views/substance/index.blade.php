@extends('index')

@section('content')
    <form method="POST" class="mt-1 mb-2 flex items-center">
        @csrf
        <label for="title" class="w-1/5 mx-2 block text-base font-bold text-gray-700">Substance title</label>

        <input type="text" name="title" id="title" autocomplete="given-name"
            class="mx-2 mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">


        <x-button class="bg-indigo-600 hover:bg-indigo-700 focus:ring-indigo-500 w-1/4">Add</x-button>


    </form>


    <x-table>
        <x-table.thead>
            <x-table.tr>
                <x-table.th class="w-20">Id</x-table.th>
                <x-table.th>Substance</x-table.th>
                <x-table.th>Options</x-table.th>
            </x-table.tr>
        </x-table.thead>

        <x-table.tbody>
            @foreach ($substances as $substance)
                <x-table.tr>
                    <x-table.td>{{ $substance->id }}</x-table.td>
                    <x-table.td>{{ $substance->title }}</x-table.td>
                    <x-table.td>
                        <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                            <x-button class="bg-amber-500 hover:bg-amber-700 focus:ring-amber-500">show</x-button>
                            <x-button class="bg-cyan-500 hover:bg-cyan-700 focus:ring-cyan-500">update</x-button>
                            <x-button class="bg-red-500 hover:bg-red-700 focus:ring-red-500">delete</x-button>
                        </div>
                    </x-table.td>
                </x-table.tr>
            @endforeach
        </x-table.tbody>
    </x-table>

    {{ $substances->links('vendor.pagination.tailwind') }}
@endsection
