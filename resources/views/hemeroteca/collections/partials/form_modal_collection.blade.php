
<div>

    <div class="flex justify-between gap-3 mt-2">
        <span class="w-1/2">
            <x-jet-label value="Id de la revista" />
            <x-jet-input type="text" wire:model.defer="id_revista" placeholder="{{$collection}}" value="{{$collection}}" disabled/>
        </span>
    </div>

    <div class="flex justify-between gap-3 mt-2">
        <span class="w-1/2">
            <x-jet-label value="Año" />
            <x-jet-input type="text" wire:model.defer="anyo" />
            <x-jet-input-error for="anyo"/>

        </span>
        <span class="w-1/2">
            <x-jet-label value="Volumen" />
            <x-jet-input type="text" wire:model.defer="volumen"/>

        </span>
    </div>
    <div class="flex justify-between gap-3 mt-2">
        <span class="w-1/2">
            <x-jet-label value="Enero" />
            <x-jet-input type="text" wire:model.defer="enero"/>

        </span>
        <span class="w-1/2">
            <x-jet-label value="Febrero" />
            <x-jet-input type="text" wire:model.defer="febrero"/>

        </span>
    </div>
    <div class="flex justify-between gap-3 mt-2">
        <span class="w-1/2">
            <x-jet-label value="Marzo" />
            <x-jet-input type="text" wire:model.defer="marzo"/>

        </span>
        <span class="w-1/2">
            <x-jet-label value="Abril" />
            <x-jet-input type="text" wire:model.defer="abril"/>

        </span>
    </div>
    <div class="flex justify-between gap-3 mt-2">
        <span class="w-1/2">
            <x-jet-label value="Mayo" />
            <x-jet-input type="text" wire:model.defer="mayo"/>

        </span>
        <span class="w-1/2">
            <x-jet-label value="Junio" />
            <x-jet-input type="text" wire:model.defer="junio"/>

        </span>
    </div>

</div>
