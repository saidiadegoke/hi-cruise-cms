<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Yacht extends Model
{
    //
    protected $fillable = ["name", "description", "publish"];

    protected $with = ["packages"];
    public function packages()
    {
        return $this->hasMany(Package::class);
    }


    public function media()
    {
        return $this->hasMany(MediaFile::class);
    }


    public function slides()
    {
        $slide_purpose_id = \App\Models\MediaFilePurpose::where('name', 'slides')->get()->pluck('id')->first();
        $slides = $slide_purpose_id ? \App\Models\MediaFile::where('purpose', $slide_purpose_id) : null;

        return $slides ? $slides->where('yacht_id', $this->id)->get() : [];
    }

    public function banner()
    {
        $banner_purpose_id = \App\Models\MediaFilePurpose::where('name', 'banner')->get()->pluck('id')->first();
        $banner = $banner_purpose_id ? \App\Models\MediaFile::where('purpose', $banner_purpose_id) : null;
        return $banner ? $banner->where('yacht_id', $this->id)->get()->first() : '';
    }
}
