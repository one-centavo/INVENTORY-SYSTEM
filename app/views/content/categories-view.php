<?php
    use app\controllers\categoriesController;
    $categoriesController = new categoriesController();
    $categories = $categoriesController->getCategoriesController();
?>
<main class="flex-1 flex flex-col gap-4 bg-gray-50">
    <header class="p-6 md:p-9 border-b border-gray-300 bg-white">
        <h1 class="text-xl">Gestión de Categorias</h1>
    </header>

    
    <section class="flex flex-col gap-6 p-4 sm:flex-row  sm:justify-end sm:items-center sm:px-8">
        <article class="flex flex-col sm:flex-row gap-2">
            <button class="bg-green-600 text-white flex justify-center items-center gap-2 p-2 rounded-md w-full sm:w-auto hover:bg-green-700 transition-all duration-300 ease-in-out cursor-pointer" id="btnOpenModal">
                <svg class="w-6 h-6" viewBox="0 0 24 24">
                    <use href="#plus"></use>
                </svg>
                Nueva Categoría
            </button>
        </article>
    </section>
    <section class="overflow-x-auto w-full px-4 lg:px-8 pb-8">
        <div class="border border-gray-200 rounded-md bg-white overflow-hidden min-w-max shadow-sm">
            <table class="min-w-full table-auto">
                <thead class="bg-green-50 text-slate-700">
                    <tr>
                        <th class="p-3 text-left">ID</th>
                        <th class="p-3 text-left">Nombre Categoría</th>
                        <th class="p-3 text-left">Descripción</th>
                        <th class="p-3 text-left">Acciones</th>
                    </tr>
                </thead>
                <tbody>

                    <?php 
                        if($categories):
                            foreach($categories as $category):
                    ?>
                    <tr>
                        <td class="p-3"><?=  htmlspecialchars($category['id_category']) ;?></td>
                        <td class="p-3"><?=  htmlspecialchars($category['category_name']) ;?></td>
                        <td class="p-3"><?=  htmlspecialchars($category['description']) ;?></td>
                        <td class="p-3 flex gap-2">
                            <button class="bg-blue-600 text-white p-1 rounded-md hover:bg-blue-700 transition-all duration-300 ease-in-out cursor-pointer" id="btnOpenModalEdit">
                                Editar
                            </button>
                            <button class="bg-red-600 text-white p-1 rounded-md hover:bg-red-700 transition-all duration-300 ease-in-out cursor-pointer">
                                Eliminar
                            </button>
                        </td>
                    </tr>

                    <?php 
                            endforeach;
                        else:
                    ?>
                    <tr>
                        <td colspan="4" class="p-7 text-center">No hay categorias disponibles.</td>
                    </tr>
                    <?php
                        endif;
                    ?>
                </tbody>
            </table>
        </div>
    </section>

    <div class="hidden fixed inset-0 items-center justify-center bg-black/50 z-50" id="modal">
        <form class="bg-white p-6 py-12 rounded-lg shadow-lg w-11/12 max-w-sm flex flex-col gap-5 transition-all duration-300 ease-out transform translate-y-10 opacity-0"id="modalForm" method="POST" action="<?= APP_URL ?>app/controllers/ajax.php">
            <input type="hidden" name="action" value="addCategory">
            <input type="text" name="name" placeholder="Nombre de la categoría" class="border border-gray-300 rounded-md p-2" >
            <textarea name="description" id="" placeholder="Descripción de la categoría" class="border border-gray-300 rounded-md p-2 resize-none"></textarea>
            <div class="flex flex-row gap-4 justify-end">
                <button type="button" class="bg-gray-600 text-white p-1 rounded-md hover:bg-gray-700 transition-all duration-300 ease-in-out cursor-pointer" id="btnCloseModal">Cancelar</button>
                <button type="submit" class="bg-green-600 text-white p-1 rounded-md hover:bg-green-700 transition-all duration-300 ease-in-out cursor-pointer">Agregar Categoria</button>
                <p id="message"></p>
            </div>

        </form>
    </div>

    <div class="hidden fixed inset-0 items-center justify-center bg-black/50 z-50" id="modalEdit">
        <form class="bg-white p-6 py-12 rounded-lg shadow-lg w-11/12 max-w-sm flex flex-col gap-5 transition-all duration-300 ease-out transform translate-y-10 opacity-0"id="modalFormEdit">

            <input type="text" placeholder="Nombre de la categoría" class="border border-gray-300 rounded-md p-2">
            <textarea name="description" id="" placeholder="Descripción de la categoría" class="border border-gray-300 rounded-md p-2 resize-none"></textarea>
            <div class="flex flex-row gap-4 justify-end">
                <button type="button" class="bg-gray-600 text-white p-1 rounded-md hover:bg-gray-700 transition-all duration-300 ease-in-out cursor-pointer" id="btnCloseModalEdit">Cancelar</button>
                <button type="submit" class="bg-green-600 text-white p-1 rounded-md hover:bg-green-700 transition-all duration-300 ease-in-out cursor-pointer">Editar Categoría</button>
            </div>
        </form>
    </div>

</main>