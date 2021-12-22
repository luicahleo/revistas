<x-app-layout>

    {{-- Portada --}}
    <section class="bg-cover"
        style="background-image: url({{ asset('img/revistas/index/magazines-4783887_1280.jpg') }})">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-36">
            <div class="w-full md:w-3/4 lg:w-1/2">
                <h1 class="text-white font-bold text-4xl">Listado de revistas</h1>
                <p class="text-white text-lg mt-2 mb-4">Visita nuestras nuevas revistas</p>

                <!-- component -->
                <div class="pt-2 relative mx-auto text-gray-600">

                    @livewire('search')

                </div>
            </div>
        </div>
    </section>

    {{-- @livewire('revistas-index') --}}

</x-app-layout>