@extends('index')

@section('content')
    <form method="POST" class="mt-1 mb-2 flex items-center">
        @csrf
        <label for="title" class="w-1/5 mx-2 block text-base font-bold text-gray-700">Substance title</label>

        <input type="text" name="title" id="title" autocomplete="given-name"
            class="mx-2 mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
        <button type="submit"
            class="mx-2 w-1/4 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
            Add
        </button>
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
                            <button type="submit"
                                class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-amber-500 hover:bg-amber-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-amber-500">Show</button>
                            <button type="submit"
                                class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-cyan-500 hover:bg-cyan-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-cyan-500">Update</button>
                            <button type="submit"
                                class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-red-500 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">Delete</button>

                        </div>
                    </x-table.td>
                </x-table.tr>
            @endforeach
        </x-table.tbody>
    </x-table>

    {{ $substances->links('vendor.pagination.tailwind') }}
@endsection
