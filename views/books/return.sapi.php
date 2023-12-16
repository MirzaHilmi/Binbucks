<body class="pattern-cross pattern-blue-500 pattern-bg-white pattern-size-6 pattern-opacity-20">
 
<?php if (isset($_SESSION['flash']['message']['value'])): ?>
  <div class="absolute top-4 right-4 z-50 flex items-center justify-between p-5 leading-normal text-blue-600 bg-blue-100 rounded-lg" role="alert">
    <p>
      <?=$_SESSION['flash']['message']['value']?>
    </p>
    <svg onclick="return this.parentNode.remove();" class="inline w-4 h-4 fill-current ml-2 hover:opacity-80 cursor-pointer" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
      <path d="M256 0C114.6 0 0 114.6 0 256s114.6 256 256 256s256-114.6 256-256S397.4 0 256 0zM256 464c-114.7 0-208-93.31-208-208S141.3 48 256 48s208 93.31 208 208S370.7 464 256 464zM359.5 133.7c-10.11-8.578-25.28-7.297-33.83 2.828L256 218.8L186.3 136.5C177.8 126.4 162.6 125.1 152.5 133.7C142.4 142.2 141.1 157.4 149.7 167.5L224.6 256l-74.88 88.5c-8.562 10.11-7.297 25.27 2.828 33.83C157 382.1 162.5 384 167.1 384c6.812 0 13.59-2.891 18.34-8.5L256 293.2l69.67 82.34C330.4 381.1 337.2 384 344 384c5.469 0 10.98-1.859 15.48-5.672c10.12-8.562 11.39-23.72 2.828-33.83L287.4 256l74.88-88.5C370.9 157.4 369.6 142.2 359.5 133.7z" />
    </svg>
  </div>
  <?php endif;?>
 
  <div class="pt-24 pl-0 md:pl-[20%]">
 
    <form method="POST" action="/buku/pengembalian">
      <input type="hidden" name="_method" value="PATCH">
      <div class="flex w-full flex-col justify-center gap-4 px-8 sm:px-16 md:px-40">
        <h1 class="text-center text-4xl font-bold">Pengembalian Buku</h1>
        <div class="flex flex-col gap-2">
          <h3>Kode ISBN</h3>
          <input type="text" name="isbn" id="isbn" class="p-2 rounded-md border-2 border-[#274472]" placeholder="Isi dengan Kode ISBN">
        </div>
        <div class="flex flex-col gap-2">
          <h3>Nama Peminjam</h3>
          <input type="text" name="borrowerName" id="borrowerName" class="p-2 rounded-md border-2 border-[#274472]" placeholder="Nama Peminjam Buku">
        </div>
        <div class="justify-start">
          <button class="w-max bg-[#274472] py-2 px-4 text-white duration-200 hover:scale-105">Kembalikan Buku</button>
        </div>
      </div>
    </form>
 
  </div>
 
</body>