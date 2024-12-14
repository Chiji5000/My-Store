<?php
require "./function.php";
require __DIR__ . "/vendor/autoload.php";

$stripe_secret_key = "sk_test_51PO3Qs05iBOSLW0Liq3LM6M6uFxOBzlvdQu84OxLHcHpYGHkm8QragRKyMnSddPXUGYCher2ERjq2ZXJy9IDWJVP001SbQnIvY";

\Stripe\Stripe::setApiKey($stripe_secret_key);

$checkout_session = \Stripe\Checkout\Session::create([
    "mode" => "payment",
    "success_url" => "http://localhost/my-store/success.php",
    "line_items" => [
        [
            "quantity" => 1,
            "price_data" => [
                "currency" => "usd",
                "unit_amount" => 2000,
                "product_data" => [
                    "name" => "T-shirt"
                ]
            ]
        ]
    ]
]);

http_response_code(303);
header("Location: " . $checkout_session->url);
