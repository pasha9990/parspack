<?php

namespace App\Console\Commands;

use App\Repositories\ProductRepository;
use App\Services\ProductService;
use Illuminate\Console\Command;


class AddProduct extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'product:add {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'use this command to add product';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public $productService;
    public function handle()
    {
        $this->productService = new ProductService(new ProductRepository());
        $name = $this->argument('name');

        $this->productService->add($name);

    }
}
