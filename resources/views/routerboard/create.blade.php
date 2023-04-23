<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <!-- component -->
                    <!-- This is an example component -->
                    <div class="max-w-2xl mx-auto bg-white p-16">
                        <form action="{{ route('routerboard.store') }}" method="POST">
                            @csrf
                            <!-- Duas Colunas -->
                            <div class="grid gap-6 mb-6 lg:grid-cols-2">
                                <div>
                                    <label for="hostname" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Hostname</label>
                                    <input type="text" id="hostname" name="hostname" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="device.localdomain.com" required>
                                </div>
                                <div>
                                    <label for="ipv4_mgmt_address" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Management IPv4</label>
                                    <input type="text" id="ipv4_mgmt_address" name="ipv4_mgmt_address" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="192.168.88.1" required>
                                </div>
                            </div>
                            <!-- 1 Coluna -->
                            <div class="mb-6">
                                <label for="ipv6_mgmt_address" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Management IPv6</label>
                                <input type="text" id="ipv6_mgmt_address" name="ipv6_mgmt_address" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="2001:DB8::1">
                            </div>
                            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Cadastrar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>