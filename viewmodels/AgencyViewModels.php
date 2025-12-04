<?php
require_once 'models/Agency.php';

class AgencyViewModel
{
    private $agency;

    public function __construct()
    {
        $this->agency = new Agency();
    }

    public function getAgencyList()
    {
        return $this->agency->getAll();
    }

    public function getAgencyById($id)
    {
        return $this->agency->getById($id);
    }

    public function addAgency($name, $country)
    {
        return $this->agency->create($name, $country);
    }

    public function updateAgency($id, $name, $country)
    {
        return $this->agency->update($id, $name, $country);
    }

    public function deleteAgency($id)
    {
        return $this->agency->delete($id);
    }
}
