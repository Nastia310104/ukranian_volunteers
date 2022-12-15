<?php

namespace App\Entity;

use App\Interfaces\IdInterface;
use App\Traits\IdTrait;
use DateTime;

class Shipment implements IdInterface
{
    use IdTrait;

    /**
     * @var DateTime
     */
    public DateTime $sendDate;

    /**
     * @return DateTime
     */
    public function getSendDate(): DateTime
    {
        return $this->sendDate;
    }

    /**
     * @param DateTime $sendDate
     */
    public function setSendDate(DateTime $sendDate): void
    {
        $this->sendDate = $sendDate;
    }
}