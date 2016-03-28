<?php

/*

---------------------------------------
License Setup
---------------------------------------

Please add your license key, which you've received
via email after purchasing Kirby on http://getkirby.com/buy

It is not permitted to run a public website without a
valid license key. Please read the End User License Agreement
for more information: http://getkirby.com/license

*/



 include 'sck.config.php';




c::set('license', 'K2-PRO-81c4ee4a3c9554d003fa92aba1e2a399');



c::set('routes', array(
    array(
        'pattern' => 'theRoute',
        'action'  => function() {
            // do something here when the URL matches the pattern above
            return response::json(array(

               phpinfo()
            ));
        }
    )
));



/*
c::set('routes', array(
    array(
        'pattern' => 'theRoute',
        'action'  => function() {
            // do something here when the URL matches the pattern above
            $abc ='abc';
            return $abc;
        }
    )
));
*/


c::set('routes', array(
    array(
        'pattern' => 'about',
        'action'  => function() {
            // do something here when the URL matches the pattern above
          //  return go('http://www.google.com');
        },
        'method' => 'GET|POST|DELETE'
    )
));

c::set('routes', array(
    array(
        'pattern' => 'bla',
        'action'  => function() {
            // do something here when the URL matches the pattern above
            return go('bla');
        }
    )
));

/*

---------------------------------------
Kirby Configuration
---------------------------------------

By default you don't have to configure anything to
make Kirby work. For more fine-grained configuration
of the system, please check out http://getkirby.com/docs/advanced/options

*/