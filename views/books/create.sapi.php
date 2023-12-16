<body>
    <?php if (isset($_SESSION['flash']['message']['value'])): ?>
    <div onclick="return this.remove();" class="absolute top-4 right-4 z-50 flex items-center justify-between p-5 leading-normal text-blue-600 bg-blue-100 rounded-lg" role="alert">
        <p>
            <?=$_SESSION['flash']['message']['value']?>
        </p>
        <svg class="inline w-4 h-4 fill-current ml-2 hover:opacity-80 cursor-pointer" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
            <path d="M256 0C114.6 0 0 114.6 0 256s114.6 256 256 256s256-114.6 256-256S397.4 0 256 0zM256 464c-114.7 0-208-93.31-208-208S141.3 48 256 48s208 93.31 208 208S370.7 464 256 464zM359.5 133.7c-10.11-8.578-25.28-7.297-33.83 2.828L256 218.8L186.3 136.5C177.8 126.4 162.6 125.1 152.5 133.7C142.4 142.2 141.1 157.4 149.7 167.5L224.6 256l-74.88 88.5c-8.562 10.11-7.297 25.27 2.828 33.83C157 382.1 162.5 384 167.1 384c6.812 0 13.59-2.891 18.34-8.5L256 293.2l69.67 82.34C330.4 381.1 337.2 384 344 384c5.469 0 10.98-1.859 15.48-5.672c10.12-8.562 11.39-23.72 2.828-33.83L287.4 256l74.88-88.5C370.9 157.4 369.6 142.2 359.5 133.7z" />
        </svg>
    </div>
    <?php endif;?>

    <?php use Saphpi\Core\Application;require Application::$ROOT_DIR . '/views/components/searchbar.sapi.php'?>

    <div class="w-full pt-24 md:pl-[20%]">
        <div class="py-8 px-4 mx-auto max-w-2xl lg:py-16">
            <h2 class="mb-4 text-xl font-bold text-gray-900">Simpan Buku ke dalam Katalog Sistem</h2>
            <form action="/buku/simpan" method="POST" enctype="multipart/form-data">
                <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                    <div class="sm:col-span-2">
                        <label for="title" class="block mb-2 text-sm font-medium text-gray-900">Judul</label>
                        <input type="text" name="title" id="title" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="Fill the field" required>
                    </div>
                    <div class="w-full">
                        <label for="isbn" class="block mb-2 text-sm font-medium text-gray-900">ISBN</label>
                        <input type="text" name="isbn" id="isbn" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="Fill the field" required>
                    </div>
                    <div class="w-full">
                        <label for="releaseYear" class="block mb-2 text-sm font-medium text-gray-900">Tahun Terbit</label>
                        <input type="text" name="releaseYear" id="releaseYear" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="Fill the field" required>
                    </div>
                    <div class="sm:col-span-2">
                        <label for="authorName" class="block mb-2 text-sm font-medium text-gray-900">Penulis</label>
                        <input type="text" name="authorName" id="authorName" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="Fill the field" required>
                    </div>
                    <div class="sm:col-span-2">
                        <label for="authorBio" class="block mb-2 text-sm font-medium text-gray-900">Biografi Penulis</label>
                        <textarea id="authorBio" name="authorBio" rows="3" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500" placeholder="Fill the field" required></textarea>
                    </div>
                    <div class="w-full">
                        <label for="publisher" class="block mb-2 text-sm font-medium text-gray-900">Penerbit</label>
                        <input type="text" name="publisher" id="publisher" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="Fill the field" required>
                    </div>
                    <div class="w-full">
                        <label for="publisherOrigin" class="block mb-2 text-sm font-medium text-gray-900">Kota Diterbitkan</label>
                        <input type="text" name="publisherOrigin" id="publisherOrigin" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="Fill the field" required>
                    </div>
                    <div class="w-full">
                        <label for="edition" class="block mb-2 text-sm font-medium text-gray-900">Edisi</label>
                        <input type="text" name="edition" id="edition" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="Fill the field" required>
                    </div>
                    <div class="w-full">
                        <label for="language" class="block mb-2 text-sm font-medium text-gray-900">Bahasa</label>
                        <input type="text" name="language" id="language" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="Fill the field" required>
                    </div>
                    <div class="w-full">
                        <label for="pages" class="block mb-2 text-sm font-medium text-gray-900">Jumlah Halaman</label>
                        <input type="number" name="pages" id="pages" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="Fill the field" required>
                    </div>
                    <div class="w-full">
                        <label for="bookshelf" class="block mb-2 text-sm font-medium text-gray-900">Lokasi Rak Buku</label>
                        <input type="text" name="bookshelf" id="bookshelf" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="Fill the field" required>
                    </div>
                    <div class="sm:col-span-2">
                        <label class="block mb-2 text-sm font-medium text-gray-900" for="file_input">Upload file</label>
                        <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50" aria-describedby="file_input_help" id="file_input" name="coverPicture" type="file" required>
                        <p class="mt-1 text-sm text-gray-500" id="file_input_help">SVG, PNG, JPG or GIF (MAX. 800x400px).</p>
                    </div>
                    <div class="sm:col-span-2">
                        <label for="synopsis" class="block mb-2 text-sm font-medium text-gray-900">Sinopsis</label>
                        <textarea name="synopsis" id="synopsis" rows="3" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500" placeholder="Fill the field" required></textarea>
                    </div>
                    <div class="w-full flex justify-between">
                        <div>
                            <label for="hardCopy" class="text-sm font-medium text-gray-900">Hard Copy</label>
                            <input type="checkbox" name="hardCopy" id="hardCopy">
                        </div>
                        <div>
                            <label for="eBook" class="text-sm font-medium text-gray-900">E-Book</label>
                            <input type="checkbox" name="eBook" id="eBook">
                        </div>
                        <div>
                            <label for="audioBook" class="text-sm font-medium text-gray-900">Audio Book</label>
                            <input type="checkbox" name="audioBook" id="audioBook">
                        </div>
                    </div>
                </div>
                <button type="submit" class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-blue-700 rounded-lg focus:ring-4 focus:ring-primary-200 hover:bg-blue-800">
                    Simpan
                </button>
            </form>
        </div>
    </div>
</body>