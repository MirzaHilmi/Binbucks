<nav :class="{ 'flex': open, 'hidden': !open }" class="fixed z-20 h-screen w-[80%] flex-col items-center justify-between gap-4 border-b border-gray-100 bg-[#C2E8FF] p-4 md:flex md:w-[20%]">
  <div class="flex w-full flex-col">

    <div class="flex flex-col items-center gap-4 px-8 md:px-2">
      <div class="mb-4 p-8">
        <img src="/assets/logo1.png" alt="Image" />
      </div>
      <a class="flex w-full flex-row items-center gap-4" href="/">
        <img src="/assets/home.svg" alt="Image" class="w-4" />
        Beranda
      </a>
      <a class="flex w-full flex-row items-center gap-4" href="/buku">
        <img src="/assets/Bookshelf.svg" alt="Image" class="w-4" />
        Daftar Buku
      </a>
      <?php if (isset($_SESSION['user'])): ?>
      <a class="flex w-full flex-row items-center gap-4" href="/buku/pinjam">
        <img src="/assets/gift.svg" alt="Image" class="w-4" />
        Peminjaman Buku
      </a>
      <a class="flex w-full flex-row items-center gap-4" href="/buku/kembali">
        <img src="/assets/gift.svg" alt="Image" class="w-4" />
        Pengembalian Buku
      </a>
      <a class="flex w-full flex-row items-center gap-4" href="/buku/riwayat">
        <img src="/assets/riwayat.svg" alt="Image" class="w-4" />
        Riwayat
      </a>
      <?php endif;?>
    </div>
  </div>

  <div class="flex w-full flex-col px-8 md:px-2">
    <?php if (isset($_SESSION['user'])): ?>
    <form action="/logout">
      <button type="submit">
        Log Out
      </button>
    </form>
    <?php endif;?>

    <?php if (!isset($_SESSION['user'])): ?>
    <a href="/login">Login</a>
    <?php endif;?>

    <a class="flex w-full flex-row items-center gap-4" href="#">
      Tentang
    </a>

    <a class="flex w-full flex-row items-center gap-4" href="#">
      Syarat dan Ketentuan
    </a>

  </div>
</nav>