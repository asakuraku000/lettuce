<div>
    {{-- Nothing in the world is as soft and yielding as water. --}}

    <div class="container">
        <!-- Hero Section -->
        <section class="hero">
            <div class="hero-content">
                <div class="hero-badge">
                    <span class="badge-icon">🧠</span>
                    <span>RESNET50 Architecture</span>
                </div>
                <h1 class="hero-title gradient-text">
                    Detect Lettuce Diseases
                    {{-- <span class="gradient-text">Precision</span> --}}
                </h1>
                <p class="hero-description">
                    Upload a photo of your lettuce plants and get disease detection
                    with treatment recommendations.
                </p>
            </div>
        </section>

        <!-- Upload Section -->
        <section class="upload-section">
            <form wire:submit.prevent="uploadImage">
                <section class="upload-section" wire:ignore.self>
                    <div class="upload-card">
                        <div class="upload-header">
                            <h2>Upload Lettuce Image</h2>
                            <p>Please upload a clear photograph of your lettuce leaves, with a focus on the affected areas for disease analysis.</p>
                        </div>

                        <div class="file-upload-wrapper" wire:ignore>
    <input type="file"
        @if ($analyzeButton == false) id='' @endif
        id="file-upload-input"
        class="hidden-file-input"
        accept="image/*"
        wire:model="image"
        @if ($analyzeButton == false) disabled @endif
    >

    <label for="file-upload-input" class="file-upload-area">
        <div class="file-upload-content">
            <div class="file-upload-icon"></div>
            <p>Click to browse</p>
            <p class="file-upload-info">Supports JPG and PNG up to 200kb</p>
        </div>

        <!-- Image preview -->
        <div id="preview-container" class="mt-2"></div>

        <!-- Upload progress bar -->
        <div wire:loading wire:target="image" class="mt-3">
            <div class="progress" style="height: 30px;">
                <div
                    class="progress-bar progress-bar-striped progress-bar-animated bg-success p-5"
                    role="progressbar"
                    style="width: 100%">
                    Uploading...
                </div>
            </div>
        </div>
    </label>
</div>
@error('image')
    <div role="alert" 
         style="background-color:#f8d7da; 
                color:#842029; 
                border:1px solid #f5c2c7; 
                border-radius:6px; 
                padding:10px 15px; 
                margin-top:10px; margin-bottom:10px;
                position:relative;">
        <strong>Error:</strong> {{ $message }}
        <button type="button" 
                onclick="this.parentElement.style.display='none'" 
                style="position:absolute; 
                       top:5px; 
                       right:10px; 
                       background:none; 
                       border:none; 
                       font-size:16px; 
                       font-weight:bold; 
                       color:#842029; 
                       cursor:pointer;">
            
        </button>
    </div>
@enderror
                        <button 
                            type="submit" 
                            class="analyze-btn"
                            @if ($analyzeButton == false) disabled @endif
                            wire:loading.attr="disabled" 
                            wire:target="analyzeImage"
                        >
                        <span class="btn-icon">🔍</span>
                        <span wire:loading.remove wire:target="analyzeImage">Analyze Image</span>
                        <span wire:loading wire:target="analyzeImage">Analyzing...</span>
                    </button>
                    </div>
                </section>
            </form>
        </section>

        <!-- Loading Section -->
        <section class="loading-section" id="loadingSection" style="display: none;">
            <div class="loading-card">
                <div class="loading-spinner"></div>
                <h3>Analyzing your lettuce image...</h3>
                <p>Our AI is examining the plant for disease indicators</p>
                <div class="loading-progress">
                    <div class="progress-bar" id="progressBar"></div>
                </div>
                <div class="loading-steps">
                    <div class="step active" id="step1">📸 Processing image</div>
                    <div class="step" id="step2">🧠 AI analysis</div>
                    <div class="step" id="step3">📊 Generating results</div>
                </div>
            </div>
        </section>

        <!-- Results Section -->
        @if ($predictions !== null)
            <section class="results-section" id="resultsSection">
                <div class="results-card">
                    <div class="results-header">
                        <h2>Analysis Results</h2>
                    </div>
                    @php
                        $prediction = is_array($predictions) ? $predictions[0] ?? null : $predictions->first();
                    @endphp
                    @if ($prediction)
                        <div class="disease-detection"
                            style="
                            text-align: center;
                            font-weight: bold;">
                            <h6>Confidence Score</h6>
                           <div class="progress" style="background: #dcfce7; border-radius: 8px;">
    <div class="progress-bar"
        role="progressbar"
        style="
            width: {{ round($prediction['confidence'] * 100, 2) }}%;
            text-align: center;
            font-weight: bold;
            color: white;
            background-color: {{ round($prediction['confidence'] * 100, 2) < 70 ? '#fd7e14' : '#198754' }};
        "
        aria-valuenow="{{ round($prediction['confidence'] * 100, 2) }}"
        aria-valuemin="0"
        aria-valuemax="100">
        {{ round($prediction['confidence'] * 100, 2) }}%
    </div>
