<div class='flex inline'>
    <div class="mr-6">
        <x-nav-link :href="route('device.index')" :active="request()->routeIs('device.index')">
            {{ __('Lista') }}
        </x-nav-link>
    </div>
    <div class="mr-6">
        <x-nav-link :href="route('device.group.index')" :active="request()->routeIs('device.group.index')">
            {{ __('Grupos') }}
        </x-nav-link>
    </div>
    <div class="mr-6">
        <x-nav-link :href="route('device.vendor.index')" :active="request()->routeIs('device.vendor.index')">
            {{ __('Fabricantes') }}
        </x-nav-link>
    </div>
    <div class="mr-6">
        <x-nav-link :href="route('device.model.index')" :active="request()->routeIs('device.model.index')">
            {{ __('Modelos') }}
        </x-nav-link>
    </div>
</div>