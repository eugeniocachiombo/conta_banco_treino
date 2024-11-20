<?php

return [
    /*
    |--------------------------------------------------------------------------
    | PDF Driver
    |--------------------------------------------------------------------------
    |
    | O driver que o DomPDF usará para renderizar os PDFs. Atualmente, o DomPDF
    | e o Pdf de HTML são as opções disponíveis.
    |
    */

    'enabled' => true,

    /*
    |--------------------------------------------------------------------------
    | Orientação do Papel
    |--------------------------------------------------------------------------
    |
    | Define a orientação do papel, pode ser 'portrait' ou 'landscape'.
    |
    */

    'orientation' => 'portrait',

    /*
    |--------------------------------------------------------------------------
    | Tamanho do Papel
    |--------------------------------------------------------------------------
    |
    | Tamanho do papel que será usado para o PDF. Os tamanhos padrões são 'A4',
    | 'A3', 'A5', 'letter', 'legal'.
    |
    */

    'paper_size' => 'A4',

    /*
    |--------------------------------------------------------------------------
    | Configurações de Fontes
    |--------------------------------------------------------------------------
    |
    | Aqui você pode configurar a fonte padrão e o tamanho de fonte.
    |
    */

    'font' => 'Arial',
    'font_size' => 12,

    /*
    |--------------------------------------------------------------------------
    | Adicionar fontes personalizadas
    |--------------------------------------------------------------------------
    |
    | Caso queira adicionar fontes personalizadas ao DomPDF, pode fazer isso aqui.
    |
    */

    'custom_fonts' => [
        'custom_font' => [
            'R' => storage_path('fonts/yourfont.ttf'),  // Caminho para a fonte
            'B' => storage_path('fonts/yourfont_bold.ttf'),
            'I' => storage_path('fonts/yourfont_italic.ttf'),
            'BI' => storage_path('fonts/yourfont_bold_italic.ttf'),
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Outras configurações
    |--------------------------------------------------------------------------
    |
    | Aqui você pode configurar outras opções relacionadas ao DomPDF, como 
    | debug, cache, e outros.
    |
    */

    'debug' => false,  // Ativar/desativar o modo de debug.
    'cache' => storage_path('framework/cache/dompdf'),
];
