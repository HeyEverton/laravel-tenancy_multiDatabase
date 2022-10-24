<?php

namespace App\Http\Livewire\Tenants\RestaurantsMenu;

use App\Models\Tenant\Menu;
use Livewire\Component;

class Index extends Component
{
    protected $listeners = ['menuItemUpdated' => '$refresh', 'menuItemDeleted' => '$refresh'];
    const TOTAL_PER_PAGE = 10;

    public function render()
    {
        return view('livewire.tenants.restaurants-menu.index')
            ->with('menuItems', Menu::orderBy('id', 'DESC')->paginate(static::TOTAL_PER_PAGE));
    }
}
