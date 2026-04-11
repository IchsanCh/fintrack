<x-layouts.app title="Email Verification">
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
            align-items: center;
            justify-content: center;
            padding: 40px 16px;
        }

        /* ── CARD ───────────────────────────────────────────────────────── */
        .ft-card {
            width: 100%;
            max-width: 440px;
            background: #0f0b1e;
            border: 1px solid rgba(139, 92, 246, 0.15);
            border-radius: 16px;
            padding: 44px 40px;
            position: relative;
            overflow: hidden;
        }

        @media (max-width: 480px) {
            .ft-card {
                padding: 32px 24px;
            }
        }

        .ft-card-glow {
            position: absolute;
            width: 260px;
            height: 260px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(139, 92, 246, 0.12) 0%, transparent 70%);
            bottom: -80px;
            right: -60px;
            pointer-events: none;
        }

        .ft-card-grid {
            position: absolute;
            inset: 0;
            background-image:
                linear-gradient(rgba(139, 92, 246, 0.04) 1px, transparent 1px),
                linear-gradient(90deg, rgba(139, 92, 246, 0.04) 1px, transparent 1px);
            background-size: 28px 28px;
            pointer-events: none;
        }

        /* ── LOGO ───────────────────────────────────────────────────────── */
        .ft-logo {
            display: flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 36px;
            position: relative;
            z-index: 1;
        }

        .ft-logo-icon {
            width: 32px;
            height: 32px;
            background: linear-gradient(135deg, #7c3aed, #a855f7);
            border-radius: 7px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .ft-logo-icon svg {
            width: 16px;
            height: 16px;
            color: #fff;
        }

        .ft-logo-name {
            font-family: 'Space Mono', monospace;
            font-size: 14px;
            font-weight: 700;
            color: #e8e4ff;
            letter-spacing: 0.06em;
        }

        /* ── HEADER ─────────────────────────────────────────────────────── */
        .ft-header {
            margin-bottom: 32px;
            position: relative;
            z-index: 1;
        }

        .ft-header-tag {
            font-size: 10px;
            letter-spacing: 0.16em;
            text-transform: uppercase;
            color: #7c3aed;
            font-family: 'Space Mono', monospace;
            margin-bottom: 10px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .ft-header-tag::before {
            content: '';
            display: inline-block;
            width: 16px;
            height: 1px;
            background: #7c3aed;
        }

        .ft-header h1 {
            font-size: 22px;
            font-weight: 600;
            color: #f0ecff;
            letter-spacing: -0.02em;
            margin: 0 0 8px;
        }

        .ft-header p {
            font-size: 13px;
            color: rgba(240, 236, 255, 0.38);
            line-height: 1.6;
            margin: 0;
        }

        .ft-header p strong {
            color: rgba(240, 236, 255, 0.65);
            font-weight: 500;
        }

        /* ── ALERTS ─────────────────────────────────────────────────────── */
        .ft-alert {
            display: flex;
            gap: 10px;
            align-items: flex-start;
            border-radius: 8px;
            padding: 12px 14px;
            font-size: 13px;
            margin-bottom: 20px;
            position: relative;
            z-index: 1;
        }

        .ft-alert svg {
            width: 16px;
            height: 16px;
            flex-shrink: 0;
            margin-top: 1px;
        }

        .ft-alert-success {
            background: rgba(52, 211, 153, 0.07);
            border: 1px solid rgba(52, 211, 153, 0.2);
            color: #6ee7b7;
        }

        .ft-alert-error {
            background: rgba(239, 68, 68, 0.07);
            border: 1px solid rgba(239, 68, 68, 0.22);
            color: #f87171;
        }

        /* ── OTP BOXES ──────────────────────────────────────────────────── */
        .ft-otp-wrap {
            display: flex;
            gap: 8px;
            justify-content: center;
            margin: 4px 0 24px;
            position: relative;
            z-index: 1;
        }

        .ft-otp-digit {
            width: 52px;
            height: 60px;
            background: rgba(255, 255, 255, 0.03);
            border: 1px solid rgba(139, 92, 246, 0.2);
            border-radius: 10px;
            text-align: center;
            font-family: 'Space Mono', monospace;
            font-size: 22px;
            font-weight: 700;
            color: #f0ecff;
            outline: none;
            transition: border-color 0.2s ease, background 0.2s ease, box-shadow 0.2s ease;
            caret-color: #a78bfa;
            -webkit-appearance: none;
        }

        .ft-otp-digit:focus {
            border-color: rgba(139, 92, 246, 0.7);
            background: rgba(139, 92, 246, 0.06);
            box-shadow: 0 0 0 3px rgba(139, 92, 246, 0.12);
        }

        .ft-otp-digit.otp-filled {
            border-color: rgba(139, 92, 246, 0.45);
        }

        .ft-otp-digit.otp-error {
            border-color: rgba(248, 113, 113, 0.55);
            background: rgba(239, 68, 68, 0.05);
        }

        @media (max-width: 400px) {
            .ft-otp-digit {
                width: 42px;
                height: 52px;
                font-size: 18px;
            }
        }

        /* ── BUTTONS ────────────────────────────────────────────────────── */
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
            z-index: 1;
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
            opacity: 0.4;
            cursor: not-allowed;
        }

        .ft-resend-btn {
            width: 100%;
            padding: 11px;
            background: transparent;
            border: 1px solid rgba(139, 92, 246, 0.18);
            border-radius: 8px;
            color: rgba(240, 236, 255, 0.4);
            font-size: 13px;
            font-family: 'DM Sans', sans-serif;
            cursor: pointer;
            transition: border-color 0.2s, color 0.2s, background 0.2s;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
            position: relative;
            z-index: 1;
        }

        .ft-resend-btn:not(:disabled):hover {
            border-color: rgba(139, 92, 246, 0.45);
            color: #a78bfa;
            background: rgba(139, 92, 246, 0.06);
        }

        .ft-resend-btn:disabled {
            cursor: not-allowed;
        }

        .ft-resend-btn svg {
            width: 14px;
            height: 14px;
        }

        /* ── DIVIDER ────────────────────────────────────────────────────── */
        .ft-divider {
            display: flex;
            align-items: center;
            gap: 12px;
            color: rgba(240, 236, 255, 0.18);
            font-size: 11px;
            font-family: 'Space Mono', monospace;
            margin: 20px 0;
            position: relative;
            z-index: 1;
        }

        .ft-divider::before,
        .ft-divider::after {
            content: '';
            flex: 1;
            height: 1px;
            background: rgba(139, 92, 246, 0.12);
        }

        /* ── LOADING ────────────────────────────────────────────────────── */
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

        /* ── COUNTDOWN ──────────────────────────────────────────────────── */
        .ft-countdown {
            font-family: 'Space Mono', monospace;
            color: #7c3aed;
        }
    </style>

    <div class="ft-root">
        <div class="ft-card">
            <div class="ft-card-grid"></div>
            <div class="ft-card-glow"></div>

            {{-- Logo --}}
            <div class="ft-logo">
                <div class="ft-logo-icon">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round">
                        <polyline points="22 7 13.5 15.5 8.5 10.5 2 17" />
                        <polyline points="16 7 22 7 22 13" />
                    </svg>
                </div>
                <span class="ft-logo-name">FINTRACK</span>
            </div>

            {{-- Header --}}
            <div class="ft-header">
                <div class="ft-header-tag">Verifikasi Akun</div>
                <h1>Cek email kamu</h1>
                <p>Masukkan kode 6 digit yang dikirim ke emailmu. Kode berlaku selama <strong>10 menit</strong>.</p>
            </div>

            {{-- Flash success --}}
            @if (session('success'))
                <div class="ft-alert ft-alert-success">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round">
                        <polyline points="20 6 9 17 4 12" />
                    </svg>
                    <span>{{ session('success') }}</span>
                </div>
            @endif

            {{-- OTP error --}}
            <div id="otp-error-box" class="ft-alert ft-alert-error {{ $errors->has('otp') ? '' : 'd-hidden' }}"
                style="{{ $errors->has('otp') ? '' : 'display:none' }}">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round">
                    <circle cx="12" cy="12" r="10" />
                    <line x1="12" y1="8" x2="12" y2="12" />
                    <line x1="12" y1="16" x2="12.01" y2="16" />
                </svg>
                <span id="otp-error-text">{{ $errors->first('otp') }}</span>
            </div>

            {{-- OTP Form --}}
            <form id="otp-form" method="POST" action="{{ route('verification.verify') }}" novalidate>
                @csrf
                <input type="hidden" name="otp" id="otp-hidden" />

                <div class="ft-otp-wrap" id="otp-boxes">
                    @for ($i = 0; $i < 6; $i++)
                        <input type="text" maxlength="1" inputmode="numeric" pattern="[0-9]" class="ft-otp-digit"
                            autocomplete="off" data-index="{{ $i }}" />
                    @endfor
                </div>

                <button type="submit" id="verify-btn" class="ft-submit-btn" disabled>
                    <span id="verify-text">Verifikasi Kode</span>
                    <span id="verify-loading" class="ft-loading">
                        <span class="ft-spinner"></span>
                        Memverifikasi...
                    </span>
                </button>
            </form>

            <div class="ft-divider">tidak menerima kode?</div>

            {{-- Resend --}}
            <form method="POST" action="{{ route('verification.resend') }}">
                @csrf
                <button type="submit" id="resend-btn" class="ft-resend-btn" disabled>
                    {{-- Heroicon: arrow-path --}}
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path
                            d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                    </svg>
                    Kirim ulang kode
                    <span>(<span class="ft-countdown" id="countdown">60</span>s)</span>
                </button>
            </form>
        </div>
    </div>

    <script>
        // ── OTP digit boxes ───────────────────────────────────────────────
        const digits = document.querySelectorAll('.ft-otp-digit')
        const hiddenOtp = document.getElementById('otp-hidden')
        const verifyBtn = document.getElementById('verify-btn')
        const errorBox = document.getElementById('otp-error-box')
        const errorText = document.getElementById('otp-error-text')

        function getOtp() {
            return [...digits].map(d => d.value).join('')
        }

        function updateState() {
            const otp = getOtp()
            hiddenOtp.value = otp
            verifyBtn.disabled = otp.length < 6
        }

        function clearOtpError() {
            errorBox.style.display = 'none'
            digits.forEach(d => d.classList.remove('otp-error'))
        }

        function showOtpError(msg) {
            errorText.textContent = msg
            errorBox.style.display = 'flex'
            digits.forEach(d => {
                d.classList.add('otp-error')
                d.classList.remove('otp-filled')
                d.value = ''
            })
            digits[0].focus()
            updateState()
        }

        digits.forEach((digit, i) => {
            digit.addEventListener('focus', () => {
                clearOtpError()
                digit.select()
            })

            digit.addEventListener('keydown', e => {
                if (e.key === 'Backspace') {
                    e.preventDefault()
                    if (digit.value) {
                        digit.value = ''
                        digit.classList.remove('otp-filled')
                    } else if (i > 0) {
                        digits[i - 1].value = ''
                        digits[i - 1].classList.remove('otp-filled')
                        digits[i - 1].focus()
                    }
                    updateState()
                }
                if (e.key === 'ArrowLeft' && i > 0) digits[i - 1].focus()
                if (e.key === 'ArrowRight' && i < 5) digits[i + 1].focus()
            })

            digit.addEventListener('input', e => {
                const val = e.target.value.replace(/\D/g, '')
                digit.value = val ? val[val.length - 1] : ''
                digit.classList.toggle('otp-filled', !!digit.value)

                if (digit.value && i < 5) digits[i + 1].focus()
                updateState()
            })

            // Paste support
            digit.addEventListener('paste', e => {
                e.preventDefault()
                const pasted = e.clipboardData.getData('text').replace(/\D/g, '').slice(0, 6)
                pasted.split('').forEach((char, j) => {
                    if (digits[j]) {
                        digits[j].value = char
                        digits[j].classList.add('otp-filled')
                    }
                })
                const next = Math.min(pasted.length, 5)
                digits[next].focus()
                updateState()
            })
        })

        // Auto-focus
        digits[0]?.focus()

        // ── Submit ────────────────────────────────────────────────────────
        document.getElementById('otp-form')?.addEventListener('submit', function(e) {
            if (getOtp().length < 6) {
                e.preventDefault()
                showOtpError('Masukkan 6 digit kode OTP.')
                return
            }
            document.getElementById('verify-text').style.display = 'none'
            document.getElementById('verify-loading').style.display = 'flex'
            verifyBtn.disabled = true
        })

        // ── Resend countdown ──────────────────────────────────────────────
        const resendBtn = document.getElementById('resend-btn')
        const countdownEl = document.getElementById('countdown')
        let seconds = 60

        const timer = setInterval(() => {
            seconds--
            countdownEl.textContent = seconds
            if (seconds <= 0) {
                clearInterval(timer)
                resendBtn.disabled = false
                resendBtn.innerHTML = `
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round" style="width:14px;height:14px">
                        <path d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
                    </svg>
                    Kirim ulang kode
                `
            }
        }, 1000)
    </script>
</x-layouts.app>
