<?php

namespace App\Http\Controllers;

use App\Http\Requests\SettingAddRequest;
use App\Models\Setting;
use App\Traits\DeleteModelTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AdminSettingController extends Controller
{
    use DeleteModelTrait;
    private $setting;
    public function __construct(Setting  $setting)
    {
        $this->setting=$setting;
    }
    public function index(){
        $settings=Setting::paginate(5);
        return view('admin.settings.index',compact('settings'));
    }
    public function create(){
        return view('admin.settings.add');
    }
    public function store(SettingAddRequest $req){
        $dataCreate=[
            'config_key'=>$req->config_key,
            'config_value'=>$req->config_value,
            'type'=>$req->type
        ];

        $this->setting->create($dataCreate);
        return redirect()->route('settings.index');
    }
    public function edit($id){
       $setting=$this->setting->find($id);
       return view('admin.settings.edit',compact('setting'));
    }
    public function update(SettingAddRequest $req,$id){
        $dataUpdate=[
            'config_key'=>$req->config_key,
            'config_value'=>$req->config_value
        ];

        $this->setting->find($id)->update($dataUpdate);
        return redirect()->route('settings.index');
    }
    public function delete($id){
       return $this->DeleteModelTrait($id,$this->setting);
    }
}
