<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        @keyframes fadeUp {
            from {
                opacity: 0;
                transform: translateY(16px);
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
                transform: scale(.85);
            }
            50% {
                opacity: 1;
                transform: scale(1.12);
            }
        }

        .animate-fade {
            animation: fadeUp .7s ease-out;
        }

        .petal {
            position: absolute;
            top: -80px;
            animation: sakuraFall linear infinite;
            pointer-events: none;
            user-select: none;
        }

        .sparkle {
            position: absolute;
            animation: sparkle 2.5s ease-in-out infinite;
            pointer-events: none;
            user-select: none;
        }

        .auth-card {
            width: 100%;
            max-width: 420px;
            margin: 0 auto;
            border-radius: 30px;
            padding: 22px 24px;
            position: relative;
            background: linear-gradient(135deg, rgba(255,255,255,0.10), rgba(255,255,255,0.04));
            backdrop-filter: blur(18px);
            -webkit-backdrop-filter: blur(18px);
            border: 1px solid rgba(255,255,255,0.14);
            box-shadow: 0 18px 50px rgba(0,0,0,.35);
        }

        .auth-card::before {
            content: "";
            position: absolute;
            inset: 0;
            border-radius: 30px;
            padding: 1.2px;
            background: linear-gradient(
                135deg,
                rgba(255, 190, 240, 0.65),
                rgba(203, 132, 255, 0.45),
                rgba(255,255,255,0.12)
            );
            -webkit-mask:
                linear-gradient(#fff 0 0) content-box,
                linear-gradient(#fff 0 0);
            -webkit-mask-composite: xor;
            mask-composite: exclude;
            pointer-events: none;
        }

        .form-wrap {
            width: 100%;
            max-width: 280px;
            margin: 0 auto;
        }

        .page-shell {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 0 16px;
        }

        @media (max-width: 768px) {
            .auth-card {
                border-radius: 24px;
                padding: 22px 18px;
            }

            .auth-card::before {
                border-radius: 24px;
            }

            .form-wrap {
                max-width: 100%;
            }
        }
    </style>
</head>
<body class="min-h-screen overflow-y-auto bg-black text-white antialiased">
    <div class="page-shell relative">

        <div class="fixed inset-0 -z-30 bg-gradient-to-br from-[#2a0a4a] via-[#14051f] to-[#05010a]"></div>

        <div class="fixed inset-0 -z-20 overflow-hidden">
            <div class="absolute top-[-120px] left-[-80px] w-[320px] h-[320px] bg-pink-500/25 rounded-full blur-3xl"></div>
            <div class="absolute bottom-[-120px] right-[-80px] w-[320px] h-[320px] bg-blue-500/20 rounded-full blur-3xl"></div>
            <div class="absolute top-[20%] right-[20%] w-[220px] h-[220px] bg-purple-500/20 rounded-full blur-3xl"></div>
        </div>

        <div class="fixed inset-0 -z-10 overflow-hidden">
            <span class="sparkle text-white text-sm" style="top: 12%; left: 10%; animation-delay: 0s;">✦</span>
            <span class="sparkle text-white text-xs" style="top: 18%; left: 75%; animation-delay: 1s;">✦</span>
            <span class="sparkle text-white text-base" style="top: 30%; left: 22%; animation-delay: 2s;">✦</span>
            <span class="sparkle text-white text-sm" style="top: 60%; left: 82%; animation-delay: .5s;">✦</span>
            <span class="sparkle text-white text-xs" style="top: 75%; left: 15%; animation-delay: 1.5s;">✦</span>

            <span class="petal text-pink-200 text-xl" style="left: 8%; animation-duration: 14s; animation-delay: 0s;">✿</span>
            <span class="petal text-pink-300 text-2xl" style="left: 22%; animation-duration: 18s; animation-delay: 2s;">❀</span>
            <span class="petal text-pink-100 text-xl" style="left: 40%; animation-duration: 16s; animation-delay: 4s;">❁</span>
            <span class="petal text-purple-200 text-2xl" style="left: 58%; animation-duration: 15s; animation-delay: 1s;">✾</span>
            <span class="petal text-pink-200 text-xl" style="left: 75%; animation-duration: 19s; animation-delay: 3s;">🌸</span>
        </div>

        <div class="auth-card animate-fade">
            <div class="text-center mb-6 md:mb-7">
                <div class="w-16 h-16 md:w-20 md:h-20 mx-auto rounded-[24px] md:rounded-[28px] bg-gradient-to-br from-pink-500 to-purple-600 flex items-center justify-center text-2xl md:text-3xl shadow-lg">
                    ✦
                </div>

                <h1 class="mt-3 text-2xl md:text-3xl font-bold leading-tight">
                    Inventory System
                </h1>

                <p class="mt-2 text-sm md:text-sg text-white/70">
                    Manage your inventory with a beautiful dashboard
                </p>
            </div>

            <div class="form-wrap">
                {{ $slot }}
            </div>
        </div>
    </div>
</body>
</html>