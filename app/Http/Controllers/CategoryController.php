<?php

namespace App\Http\Controllers;

use App\Models\category;
use Illuminate\Http\Request;
use App\Component\Recusive;
use Illuminate\Support\Str;
class CategoryController extends Controller
{
    private $category;
    public function __construct(category $category)
    {
        $this->category=$category;
    }
    public function create(){
        $text=$this->getCategory(null);
        return view('admin.category.add',compact('text'));
    }

    public function index(){
        $categories=category::paginate(5);
        return view('admin.category.index',compact('categories'));
    }

    public function store(Request $req){
        $this->category->create([
            'name'=>$req->name,
            'parent_id'=>$req->parent_id,
            'slug'=>Str::slug($req->name)
        ]);
        return redirect()->route('categories.index');
    }

    public function getCategory($parent_id){
        $data=$this->category->all();
        $recusive=new Recusive($data);
        $text=$recusive->categoryRecusive($parent_id);
        return $text;
    }

    public function edit($id){
        $category=$this->category->find($id);
        $text=$this->getCategory($category->parent_id);
        return view('admin.category.edit',compact('category','text'));
    }
    public function update($id,Request $req){
        $this->category->find($id)->update([
            'name'=>$req->name,
            'parent_id'=>$req->parent_id,
            'slug'=>Str::slug($req->name)
        ]);

        return redirect()->route('categories.index');
    }
    public function delete($id){
        $this->category->find($id)->delete();
        return redirect()->route('categories.index');
    }
}
