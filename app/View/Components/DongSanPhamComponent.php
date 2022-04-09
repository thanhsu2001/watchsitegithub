<?php

namespace App\View\Components;

use App\Models\DongSanPham;
use Illuminate\View\Component;

class DongSanPhamComponent extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $data = DongSanPham::all();
        return view('components.dong-san-pham-component')->with('data', $data);
    }
}
