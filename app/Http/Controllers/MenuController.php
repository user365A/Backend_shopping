<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Component\MenuRecusive;
use Illuminate\Support\Str;
use App\Models\Menu;

class MenuController extends Controller
{
    private $menuRecusive;
    private $menu;
    public function __construct(MenuRecusive $menurecusive,Menu $menu)
    {
        $this->menuRecusive=$menurecusive;
        $this->menu=$menu;
    }
    public function index(){
        $menus=Menu::paginate(5);
        return view('admin.menus.index',compact('menus'));
    }

    public function create(){
       $option= $this->menuRecusive->MenuRecusiveAdd();
       return view('admin.menus.add',compact('option'));
    }
    public function store(Request $req){
        $this->menu->create([
            'name'=>$req->name,
            'parent_id'=>$req->parent_id,
            'slug'=>Str::slug($req->name)
        ]);
        return redirect()->route('menus.index');
    }
    public function edit($id){
        $menu=$this->menu->find($id);
        $option= $this->menuRecusive->MenuRecusiveEdit($menu->parent_id);
        return view('admin.menus.edit',compact('option','menu'));
    }
    public function update($id,Request $req){
        $this->menu->find($id)->update([
            'name'=>$req->name,
            'parent_id'=>$req->parent_id,
            'slug'=>Str::slug($req->name)
        ]);

        return redirect()->route('menus.index');
    }
    public function delete($id){
        $this->menu->find($id)->delete();
        return redirect()->route('menus.index');
    }
}
