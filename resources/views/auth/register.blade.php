<x-layouts.app title="Register">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Space+Mono:wght@400;700&family=DM+Sans:wght@300;400;500;600&display=swap');

        .ft-root,
        .ft-root * {
            box-sizing: border-box;
        }

        .ft-root {
            font-family: 'DM Sans', sans-serif;
            background: #0a0a0f;
            min-height: 100vh;
            display: flex;
        }

        /* ── LEFT PANEL ─────────────────────────────────────────────────── */
        .ft-left {
            width: 42%;
            background: linear-gradient(145deg, #0f0b1e 0%, #16102e 50%, #0d1a2e 100%);
            padding: 48px 40px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            position: relative;
            overflow: hidden;
            border-right: 1px solid rgba(139, 92, 246, 0.15);
        }

        @media (max-width: 768px) {
            .ft-left {
                display: none;
            }
        }

        .ft-grid-bg {
            position: absolute;
            inset: 0;
            background-image:
                linear-gradient(rgba(139, 92, 246, 0.06) 1px, transparent 1px),
                linear-gradient(90deg, rgba(139, 92, 246, 0.06) 1px, transparent 1px);
            background-size: 32px 32px;
            pointer-events: none;
        }

        .ft-glow-orb {
            position: absolute;
            width: 320px;
            height: 320px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(139, 92, 246, 0.18) 0%, transparent 70%);
            bottom: -100px;
            right: -100px;
            pointer-events: none;
        }

        .ft-glow-orb2 {
            position: absolute;
            width: 180px;
            height: 180px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(99, 179, 237, 0.08) 0%, transparent 70%);
            top: 40px;
            left: 20px;
            pointer-events: none;
        }

        .ft-logo {
            display: flex;
            align-items: center;
            gap: 10px;
            position: relative;
            z-index: 1;
        }

        .ft-logo-icon {
            width: 36px;
            height: 36px;
            background: linear-gradient(135deg, #7c3aed, #a855f7);
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .ft-logo-icon svg {
            width: 18px;
            height: 18px;
            color: #fff;
        }

        .ft-logo-name {
            font-family: 'Space Mono', monospace;
            font-size: 16px;
            font-weight: 700;
            color: #e8e4ff;
            letter-spacing: 0.06em;
        }

        .ft-hero {
            position: relative;
            z-index: 1;
        }

        .ft-hero-tag {
            font-size: 10px;
            letter-spacing: 0.18em;
            text-transform: uppercase;
            color: #7c3aed;
            font-family: 'Space Mono', monospace;
            margin-bottom: 16px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .ft-hero-tag::before {
            content: '';
            display: inline-block;
            width: 20px;
            height: 1px;
            background: #7c3aed;
        }

        .ft-hero h2 {
            font-size: 28px;
            font-weight: 300;
            line-height: 1.35;
            color: #e8e4ff;
            margin: 0 0 16px;
            letter-spacing: -0.02em;
        }

        .ft-hero h2 strong {
            font-weight: 600;
            color: #a78bfa;
        }

        .ft-hero p {
            font-size: 13px;
            color: rgba(232, 228, 255, 0.45);
            line-height: 1.7;
            margin: 0;
        }

        .ft-stats {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 12px;
            position: relative;
            z-index: 1;
        }

        .ft-stat {
            padding: 14px 16px;
            background: rgba(139, 92, 246, 0.07);
            border: 1px solid rgba(139, 92, 246, 0.15);
            border-radius: 8px;
        }

        .ft-stat-val {
            font-family: 'Space Mono', monospace;
            font-size: 20px;
            font-weight: 700;
            color: #a78bfa;
            line-height: 1;
        }

        .ft-stat-label {
            font-size: 11px;
            color: rgba(232, 228, 255, 0.4);
            margin-top: 4px;
        }

        /* ── RIGHT PANEL ────────────────────────────────────────────────── */
        .ft-right {
            flex: 1;
            background: #0a0a0f;
            padding: 48px 52px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        @media (max-width: 768px) {
            .ft-right {
                padding: 40px 24px;
            }
        }

        .ft-right-header {
            margin-bottom: 36px;
        }

        .ft-right-header h1 {
            font-size: 24px;
            font-weight: 600;
            color: #f0ecff;
            letter-spacing: -0.02em;
            margin: 0 0 6px;
        }

        .ft-right-header p {
            font-size: 13px;
            color: rgba(240, 236, 255, 0.38);
            margin: 0;
        }

        /* ── FORM ───────────────────────────────────────────────────────── */
        .ft-form {
            display: flex;
            flex-direction: column;
            gap: 20px;
            max-width: 400px;
        }

        .ft-field {
            display: flex;
            flex-direction: column;
            gap: 6px;
        }

        .ft-label {
            font-size: 11px;
            font-weight: 500;
            color: rgba(240, 236, 255, 0.45);
            letter-spacing: 0.1em;
            text-transform: uppercase;
            font-family: 'Space Mono', monospace;
        }

        .ft-input-wrap {
            position: relative;
        }

        .ft-input {
            width: 100%;
            background: rgba(255, 255, 255, 0.03);
            border: 1px solid rgba(139, 92, 246, 0.2);
            border-radius: 8px;
            padding: 12px 16px;
            font-size: 14px;
            color: #f0ecff;
            font-family: 'DM Sans', sans-serif;
            outline: none;
            transition: border-color 0.2s ease, background 0.2s ease, box-shadow 0.2s ease;
            -webkit-appearance: none;
        }

        .ft-input::placeholder {
            color: rgba(240, 236, 255, 0.18);
        }

        .ft-input:focus {
            border-color: rgba(139, 92, 246, 0.65);
            background: rgba(139, 92, 246, 0.05);
            box-shadow: 0 0 0 3px rgba(139, 92, 246, 0.1);
        }

        .ft-input.has-icon {
            padding-right: 44px;
        }

        .ft-input.input-error {
            border-color: rgba(248, 113, 113, 0.55);
        }

        .ft-input.input-success {
            border-color: rgba(52, 211, 153, 0.45);
        }

        .ft-toggle-btn {
            position: absolute;
            right: 13px;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            padding: 0;
            cursor: pointer;
            color: rgba(240, 236, 255, 0.28);
            display: flex;
            align-items: center;
            transition: color 0.15s;
        }

        .ft-toggle-btn:hover {
            color: rgba(240, 236, 255, 0.65);
        }

        .ft-toggle-btn svg {
            width: 16px;
            height: 16px;
        }

        /* Strength indicator */
        .ft-strength-bars {
            display: flex;
            gap: 4px;
            margin-top: 8px;
        }

        .ft-bar {
            height: 2px;
            flex: 1;
            border-radius: 2px;
            background: rgba(255, 255, 255, 0.08);
            transition: background 0.3s ease;
        }

        .ft-bar.strength-weak {
            background: #ef4444;
        }

        .ft-bar.strength-fair {
            background: #f59e0b;
        }

        .ft-bar.strength-good {
            background: #10b981;
        }

        .ft-bar.strength-strong {
            background: #a78bfa;
        }

        .ft-strength-label {
            font-family: 'Space Mono', monospace;
            font-size: 11px;
            color: rgba(240, 236, 255, 0.32);
            margin-top: 5px;
            min-height: 16px;
        }

        /* Error text */
        .ft-error-text {
            font-size: 12px;
            color: #f87171;
            display: none;
            margin-top: 2px;
        }

        .ft-error-text.visible {
            display: block;
        }

        /* Server error alert */
        .ft-alert-error {
            background: rgba(239, 68, 68, 0.08);
            border: 1px solid rgba(239, 68, 68, 0.25);
            border-radius: 8px;
            padding: 12px 16px;
            display: flex;
            gap: 10px;
            align-items: center;
        }

        .ft-alert-error svg {
            width: 16px;
            height: 16px;
            color: #f87171;
            flex-shrink: 0;
            margin-top: 2px;
        }

        .ft-alert-error ul {
            list-style: disc;
            padding-left: 14px;
            font-size: 13px;
            color: #f87171;
            margin: 0;
        }

        /* Submit button */
        .ft-submit-btn {
            width: 100%;
            padding: 13px;
            background: linear-gradient(135deg, #7c3aed 0%, #9333ea 100%);
            border: none;
            border-radius: 8px;
            color: #fff;
            font-size: 14px;
            font-weight: 600;
            font-family: 'DM Sans', sans-serif;
            cursor: pointer;
            position: relative;
            overflow: hidden;
            transition: opacity 0.2s ease, transform 0.1s ease;
            letter-spacing: 0.01em;
            margin-top: 4px;
        }

        .ft-submit-btn::before {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.1) 0%, transparent 55%);
            pointer-events: none;
        }

        .ft-submit-btn:hover:not(:disabled) {
            opacity: 0.88;
        }

        .ft-submit-btn:active:not(:disabled) {
            transform: scale(0.99);
        }

        .ft-submit-btn:disabled {
            opacity: 0.45;
            cursor: not-allowed;
        }

        .ft-loading {
            display: none;
            gap: 6px;
            align-items: center;
            justify-content: center;
        }

        .ft-spinner {
            width: 14px;
            height: 14px;
            border: 2px solid rgba(255, 255, 255, 0.3);
            border-top-color: #fff;
            border-radius: 50%;
            animation: ft-spin 0.7s linear infinite;
        }

        @keyframes ft-spin {
            to {
                transform: rotate(360deg);
            }
        }

        .ft-footer-link {
            text-align: center;
            font-size: 13px;
            color: rgba(240, 236, 255, 0.32);
            margin-top: 24px;
        }

        .ft-footer-link a {
            color: #a78bfa;
            text-decoration: none;
        }

        .ft-footer-link a:hover {
            color: #c4b5fd;
        }
    </style>

    <div class="ft-root">

        {{-- LEFT PANEL --}}
        <div class="ft-left">
            <div class="ft-grid-bg"></div>
            <div class="ft-glow-orb"></div>
            <div class="ft-glow-orb2"></div>

            <div class="ft-logo">
                <div class="ft-logo-icon">
                    {{-- Heroicon: trending-up --}}
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round">
                        <polyline points="22 7 13.5 15.5 8.5 10.5 2 17" />
                        <polyline points="16 7 22 7 22 13" />
                    </svg>
                </div>
                <span class="ft-logo-name">FINTRACK</span>
            </div>

            <div class="ft-hero">
                <div class="ft-hero-tag">Financial OS</div>
                <h2>Kontrol penuh atas <strong>keuangan kamu</strong></h2>
                <p>Lacak pemasukan, pengeluaran, dan investasi dalam satu dashboard yang intuitif dan real-time.</p>
            </div>

            <div class="ft-stats">
                <div class="ft-stat">
                    <div class="ft-stat-val">12k+</div>
                    <div class="ft-stat-label">Pengguna aktif</div>
                </div>
                <div class="ft-stat">
                    <div class="ft-stat-val">99.9%</div>
                    <div class="ft-stat-label">Uptime</div>
                </div>
                <div class="ft-stat">
                    <div class="ft-stat-val">Rp 0</div>
                    <div class="ft-stat-label">Gratis selamanya</div>
                </div>
                <div class="ft-stat">
                    <div class="ft-stat-val">AES-256</div>
                    <div class="ft-stat-label">Enkripsi data</div>
                </div>
            </div>
        </div>

        {{-- RIGHT PANEL --}}
        <div class="ft-right">
            <div class="ft-right-header">
                <h1>Buat akun</h1>
                <p>Mulai kelola keuanganmu hari ini — gratis.</p>
            </div>

            {{-- Server-side errors --}}
            @if ($errors->any())
                <div class="ft-alert-error" style="margin-bottom: 20px; max-width: 400px;">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="12" r="10" />
                        <line x1="12" y1="8" x2="12" y2="12" />
                        <line x1="12" y1="16" x2="12.01" y2="16" />
                    </svg>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form id="register-form" method="POST" action="{{ route('register') }}" novalidate class="ft-form">
                @csrf

                {{-- Nama --}}
                <div class="ft-field">
                    <label class="ft-label" for="name">Nama Lengkap</label>
                    <div class="ft-input-wrap">
                        <input id="name" type="text" name="name" value="{{ old('name') }}"
                            placeholder="Budi Santoso" class="ft-input @error('name') input-error @enderror"
                            autocomplete="name" required autofocus />
                    </div>
                    <span class="ft-error-text @error('name') visible @enderror" id="name-error">
                        @error('name')
                            {{ $message }}
                        @else
                            Nama wajib diisi.
                        @enderror
                    </span>
                </div>

                {{-- Email --}}
                <div class="ft-field">
                    <label class="ft-label" for="email">Alamat Email</label>
                    <div class="ft-input-wrap">
                        <input id="email" type="email" name="email" value="{{ old('email') }}"
                            placeholder="kamu@email.com" class="ft-input @error('email') input-error @enderror"
                            autocomplete="email" required />
                    </div>
                    <span class="ft-error-text @error('email') visible @enderror" id="email-error">
                        @error('email')
                            {{ $message }}
                        @else
                            Format email tidak valid.
                        @enderror
                    </span>
                </div>

                {{-- Password --}}
                <div class="ft-field">
                    <label class="ft-label" for="password">Password</label>
                    <div class="ft-input-wrap">
                        <input id="password" type="password" name="password" placeholder="Minimal 8 karakter"
                            class="ft-input has-icon @error('password') input-error @enderror"
                            autocomplete="new-password" required />
                        <button type="button" class="ft-toggle-btn" id="toggle-password"
                            aria-label="Tampilkan password">
                            {{-- eye-open --}}
                            <svg id="pw-eye-open" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z" />
                                <circle cx="12" cy="12" r="3" />
                            </svg>
                            {{-- eye-off --}}
                            <svg id="pw-eye-closed" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                style="display:none">
                                <path
                                    d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94" />
                                <path d="M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19" />
                                <line x1="1" y1="1" x2="23" y2="23" />
                            </svg>
                        </button>
                    </div>
                    <div class="ft-strength-bars">
                        <div class="ft-bar" id="bar-1"></div>
                        <div class="ft-bar" id="bar-2"></div>
                        <div class="ft-bar" id="bar-3"></div>
                        <div class="ft-bar" id="bar-4"></div>
                    </div>
                    <span class="ft-strength-label" id="strength-label"></span>
                    <span class="ft-error-text @error('password') visible @enderror" id="password-error">
                        @error('password')
                            {{ $message }}
                        @else
                            Password minimal 8 karakter.
                        @enderror
                    </span>
                </div>

                {{-- Konfirmasi Password --}}
                <div class="ft-field">
                    <label class="ft-label" for="password_confirmation">Konfirmasi Password</label>
                    <div class="ft-input-wrap">
                        <input id="password_confirmation" type="password" name="password_confirmation"
                            placeholder="Ulangi password" class="ft-input has-icon" autocomplete="new-password"
                            required />
                        <button type="button" class="ft-toggle-btn" id="toggle-confirm"
                            aria-label="Tampilkan konfirmasi password">
                            <svg id="cf-eye-open" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z" />
                                <circle cx="12" cy="12" r="3" />
                            </svg>
                            <svg id="cf-eye-closed" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                style="display:none">
                                <path
                                    d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94" />
                                <path d="M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19" />
                                <line x1="1" y1="1" x2="23" y2="23" />
                            </svg>
                        </button>
                    </div>
                    <span class="ft-error-text" id="confirm-error">Password tidak sama.</span>
                </div>

                {{-- Submit --}}
                <button type="submit" id="submit-btn" class="ft-submit-btn">
                    <span id="btn-text">Daftar Sekarang</span>
                    <span id="btn-loading" class="ft-loading">
                        <span class="ft-spinner"></span>
                        Memproses...
                    </span>
                </button>
            </form>

            <p class="ft-footer-link">
                Sudah punya akun? <a href="#">Masuk</a>
            </p>
        </div>
    </div>

    <script>
        // ── Helpers ──────────────────────────────────────────────────────
        const $ = id => document.getElementById(id)

        function showError(errId, inputId) {
            $(errId)?.classList.add('visible')
            $(inputId)?.classList.add('input-error')
            $(inputId)?.classList.remove('input-success')
        }

        function clearError(errId, inputId) {
            $(errId)?.classList.remove('visible')
            $(inputId)?.classList.remove('input-error')
        }

        // ── Toggle password visibility ────────────────────────────────────
        function setupToggle(btnId, inputId, openId, closedId) {
            $(btnId)?.addEventListener('click', () => {
                const input = $(inputId)
                const isPassword = input.type === 'password'
                input.type = isPassword ? 'text' : 'password'
                $(openId).style.display = isPassword ? 'none' : ''
                $(closedId).style.display = isPassword ? '' : 'none'
            })
        }

        setupToggle('toggle-password', 'password', 'pw-eye-open', 'pw-eye-closed')
        setupToggle('toggle-confirm', 'password_confirmation', 'cf-eye-open', 'cf-eye-closed')

        // ── Password strength ─────────────────────────────────────────────
        const STRENGTH_LABELS = ['', 'Lemah', 'Cukup', 'Kuat', 'Sangat kuat']
        const STRENGTH_CLASS = ['', 'strength-weak', 'strength-fair', 'strength-good', 'strength-strong']

        function getStrength(val) {
            let score = 0
            if (val.length >= 8) score++
            if (/[A-Z]/.test(val)) score++
            if (/[0-9]/.test(val)) score++
            if (/[^A-Za-z0-9]/.test(val)) score++
            return score
        }

        $('password')?.addEventListener('input', function() {
            const score = getStrength(this.value)

            for (let i = 1; i <= 4; i++) {
                const bar = $(`bar-${i}`)
                bar.className = 'ft-bar' + (i <= score ? ' ' + STRENGTH_CLASS[score] : '')
            }

            $('strength-label').textContent = this.value.length ? STRENGTH_LABELS[score] : ''

            if ($('password_confirmation').value) checkConfirm()
        })

        // ── Confirm match ─────────────────────────────────────────────────
        function checkConfirm() {
            const pw = $('password').value
            const cf = $('password_confirmation').value
            if (cf && pw !== cf) {
                showError('confirm-error', 'password_confirmation')
            } else {
                clearError('confirm-error', 'password_confirmation')
                if (cf) $('password_confirmation').classList.add('input-success')
            }
        }

        $('password_confirmation')?.addEventListener('input', checkConfirm)

        // ── Real-time email check ─────────────────────────────────────────
        $('email')?.addEventListener('blur', function() {
            if (this.value && !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(this.value)) {
                showError('email-error', 'email')
            } else {
                clearError('email-error', 'email')
            }
        })

        // ── Clear on focus ────────────────────────────────────────────────
        ['name', 'email', 'password'].forEach(field => {
            $(field)?.addEventListener('focus', () => clearError(`${field}-error`, field))
        })

        // ── Submit validation ─────────────────────────────────────────────
        $('register-form')?.addEventListener('submit', function(e) {
            let valid = true

            if (!$('name').value.trim()) {
                showError('name-error', 'name')
                valid = false
            }

            const emailVal = $('email').value
            if (!emailVal || !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(emailVal)) {
                showError('email-error', 'email')
                valid = false
            }

            if ($('password').value.length < 8) {
                showError('password-error', 'password')
                valid = false
            }

            if ($('password').value !== $('password_confirmation').value) {
                showError('confirm-error', 'password_confirmation')
                valid = false
            }

            if (!valid) {
                e.preventDefault()
                return
            }

            // Loading state
            $('btn-text').style.display = 'none'
            $('btn-loading').style.display = 'flex'
            $('submit-btn').disabled = true
        })
    </script>
</x-layouts.app>
