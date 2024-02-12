<?php

namespace App\Http\Livewire\Admin\Brand;

use App\Models\Brand;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component

{
    use WithPagination;
    protected $paginationTheme='bootstrap';
    public $name,$slug,$status,$brand_id;
    public function rules()
    {
        return [
            'name'=>'string|required',
            'slug'=>'string|required',
            'status'=>'nullable',
        ];
    }
    public function resetInput()
    {
        // dd('ok');
        $this->name=NULL;
        $this->slug=NULL;
       $this-> status=NULL;

    }
    public function storBrand()
    {
        $validatedData=$this->validate();
        Brand::create([
            'name'=>$this->name,
            'slug'=>$this->slug,
            'status'=>$this->status==true?'1':'0',

        ]);
        session()->flash('message','Brand added successfully');
        $this->dispatchBrowserEvent('close-modal');
        $this->resetInput();
    }
    public function close_modal()
    {
        $this->resetInput();
        // dd($this->name);
    }
  
    public function editBrand($brand_id)
    {
        $this->brand_id=$brand_id;
        $brand=Brand::find($brand_id);
        $this->name=$brand->name;
        $this->slug=$brand->slug;
        $this->status=$brand->status;
       

    }
    public function update_modal()
    {
        $validatedData=$this->validate();
        Brand::find($this->brand_id)->update([
            'name'=>$this->name,
            'slug'=>$this->slug,
            'status'=>$this->status==true?'1':'0',

        ]);
        session()->flash('message','Brand Updated successfully');
        $this->dispatchBrowserEvent('closeUpdate-modal');
        $this->resetInput();

    }
    public function deleteBrand($brand_id)
    {
        $this->brand_id=$brand_id;
    }
    public function destroy_modal()
    {
        Brand::find($this->brand_id)->delete();
        session()->flash('message','Brand Deleted successfully');
        $this->dispatchBrowserEvent('closeDelete-modal');
        $this->resetInput();
    }
    public function render()
    {
        $brands=Brand::orderBy('id','DESC')->paginate(10);
        return view('livewire.admin.brand.index',['brands'=>$brands])->extends('layouts.admin')->section('content');
    }
}
