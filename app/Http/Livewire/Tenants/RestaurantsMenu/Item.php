<?php

namespace App\Http\Livewire\Tenants\RestaurantsMenu;

use Livewire\Component;
use App\Models\Tenant\Restaurant;
use App\Models\Tenant\Menu;
use Livewire\WithFileUploads;

class Item extends Component
{
    // use WithFileUploads;

    public $menu;

    protected $listeners = ['editMenuItem', 'modalClosed'];

    protected $rules = [
        'menu.item' => 'required|max:255',
        'menu.description' => 'nullable|string|max:255',
        'menu.price' => 'required',
        'menu.photo' => 'nullable|image',
    ];

    public function mount()
    {
        $this->menu = new Menu();
    }

    public function saveItem()
    {
        $this->validate();
        // $this->menu->restaurant_id = Restaurant::first()->id;
        $this->menu->save();

        $this->emit('menuItemUpdated');
        $this->dispatchBrowserEvent('modal-close');

        $this->reset('menu');

        session()->flash('success', 'Item salvo/atualizado com sucesso!');
    }

    public function editMenuItem($item)
    {
        $this->resetValidation();
        $this->menu = Menu::find($item);
    }

    public function modalClosed()
    {
        $this->resetValidation();
        $this->reset('menu');
    }

    public function render()
    {
        return view('livewire.tenants.restaurants-menu.item');
    }
}