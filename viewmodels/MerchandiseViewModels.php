<?php
require_once 'models/Merchandise.php';

class MerchandiseViewModel
{
    private $merch;

    public function __construct()
    {
        $this->merch = new Merchandise();
    }

    public function getMerchList()
    {
        return $this->merch->getAll();
    }

    public function getMerchById($id)
    {
        return $this->merch->getById($id);
    }

    public function addMerch($vtuber_id, $item_name, $price)
    {
        return $this->merch->create($vtuber_id, $item_name, $price);
    }

    public function updateMerch($id, $vtuber_id, $item_name, $price)
    {
        return $this->merch->update($id, $vtuber_id, $item_name, $price);
    }

    public function deleteMerch($id)
    {
        return $this->merch->delete($id);
    }
}
