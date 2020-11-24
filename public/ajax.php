<?php 
    require_once __DIR__. "/../autoload/autoload.php";
    $class_name = $_POST['data'];
    $sql = "select * from class where name like '$class_name%' ";
    $class = $db -> fetchAllCondition('class',"name like '$class_name%'");
    if(count($class)>0){
        ?>
        
        <?php foreach ($class as $item): ?>
        <a href="stream.php?id=<?php echo $item['id']?>" style="text-decoration: none; color:black">
                <div class="classcard col-xl-3 col-lg-3 col-md-4 col-sm-6 col-6">
                    <div class="cell">

                        <div class="class-inf">
                        <div>
                            <h1 class="class-title text-left ml-3 mb-1"> <?php echo $item['name'] ?> </h1>
                        </div>
                            <div class="text-left ml-3 mt-0"><img src="<?php echo base_url() ?>/public/uploads/class/<?php echo $item['image'] ?>" class="avatar" style="width:13%; border-radius: 50%"> <?php $item['teacher'] ?><?php echo $item['teacher'] ?></div>
                            <a href="edit-class.php?id=<?php echo $item['id']?>"><i class="editclassroom fas fa-pen text-dark"></i></a>
                            <a href="delete-class.php?id=<?php echo $item['id']?>"><i class="editclassroom far fa-trash-alt text-dark"></i></a>
                        </div>

                        <div class="class-main p-2">
                            <p class="title"> <?php echo $item['subject'] ?></p>
                        </div>

                        <div class="class-footer ">
                            <span class="circle">
                                <div class="work-icon">
                                    <i class="fa fa-user-o " aria-hidden="true"></i>
                                </div>
                            </span>

                            <span class="circle">
                                <div class="folder-icon">
                                    <i class="fa fa-folder-o" aria-hidden="true"></i>
                                </div>
                            </span>
                        </div>
                    </div>
                </div>
                </a>
        <?php endforeach ?>
        
        <?php
    }
    else{
        echo "data not found";
    }
    
?>
