<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Group;
use Illuminate\Support\Str;
use Illuminate\Http\Request;



class ShowGroups extends Component
{

    public $groups;
    public $title;


    protected $rules = [
        'title' => 'required|min:6|max:100|unique:groups,name'
    ];
    
    
    public function render()
    {
        $this->groups = Group::get_active_groups();
        
        return view('livewire.show-groups',[
            'groups' => $this->groups
        ]);
    }


    public function add_group(Request $request) {

        $this->validate();

        $group = new Group();
        $group->name = $this->title;
        $group->slug = Str::slug($group->name).'-'.date('i-s');

        if ( !$group->save() ) {
            $this->addError('status', 'Group not added');
        }

    }


    public function delete_group($group_id) {
        $group = Group::where('id', $group_id);
        if ( $group->exists() ) {
            if ( $group->delete() ) {
                session()->flash('success', 'تم مسح المجموعة بنجاح');
            }
        }
    }
}
