<?php
namespace App\Component;
use App\Models\category;
class Recusive{
    private $data;
    private $text='';
    public function __construct($data){
       $this->data=$data;
    }
    public function categoryRecusive($parent_id,$id=0,$str=''){
        foreach($this->data as $value){
            if($value['parent_id']==$id)
            {
                if(!empty($parent_id && $parent_id==$value['id']))
                {
                    $this->text .= "<option selected value='".$value['id']."'>".$str.$value['name']."</option>";
                }
                else{
                    $this->text .= "<option value='".$value['id']."'>".$str.$value['name']."</option>";
                }
                $this->categoryRecusive($parent_id,$value['id'],$str.'--');

            }
        }
        return $this->text;
     }
}
