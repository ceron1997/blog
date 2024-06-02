<?php

namespace App\Livewire\Admin;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class UserIndex extends Component
{
    use WithPagination;

    protected $paginationTheme="bootstrap";

    public $search;
public function updatingSearch(){
    //el nombre del metodo updating opera sobre la terminacion del nombre 
    // la propiedad search
    $this->resetPage();
}
    public function render()
    {
       $users= User::where('name','LIKE','%'.$this->search.'%')
       ->orWhere('email','LIKE','%'.$this->search.'%')
       ->paginate(7);
        return view('livewire.admin.user-index',compact('users'));
    }
}
