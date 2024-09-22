@props(['id', 'title' => 'Modal Title', 'maxWidth' => 'max-w-2xl'])

<div x-show="showModal" x-cloak class="fixed inset-0 z-50 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <div class="flex items-end justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">
        <!-- Overlay background -->
        <div x-show="showModal" class="fixed inset-0 transition-opacity" aria-hidden="true">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>

        <!-- Modal panel -->
        <div x-show="showModal" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
             x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
             x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
             x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
             class="inline-block align-bottom bg-white rounded-lg px-4 pt-5 pb-4 text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full sm:p-6">
            
            <!-- Modal Title -->
            <div>
                <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">
                    {{ $title }}
                </h3>
            </div>

            <!-- Modal Body (using default slot) -->
            <div class="mt-4">
                {{ $slot }}
            </div>

            <!-- Modal Footer (using named slot 'footer') -->
            <div class="mt-5 sm:mt-6 sm:flex sm:flex-row-reverse gap-2">
                {{ $footer }}
            </div>
        </div>
    </div>
</div>

