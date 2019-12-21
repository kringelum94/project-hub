<?php

function set_active($path){
    return Request::is($path) ? 'active' : '';
}

function gravatar_url($email){

    return $email . "?" . http_build_query([
        's' => 60,
        'd' => 'https://danielkringelum.dk/no-image-icon-grey.png'
    ]);
}