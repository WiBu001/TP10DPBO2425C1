<?php
require_once 'models/Stream.php';

class StreamViewModel
{
    private $stream;

    public function __construct()
    {
        $this->stream = new Stream();
    }

    public function getStreamList()
    {
        return $this->stream->getAll();
    }

    public function getStreamById($id)
    {
        return $this->stream->getById($id);
    }

    public function addStream($vtuber_id, $title, $stream_date)
    {
        return $this->stream->create($vtuber_id, $title, $stream_date);
    }

    public function updateStream($id, $vtuber_id, $title, $stream_date)
    {
        return $this->stream->update($id, $vtuber_id, $title, $stream_date);
    }

    public function deleteStream($id)
    {
        return $this->stream->delete($id);
    }
}
