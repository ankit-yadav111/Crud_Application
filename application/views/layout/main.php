<?php
    $this->load->view("mainHeader", array('categories'=>$Category));
    $this->load->view("welcome",array('blogs'=>$blogs));
?>