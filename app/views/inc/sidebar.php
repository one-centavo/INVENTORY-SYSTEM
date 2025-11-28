<header class="w-full bg-gradient-to-r from-green-600 to-green-700 text-white flex flex-row justify-between lg:hidden">
    <section class="container min-w-full p-4 flex justify-between items-center">
    
    <!-- Logo -->
    <h1 class="text-white text-xl font-bold">
      <a href="<?= APP_URL; ?>dashboard"><?= APP_NAME ;?></a>
    </h1>

    <!-- Botón hamburguesa (mobile) -->
    <button class="flex flex-col h-6 w-8 justify-between cursor-pointer lg:hidden" title="Menu" id="btnHamburger">
      <span class="h-1 w-full rounded-xs bg-white"></span>
      <span class="h-1 w-full rounded-xs bg-white"></span>
      <span class="h-1 w-full rounded-xs bg-white"></span>
    </button>

    <!-- Menú mobile -->
    
</header>

<nav class="fixed top-16 right-0 translate-x-full h-full w-full bg-white text-black transition-transform ease-in-out duration-300 max-w-md flex flex-col lg:hidden z-50" id="navMenu">
  <ul class="p-4 flex flex-col">
    <li class="w-full p-4 border-b border-gray-200">
      <a class="flex justify-between items-center w-full" href="<?= APP_URL; ?>dashboard/">Dashboard <span>&#10095;</span></a>
    </li>
    <li class="w-full p-4 border-b border-gray-200">
      <a class="flex justify-between items-center w-full" href="<?= APP_URL; ?>products/">Productos <span>&#10095;</span></a>
    </li>
    <li class="w-full p-4 border-b border-gray-200">
      <a class="flex justify-between items-center w-full" href="<?= APP_URL; ?>categories/">Categorías <span>&#10095;</span></a>
    </li>
    <li class="w-full p-4 border-b border-gray-200">
      <a class="flex justify-between items-center w-full" href="<?= APP_URL; ?>users/">Usuarios <span>&#10095;</span></a>
    </li>
    <li class="w-full p-4 border-t border-gray-300 mt-auto">
      <a class="flex gap-2 items-center text-red-600" href="<?= APP_URL; ?>logout/">
        <svg class="w-5 h-5"><use href="#logout"></use></svg>
        Cerrar Sesión
      </a>
    </li>
  </ul>
</nav>


<nav class="hidden lg:flex lg:flex-col lg:w-72 lg:h-dvh lg:bg-gradient-to-r lg:from-green-600 lg:to-green-700 lg:text-white">
    <div class="flex flex-row gap-2 border-b border-green-400 p-6">
      <div class="flex items-center justify-center bg-white rounded-md p-4">
        <svg class="w-9 h-9 text-green-600">
            <use href="#user"></use>
        </svg>
      </div>
      <p class="text-center text-green-100">Sistema de Gestión</p>
    </div>  

    <ul class="flex flex-col p-7 gap-4">
        <li class="flex flex-row gap-2 items-center w-full rounded-md p-3">
            <svg class="w-6 h-6" viewBox="0 0 24 24">
                <use href="#dashboard"></use>
            </svg>
            <a href="<?= APP_URL ;?>dashboard" class="block w-full h-full">Dashboard</a>
        </li>
        <li class="flex flex-row gap-2 items-center w-full rounded-md p-3">
            <svg class="w-6 h-6" viewBox="0 0 24 24">
                <use href="#product"></use>
            </svg>
            <a href="<?= APP_URL ;?>products" class="block w-full h-full">Productos</a>
        </li>
        <li class="flex flex-row gap-2 items-center w-full rounded-md p-3">
            <svg class="w-6 h-6" viewBox="0 0 24 24">
                <use href="#category"></use>
            </svg>
            <a href="<?= APP_URL ;?>categories" class="block w-full h-full">Categorias</a>
        </li>
        <li class="flex flex-row gap-2 items-center w-full rounded-md p-3">
            <svg class="w-6 h-6" viewBox="0 0 24 24">
                <use href="#users"></use>
            </svg>
            <a href="<?= APP_URL ;?>users" class="block w-full h-full">Usuarios</a>
        </li>
    </ul>

    <div class="mt-auto p-7 border-t border-green-400 flex items-center gap-2">
      <a href="<?= APP_URL ;?>logout/" class="flex flex-row gap-2 items-center w-full rounded-md">
          <svg class="w-6 h-6" viewBox="0 0 24 24">
              <use href="#logout"></use>
          </svg>
          <span class="block w-full h-full">Cerrar Sesión</span>
      </a>
    </div>
</nav>