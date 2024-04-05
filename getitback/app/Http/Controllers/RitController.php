<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rit;
use GuzzleHttp\Client;

class RitController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'pickup_location' => 'required|string|max:255',
            'dropoff_location' => 'required|string|max:255',
            'scheduled_pickup_time' => 'required|date',
        ]);

        $client = new Client();
        $response = $client->get('https://maps.googleapis.com/maps/api/distancematrix/json', [
            'query' => [
                'origins' => $validatedData['pickup_location'],
                'destinations' => $validatedData['dropoff_location'],
                'key' => config('services.google_maps.key'),
            ]
        ]);

        $data = json_decode($response->getBody(), true);
        
        if ($response->getStatusCode() == 200 && !empty($data['rows'][0]['elements'][0]['distance'])) {
            $distance = $data['rows'][0]['elements'][0]['distance']['value']; // Afstand in meters
            $cost = $this->calculateCost($distance); // Bereken de kosten

            $rit = new Rit();
            $rit->pickup_location = $validatedData['pickup_location'];
            $rit->dropoff_location = $validatedData['dropoff_location'];
            $rit->status = 'gepland';
            $rit->user_id = auth()->user()->id;
            $rit->distance = $distance / 1000; // Omrekenen naar kilometers
            $rit->cost = $cost;
            $rit->scheduled_pickup_time = date('Y-m-d H:i:s', strtotime($validatedData['scheduled_pickup_time'])); // Geplande ophaaltijd
            $rit->scheduled_dropoff_time = now()->addHours(1); // Voeg een uur toe voor de afleveringstijd

            $rit->save();
            
            return redirect()->route('dashboard')->with('success', 'Rit succesvol geboekt!');
        } else {
            return back()->withErrors('Er is een fout opgetreden bij het berekenen van de afstand.');
        }
    }

    private function calculateCost($distanceInMeters) {
        $pricePerMeter = 1.20 / 1000; // Aangenomen dat de prijs per kilometer is
        return $distanceInMeters * $pricePerMeter; // Kosten berekenen
    }
}
