<?php

namespace App\Livewire\Components;

use App\Models\Link;
use App\Models\Social;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Masmerise\Toaster\Toaster;
use Illuminate\Validation\Rule as ValidationRule;
use Livewire\WithFileUploads;

class ProfileForm extends Component
{
    use WithFileUploads;

    public $photo;
    public $name = "";
    public $username = "";
    public $bio = "";
    public $socials = [];

    public $buttons = [
        [
            'id' => 0,
            'order' => 0,
            "label" => '',
            "url" => ''
        ]
    ];
    public $urls = [
        [
            'id' => 0,
            'order' => 0,
            "type" => 1,
            "url" => ''
        ]
    ];
    public $removedLinks = [];

    public function addSocial()
    {
        $last_item = array_key_last($this->urls);
        array_push($this->urls, [
            'type' => 1,
            "url" => '',
            'id' => 0,
            'order' => $last_item + 1,
        ]);
    }

    public function addButton()
    {
        $last_item = array_key_last($this->buttons);
        array_push($this->buttons, [
            'label' => '',
            "url" => '',
            'id' => 0,
            'order' => $last_item + 1,
        ]);
    }

    public function removeSocial($key)
    {
        if ($this->urls[$key]['id'] !== 0) {
            array_push($this->removedLinks, $this->urls[$key]['id']);
        }
        unset($this->urls[$key]);
    }

    public function removeButton($key)
    {
        if ($this->buttons[$key]['id'] !== 0) {
            array_push($this->removedLinks, $this->buttons[$key]['id']);
        }
        unset($this->buttons[$key]);
    }

    public function updateButtonOrder($orders)
    {
        $buttons = [];
        foreach ($orders as $order) {
            $button = $this->buttons[$order['value']];
            $button['order'] = $order['order'] - 1;
            array_push($buttons, $button);
        }
        $this->buttons = $buttons;
    }

    public function updateSocialOrder($orders)
    {
        $urls = [];
        foreach ($orders as $order) {
            $url = $this->urls[$order['value']];
            $url['order'] = $order['order'] - 1;
            array_push($urls, $url);
        }
        $this->urls = $urls;
    }

    public function rules()
    {
        return [
            'username' => 'required|max:20|unique:users,username,' . auth()->user()->id,
            'name' => 'required|max:25',
            'bio' => 'required|max:50',
            'urls' => 'required|array',
            'urls.*.id' => 'required|integer',
            'urls.*.order' => 'required|integer',
            'urls.*.type' => 'required',
            'urls.*.url' => 'required|max:50',
            'buttons' => 'required|array',
            'buttons.*.id' => 'required|integer',
            'buttons.*.order' => 'required|integer',
            'buttons.*.label' => 'required',
            'buttons.*.url' => 'required|max:50'
        ];
    }

    public function updated()
    {
        $this->validate([
            'username' => $this->rules()['username'],
            'name' => $this->rules()['name'],
        ]);
    }

    public function submit()
    {
        $this->validate();

        auth()->user()->update([
            'username' => $this->username,
            'name' => $this->name,
            'bio' => $this->bio
        ]);

        if (count($this->removedLinks)  > 0) {
            Link::whereIn('id', $this->removedLinks)->delete();
        }

        foreach ($this->buttons as $button) {
            $data = [
                'user_id' => auth()->user()->id,
                'label' => $button['label'],
                'link' => $button['url'],
                'type' => 'button',
                'order' => $button['order']
            ];
            if ($button['id'] === 0) {
                Link::create($data);
            } else {
                $link = Link::where('id', $button['id'])->first();
                if ($link) {
                    $link->update($data);
                }
            }
        }

        foreach ($this->urls as $url) {
            $data = [
                'user_id' => auth()->user()->id,
                'social_id' => $url['type'],
                'link' => $url['url'],
                'type' => 'social',
                'order' => $url['order']
            ];
            if ($url['id'] === 0) {
                Link::create($data);
            } else {
                $link = Link::where('id', $url['id'])->first();
                if ($link) {
                    $link->update($data);
                }
            }
        }

        $this->dispatch('profile-updated', auth()->user()->username);
        Toaster::success('Profile updated!');
    }

    public function updatedPhoto()
    {
        if (!$this->photo) return;

        $imageName = auth()->user()->username . '.' . $this->photo->extension();
        $this->photo->storeAs('pictures', $imageName, 'public');
        auth()->user()->update(['photo' => $imageName]);

        Toaster::success('Picture updated!');
    }

    public function removePhoto()
    {
        Storage::delete('pictures/' . auth()->user()->photo);
        auth()->user()->update(['photo' => null]);
        Toaster::success('Picture removed!');
    }

    public function render()
    {
        return view('livewire.components.profile-form');
    }

    public function mount()
    {
        $this->username = auth()->user()->username;
        $this->name = auth()->user()->name;
        $this->bio = auth()->user()->bio;

        $this->socials = Social::all();
        $user_buttons = auth()->user()->buttons;
        if (count($user_buttons) > 0) {
            $this->buttons = [];
            foreach ($user_buttons as $user_button) {
                array_push($this->buttons, [
                    'label' => $user_button->label,
                    "url" => $user_button->link,
                    'id' => $user_button->id,
                    'order' => $user_button->order,
                ]);
            }
        }
        $user_socials = auth()->user()->socials;
        if (count($user_socials) > 0) {
            $this->urls = [];
            foreach ($user_socials as $user_social) {
                array_push($this->urls, [
                    'type' => $user_social->social_id,
                    "url" => $user_social->link,
                    'id' => $user_social->id,
                    'order' => $user_social->order,
                ]);
            }
        }
    }
}
