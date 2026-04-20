<x-app-layout>
    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            
            <div class="bg-gray-800 shadow-sm rounded-lg">
                <div class="p-6 text-white">

                    <div class="mb-6">
                        <a href="{{ route('product.index') }}" class="text-sm text-gray-400 hover:text-white">
                            ← Back
                        </a>
                        <h2 class="text-2xl font-bold mt-2">Edit Product</h2>
                        <p class="text-sm text-gray-400">Update product information</p>
                    </div>

                    <form action="{{ route('product.update', $product->id) }}" method="POST" class="space-y-5">
                        @csrf
                        @method('PUT')

                        {{-- Name --}}
                        <div>
                            <label class="block text-sm mb-1">Product Name</label>
                            <input type="text" name="name"
                                value="{{ old('name', $product->name) }}"
                                style="background:#374151 !important; color:white !important; -webkit-text-fill-color:white;"
                                class="w-full rounded-lg border border-gray-600 px-4 py-2.5 text-sm">
                        </div>

                        {{-- Quantity --}}
                        <div>
                            <label class="block text-sm mb-1">Quantity</label>
                            <input type="number" name="quantity"
                                value="{{ old('quantity', $product->quantity) }}"
                                style="background:#374151 !important; color:white !important; -webkit-text-fill-color:white;"
                                class="w-full rounded-lg border border-gray-600 px-4 py-2.5 text-sm">
                        </div>

                        {{-- Price --}}
                        <div>
                            <label class="block text-sm mb-1">Price</label>
                            <input type="number" name="price"
                                value="{{ old('price', $product->price) }}"
                                style="background:#374151 !important; color:white !important; -webkit-text-fill-color:white;"
                                class="w-full rounded-lg border border-gray-600 px-4 py-2.5 text-sm">
                        </div>

                        <div class="flex justify-end gap-3 pt-4">
                            <a href="{{ route('product.index') }}"
                                class="px-4 py-2 border border-gray-500 rounded-lg text-gray-300 hover:bg-gray-700">
                                Cancel
                            </a>

                            <button type="submit"
                                class="px-5 py-2 bg-indigo-600 hover:bg-indigo-700 text-white rounded-lg">
                                Update Product
                            </button>
                        </div>

                    </form>

                </div>
            </div>

        </div>
    </div>
</x-app-layout>