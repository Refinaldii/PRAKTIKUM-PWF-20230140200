<x-app-layout>
    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            
            <div class="bg-gray-800 shadow-lg rounded-2xl">
                <div class="p-8 text-white">

                    {{-- Header --}}
                    <div class="mb-8">
                        <a href="{{ route('product.index') }}" 
                           class="text-sm text-gray-400 hover:text-white transition">
                            ← Back
                        </a>

                        <h2 class="text-2xl font-semibold mt-3">Add Product</h2>
                        <p class="text-sm text-gray-400 mt-1">
                            Create new product
                        </p>
                    </div>

                    {{-- ERROR GLOBAL --}}
                    @if ($errors->any())
                        <div class="mb-4 p-3 bg-red-100 text-red-600 rounded">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    {{-- FORM --}}
                    <form action="{{ route('product.store') }}" method="POST" class="space-y-6">
                        @csrf

                        {{-- Name --}}
                        <div>
                            <label class="block text-sm font-medium text-gray-300 mb-2">
                                Product Name
                            </label>
                            <input type="text" name="name"
                                value="{{ old('name') }}"
                                class="w-full bg-gray-700 border border-gray-600 text-white px-4 py-3 rounded-xl text-sm 
                                       focus:outline-none focus:ring-2 focus:ring-indigo-500 transition">
                            @error('name')
                                <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Quantity --}}
                        <div>
                            <label class="block text-sm font-medium text-gray-300 mb-2">
                                Quantity
                            </label>
                            <input type="number" name="quantity"
                                value="{{ old('quantity') }}"
                                class="w-full bg-gray-700 border border-gray-600 text-white px-4 py-3 rounded-xl text-sm 
                                       focus:outline-none focus:ring-2 focus:ring-indigo-500 transition">
                            @error('quantity')
                                <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Price --}}
                        <div>
                            <label class="block text-sm font-medium text-gray-300 mb-2">
                                Price
                            </label>
                            <input type="number" name="price"
                                value="{{ old('price') }}"
                                class="w-full bg-gray-700 border border-gray-600 text-white px-4 py-3 rounded-xl text-sm 
                                       focus:outline-none focus:ring-2 focus:ring-indigo-500 transition">
                            @error('price')
                                <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- BUTTON --}}
                        <div class="flex justify-end gap-3 pt-6">
                            <a href="{{ route('product.index') }}"
                                class="px-5 py-2 border border-gray-600 rounded-xl text-gray-300 hover:bg-gray-700 transition">
                                Cancel
                            </a>

                            <button type="submit"
                                class="px-6 py-2 bg-indigo-600 hover:bg-indigo-700 text-white rounded-xl transition shadow">
                                Save Product
                            </button>
                        </div>

                    </form>

                </div>
            </div>

        </div>
    </div>
</x-app-layout>