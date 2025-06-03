<?php

namespace App\Console\Commands;

use App\Services\FileReader\FileReaderService;
use App\Services\Product\ProductService;
use Illuminate\Console\Command;

class ProductImport extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:product-import
                        {--type=csv : (csv, json, etc.)}
                        {--test }';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command gets the product data from a file';
    private ProductService $productService;
    public function __construct(ProductService $productService)
    {
        parent::__construct();
        $this->productService = $productService;

    }
    /**
     * Execute the console command.
     */
    public function handle()
    {
        //
        $type = $this->option('type');
        $isTest = $this->option('test');
        $this->info(($isTest) ? "Running in test mode." : "Running in production mode.");
        $paths =[
        'csv' => './storage/app/data/products.csv',
        'json' => './storage/app/data/products.json',
        ];
        if (!array_key_exists($type, $paths)) {
            $this->error("Unsupported file type: {$type}");
            return;
        }

        try {
            $fileReaderService = new FileReaderService($type, $paths[$type]);
            $result = $fileReaderService->readFile();
            if (empty($result)) {
                $this->error("No data found in the file.");
                return;
            }

            $this->productService->deleteAllProducts();
            foreach($result as $productData) {
                $validProducts  = $this->productService->validateProducts($productData);
                if (!$validProducts) {
                    $this->error("Invalid product data: " . json_encode($productData, JSON_PRETTY_PRINT));
                    continue;
                }

                $product  = $this->productService->map($validProducts);
                if ($isTest) {
                    $this->info("TEST MODE: Product data is valid and ready to be saved.");
                    $this->info("Product Data: " . json_encode($validProducts, JSON_PRETTY_PRINT));
                    continue;
                }
                $this->productService->saveProduct($product);
                $this->info("Product saved successfully: " . $product->name);
            }


        }
        catch (\Exception $e) {
            $this->error("Error: " . $e->getMessage() . "\n");
            return;
        }

    }
}
