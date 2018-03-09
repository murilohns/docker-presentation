<?php
require("../pagarme-php/Pagarme.php");
require "../vendor/autoload.php";

$version = 3;

$api_key = "ak_test_vZz7BmZw9qfT6NJwk9Kubx2Q1odITG";

if(isset($_POST['card_hash']))
    $card_hash = $_POST['card_hash'];
if(isset($_POST['pagarme']['card_hash']))
    $card_hash = $_POST['pagarme']['card_hash'];

if(isset($_POST['token']))
    $token = $_POST['token'];
if(isset($_POST['pagarme']['token']))
    $token = $_POST['pagarme']['token'];

$amount = 1000;
$plan_id = "246102";

if($version == 2){
    Pagarme::setApiKey($api_key);

    if(isset($card_hash)){
        $plan = PagarMe_Plan::findById($plan_id); //encontra um plano

        $subscription = new PagarMe_Subscription(array(
            "plan" => $plan, //cria uma assinatura no plano encontrado
            "card_hash" => $card_hash,
            'customer' => array(
                'email' => 'murilo@checkout.com',
                'document_number' => '07844221259'
            ))
        );

        $subscription->create();

        echo "Subscription ID: " . $subscription->id;
    }else{

        $transaction = PagarMe_Transaction::findById($token);

        $transaction->capture($amount); 

        $transaction = PagarMe_Transaction::findById($transaction->id);

        echo "Transaction ID: ".$transaction->id."\n";
        echo "Status: ".$transaction->status."\n";
    }
}

if($version == 3){
    $pagarMe = new \PagarMe\Sdk\PagarMe($api_key);

    if(isset($card_hash)){
        $card = $pagarMe->card()->createFromHash($card_hash);
        $plan = $pagarMe->plan()->get($plan_id);

        $customer = new \PagarMe\Sdk\Customer\Customer(
            [
                'name' => 'John Dove',
                'email' => 'john@site.com',
                'document_number' => '09130141095',
                'address' => new \PagarMe\Sdk\Customer\Address([
                    'street'        => 'rua teste',
                    'street_number' => 42,
                    'neighborhood'  => 'centro',
                    'zipcode'       => '01227200',
                    'complementary' => 'Apto 42',
                    'city'          => 'São Paulo',
                    'state'         => 'SP',
                    'country'       => 'Brasil'

                ]),
                'phone' => new \PagarMe\Sdk\Customer\Phone([
                    'ddd'    => "15",
                    'number' =>"987523421"

                ]),
                'born_at' => '15021994',
                'sex' => 'M'

            ]

        ); 

        $subscription = $pagarMe->subscription()->createCardSubscription(
            $plan,
            $card,
            $customer,
            '',
            ['idProduto' => 123456]
        );

        echo $subscription->getId();
        echo $subscription->getStatus();
    }else{ 
        $transaction = $pagarMe->transaction()->get($token);
        $captureAmount = $amount;

        $pagarMe->transaction()->capture($transaction, $captureAmount);

        $transaction = $pagarMe->transaction()->get($transaction->getId());

        echo $transaction->getId()."\n";
        echo $transaction->getStatus()."\n";
    }
}

?>
