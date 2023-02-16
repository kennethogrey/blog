<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Support\Str;


class Categories extends Component
{
    public $category_name;
    public $selected_category_id;
    public $updateCategoryMode = false;

    public function addCategory(){
        $this->validate([
            'category_name'=>'required|unique:categories,category_name'
        ]);

        $category = new Category();
        $category->category_name = $this->category_name;
        $saved = $category->save();

        if($saved){
            $this->dispatchBrowserEvent('hideCategoriesModal');
            $this->category_name = null;
            $this->showToastr('New category has been successfully added.','success');
        }else{
            $this->showToastr('Something went wrong','error');
        }

    }

    public function showToastr($message,$type){
        return $this->dispatchBrowserEvent('showToastr',[
            'type'=>$type,
            'message'=>$message
        ]);
    }
    
    public function render()
    {
        return view('livewire.categories',[
            'categories'=>Category::orderBy('ordering','asc')->get(),
        ]);
    }
}
