<?php

namespace App\Http\Livewire\Backend\Landing;

use App\Models\Landing;
use Livewire\Component;
use Illuminate\Support\Facades\Log;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\File;

class FormLanding extends Component
{
    public Landing $landing;

    protected $rules = [
        'landing.name_header'            => '',
        'landing.title'            => 'required',
        'landing.sub_title'        => '',
        'landing.desc'             => 'required'
    ];

    public function mount($id = null)
    {

        $this->landing = new Landing();
        if ($id) {
            $this->landing = Landing::findOrFail($id);
        }
    }

    public function render()
    {            
        return view('livewire.backend.landing.form-landing');
    }

    public function save()
    {
        $this->validate();  

        try {            
            $header = public_path('static-file/header.txt');
            $description = public_path('static-file/description.txt');
            $subtext = public_path('static-file/subtext.txt');
            $title = public_path('static-file/title.txt');
          
            File::put($header, $this->landing->name_header);
            File::put($description, $this->landing->desc);
            File::put($subtext, $this->landing->sub_title);
            File::put($title, $this->landing->title);

            $this->landing->save();
            $this->dispatchBrowserEvent('success-izi', ['ntitle' => 'Success', 'nmessage' => "Landing berhasil di Perbaharui"]);
            redirect(route('data-landing'));
        } catch (\Throwable $th) {
            Log::error($th);
            $this->dispatchBrowserEvent('error-izi', ['ntitle' => 'Error', 'nmessage' => "Landing gagal di Perbaharui"]);
        }
    }
}
