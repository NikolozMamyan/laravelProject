<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon Application</title>
    <!-- Inclure les fichiers CSS (Tailwind, etc.) -->
    @vite('resources/css/app.css')
</head>
<body>
    <!-- En-tête -->
    <header>
        <!-- Contenu de l'en-tête -->
    </header>

    <!-- Contenu principal -->
    <main>
        @yield('content')
    </main>

    <!-- Pied de page -->
    <footer>
        <!-- Contenu du pied de page -->
    </footer>

    <!-- Inclure les fichiers JavaScript -->
    @vite('resources/js/app.js')
</body>
</html>