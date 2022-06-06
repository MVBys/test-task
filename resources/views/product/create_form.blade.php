<form method="POST" action="{{ route('product.store') }}" id="form_create" class="mt-1 mb-2 flex items-center">
    @csrf
    <label for="title" class="w-1/5 mx-2 block text-base font-bold text-gray-700">Title</label>

    <input type="text" name="title" id="title" autocomplete="given-name" value="@if(isset($product)){{$product->title}}@endif"
        class="mx-2 mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">

    <label for="substance" class="w-1/5 mx-2 block text-base font-bold text-gray-700">Substance</label>
    <select id="substance" name="substance_id"
        class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
        @foreach ($substances as $substance)
            <option value="{{ $substance->id }}">{{ $substance->title }}</option>
        @endforeach
    </select>


    <label for="manufacturer" class="w-1/5 mx-2 block text-base font-bold text-gray-700">Manufacturer</label>
    <select id="manufacturer" name="manufacturer_id"
        class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
        @foreach ($manufacturers as $manufacturer)
            <option value="{{ $manufacturer->id }}">{{ $manufacturer->title }}</option>
        @endforeach
    </select>


    <label for="cost"
        class="w-1/5 mx-2 block text-base font-bold text-gray-700">Cost</label>
    <input type="number" name="cost" id="cost" autocomplete="given-name" value="@if(isset($product)){{$product->cost}}@endif"
        class="mx-2 mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">

    <x-button form="form_create" class="bg-indigo-600 hover:bg-indigo-700 focus:ring-indigo-500 w-1/4">
        Add
    </x-button>
</form>
