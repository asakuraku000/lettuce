<?php

namespace App\Livewire;

use App\Models\Recommendation;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
use Livewire\Component;
use Termwind\Components\Dd;

class Recommendations extends Component
{
    public $BacterialTreatment;
    public $BacterialPrevention;

    // Downy Mildew
    public $DownyMildewTreatment;
    public $DownyMildewPrevention;

    // Viral
    public $ViralTreatment;
    public $ViralPrevention;

    // Powdery Mildew
    public $PowderyMildewTreatment;
    public $PowderyMildewPrevention;

    // Wilt and Leaf Blight
    public $WiltAndLeafBlightTreatment;
    public $WiltAndLeafBlightPrevention;

    // Healthy (no disease, maybe recommendations)
    public $HealthyTreatment;
    public $HealthyPrevention;

    // Septoria Blight
    public $SeptoriaBlightTreatment;
    public $SeptoriaBlightPrevention;


    public function update($id)
{
    $data = [
        1 => [
            'treatment' => $this->BacterialTreatment,
            'prevention' => $this->BacterialPrevention,
        ],
        2 => [
            'treatment' => $this->DownyMildewTreatment,
            'prevention' => $this->DownyMildewPrevention,
        ],
        3 => [
            'treatment' => $this->ViralTreatment,
            'prevention' => $this->ViralPrevention,
        ],
        4 => [
            'treatment' => $this->PowderyMildewTreatment,
            'prevention' => $this->PowderyMildewPrevention,
        ],
        5 => [
            'treatment' => $this->WiltAndLeafBlightTreatment,
            'prevention' => $this->WiltAndLeafBlightPrevention,
        ],
        6 => [
            'treatment' => $this->HealthyTreatment,
            'prevention' => $this->HealthyPrevention,
        ],
        7 => [
            'treatment' => $this->SeptoriaBlightTreatment,
            'prevention' => $this->SeptoriaBlightPrevention,
        ],
    ];

    if (isset($data[$id])) {
        // First encode as pretty JSON
        $prettyJson = json_encode($data[$id], JSON_PRETTY_PRINT);

        // Then encode again so it's stored as an escaped string
        $escapedJson = json_encode($prettyJson);

        Recommendation::where('id', $id)->update([
            'recommendation' => $escapedJson,
        ]);
    }
}

    public function getRecommendations()
    {
        $recomendations = Recommendation::all();

        // Map each recommendation to its treatment and prevention
        $mapped = $recomendations->map(function ($item) {
            $recommendationData = is_string($item->recommendation)
                ? json_decode($item->recommendation, true)
                : $item->recommendation;

            if ($item->disease_name === 'bacterial') {
                $this->BacterialTreatment = $recommendationData['treatment'] ?? null;
                $this->BacterialPrevention = $recommendationData['prevention'] ?? null;

            } elseif ($item->disease_name === 'Downy_mildew_on_lettuce') {
                $this->DownyMildewTreatment = $recommendationData['treatment'] ?? null;
                $this->DownyMildewPrevention = $recommendationData['prevention'] ?? null;

            } elseif ($item->disease_name === 'Viral') {
                $this->ViralTreatment = $recommendationData['treatment'] ?? null;
                $this->ViralPrevention = $recommendationData['prevention'] ?? null;

            } elseif ($item->disease_name === 'Powdery_mildew_on_lettuce') {
                $this->PowderyMildewTreatment = $recommendationData['treatment'] ?? null;
                $this->PowderyMildewPrevention = $recommendationData['prevention'] ?? null;

            } elseif ($item->disease_name === 'Wilt_and_leaf_blight_on_lettuce') {
                $this->WiltAndLeafBlightTreatment = $recommendationData['treatment'] ?? null;
                $this->WiltAndLeafBlightPrevention = $recommendationData['prevention'] ?? null;

            } elseif ($item->disease_name === 'healthy') {
                $this->HealthyTreatment = $recommendationData['treatment'] ?? null;
                $this->HealthyPrevention = $recommendationData['prevention'] ?? null;

            } elseif ($item->disease_name === 'Septoria_Blight_on_lettuce') {
                $this->SeptoriaBlightTreatment = $recommendationData['treatment'] ?? null;
                $this->SeptoriaBlightPrevention = $recommendationData['prevention'] ?? null;
            }

            return [
                'id' => $item->id,
                'disease_name' => $item->disease_name,
                'treatment' => $recommendationData['treatment'] ?? null,
                'prevention' => $recommendationData['prevention'] ?? null,
            ];
        });
        return $mapped;
    }


    public function render()
    {

        $this->getRecommendations();

        return view('livewire.recommendations')->with([
            'recommendations' => Recommendation::all(),
            // 'treatment' 
        ]);
    }
}
