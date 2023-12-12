<?php
    require __DIR__ . "/vendor/autoload.php";
    $stripe_secret_key = "sk_test_51OH7g3J8NGqPZGbSdEPUGDntQIYn8nF5K9vWObA086NvdHKg7JCjOCZSqKaLN8zGSVSZVLdccc86BtWse4yLgyjK00lK99IQ5K";
    \Stripe\Stripe::setApiKey($stripe_secret_key);

    $checkout_session = \Stripe\Checkout\Session::create([
        "mode" => "payment",
        "success_url"=>"http://localhost/event-app-master/success.php",
        "line_items"=>[
            [
                "quantity" =>1,
                "price_data"=> [
                    "currency"=>"ron",
                    "unit_amount"=>200,
                    "product_data"=>[
                        "name"=>"bilet"
                    ]
                ]
            ]
        ]
    ]);

    http_response_code(303);
header("Location: " . $checkout_session->url);

