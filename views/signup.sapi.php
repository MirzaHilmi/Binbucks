<?php if (isset($_SESSION['flash']['message']['value'])): ?>
<div class="absolute top-4 right-4 flex items-center justify-between p-5 leading-normal text-blue-600 bg-blue-100 rounded-lg" role="alert">
	<p><?=$_SESSION['flash']['message']['value']?></p>
	<svg onclick="return this.parentNode.remove();" class="inline w-4 h-4 fill-current ml-2 hover:opacity-80 cursor-pointer" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
	  <path d="M256 0C114.6 0 0 114.6 0 256s114.6 256 256 256s256-114.6 256-256S397.4 0 256 0zM256 464c-114.7 0-208-93.31-208-208S141.3 48 256 48s208 93.31 208 208S370.7 464 256 464zM359.5 133.7c-10.11-8.578-25.28-7.297-33.83 2.828L256 218.8L186.3 136.5C177.8 126.4 162.6 125.1 152.5 133.7C142.4 142.2 141.1 157.4 149.7 167.5L224.6 256l-74.88 88.5c-8.562 10.11-7.297 25.27 2.828 33.83C157 382.1 162.5 384 167.1 384c6.812 0 13.59-2.891 18.34-8.5L256 293.2l69.67 82.34C330.4 381.1 337.2 384 344 384c5.469 0 10.98-1.859 15.48-5.672c10.12-8.562 11.39-23.72 2.828-33.83L287.4 256l74.88-88.5C370.9 157.4 369.6 142.2 359.5 133.7z"/>
	</svg>
</div>
<?php endif;?>

<div class="flex items-center justify-center">

    <form method="POST" action="/signup" class="max-w-md w-full bg-white p-6 rounded-md shadow-md">

        <!-- Name -->
        <div class="mb-4">
            <label for="name" class="text-sm font-medium text-gray-600">Name</label>
            <input id="name" type="text" name="name" class="mt-1 p-2 w-full border rounded-md focus:outline-none focus:border-blue-500" required autofocus autocomplete="name">
            <?php if (isset($_SESSION['flash']['errors']['value']['name'])): ?>
            <p class="text-red-500 text-xs mt-2"><?=$_SESSION['flash']['errors']['value']['name']?></p>
            <?php endif;?>
        </div>

        <!-- Email Address -->
        <div class="mb-4">
            <label for="email" class="text-sm font-bold text-gray-600">Email</label>
            <input id="email" type="text" name="email" class="mt-1 p-2 w-full border rounded-md focus:outline-none focus:border-blue-500" required autocomplete="username">
            <?php if (isset($_SESSION['flash']['errors']['value']['email'])): ?>
            <p class="text-red-500 text-xs mt-2"><?=$_SESSION['flash']['errors']['value']['email']?></p>
            <?php endif;?>
        </div>

        <!-- Password -->
        <div class="mb-4">
            <label for="password" class="text-sm font-bold text-gray-600">Password</label>
            <input id="password" type="password" name="password" class="mt-1 p-2 w-full border rounded-md focus:outline-none focus:border-blue-500" required autocomplete="new-password">
            <?php if (isset($_SESSION['flash']['errors']['value']['password'])): ?>
            <p class="text-red-500 text-xs mt-2"><?=$_SESSION['flash']['errors']['value']['password']?></p>
            <?php endif;?>
        </div>

        <!-- Confirm Password -->
        <div class="mb-4">
            <label for="passwordConfirmation" class="text-sm">Confirm Password</label>
            <input id="passwordConfirmation" type="password" name="passwordConfirmation" class="mt-1 p-2 w-full border rounded-md focus:outline-none focus:border-blue-500" required autocomplete="new-password">
            <?php if (isset($_SESSION['flash']['errors']['value']['passwordConfirmation'])): ?>
            <p class="text-red-500 text-xs mt-2"><?=$_SESSION['flash']['errors']['value']['passwordConfirmation']?></p>
            <?php endif;?>
        </div>

        <button type="submit" class="w-full flex justify-center my-4 py-4 bg-[#042558] text-white rounded-md focus:outline-none focus:shadow-outline-blue">
            Register
        </button>

        <div class="flex items-center text-gray-600 justify-between mt-4">
            <div class="flex flex-row">
                <a href="/login" class="underline text-sm hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Already registered?
                </a>
            </div>
            <a href="/" class="underline text-sm hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Use as Guest
            </a>
        </div>

    </form>
</div>
