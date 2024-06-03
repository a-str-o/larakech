@foreach($contacts as $contact)
<div id="delete-modal-{{ $contact->id }}" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full h-full bg-black bg-opacity-50">
    <div class="relative p-4 w-full max-w-md h-full md:h-auto">
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <button type="button" class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="delete-modal-{{ $contact->id }}">
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                </svg>
                <span class="sr-only">Close modal</span>
            </button>
            <div class="p-4 md:p-5 text-center">
                <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Confirmer la suppression</h3>
                <p>Êtes-vous sûr de vouloir supprimer ce contact ? Cette action est irréversible.</p>
                <form action="{{ route('contacts.destroy', $contact->id) }}" method="POST" class="mt-4 flex justify-end">
                    @csrf
                    @method('DELETE')
                    <button type="button" data-modal-hide="delete-modal-{{ $contact->id }}" class="px-4 py-2 bg-gray-500 text-white rounded mr-2">Annuler</button>
                    <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded">Supprimer</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach