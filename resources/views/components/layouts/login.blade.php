<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LettuceCare - Lettuce Disease Classifier</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            /* Green color system */
            --primary-green: #22C55E;
            --secondary-green: #10B981;
            --accent-green: #84CC16;
            --dark-green: #15803D;
            --light-green: #DCFCE7;

            /* Status colors */
            --success: #22C55E;
            --warning: #F59E0B;
            --error: #EF4444;
            --info: #3B82F6;

            /* Neutral colors */
            --white: #FFFFFF;
            --gray-50: #F9FAFB;
            --gray-100: #F3F4F6;
            --gray-200: #E5E7EB;
            --gray-300: #D1D5DB;
            --gray-400: #9CA3AF;
            --gray-500: #6B7280;
            --gray-600: #4B5563;
            --gray-700: #374151;
            --gray-800: #1F2937;
            --gray-900: #111827;

            /* Spacing system (8px base) */
            --space-1: 0.5rem;
            --space-2: 1rem;
            --space-3: 1.5rem;
            --space-4: 2rem;
            --space-5: 2.5rem;
            --space-6: 3rem;
            --space-8: 4rem;

            /* Typography */
            --font-primary: 'Inter', system-ui, -apple-system, sans-serif;
            --line-height-body: 1.5;
            --line-height-heading: 1.2;

            /* Shadows */
            --shadow-sm: 0 1px 2px 0 rgb(0 0 0 / 0.05);
            --shadow-md: 0 4px 6px -1px rgb(0 0 0 / 0.1), 0 2px 4px -2px rgb(0 0 0 / 0.1);
            --shadow-lg: 0 10px 15px -3px rgb(0 0 0 / 0.1), 0 4px 6px -4px rgb(0 0 0 / 0.1);
            --shadow-xl: 0 20px 25px -5px rgb(0 0 0 / 0.1), 0 8px 10px -6px rgb(0 0 0 / 0.1);

            /* Border radius */
            --radius-sm: 4px;
            --radius-md: 6px;
            --radius-lg: 8px;
            --radius-xl: 12px;
            --radius-2xl: 16px;
            --radius-full: 9999px;
        }

        body {
            font-family: var(--font-primary);
            background: linear-gradient(135deg, #0F172A 0%, #1E293B 50%, #0F172A 100%);
            min-height: 100vh;
            overflow-x: hidden;
            color: var(--white);
            line-height: var(--line-height-body);
        }

        .background-animation {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
            overflow: hidden;
        }

        .floating-shape {
            position: absolute;
            border-radius: var(--radius-full);
            background: linear-gradient(45deg, var(--primary-green), var(--secondary-green));
            opacity: 0.1;
            animation: float 20s infinite linear;
        }

        .shape-1 {
            width: 80px;
            height: 80px;
            top: 10%;
            left: 10%;
            animation-delay: 0s;
        }

        .shape-2 {
            width: 120px;
            height: 120px;
            top: 20%;
            right: 15%;
            animation-delay: -5s;
        }

        .shape-3 {
            width: 60px;
            height: 60px;
            bottom: 30%;
            left: 20%;
            animation-delay: -10s;
        }

        .shape-4 {
            width: 100px;
            height: 100px;
            bottom: 20%;
            right: 25%;
            animation-delay: -15s;
        }

        .shape-5 {
            width: 40px;
            height: 40px;
            top: 50%;
            left: 50%;
            animation-delay: -8s;
        }

        @keyframes float {
            0% {
                transform: translateY(0px) rotate(0deg);
                opacity: 0.1;
            }

            50% {
                transform: translateY(-20px) rotate(180deg);
                opacity: 0.2;
            }

            100% {
                transform: translateY(0px) rotate(360deg);
                opacity: 0.1;
            }
        }

        .container {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: var(--space-4);
        }

        .login-card {
            background: rgba(255, 255, 255, 0.08);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: var(--radius-2xl);
            padding: var(--space-8);
            width: 100%;
            max-width: 480px;
            box-shadow: var(--shadow-xl);
            animation: slideUp 0.8s ease-out;
            position: relative;
            overflow: hidden;
        }

        .login-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 2px;
            background: linear-gradient(90deg, transparent, var(--primary-green), transparent);
            animation: shimmer 3s infinite;
        }

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes shimmer {
            0% {
                left: -100%;
            }

            100% {
                left: 100%;
            }
        }

        .logo-section {
            text-align: center;
            margin-bottom: var(--space-8);
        }

        .logo {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: var(--space-2);
            margin-bottom: var(--space-3);
        }

        .logo-icon {
            animation: pulse 2s infinite;
        }

        @keyframes pulse {

            0%,
            100% {
                transform: scale(1);
            }

            50% {
                transform: scale(1.05);
            }
        }

        .logo-text {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--primary-green);
        }

        .app-title {
            font-size: 1.875rem;
            font-weight: 600;
            color: var(--white);
            margin-bottom: var(--space-1);
            line-height: var(--line-height-heading);
        }

        .app-subtitle {
            color: var(--gray-400);
            font-size: 0.875rem;
        }

        .login-form {
            display: flex;
            flex-direction: column;
            gap: var(--space-4);
        }

        .form-group {
            display: flex;
            flex-direction: column;
            gap: var(--space-1);
        }

        .form-label {
            font-size: 0.875rem;
            font-weight: 500;
            color: var(--white);
        }

        .input-wrapper {
            position: relative;
        }

        .form-input {
            width: 100%;
            padding: var(--space-3) var(--space-4);
            padding-right: 3rem;
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: var(--radius-lg);
            color: var(--white);
            font-size: 1rem;
            transition: all 0.3s ease;
            backdrop-filter: blur(8px);
        }

        .form-input::placeholder {
            color: var(--gray-400);
        }

        .form-input:focus {
            outline: none;
            border-color: var(--primary-green);
            box-shadow: 0 0 0 3px rgba(34, 197, 94, 0.1);
            background: rgba(255, 255, 255, 0.08);
            transform: translateY(-1px);
        }

        .input-icon {
            position: absolute;
            right: var(--space-3);
            top: 50%;
            transform: translateY(-50%);
            color: var(--gray-400);
            pointer-events: none;
            transition: color 0.3s ease;
        }

        .form-input:focus+.input-icon {
            color: var(--primary-green);
        }

        .password-toggle {
            position: absolute;
            right: var(--space-3);
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            color: var(--gray-400);
            cursor: pointer;
            padding: var(--space-1);
            border-radius: var(--radius-sm);
            transition: color 0.3s ease;
        }

        .password-toggle:hover {
            color: var(--primary-green);
        }

        .error-message {
            font-size: 0.75rem;
            color: var(--error);
            opacity: 0;
            transform: translateY(-4px);
            transition: all 0.3s ease;
            height: 0;
        }

        .error-message.show {
            opacity: 1;
            transform: translateY(0);
            height: auto;
            padding-top: var(--space-1);
        }

        .form-options {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: var(--space-2);
        }

        .checkbox-wrapper {
            display: flex;
            align-items: center;
            gap: var(--space-2);
            cursor: pointer;
            font-size: 0.875rem;
            color: var(--gray-300);
        }

        .checkbox-wrapper input[type="checkbox"] {
            display: none;
        }

        .checkmark {
            width: 18px;
            height: 18px;
            border: 1px solid rgba(255, 255, 255, 0.3);
            border-radius: var(--radius-sm);
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
            background: rgba(255, 255, 255, 0.05);
        }

        .checkbox-wrapper input[type="checkbox"]:checked+.checkmark {
            background: var(--primary-green);
            border-color: var(--primary-green);
            transform: scale(1.1);
        }

        .checkbox-wrapper input[type="checkbox"]:checked+.checkmark::after {
            content: '✓';
            color: var(--white);
            font-size: 12px;
            font-weight: bold;
        }

        .forgot-password {
            color: var(--primary-green);
            text-decoration: none;
            font-size: 0.875rem;
            transition: color 0.3s ease;
        }

        .forgot-password:hover {
            color: var(--accent-green);
            text-decoration: underline;
        }

        .login-button {
            position: relative;
            background: linear-gradient(135deg, var(--primary-green), var(--secondary-green));
            color: var(--white);
            border: none;
            padding: var(--space-3) var(--space-4);
            border-radius: var(--radius-lg);
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            overflow: hidden;
        }

        .login-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(34, 197, 94, 0.3);
        }

        .login-button:active {
            transform: translateY(0);
        }

        .login-button.loading {
            pointer-events: none;
        }

        .button-text {
            transition: opacity 0.3s ease;
        }

        .button-loader {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .login-button.loading .button-text {
            opacity: 0;
        }

        .login-button.loading .button-loader {
            opacity: 1;
        }

        .loader-spinner {
            width: 20px;
            height: 20px;
            border: 2px solid rgba(255, 255, 255, 0.3);
            border-top: 2px solid var(--white);
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        .divider {
            text-align: center;
            position: relative;
            color: var(--gray-400);
            font-size: 0.875rem;
        }

        .divider::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 0;
            right: 0;
            height: 1px;
            background: rgba(255, 255, 255, 0.1);
        }

        .divider span {
            background: rgba(255, 255, 255, 0.08);
            padding: 0 var(--space-3);
            backdrop-filter: blur(8px);
        }

        .social-login {
            display: flex;
            gap: var(--space-2);
        }

        .social-button {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: var(--space-2);
            padding: var(--space-3);
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: var(--radius-lg);
            color: var(--white);
            text-decoration: none;
            font-size: 0.875rem;
            font-weight: 500;
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .social-button:hover {
            background: rgba(255, 255, 255, 0.1);
            transform: translateY(-1px);
        }

        .signup-link {
            text-align: center;
            color: var(--gray-300);
            font-size: 0.875rem;
        }

        .signup-link a {
            color: var(--primary-green);
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .signup-link a:hover {
            color: var(--accent-green);
            text-decoration: underline;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .container {
                padding: var(--space-2);
            }

            .login-card {
                padding: var(--space-6);
            }

            .app-title {
                font-size: 1.5rem;
            }

            .form-options {
                flex-direction: column;
                align-items: flex-start;
                gap: var(--space-3);
            }

            .social-login {
                flex-direction: column;
            }

            .floating-shape {
                display: none;
            }
        }

        @media (max-width: 480px) {
            .login-card {
                padding: var(--space-4);
            }

            .logo {
                flex-direction: column;
                gap: var(--space-1);
            }

            .app-title {
                font-size: 1.25rem;
            }
        }

        /* Animation classes for JavaScript */
        .shake {
            animation: shake 0.6s ease-in-out;
        }

        @keyframes shake {

            0%,
            100% {
                transform: translateX(0);
            }

            10%,
            30%,
            50%,
            70%,
            90% {
                transform: translateX(-8px);
            }

            20%,
            40%,
            60%,
            80% {
                transform: translateX(8px);
            }
        }

        .success {
            border-color: var(--success) !important;
            box-shadow: 0 0 0 3px rgba(34, 197, 94, 0.2) !important;
        }

        .error {
            border-color: var(--error) !important;
            box-shadow: 0 0 0 3px rgba(239, 68, 68, 0.2) !important;
        }
    </style>
</head>

<body>
    <div class="background-animation">
        <div class="floating-shape shape-1"></div>
        <div class="floating-shape shape-2"></div>
        <div class="floating-shape shape-3"></div>
        <div class="floating-shape shape-4"></div>
        <div class="floating-shape shape-5"></div>
    </div>

   {{ $slot }}

    <script>
        // DOM Elements
        const loginForm = document.getElementById('loginForm');
        const emailInput = document.getElementById('email');
        const passwordInput = document.getElementById('password');
        const passwordToggle = document.getElementById('passwordToggle');
        const loginButton = document.getElementById('loginButton');
        const buttonLoader = document.getElementById('buttonLoader');
        const emailError = document.getElementById('emailError');
        const passwordError = document.getElementById('passwordError');
        const signupLink = document.getElementById('signupLink');
        const rememberMe = document.getElementById('rememberMe');

        // Animation and interaction handlers
        class LoginPageController {
            constructor() {
                this.isLoading = false;
                this.init();
            }

            init() {
                this.bindEvents();
                this.startBackgroundAnimations();
                this.loadRememberedCredentials();
            }

            bindEvents() {
                // Form submission
                loginForm.addEventListener('submit', (e) => this.handleLogin(e));

                // Input validation on blur
                emailInput.addEventListener('blur', () => this.validateEmail());
                passwordInput.addEventListener('blur', () => this.validatePassword());

                // Real-time validation
                emailInput.addEventListener('input', () => {
                    if (emailInput.classList.contains('error')) {
                        this.validateEmail();
                    }
                });

                passwordInput.addEventListener('input', () => {
                    if (passwordInput.classList.contains('error')) {
                        this.validatePassword();
                    }
                });

                // Password toggle
                passwordToggle.addEventListener('click', () => this.togglePassword());

                // Social login buttons
                document.querySelectorAll('.social-button').forEach(button => {
                    button.addEventListener('click', (e) => this.handleSocialLogin(e));
                });

                // Signup link
                signupLink.addEventListener('click', (e) => this.handleSignupClick(e));

                // Input focus animations
                document.querySelectorAll('.form-input').forEach(input => {
                    input.addEventListener('focus', () => this.animateInputFocus(input));
                    input.addEventListener('blur', () => this.animateInputBlur(input));
                });

                // Keyboard shortcuts
                document.addEventListener('keydown', (e) => this.handleKeyboardShortcuts(e));
            }

            async handleLogin(e) {
                e.preventDefault();

                if (this.isLoading) return;

                // Validate inputs
                const emailValid = this.validateEmail();
                const passwordValid = this.validatePassword();

                if (!emailValid || !passwordValid) {
                    this.shakeCard();
                    return;
                }

                this.setLoadingState(true);

                try {
                    // Simulate API call
                    await this.simulateLogin();

                    // Save credentials if remember me is checked
                    if (rememberMe.checked) {
                        this.saveCredentials();
                    }

                    this.showSuccess();

                } catch (error) {
                    this.showError('Invalid credentials. Please try again.');
                    this.shakeCard();
                } finally {
                    this.setLoadingState(false);
                }
            }

            async simulateLogin() {
                // Simulate network delay
                return new Promise((resolve, reject) => {
                    setTimeout(() => {
                        // Simulate login logic
                        const email = emailInput.value;
                        const password = passwordInput.value;

                        // Demo credentials for testing
                        if (email === 'demo@agriai.com' && password === 'password123') {
                            resolve();
                        } else if (email && password && email.includes('@')) {
                            // Accept any valid email format for demo
                            resolve();
                        } else {
                            reject(new Error('Invalid credentials'));
                        }
                    }, 2000);
                });
            }

            validateEmail() {
                const email = emailInput.value.trim();
                const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

                if (!email) {
                    this.showFieldError(emailInput, emailError, 'Email is required');
                    return false;
                }

                if (!emailRegex.test(email)) {
                    this.showFieldError(emailInput, emailError, 'Please enter a valid email address');
                    return false;
                }

                this.clearFieldError(emailInput, emailError);
                return true;
            }

            validatePassword() {
                const password = passwordInput.value;

                if (!password) {
                    this.showFieldError(passwordInput, passwordError, 'Password is required');
                    return false;
                }

                if (password.length < 6) {
                    this.showFieldError(passwordInput, passwordError, 'Password must be at least 6 characters');
                    return false;
                }

                this.clearFieldError(passwordInput, passwordError);
                return true;
            }

            showFieldError(input, errorElement, message) {
                input.classList.add('error');
                input.classList.remove('success');
                errorElement.textContent = message;
                errorElement.classList.add('show');
            }

            clearFieldError(input, errorElement) {
                input.classList.remove('error');
                input.classList.add('success');
                errorElement.textContent = '';
                errorElement.classList.remove('show');
            }

            togglePassword() {
                const type = passwordInput.type === 'password' ? 'text' : 'password';
                passwordInput.type = type;

                // Update icon
                const eyeIcon = passwordToggle.querySelector('svg');
                if (type === 'text') {
                    eyeIcon.innerHTML = `
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.878 9.878L3 3m6.878 6.878L21 21"/>
            `;
                } else {
                    eyeIcon.innerHTML = `
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
            `;
                }

                // Add animation
                passwordToggle.style.transform = 'scale(0.9)';
                setTimeout(() => {
                    passwordToggle.style.transform = 'scale(1)';
                }, 100);
            }

            setLoadingState(loading) {
                this.isLoading = loading;
                loginButton.classList.toggle('loading', loading);

                // Disable form inputs during loading
                const inputs = loginForm.querySelectorAll('input, button');
                inputs.forEach(input => {
                    input.disabled = loading;
                });
            }

            shakeCard() {
                const card = document.querySelector('.login-card');
                card.classList.add('shake');
                setTimeout(() => {
                    card.classList.remove('shake');
                }, 600);
            }

            showSuccess() {
                // Create success message
                const successDiv = document.createElement('div');
                successDiv.className = 'success-message';
                successDiv.innerHTML = `
            <div style="
                background: linear-gradient(135deg, var(--success), var(--primary-green));
                color: white;
                padding: 1rem 1.5rem;
                border-radius: var(--radius-lg);
                margin-top: 1rem;
                text-align: center;
                font-weight: 500;
                animation: slideDown 0.5s ease-out;
            ">
                <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="display: inline-block; margin-right: 8px;">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                </svg>
                Login successful! Redirecting to dashboard...
            </div>
        `;

                loginForm.appendChild(successDiv);

                // Simulate redirect
                setTimeout(() => {
                    alert('Demo: Login successful! In a real app, you would be redirected to the dashboard.');
                    successDiv.remove();
                }, 2000);
            }

            showError(message) {
                // Create error message
                const errorDiv = document.createElement('div');
                errorDiv.className = 'error-message-global';
                errorDiv.innerHTML = `
            <div style="
                background: rgba(239, 68, 68, 0.1);
                border: 1px solid var(--error);
                color: var(--error);
                padding: 1rem 1.5rem;
                border-radius: var(--radius-lg);
                margin-top: 1rem;
                text-align: center;
                font-weight: 500;
                animation: slideDown 0.5s ease-out;
            ">
                <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="display: inline-block; margin-right: 8px;">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
                ${message}
            </div>
        `;

                loginForm.appendChild(errorDiv);

                // Remove after 5 seconds
                setTimeout(() => {
                    errorDiv.remove();
                }, 5000);
            }

            handleSocialLogin(e) {
                e.preventDefault();
                const provider = e.currentTarget.classList.contains('google') ? 'Google' : 'GitHub';

                // Add loading animation
                e.currentTarget.style.transform = 'scale(0.95)';
                setTimeout(() => {
                    e.currentTarget.style.transform = 'scale(1)';
                    alert(`Demo: ${provider} login would be handled here`);
                }, 150);
            }

            handleSignupClick(e) {
                e.preventDefault();
                alert('Demo: Signup page would be loaded here');
            }

            animateInputFocus(input) {
                const wrapper = input.parentElement;
                wrapper.style.transform = 'translateY(-1px)';
            }

            animateInputBlur(input) {
                const wrapper = input.parentElement;
                wrapper.style.transform = 'translateY(0)';
            }

            handleKeyboardShortcuts(e) {
                // Enter key to submit form
                if (e.key === 'Enter' && !e.shiftKey) {
                    if (document.activeElement.tagName !== 'BUTTON') {
                        e.preventDefault();
                        loginForm.dispatchEvent(new Event('submit'));
                    }
                }

                // Escape key to clear form
                if (e.key === 'Escape') {
                    this.clearForm();
                }
            }

            clearForm() {
                emailInput.value = '';
                passwordInput.value = '';
                rememberMe.checked = false;
                this.clearFieldError(emailInput, emailError);
                this.clearFieldError(passwordInput, passwordError);

                // Clear any global messages
                document.querySelectorAll('.success-message, .error-message-global').forEach(el => el.remove());
            }

            saveCredentials() {
                localStorage.setItem('rememberedEmail', emailInput.value);
            }

            loadRememberedCredentials() {
                const rememberedEmail = localStorage.getItem('rememberedEmail');
                if (rememberedEmail) {
                    emailInput.value = rememberedEmail;
                    rememberMe.checked = true;
                }
            }

            startBackgroundAnimations() {
                // Add random movement to floating shapes
                const shapes = document.querySelectorAll('.floating-shape');
                shapes.forEach((shape, index) => {
                    setInterval(() => {
                        const randomX = Math.random() * 20 - 10;
                        const randomY = Math.random() * 20 - 10;
                        shape.style.transform = `translate(${randomX}px, ${randomY}px)`;
                    }, 3000 + index * 1000);
                });

                // Add shimmer effect to card periodically
                setInterval(() => {
                    const card = document.querySelector('.login-card');
                    card.style.animation = 'none';
                    setTimeout(() => {
                        card.style.animation = '';
                    }, 10);
                }, 10000);
            }
        }

        // Initialize the application
        document.addEventListener('DOMContentLoaded', () => {
            new LoginPageController();
        });

        // Add some CSS animations dynamically
        const style = document.createElement('style');
        style.textContent = `
    @keyframes slideDown {
        from {
            opacity: 0;
            transform: translateY(-10px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    
    .form-input {
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }
    
    .input-wrapper {
        transition: transform 0.2s ease;
    }
`;
        document.head.appendChild(style);
    </script>
</body>

</html>
