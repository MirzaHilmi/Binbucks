<body>
  <script defer src="/scripts/borrow-modal.js"></script>
 
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
 
  <div class="w-full pt-24 pl-0 md:pl-[20%]">
    <table class="w-full table-fixed border-separate border-spacing-y-2 border-spacing-x-2 px-2 text-xs md:border-spacing-x-4 md:px-4 md:text-sm lg:text-base">
      <thead class="text-left">
        <tr class="">
          <th class="w-[10%]">Cover</th>
          <th class="w-[25%] md:w-[35%]">Judul</th>
          <th class="w-[35%]">Sinopsis</th>
          <th class="w-[15%]">Status</th>
          <th class="w-[15%]">Aksi</th>
        </tr>
      </thead>
      <tbody>
 
        <?php foreach ($books as $book): ?>
        <tr>
          <td>
            <img src="<?=$book->CoverURL?>" alt="Image" class="shadow-md" />
          </td>
          <td>
            <div class="flex flex-col">
              <h3 class="text-sm font-bold md:text-lg"><?=$book->Title?></h3>
              <h4 class="text-sm"><?=$book->Author?>, <?=$book->ReleaseYear?></h4>
              <span class="text-xs">ID:<?=$book->ID?> , Edisi ke-<?=$book->Edition?></span>
              <span class="text-xs">Kode:<?=$book->ISBN?></span>
            </div>
          </td>
          <td>
            <p class="text-xs"><?=$book->Synopsis?></p>
          </td>
          <td>
            <div class="flex flex-col gap-2">
              <h3 class="rounded-md <?=$book->Borrowed ? 'border border-[#052355] text-[#052355]' : 'bg-[#052355] text-white'?> py-1 px-1 text-center md:px-2"><?=$book->Borrowed ? 'Tidak Tersedia' : 'Tersedia'?></h3>
              <div class="flex flex-row items-center text-sm">
                <img src="/assets/map-pin.svg" alt="Image" />
                <span>
                  <?=$book->Bookshelf?>
                </span>
              </div>
            </div>
          </td>
          <td>
            <?php if (!$book->Borrowed): ?>
            <button onclick="toggleModal( <?=$book->ID?> )" class="w-max rounded-md border border-[#517DAB] py-1 px-2 shadow-md duration-200 hover:scale-105 md:border-2">
              Pinjam
            </button>
            <?php endif;?>
 
          </td>
        </tr>
        <?php endforeach;?>
      </tbody>
    </table>
 
    <div id="modal-overlay" class="hidden fixed top-0 right-0 bottom-0 left-0 bg-slate-800 opacity-50 z-40"></div>
 
    <!-- Main modal -->
    <div id="modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
      <div class="relative p-4 w-full max-w-md max-h-full top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow">
          <!-- Modal header -->
          <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
            <h3 class="text-lg font-semibold text-gray-900">
              Pinjam Buku
            </h3>
            <button onclick="toggleModal()" type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center">
              <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
              </svg>
            </button>
          </div>
          <!-- Modal body -->
          <form action="/buku/pinjam" method="POST" class="p-4 md:p-5">
            <input type="hidden" name="bookID" id="book-id">
            <div class="grid gap-4 mb-6 grid-cols-2">
              <div class="col-span-2">
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Nama</label>
                <input type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="Ketik nama lengkap" required="">
              </div>
              <div class="col-span-2">
                <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Email</label>
                <input type="text" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="Ketik alamat email" required="">
              </div>
              <div class="col-span-2 sm:col-span-1">
                <label for="borrowedDate" class="block mb-2 text-sm font-medium text-gray-900">Tanggal Pinjam</label>
                <input type="date" name="borrowedDate" id="borrowedDate" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="$2999" required="">
              </div>
              <div class="col-span-2 sm:col-span-1">
                <label for="dueDate" class="block mb-2 text-sm font-medium text-gray-900">Tanggal Kembali</label>
                <input type="date" name="dueDate" id="dueDate" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="$2999" required="">
              </div>
            </div>
            <button type="submit" class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
              <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path>
              </svg>
              Pinjam Sekarang
            </button>
          </form>
        </div>
      </div>
    </div>
 
  </div>
</body>
