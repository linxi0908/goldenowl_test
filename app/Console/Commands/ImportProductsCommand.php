<?php

namespace App\Console\Commands;

use App\Models\Product;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class ImportProductsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:import-products-command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import products from JSON file';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $jsonPath = public_path('assets/data/shoes.json');
        $json = file_get_contents($jsonPath);
        $products = json_decode($json, true);

        foreach ($products['shoes'] ?? [] as $productData) {
            $product = new Product($productData);
            $product->save();
        }

        $this->info('Products imported successfully.');
    }
}
