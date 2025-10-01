<div>
    {{-- Success is as dangerous as failure. --}}


    <div class="container">
        <div class="login-card">
            <div class="logo-section">
                <div class="logo">
                    <div class="logo-icon">
                        <svg width="40" height="40" viewBox="0 0 40 40" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M20 2L26.5 15H33.5L27.5 23H32.5L20 38L12.5 23H17.5L11.5 15H18.5L20 2Z"
                                fill="url(#logoGradient)" />
                            <defs>
                                <linearGradient id="logoGradient" x1="0%" y1="0%" x2="100%"
                                    y2="100%">
                                    <stop offset="0%" style="stop-color:#22C55E" />
                                    <stop offset="100%" style="stop-color:#10B981" />
                                </linearGradient>
                            </defs>
                        </svg>
                    </div>
                    <span class="logo-text">LettuceCare</span>
                </div>
                <h1 class="app-title">Lettuce Disease Classifier</h1>
                <p class="app-subtitle">Advanced AI-powered lettuce health analysis</p>
            </div>

            <form class="login-form" wire:submit.prevent='login' novalidate>
                <div class="form-group">
                    <label for="email" class="form-label">Email Address</label>
                    <div class="input-wrapper">
                        <input type="email" id="email" name="email" class="form-input"
                            placeholder="Enter your email" required wire:model='email'>
                        <div class="input-icon">
                            <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
                            </svg>
                        </div>
                    </div>
                    <div class="error-message" id="emailError"></div>
                </div>

                <div class="form-group">
                    <label for="password" class="form-label">Password</label>
                    <div class="input-wrapper">
                        <input type="password" id="password" name="password" class="form-input"
                            placeholder="Enter your password" required wire:model='password'>
                        <div class="input-icon">
                            <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                            </svg>
                        </div>
                        <button type="button" class="password-toggle" id="passwordToggle">
                            <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                        </button>
                    </div>
                    <div class="error-message" id="passwordError"></div>
                </div>



                <button type="submit" class="login-button">
                    <span class="button-text">Sign In</span>
                    <div class="button-loader" id="buttonLoader">
                        <div class="loader-spinner"></div>
                    </div>
                </button>




            </form>
        </div>
    </div>

</div>
