<?php

use App\Models\Recommendation;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('recommendations', function (Blueprint $table) {
            $table->id();
            $table->string('disease_name'); // Name of the disease
            $table->text('recommendation'); // Recommendation text
            $table->timestamps();
        });

        Recommendation::create([
            'disease_name' => 'bacterial',
            'recommendation' => '{
                                    "treatment": "No chemical sprays can cure a bacterial infection. Remove and destroy infected plants immediately to prevent the spread.",
                                    "prevention": "Use disease-free seeds or transplants. Avoid overhead watering to keep foliage dry. Improve air circulation and avoid planting in wet, poorly drained soil."
                                }'
        ]);
         Recommendation::create([
            'disease_name' => 'Downy_mildew_on_lettuce',
            'recommendation' => '{
                                    "treatment": "If the disease is already present, you should remove and destroy infected leaves or plants to limit spread. Fungicides, particularly those with active ingredients like copper or mefenoxam, can be applied to protect healthy foliage.",
                                    "prevention": "The best way to prevent downy mildew is by managing the environment. Increase air circulation by proper plant spacing, and avoid overhead watering to keep leaves dry. You can also plant disease-resistant varieties and use crop rotation."
                                }'
        ]);
        Recommendation::create([
            'disease_name' => 'Viral',
            'recommendation' => '{
                                    "treatment": "There is no cure for a viral infection once a plant is infected. The plant should be removed and destroyed immediately.",
                                    "prevention": "The key to prevention is controlling the insect vectors. Use insecticidal soaps or neem oil to manage aphid populations. Use reflective mulches to repel aphids from the field."
                                }'
        ]);
        Recommendation::create([
            'disease_name' => 'Powdery_mildew_on_lettuce',
            'recommendation' => '{
                                    "treatment": "Apply sulfur-based fungicides or potassium bicarbonate sprays. For organic options, neem oil is also effective.",
                                    "prevention": "Ensure good air circulation and avoid excessive nitrogen fertilizer, which can promote lush, susceptible growth."
                                }'
        ]);
        Recommendation::create([
            'disease_name' => 'Wilt_and_leaf_blight_on_lettuce',
            'recommendation' => '{
                                   "treatment": "No effective chemical treatment exists once the disease is established. Remove and destroy infected plants immediately to stop the spread.",
                                    "prevention": "Practice crop rotation with non-host plants to reduce pathogen buildup in the soil. Use raised beds and well-drained soil."
                                }'
        ]);
         Recommendation::create([
            'disease_name' => 'healthy',
            'recommendation' => '{
                                    "treatment": "No treatment is necessary for a healthy plant.",
                                    "prevention": "To maintain a healthy plant, provide it with well-drained soil, adequate sunlight, and consistent watering. Regularly inspect the plant for signs of pests or disease."
                                }'
        ]);
         Recommendation::create([
            'disease_name' => 'Septoria_Blight_on_lettuce',
            'recommendation' => '{
                                    "treatment": "Copper-based fungicides can help manage the spread of the disease. Remove and dispose of infected leaves to slow its progression.",
                                    "prevention": "Water plants at the soil level to avoid wetting the leaves. Clean up and dispose of all crop debris after harvest, as the fungus can overwinter in plant matter."
                                }'
        ]);

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recommendations');
    }
};
