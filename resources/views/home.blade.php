<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Document</title>
    @vite('resources/js/app.js')

    <script>
        console.log("Script in the head section");
    </script>
</head>

<body>
<div class="banner">
    <h1 class="text-blue-500 p-4 bg-red-500">home</h1>
</div>
<div x-data="{ count: 0 }">
    <button @click="count++">Add</button>
    <span x-text="count"></span>
</div>
</body>
</html>
