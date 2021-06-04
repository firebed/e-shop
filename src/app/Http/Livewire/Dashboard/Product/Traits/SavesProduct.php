<?php


namespace App\Http\Livewire\Dashboard\Product\Traits;


use App\Http\Livewire\Traits\TrimStrings;
use App\Models\Product\Category;
use App\Models\Product\Product;
use App\Repository\ProductRepository;
use Illuminate\Support\Facades\DB;

trait SavesProduct
{
    use TrimStrings;
    use ManagesAttributes;
    use SavesProductImage;
    use CreatesEmptyProduct;

    public Product   $product;
    public ?Category $category = null;

    public string $name        = '';
    public string $description = '';

    public function mountSavesProduct(): void
    {
        if (!isset($this->product)) {
            $this->product = $this->makeProduct();
        } else {
            $this->category = Category::find($this->product->category_id);
        }

        $this->name = $this->product->name ?? '';
        $this->description = $this->product->description ?? '';
    }

    public function updatedProductCategoryId($id): void
    {
        $this->category = Category::find($id);
        $this->loadAttributes();
    }

    public function updatedName(): void
    {
        if ($this->product->id === NULL) {
            $this->product->slug = slugify($this->name);
            $this->skipRender();
        }
    }

    protected function saveProduct(bool $has_variants): void
    {
        $this->product->has_variants = $has_variants;
        $this->product->name = $this->name;
        $this->product->description = $this->trim($this->description);
        $this->product->manufacturer_id = $this->trim($this->product->manufacturer_id);

        DB::transaction(function () {
            $service = new ProductRepository();
            $service->save($this->product);
            $this->saveImage();
            $this->saveAttributes();
        });
    }

    protected function getModel(): Product
    {
        return $this->product;
    }
}
