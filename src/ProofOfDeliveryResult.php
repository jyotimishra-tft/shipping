<?php
/**
 * Created by PhpStorm.
 * User: Bro
 * Date: 12.06.2018
 * Time: 15:15
 */

namespace Vinnia\Shipping;


class ProofOfDeliveryResult
{
    const STATUS_SUCCESS = 100;
    const STATUS_ERROR = 500;

    /**
     * @var int
     */
    public $status;

    /**
     * @var string
     */
    public $body;

    /**
     * @var string|null
     */
    public $document;

    /**
     * ProofOfDeliveryResult constructor.
     * @param int $status
     * @param string $body
     * @param null|string $document
     */
    function __construct(int $status, string $body, ?string $document = null)
    {
        $this->status = $status;
        $this->body = $body;
        $this->document = $document;
    }
}