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



    <table class="border-collapse border border-slate-300 w-full mb-2 text-center ...">
        <thead>
            <tr>
                <th class="border border-slate-500 w-20 ...">Id</th>
                <th class="border border-slate-500 ...">Substance</th>
                <th class="border border-slate-500 ...">Options</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($substances as $substance)
                <tr>
                    <td class="border  ...">{{ $substance->id }}</td>
                    <td class="border  ...">{{ $substance->title }}</td>
                    <td class="border  ...">
                        <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                            <button type="submit"
                                class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-amber-500 hover:bg-amber-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-amber-500">Show</button>
                            <button type="submit"
                                class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-cyan-500 hover:bg-cyan-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-cyan-500">Update</button>
                            <button type="submit"
                                class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-red-500 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">Delete</button>

                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $substances->links('vendor.pagination.tailwind') }}
@endsection
