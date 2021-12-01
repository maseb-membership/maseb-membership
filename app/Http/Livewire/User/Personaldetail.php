<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use App\Models\User;

class Personaldetail extends Component
{
    public $personaldetail = null;
    public
        $user_id,
        $name,
        $email,
        $father_name,
        $grand_father_name,
        $gender,
        $mother_name,
        $birth_date,
        $nationality,
        $marital_status;
    public $updateMode = false;


    public function render()
    {
        // dd('here');
        $user_id = \Auth::user()->id;
        $this->personaldetail = User::where('id',$user_id)->first();
        $this->name = $this->personaldetail->name;
        $this->email = $this->personaldetail->email;
        $this->father_name = $this->personaldetail->father_name;
        $this->grand_father_name = $this->personaldetail->grand_father_name;
        $this->gender = $this->personaldetail->gender;
        $this->mother_name = $this->personaldetail->mother_name;
        $this->birth_date = $this->personaldetail->birth_date;
        $this->nationality = $this->personaldetail->nationality;
        $this->marital_status = $this->personaldetail->marital_status;

        return view('livewire.user.personaldetail');
    }

    private function resetInputFields(){
        $this->name = '';
        $this->email = '';
        $this->father_name = '';
        $this->grand_father_name = '';
        $this->gender = '';
        $this->mother_name = '';
        $this->birth_date = '';
        $this->nationality = '';
        $this->marital_status = '';
    }

    public function edit($id)
    {
        $this->updateMode = true;
        $this->personaldetail = User::where('id',$id)->first();
        $this->user_id = $id;
        $this->name = $this->personaldetail->name;
        $this->email = $this->personaldetail->email;
        $this->father_name = $this->personaldetail->father_name;
        $this->grand_father_name = $this->personaldetail->grand_father_name;
        // $this->gender = $this->personaldetail->gender;
        // $this->mother_name = $this->personaldetail->mother_name;
        // $this->birth_date = $this->personaldetail->birth_date;
        // $this->nationality = $this->personaldetail->nationality;
        // $this->marital_status = $this->personaldetail->marital_status;
     }

    public function cancel()
    {
        $this->updateMode = false;
        $this->resetInputFields();
    }
    public function update()
    {
        $validatedDate = $this->validate([
            'name' => 'required',
            'email' => 'required|email',
            'father_name' => 'required',
            'grand_father_name' => 'required',
            // 'gender' => 'required',
            // 'birth_date' => 'required',
            // 'nationality' => 'required',
        ]);

        $bd = \Carbon\Carbon::createFromFormat('m/d/Y', $this->birth_date)->toDateString();


        if ($this->user_id) {
            $user = User::find($this->user_id);
            $user->update([
                'name' => $this->name,
                'email' => $this->email,
                'father_name' => $this->father_name,
                'grand_father_name' => $this->grand_father_name,
                // 'gender' => $this->gender,
                // 'mother_name' => $this->mother_name,
                // 'birth_date' => $bd,
                // 'nationality' => $this->nationality,
                // 'marital_status' => $this->marital_status,
            ]);
            $this->updateMode = false;
            session()->flash('message', 'User Personal Details Updated Successfully.');
            $this->resetInputFields();
        }
    }

}
