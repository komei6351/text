<?php

if(isset($_POST['disp'])==true) {

    if(isset($_POST['kojincode'])==false) {
        header('Location: kojin_ng.php');
        exit()."\n";
    }

    $kojin_code=$_POST['kojincode'];
    header('Location: kojin_disp.php?kojincode='.$kojin_code);
    exit()."\n";
}

if(isset($_POST['add'])==true) {
    header('Location: kojin_add.php');
    exit()."\n";
}

if(isset($_POST['edit'])==true) {

    if(isset($_POST['kojincode'])==false) {
        header('Location: kojin_ng.php');
        exit()."\n";
    }

    $kojin_code=$_POST['kojincode'];
    header('Location: kojin_edit.php?kojincode='.$kojin_code);
    exit()."\n";
}

if(isset($_POST['delete'])==true) {

    if(isset($_POST['kojincode'])==false) {
        header('Location: kojin_ng.php');
        exit()."\n";
    }
    
    $kojin_code=$_POST['kojincode'];
    header('Location: kojin_delete.php?kojincode='.$kojin_code);
    exit()."\n";
}

?>