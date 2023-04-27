<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Criar Modelo') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <!-- component -->
                    <!-- This is an example component -->
                    <div class="max-w-2xl mx-auto bg-white p-16">
                        <form action="{{ route('device.model.store') }}" method="POST">
                            @csrf
                            <div class="grid gap-6 mb-6 lg:grid-cols-7">
                                <div
                                    class="lg:col-span-3 block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                                    <label for="name">Modelo</label>
                                    <input type="text" id="name" name="name"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="Roteadores" required>
                                </div>
                            </div>

                            <div class="mt-4">
                                <x-input-label for="device_vendor_id" :value="__('Fabricante')" />
                                <select id="device_vendor_id" name="device_vendor_id"
                                    class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                    @foreach ($deviceVendors as $deviceVendor)
                                    <option value="{{ $deviceVendor->id }}">{{ $deviceVendor->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit"
                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Cadastrar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>