<?php

declare(strict_types=1);

return [
    'accepted'             => ':Attribute deve essere accettato.',
    'accepted_if'          => ':Attribute deve essere accettato quando :other è :value.',
    'active_url'           => ':Attribute non è un URL valido.',
    'after'                => ':Attribute deve essere una data successiva al :date.',
    'after_or_equal'       => ':Attribute deve essere una data successiva o uguale al :date.',
    'alpha'                => ':Attribute può contenere solo lettere.',
    'alpha_dash'           => ':Attribute può contenere solo lettere, numeri e trattini.',
    'alpha_num'            => ':Attribute può contenere solo lettere e numeri.',
    'array'                => ':Attribute deve essere un array.',
    'ascii'                => ':Attribute deve contenere solo caratteri alfanumerici single-byte e simboli.',
    'before'               => ':Attribute deve essere una data precedente al :date.',
    'before_or_equal'      => ':Attribute deve essere una data precedente o uguale al :date.',
    'between'              => [
        'array'   => ':Attribute deve avere tra :min - :max elementi.',
        'file'    => ':Attribute deve trovarsi tra :min - :max kilobyte.',
        'numeric' => ':Attribute deve trovarsi tra :min - :max.',
        'string'  => ':Attribute deve trovarsi tra :min - :max caratteri.',
    ],
    'boolean'              => 'Il campo :attribute deve essere vero o falso.',
    'confirmed'            => 'Il campo di conferma per :attribute non coincide.',
    'current_password'     => 'Password non valida.',
    'date'                 => ':Attribute non è una data valida.',
    'date_equals'          => ':Attribute deve essere una data e uguale a :date.',
    'date_format'          => ':Attribute non coincide con il formato :format.',
    'decimal'              => ':Attribute deve avere :decimal cifre decimali.',
    'declined'             => ':Attribute deve essere rifiutato.',
    'declined_if'          => ':Attribute deve essere rifiutato quando :other è :value.',
    'different'            => ':Attribute e :other devono essere differenti.',
    'digits'               => ':Attribute deve essere di :digits cifre.',
    'digits_between'       => ':Attribute deve essere tra :min e :max cifre.',
    'dimensions'           => 'Le dimensioni dell\'immagine di :attribute non sono valide.',
    'distinct'             => ':Attribute contiene un valore duplicato.',
    'doesnt_end_with'      => ':Attribute non può terminare con uno dei seguenti valori: :values.',
    'doesnt_start_with'    => ':Attribute non può iniziare con uno dei seguenti valori: :values.',
    'email'                => ':Attribute non è valido.',
    'ends_with'            => ':Attribute deve finire con uno dei seguenti valori: :values',
    'enum'                 => 'Il campo :attribute non è valido.',
    'exists'               => ':Attribute selezionato non è valido.',
    'file'                 => ':Attribute deve essere un file.',
    'filled'               => 'Il campo :attribute deve contenere un valore.',
    'gt'                   => [
        'array'   => ':Attribute deve contenere più di :value elementi.',
        'file'    => ':Attribute deve essere maggiore di :value kilobyte.',
        'numeric' => ':Attribute deve essere maggiore di :value.',
        'string'  => ':Attribute deve contenere più di :value caratteri.',
    ],
    'gte'                  => [
        'array'   => ':Attribute deve contenere un numero di elementi uguale o maggiore di :value.',
        'file'    => ':Attribute deve essere uguale o maggiore di :value kilobyte.',
        'numeric' => ':Attribute deve essere uguale o maggiore di :value.',
        'string'  => ':Attribute deve contenere un numero di caratteri uguale o maggiore di :value.',
    ],
    'image'                => ':Attribute deve essere un\'immagine.',
    'in'                   => ':Attribute selezionato non è valido.',
    'in_array'             => 'Il valore del campo :attribute non esiste in :other.',
    'integer'              => ':Attribute deve essere un numero intero.',
    'ip'                   => ':Attribute deve essere un indirizzo IP valido.',
    'ipv4'                 => ':Attribute deve essere un indirizzo IPv4 valido.',
    'ipv6'                 => ':Attribute deve essere un indirizzo IPv6 valido.',
    'json'                 => ':Attribute deve essere una stringa JSON valida.',
    'lowercase'            => ':Attribute deve contenere solo caratteri minuscoli.',
    'lt'                   => [
        'array'   => ':Attribute deve contenere meno di :value elementi.',
        'file'    => ':Attribute deve essere minore di :value kilobyte.',
        'numeric' => ':Attribute deve essere minore di :value.',
        'string'  => ':Attribute deve contenere meno di :value caratteri.',
    ],
    'lte'                  => [
        'array'   => ':Attribute deve contenere un numero di elementi minore o uguale a :value.',
        'file'    => ':Attribute deve essere minore o uguale a :value kilobyte.',
        'numeric' => ':Attribute deve essere minore o uguale a :value.',
        'string'  => ':Attribute deve contenere un numero di caratteri minore o uguale a :value.',
    ],
    'mac_address'          => 'Il campo :attribute deve essere un indirizzo MAC valido .',
    'max'                  => [
        'array'   => ':Attribute non può avere più di :max elementi.',
        'file'    => ':Attribute non può essere superiore a :max kilobyte.',
        'numeric' => ':Attribute non può essere superiore a :max.',
        'string'  => ':Attribute non può contenere più di :max caratteri.',
    ],
    'max_digits'           => ':Attribute non può contenere più di :max cifre.',
    'mimes'                => ':Attribute deve essere del tipo: :values.',
    'mimetypes'            => ':Attribute deve essere del tipo: :values.',
    'min'                  => [
        'array'   => ':Attribute deve avere almeno :min elementi.',
        'file'    => ':Attribute deve essere almeno di :min kilobyte.',
        'numeric' => ':Attribute deve essere almeno :min.',
        'string'  => ':Attribute deve contenere almeno :min caratteri.',
    ],
    'min_digits'           => ':Attribute deve contenere almeno :min cifre.',
    'missing'              => 'Il campo :attribute deve mancare.',
    'missing_if'           => 'Il campo :attribute deve mancare quando :other è :value.',
    'missing_unless'       => 'Il campo :attribute deve mancare a meno che :other non sia :value.',
    'missing_with'         => 'Il campo :attribute deve mancare quando è presente :values.',
    'missing_with_all'     => 'Il campo :attribute deve mancare quando sono presenti :values.',
    'multiple_of'          => ':Attribute deve essere un multiplo di :value',
    'not_in'               => 'Il valore selezionato per :attribute non è valido.',
    'not_regex'            => 'Il formato di :attribute non è valido.',
    'numeric'              => ':Attribute deve essere un numero.',
    'password'             => [
        'letters'       => ':Attribute deve contenere almeno un carattere.',
        'mixed'         => ':Attribute deve contenere almeno un carattere maiuscolo ed un carattere minuscolo.',
        'numbers'       => ':Attribute deve contenere almeno un numero.',
        'symbols'       => ':Attribute deve contenere almeno un simbolo.',
        'uncompromised' => ':Attribute è presente negli archivi dei dati trafugati. Per piacere scegli un valore differente per :attribute.',
    ],
    'present'              => 'Il campo :attribute deve essere presente.',
    'prohibited'           => ':Attribute non consentito.',
    'prohibited_if'        => ':Attribute non consentito quando :other è :value.',
    'prohibited_unless'    => ':Attribute non consentito a meno che :other sia contenuto in :values.',
    'prohibits'            => ':Attribute impedisce a :other di essere presente.',
    'regex'                => 'Il formato del campo :attribute non è valido.',
    'required'             => 'Il campo :attribute è richiesto.',
    'required_array_keys'  => 'Il campo :attribute deve contenere voci per: :values.',
    'required_if'          => 'Il campo :attribute è richiesto quando :other è :value.',
    'required_if_accepted' => ':Attribute è richiesto quando :other è accettato.',
    'required_unless'      => 'Il campo :attribute è richiesto a meno che :other sia in :values.',
    'required_with'        => 'Il campo :attribute è richiesto quando :values è presente.',
    'required_with_all'    => 'Il campo :attribute è richiesto quando :values sono presenti.',
    'required_without'     => 'Il campo :attribute è richiesto quando :values non è presente.',
    'required_without_all' => 'Il campo :attribute è richiesto quando nessuno di :values è presente.',
    'same'                 => ':Attribute e :other devono coincidere.',
    'size'                 => [
        'array'   => ':Attribute deve contenere :size elementi.',
        'file'    => ':Attribute deve essere :size kilobyte.',
        'numeric' => ':Attribute deve essere :size.',
        'string'  => ':Attribute deve contenere :size caratteri.',
    ],
    'starts_with'          => ':Attribute deve iniziare con uno dei seguenti: :values',
    'string'               => ':Attribute deve essere una stringa.',
    'timezone'             => ':Attribute deve essere una zona valida.',
    'ulid'                 => ':Attribute deve essere un ULID valido.',
    'unique'               => ':Attribute è stato già utilizzato.',
    'uploaded'             => ':Attribute non è stato caricato.',
    'uppercase'            => ':Attribute deve contenere solo caratteri maiuscoli.',
    'url'                  => 'Il formato del campo :attribute non è valido.',
    'uuid'                 => ':Attribute deve essere un UUID valido.',
    'attributes'           => [
        'address'                  => 'indirizzo',
        'affiliate_url'            => 'URL di affiliazione',
        'age'                      => 'età',
        'amount'                   => 'Quantità',
        'announcement'             => 'annuncio',
        'area'                     => 'la zona',
        'audience_prize'           => 'premio del pubblico',
        'available'                => 'disponibile',
        'birthday'                 => 'compleanno',
        'body'                     => 'corpo',
        'city'                     => 'città',
        'compilation'              => 'compilazione',
        'concept'                  => 'concetto',
        'conditions'               => 'condizioni',
        'content'                  => 'contenuto',
        'country'                  => 'paese',
        'cover'                    => 'copertina',
        'created_at'               => 'creato il',
        'creator'                  => 'Creatore',
        'currency'                 => 'valuta',
        'current_password'         => 'password attuale',
        'customer'                 => 'cliente',
        'date'                     => 'data',
        'date_of_birth'            => 'data di nascita',
        'dates'                    => 'date',
        'day'                      => 'giorno',
        'deleted_at'               => 'cancellato il',
        'description'              => 'descrizione',
        'display_type'             => 'tipo di visualizzazione',
        'district'                 => 'quartiere',
        'duration'                 => 'durata',
        'email'                    => 'e-mail',
        'excerpt'                  => 'estratto',
        'filter'                   => 'filtro',
        'finished_at'              => 'finito alle',
        'first_name'               => 'nome',
        'gender'                   => 'genere',
        'grand_prize'              => 'grand prize',
        'group'                    => 'gruppo',
        'hour'                     => 'ora',
        'image'                    => 'Immagine',
        'image_desktop'            => 'immagine del desktop',
        'image_main'               => 'immagine principale',
        'image_mobile'             => 'immagine mobile',
        'images'                   => 'immagini',
        'is_audience_winner'       => 'è il vincitore del pubblico',
        'is_hidden'                => 'è nascosto',
        'is_subscribed'            => 'è iscritto',
        'is_visible'               => 'è visibile',
        'is_winner'                => 'è vincitore',
        'items'                    => 'elementi',
        'key'                      => 'chiave',
        'last_name'                => 'cognome',
        'lesson'                   => 'lezione',
        'line_address_1'           => 'indirizzo di linea 1',
        'line_address_2'           => 'indirizzo di linea 2',
        'login'                    => 'login',
        'message'                  => 'Messaggio',
        'middle_name'              => 'secondo nome',
        'minute'                   => 'minuto',
        'mobile'                   => 'cellulare',
        'month'                    => 'mese',
        'name'                     => 'nome',
        'national_code'            => 'codice nazionale',
        'number'                   => 'numero',
        'password'                 => 'password',
        'password_confirmation'    => 'conferma password',
        'phone'                    => 'telefono',
        'photo'                    => 'foto',
        'portfolio'                => 'portafoglio',
        'postal_code'              => 'Codice Postale',
        'preview'                  => 'anteprima',
        'price'                    => 'prezzo',
        'product_id'               => 'Codice prodotto',
        'product_uid'              => 'ID del prodotto',
        'product_uuid'             => 'UUID del prodotto',
        'promo_code'               => 'codice promozionale',
        'province'                 => 'Provincia',
        'quantity'                 => 'quantità',
        'reason'                   => 'motivo',
        'recaptcha_response_field' => 'campo di risposta recaptcha',
        'referee'                  => 'arbitro',
        'referees'                 => 'arbitri',
        'reject_reason'            => 'rifiutare la ragione',
        'remember'                 => 'ricordare',
        'restored_at'              => 'ripristinato il',
        'result_text_under_image'  => 'testo del risultato sotto l\'immagine',
        'role'                     => 'ruolo',
        'rule'                     => 'regola',
        'rules'                    => 'regole',
        'second'                   => 'secondo',
        'sex'                      => 'sesso',
        'shipment'                 => 'spedizione',
        'short_text'               => 'testo breve',
        'size'                     => 'dimensione',
        'skills'                   => 'competenze',
        'slug'                     => 'lumaca',
        'specialization'           => 'specializzazione',
        'started_at'               => 'iniziato alle',
        'state'                    => 'stato',
        'status'                   => 'stato',
        'street'                   => 'strada',
        'student'                  => 'alunno',
        'subject'                  => 'argomento',
        'tag'                      => 'etichetta',
        'tags'                     => 'tag',
        'teacher'                  => 'insegnante',
        'terms'                    => 'termini',
        'test_description'         => 'descrizione del testo',
        'test_locale'              => 'locale di prova',
        'test_name'                => 'nome di prova',
        'text'                     => 'testo',
        'time'                     => 'ora',
        'title'                    => 'titolo',
        'type'                     => 'tipo',
        'updated_at'               => 'aggiornato il',
        'user'                     => 'utente',
        'username'                 => 'nome utente',
        'value'                    => 'valore',
        'year'                     => 'anno',
    ],
];
