<?php

// models/Chapter.php

class Chapter
{
    private $id;
    private $title;
    private $description;
    private $image; 
    private $choices;
    private $db;

    // Constructor accepts database connection as a parameter
    public function __construct($id, $title, $description, $image, $choices, $db)
    {
        $this->id = $id;
        $this->title = $title;
        $this->description = $description;
        $this->image = $image; 
        $this->choices = $choices;
        $this->db = $db;
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

    // Function to get all chapters from the database
    public function getAllChapters()
    {
        // Make sure the database connection is valid
        if ($this->db instanceof PDO) {
            $query = $this->db->prepare("SELECT id, title FROM chapters ORDER BY id ASC");
            $query->execute();
            return $query->fetchAll(PDO::FETCH_ASSOC);
        } 
    }
}
?>
