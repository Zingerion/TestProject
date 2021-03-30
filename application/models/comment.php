<?php

namespace fb\classes;

class comment extends base
{
    public $name, $email, $text, $file;

    public function __construct($name, $email, $text, $file = null)
    {
        parent::__construct();
        $this->name = $name;
        $this->email = $email;
        $this->text = $text;
        $this->file = $file;
    }

    public function saveToDB()
    {
        $values = "'" . $this->name . "' , '" . $this->email . "' , '" . $this->text . "' , '" . $this->file . "'";
        parent::insert('comment (name, email, text, Img)', $values);
    }
}
