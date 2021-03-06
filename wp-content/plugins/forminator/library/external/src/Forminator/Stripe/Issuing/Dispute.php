<?php

namespace Forminator\Stripe\Issuing;

/**
 * Class Dispute
 *
 * @property string $id
 * @property string $object
 * @property int $amount
 * @property int $created
 * @property string $currency
 * @property string $disputed_transaction
 * @property \Forminator\Stripe\StripeObject $evidence
 * @property bool $livemode
 * @property \Forminator\Stripe\StripeObject $metadata
 * @property string $reason
 * @property string $status
 *
 * @package Forminator\Stripe\Issuing
 */
class Dispute extends \Forminator\Stripe\ApiResource
{
    const OBJECT_NAME = 'issuing.dispute';

    use \Forminator\Stripe\ApiOperations\All;
    use \Forminator\Stripe\ApiOperations\Create;
    use \Forminator\Stripe\ApiOperations\Retrieve;
    use \Forminator\Stripe\ApiOperations\Update;
}
