<?php

namespace App\Http\Controllers;

use App\Components\Recursive;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\ProductCompany;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Traits\StorageFileTrait;
use DB;

class ProductController extends Controller
{
    use StorageFileTrait;
    private $category;
    private $product;
    private $productImage;
    private $productCompany;
    //
    public function __construct()
    {
        $this->product = new Product;
        $this->category = new Category; 
        $this->productImage = new ProductImage;
        $this->productCompany = new ProductCompany;

    }

    public function index()
    {
        $products = $this->product->latest()->paginate(5);
        return view('admin.manage.products.index',compact('products'));
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
        $productCompanies = $this->productCompany->all();
        $categoryOptions = $this->getCategory($parent_id = '');
        return view('admin.manage.products.add',compact('categoryOptions','productCompanies'));
    }


    public function store(Request $request)
    {
        try{
            DB::beginTransaction();
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
            DB::commit();
            return redirect()->route('products.index');
        }catch(Exception $exception){
            DB::rollBack();
            Log::error('Message: '. $exception->getMessage() . 'Line: ' .$exception->getLine());
        }


    }

    public function edit($id)
    {
        $product = $this->product->find($id); 
        $categoryOptions = $this->getCategory($product->category_id);
        return view('admin.manage.products.edit', compact('categoryOptions', 'product'));
    }

    public function update(Request $request, $id)
    {
        try{
            DB::beginTransaction();
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
            $this->product->find($id)->update($productMapping);
            $productUpdated = $this->product->find($id);
            //Add detail images for product
            if($request->hasFile('image_path')){
                $this->productImage->where('product_id', $id)->delete();
                foreach ($request->image_path as $fileItems ) {
                    $productDetailImage = $this->storageMultipleFileUpload($fileItems, 'photos/products/'. $request->sku . '/detail');
                    $productUpdated->images()->create([
                        'image_path' => $productDetailImage['file_path'],
                        'image_name' => $productDetailImage['file_name'],
                    ]);
                }
            }
            DB::commit();
            return redirect()->route('products.index');
        }catch(Exception $exception){
            DB::rollBack();
            Log::error('Message: '. $exception->getMessage() . 'Line: ' .$exception->getLine());
        }

    }
    public function delete($id)
    {
        dd($id);
    }
    
}
