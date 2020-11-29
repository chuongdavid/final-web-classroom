<?php 
    require_once __DIR__. "/../autoload/autoload.php";
    $id = $_GET['id'];
    $EditAnnouncement = $db -> fetchOne('announcement',"id = '".$id."'");
    $uploaded_files =$db -> fetchAllCondition('file_upload_announce',"id_announce = '".$id."'");
    
    if(empty($EditAnnouncement)){
        $_SESSION['error'] = "Announcement does not exist";
        header('Location:index-giaovien.php');
    }
    //create announcement
    if(isset($_POST['news']) && isset($_POST['title'])){
        $data_announcement = [
                'news'=>$_POST['news'],
                'title' => $_POST['title']
        ];
        // if(isset($_FILES['file'])){
        //     $fileCount = count($_FILES['file']['name']);
        //     if($fileCount>0){
        //         var_dump($fileCount);
        //         $delete_to_update = $db -> deleteQuery('file_upload_announce',"id_announce = '".$id."'");
        //         for($i=0;$i<$fileCount;$i++){
        //             $file_name = $_FILES['file']['name'][$i];
        //             $file_tmp = $_FILES['file']['tmp_name'][$i];
        //             $file_type = $_FILES['file']['type'][$i];
        //             $file_error = $_FILES['file']['error'][$i];
        //             if($file_error == 0){
        //                 $part = ROOT ."announcement/";
        //                 $data_file_up =[ 'id_announce' => $id,
        //                                 'name' => $file_name
        //             ];  
        //                 move_uploaded_file($file_tmp,$part.$file_name);
        //                 $id_insert = $db -> insert("file_upload_announce",$data_file_up);
        //             }
        //             else{
        //                 $numberError = "error file number:".$i;
        //                 $error = [ $numberError => $i ];
        //             }
        //         }
        //     }
            
        // }
        $update_announce = $db -> update("announcement",$data_announcement,array('id'=>$id));
        if(count($update_announce>0)){
            $_SESSION['success'] = "Update announcemnet successfully";
            //header("Location:stream.php?id=".$EditAnnouncement['id_class']."");  
        }
        else{
            $_SESSION['error'] = "Nothing change";
            //header("Location:stream.php?id=".$EditAnnouncement['id_class'].""); 
        }
        
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        
        <!--title-->
        <title>Classroom</title>
        
        <!--css file-->
        <link href="css/style.css" rel="stylesheet" type="text/css" />

        <!--js file-->
        <script src="main.js"></script>

        <!--Bootstrap 4-->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <script src='https://kit.fontawesome.com/a076d05399.js'></script>

        <!--font-awnsome-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    </head>
<body>
            <form method="post" action="#" onsubmit= "return validateInputannouncement()" enctype="multipart/form-data" >
                <div class="formcode">
                    <div class="form-inf">
                        <label> <p id="assignmenclasswork"><b>Edit your announcement</b> </p></label>
                        <hr class="line">
                        
                        <h4>Title</h4>
                        <input name ="title" id="stream-title" type="text" placeholder="Title" value="<?php echo $EditAnnouncement['title'] ?>"> </br></br>
                        <h6>What's on your mind</h6>
                        <textarea name="news" class="class-inform-textarea" id="stream-announce" placeholder="Type here"><?php echo $EditAnnouncement['news'] ?></textarea></br></br>
                        <b> Choose picture</b></br>
                        <input type="file" id="fileanh" name="file[]" multiple  >
                        </br> </br>
                        <p class="error-notification noti-stream" id = "error-message-stream" ></p>
                        
                        <label for="showhiddenstreamcontent"> <button class="btn btn-primary">Update</button></label>
                        <a href="stream.php?id=<?php echo $EditClass['id']?>" class="btn btn-warning">Cancel</a>
                        <hr class="line"></br>
                    </div>    
                </div> 
            </form>
</body>