<?php


class Response
{
    private $id;
    private $content;
    private $published;
    private $user;
    private $messageId; // id del mensaje al que esta respondiendo

    public function __construct($id, $content, $published, $user, $messageId)
    {
        $this->id = $id;
        $this->content = $content;
        $this->published = $published;
        $this->user = $user;
        $this->messageId = $messageId;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getContent()
    {
        return $this->content;
    }

    public function getPublished()
    {
        return $this->published;
    }

    public function getUser()
    {
        return $this->user;
    }

    public function getMessageId()
    {
        return $this->messageId;
    }
}
