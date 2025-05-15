<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Link Scanner Configuration
    |--------------------------------------------------------------------------
    |
    | Settings that control the behavior of the link scanner command.
    |
    */

    // Maximum number of seconds to wait for a response from a link
    'timeout' => 10,

    // Maximum number of links to scan per run
    'max_links_per_run' => 100,

    // Minimum interval (in minutes) between consecutive scans of the same link
    'scan_frequency_minutes' => 1440, // e.g., once per day

    // Duration (in days) after which a faulty link is marked as invalid
    'invalid_after_days' => 7,
];
