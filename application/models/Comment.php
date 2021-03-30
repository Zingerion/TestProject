<?php

namespace fb\classes;

class Comment extends Base
{
    public $name, $email, $text, $date, $path_to_picture;

    public function __construct($name, $email, $text)
    {
        parent::__construct();
        $this->name = $name;
        $this->email = $email;
        $this->text = $text;
        //$this->date = new Date();
    }

    public function saveToDB()
    {
        $condition = 'name = ' . $this->id . ' OR ' . 'email = ' . $this->id;
        parent::insert('*', 'messages', $condition);
    }

    public function getAllMessages()
    {
        $condition = 'senderId = ' . $this->id . ' OR ' . 'receiverId = ' . $this->id;
        return parent::select('*', 'messages', $condition);
    }

    public function getFriends()
    {
        if (count($this->messages) != null) {
            foreach ($this->messages as $message) {
                if ($message['senderId'] != $this->id) {
                    if (in_array($message['senderId'], $this->friends) == 0) {
                        array_push($this->friends, $message['senderId']);
                    }
                } elseif ($message['receiverId'] != $this->id) {
                    if (in_array($message['receiverId'], $this->friends) == 0) {
                        array_push($this->friends, $message['receiverId']);
                    }
                }
            }
        }
        //print_r($this->friends);
    }

    public function prepareDialogs()
    {
        if (count($this->messages) != null) {
            foreach ($this->friends as $friend) {
                array_push($this->dialogs, array('friend' => $friend, 'messages' => array()));
            }
            foreach ($this->messages as $message) {
                if ($message['senderId'] != $this->id) {
                    $i = 0;
                    foreach ($this->dialogs as $dialog) {
                        if ($dialog['friend'] == $message['senderId']) {
                            array_push($this->dialogs[$i]['messages'], array('message' => $message['message'], 'tome' => 1));
                            $i++;
                        }
                    }
                } elseif ($message['receiverId'] != $this->id) {
                    $i = 0;
                    foreach ($this->dialogs as $dialog) {
                        if ($dialog['friend'] == $message['receiverId']) {
                            array_push($this->dialogs[$i]['messages'], array('message' => $message['message'], 'tome' => 0));
                            $i++;
                        }
                    }
                }
            }
        }
        //print_r($this->dialogs);
    }
}
