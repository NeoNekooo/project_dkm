<!-- Improved Edit Image Modal -->
<div x-data="{
    showEdit: false,
    editData: {},
    previewUrl: null,
    openEditModal(item) {
        this.editData = {...item};
        this.previewUrl = `/storage/${item.path}`;
        this.showEdit = true;
        document.body.classList.add('overflow-hidden');
    },
    closeModal() {
        this.showEdit = false;
        document.body.classList.remove('overflow-hidden');
    },
    handleImageChange(event) {
        const file = event.target.files[0];
        if (file) {
            this.previewUrl = URL.createObjectURL(file);
        }
    }
}"
x-cloak
@keydown.window.escape="closeModal"
@edit-modal-open.window="openEditModal($event.detail)">

<!-- Modal Overlay -->
<div x-show="showEdit"
    x-transition:enter="ease-out duration-300"
    x-transition:enter-start="opacity-0"
    x-transition:enter-end="opacity-100"
    x-transition:leave="ease-in duration-200"
    x-transition:leave-start="opacity-100"
    x-transition:leave-end="opacity-0"
    class="fixed inset-0 z-50 flex items-center justify-center p-4"
    style="background-color: rgba(0,0,0,0.5); backdrop-filter: blur(2px);"
    @click.away="closeModal">

    <!-- Modal Content -->
    <div x-show="showEdit"
        x-transition:enter="ease-out duration-300"
        x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
        x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
        x-transition:leave="ease-in duration-200"
        x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
        x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
        class="relative bg-white rounded-xl shadow-xl w-full max-w-2xl max-h-[90vh] overflow-y-auto">

        <!-- Modal Header -->
        <div class="flex items-center justify-between p-6 border-b">
            <h3 class="text-2xl font-bold text-green-600">
                <i class="fas fa-image mr-2"></i>Edit Foto
            </h3>
            <button @click="closeModal" class="text-gray-500 hover:text-gray-700">
                <i class="fas fa-times text-xl"></i>
            </button>
        </div>

        <!-- Modal Body -->
        <div class="p-6">
            <form :action="`/admin/gallery/${editData.id}`" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="grid md:grid-cols-2 gap-6">
                    <!-- Image Preview Section -->
                    <div>
                        <label class="block font-medium mb-2">Pratinjau Gambar</label>
                        <div class="border-2 border-dashed border-gray-300 rounded-xl overflow-hidden">
                            <img :src="previewUrl" :alt="editData.name"
                                class="w-full h-64 object-cover"
                                @error="previewUrl = '/images/image-placeholder.png'">
                        </div>

                        <div class="mt-4">
                            <label class="block font-medium mb-2">Ganti Gambar</label>
                            <div class="relative">
                                <input type="file" name="image" id="imageInput"
                                    class="absolute inset-0 w-full h-full opacity-0 cursor-pointer"
                                    @change="handleImageChange">
                                <div class="border border-gray-300 rounded-lg p-4 text-center cursor-pointer hover:bg-gray-50 transition">
                                    <i class="fas fa-cloud-upload-alt text-3xl text-gray-400 mb-2"></i>
                                    <p class="text-sm text-gray-600">
                                        Klik untuk upload atau drag & drop<br>
                                        Format: JPG, PNG (Max 2MB)
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Form Fields Section -->
                    <div class="space-y-4">
                        <div>
                            <label for="name" class="block font-medium mb-1">Nama Foto</label>
                            <input type="text" id="name" name="name" x-model="editData.name"
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 transition">
                        </div>

                        <div>
                            <label for="tanggal" class="block font-medium mb-1">Tanggal</label>
                            <input type="date" id="tanggal" name="tanggal" x-model="editData.tanggal"
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 transition">
                        </div>

                        <div>
                            <label for="tag" class="block font-medium mb-1">Tag/Kategori</label>
                            <input type="text" id="tag" name="tag" x-model="editData.tag"
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 transition"
                                list="tagSuggestions">
                            <datalist id="tagSuggestions">
                                @foreach($tags as $tag)
                                <option value="{{ $tag }}">
                                @endforeach
                            </datalist>
                        </div>

                        <div class="pt-4">
                            <div class="flex items-center">
                                <input type="checkbox" id="featured" name="featured" x-model="editData.is_featured"
                                    class="h-4 w-4 text-green-600 focus:ring-green-500 border-gray-300 rounded">
                                <label for="featured" class="ml-2 block text-sm text-gray-700">
                                    Tampilkan sebagai foto utama
                                </label>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal Footer -->
                <div class="mt-8 flex justify-end gap-3 border-t pt-6">
                    <button @click="closeModal" type="button"
                        class="px-6 py-2 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition-colors">
                        Batal
                    </button>
                    <button type="submit"
                        class="px-6 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition-colors flex items-center">
                        <i class="fas fa-save mr-2"></i> Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
