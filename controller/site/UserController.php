<?php
if (!defined('PATH_SYSTEM'))
  die("Bad request!");

function indexAction(){
  require_once PATH_MODEL . '/User.php';
  require_once PATH_SYSTEM . '/core/view/view.php';
  $user_id = $_SESSION['user']['id'];
  $data = [];
  $data = getUserProfilesByIdUser($user_id);
  if (empty($data)){
    $data = [
      'user_id' => $user_id,
      'acc_full_name' => "",
      'acc_avatar' => "no-img.jpg",
      'acc_bio' => "",
      'acc_phone_number' => "",
      'acc_date_of_birth' => "",
      'acc_address' => "",
    ];
  }
  // echo "<pre>";
  // print_r($data);
  // die;
  loadView('master', 'user/profile', $data);

}

function editAction(){
  $data = [];
  require_once PATH_SYSTEM . '/core/view/view.php';
  require_once PATH_MODEL . '/User.php';
  $user_id = $_SESSION['user']['id'];
  $data = getUserProfilesByIdUser($user_id);
  // if (empty($data)){ $test = "Không có dữ liệu"; }else{ $test = "Có dữ liệu"; }
  if (empty($data)){ 
    $data = [
      'user_id' => $user_id,
      'acc_full_name' => "",
      'acc_avatar' => "no-img.jpg",
      'acc_bio' => "",
      'acc_phone_number' => "",
      'acc_date_of_birth' => "",
      'acc_address' => "",
    ]; }
  // echo "<pre>";
  // print_r($data);
  // die;
  loadView('master', 'user/profile-edit', $data);
}

function storeAction(){
  require_once PATH_MODEL . '/User.php';
  require_once PATH_SYSTEM . '/core/view/view.php';
  $data = [];
  $user_id = $_SESSION['user']['id'];

  $uploadDir = 'public/uploads/avatar/';
  $uniqueName = uniqid() . '-' . basename($_FILES['acc_image']['name']);
  $tmp_name = $_FILES['acc_image']['tmp_name'];
  move_uploaded_file($tmp_name, $uploadDir.$uniqueName);

  $data = [
    'user_id' => $user_id,
    'acc_avatar' => $uniqueName,
    'acc_full_name' => $_POST['acc_full'],
    'acc_date_of_birth' => $_POST['acc_dob'],
    'acc_bio' => $_POST['acc_bio'],
    'acc_phone_number' => $_POST['acc_phone'],
    'acc_address' => $_POST['acc_address'],
  ];

  if (empty(getUserProfilesByIdUser($user_id))){
    storeProfile($data);
  }else{
    updateProfileByUserId($user_id, $data);
  }

  $_SESSION['user']['avatar'] = $uniqueName;

    // echo "<pre>";
    // print_r($data);
    // die;
  header("location:index.php?c=user&a=index");
  // loadView('master', 'user/profile');
}

function changePasswordAction(){
  require_once PATH_MODEL . '/User.php';
  require_once PATH_SYSTEM . '/core/view/view.php';
  $vcpass = $_POST['cpass'];
  $user_id = $_SESSION['user']['id'];
  $user_data = getUserById($user_id);
  if ($vcpass != $user_data['user_pass']){
    $_SESSION['msg']['cpass'] = "Mật khẩu cũ không đúng!";
    header("location:index.php?c=user&a=edit");
  }else{
    $data = [
      'user_pass' => $_POST['npass']
    ];
    updateById($_GET['id'], $data);
    $_SESSION['msg']['changePwSs'] = "Đổi mật khẩu thành công!";
    header("location:index.php?c=user&a=index");
  }
}

?>