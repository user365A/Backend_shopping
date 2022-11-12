<?php
namespace App\Component;
use App\Models\Menu;
class MenuRecusive{
    private $html;
    public function __construct(){
       $this->html='';
    }

    public function MenuRecusiveAdd($parent_id=0,$subMark=''){

        $data=Menu::where('parent_id',$parent_id)->get();
        foreach($data as $item){
            $this->html.= "<option value='".$item->id."'>".$subMark.$item->name."</option>";
            $this->MenuRecusiveAdd($item->id,$subMark.'--');
        }
        return $this->html;
     }

     public function MenuRecusiveEdit($parent_id_edit,$parent_id=0,$subMark=''){

        $data=Menu::where('parent_id',$parent_id)->get();
        foreach($data as $item){
         if(!empty($parent_id_edit)&&$parent_id_edit==$item->id){
             $this->html.= "<option selected value='".$item->id."'>".$subMark.$item->name."</option>";
         }
         else{
             $this->html.= "<option value='".$item->id."'>".$subMark.$item->name."</option>";
         }
            $this->MenuRecusiveEdit($parent_id_edit,$item->id,$subMark.'--');
        }
        return $this->html;
     }
}
