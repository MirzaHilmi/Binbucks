<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>
    <?=$title?>
  </title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="/scripts/jquery-3.7.1.min.js.js"></script>
  <script src="/scripts/timer.js"></script>
  <link rel="preconnect" href="https://fonts.bunny.net">
  <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
</head>

<body class="font-sans antialiased">
  <div class="min-h-screen bg-gray-100" x-data="{ open: false }">
    <?php use Saphpi\Core\Application;require Application::$ROOT_DIR . '/views/components/navbar.sapi.php'?>

    <main class="w-full">
      <Content></Content>
    </main>

  </div>
</body>

</html>
