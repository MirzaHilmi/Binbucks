<body>
  <?php if (isset($_SESSION['flash']['message']['value'])): ?>
  <div class="absolute top-4 right-4 flex items-center justify-between p-5 leading-normal text-blue-600 bg-blue-100 rounded-lg" role="alert">
    <p>
      <?=$_SESSION['flash']['message']['value']?>
    </p>
    <svg onclick="return this.parentNode.remove();" class="inline w-4 h-4 fill-current ml-2 hover:opacity-80 cursor-pointer" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
      <path d="M256 0C114.6 0 0 114.6 0 256s114.6 256 256 256s256-114.6 256-256S397.4 0 256 0zM256 464c-114.7 0-208-93.31-208-208S141.3 48 256 48s208 93.31 208 208S370.7 464 256 464zM359.5 133.7c-10.11-8.578-25.28-7.297-33.83 2.828L256 218.8L186.3 136.5C177.8 126.4 162.6 125.1 152.5 133.7C142.4 142.2 141.1 157.4 149.7 167.5L224.6 256l-74.88 88.5c-8.562 10.11-7.297 25.27 2.828 33.83C157 382.1 162.5 384 167.1 384c6.812 0 13.59-2.891 18.34-8.5L256 293.2l69.67 82.34C330.4 381.1 337.2 384 344 384c5.469 0 10.98-1.859 15.48-5.672c10.12-8.562 11.39-23.72 2.828-33.83L287.4 256l74.88-88.5C370.9 157.4 369.6 142.2 359.5 133.7z" />
    </svg>
  </div>
  <?php endif;?>

  <?php use Saphpi\Core\Application;require Application::$ROOT_DIR . '/views/components/searchbar.sapi.php'?>

  <div class="w-full pt-24 md:pl-[20%]">

    <div class="flex flex-col gap-4 px-2 md:px-8">
      <a href="/buku" class="flex flex-row items-center gap-2">
        <img src="/assets/back.svg" alt="Image" class="" />
        <span>Kembali</span>
      </a>
      <div class="flex flex-col gap-4 md:flex-row md:gap-0">
        <div class="flex w-full flex-col md:w-[60%]">
          <div class="flex flex-row gap-4">
            <img src="<?=$book->CoverURL?>" alt="Image" class="w-24 sm:w-40" />
            <div class="flex w-full flex-col justify-between">
              <div class="flex flex-col">
                <h1 class="text-lg md:text-2xl"><?=$book->Title?></h1>
                <h3 class="text-slate-700"><?=$book->Author?>, <?=$book->ReleaseYear?></h3>
                <h3 class="text-slate-500">Edisi ke-<?=$book->Edition?></h3>
                <span class="flex flex-row items-center text-sm">
                  <img src="/assets/Star.svg" alt="Image" class="h-4 w-4" />
                  <img src="/assets/Star.svg" alt="Image" class="h-4 w-4" />
                  <img src="/assets/Star.svg" alt="Image" class="h-4 w-4" />
                  <img src="/assets/Star.svg" alt="Image" class="h-4 w-4" />
                  <img src="/assets/Star.svg" alt="Image" class="h-4 w-4" />
                  <span class="ml-2">
                    <?=$book->Rating?> Penilaian
                  </span>
                </span>
                <span class="text-sm">
                  Dipinjam
                  <strong><?=$borrowedTimes?> Kali</strong>
                </span>
                <span class="text-sm">
                  Dilihat
                  <strong><?=$book->Views?> Kali</strong>
                </span>
              </div>
              <div class="flex flex-col">
                <span class="font-bold">Status</span>
                <span class="<?=$book->Borrowed ? 'bg-slate-400' : 'bg-[#42BB4E]'?> w-fit rounded-md py-1 px-4 text-white">
                  <?=$book->$Borrowed ? 'Tidak Tersedia' : 'Tersedia'?></span>
              </div>
            </div>
          </div>
          <div class="mt-4 flex flex-row gap-8 text-slate-700">
            <button class="flex h-full flex-col items-center justify-between text-sm font-bold">
              <img src="/assets/reviews.svg.svg" alt="Image" class="h-8" />
              Review
            </button>
            <button class="flex h-full flex-col items-center justify-between text-sm font-bold">
              <img src="/assets/notes.svg.svg" alt="Image" class="h-8" />
              Notes
            </button>
            <button class="flex h-full flex-col items-center justify-between text-sm font-bold">
              <img src="/assets/share.svg.svg" alt="Image" class="h-8" />
              Share
            </button>

            <?php if (isset($_SESSION['user'])): ?>
            <form action="/book" style="display: inline;">
              <input type="hidden" name="_method" value="DELETE" />
              <input type="text" name="id" id="id" class="hidden" value="<?=$book->ID?>">
              <button type="submit" class="flex h-full flex-col items-center justify-between text-sm font-bold">
                <img src="/assets/trash.svg" alt="Image" class="h-8" style="margin-top: 0.05rem; width: 1.4rem" />
                Delete
              </button>
            </form>
            <?php endif;?>
          </div>
        </div>
        <div class="flex w-full flex-col gap-1 md:w-[40%]">
          <h2 class="text-lg font-bold"><span class="text-[#F27851]">Tentang</span> <span>Penulis</span></h2>
          <h2 class="text-lg text-slate-600"><?=$book->Author?></h2>
          <p class="text-sm text-slate-600"><?=$book->AuthorBio?></p>
          <div class="flex flex-1 flex-col justify-end">

            <h2 class="font-bold text-slate-800">Buku Lainnya</h2>
            <div class="flex flex-row gap-4">
              <?php foreach ($randoms as $randomBook): ?>
              <a href="/book?id=<?=$randomBook->ID?>" class="flex items-center justify-center">
                <img src="<?=$randomBook->CoverURL?>" alt="Image" class="h-24" />
              </a>
              <?php endforeach;?>
            </div>
          </div>
        </div>
      </div>
      <div class="flex w-full flex-row gap-4">
        <button class="flex flex-1 justify-center border-b-2">Overview</button>
      </div>
      <div class="flex w-full flex-col" :class="{ 'flex': activeTab == 'overview', 'hidden': activeTab != 'overview' }">
        <div class="flex flex-col gap-1 text-xs text-slate-600 md:flex-row md:gap-4 md:text-sm">
          <div class="flex w-full flex-row">

            <div class="flex flex-1 flex-col items-center justify-center border py-1 px-2 md:py-2 md:px-4">
              <span>Tahun Terbit</span>
              <span>
                <?=$book->ReleaseYear?>
              </span>

            </div>
            <div class="flex flex-1 flex-col items-center justify-center border py-1 px-2 md:py-2 md:px-4">
              <span>Penerbit</span>
              <span class="text-center">
                <?=$book->Publisher?>
              </span>

            </div>
          </div>
          <div class="flex w-full flex-row">
            <div class="flex flex-1 flex-col items-center justify-center border py-1 px-2 md:py-2 md:px-4">
              <span>Bahasa</span>
              <span>
                <?=$book->Language?>
              </span>

            </div>
            <div class="flex flex-1 flex-col items-center justify-center border py-1 px-2 md:py-2 md:px-4">
              <span>Halaman</span>
              <span>
                <?=$book->Pages?>
              </span>
            </div>
          </div>
        </div>
        <h3>Previews available in: <?=$book->HardCopy ? 'Hard Copy' : null?>
          <?=$book->EBook ? 'Ebook' : null?>
          <?=$book->AudioBook ? 'Audio Book' : null?>
        </h3>
        <p class="my-4 text-sm"><?=$book->Synopsis?></p>
        <div class="flex w-full flex-col gap-4 sm:flex-row">
          <div class="flex w-full flex-col gap-4 border border-slate-600 p-8">
            <h2 class="text-xl font-bold">Detail Buku</h2>
            <div class="flex flex-col">
              <h3 class="text-sm font-bold">Diterbitkan di:</h3>
              <span class="text-sm"><?=$book->PublisherOrigin?></span>
            </div>
          </div>
          <div class="flex w-full flex-col gap-2 border border-slate-600 p-8">
            <h2 class="mb-2 text-xl font-bold">Community Reviews</h2>
            <div class="flex flex-row items-center gap-4">
              <h3 class="text-sm font-bold">Pace</h3>
              <span class="rounded-full border-2 px-2 py-1 text-sm">Meandering 100%</span>
            </div>
            <div class="flex flex-row items-center gap-4">
              <h3 class="text-sm font-bold">Enjoyability</h3>
              <span class="rounded-full border-2 px-2 py-1 text-sm">Interesting 100%</span>
            </div>
            <div class="flex flex-row items-center gap-4">
              <h3 class="text-sm font-bold">Difficulty</h3>
              <span class="rounded-full border-2 px-2 py-1 text-sm">Advanced 100%</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>