<?php

namespace Payments\Request;

use Payments\Credential\AccountSecretCredential;
use Payments\Response\TransactionResponse;

/**
 * Class CheckRequest
 * @package WayForPay\SDK\Request
 * @method CheckResponse send()
 */
class TransactionCreateRequest extends ApiRequest
{
    /**
     * @var string
     */
    private $orderReference;

    public function __construct(AccountSecretCredential $credential, $orderReference)
    {
        parent::__construct($credential);

        $this->orderReference = $orderReference;
    }

    public function getRequestSignatureFieldsValues()
    {
        return array_merge(parent::getRequestSignatureFieldsValues(), array(
            'orderReference' => $this->orderReference,
        ));
    }

    public function getResponseSignatureFieldsRequired()
    {
        $res = $this->orderReference->getResult();
        $paymentSlug = $res->get('payment');

        $point = config('payments.'.$paymentSlug.'.point');

        $mass1 = [$res->get('transaction_id'),request()->getClientIp() , 'callback'];
        $mass2 = [$res->get('transaction_id'),request()->getClientIp() , 'success'];
        $mass3 = [$res->get('transaction_id'),request()->getClientIp() , 'fail'];

        $hash1 = base64_encode(implode(',' , $mass1));
        $hash2 = base64_encode(implode(',' , $mass2));
        $hash3 = base64_encode(implode(',' , $mass3));

        $point ['callback_url'] = env('APP_URL').'/returnedPass/' . $hash1;
        $point ['success_url'] = env('APP_URL').'/turnedGreat/' . $hash2;
        $point ['fail_url'] = env('APP_URL').'/notPass/' . $hash3;


        return array(
            'locale' => 'ru',
            'external_transaction_id' => $res->get('transaction_id'),
            'customer_ip_address' => request()->getClientIp(),
            'amount' => (int)$res->get('price'),
            'amount_currency' => $res->get('currency'),
            'service_id' => config('payments.'.$paymentSlug.'.service_id.on'),
            'account_id' => config('payments.'.$paymentSlug.'.acc'),
            'wallet_id' => config('payments.'.$paymentSlug.'.wallet'),
            'point' => $point,
        );
    }

    public function getTransactionType()
    {
        return 'CHECK_STATUS';
    }

    public function getTransactionData()
    {
        return parent::getTransactionData();

    }

    public function getResponseClass()
    {
        return TransactionResponse::getClass();
    }
    public function getSlug()
    {
        return '/transaction/create';
    }
}
