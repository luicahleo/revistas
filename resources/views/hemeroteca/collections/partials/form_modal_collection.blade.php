
<div>

    <div class="flex justify-between gap-3 mt-2">
        <span class="w-1/2">
            <x-jet-label value="Id de la revista" />
            <x-jet-input type="text" wire:model="id_revista"/>
            {{$id_revista}}
        </span>
    </div>

    <div class="flex justify-between gap-3 mt-2">
        <span class="w-1/2">
            <x-jet-label value="Año" />
            <x-jet-input type="text" wire:model="anyo" />
            {{$anyo}}

        </span>
        <span class="w-1/2">
            <x-jet-label value="Volumen" />
            <x-jet-input type="text" wire:model="volumen"/>
            {{$volumen}}

        </span>
    </div>
    <div class="flex justify-between gap-3 mt-2">
        <span class="w-1/2">
            <x-jet-label value="Enero" />
            <x-jet-input type="text" wire:model="enero"/>
            {{$enero}}

        </span>
        <span class="w-1/2">
            <x-jet-label value="Febrero" />
            <x-jet-input type="text" wire:model="febrero"/>
            {{$febrero}}

        </span>
    </div>
    <div class="flex justify-between gap-3 mt-2">
        <span class="w-1/2">
            <x-jet-label value="Marzo" />
            <x-jet-input type="text" wire:model="marzo"/>
            {{$marzo}}

        </span>
        <span class="w-1/2">
            <x-jet-label value="Abril" />
            <x-jet-input type="text" wire:model="abril"/>
            {{$abril}}

        </span>
    </div>
    <div class="flex justify-between gap-3 mt-2">
        <span class="w-1/2">
            <x-jet-label value="Mayo" />
            <x-jet-input type="text" wire:model="mayo"/>
            {{$mayo}}

        </span>
        <span class="w-1/2">
            <x-jet-label value="Junio" />
            <x-jet-input type="text" wire:model="junio"/>
            {{$junio}}

        </span>
    </div>

</div>
