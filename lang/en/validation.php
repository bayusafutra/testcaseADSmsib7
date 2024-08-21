<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted' => 'Atribut :harus diterima.',
    'accepted_if' => 'Atribut :harus diterima ketika :other adalah :value.',
    'active_url' => 'Atribut :bukan merupakan URL yang valid.',
    'after' => 'Atribut :harus berupa tanggal setelah :date.',
    'after_or_equal' => 'Atribut :harus berupa tanggal setelah atau sama dengan :date.',
    'alpha' => 'Atribut :hanya boleh berisi huruf.',
    'alpha_dash' => 'Atribut :hanya boleh berisi huruf, angka, tanda hubung, dan garis bawah.',
    'alpha_num' => 'Atribut :hanya boleh berisi huruf dan angka.',
    'array' => 'Atribut :harus berupa array.',
    'before' => 'Atribut :harus berupa tanggal sebelum :date.',
    'before_or_equal' => 'Atribut :harus berupa tanggal sebelum atau sama dengan :date.',
    'between' => [
        'array' => 'Atribut :harus memiliki item antara :min dan :max.',
        'file' => 'Atribut :harus memiliki ukuran antara :min dan :max kilobyte.',
        'numeric' => 'Atribut :harus berada di antara :min dan :max.',
        'string' => 'Atribut :harus berada di antara :min dan :max karakter.',
    ],
    'boolean' => 'Bidang :atribut harus bernilai benar atau salah.',
    'confirmed' => 'Konfirmasi atribut :tidak cocok.',
    'current_password' => 'Kata sandi salah.',
    'date' => 'Atribut :bukan tanggal yang valid.',
    'date_equals' => 'Atribut :harus berupa tanggal yang sama dengan :date.',
    'date_format' => 'Atribut :tidak sesuai dengan format :format.',
    'declined' => 'Atribut :harus ditolak.',
    'declined_if' => 'Atribut :harus ditolak jika :other adalah :value.',
    'different' => 'Atribut :dan :lainnya harus berbeda.',
    'digits' => 'Atribut :harus berupa angka :digit.',
    'digits_between' => 'Atribut :harus berada di antara :min dan :max digit.',
    'dimensions' => 'Atribut :memiliki dimensi gambar yang tidak valid.',
    'distinct' => 'Bidang atribut :memiliki nilai duplikat.',
    'doesnt_end_with' => 'Atribut :tidak boleh diakhiri dengan salah satu dari yang berikut ini: :values.',
    'doesnt_start_with' => 'Atribut :tidak boleh dimulai dengan salah satu dari berikut ini: :values.',
    'email' => 'Atribut :harus berupa alamat email yang valid.',
    'ends_with' => 'Atribut :harus diakhiri dengan salah satu dari berikut ini: :values.',
    'enum' => 'Atribut :yang dipilih tidak valid.',
    'exists' => 'Atribut :yang dipilih tidak valid.',
    'file' => 'Atribut :harus berupa file.',
    'filled' => 'Bidang :atribut harus memiliki nilai.',
    'gt' => [
        'array' => 'Atribut :harus memiliki lebih dari item :value.',
        'file' => 'Atribut :harus lebih besar dari :nilai kilobyte.',
        'numeric' => 'Atribut :harus lebih besar dari :value.',
        'string' => 'Atribut :harus lebih besar dari :value karakter.',
    ],
    'gte' => [
        'array' => 'Atribut :harus memiliki item :value atau lebih.',
        'file' => 'Atribut :harus lebih besar dari atau sama dengan :nilai kilobyte.',
        'numeric' => 'Atribut :harus lebih besar dari atau sama dengan :nilai.',
        'string' => 'Atribut :harus lebih besar dari atau sama dengan :value karakter.',
    ],
    'image' => 'Atribut :harus berupa gambar.',
    'in' => 'Atribut :yang dipilih tidak valid.',
    'in_array' => 'Bidang atribut :tidak ada di dalam :other.',
    'integer' => 'Atribut :harus berupa bilangan bulat.',
    'ip' => 'Atribut :harus berupa alamat IP yang valid.',
    'ipv4' => 'Atribut :harus berupa alamat IPv4 yang valid.',
    'ipv6' => 'Atribut :harus berupa alamat IPv6 yang valid.',
    'json' => 'Atribut :harus berupa string JSON yang valid.',
    'lowercase' => 'Atribut :harus berupa huruf kecil.',
    'lt' => [
        'array' => 'Atribut :harus memiliki kurang dari item :value.',
        'file' => 'Atribut :harus memiliki ukuran kurang dari :value kilobyte.',
        'numeric' => 'Atribut :harus kurang dari :nilai.',
        'string' => 'Atribut :harus kurang dari :nilai karakter.',
    ],
    'lte' => [
        'array' => 'Atribut :tidak boleh memiliki lebih dari item :value.',
        'file' => 'Atribut :harus kurang dari atau sama dengan :nilai kilobyte.',
        'numeric' => 'Atribut :harus kurang dari atau sama dengan :nilai.',
        'string' => 'Atribut :harus kurang dari atau sama dengan :nilai karakter.',
    ],
    'mac_address' => 'Atribut :harus berupa alamat MAC yang valid.',
    'max' => [
        'array' => 'Atribut :tidak boleh memiliki lebih dari item :max.',
        'file' => 'Atribut :tidak boleh lebih besar dari :max kilobyte.',
        'numeric' => 'Atribut :tidak boleh lebih besar dari :max.',
        'string' => 'Atribut :tidak boleh lebih besar dari :max karakter.',
    ],
    'max_digits' => 'Atribut :tidak boleh memiliki lebih dari :max digit.',
    'mimes' => 'Atribut :harus berupa file bertipe: :values.',
    'mimetypes' => 'Atribut :harus berupa file bertipe: :values.',
    'min' => [
        'array' => 'Atribut :harus memiliki setidaknya :min item.',
        'file' => 'Atribut :harus berukuran minimal :min kilobyte.',
        'numeric' => 'Atribut :harus memiliki setidaknya :min.',
        'string' => 'Atribut :harus setidaknya :min karakter.',
    ],
    'min_digits' => 'Atribut :harus memiliki setidaknya :min digit.',
    'multiple_of' => 'Atribut :harus merupakan kelipatan dari :value.',
    'not_in' => 'Atribut :yang dipilih tidak valid.',
    'not_regex' => 'Format :atribut tidak valid.',
    'numeric' => 'Atribut :harus berupa angka.',
    'password' => [
        'letters' => 'Atribut :harus berisi setidaknya satu huruf.',
        'mixed' => 'Atribut :harus berisi setidaknya satu huruf besar dan satu huruf kecil.',
        'numbers' => 'Atribut :harus berisi setidaknya satu angka.',
        'symbols' => 'Atribut :harus berisi setidaknya satu simbol.',
        'uncompromised' => 'Atribut :yang diberikan telah muncul dalam kebocoran data. Pilihlah atribut :yang lain.',
    ],
    'present' => 'Bidang :atribut harus ada.',
    'prohibited' => 'Bidang :atribut dilarang.',
    'prohibited_if' => 'Bidang atribut :dilarang jika :lainnya adalah :nilai.',
    'prohibited_unless' => 'Bidang atribut :dilarang kecuali :lainnya dalam :nilai.',
    'prohibits' => 'Bidang atribut :melarang keberadaan :other.',
    'regex' => 'Format :atribut tidak valid.',
    'required' => 'Bidang :atribut wajib diisi.',
    'required_array_keys' => 'Bidang :atribut harus berisi entri untuk: :values.',
    'required_if' => 'Bidang :atribut diperlukan ketika :other adalah :value.',
    'required_if_accepted' => 'Bidang :atribut harus berisi entri: :other adalah :value.',
    'required_unless' => 'Bidang :atribut diperlukan kecuali :other ada di dalam :values.',
    'required_with' => 'Bidang :atribut diperlukan ketika :values ada.',
    'required_with_all' => 'Bidang atribut :diperlukan ketika :values ada.',
    'required_without' => 'Bidang :atribut diperlukan ketika :values tidak ada.',
    'required_without_all' => 'Bidang :atribut diperlukan ketika tidak ada :nilai yang ada.',
    'same' => 'Atribut :nilai dan :lainnya harus sama.',
    'size' => [
        'array' => 'Atribut :harus berisi item :ukuran.',
        'file' => 'Atribut :harus berukuran :kilobyte.',
        'numeric' => 'Atribut :harus berupa :ukuran.',
        'string' => 'Atribut :harus berupa karakter :ukuran.',
    ],
    'starts_with' => 'Atribut :harus dimulai dengan salah satu dari yang berikut ini: :nilai.',
    'string' => 'Atribut :harus berupa string.',
    'timezone' => 'Atribut :harus berupa zona waktu yang valid.',
    'unique' => 'Atribut :telah diambil.',
    'uploaded' => 'Atribut :gagal diunggah.',
    'uppercase' => 'Atribut :harus berupa huruf besar.',
    'url' => 'Atribut :harus berupa URL yang valid.',
    'uuid' => 'Atribut :harus berupa UUID yang valid.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [],

];
