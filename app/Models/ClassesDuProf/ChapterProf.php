<?php

// models/ChapterProf.php

class ChapterProf
{
    private $id;
    private $title;
    private $description;
    private $image; 
    private $choices;

    // Constructor accepts database connection as a parameter
    public function __construct($id, $title, $description, $image, $choices)
    {
        $this->id = $id;
        $this->title = $title;
        $this->description = $description;
        $this->image = $image; 
        $this->choices = $choices;
    }

    // Getters for the properties
    public function getId()
    {
        return $this->id;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function getImage()
    {
        return $this->image; 
    }

    public function getChoices()
    {
        return $this->choices;
    }
    
}
?>