<?php

namespace IBS\Types;

class Contact
{
    public const CONTACT_TYPE_REGISTRANT = 'Registrant';
    public const CONTACT_TYPE_ADMIN = 'Admin';
    public const CONTACT_TYPE_TECHNICAL = 'Technical';
    public const CONTACT_TYPE_BILLING = 'Billing';

    public const CONTACTS_ALL = [
        self::CONTACT_TYPE_REGISTRANT,
        self::CONTACT_TYPE_ADMIN,
        self::CONTACT_TYPE_TECHNICAL,
        self::CONTACT_TYPE_BILLING,
    ];

    protected $firstName;
    protected $lastName;
    protected $email;
    protected $phoneNumber;
    protected $street;
    protected $street2;
    protected $city;
    protected $countryCode;
    protected $postalCode;
    protected $organization;

    protected $type;

    public function __construct(string $type = self::CONTACT_TYPE_REGISTRANT)
    {
        $this->setType($type);
    }

    public function setType(string $type): void
    {
        $this->type = $type;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function setFirstName(string $firstName): void
    {
        $this->firstName = $firstName;
    }

    public function getFirstName(): string
    {
        return $this->firstName;
    }

    public function setLastName(string $lastName): void
    {
        $this->lastName = $lastName;
    }

    public function getLastName(): string
    {
        return $this->lastName;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setPhoneNumber(string $phoneNumber): void
    {
        $this->phoneNumber = $phoneNumber;
    }

    public function getPhoneNumber(): string
    {
        return $this->phoneNumber;
    }

    public function setStreet(string $street): void
    {
        $this->street = $street;
    }

    public function getStreet(): string
    {
        return $this->street;
    }

    public function setStreet2(string $street2): void
    {
        $this->street2 = $street2;
    }

    public function getStreet2(): string
    {
        return $this->street2;
    }

    public function setCity(string $city): void
    {
        $this->city = $city;
    }

    public function getCity(): string
    {
        return $this->city;
    }

    public function setCountryCode(string $countryCode): void
    {
        $this->countryCode = $countryCode;
    }

    public function getCountryCode(): string
    {
        return $this->countryCode;
    }

    public function setPostalCode(string $postalCode): void
    {
        $this->postalCode = $postalCode;
    }

    public function getPostalCode(): string
    {
        return $this->postalCode;
    }

    public function setOrganization(string $organization): void
    {
        $this->organization = $organization;
    }

    public function getOrganization(): string
    {
        return $this->organization;
    }

    public function toArray(): array
    {
        $result = [];
        $result[$this->getType().'_FirstName'] = $this->getFirstName();
        $result[$this->getType().'_LastName'] = $this->getLastName();
        $result[$this->getType().'_Email'] = $this->getEmail();
        $result[$this->getType().'_PhoneNumber'] = $this->getPhoneNumber();
        $result[$this->getType().'_Street'] = $this->getStreet();
        if ($this->getStreet2()) {
            $result[$this->getType().'_Street2'] = $this->getStreet2();
        }
        $result[$this->getType().'_City'] = $this->getCity();
        $result[$this->getType().'_CountryCode'] = $this->getCountryCode();
        $result[$this->getType().'_PostalCode'] = $this->getPostalCode();
        if ($this->getOrganization()) {
            $result[$this->getType().'_Organization'] = $this->getOrganization();
        }

        return $result;
    }
}