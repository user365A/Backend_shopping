<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Component\Recusive;
use App\Http\Requests\ProductAddRequest;
use App\Models\category;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\ProductTag;
use App\Models\Tag;
use App\Traits\DeleteModelTrait;
use App\Traits\StorageImageTrait;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class AdminProductController extends Controller
{
    use StorageImageTrait;
    use DeleteModelTrait;
    private $category;
    private $product;
    private $productImage;
    private $tag;
    private $productTag;
    public function __construct(category $category, Product $product, ProductImage $productImage,Tag $tag,ProductTag $productTag)
    {
       $this->category=$category;
       $this->productImage=$productImage;
       $this->product=$product;
       $this->tags=$tag;
       $this->productTag=$productTag;
    }
    public function index(){
    $products = Product::paginate(5);
    return view('admin.products.index',compact('products'));
    }
    public function getCategory($parent_id){
        $data=$this->category->all();
        $recusive=new Recusive($data);
        $text=$recusive->categoryRecusive($parent_id);
        return $text;
    }
    public function search(Request $request)
    {
        $products = $this->product->getProductSearch($request);
        return view('admin.products.index', compact('products'));

    }
    public function create(){
        $option=$this->getCategory('');
        return view('admin.products.add',compact('option'));
    }
    public function store(ProductAddRequest $req){

    try{
        DB::beginTransaction();
        $dataProductCreate=[
            'name'=>$req->name,
            'price'=>$req->price,
            'content'=>$req->content,
            'user_id'=>auth()->id(),
            'category_id'=>$req->category_id
        ];
        $dataUpload=$this->StorageTraitUpload($req,'feature_image_path','products');
        if(!empty($dataUpload)){
            $dataProductCreate['featute_image_name']=$dataUpload['file_name'];
            $dataProductCreate['feature_image_path']=$dataUpload['file_path'];
        }
        $product=$this->product->create($dataProductCreate);

        // insert vao bang product_images
        if($req->hasFile('image_path'))
        {
            foreach($req->image_path as $fileItem){
               $dataProductImageDetail=$this->StorageTraitUploadMutiple($fileItem,'products');
               $product->images()->create([
                'image_path'=>$dataProductImageDetail['file_path'],
                'image_name'=>$dataProductImageDetail['file_name']
               ]);
            }
        }
        // insert tags for product\
        $tagIds=[];
        if(!empty($req->tags)){
        foreach($req->tags as $tagItem){
           $tagInstance = Tag::firstOrCreate([
                 'name'=>$tagItem
            ]);
           $tagIds[]=$tagInstance->id;
        }}
        $product->tags()->attach($tagIds);
        DB::commit();
        return redirect()->route('products.index');
    } catch(\Exception $exception) {
        DB::rollBack();
        Log::error('Message: '.$exception->getMessage().' Line:'.$exception->getLine());
    };


    }
    public function edit($id){
        $product=$this->product->find($id);
        $option=$this->getCategory($product->category_id);
        return view('admin.products.edit',compact('option','product'));
    }

    public function update(Request $req,$id){
        try{
            DB::beginTransaction();
            $dataProductUpdate=[
                'name'=>$req->name,
                'price'=>$req->price,
                'content'=>$req->content,
                'user_id'=>auth()->id(),
                'category_id'=>$req->category_id
            ];
            $dataUpload=$this->StorageTraitUpload($req,'feature_image_path','products');
            if(!empty($dataUpload)){
                $dataProductUpdate['featute_image_name']=$dataUpload['file_name'];
                $dataProductUpdate['feature_image_path']=$dataUpload['file_path'];
            }
            $this->product->find($id)->update($dataProductUpdate);
            $product=$this->product->find($id);
            // insert vao bang product_images
            if($req->hasFile('image_path'))
            {
                $this->productImage->where('product_id',$id)->delete();
                foreach($req->image_path as $fileItem){
                   $dataProductImageDetail=$this->StorageTraitUploadMutiple($fileItem,'products');
                   $product->images()->create([
                    'image_path'=>$dataProductImageDetail['file_path'],
                    'image_name'=>$dataProductImageDetail['file_name']
                   ]);
                }
            }
            // insert tags for product
            $tagIds=[];
            if(!empty($req->tags)){
                foreach($req->tags as $tagItem){
                    $tagInstance = Tag::firstOrCreate([
                          'name'=>$tagItem
                     ]);
                    $tagIds[]=$tagInstance->id;
                 }

            }
            $product->tags()->sync($tagIds);


            DB::commit();
            return redirect()->route('products.index');
        } catch(\Exception $exception) {
            DB::rollBack();
            Log::error('Message: '.$exception->getMessage().' Line:'.$exception->getLine());
        };
    }

    public function delete($id){
        return $this->DeleteModelTrait($id,$this->product);
     }
}
