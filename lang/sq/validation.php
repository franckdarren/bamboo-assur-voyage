<?php

declare(strict_types=1);

return [
    'accepted'             => ':Attribute duhet të pranohet.',
    'accepted_if'          => ':Attribute duhet të pranohet kur :other është :value.',
    'active_url'           => ':Attribute nuk është adresë e saktë.',
    'after'                => ':Attribute duhet të jetë datë pas :date.',
    'after_or_equal'       => ':Attribute duhet të jetë datë e barabartë ose pas :date.',
    'alpha'                => ':Attribute mund të përmbajë vetëm shkronja.',
    'alpha_dash'           => ':Attribute mund të përmbajë vetëm shkronja, numra, dhe viza.',
    'alpha_num'            => ':Attribute mund të përmbajë vetëm shkronja dhe numra.',
    'array'                => ':Attribute duhet të jetë një bashkësi (array).',
    'ascii'                => ':Attribute duhet të përmbajë vetëm karaktere dhe simbole alfanumerike me një bajt.',
    'before'               => ':Attribute duhet të jetë datë para :date.',
    'before_or_equal'      => ':Attribute duhet të jetë datë e barabartë ose para :date.',
    'between'              => [
        'array'   => ':Attribute duhet të ketë ndërmjet :min - :max elementëve.',
        'file'    => ':Attribute duhet të jetë ndërmjet :min - :max kilobajtëve.',
        'numeric' => ':Attribute duhet të jetë ndërmjet :min - :max.',
        'string'  => ':Attribute duhet të ketë ndërmjet :min - :max karaktereve.',
    ],
    'boolean'              => 'Fusha :attribute duhet të jetë e vërtetë ose e gabuar',
    'can'                  => 'Fusha :attribute përmban një vlerë të paautorizuar.',
    'confirmed'            => ':Attribute konfirmimi nuk përputhet.',
    'contains'             => 'Fushës :attribute i mungon një vlerë e kërkuar.',
    'current_password'     => 'Fjalëkalimi është i pasaktë.',
    'date'                 => ':Attribute nuk është një datë e saktë.',
    'date_equals'          => ':Attribute duhet të jetë datë e barabartë me :date.',
    'date_format'          => ':Attribute nuk i përshtatet formatit :format.',
    'decimal'              => ':Attribute duhet të ketë :decimal shifra dhjetore.',
    'declined'             => ':Attribute duhet të refuzohen.',
    'declined_if'          => ':Attribute duhet të refuzohet kur :other është :value.',
    'different'            => ':Attribute dhe :other duhet të jenë të ndryshme.',
    'digits'               => ':Attribute duhet të ketë :digits shifra.',
    'digits_between'       => ':Attribute duhet të ketë midis :min dhe :max shifra.',
    'dimensions'           => ':Attribute ka dimensione të gabuara.',
    'distinct'             => ':Attribute ka një vlerë të përsëritur.',
    'doesnt_end_with'      => ':Attribute nuk mund të përfundojë me një nga sa vijon: :values.',
    'doesnt_start_with'    => ':Attribute nuk mund të fillojë me një nga sa vijon: :values.',
    'email'                => ':Attribute formati është i pasaktë.',
    'ends_with'            => ':Attribute duhet të përfundojë me një nga vlerat: :values.',
    'enum'                 => ':Attribute e zgjedhura është e pavlefshme.',
    'exists'               => ':Attribute përzgjedhur është i/e pasaktë.',
    'extensions'           => 'Fusha :attribute duhet të ketë një nga shtesat e mëposhtme: :values.',
    'file'                 => ':Attribute duhet të jetë një fajll.',
    'filled'               => 'Fusha :attribute është e kërkuar.',
    'gt'                   => [
        'array'   => ':Attribute duhet të ketë më shumë se :value elemente.',
        'file'    => ':Attribute duhet të jetë më i/e madh/e se :value kilobajtë.',
        'numeric' => ':Attribute duhet të jetë më i/e madh/e se :value.',
        'string'  => ':Attribute duhet të ketë më shumë se :value karaktere.',
    ],
    'gte'                  => [
        'array'   => ':Attribute duhet të ketë :value ose më shumë elemente.',
        'file'    => ':Attribute duhet të jetë më i/e madh/e ose i/e barabartë me :value kilobajtë.',
        'numeric' => ':Attribute duhet të jetë më i/e madh/e ose i/e barabartë me :value.',
        'string'  => ':Attribute duhet të ketë :value ose më shumë karaktere.',
    ],
    'hex_color'            => 'Fusha :attribute duhet të jetë një ngjyrë heksadecimal e vlefshme.',
    'image'                => ':Attribute duhet të jetë imazh.',
    'in'                   => ':Attribute përzgjedhur është i/e pasaktë.',
    'in_array'             => ':Attribute nuk gjendet në :other.',
    'integer'              => ':Attribute duhet të jetë numër i plotë.',
    'ip'                   => ':Attribute duhet të jetë një IP adresë.',
    'ipv4'                 => ':Attribute duhet të jetë një IPv4 adresë.',
    'ipv6'                 => ':Attribute duhet të jetë një IPv6 adresë.',
    'json'                 => ':Attribute duhet të ketë përmbajtje të vlefshme JSON.',
    'list'                 => 'Fusha :attribute duhet të jetë një listë.',
    'lowercase'            => ':Attribute duhet të jetë me shkronja të vogla.',
    'lt'                   => [
        'array'   => ':Attribute duhet të ketë më pak se :value elemente.',
        'file'    => ':Attribute duhet të jetë më i/e vogël se :value kilobajtë.',
        'numeric' => ':Attribute duhet të jetë më i/e vogël se :value.',
        'string'  => ':Attribute duhet të ketë më pak se :value karaktere.',
    ],
    'lte'                  => [
        'array'   => ':Attribute duhet të ketë :value ose më pak karaktere.',
        'file'    => ':Attribute duhet të jetë më i/e vogël ose i/e barabartë me :value kilobajtë.',
        'numeric' => ':Attribute duhet të jetë më i/e vogël ose i/e barabartë me :value.',
        'string'  => ':Attribute duhet të ketë :value ose më pak karaktere.',
    ],
    'mac_address'          => ':Attribute duhet të jetë një adresë MAC e vlefshme.',
    'max'                  => [
        'array'   => ':Attribute nuk mund të ketë më tepër se :max elemente.',
        'file'    => ':Attribute nuk mund të jetë më tepër se :max kilobajtë.',
        'numeric' => ':Attribute nuk mund të jetë më tepër se :max.',
        'string'  => ':Attribute nuk mund të ketë më tepër se :max karaktere.',
    ],
    'max_digits'           => ':Attribute nuk duhet të ketë më shumë se :max shifra.',
    'mimes'                => ':Attribute duhet të jetë një dokument i tipit: :values.',
    'mimetypes'            => ':Attribute duhet të jetë një dokument i tipit: :values.',
    'min'                  => [
        'array'   => ':Attribute nuk mund të ketë më pak se :min elemente.',
        'file'    => ':Attribute nuk mund të jetë më pak se :min kilobajtë.',
        'numeric' => ':Attribute nuk mund të jetë më pak se :min.',
        'string'  => ':Attribute nuk mund të ketë më pak se :min karaktere.',
    ],
    'min_digits'           => ':Attribute duhet të ketë të paktën :min shifra.',
    'missing'              => 'Fusha :attribute duhet të mungojë.',
    'missing_if'           => 'Fusha :attribute duhet të mungojë kur :other është :value.',
    'missing_unless'       => 'Fusha :attribute duhet të mungojë nëse :other nuk është :value.',
    'missing_with'         => 'Fusha :attribute duhet të mungojë kur është e pranishme :values.',
    'missing_with_all'     => 'Fusha :attribute duhet të mungojë kur janë të pranishme :values.',
    'multiple_of'          => ':Attribute duhet të jetë shumë nga :value',
    'not_in'               => ':Attribute përzgjedhur është i/e pasaktë.',
    'not_regex'            => 'Formati i :attribute është i pasaktë.',
    'numeric'              => ':Attribute duhet të jetë një numër.',
    'password'             => [
        'letters'       => ':Attribute duhet të përmbajë të paktën një shkronjë.',
        'mixed'         => ':Attribute duhet të përmbajë të paktën një shkronjë të madhe dhe një shkronjë të vogël.',
        'numbers'       => ':Attribute duhet të përmbajë të paktën një numër.',
        'symbols'       => ':Attribute duhet të përmbajë të paktën një simbol.',
        'uncompromised' => ':Attribute e dhënë është shfaqur në një rrjedhje të dhënash. Ju lutemi zgjidhni një :attribute të ndryshme.',
    ],
    'present'              => ':Attribute duhet të jetë prezent/e.',
    'present_if'           => 'Fusha :attribute duhet të jetë e pranishme kur :other është :value.',
    'present_unless'       => 'Fusha :attribute duhet të jetë e pranishme përveç nëse :other është :value.',
    'present_with'         => 'Fusha :attribute duhet të jetë e pranishme kur është e pranishme :values.',
    'present_with_all'     => 'Fusha :attribute duhet të jetë e pranishme kur janë të pranishme :values.',
    'prohibited'           => 'Fusha :attribute është e ndaluar.',
    'prohibited_if'        => 'Fusha :attribute është e ndaluar kur :other është :value.',
    'prohibited_unless'    => 'Fusha :attribute është e ndaluar nëse :other është në :values.',
    'prohibits'            => 'Fusha :attribute ndalon :other të jenë të pranishëm.',
    'regex'                => 'Formati i :attribute është i pasaktë.',
    'required'             => 'Fusha :attribute është e kërkuar.',
    'required_array_keys'  => 'Fusha :attribute duhet të përmbajë shënime për: :values.',
    'required_if'          => 'Fusha :attribute është e kërkuar kur :other është :value.',
    'required_if_accepted' => 'Fusha :attribute kërkohet kur pranohet :other.',
    'required_if_declined' => 'Fusha :attribute kërkohet kur :other refuzohet.',
    'required_unless'      => 'Fusha :attribute është e kërkuar përveç kur :other është në :values.',
    'required_with'        => 'Fusha :attribute është e kërkuar kur :values ekziston.',
    'required_with_all'    => 'Fusha :attribute është e kërkuar kur :values ekziston.',
    'required_without'     => 'Fusha :attribute është e kërkuar kur :values nuk ekziston.',
    'required_without_all' => 'Fusha :attribute është e kërkuar kur nuk ekziston asnjë nga :values.',
    'same'                 => ':Attribute dhe :other duhet të përputhen.',
    'size'                 => [
        'array'   => ':Attribute duhet të ketë :size elemente.',
        'file'    => ':Attribute duhet të jetë :size kilobajtë.',
        'numeric' => ':Attribute duhet të jetë :size.',
        'string'  => ':Attribute duhet të ketë :size karaktere.',
    ],
    'starts_with'          => ':Attribute duhet të fillojë me njërën nga vlerat: :values.',
    'string'               => ':Attribute duhet të jetë varg.',
    'timezone'             => ':Attribute duhet të jetë zonë kohore e saktë.',
    'ulid'                 => ':Attribute duhet të jetë një ULID i vlefshëm.',
    'unique'               => ':Attribute është marrë tashmë.',
    'uploaded'             => ':Attribute dështoi të ngarkohej.',
    'uppercase'            => ':Attribute duhet të jetë e madhe.',
    'url'                  => 'Formati i :attribute është i pasaktë.',
    'uuid'                 => ':Attribute duhet të jetë UUID i/e saktë.',
];