</div>
                        </div>

                        <div class="detection-main">
                         @if (strtolower($recommendation->disease_name) != 'healthy')
                            <div class="disease-icon" id="diseaseIcon">🦠</div>
                        @endif
                           
                            <div class="disease-info">
                                <p id="diseaseDescription">
                                    @if ($recommendation)
                                        <h2>
                                            @if (($recommendation->disease_name) == 'bacterial')
                                                Bacterial Disease
                                            @elseif($recommendation->disease_name == 'Downy_mildew_on_lettuce')
                                                Downy Mildew Disease
                                            @elseif($recommendation->disease_name == 'Viral')
                                                Viral Disease
                                            @elseif($recommendation->disease_name == 'Powdery_mildew_on_lettuce')
                                                Powdery Mildew Disease
                                            @elseif($recommendation->disease_name == 'Wilt_and_leaf_blight_on_lettuce')
                                                Wilt and Leaf Blight Disease
                                            @elseif($recommendation->disease_name == 'healthy')
                                                Healthy
                                            @elseif($recommendation->disease_name == 'Septoria_Blight_on_lettuce')
                                                Septorial Blight Disease
                                            @endif
                                            
                                             <!--{{ ucfirst($recommendation->disease_name) }}-->
                                        </h2>
                                        @if(ucfirst($recommendation->disease_name) == 'healthy')
                                              <p><strong>Treatment:</strong>
                                                NONE</p>
                                            <p><strong>Prevention:</strong>
                                                {{ $recommendation->recommendation['prevention'] }}</p>
                                        @else
                                         
                                                 @if ($recommendation && $recommendationData)
                                                    <p><strong>Treatment:</strong> {{ $recommendationData['treatment'] ?? '' }}</p>
                                                    <p><strong>Prevention:</strong> {{ $recommendationData['prevention'] ?? '' }}</p>
                                                @endif
                                           
                                        @endif
                                      
                                    @endif
                                </p>
                            </div>
                        </div>

                        <div class="action-buttons">
                            <button class="btn-secondary" id="reloadBtn" onclick="location.reload();">
                                <span class="btn-icon">📷</span>
                                Analyze Another Image
                            </button>

                        </div>
                    @endif

                </div>

            </section>
        @endif

        <!-- How It Works Section -->
        <section class="how-it-works">
            <div class="section-header">
                <h2>How It Works</h2>
                <p>Simple 3-step process powered by advanced AI</p>
            </div>

            <div class="steps-grid">
                <div class="step-card">
                    <div class="step-number">1</div>
                    <div class="step-icon">📤</div>
                    <h3>Upload Image</h3>
                    <p>Simply capture or upload a photo of your lettuce plants.</p>
                </div>

                <div class="step-card">
                    <div class="step-number">2</div>
                    <div class="step-icon">🧠</div>
                    <h3>AI Analysis</h3>
                    <p>Our trained model using RESNET50 analyzes the image, comparing it against our trainied disease
                        dataset.</p>
                </div>

                <div class="step-card">
                    <div class="step-number">3</div>
                    <div class="step-icon">📊</div>
                    <h3>Get Results</h3>
                    <p>Receive an analysis with disease identification and treatment
                        recommendations.</p>
                </div>
            </div>
        </section>
    </div>

    @script
        <script>
            document.getElementById('file-upload-input').addEventListener('change', function(event) {
                const file = event.target.files[0];
                const previewContainer = document.getElementById('preview-container');
                const uploadContent = document.querySelector('.file-upload-content');
        
                if (file) {
                    const reader = new FileReader();
        
                    reader.onload = function(e) {
                        previewContainer.innerHTML = '';
        
                        const img = document.createElement('img');
                        img.src = e.target.result;
                        img.classList.add('image-preview', 'max-w-xs', 'rounded-lg', 'shadow');
        
                        uploadContent.style.display = 'none';
                        previewContainer.appendChild(img);
                    };
        
                    reader.readAsDataURL(file);
                } else {
                    uploadContent.style.display = 'block';
                    previewContainer.innerHTML = '';
                }
            }, { once: true });
        </script>
        <script>
            document.getElementById("reloadBtn").addEventListener("click", function() {
                // Scroll to top
                window.scrollTo(0, 0);
                // Reload page
                location.reload();
            });
        </script>
    @endscript

</div>
