<?php

namespace App\Http\Controllers;

use App\Components\Recursive;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Traits\StorageFileTrait;

class ProductController extends Controller
{
    use StorageFileTrait;
    private $category;
    private $product;
    private $productImage;
    //
    public function __construct()
    {
        $this->product = new Product;
        $this->category = new Category; 
        $this->productImage = new ProductImage;
    }

    public function index()
    {
        return view('admin.manage.products.index');
    }

    public function getCategory($parent_id)
    {
        $data = $this->category->all();
        $recursive = new Recursive($data);
        $categoryOptions = $recursive->categoryRecursive($parent_id);
        return $categoryOptions;
    }

    public function create()
    {
        $categoryOptions = $this->getCategory($parent_id = '');
        return view('admin.manage.products.add',compact('categoryOptions'));
    }


    public function store(Request $request)
    {
        $productMapping = [
            'sku' => $request->sku,
            'name' => $request->name,
            'price' => $request->price,
            'stock' => $request->stock,
            'product_company_id' => $request->product_company_id,
            'short_description' => $request->short_description,
            'long_description'=> $request->long_description,
            'category_id' => $request->category_id,
        ];
        $featureImageUploaded = $this->storageFileUpload($request, 'feature_image_path', 'photos/products/'. $request->sku . '/feature');
        if(!empty($featureImageUploaded)){
            $productMapping['feature_image_path'] = $featureImageUploaded['file_path'];
            $productMapping['feature_image_name'] = $featureImageUploaded['file_name'];
        }
        $productCreated = $this->product->create($productMapping);
       
        //Add detail images for product
        if($request->hasFile('image_path')){
            foreach ($request->image_path as $fileItems ) {
                $productDetailImage = $this->storageMultipleFileUpload($fileItems, 'photos/products/'. $request->sku . '/detail');
                $productCreated->images()->create([
                    'image_path' => $productDetailImage['file_path'],
                    'image_name' => $productDetailImage['file_name'],
                ]);
            }
        }
    }

    
}
