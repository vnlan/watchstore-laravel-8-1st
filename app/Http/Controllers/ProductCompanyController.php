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


class ProductCompanyController extends Controller{
    use StorageFileTrait;

    public function __construct()
    {
        $this->productCompany = new ProductCompany; 
    }
    

    public function index()
    {
        $productCompanies = $this->productCompany->latest()->paginate(5);
        return view('admin.manage.product-company.index',compact('productCompanies'));
    }
    public function create()
    {

        return view('admin.manage.product-company.add');
    }

    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
             $productCompanyMapping = [
                'company_name' => $request->company_name,
                'company_short_name' => $request->company_short_name,
                'address' => $request->address
            ];
    
    
            //Add logo img
            $logoImageUploaded = $this->storageFileUpload($request, 'logo_image_path', 'photos/company-logo/'. $request->company_short_name);
            if(!empty($logoImageUploaded)){
                $productCompanyMapping['logo_image_path'] = $logoImageUploaded['file_path'];
                $productCompanyMapping['logo_image_name'] = $logoImageUploaded['file_name'];
            }
            $productCompanyCreated = $this->productCompany->create($productCompanyMapping);
            DB::commit();
            return redirect()->route('product-company.index');
        } catch (Exception $exception) {
            DB::rollBack();
            return redirect()->route('product-company.index');
        }

      
    }

    public function delete($id)
    {
        try {
            $this->productCompany->find($id)->delete();
            return redirect()->route('product-company.index');
        } catch (Exception $exception) {
          
        }
 
    }
    public function edit($id)
    {
        $productCompany = $this->productCompany->find($id);
        return view('admin.manage.product-company.edit',compact('productCompany'));
    }
    public function update($id, Request $request)
    {
        $productCompanyMapping = [
            'company_name' => $request->company_name,
            'company_short_name' => $request->company_short_name,
            'address' => $request->address
        ];
        $logoImageUploaded = $this->storageFileUpload($request, 'logo_image_path', 'photos/company-logo/'. $request->company_short_name);
        if(!empty($logoImageUploaded)){
            $productCompanyMapping['logo_image_path'] = $logoImageUploaded['file_path'];
            $productCompanyMapping['logo_image_name'] = $logoImageUploaded['file_name'];
        }
        $this->productCompany->find($id)->update($productCompanyMapping);

        return redirect()->route('product-company.index');
    }

}