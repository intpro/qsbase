<?php

return [

    'alpha_block' => [
        'string' => [
            'string_one', 'string_two'
        ],
        'bool' => [
            'bool_one', 'bool_two'
        ],
        'int' => [
            'int_one', 'int_two'
        ],
        'float' => [
            'float_one', 'float_two'
        ],
        'text' => [
            'text_one', 'text_two'
        ],
        'image' => [
            'image_one', 'image_two'
        ],

        'groups' => [
            'group_one' => [
                'imageset' => [
                    'imageset_one' => 'image_one'
                ],
                'string' => [
                    'string_one', 'string_two'
                ],
                'bool' => [
                    'bool_one', 'bool_two'
                ],
                'int' => [
                    'int_one', 'int_two'
                ],
                'float' => [
                    'float_one', 'float_two'
                ],
                'text' => [
                    'text_one', 'text_two'
                ],
                'image' => [
                    'image_one', 'image_two'
                ]
            ],
            'group_two' => [
                'string' => [
                    'string_one', 'string_two'
                ],
                'bool' => [
                    'bool_one', 'bool_two'
                ],
                'int' => [
                    'int_one', 'int_two'
                ],
                'float' => [
                    'float_one', 'float_two'
                ],
                'text' => [
                    'text_one', 'text_two'
                ],
                'image' => [
                    'image_one', 'image_two'
                ],
                'group_one' => ['superior']
            ]
        ]

    ]

];
