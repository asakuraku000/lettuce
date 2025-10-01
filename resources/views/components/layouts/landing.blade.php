<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LettuceCare</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    {{-- <link rel="stylesheet" href="styles.css"> --}}
    <style>
        /* Reset and Base Styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
            line-height: 1.6;
            color: #1f2937;
            background: linear-gradient(135deg, #f0fdf4 0%, #ecfdf5 50%, #f0f9ff 100%);
            min-height: 100vh;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        /* Header */
        .header {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-bottom: 1px solid #e5e7eb;
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1rem 0;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .logo-icon {
            width: 40px;
            height: 40px;
            background: linear-gradient(135deg, #16a34a, #15803d);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
        }

        .logo-text {
            font-size: 1.5rem;
            font-weight: 700;
            color: #1f2937;
        }

        .nav-tagline {
            color: #6b7280;
            font-weight: 500;
        }

        /* Main Content */
        .main {
            padding: 2rem 0;
        }

        /* Hero Section */
        .hero {
            text-align: center;
            padding: 3rem 0;
            margin-bottom: 2rem;
        }

        .hero-badge {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            background: #dcfce7;
            color: #166534;
            padding: 0.5rem 1rem;
            border-radius: 50px;
            font-size: 0.875rem;
            font-weight: 500;
            margin-bottom: 1.5rem;
        }

        .badge-icon {
            font-size: 1rem;
        }

        .hero-title {
            font-size: clamp(2.5rem, 5vw, 4rem);
            font-weight: 800;
            line-height: 1.1;
            margin-bottom: 1.5rem;
            color: #1f2937;
        }

        .gradient-text {
            background: linear-gradient(135deg, #16a34a, #3b82f6);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .hero-description {
            font-size: 1.25rem;
            color: #6b7280;
            max-width: 600px;
            margin: 0 auto;
            line-height: 1.6;
        }

        /* Upload Section */
        .upload-section {
            margin-bottom: 3rem;
        }

        .upload-card {
            background: white;
            border-radius: 20px;
            padding: 2rem;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
            border: 1px solid #e5e7eb;
        }

        .upload-header {
            text-align: center;
            margin-bottom: 2rem;
        }

        .upload-header h2 {
            font-size: 1.875rem;
            font-weight: 700;
            color: #1f2937;
            margin-bottom: 0.5rem;
        }

        .upload-header p {
            color: #6b7280;
            font-size: 1rem;
        }

        .upload-area {
            border: 2px dashed #d1d5db;
            border-radius: 15px;
            padding: 3rem 2rem;
            text-align: center;
            transition: all 0.3s ease;
            position: relative;
            background: #fafafa;
            margin-bottom: 2rem;
        }

        .upload-area:hover {
            border-color: #16a34a;
            background: #f0fdf4;
        }

        .upload-area.dragover {
            border-color: #16a34a;
            background: #f0fdf4;
            transform: scale(1.02);
        }

        .upload-content h3 {
            font-size: 1.25rem;
            font-weight: 600;
            color: #1f2937;
            margin-bottom: 0.5rem;
        }

        .upload-content p {
            color: #6b7280;
            margin-bottom: 1.5rem;
        }

        .upload-icon {
            font-size: 3rem;
            margin-bottom: 1rem;
        }

        .upload-btn {
            background: linear-gradient(135deg, #16a34a, #15803d);
            color: white;
            border: none;
            padding: 0.75rem 2rem;
            border-radius: 10px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .upload-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(22, 163, 74, 0.3);
        }

        .image-preview {
            position: relative;
            max-width: 400px;
            margin: 0 auto;
        }

        .image-preview img {
            width: 100%;
            height: 300px;
            object-fit: cover;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .remove-btn {
            position: absolute;
            top: 10px;
            right: 10px;
            background: rgba(239, 68, 68, 0.9);
            color: white;
            border: none;
            width: 30px;
            height: 30px;
            border-radius: 50%;
            cursor: pointer;
            font-size: 1rem;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .analyze-btn {
            width: 100%;
            background: linear-gradient(135deg, #3b82f6, #2563eb);
            color: white;
            border: none;
            padding: 1rem 2rem;
            border-radius: 15px;
            font-size: 1.125rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
        }

        .analyze-btn:hover:not(:disabled) {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(59, 130, 246, 0.3);
        }

        .analyze-btn:disabled {
            background: #d1d5db;
            cursor: not-allowed;
            transform: none;
            box-shadow: none;
        }

        .btn-icon {
            font-size: 1.25rem;
        }

        /* Loading Section */
        .loading-section {
            margin-bottom: 3rem;
        }

        .loading-card {
            background: white;
            border-radius: 20px;
            padding: 3rem 2rem;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .loading-spinner {
            width: 60px;
            height: 60px;
            border: 4px solid #e5e7eb;
            border-top: 4px solid #16a34a;
            border-radius: 50%;
            animation: spin 1s linear infinite;
            margin: 0 auto 1.5rem;
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        .loading-card h3 {
            font-size: 1.5rem;
            font-weight: 600;
            color: #1f2937;
            margin-bottom: 0.5rem;
        }

        .loading-card p {
            color: #6b7280;
            margin-bottom: 2rem;
        }

        .loading-progress {
            background: #e5e7eb;
            height: 8px;
            border-radius: 4px;
            margin-bottom: 2rem;
            overflow: hidden;
        }

        .progress-bar {
            height: 100%;
            background: linear-gradient(90deg, #16a34a, #3b82f6);
            border-radius: 4px;
            width: 0%;
            transition: width 0.3s ease;
        }

        .loading-steps {
            display: flex;
            justify-content: center;
            gap: 2rem;
            flex-wrap: wrap;
        }

        .step {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            color: #9ca3af;
            font-size: 0.875rem;
            transition: color 0.3s ease;
        }

        .step.active {
            color: #16a34a;
            font-weight: 600;
        }

        /* Results Section */
        .results-section {
            margin-bottom: 3rem;
        }

        .results-card {
            background: white;
            border-radius: 20px;
            padding: 2rem;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }

        .results-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
            flex-wrap: wrap;
            gap: 1rem;
        }

        .results-header h2 {
            font-size: 1.875rem;
            font-weight: 700;
            color: #1f2937;
        }

        .confidence-badge {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            background: #dcfce7;
            color: #166534;
            padding: 0.5rem 1rem;
            border-radius: 50px;
            font-weight: 600;
        }

        .confidence-icon {
            font-size: 1rem;
        }

        .disease-detection {
            background: #f9fafb;
            border-radius: 15px;
            padding: 1.5rem;
            margin-bottom: 2rem;
        }

        .detection-main {
            display: flex;
            align-items: center;
            gap: 1rem;
            margin-bottom: 1.5rem;
        }

        .disease-icon {
            width: 60px;
            height: 60px;
            background: linear-gradient(135deg, #ef4444, #dc2626);
            border-radius: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
        }

        .disease-info h3 {
            font-size: 1.5rem;
            font-weight: 700;
            color: #1f2937;
            margin-bottom: 0.25rem;
        }

        .disease-info p {
            color: #6b7280;
        }

        .severity-meter {
            display: flex;
            align-items: center;
            gap: 1rem;
            flex-wrap: wrap;
        }

        .severity-meter label {
            font-weight: 600;
            color: #374151;
            min-width: 100px;
        }

        .severity-bar {
            flex: 1;
            height: 10px;
            background: #e5e7eb;
            border-radius: 5px;
            overflow: hidden;
            min-width: 200px;
        }

        .severity-fill {
            height: 100%;
            background: linear-gradient(90deg, #fbbf24, #f59e0b, #ef4444);
            border-radius: 5px;
            transition: width 0.5s ease;
        }

        .recommendations {
            margin-bottom: 2rem;
        }

        .recommendations h3 {
            font-size: 1.25rem;
            font-weight: 700;
            color: #1f2937;
            margin-bottom: 1rem;
        }

        .recommendation-list {
            display: grid;
            gap: 1rem;
        }

        .recommendation-item {
            background: #f0fdf4;
            border: 1px solid #bbf7d0;
            border-radius: 10px;
            padding: 1rem;
            display: flex;
            align-items: flex-start;
            gap: 0.75rem;
        }

        .recommendation-icon {
            width: 24px;
            height: 24px;
            background: #16a34a;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 0.75rem;
            flex-shrink: 0;
            margin-top: 0.125rem;
        }

        .recommendation-content h4 {
            font-weight: 600;
            color: #166534;
            margin-bottom: 0.25rem;
        }

        .recommendation-content p {
            color: #15803d;
            font-size: 0.875rem;
        }

        .action-buttons {
            display: flex;
            gap: 1rem;
            flex-wrap: wrap;
        }

        .btn-primary,
        .btn-secondary {
            padding: 0.75rem 1.5rem;
            border-radius: 10px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            border: none;
            font-size: 1rem;
        }

        .btn-primary {
            background: linear-gradient(135deg, #16a34a, #15803d);
            color: white;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(22, 163, 74, 0.3);
        }

        .btn-secondary {
            background: white;
            color: #374151;
            border: 2px solid #e5e7eb;
        }

        .btn-secondary:hover {
            border-color: #16a34a;
            color: #16a34a;
            transform: translateY(-2px);
        }

        /* How It Works Section */
        .how-it-works {
            margin-bottom: 3rem;
        }

        .section-header {
            text-align: center;
            margin-bottom: 3rem;
        }

        .section-header h2 {
            font-size: 2.5rem;
            font-weight: 700;
            color: #1f2937;
            margin-bottom: 1rem;
        }

        .section-header p {
            font-size: 1.25rem;
            color: #6b7280;
        }

        .steps-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
        }

        .step-card {
            background: white;
            border-radius: 20px;
            padding: 2rem;
            text-align: center;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
            border: 1px solid #e5e7eb;
            transition: all 0.3s ease;
            position: relative;
        }

        .step-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
        }

        .step-number {
            position: absolute;
            top: -15px;
            left: 50%;
            transform: translateX(-50%);
            width: 30px;
            height: 30px;
            background: linear-gradient(135deg, #3b82f6, #2563eb);
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            font-size: 0.875rem;
        }

        .step-icon {
            font-size: 3rem;
            margin-bottom: 1rem;
        }

        .step-card h3 {
            font-size: 1.25rem;
            font-weight: 700;
            color: #1f2937;
            margin-bottom: 1rem;
        }

        .step-card p {
            color: #6b7280;
            line-height: 1.6;
        }

        /* Footer */
        .footer {
            background: #1f2937;
            color: white;
            padding: 2rem 0;
            margin-top: 4rem;
        }

        .footer-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 1rem;
        }

        .footer-logo {
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .footer p {
            color: #9ca3af;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .container {
                padding: 0 15px;
            }

            .nav {
                flex-direction: column;
                gap: 1rem;
                text-align: center;
            }

            .hero {
                padding: 2rem 0;
            }

            .upload-card {
                padding: 1.5rem;
            }

            .upload-area {
                padding: 2rem 1rem;
            }

            .results-header {
                flex-direction: column;
                align-items: flex-start;
            }

            .detection-main {
                flex-direction: column;
                text-align: center;
            }

            .severity-meter {
                flex-direction: column;
                align-items: flex-start;
            }

            .action-buttons {
                flex-direction: column;
            }

            .btn-primary,
            .btn-secondary {
                width: 100%;
                justify-content: center;
            }

            .steps-grid {
                grid-template-columns: 1fr;
            }

            .footer-content {
                flex-direction: column;
                text-align: center;
            }
        }

        /* Animations */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .fade-in-up {
            animation: fadeInUp 0.6s ease-out;
        }

        @keyframes pulse {

            0%,
            100% {
                opacity: 1;
            }

            50% {
                opacity: 0.5;
            }
        }

        .pulse {
            animation: pulse 2s infinite;
        }
    </style>
    <style>
        .hidden-file-input {
            display: none;
        }

        .file-upload-wrapper {
            /* Add padding and a container to hold the upload area */
            padding: 20px;
            max-width: 500px;
            margin: 0 auto;
        }

        .file-upload-area {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            border: 2px dashed #ccc;
            /* Dashed border for the drag area */
            border-radius: 8px;
            /* Slightly rounded corners */
            padding: 40px 20px;
            text-align: center;
            cursor: pointer;
        }

        .file-upload-area:hover {
            border-color: #999;
            /* Change border color on hover */
        }

        .file-upload-icon {
            width: 50px;
            height: 50px;
            margin-bottom: 15px;
        }

        .file-upload-icon svg {
            width: 100%;
            height: 100%;
            fill: #aaa;
            /* Color for the SVG icon */
        }

        .file-upload-area p {
            margin: 0;
            color: #555;
        }

        .file-upload-area .file-upload-info {
            font-size: 12px;
            color: #888;
            margin-top: 5px;
            margin-bottom: 20px;
        }

        .file-upload-area .btn {
            /* Style your button here */
            padding: 8px 20px;
            border-radius: 5px;
            font-weight: bold;
        }
    </style>
    <style>
        /* Style for the dynamically added image */
        .file-upload-area .image-preview {
            max-width: 100%;
            max-height: 100%;
            object-fit: contain;
            /* Ensures the image fits within the container without distortion */
            display: block;
            border-radius: 8px;
            /* Match the wrapper's border-radius */
        }

        /* Optional: hide the "Click to browse" text and icon */
        .file-upload-area .file-upload-content {
            /* Styles for the default state */
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100%;
        }
    </style>
</head>

<body>
    <!-- Header -->
    <header class="header">
        <div class="container">
            <div class="nav">
                <div class="logo">
                    <div class="logo-icon">🌱</div>
                    <span class="logo-text">LettuceCare</span>
                </div>
                <div class="nav-tagline">Lettuce Disease Classification</div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="main">
        {{ $slot }}
    </main>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="footer-content">
                <div class="footer-logo">
                    <div class="logo-icon">🌱</div>
                    <span class="logo-text">CropAI</span>
                </div>
                <p>&copy; 2025 LETTUCECARE. Lettuce disease classification.</p>
            </div>
        </div>
    </footer>

    <script>
        const progressBar = document.getElementById('progressBar');
        const step1 = document.getElementById('step1');
        const step2 = document.getElementById('step2');
        const step3 = document.getElementById('step3');




        <
        script src = "https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity = "sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
        crossorigin = "anonymous" >
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
    <script>
        document.getElementById('file-upload-input').addEventListener('change', function() {
            const fileName = this.files[0] ? this.files[0].name : 'No file chosen';
            const fileNameDisplay = document.querySelector('.file-name-display');
            if (fileNameDisplay) {
                fileNameDisplay.textContent = fileName;
            }
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>

</html>
