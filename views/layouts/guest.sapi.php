<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>
    <?=$title?>
  </title>

  <link rel="preconnect" href="https://fonts.bunny.net">
  <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
  <script src="https://cdn.tailwindcss.com"></script>

</head>

<body class="font-sans text-gray-900 antialiased">
  <div class="flex min-h-screen flex-col items-center bg-[#F3F3F7] pt-6 text-[#000] sm:justify-center sm:pt-0">
    <div class="mt-6 flex w-full flex-col justify-center overflow-hidden bg-[#fff] px-6 py-4 shadow-md sm:max-w-md sm:rounded-lg">
      <div class="flex justify-center py-4">
        <img src="/assets/logo1.png" alt="Image" />
      </div>
      <Content></Content>
    </div>
  </div>
</body>

</html>