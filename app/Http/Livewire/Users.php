<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Role;

class Users extends Component
{
    use WithPagination;

    public $confirmUserDeletion = false;
    public $confirmUserAdd = false;
    public $user;
    public $roles;
    public $checkedRolesID;
    public $selectedrole;
    protected $rules = [
        'user.role' => '',
        'selectedrole' => ['required', 'integer', 'exists:roles,id'],

    ];

    public function render()
    {
        $users = User::paginate();
        $this->roles = Role::all();
        return view('livewire.users', compact('users'), ['Roles' =>
            Role::all()]);
    }

    //Pop up de Confirmação para remover
    public function confirmUserDeletion($id)
    {
        $this->confirmUserDeletion = $id;

    }
    public function confirmUserEdit(User $user)
    {
        $this->roles = Role::all();
        $this->user = $user;
        //  $this->checkedRolesID;
        // dd($this->user->getRoleNames());

        // foreach ($this->user->getRoleNames() as $key => $value) {
        //     # code...
        //     //dd($value);
        //     $request = Role::findByName('User');
        //     dd($request);

        // }

        $this->confirmUserAdd = true;

    }

    //Pop up de Confirmação para Adicionar
    public function confirmUserAdd()
    {
        $this->reset(['user']);
        $this->confirmUserAdd = true;
    }

    public function addUser()
    {
        $this->validate();

        if (isset($this->user->id) && isset($this->checkedRolesID)) {

            $myarray = [];
            foreach ($this->checkedRolesID as $key => $value) {
                //dd($value);
                if ($value) {

                    array_push($myarray, $key);

                }

                //$this->user->roles()->sync();
            }
            if (isset($myarray)) {
                $this->user->roles()->sync($myarray);

            }

            $list = $this->user->getRoleNames()->toArray();
            $this->user['role'] = $list[0];
            // dd($this->user->getRoleNames()->toArray());
            $this->user->save();

            // dd($myarray);
            //$this->user->roles()->sync();
            // $this->user->save();
            $this->confirmUserAdd = false;

        }

    }
}
