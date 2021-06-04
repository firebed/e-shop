<?php

namespace App\Http\Livewire\Dashboard\User;

use App\Models\User;
use Firebed\Livewire\Traits\WithCustomPaginationView;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\WithPagination;

class UserCartsTable extends Component
{
    use WithPagination, WithCustomPaginationView {
        WithCustomPaginationView::paginationView insteadof WithPagination;
    }

    public User $user;

    public function render(): View
    {
        $carts = $this->user
            ->carts()
            ->with('status', 'shippingMethod', 'paymentMethod')
            ->latest()
            ->paginate();

        return view('dashboard.user.livewire.user-carts-table', compact('carts'));
    }
}
