<?php

function validate($errors, $input)
{
    return $errors->has($input) ? 'is-invalid' : null;
}

function states($country)
{
    $states = [
        'us' => [
            'AL'=>'Alabama',
            'AK'=>'Alaska',
            'AZ'=>'Arizona',
            'AR'=>'Arkansas',
            'CA'=>'California',
            'CO'=>'Colorado',
            'CT'=>'Connecticut',
            'DE'=>'Delaware',
            'DC'=>'District of Columbia',
            'FL'=>'Florida',
            'GA'=>'Georgia',
            'HI'=>'Hawaii',
            'ID'=>'Idaho',
            'IL'=>'Illinois',
            'IN'=>'Indiana',
            'IA'=>'Iowa',
            'KS'=>'Kansas',
            'KY'=>'Kentucky',
            'LA'=>'Louisiana',
            'ME'=>'Maine',
            'MD'=>'Maryland',
            'MA'=>'Massachusetts',
            'MI'=>'Michigan',
            'MN'=>'Minnesota',
            'MS'=>'Mississippi',
            'MO'=>'Missouri',
            'MT'=>'Montana',
            'NE'=>'Nebraska',
            'NV'=>'Nevada',
            'NH'=>'New Hampshire',
            'NJ'=>'New Jersey',
            'NM'=>'New Mexico',
            'NY'=>'New York',
            'NC'=>'North Carolina',
            'ND'=>'North Dakota',
            'OH'=>'Ohio',
            'OK'=>'Oklahoma',
            'OR'=>'Oregon',
            'PA'=>'Pennsylvania',
            'RI'=>'Rhode Island',
            'SC'=>'South Carolina',
            'SD'=>'South Dakota',
            'TN'=>'Tennessee',
            'TX'=>'Texas',
            'UT'=>'Utah',
            'VT'=>'Vermont',
            'VA'=>'Virginia',
            'WA'=>'Washington',
            'WV'=>'West Virginia',
            'WI'=>'Wisconsin',
            'WY'=>'Wyoming',
        ]
    ];

    if (! array_key_exists($country, $states))
        return [];

    return $states[$country];
}

function abortIf($condition, $code = 404, $message = null)
{
    if ($condition)
        abort($code, $message);
}

function getCustomer($catchError = true)
{
    if (auth()->check()) {
        //
    } else {
        $customer = \App\Visitor::locate(request('cart_id'));

        if ($catchError)
            abortIf(! $customer->exists(), 404, 'No customer found.');
    }

    return $customer;
}

function centsToCurrency($cents)
{
    return $cents/100;
}

function codes()
{
    return new \App\Support\Codes;
}

function slug_str($slug)
{
    return ucwords(str_replace('-', ' ', $slug));
}

function snake_str($snake)
{
    return ucfirst(str_replace('_', ' ', $snake));
}

function generateProductId($string = null, $length = 8)
{
    return strtoupper(substr(md5(now()->timestamp . $string), 0, $length)) . '_IT';
}

function getRoutes($folders)
{
    foreach ($folders as $content) {
        $contentArray = explode('.', $content);
        $folder = $contentArray[0];
        $groups = explode('|', $contentArray[1]);

        foreach ($groups as $file) {
            require base_path("routes/{$folder}/{$file}.php");
        }
    }
}

function loremText($length = 1)
{
    $sentences = ['Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'Et sollicitudin ac orci phasellus egestas.', 'Tortor condimentum lacinia quis vel eros donec ac.', 'Felis eget velit aliquet sagittis id.', 'Leo vel orci porta non pulvinar neque.', 'Non odio euismod lacinia at quis risus.', 'Massa massa ultricies mi quis.', 'Suspendisse sed nisi lacus sed viverra.', 'Et tortor at risus viverra adipiscing at in tellus integer.', 'Integer quis auctor elit sed vulputate mi sit amet.', 'Mi bibendum neque egestas congue quisque.', 'Aliquam id diam maecenas ultricies mi eget mauris pharetra et.', 'Felis imperdiet proin fermentum leo vel orci porta.', 'Lacus sed turpis tincidunt id aliquet risus feugiat in.', 'Et ligula ullamcorper malesuada proin libero nunc consequat interdum varius.', 'Id volutpat lacus laoreet non.', 'Ac auctor augue mauris augue neque gravida.', 'Ornare aenean euismod elementum nisi quis eleifend quam adipiscing vitae.', 'Neque viverra justo nec ultrices dui sapien.', 'Lacus vestibulum sed arcu non odio euismod.', 'Tortor at auctor urna nunc id cursus metus aliquam.', 'Enim facilisis gravida neque convallis.', 'Ac turpis egestas maecenas pharetra convallis posuere morbi leo urna.', 'Diam vel quam elementum pulvinar etiam non quam lacus.', 'Sed arcu non odio euismod lacinia at quis risus sed.', 'Eget magna fermentum iaculis eu.', 'Amet risus nullam eget felis eget.', 'Consectetur adipiscing elit pellentesque habitant morbi tristique senectus et.', 'Ac odio tempor orci dapibus ultrices.', 'Quis blandit turpis cursus in hac habitasse platea.', 'Varius quam quisque id diam vel.', 'Enim facilisis gravida neque convallis a cras semper auctor.', 'Ornare quam viverra orci sagittis eu volutpat odio.', 'Consequat semper viverra nam libero justo laoreet sit amet.', 'Rutrum quisque non tellus orci.', 'Tristique senectus et netus et malesuada fames.', 'Gravida neque convallis a cras semper auctor neque vitae.', 'Sit amet facilisis magna etiam tempor orci eu lobortis.', 'Sit amet consectetur adipiscing elit pellentesque habitant.', 'Ultrices gravida dictum fusce ut placerat orci nulla.', 'Mi sit amet mauris commodo quis imperdiet massa.', 'Tellus pellentesque eu tincidunt tortor aliquam nulla.', 'Enim facilisis gravida neque convallis a cras semper auctor.', 'Amet mauris commodo quis imperdiet massa.', 'Euismod nisi porta lorem mollis aliquam ut porttitor.', 'Sagittis orci a scelerisque purus semper eget.', 'Felis donec et odio pellentesque diam volutpat commodo sed.', 'Ornare massa eget egestas purus viverra.', 'Morbi tristique senectus et netus.', 'Urna condimentum mattis pellentesque id.', 'In eu mi bibendum neque egestas.', 'Ut diam quam nulla porttitor massa.', 'In nibh mauris cursus mattis molestie a iaculis.'];

    shuffle($sentences);

    $paragraph = array_slice($sentences, 0, $length);

    return implode(' ', $paragraph);
}

function classToType($classname)
{
    return strtolower(class_basename($classname));
}

function typeToClass($type)
{
    return 'App\\' . ucfirst($type);
}
