@props([
    'id' => null,
    'title' => null,
    'message' => null,
    'confirm' => 'Hapus',
    'action' => null,
    'method' => 'DELETE',
    'triggerClass' => null,
    'modalClass' => 'bg-white rounded-lg shadow-lg max-w-sm w-full p-6 z-50',
])

<div x-data="{ showModal_{{ $id }}: false }">
    {{-- Trigger Button --}}


    <button type="button"
        @click="showModal_{{ $id }} = true"
        class="{{ $triggerClass }}">
        {{ $trigger ?? 'Hapus' }}
    </button>

    {{-- Modal Background --}}
    <div x-show="showModal_{{ $id }}"
         x-cloak
         class="fixed z-40 inset-0 bg-black bg-opacity-30 flex items-center justify-center transition-all duration-300 ease-out">

        {{-- Modal Box --}}
        <div @click.away="showModal_{{ $id }} = false" class="{{ $modalClass }}">
            <h3 class="text-lg font-semibold text-gray-800 mb-2">{{ $title ?? 'Konfirmasi' }}</h3>
            <p class="text-sm text-gray-600 mb-4">{{ $message ?? 'Apakah Anda yakin ingin melakukan ini?' }}</p>

            {{-- Custom Slot Content (Optional) --}}
            @isset($slot)
                <div class="mb-4">
                    {{ $slot }}
                </div>
            @endisset

            {{-- Actions --}}
            <div class="flex justify-end gap-2">
                <button @click="showModal_{{ $id }} = false"
                        class="px-3 py-1 rounded-md bg-gray-200 hover:bg-gray-300 text-sm text-gray-700">
                    Batal
                </button>

                <form method="POST" action="{{ $action }}">
                    @csrf
                    @method($method)

                    <button type="submit"
                            class="px-3 py-1 rounded-md bg-red-600 hover:bg-red-700 text-white text-sm">
                        {{ $confirm }}
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

