<?php
namespace Derhansen\ManualDomainvalidation\Domain\Model;

/***
 *
 * This file is part of the "Manual domain validation" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 *  (c) 2017 Torben Hansen <torben@derhansen.com>
 *
 ***/

/**
 * Data
 */
class Data extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{
    /**
     * Title
     *
     * @var string
     * @validate NotEmpty
     */
    protected $title = '';

    /**
     * Email
     *
     * @var string
     * @validate NotEmpty, EmailAddress
     */
    protected $email = '';

    /**
     * Description
     *
     * @var string
     * @validate NotEmpty, StringLength(minimum=10, maximum=50)
     */
    protected $description = '';

    /**
     * Year
     *
     * @var int
     * @validate Number
     */
    protected $year;

    /**
     * Amount
     *
     * @var float
     * @validate Float
     */
    protected $amount = 0.0;

    /**
     * paid
     *
     * @var bool
     */
    protected $paid = false;

    /**
     * Returns the title
     *
     * @return string $title
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Sets the title
     *
     * @param string $title
     * @return void
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * Returns the description
     *
     * @return string $description
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Sets the description
     *
     * @param string $description
     * @return void
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * Returns the year
     *
     * @return int $year
     */
    public function getYear()
    {
        return $this->year;
    }

    /**
     * Sets the year
     *
     * @param int $year
     * @return void
     */
    public function setYear($year)
    {
        $this->year = $year;
    }

    /**
     * Returns the amount
     *
     * @return float $amount
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * Sets the amount
     *
     * @param float $amount
     * @return void
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;
    }

    /**
     * Returns the paid
     *
     * @return bool $paid
     */
    public function getPaid()
    {
        return $this->paid;
    }

    /**
     * Sets the paid
     *
     * @param bool $paid
     * @return void
     */
    public function setPaid($paid)
    {
        $this->paid = $paid;
    }

    /**
     * Returns the boolean state of paid
     *
     * @return bool
     */
    public function isPaid()
    {
        return $this->paid;
    }

    /**
     * Returns the email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Sets the email
     *
     * @param string $email
     * @return void
     */
    public function setEmail(string $email)
    {
        $this->email = $email;
    }
}
