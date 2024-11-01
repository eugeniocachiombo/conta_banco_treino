<div class="cartao">
    <style>
        .cartao {
            width: 400px;
            height: 200px;
            background: linear-gradient(135deg, #0f2b47, #165ca1);
            color: white;
            border-radius: 15px;
            padding: 20px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3);
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            align-items: center;
            margin: auto;
            font-family: 'Arial', sans-serif;
            position: relative;
        }

        .banco {
            text-align: center;
            margin-bottom: 10px;
        }

        .banco h2 {
            font-size: 1.5em;
            margin: 0;
            letter-spacing: 1px;
        }

        .numero-cartao {
            font-size: 1.8em;
            text-align: center;
            letter-spacing: 3px;
            margin: 10px 0;
        }

        .validade {
            font-size: 0.9em;
            position: absolute;
            bottom: 20px;
            right: 20px;
            background: rgba(255, 255, 255, 0.1);
            padding: 5px 10px;
            border-radius: 5px;
        }

        .chip {
            width: 50px;
            height: 30px;
            background: #FFD700;
            /* Amarelo */
            border-radius: 5px;
            position: absolute;
            top: 20px;
            left: 20px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.5);
            border: 1px solid #B0B0B0;
        }

        .chip::before,
        .chip::after {
            content: '';
            position: absolute;
            background: #B0B0B0;
        }

        .chip::before {
            width: 5px;
            height: 30%;
            left: 3px;
            top: 35%;
        }

        .chip::after {
            width: 5px;
            height: 30%;
            right: 3px;
            top: 35%;
        }
    </style>

    <div class="chip"></div>
    <div class="banco">
        <h2>System Bank</h2>
    </div>
    <div class="numero-cartao mb-4">
        <h3>**** **** **** ****</h3>
    </div>
    <div class="validade mt-5">
        <span>Validade: **/**</span>
    </div>
</div>
