<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Components\Recursive;
class CategoryController extends Controller
{
    private $category;
  
    public function __construct()
    {
        $this->category = new Category; 
    }
    
    public function getCategory($parent_id)
    {
        $data = $this->category->all();
        $recursive = new Recursive($data);
        $categoryOptions = $recursive->categoryRecursive($parent_id);
        return $categoryOptions;
    }

    //
    public function create(){
  
        $categoryOptions = $this->getCategory($parent_id = '');
        return view('admin.manage.categories.add',compact('categoryOptions'));
    }
    public function index(){
        $categories = $this->category->latest()->paginate(5);
        return view('admin.manage.categories.index', compact('categories'));
    }
    public function store(Request $request)
    {
        $this->category->create([
            'name' => $request->name,
            'parent_id' => $request->parent_id
        ]);
        return redirect()->route('categories.index');
    }
    public function edit($id)
    {
        $category = $this->category->find($id);
        $categoryOptions = $this->getCategory($category->parent_id);
     
        return view('admin.manage.categories.edit', compact('category', 'categoryOptions'));
    }
    public function update($id, Request $request)
    {
        $this->category->find($id)->update([
            'name' => $request->name,
            'parent_id' => $request->parent_id
        ]);
        return redirect()->route('categories.index');
    }
    public function delete($id)
    {
        $this->category->find($id)->delete();
        return redirect()->route('categories.index');
    }
}
