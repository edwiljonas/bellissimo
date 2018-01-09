<?php

class knack_start{

    private $name = 'knack';
    private $new_version = KNACK_VERSION;
    private $old_version = NULL;

    public function __construct(){

        $this->old_version = get_option( 'knack_theme_version' );

        if(version_compare($this->old_version,$this->new_version,'<')){
            $update = new knack_update_theme($this->name,$this->new_version,$this->old_version);
            update_option( 'knack_theme_version', $this->new_version );
            $update->knack_update_theme();
        }

    }

}