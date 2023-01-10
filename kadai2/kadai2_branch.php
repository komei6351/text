<?php

if(isset($_POST['disp'])==true) {

    if(isset($_POST['kadai2code'])==false) {
        header('Location: kadai2_ng.php');
        exit()."\n";
    }

    $kadai2_code=$_POST['kadai2code'];
    header('Location: kadai2_disp.php?kadai2code='.$kadai2_code);
    exit()."\n";
}

if(isset($_POST['add'])==true) {
    header('Location: kadai2_add.php');
    exit()."\n";
}

if(isset($_POST['edit'])==true) {

    if(isset($_POST['kadai2code'])==false) {
        header('Location: kadai2_ng.php');
        exit()."\n";
    }

    $kadai2_code=$_POST['kadai2code'];
    header('Location: kadai2_edit.php?kadai2code='.$kadai2_code);
    exit()."\n";
}

if(isset($_POST['delete'])==true) {

    if(isset($_POST['kadai2code'])==false) {
        header('Location: kadai2_ng.php');
        exit()."\n";
    }
    
    $kadai2_code=$_POST['kadai2code'];
    header('Location: kadai2_delete.php?kadai2code='.$kadai2_code);
    exit()."\n";
}

?>