<?php

return [

    /*
     * The driver to use to interact with MailChimp API.
     * You may use "log" or "null" to prevent calling the
     * API directly from your environment.
     */
    'driver' => env('NEWSLETTER_DRIVER', Spatie\Newsletter\Drivers\MailChimpDriver::class),

    /**
     * These arguments will be given to the driver.
     */
    'driver_arguments' => [
        'api_key' => '14927cfeea630e5cb9383554d01edf58-us14',

        'endpoint' => null,
    ],

    /*
     * The list name to use when no list name is specified in a method.
     */
    'default_list_name' => 'newsletter',

    'lists' => [

        /*
         * This key is used to identify this list. It can be used
         * as the listName parameter provided in the various methods.
         *
         * You can set it to any string you want and you can add
         * as many lists as you want.
         */
        'newsletter' => [

            /*
             * When using the Mailcoach driver, this should be Email list UUID
             * which is displayed in the Mailcoach UI
             *
             * When using the MailChimp driver, this should be a MailChimp list id.
             * http://kb.mailchimp.com/lists/managing-subscribers/find-your-list-id.
             */
            'id' => 'ca6a62c856',
        ],
    ],
    'ssl' => false,
];