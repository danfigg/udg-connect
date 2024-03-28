<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create Evento') }}
        </h2>
    </x-slot>
    <div class="flex justify-center">
        <!--Change comunidad_id to the id of the community you want to create a post in-->
      <button class="mt-4 inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150" 
      onclick="Livewire.dispatch('openModal', { component: 'create-evento', arguments: {comunidad_id:1, }})">Crear Evento</button>
    </div>
    @livewire('wire-elements-modal')
</x-app-layout>