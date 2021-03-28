<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Navbar extends Component
{
    public $user;

    public function __construct()
    {
        $this->user = auth()->user();
    }

    public function menuItems()
    {
        return collect([
            [
                'title' => 'Home',
                'icon' => "<i class='w-5 text-center fal fa-home'></i>",
                'url' => route('home'),
                'isActive' => request()->routeIs('home'),
            ],
        ]);
    }

    public function render()
    {
        return view('components.sidebar');
    }
}
