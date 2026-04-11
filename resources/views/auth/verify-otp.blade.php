<x-layouts.app title="Email Verification">
    <div class="min-h-screen flex bg-base-100">

        {{-- ══════════════════════════════════════
         LEFT PANEL
    ══════════════════════════════════════ --}}
        <aside
            class="hidden lg:flex w-[44%] xl:w-[40%] shrink-0 flex-col justify-between
            border-r border-base-300 px-14 py-16
            bg-gradient-to-br from-primary/10 via-base-100 to-base-100
            relative overflow-hidden">
            <div class="absolute -top-20 -left-20 w-72 h-72 bg-primary/20 blur-3xl rounded-full"></div>
            <div class="absolute bottom-0 right-0 w-72 h-72 bg-secondary/20 blur-3xl rounded-full"></div>

            {{-- Brand --}}
            <div>
                <span class="font-mono font-bold text-sm tracking-widest text-base-content uppercase">
                    FinTrack
                </span>
            </div>

            {{-- Center content --}}
            <div>
                <p class="text-xs font-mono uppercase tracking-[0.2em] text-primary font-semibold mb-6">
                    Verifikasi Akun
                </p>
                <h2 class="text-4xl font-semibold leading-tight tracking-tight text-base-content mb-5">
                    Satu langkah<br>lagi untuk<br>memulai.
                </h2>
                <p class="text-sm text-base-content/70 leading-relaxed max-w-xs">
                    Kode 6 digit sudah dikirim ke emailmu.
                    Masukkan kode untuk mengaktifkan akunmu.
                </p>
            </div>

            <div class="flex items-center gap-3">
                <div class="w-6 h-px bg-base-300"></div>
                <p class="text-xs text-base-content/55 font-mono tracking-wide">&copy; {{ date('Y') }} All Right
                    Reserved</p>
            </div>
        </aside>

        {{-- ══════════════════════════════════════
         RIGHT PANEL
    ══════════════════════════════════════ --}}
        <main class="flex-1 flex items-center justify-center px-6 py-16">
            <div class="w-full max-w-[360px]">

                {{-- Mobile brand --}}
                <div class="lg:hidden mb-10">
                    <span class="font-mono font-bold text-sm tracking-widest text-base-content/50 uppercase">
                        FinTrack
                    </span>
                </div>

                {{-- Heading --}}
                <div class="mb-8">
                    <h1 class="text-2xl font-semibold tracking-tight text-base-content mb-1">
                        Masukkan kode verifikasi
                    </h1>
                    <p class="text-sm text-base-content/50">
                        Kami telah mengirimkan kode 6 digit ke email kamu. Kode ini berlaku selama 10 menit.
                    </p>
                </div>

                {{-- Flash success --}}
                @if (session('success'))
                    <div class="mb-5">
                        <x-ui.alert type="success">{{ session('success') }}</x-ui.alert>
                    </div>
                @endif

                {{-- OTP error --}}
                @if ($errors->has('otp'))
                    <div class="mb-5">
                        <x-ui.alert type="error">
                            {{ $errors->first('otp') }}
                        </x-ui.alert>
                    </div>
                @endif

                {{-- OTP Form --}}
                <form id="otp-form" method="POST" action="{{ route('verification.verify') }}" novalidate>
                    @csrf
                    <input type="hidden" name="otp" id="otp-hidden" />

                    {{-- Digit boxes --}}
                    <div class="flex gap-2 mb-8" id="otp-boxes">
                        @for ($i = 0; $i < 6; $i++)
                            <input type="text" maxlength="1" inputmode="numeric" pattern="[0-9]"
                                class="ft-otp-digit" autocomplete="off" data-index="{{ $i }}" />
                        @endfor
                    </div>

                    <button type="submit" id="verify-btn" disabled class="btn btn-primary w-full font-semibold">
                        <span id="verify-text">Verifikasi</span>
                        <span id="verify-loading" class="hidden text-primary items-center gap-2">
                            <span class="loading loading-spinner loading-xs"></span>
                            Memverifikasi...
                        </span>
                    </button>
                </form>

                {{-- Resend --}}
                <div class="mt-6 text-center">
                    <p class="text-xs text-base-content/60 mb-3">Tidak menerima kode?</p>
                    <form method="POST" action="{{ route('verification.resend') }}" class="inline">
                        @csrf
                        <button type="submit" id="resend-btn" disabled
                            class="text-sm text-primary font-semibold hover:text-primary disabled:cursor-not-allowed
                                   disabled:text-base-content/50 transition-colors">
                            Kirim ulang
                            <span id="countdown-wrap" class="font-mono text-xs text-base-content/50">
                                (<span id="countdown">60</span>s)
                            </span>
                        </button>
                    </form>
                </div>

                {{-- Back --}}
                <div class="mt-8 pt-8 border-t border-base-300">
                    <a href="{{ route('register') }}"
                        class="text-sm flex flex-row gap-1 items-center text-base-content/50 hover:text-base-content transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-4">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M9 15 3 9m0 0 6-6M3 9h12a6 6 0 0 1 0 12h-3" />
                        </svg>
                        Kembali ke halaman daftar
                    </a>
                </div>

            </div>
        </main>
    </div>

    <script>
        const digits = document.querySelectorAll('.ft-otp-digit')
        const hiddenOtp = document.getElementById('otp-hidden')
        const verifyBtn = document.getElementById('verify-btn')

        function getOtp() {
            return [...digits].map(d => d.value).join('')
        }

        function updateState() {
            hiddenOtp.value = getOtp();
            verifyBtn.disabled = getOtp().length < 6
        }

        digits.forEach((digit, i) => {
            digit.addEventListener('focus', () => {
                digit.select()
            })
            digit.addEventListener('keydown', e => {
                if (e.key === 'Backspace') {
                    e.preventDefault()
                    if (digit.value) {
                        digit.value = '';
                        digit.classList.remove('otp-filled')
                    } else if (i > 0) {
                        digits[i - 1].value = '';
                        digits[i - 1].classList.remove('otp-filled');
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
            digit.addEventListener('paste', e => {
                e.preventDefault()
                const pasted = e.clipboardData.getData('text').replace(/\D/g, '').slice(0, 6)
                pasted.split('').forEach((c, j) => {
                    if (digits[j]) {
                        digits[j].value = c;
                        digits[j].classList.add('otp-filled')
                    }
                })
                digits[Math.min(pasted.length, 5)].focus()
                updateState()
            })
        })
        digits[0]?.focus()

        document.getElementById('otp-form')?.addEventListener('submit', function(e) {
            if (getOtp().length < 6) {
                e.preventDefault();
                return
            }
            document.getElementById('verify-text').classList.add('hidden')
            const l = document.getElementById('verify-loading')
            l.classList.remove('hidden');
            l.classList.add('flex')
            verifyBtn.disabled = true
        })

        // Countdown
        const resendBtn = document.getElementById('resend-btn')
        const countdownEl = document.getElementById('countdown')
        const cWrap = document.getElementById('countdown-wrap')
        let secs = 60
        const timer = setInterval(() => {
            secs--
            countdownEl.textContent = secs
            if (secs <= 0) {
                clearInterval(timer);
                resendBtn.disabled = false;
                cWrap.classList.add('hidden')
            }
        }, 1000)
    </script>
</x-layouts.app>
