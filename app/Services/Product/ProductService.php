<?php
namespace App\Services\Product;

use App\Models\Product;
use Illuminate\Support\Facades\Validator;

class ProductService {

    public function map(array $productData): Product {
        return new Product(
            [
                'sku' => $productData['Product Code'],
                'name' => $productData['Product Name'],
                'cost_in_gbp' => $productData['Cost in GBP'],
                'description' => $productData['Product Description'],
                'stock' => $productData['Stock'],
                'discontinued' => ($productData['Discontinued'] === 'Yes'),
            ]
        );
    }
    public function validateProducts(array $productData): array {
        $validator = Validator::make($productData, [
            'Product Code' => 'required|string|max:255',
            'Product Name' => 'required|string|max:255',
            'Cost in GBP' => 'nullable|numeric|min:0',
            'Product Description' => 'nullable|string',
            'Stock' => 'required|integer|min:0',
            'Discontinued' => 'nullable|in:yes,no',

        ]);

        return ($validator->fails()) ? [] : $validator->validated();
    }

    public function saveProduct(Product $product): Product {
        $product->save();
        return $product;
    }
    public function getProductBySku(string $sku): ?Product {
        return Product::where('sku', $sku)->first();
    }
    public function getAllProducts(): array {
        return Product::all()->toArray();
    }
    public function deleteProduct(Product $product): bool {
        return $product->delete();
    }

    public function deleteAllProducts(): int {
        return Product::query()->delete();
    }
}
