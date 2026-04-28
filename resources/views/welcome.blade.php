<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Inventory System</title>

    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        @keyframes fadeUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes sakuraFall {
            0% {
                transform: translateY(-120px) rotate(0deg);
                opacity: 0;
            }
            10% {
                opacity: 1;
            }
            100% {
                transform: translateY(110vh) rotate(360deg);
                opacity: 0;
            }
        }

        @keyframes sparkle {
            0%, 100% {
                opacity: .3;
                transform: scale(.8);
            }
            50% {
                opacity: 1;
                transform: scale(1.2);
            }
        }

        @keyframes floatIcon {
            0%, 100% {
                transform: translateY(0);
            }
            50% {
                transform: translateY(-8px);
            }
        }

        .animate-fade {
            animation: fadeUp .8s ease-out;
        }

        .float-icon {
            animation: floatIcon 4s ease-in-out infinite;
        }

        .petal {
            position: absolute;
            top: -80px;
            animation-name: sakuraFall;
            animation-timing-function: linear;
            animation-iteration-count: infinite;
            pointer-events: none;
            user-select: none;
        }

        .sparkle {
            position: absolute;
            animation: sparkle 2.5s ease-in-out infinite;
            pointer-events: none;
            user-select: none;
        }

        .glass {
            background: rgba(255, 255, 255, 0.10);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
        }
    </style>
</head>

<body x-data="galaxyLogin()" x-init="init()" class="min-h-screen flex items-center justify-center px-4 overflow-hidden relative">

    <!-- Galaxy Background -->
    <div class="fixed inset-0 -z-30 bg-gradient-to-br from-[#2a0a4a] via-[#14051f] to-[#05010a]"></div>

    <!-- Glow -->
    <div class="fixed inset-0 -z-20 overflow-hidden">
        <div class="absolute top-[-120px] left-[-80px] w-[320px] h-[320px] bg-pink-500/25 rounded-full blur-3xl"></div>
        <div class="absolute bottom-[-120px] right-[-80px] w-[320px] h-[320px] bg-blue-500/20 rounded-full blur-3xl"></div>
        <div class="absolute top-[20%] right-[20%] w-[220px] h-[220px] bg-purple-500/20 rounded-full blur-3xl"></div>
    </div>

    <!-- Sparkles -->
    <template x-for="star in stars" :key="star.id">
        <div
            class="sparkle text-white -z-10"
            :style="`
                left:${star.x}%;
                top:${star.y}%;
                font-size:${star.size}px;
                animation-delay:${star.delay}s;
                animation-duration:${star.duration}s;
            `"
        >
            ✦
        </div>
    </template>

    <!-- Falling Flowers -->
    <template x-for="petal in petals" :key="petal.id">
        <div
            class="petal -z-10"
            :style="`
                left:${petal.left}%;
                animation-duration:${petal.duration}s;
                animation-delay:${petal.delay}s;
                font-size:${petal.size}px;
                color:${petal.color};
            `"
            x-text="petal.char"
        ></div>
    </template>

    <!-- Login Card -->
    <div class="w-full max-w-md animate-fade relative z-10">
        <div class="glass border border-white/20 rounded-3xl shadow-2xl p-8 text-white">
            <div class="text-center mb-6">
                <div class="w-16 h-16 mx-auto rounded-2xl bg-gradient-to-br from-pink-500 to-purple-600 flex items-center justify-center shadow-lg float-icon">
                    ✦
                </div>

                <h1 class="mt-5 text-3xl font-bold">
                    Inventory System
                </h1>

                <p class="mt-2 text-sm text-white/70">
                    Sign in to access your dashboard
                </p>
            </div>

            <div class="space-y-4">
                @auth
                    <a href="{{ url('/dashboard') }}"
                       class="block w-full text-center bg-gradient-to-r from-pink-500 to-purple-600 py-3 rounded-2xl font-semibold shadow-lg hover:scale-[1.03] transition">
                        Go to Dashboard
                    </a>
                @else
                    <a href="{{ route('login') }}"
                       class="block w-full text-center bg-gradient-to-r from-pink-500 to-purple-600 py-3 rounded-2xl font-semibold shadow-lg hover:scale-[1.03] transition">
                        Sign In
                    </a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                           class="block w-full text-center border border-white/30 py-3 rounded-2xl font-semibold hover:bg-white/10 transition">
                            Create Account
                        </a>
                    @endif
                @endauth
            </div>

            <p class="text-center text-xs text-white/50 mt-6">
                ✿ Galaxy Bloom ✿
            </p>
        </div>
    </div>

    <script>
        function galaxyLogin() {
            return {
                petals: [],
                stars: [],

                init() {
                    const flowerChars = ['✿', '❀', '❁', '✾', '🌸'];
                    const flowerColors = [
                        'rgba(255,192,203,.92)',
                        'rgba(244,180,255,.90)',
                        'rgba(255,220,240,.88)',
                        'rgba(210,170,255,.88)'
                    ];

                    for (let i = 0; i < 12; i++) {
                        this.petals.push({
                            id: i,
                            left: Math.random() * 100,
                            duration: 12 + Math.random() * 8,
                            delay: Math.random() * 10,
                            size: 18 + Math.random() * 10,
                            char: flowerChars[Math.floor(Math.random() * flowerChars.length)],
                            color: flowerColors[Math.floor(Math.random() * flowerColors.length)],
                        });
                    }

                    for (let i = 0; i < 20; i++) {
                        this.stars.push({
                            id: i,
                            x: Math.random() * 100,
                            y: Math.random() * 100,
                            size: 10 + Math.random() * 8,
                            delay: Math.random() * 3,
                            duration: 2 + Math.random() * 2,
                        });
                    }
                }
            }
        }
    </script>

</body>
</html>