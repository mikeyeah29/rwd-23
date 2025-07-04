<?php

class RwdManagementServices
{
    private $items = [
        'Hosting & Domain Management',
        'SSL Certificate',
        'WordPress update',
        'Theme & Plugin Updates',
        'Malware Protection',
        'Security Audit',
        'Backups',
        'Additional Support',
        // 'Spam Protection',
        // 'Speed Optimization'
    ];

    private $table = [
        'Hosting & Domain Management' => [
            'lite' => true,
            'pro' => true,
            'premium' => true,
            'help' => false
        ],
        'SSL Certificate' => [
            'lite' => true,
            'pro' => true,
            'premium' => true,
            'help' => true
        ],
        'WordPress update' => [
            'lite' => true,
            'pro' => true,
            'premium' => true,
            'help' => true
        ],
        'Theme & Plugin Updates' => [
            'lite' => true,
            'pro' => true,
            'premium' => true,
            'help' => true
        ],
        'Malware Protection' => [
            'lite' => true,
            'pro' => true,
            'premium' => true,
            'help' => true
        ],
        'Backups' => [
            'lite' => 'Daily',
            'pro' => 'Daily',
            'premium' => 'Daily',
            'help' => false
        ],
        'Additional Support' => [
            'lite' => false,
            'pro' => 'Up to 1 Hour',
            'premium' => 'Up to 3 Hours',
            'help' => true
        ],
        'Discounted Development' => [
            'lite' => false,
            'pro' => false,
            'premium' => true,
            'help' => false
        ],
        // 'Spam Protection' => [
        //     'lite' => false,
        //     'pro' => false,
        //     'premium' => true,
        //     'help' => false
        // ],
        // 'Speed Optimization' => [
        //     'lite' => false,
        //     'pro' => false,
        //     'premium' => true,
        //     'help' => true
        // ]
    ];

    public function getTable()
    {
        return $this->table;
    }

    public function outputCell($value)
    {
        if($value === true) {
            // echo '<i class="features-tick"></i>';
            echo '<svg fill="' . RwdColors::getSuccess() . '" xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24"><path d="M5.48 10.089l1.583-1.464c1.854.896 3.028 1.578 5.11 3.063 3.916-4.442 6.503-6.696 11.311-9.688l.516 1.186c-3.965 3.46-6.87 7.314-11.051 14.814-2.579-3.038-4.301-4.974-7.469-7.911zm14.407.557c.067.443.113.893.113 1.354 0 4.962-4.038 9-9 9s-9-4.038-9-9 4.038-9 9-9c1.971 0 3.79.644 5.274 1.723.521-.446 1.052-.881 1.6-1.303-1.884-1.511-4.271-2.42-6.874-2.42-6.075 0-11 4.925-11 11s4.925 11 11 11 11-4.925 11-11c0-1.179-.19-2.313-.534-3.378-.528.633-1.052 1.305-1.579 2.024z"/></svg>';
        }else if($value === false) {
            echo '<i class="features-cross"></i>';
        } else {
            echo $value;
        }
    }

    public function getItems()
    {
        return $this->items;
    }
}

?>
