<?php

class knack_update_theme{

    private $theme_name;
    private $theme_version;
    private $theme_old_version;
    private $object_manager;

    public function __construct($theme_name,$theme_version,$theme_old_version){

        $this->theme_name = $theme_name;
        $this->theme_version = $theme_version;
        $this->theme_old_version = $theme_old_version;
        $this->object_manager = new knack_update_object();

    }

    public function knack_update_theme(){

        $this->object_manager->knack_update_database_objects();

    }

}