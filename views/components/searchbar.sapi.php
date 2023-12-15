<div class="fixed z-10 flex h-20 w-full flex-row items-center justify-between bg-white px-4 py-4 shadow-sm md:pl-[20%]">
  <div class="ml-4 flex h-full flex-1 flex-row items-center gap-2 overflow-hidden rounded-full border-2 border-slate-300">
    <div class="hidden h-full items-center bg-slate-100 px-4 sm:flex">
      <h3>Semua</h3>

    </div>
    <form action="/buku" class="flex-1">

      <input type="text" name="query" value="<?=$_GET['query'] ? $_GET['query'] : ''?>" class="flex w-full flexs-1 border-0 bg-transparent outline-none focus:border-0 focus:outline-none" placeholder="Pencarian">

    </form>
    <img src="/assets/Search.svg" alt="Image" class="mr-4" />
  </div>
  <div class="ml-4 hidden h-full flex-row items-center justify-center gap-4 overflow-hidden rounded-full border-2 border-slate-300 px-4 md:flex">
    <div class="flex flex-row items-center">
      <img src="/assets/Vector.svg" alt="Image" class="mr-2" />
      <h3 id="time"></h3>
    </div>
    <div class="flex flex-row items-center">
      <img src="/assets/Vector2.svg" alt="Image" class="mr-2" />
      <h3><?=date('d-m-Y')?></h3>
    </div>
  </div>
</div>