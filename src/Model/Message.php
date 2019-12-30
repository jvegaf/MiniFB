<?php


class Message
{
    private $id;
    private $content;
    private $important;
    private $pinned;
    private $published;
    private $user;

    /**
     * Message constructor.
     * @param $id
     * @param $content
     * @param $important
     * @param $pinned
     * @param $published
     * @param $user
     */

    public function __construct($id, $content, $important, $pinned, $published, $user)
    {
        $this->id = $id;
        $this->content = $content;
        $this->important = $important;
        $this->pinned = $pinned;
        $this->published = $published;
        $this->user = $user;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getContent()
    {
        return $this->content;
    }

    public function getImportant()
    {
        return $this->important;
    }

    public function getPinned()
    {
        return $this->pinned;
    }

    public function getPublished()
    {
        return $this->published;
    }

    public function getUser()
    {
        return $this->user;
    }

}