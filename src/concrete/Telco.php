<?php
/**
 * Created by PhpStorm.
 * User: John Kagga
 * Date: 1/16/2017
 * Time: 8:55 PM
 */

namespace Kagga\Telco\concrete;


use Kagga\Telco\AfricasTalkingGateway;
use Kagga\Telco\AfricasTalkingGatewayException;
use Kagga\Telco\contracts\TelcoInterface;

class Telco implements TelcoInterface
{
    /**
     * @var AfricasTalkingGateway
     */
    private $gateway;

    /**
     * Gateway constructor.
     * @param AfricasTalkingGateway $gateway
     */
    public function __construct(AfricasTalkingGateway $gateway)
    {
        $this->gateway = $gateway;
    }


    /**Method to send a message
     * @param $recipient
     * @param $message
     * @return array
     */
    public function send($recipient, $message)
    {
        try {
            return $this->gateway->sendMessage($recipient, $message);
        } catch (AfricasTalkingGatewayException $e) {
            echo "Encountered an error while sending: " . $e->getMessage();
        }
    }

    /**Get an instance of the Africa is talking Gateway.
     *
     * @return AfricasTalkingGateway
     */
    public function api()
    {
        return $this->gateway;
    }
}
