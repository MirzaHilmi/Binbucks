<body>
  <?php use Saphpi\Core\Application;require Application::$ROOT_DIR . '/views/components/searchbar.sapi.php'?>

  <div class="flex flex-col gap-4 px-4 pt-24 md:pl-[22%]">
    <div class="flex flex-col gap-4 md:flex-row">
      <div class="h-48 w-full rounded-lg bg-gradient-to-br from-[#062251] to-[#C2E8FF] p-6 text-white md:w-[30%]">
        <h3 class="font-bold">Quote Hari Ini</h3>
        <p>Buatlah hari ini lebih baik dari hari kemarin!</p>
      </div>
      <div class="flex h-48 w-full flex-row items-center gap-4 overflow-hidden rounded-lg md:w-[70%]">
        <div style="writing-mode: vertical-lr;" class="flex h-full w-12 items-center justify-center bg-[#799AC3] text-white">
          <h3 class="rotate-180 text-center">Rekomendasi</h3>
        </div>
        <div class="flex h-40 flex-row items-center justify-between gap-4">
          <?php foreach ($recommendations as $recommended): ?>
          <a href="/buku?id=<?=$recommended->ID?>" class="my-4 flex h-24 w-full items-center justify-center md:h-40 md:w-32">
            <img src="<?=$recommended->CoverURL?>" alt="Image" class="h-40 w-32 object-fill" />
          </a>
          <?php endforeach;?>
        </div>
      </div>
    </div>
    <div class="flex flex-col gap-4">
      <h2 class="text-2xl font-bold text-[#243F65]">Koleksi Buku</h2>
      <div class="grid w-full grid-cols-2 gap-8 sm:grid-cols-4 md:grid-cols-5">
        <?php foreach ($books as $book): ?>
        <a href="/buku?id=<?=$book->ID?>" class="flex flex-col items-center duration-200 hover:scale-105">
          <img src="<?=$book->CoverURL?>" alt="Image" class="h-52 w-full object-fill shadow-md" />
          <div class="flex w-full flex-col">
            <h3><?=$book->Title?></h3>
            <span class="text-sm text-slate-500"><?=$book->Author?>, <?=$book->ReleaseYear?></span>
            <span class="text-sm text-slate-500"><?=$book->Rating?>/5</span>
          </div>
        </a>
        <?php endforeach;?>
      </div>
    </div>
  </div>

</body>