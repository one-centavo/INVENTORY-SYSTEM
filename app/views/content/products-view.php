<?php
    use app\controllers\productsController;
    use app\controllers\categoriesController;
    $productsController = new productsController();
    $products = $productsController->getProductsController();
    $categoriesController = new categoriesController();
    $categories = $categoriesController->getCategoriesController();
?>
<main class="flex-1 flex flex-col gap-4 bg-gray-50">
    <header class="p-6 md:p-9 border-b border-gray-300 bg-white">
        <h1 class="text-xl">Gestión de Productos</h1>
    </header>

    
    <section class="flex flex-col gap-6 p-4 sm:flex-row sm:justify-between sm:items-center sm:px-8">
        <form action="" class="border border-gray-300 rounded-md flex items-center gap-2 focus-within:ring-2 ring-green-500 px-3 w-full sm:max-w-3xs lg:max-w-xs"> 
            <svg class="w-6 h-6" viewBox="0 0 24 24">
                <use href="#search"></use>
            </svg>
            <input type="search" name="product-search" id="product-search" placeholder="Buscar producto..." class="flex-1 p-2 focus:outline-none">
        </form>
        <article class="flex flex-col sm:flex-row gap-2">
            <button class="bg-green-600 text-white flex justify-center items-center gap-2 p-2 rounded-md w-full sm:w-auto hover:bg-green-700 transition-all duration-300 ease-in-out cursor-pointer" id="btnOpenModal">
                <svg class="w-6 h-6" viewBox="0 0 24 24">
                    <use href="#plus"></use>
                </svg>
                Nuevo Producto
            </button>
            <button class="bg-gray-600 text-white flex justify-center items-center gap-2 p-2 rounded-md w-full sm:w-auto whitespace-nowrap hover:bg-gray-700 transition-all duration-300 ease-in-out cursor-pointer">
                <svg class="w-6 h-6" viewBox="0 0 24 24">
                    <use href="#download"></use>
                </svg>
                Exportar PDF
            </button>
        </article>
    </section>
    <section class="overflow-x-auto w-full px-4 lg:px-8 pb-8">
        <div class="border border-gray-200 rounded-md bg-white overflow-hidden min-w-max shadow-sm">
            <table class="min-w-full table-auto">
                <thead class="bg-green-50 text-slate-700">
                    <tr>
                        <th class="p-3 text-left">ID</th>
                        <th class="p-3 text-left">Nombre</th>
                        <th class="p-3 text-left">Categoría</th>
                        <th class="p-3 text-left">Precio</th>
                        <th class="p-3 text-left">Stock</th>
                        <th class="p-3 text-left">Acciones</th>
                    </tr>
                </thead>
                <tbody>

                    <?php 
                        if($products):
                            foreach($products as $product):
                    ?>
                    <tr>
                        <td class="p-3"><?=  htmlspecialchars($product['id_product']) ;?></td>
                        <td class="p-3"><?=  htmlspecialchars($product['name_product']) ;?></td>
                        <td class="p-3"><?=  htmlspecialchars($product['category_name']) ;?></td>
                        <td class="p-3"><?=  htmlspecialchars($product['price']) ;?></td>
                        <td class="p-3"><?=  htmlspecialchars($product['stock']) ;?></td>
                        <td class="p-3 flex gap-2">
                            <button class="bg-blue-600 text-white p-1 rounded-md hover:bg-blue-700 transition-all duration-300 ease-in-out cursor-pointer" id="btnOpenModalEdit">
                                Editar
                            </button>
                            <a class="bg-red-600 text-white p-1 rounded-md hover:bg-red-700 transition-all duration-300 ease-in-out cursor-pointer" href="<?= APP_URL ?>deleteProduct/<?= htmlspecialchars($product['id_product']) ?>" onclick="return confirm('¿Estás seguro de que deseas eliminar este producto?');">
                                Eliminar
                            </a>
                        </td>
                    </tr>

                    <?php 
                            endforeach;
                        else:
                    ?>
                    <tr>
                        <td colspan="6" class="p-7 text-center">No hay productos disponibles.</td>
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
            <input type="hidden" name="action" value="addProduct">
            <input type="text" placeholder="Nombre del producto" class="border border-gray-300 rounded-md p-2" name="nameProduct">
            <input type="number" placeholder="Precio" class="border border-gray-300 rounded-md p-2" name="price">
            <input type="number" placeholder="Cantidad" class="border border-gray-300 rounded-md p-2" name="stock">
            <select name="categoryId" id="" class="border border-gray-300 rounded-md p-2">
                <option value="" disabled selected>Seleccione una categoría</option>
                <?php
                    foreach($categories as $category):
                ?>
                <option value="<?= htmlspecialchars($category['id_category']) ?>"><?= htmlspecialchars($category['category_name']) ?></option>
                <?php
                    endforeach;
                ?>
            </select>

            <div class="flex flex-row gap-4 justify-end">
                <button type="button" class="bg-gray-600 text-white p-1 rounded-md hover:bg-gray-700 transition-all duration-300 ease-in-out cursor-pointer" id="btnCloseModal">Cancelar</button>
                <button type="submit" class="bg-green-600 text-white p-1 rounded-md hover:bg-green-700 transition-all duration-300 ease-in-out cursor-pointer">Agregar Producto</button>
                <p id="message"></p>
            </div>

        </form>
    </div>

    <div class="hidden fixed inset-0 items-center justify-center bg-black/50 z-50" id="modalEdit">
        <form class="bg-white p-6 py-12 rounded-lg shadow-lg w-11/12 max-w-sm flex flex-col gap-5 transition-all duration-300 ease-out transform translate-y-10 opacity-0"id="modalFormEdit">
            <input type="text" placeholder="Nombre del producto" class="border border-gray-300 rounded-md p-2">
            <input type="number" placeholder="Precio" class="border border-gray-300 rounded-md p-2">
            <input type="number" placeholder="Cantidad" class="border border-gray-300 rounded-md p-2">
            <select name="category" id="" class="border border-gray-300 rounded-md p-2">
                <option value="" disabled selected>Seleccione una categoría</option>
                <option value="Electrónica">Electrónica</option>
                <option value="Ropa">Ropa</option>
                <option value="Hogar">Hogar</option>
                <option value="Juguetes">Juguetes</option>
                <option value="Deportes">Deportes</option>
            </select>

            <div class="flex flex-row gap-4 justify-end">
                <button type="button" class="bg-gray-600 text-white p-1 rounded-md hover:bg-gray-700 transition-all duration-300 ease-in-out cursor-pointer" id="btnCloseModalEdit">Cancelar</button>
                <button type="submit" class="bg-green-600 text-white p-1 rounded-md hover:bg-green-700 transition-all duration-300 ease-in-out cursor-pointer">Editar Producto</button>
            </div>

        </form>
    </div>

</main>