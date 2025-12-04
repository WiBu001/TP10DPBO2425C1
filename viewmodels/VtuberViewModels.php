<?php
require_once 'models/Vtuber.php';

class VtuberViewModel
{
    private $vtuber;

    public function __construct()
    {
        $this->vtuber = new Vtuber();
    }

    public function getVtuberList()
    {
        return $this->vtuber->getAll();
    }

    public function getVtuberById($id)
    {
        return $this->vtuber->getById($id);
    }

    public function addVtuber($name, $debut_date, $agency_id)
    {
        return $this->vtuber->create($name, $debut_date, $agency_id);
    }

    public function updateVtuber($id, $name, $debut_date, $agency_id)
    {
        return $this->vtuber->update($id, $name, $debut_date, $agency_id);
    }

    public function deleteVtuber($id)
    {
        return $this->vtuber->delete($id);
    }
}
