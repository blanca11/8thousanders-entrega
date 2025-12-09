@extends('layouts.appSite')
@section('title', 'Prepara tu festival')
@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Radar</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background: #F8F6EA;
            font-family: 'Arial', sans-serif;
            color: white;
            overflow-x: hidden;
        }

        .pin-height {
            height: 400vh;
            position: relative;
        }

        .container {
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
        }

        .circles {
            position: relative;
            width: 100%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .circle {
            position: absolute;
            width: 400px;
            height: 400px;
            transform-origin: center;
        }

        .card {
            position: absolute;
            width: 280px;
            height: 400px;
            border-radius: 20px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            padding: 30px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.5);
            cursor: pointer;
            transition: transform 0.3s ease;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
        }

        .card:hover {
            transform: translate(-50%, -50%) scale(1.05);
        }

        .card-header {
            font-size: 12px;
            text-transform: uppercase;
            letter-spacing: 1px;
            opacity: 0.9;
        }

        .card-title {
            font-size: 48px;
            font-weight: bold;
            line-height: 1;
            margin-top: 20px;
        }

        .card-footer {
            font-size: 11px;
            opacity: 0.8;
            line-height: 1.4;
        }

        .card-1 {
            background: linear-gradient(135deg, #ff6b6b, #ee5a52);
            color: #1a0000;
        }

        .card-2 {
            background: linear-gradient(135deg, #ffa726, #ff8800);
            color: #1a0800;
        }

        .card-3 {
            background: linear-gradient(135deg, #f4e04d, #d4c03d);
            color: #1a1800;
        }

        .card-4 {
            background: linear-gradient(135deg, #66d9a3, #4ec48f);
            color: #001a0f;
        }

        .card-5 {
            background: linear-gradient(135deg, #d4ff5e, #bfed50);
            color: #1a1f00;
        }

        .card-6 {
            background: linear-gradient(135deg, #81d4fa, #4fc3f7);
            color: #001a20;
        }

        @media (max-width: 768px) {
            .card {
                width: 200px;
                height: 300px;
                padding: 20px;
            }

            .card-title {
                font-size: 32px;
            }

            .circle {
                width: 300px;
                height: 300px;
            }
        }
    </style>
</head>
<body>
    <div class="pin-height">
        <div class="container">
            <div class="circles">
                <div class="circle circle-1">
                    <div class="card card-1">
                        <div>
                            <div class="card-header">Collection Kevin</div>
                            <div class="card-title">KEVIN</div>
                        </div>
                        <div class="card-footer">
                            YOUR TOP COLLECTION<br>2024
                        </div>
                    </div>
                </div>
                
                <div class="circle circle-2">
                    <div class="card card-2">
                        <div>
                            <div class="card-header">Collection Devonte</div>
                            <div class="card-title">BON IVER</div>
                        </div>
                        <div class="card-footer">
                            FOR EMMA, FOREVER AGO<br>22, A MILLION
                        </div>
                    </div>
                </div>

                <div class="circle circle-3">
                    <div class="card card-3">
                        <div>
                            <div class="card-header">Collection Julian</div>
                            <div class="card-title">THE STROKES</div>
                        </div>
                        <div class="card-footer">
                            IS THIS IT<br>ROOM ON FIRE
                        </div>
                    </div>
                </div>

                <div class="circle circle-4">
                    <div class="card card-4">
                        <div>
                            <div class="card-header">Collection Stephen Lee</div>
                            <div class="card-title">TAME IMPALA</div>
                        </div>
                        <div class="card-footer">
                            CURRENTS<br>THE SLOW RUSH
                        </div>
                    </div>
                </div>

                <div class="circle circle-5">
                    <div class="card card-5">
                        <div>
                            <div class="card-header">Collection Emmanuelle</div>
                            <div class="card-title">INDIE MIX</div>
                        </div>
                        <div class="card-footer">
                            YOUR FAVORITE INDIE TRACKS<br>FROM 2024
                        </div>
                    </div>
                </div>

                <div class="circle circle-6">
                    <div class="card card-6">
                        <div>
                            <div class="card-header">Indie Rock Demarco</div>
                            <div class="card-title">MAC<br>DEMARCO</div>
                        </div>
                        <div class="card-footer">
                            SALAD DAYS • THIS OLD DOG<br>HERE COMES THE COWBOY<br>FIVE EASY HOT DOGS
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script>
        gsap.registerPlugin(ScrollTrigger);

        const cards = gsap.utils.toArray('.circle');
        const numCards = cards.length;

        // Set initial state - first card visible, others at bottom
        gsap.set(cards[0], {
            y: 0,
            rotation: 0,
            opacity: 1
        });
        
        gsap.set(cards.slice(1), {
            y: window.innerHeight,
            rotation: 0,
            opacity: 0
        });

        // Create timeline
        const tl = gsap.timeline({
            scrollTrigger: {
                trigger: '.pin-height',
                start: 'top top',
                end: 'bottom bottom',
                scrub: 1,
                pin: '.container',
            }
        });

        // Calculate fan angles
        const fanSpread = 60; // Total degrees to spread
        const startAngle = -fanSpread / 2;

        cards.forEach((card, i) => {
            const angle = startAngle + (i / (numCards - 1)) * fanSpread;
            
            // Each card enters progressively
            const startProgress = i * 0.12;

            // Card rises from bottom AND fans out simultaneously
            tl.to(card, {
                y: 0,
                opacity: 1,
                rotation: angle,
                duration: 0.15,
                ease: 'power2.out'
            }, startProgress);
        });

        // Add final hold time
        tl.to({}, { duration: 0.4 });
    </script>
</body>
</html>
@endsection