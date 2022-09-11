<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Http;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    public function cURLAll()
    {
        $endpoint = 'https://user-transaction-fetch-api.herokuapp.com/user';
        $headers = [
            'X-header' => 'value'
        ];

        $response = Http::withHeaders($headers)->post($endpoint);
        $content = json_decode($response->getBody(), true);
        return $content;
    }

    public function cURLGetOne($id)
    {
        $endpoint = "https://user-transaction-fetch-api.herokuapp.com/transaction/user/". $id;

        $headers = [
            'X-header' => 'value'
        ];

        $response = Http::withHeaders($headers)->post($endpoint);

        $content = json_decode($response->getBody(), true);
        return $content;
    }

    public function cURLLog()
    {
        $endpoint = "https://user-transaction-fetch-api.herokuapp.com/log";

        $headers = [
            'X-header' => 'value'
        ];

        $response = Http::withHeaders($headers)->post($endpoint);

        $content = json_decode($response->getBody(), true);
        return $content;
    }
}
