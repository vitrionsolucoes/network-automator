<div class="mt-2 flex justify-center items-center">
    <form method="get" action="{{ $formAction }}" class="inline-flex justify-between items-center">
        <div class="flex items-center flex-grow pl-6">
            <label for="search" class="font-medium text-gray-900 pr-2">Busca:</label>
            <div class="flex-grow">
                <input type="text" name="search" id="search"
                    class="border border-gray-400 rounded-md py-2 px-3 w-full pl-2">
            </div>
        </div>
        @if (isset($showFilter) && $showFilter)
        <div class="pl-3 pr-3 flex items-center">
            <label for="filter" class="font-medium text-gray-900">Filtro:</label>
            <select name="filter" id="filter" class="border border-gray-400 rounded-md py-2 px-3"
                onchange="this.form.submit();">
                <option value="all">Todos</option>
                <option value="active">Ativos</option>
                <option value="inactive">Inativos</option>
            </select>
        </div>
        @endif
        <div class="p-2">
            <x-secondary-button type="submit" class="cursor-pointer">
                {{ __('Buscar') }}
            </x-secondary-button>
        </div>
    </form>
    <div class="p-2">
        <a href="{{ $resetUrl }}">
            <x-secondary-button type="reset" class="cursor-pointer">
                {{ __('Limpar') }}
            </x-secondary-button>
        </a>
    </div>
</div>