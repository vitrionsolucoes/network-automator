<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Criar Localidade') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <!-- component -->
                    <!-- This is an example component -->
                    <div class="max-w-2xl mx-auto bg-white p-16">
                        <form action="{{ route('location.store') }}" method="POST">
                            @csrf
                            <div class="grid gap-6 mb-6 lg:grid-cols-7">
                                <div class="lg:col-span-3 block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                                    <label for="name">Nome do POP</label>
                                    <input type="text" id="name" name="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Ponto de Presença X" required>
                                </div>
                                <div class="lg:col-span-3 block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                                    <label for="city">Cidade</label>
                                    <input type="text" id="city" name="city" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Cidade" required>
                                </div>
                                <div class="lg:col-span-1 block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                                    <!-- label and dropdown for state -->
                                    <label for="state">Estado:</label>
                                    <select id="state" name="state" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <?php
                                        $states = array(
                                            'AC' => 'AC',
                                            'AL' => 'AL',
                                            'AP' => 'AP',
                                            'AM' => 'AM',
                                            'BA' => 'BA',
                                            'CE' => 'CE',
                                            'DF' => 'DF',
                                            'ES' => 'ES',
                                            'GO' => 'GO',
                                            'MA' => 'MA',
                                            'MT' => 'MT',
                                            'MS' => 'MS',
                                            'MG' => 'MG',
                                            'PA' => 'PA',
                                            'PB' => 'PB',
                                            'PR' => 'PR',
                                            'PE' => 'PE',
                                            'PI' => 'PI',
                                            'RJ' => 'RJ',
                                            'RN' => 'RN',
                                            'RS' => 'RS',
                                            'RO' => 'RO',
                                            'RR' => 'RR',
                                            'SC' => 'SC',
                                            'SP' => 'SP',
                                            'SE' => 'SE',
                                            'TO' => 'TO'
                                        );
                                        foreach ($states as $abbr => $name) {
                                            echo "<option value=\"$abbr\">$name</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <!-- 1 Coluna -->
                            <div class="grid gap-6 mb-6 lg:grid-cols-7">
                                <div class="lg:col-span-6 block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                                    <label for="address_line">Endereço</label>
                                    <input type="text" id="address_line" name="address_line" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Rua dos Alfeneiros">
                                </div>
                                <div class="lg:col-span-1 block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                                    <label for="number">Número</label>
                                    <input type="text" id="number" name="number" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="12">
                                </div>
                            </div>
                            <div class="lg:col-span-3 block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                                <label for="status">Status</label>
                                <select id="status" name="status" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <option value="active">Ativo</option>
                                        <option value="inactive">Inativo</option>
                                </select>
                            </div>
                            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Cadastrar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>