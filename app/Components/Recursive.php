<?php
namespace App\Components;
use App\Models\Category;
class Recursive{
    private $data;
    private $htmlOption = '';


    public function __construct($data)
    {
        $this->data = $data;
    }


    public function categoryRecursive($parent_id, $id = 0, $text = ''){
        foreach($this->data as $value){
            if($value['parent_id'] == $id){
                if (!empty($parent_id) && $parent_id == $value['id']) {
                    $this->htmlOption .= "<option selected value='". $value['id']. "'>". $text . $value['name'] . "</option>";
                }else{
                    $this->htmlOption .= "<option value='". $value['id']. "'>". $text . $value['name'] . "</option>";
                }
              
                $this->categoryRecursive($parent_id, $value['id'], $text . " ━ ");
            }
        }
        return $this->htmlOption;
    }
}
