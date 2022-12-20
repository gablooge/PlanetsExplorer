<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Terrain extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
    ];
    
    public function planets()
    {
        return $this->belongsToMany(Planet::class,'terrain_planet');
    }

    public function update_or_create($terrain_list){
        if(count($terrain_list) > 0){
            foreach ($terrain_list as $key => $value) {
                $terrain_obj = Terrain::firstOrNew(['name' => $value]);
                $terrain_obj->save();
            }
        }
    }
}
