<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Company extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'logo'];

    /**
     * Get the path of logo
     */
    public function logoUrl()
    {
        return ($this->logo != 'placeholder.jpg') ?
            asset('storage/logos/' . $this->logo) :
            asset('https://as1.ftcdn.net/v2/jpg/02/48/42/64/1000_F_248426448_NVKLywWqArG2ADUxDq6QprtIzsF82dMF.jpg');
    }

    /***
     * 
     * Delete featured image from storage
     */
    public function deleteLogo()
    {
        if ($this->logo != 'placeholder.jpg') {
            Storage::delete('public/logos/' . $this->logo);
        }
    }
}
