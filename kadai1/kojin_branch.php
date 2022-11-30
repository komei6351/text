<?php

if(isset($_POST['disp'])==true) {

    if(isset($_POST['kojinid'])==false) {
        header('Location: kojin_ng.php');
        exit()."\n";
    }

    $kojin_id=$_POST['kojinid'];
    header('Location: kojin_disp.php?kojinid='.$kojin_id);
    exit()."\n";
}

if(isset($_POST['add'])==true) {
    header('Location: kojin_add.php');
    exit()."\n";
}

if(isset($_POST['edit'])==true) {

    if(isset($_POST['kojinid'])==false) {
        header('Location: kojin_ng.php');
        exit()."\n";
    }

    $kojin_id=$_POST['kojinid'];
    header('Location: kojin_edit.php?kojinid='.$kojin_id);
    exit()."\n";
}

if(isset($_POST['delete'])==true) {

    if(isset($_POST['kojinid'])==false) {
        header('Location: kojin_ng.php');
        exit()."\n";
    }
    
    $kojin_id=$_POST['kojinid'];
    header('Location: kojin_delete.php?kojinid='.$kojin_id);
    exit()."\n";
}

?>