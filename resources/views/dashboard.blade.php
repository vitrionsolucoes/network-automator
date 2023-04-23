<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <!-- Global Level config -->
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div>
                        <span>Global Configurations</span>
                        <a href="global/ip/firewall/addresslist">
                            <div class="flex gap-x-4">
                                <span class="inline-flex items-center rounded-md bg-blue-50 px-2 py-1 text-xs font-medium text-blue-700 ring-1 ring-inset ring-blue-700/10">
                                    IP/Firewall/Address-List
                                </span>
                            </div>
                        </a>
                    </div>

                    <!-- Routerboard level config -->
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <div>
                            <span>Routerboard Level Configurations</span>
                            <a href="routerboard">
                                <div class="flex gap-x-4">
                                    <span class="inline-flex items-center rounded-md bg-blue-50 px-2 py-1 text-xs font-medium text-blue-700 ring-1 ring-inset ring-blue-700/10">
                                        Listar RB
                                    </span>
                                </div>
                            </a>
                            <a href="routerboard/create">
                                <div class="flex gap-x-4">
                                    <span class="inline-flex items-center rounded-md bg-blue-50 px-2 py-1 text-xs font-medium text-blue-700 ring-1 ring-inset ring-blue-700/10">
                                        Cadastrar RB
                                    </span>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>