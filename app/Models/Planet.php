<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use GuzzleHttp\Client;

class Planet extends Model
{
    use HasFactory;
    
    public function update_or_create($data)
    {
        $planet_obj = $this->where("name", $data->name)->first();
        if(!$planet_obj)
        {
            $planet_obj = new Planet;
        }
        $planet_obj->name = $data->name;
        $planet_obj->rotation_period = $data->rotation_period;
        $planet_obj->orbital_period = $data->orbital_period;
        $planet_obj->diameter = $data->diameter;
        $planet_obj->climate = $data->climate;
        $planet_obj->gravity = $data->gravity;
        $planet_obj->terrain = json_encode($data->terrain);
        $planet_obj->surface_water = $data->surface_water;
        $planet_obj->population = $data->population;
        $planet_obj->url = $data->url;
        $planet_obj->save();
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
