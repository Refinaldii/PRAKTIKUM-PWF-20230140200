<x-app-layout>
    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    
                    {{-- Header --}}
                    <div class="mb-8">
                        <a href="{{ route('product.index') }}" class="inline-flex items-center p-1.5 rounded-md text-gray-400 hover:text-gray-600 dark:hover:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 transition">
                            ← Back
                        </a>
                        <div class="mt-4">
                            <h2 class="text-2xl font-bold">Add Product</h2>
                        </div>
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
                            <label>Product Name</label>
                            <input type="text" name="name" value="{{ old('name') }}"
                                class="w-full border p-2 rounded @error('name') border-red-500 @enderror">
                            @error('name')
                                <p class="text-red-500 text-sm">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Quantity --}}
                        <div>
                            <label>Quantity</label>
                            <input type="number" name="quantity" value="{{ old('quantity') }}"
                                class="w-full border p-2 rounded @error('quantity') border-red-500 @enderror">
                            @error('quantity')
                                <p class="text-red-500 text-sm">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Price --}}
                        <div>
                            <label>Price</label>
                            <input type="number" name="price" value="{{ old('price') }}"
                                class="w-full border p-2 rounded @error('price') border-red-500 @enderror">
                            @error('price')
                                <p class="text-red-500 text-sm">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- BUTTON --}}
                        <div class="flex justify-end">
                            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">
                                Save Product
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>