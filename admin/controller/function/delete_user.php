<?php

   require $_SERVER['DOCUMENT_ROOT'].'/web/admin/model/m_user.php';
if(isset( $_POST['id'] )) {
    $id = $_POST['id'];
    $user = new M_user();
    $result = $user->deleteUser($id);
    return $result;
}
?>