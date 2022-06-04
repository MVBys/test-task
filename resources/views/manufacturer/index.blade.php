@extends('index')

@section('content')
    {{-- <x-modal>
        <div>
            <div class="mt-3 text-left sm:mt-5">
                <span class="mb-8 text-xs font-semibold tracking-widest text-blue-600 uppercase">Securtiy
                    code</span>
                <div class="mt-2">
                    <p class="mt-3 text-base leading-relaxed text-gray-500">This code expires in 24 hours.
                    </p>
                </div>
            </div>
        </div>
    </x-modal> --}}


    <form method="POST" action="{{ route('manufacturer.store') }}" id="form_create"
        class="mt-1 mb-2 flex items-center text-center">
        @csrf
        <label for="title" class="w-1/5 mx-2 block text-base font-bold text-gray-700">manufacturer title</label>

        <input type="text" name="title" id="title" autocomplete="given-name"
            class="mx-2 mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">

        <label for="link" class="w-1/5 mx-2 block text-base font-bold text-gray-700">manufacturer link</label>

        <input type="text" name="link" id="title" autocomplete="given-name"
            class="mx-2 mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
        <x-button form="form_create" class="bg-indigo-600 hover:bg-indigo-700 focus:ring-indigo-500 w-1/4">
            Add
        </x-button>
    </form>


    <x-table>
        <x-table.thead>
            <x-table.tr>
                <x-table.th class="w-20">Id</x-table.th>
                <x-table.th>manufacturer</x-table.th>
                <x-table.th>link</x-table.th>
                <x-table.th>Options</x-table.th>
            </x-table.tr>
        </x-table.thead>

        <x-table.tbody>
            @foreach ($manufacturers as $manufacturer)
                <x-table.tr>
                    <x-table.td>{{ $manufacturer->id }}</x-table.td>
                    <x-table.td>{{ $manufacturer->title }}</x-table.td>
                    <x-table.td class="w-1/4">
                        <a href="{{ $manufacturer->link }}"> {{ $manufacturer->link }}</a>
                    </x-table.td>
                    <x-table.td>
                        <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                            <a href="{{ route('manufacturer.show', $manufacturer->id) }}">
                                <x-button class="bg-amber-500 hover:bg-amber-700 focus:ring-amber-500"
                                    formaction='google.com'>show </x-button>
                            </a>
                            <a href="{{ route('manufacturer.edit', $manufacturer->id) }}">
                                <x-button class="bg-cyan-500 hover:bg-cyan-700 focus:ring-cyan-500">update</x-button>
                            </a>
                            <form id="button_delete" method="POST"
                                action="{{ route('manufacturer.destroy', $manufacturer->id) }}" style="display: inline">
                                @method('DELETE')
                                @csrf
                                @if ($manufacturer->medical_product->first())
                                    <x-button class="bg-slate-500" disabled>delete</x-button>
                                @else
                                    <x-button class="bg-red-500 hover:bg-red-700 focus:ring-red-500">delete</x-button>
                                @endif

                            </form>

                        </div>
                    </x-table.td>
                </x-table.tr>
            @endforeach
        </x-table.tbody>
    </x-table>

    {{ $manufacturers->links('vendor.pagination.tailwind') }}
@endsection
