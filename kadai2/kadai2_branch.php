<?php

if(isset($_POST['disp'])==true) {

    if(isset($_POST['kadai2id'])==false) {
        header('Location: kadai2_ng.php');
        exit()."\n";
    }

    $kadai2_id=$_POST['kadai2id'];
    header('Location: kadai2_disp.php?kadai2id='.$kadai2_id);
    exit()."\n";
}

if(isset($_POST['add'])==true) {
    header('Location: kadai2_add.php');
    exit()."\n";
}

if(isset($_POST['edit'])==true) {

    if(isset($_POST['kadai2id'])==false) {
        header('Location: kadai2_ng.php');
        exit()."\n";
    }

    $kadai2_id=$_POST['kadai2id'];
    header('Location: kadai2_edit.php?kadai2id='.$kadai2_id);
    exit()."\n";
}

if(isset($_POST['delete'])==true) {

    if(isset($_POST['kadai2id'])==false) {
        header('Location: kadai2_ng.php');
        exit()."\n";
    }
    
    $kadai2_id=$_POST['kadai2id'];
    header('Location: kadai2_delete.php?kadai2id='.$kadai2_id);
    exit()."\n";
}

?>