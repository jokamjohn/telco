<?php
/**
 * Created by PhpStorm.
 * User: jokamjohn
 * Date: 3/7/2016
 * Time: 11:38 PM
 */

namespace Kagga\Telco\contracts;



interface TelcoInterface
{
    /**Method to send a message
     * @param $recipient
     * @param $message
     * @return
     */
    public function send($recipient, $message);

    /**Get an instance of the Africa is talking Gateway.
     *
     * @return mixed
     */
    public function api();
}