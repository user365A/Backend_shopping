<?php

namespace App\Http\Controllers;

use App\Http\Requests\SliderAddRequest;
use App\Models\Slider;
use App\Traits\DeleteModelTrait;
use App\Traits\StorageImageTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AdminSliderController extends Controller
{
    use DeleteModelTrait;
    use StorageImageTrait;
    private $slider;
    public function __construct(Slider $slider)
    {
        $this->slider=$slider;
    }
    public function index(){
        $sliders = Slider::paginate(5);
        return view('admin.sliders.index',compact('sliders'));
        }
    public function create(){
        return view('admin.sliders.add');
        }
    public function store(SliderAddRequest $req){
        try {
            $dataInsert=[
                'name'=>$req->name,
                'des'=>$req->des,
             ];
             $imageUpload=$this->StorageTraitUpload($req,'image_path','sliders');
             if(!empty($imageUpload)){
                $dataInsert['image_path']=$imageUpload['file_path'];
                $dataInsert['image_name']=$imageUpload['file_name'];
             }
             $this->slider->create($dataInsert);
             return redirect()->route('sliders.index');
        } catch (\Exception $exception) {
            Log::error('Message: '.$exception->getMessage().' Line:'.$exception->getLine());
        }

        }
    public function edit($id){
        $slider=$this->slider->find($id);
        return view('admin.sliders.edit',compact('slider'));
    }
    public function update(SliderAddRequest $req,$id){
        try {
            $sliderUpdate=[
                'name'=>$req->name,
                'des'=>$req->des
             ];
             $imageUpdate=$this->StorageTraitUpload($req,'image_path','sliders');
             if(!empty($imageUpdate)){
                 $sliderUpdate['image_path']=$imageUpdate['file_path'];
                 $sliderUpdate['image_name']=$imageUpdate['file_name'];
             }
             $this->slider->find($id)->update($sliderUpdate);
             return redirect()->route('sliders.index');
        } catch (\Exception $exception) {
            Log::error('Message: '.$exception->getMessage().' Line:'.$exception->getLine());
        }

    }
    public function delete($id){
        return $this->DeleteModelTrait($id,$this->slider);
     }
}
