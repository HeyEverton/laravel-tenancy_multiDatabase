<?php

namespace App\Http\Livewire\Tenants\RestaurantsMenu;

use App\Models\Tenant\Menu;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class Delete extends Component
{
    public $menu;

    public function mount(int $menu)
    {
        $this->menu = Menu::find($menu);
    }

    public function deleteItem()
    {
        $storage = Storage::disk('public');
        if ($storage->exists($this->menu->photo)) $storage->delete($this->menu->photo);
        
        $this->menu->delete();
        $this->emit('menuItemDeleted');
    }

    public function render()
    {
        return view('livewire.tenants.restaurants-menu.delete');
    }
}
