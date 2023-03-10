<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use GuzzleHttp\Client;

class Planet extends Model
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

    public function terrains()
    {
        return $this->belongsToMany(Terrain::class, 'terrain_planet');
    }

    public function residents()
    {
        return $this->belongsToMany(People::class, 'residents');
    }

    public function update_or_create($data)
    {
        $planet_obj = Planet::firstOrNew(['name' => $data->name]);
        $planet_obj->name = $data->name != "unknown" ? $data->name:"";
        $planet_obj->rotation_period = $data->rotation_period != "unknown" ? $data->rotation_period:0;
        $planet_obj->orbital_period = $data->orbital_period != "unknown" ? $data->orbital_period:0;
        $planet_obj->diameter = $data->diameter != "unknown" ? $data->diameter:0;
        $planet_obj->climate = $data->climate != "unknown" ? $data->climate:"";
        $planet_obj->gravity = $data->gravity != "unknown" ? $data->gravity:"";
        $planet_obj->surface_water = $data->surface_water != "unknown" ? $data->surface_water:"";
        $planet_obj->population = $data->population != "unknown" ? $data->population : 0;
        $planet_obj->url = $data->url != "unknown" ? $data->url : "";
        $planet_obj->save();
        
        $terrain_obj = new Terrain();
        $terrain_list = array_map('trim', explode(',', $data->terrain));
        $terrain_obj->update_or_create($terrain_list);

        $planet_obj->terrains()->detach();
        $terrain_ids = Terrain::whereIn('name', $terrain_list)->orderBy('name', 'ASC')->pluck('id');
        $planet_obj->terrains()->sync($terrain_ids);

        $people_obj = new People();
        $resident_list = $data->residents;
        $people_obj->sync_data($resident_list);

        $planet_obj->residents()->detach();
        $resident_ids = People::whereIn('url', $resident_list)->orderBy('url', 'ASC')->pluck('id');
        $planet_obj->residents()->sync($resident_ids);

    }

    public function sync($url)
    {
        $clients = new Client();
        $response = $clients->request('GET', $url);
        if($response->getStatusCode() == 200)
        {
            $body = $response->getBody();
            $content = $body->getContents();
            $content_parse = json_decode($content);
            if(property_exists($content_parse, 'results'))
            {
                foreach ($content_parse->results as $key => $value)
                {
                    $this->update_or_create($value);
                }
                if($content_parse->next)
                {
                    $this->sync($content_parse->next);
                }
            }
            else
            {
                $this->update_or_create($content_parse);
            }
        }
    }
}
