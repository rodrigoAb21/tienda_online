<?php

return array(
    /* Set your Paypal Credential */
    'client_id' => 'AdWFbR45zVKsbzjQuFG1oUnsQCEUDrrenKsXs5kOU5GpSHRPIpdSLbZnlrLwFpjKCFjklvFSwSajRHFq',
    'secret' => 'ENWWMBF9hjo09rSVB4cW9j3f-0kHX6LzY4NNGFmdBmLFSHIbcVTNlfIQbn4RD9-6Tx0GVY_Krr6ZPwUp',

    /* SDK Config */

    'settings' => array(

        /* Mode selection: 'sandbox' or 'live' */

        'mode' => 'sandbox',

        /* Specify the max request tune in seconds */

        'http.ConnectionTimeOut' => 30,

        /* Whether want to log to a file */

        'log.LogEnabled' => true,

        /* Specify the file that want to write on */

        'log.FileName' => storage_path() . '/logs/paypal.log',

        /**
         * Available option 'FINE', 'INFO', 'WARN' or 'ERROR'
         *
         * Logging is most verbose in the 'FINE' level and decreases as you
         * proceed towards ERROR
         */

        'log.LogLevel' => 'FINE'

    ),

);


?>