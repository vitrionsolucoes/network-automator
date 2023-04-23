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
                    <div>
                        <div>
                            <h1>{{ $routerboard->hostname }}</h1>
                            <ul>
                                <li>Model: {{ $routerboard->model }}</li>
                                <li>Software Version: {{ $routerboard->software_version }}</li>
                                <li>Management IPv4 Address: {{ $routerboard->ipv4_mgmt_address }}</li>
                                <li>Management IPv6 Address: {{ $routerboard->ipv6_mgmt_address }}</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div>
                    <a href="ip/firewall/address-list/{{ $routerboard->id }}">
                        Cadastrar lista de prefixo
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>