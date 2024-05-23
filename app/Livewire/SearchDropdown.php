<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;


class SearchDropdown extends Component
{
    public $search = '';
    
    public function render()
    {
        $searchResults = [];

        if (strlen($this->search) >= 2) {
        $searchResults = Http::get('https://api.themoviedb.org/3/search/movie?query='.$this->search.'&api_key=6660f19edb8b4f7f256364ffadb0d7bb')
        -> json()['results'];
        }
        return view('livewire.search-dropdown',[
            'searchResults' => collect($searchResults)->take(8),
        ]);
    }
}
