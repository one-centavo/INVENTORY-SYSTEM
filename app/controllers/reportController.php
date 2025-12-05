<?php

namespace app\controllers;
use Spatie\Browsershot\Browsershot;
use app\models\productsModel;

class reportController{
    private $productModel;

    public function __construct(){
        $this->productModel = new productsModel();
    }

    public function generateProductsPDF() {
        $products = $this->productModel->getProducts();
        
        $html = $this->buildProductsHTML($products);
        
        $pdfPath = BASE_PATH . 'public/reports/productos_' . date('Y-m-d_H-i-s') . '.pdf';
        
        if (!is_dir(BASE_PATH . 'public/reports')) {
            mkdir(BASE_PATH . 'public/reports', 0755, true);
        }

        Browsershot::html($html)
            ->format('A4')
            ->margins(10, 10, 10, 10)
            ->save($pdfPath);

        return $pdfPath;
    }

    public function downloadProductsPDF() {
        $pdfPath = $this->generateProductsPDF();
        
        if (file_exists($pdfPath)) {
            header('Content-Type: application/pdf');
            header('Content-Disposition: attachment; filename="' . basename($pdfPath) . '"');
            header('Content-Length: ' . filesize($pdfPath));
            readfile($pdfPath);
            exit;
        } else {
            echo "Error al generar el PDF.";
        }
    }

    private function buildProductsHTML($products) {
        // Leer el CSS de Tailwind compilado
        $tailwindCSS = file_get_contents(BASE_PATH . 'public/css/output.css');
        
        $html = '
        <!DOCTYPE html>
        <html>
        <head>
            <meta charset="UTF-8">
            <style>
                ' . $tailwindCSS . '
            </style>
        </head>
        <body class="p-8 bg-white">
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-2xl font-bold text-green-600">Reporte de Productos</h1>
                <p class="text-gray-500 text-sm">Generado: ' . date('d/m/Y H:i:s') . '</p>
            </div>
            <table class="w-full border-collapse">
                <thead>
                    <tr class="bg-green-600 text-white">
                        <th class="p-3 text-left">ID</th>
                        <th class="p-3 text-left">Nombre</th>
                        <th class="p-3 text-left">Categoría</th>
                        <th class="p-3 text-left">Precio</th>
                        <th class="p-3 text-left">Stock</th>
                    </tr>
                </thead>
                <tbody>';

        if (!empty($products)) {
            foreach ($products as $index => $product) {
                $bgClass = $index % 2 === 0 ? 'bg-white' : 'bg-gray-50';
                $html .= '
                    <tr class="' . $bgClass . ' border-b border-gray-200">
                        <td class="p-3">' . htmlspecialchars($product['id_product']) . '</td>
                        <td class="p-3">' . htmlspecialchars($product['name_product']) . '</td>
                        <td class="p-3">' . htmlspecialchars($product['category_name']) . '</td>
                        <td class="p-3">$' . number_format($product['price'], 2) . '</td>
                        <td class="p-3">' . htmlspecialchars($product['stock']) . '</td>
                    </tr>';
            }
        } else {
            $html .= '<tr><td colspan="5" class="p-6 text-center text-gray-500">No hay productos disponibles.</td></tr>';
        }

        $html .= '
                </tbody>
            </table>
            <div class="mt-6 text-right text-gray-400 text-xs">
                Total de productos: ' . count($products) . '
            </div>
        </body>
        </html>';

        return $html;
    }
}