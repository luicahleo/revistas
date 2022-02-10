<div>

    <div class="flex justify-between gap-3 mt-2">
        <span class="w-1/2">
            <x-jet-label value="Id de la revista" />
            <x-jet-input type="text" wire:model.defer="id_revista" placeholder="{{ $collection }}"
                value="{{ $collection }}" disabled />
        </span>
    </div>

    <div class="flex justify-between gap-3 mt-2">
        <span class="w-1/2">
            <x-jet-label value="Año" />
            <x-jet-input type="text" wire:model.defer="anyo" />
            <x-jet-input-error for="anyo" />

        </span>
        <span class="w-1/2">
            <x-jet-label value="Volumen" />
            <x-jet-input type="text" wire:model.defer="volumen" />

        </span>
    </div>
    <div class="flex justify-between gap-3 mt-2">
        <span class="w-1/2">
            <x-jet-label value="Enero" />
            <x-jet-input type="text" wire:model.defer="ene" />

        </span>
        <span class="w-1/2">
            <x-jet-label value="Febrero" />
            <x-jet-input type="text" wire:model.defer="feb" />

        </span>
    </div>
    <div class="flex justify-between gap-3 mt-2">
        <span class="w-1/2">
            <x-jet-label value="Marzo" />
            <x-jet-input type="text" wire:model.defer="mar" />

        </span>
        <span class="w-1/2">
            <x-jet-label value="Abril" />
            <x-jet-input type="text" wire:model.defer="abr" />

        </span>
    </div>
    <div class="flex justify-between gap-3 mt-2">
        <span class="w-1/2">
            <x-jet-label value="Mayo" />
            <x-jet-input type="text" wire:model.defer="may" />

        </span>
        <span class="w-1/2">
            <x-jet-label value="Junio" />
            <x-jet-input type="text" wire:model.defer="jun" />

        </span>
    </div>
    <div class="flex justify-between gap-3 mt-2">
        <span class="w-1/2">
            <x-jet-label value="Julio" />
            <x-jet-input type="text" wire:model.defer="jul" />

        </span>
        <span class="w-1/2">
            <x-jet-label value="Agosto" />
            <x-jet-input type="text" wire:model.defer="ago" />

        </span>
    </div>
    <div class="flex justify-between gap-3 mt-2">
        <span class="w-1/2">
            <x-jet-label value="Septiembre" />
            <x-jet-input type="text" wire:model.defer="sep" />

        </span>
        <span class="w-1/2">
            <x-jet-label value="Octubre" />
            <x-jet-input type="text" wire:model.defer="oct" />

        </span>
    </div>
    <div class="flex justify-between gap-3 mt-2">
        <span class="w-1/2">
            <x-jet-label value="Noviembre" />
            <x-jet-input type="text" wire:model.defer="nov" />

        </span>
        <span class="w-1/2">
            <x-jet-label value="Diciembre" />
            <x-jet-input type="text" wire:model.defer="dic" />

        </span>
    </div>
    <div class="flex justify-between gap-3 mt-2">
        <span class="w-1/2">
            <x-jet-label value="Observaciones" />
            <x-jet-input type="text" wire:model.defer="observaciones" />

        </span>
    </div>

</div>
