<?php

namespace App\Livewire;

use App\Models\Recommendation;
use Illuminate\Support\Facades\Http;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithFileUploads;

class LandingPage extends Component
{

    use WithFileUploads;

    public $lettuceImage;

    public $image;
    public $imagePath; // will store public path to uploaded image

    public $analysis = false;

    public $pageLoad = 0;
    
    public $analyzeButton = true;

    public $predictions = null;

    public $recommendation;
    public $recommendationData;
    public function mount()
    {
        // dd($this->detectLettuceDisease());

    }

    public function upload()
    {
        // Validate

    }

    public function uploadImage()
    {
        $this->validate([
            'image' => 'required|image|max:200', // max 2MB
        ]);

        // Store to public/images
        $fileName = time() . '.' . $this->image->getClientOriginalExtension();
        $this->image->storeAs('images', $fileName, 'public');

        // Create public path
        $this->imagePath = asset('storage/images/' . $fileName);
        // dd($this->imagePath);
        $this->detectLettuceDisease($this->imagePath);
        // dd($res);
    }
    public function detectLettuceDisease($imageUrl)
    {
        if($this->pageLoad == 1)
        {
            return;
        }
        $apiKey = 'G166Drv28RB9tViz9fVC'; // Your Roboflow API Key
        // $roboURL = "https://serverless.roboflow.com/lettucedisease2-vx0i5/1?api_key={$apiKey}&image={$imageUrl}";
        // dd($roboURL);
        // $imageUrl = 'https://source.roboflow.com/68MXVit0eebbdQoMUXZ5QGpcB643/XuUWUkpDXLm1EaGCSsLq/original.jpg';
        // dd($imageUrl);
        try {
            $response = Http::post("https://serverless.roboflow.com/lettucedisease2-vx0i5/1?api_key={$apiKey}&image={$imageUrl}");
            // dd($response);
            // Check if the request was successful
            // dd($response);
            if ($response->successful()) {
                // The json() method returns the response body as an array or object
                $data = $response->json();
                $this->analysis = true;
                $this->analyzeButton = false;
                // return $data;
                // // Access the specific data you need
                // $inferenceId = $data['inference_id'];
                $this->predictions = $data['predictions'];
               
             
                // // You can loop through predictions
                $highestConfidence = null;
                $highestPrediction = null;
                foreach ($this->predictions as $prediction) {
                    if (is_null($highestConfidence) || $prediction['confidence'] > $highestConfidence) {
                        $highestConfidence = $prediction['confidence'];
                        $highestPrediction = $prediction;
                    }
                }
                        //   dd($highestPrediction);
                if ($highestPrediction) {
                    $class = $highestPrediction['class'];
                    $confidence = $highestPrediction['confidence'];
                    // echo "Highest confidence: Detected class: " . $class . " with confidence: " . $confidence . "\n";
                }
                //   dd($class);

                // $this->recommendation = Recommendation::where('disease_name', $class)
                //     ->first();
                // if ($this->recommendation) {
                //     $this->recommendation->recommendation = json_decode($this->recommendation->recommendation, true);
                // }
                
                $this->recommendation = Recommendation::where('disease_name', $class)
                    ->first();
                
                if ($this->recommendation) {
                    $this->recommendationData = json_decode($this->recommendation->recommendation, true);
                }


                // dd($this->recommendation);
                $this->pageLoad = 1;
            } else {
                LivewireAlert::title('Error Occured')
                    ->text('An error occured, Please try again')
                    ->warning()
                    ->show();
                // Handle failed request, e.g., print status code and error message
                
            }
           



            // Throw an exception if a client or server error occurred
            $response->throw();

            // Return the decoded JSON body from the API
            return response()->json($response->json());

        } catch (\Illuminate\Http\Client\RequestException $e) {
            // Handle HTTP errors (e.g., 404, 500)
            return response()->json(['error' => 'API request failed', 'message' => $e->getMessage()], 500);
        }
    }


    #[Layout('components.layouts.landing')]
    public function render()
    {
        return view('livewire.landing-page');
    }
}
