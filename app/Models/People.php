<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use GuzzleHttp\Client;


class People extends Model
{
    use HasFactory;

    protected $fillable = [
        'url',
    ];

    public function planets()
    {
        return $this->belongsToMany(Planet::class, 'people_planets');
    }

    public function update_or_create($data)
    {
        $planet_obj = People::firstOrNew(['url' => $data->url]);
        $planet_obj->name = $data->name;
        $planet_obj->height = $data->height;
        $planet_obj->mass = $data->mass;
        $planet_obj->hair_color = $data->hair_color;
        $planet_obj->skin_color = $data->skin_color;
        $planet_obj->eye_color = $data->eye_color;
        $planet_obj->birth_year = $data->birth_year;
        $planet_obj->gender = $data->gender;
        $planet_obj->homeworld = $data->homeworld;
        $planet_obj->save();
    }

    public function sync_data($people_list){
        foreach ($people_list as $key => $value) {
            $clients = new Client();
            $response = $clients->request('GET', $value);
            if($response->getStatusCode() == 200){
                $body = $response->getBody();
                $content = $body->getContents();
                $content_parse = json_decode($content);
                $this->update_or_create($content_parse);
            }
        }
    }
}
