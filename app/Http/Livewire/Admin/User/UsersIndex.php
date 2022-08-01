<?php

namespace App\Http\Livewire\Admin\User;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class UsersIndex extends Component
{
    use WithPagination;
    protected $paginationTheme = "bootstrap";
    public $search;
    public function render()
    {
        $users = User::where('name', 'LIKE', '%' . $this->search . '%')
            ->orWhere('email', 'LIKE', '%' . $this->search . '%')
            ->latest('id')
            ->paginate(8);
        return view('livewire.admin.user.users-index', compact('users'));
    }
    public function updatingSearch()
    {
        $this->resetPage();
    }
}