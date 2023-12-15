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
        <table class="w-full table-fixed border-separate border-spacing-y-2 border-spacing-x-2 px-2 text-xs md:border-spacing-x-4 md:px-4 md:text-base">
            <thead class="text-left">
                <tr class="">
                    <th class="w-[15%]">Cover</th>
                    <th class="w-[20%] md:w-[35%]">Title</th>
                    <th class="w-[15%]">Status</th>
                    <th class="w-[15%]">Edit</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($books as $book): ?>
                <tr>
                    <td>
                        <img src="<?=$book->CoverURL?>" alt="Image" class="h-24 w-full object-fill md:h-48" />
                    </td>
                    <td class="">
                        <div class="flex flex-col">
                            <h3 class="text-sm font-bold md:text-lg"><?=$book->Title?></h3>
                            <h4 class="text-sm"><?=$book->Author?>, <?=$book->ReleaseYear?></h4>
                            <span class="text-xs">Edisi ke-<?=$book->Edition?></span>
                        </div>
                    </td>
                    <td>
                        <div class="flex flex-col gap-2">
                            <h3 class="<?=$book->Borrowed ? 'bg-[#7B9CC5]' : 'bg-[#052355]'?> rounded-md py-1 px-1 text-center text-white md:px-2">
                                <?=$book->Borrowed ? 'Tidak Tersedia' : 'Tersedia'?></h3>
                            <div class="<?=$book->Borrowed ? 'hidden' : 'flex'?> flex-row items-center text-sm">
                                <img src="/assets/map-pin.svg" alt="Image" />
                                <span>
                                    <?=$book->Bookshelf?>
                                </span>
                            </div>
                        </div>
                    </td>
                    <td>
                        <a href="/buku?id=<?=$book->ID?>" class="w-max rounded-md border border-[#517DAB] py-1 px-2 shadow-md md:border-2">
                            Preview
                        </a>
                    </td>
                </tr>
                <?php endforeach;?>
            </tbody>
        </table>
    </div>
</body>