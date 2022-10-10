<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Inertia\Inertia;

class RestaurantController extends Controller
{
    private $api_key = "AIzaSyDHuyYfChBZWMDC7v-K4l3ubWVxlSV5GxY";
    private $bangSueLatLng = '13.828253%2C100.5284507';

    public function index()
    {
        $client = new Client();
        $response = $client->request(
            'GET',
            'https://maps.googleapis.com/maps/api/place/findplacefromtext/json',
            [
                'query' => [
                    'input' => 'Bang Sue',
                    'inputtype' => 'textquery',
                    'key' => $this->api_key
                ]
            ]
        );

        // print_r (json_decode($response->getBody(),true));
        $response = json_decode($response->getBody(), true);
        // $candidate = $response[0]->candidate;
        $place_id = $response["candidates"][0]["place_id"];
        $response2 = $client->request(
            'GET',
            'https://maps.googleapis.com/maps/api/place/details/json?',
            [
                'query' => [
                    'place_id' => $place_id,
                    'key' => $this->api_key
                ]
            ]
        );
        // dd(json_decode($response2->getBody(), true));
        $placeDetail = json_decode($response2->getBody(), true);
        return Inertia::render(
            'Restaurants/Index',
            [
                'restaurants' => $placeDetail['result']
            ]
        );
    }

    // public function searchRestaurant(Request $request)
    // {
    //     $client = new Client();
    //     $response = $client->request(
    //         'GET',
    //         'https://maps.googleapis.com/maps/api/place/findplacefromtext/json',
    //         [
    //             'query' => [
    //                 'input' => 'Bang Sue',
    //                 'inputtype' => 'textquery',
    //                 'key' => $this->api_key
    //             ]
    //         ]
    //     );

    //     // print_r (json_decode($response->getBody(),true));
    //     $response = json_decode($response->getBody(), true);
    //     // $candidate = $response[0]->candidate;
    //     $place_id = $response["candidates"][0]["place_id"];
    //     $response2 = $client->request(
    //         'GET',
    //         'https://maps.googleapis.com/maps/api/place/details/json?',
    //         [
    //             'query' => [
    //                 'place_id' => $place_id,
    //                 'key' => $this->api_key
    //             ]
    //         ]
    //     );
    //     // dd(json_decode($response2->getBody(), true));
    //     $placeDetail = json_decode($response2->getBody(), true);
    //     return Inertia::render(
    //         'Restaurants/Index',
    //         [
    //             'restaurants' => $placeDetail['result']
    //         ]
    //     );
    // }

    // public function getPlaceDetail(Request $request){
    //     $request
    //     $response = json_decode($response->getBody(), true);
    //     // $candidate = $response[0]->candidate;
    //     $place_id = $response["candidates"][0]["place_id"];
    //     $response2 = $client->request(
    //         'GET',
    //         'https://maps.googleapis.com/maps/api/place/details/json?',
    //         [
    //             'query' => [
    //                 'place_id' => $place_id,
    //                 'key' => $this->api_key
    //             ]
    //         ]
    //     );
    //     // dd(json_decode($response2->getBody(), true));
    //     $placeDetail = json_decode($response2->getBody(), true);
    //     return Inertia::render(
    //         'Restaurants/Index',
    //         [
    //             'restaurants' => $placeDetail['result']
    //         ]
    //     );
    // }
    //
}
