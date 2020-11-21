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
        <!--navbar-->
        <nav class="navbar navbar-expand bg-primary navbar-dark p-0 sticky-top">
            <ul class="navbar-nav w-100">
                <!--sidenav-->
                <div id="mySidenav" class="sidenav p-0">
                    <div class="text-right">
                        <i class="fa fa-times-circle fa-2x opacity color" aria-hidden="true" onclick="closeNav()"></i>
                    </div>
                    <a href="#" class="sidenav-item">
                        <div class="class-title ">
                            Môn học
                        </div>
                        <div>
                            Thay A
                        </div>
                    </a>
                    <a href="#" class="sidenav-item">Services</a>
                    <a href="#" class="sidenav-item">Clients</a>
                    <a href="#" class="sidenav-item">Contact</a>
                </div>

                <span onclick="openNav()"><img class="logo" src="image/logov2.png"></span>

                <!--left nav-->
                <li class="nav-item active">
                    <a class="nav-link" href="index.html">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">To-do</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Calendar</a>
                </li>

                <!--right nav-->
                <li class="nav-item ml-auto mr-0"> 
                    <a class="nav-link" href="#">
                        <label for="search"><i class="fa fa-search fa-2x"></i> </label> 
                        <input type="text" id="search">
                    </a>
                </li>

                <li class="nav-item  ml-2 mr-2">
                    <a class="nav-link" href="#">
                        <label for="showaddjoinclassroom"><i class="fa fa-users fa-2x"></i> </label>
                    </a>
                </li>
                <li class="nav-item ml-2 mr-2">
                    <a class="nav-link" href="#">
                        <label for="showaddjoinclassroom"><i class="fa fa-plus fa-2x"></i> </label>
                    </a>
                </li>
            </ul>
        </nav>

        <!--add class form-->
        <div class="form-popup full-height" id="myForm">
            <form action="/action_page.php" class="form-container">
                <h1>Login</h1>

                <label for="email"><b>Email</b></label>
                <input type="text" placeholder="Enter Email" name="email" required>

                <label for="psw"><b>Password</b></label>
                <input type="password" placeholder="Enter Password" name="psw" required>

                <button type="submit" class="btn">Login</button>
                <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
            </form>
        </div>

        <!--classes-->
        <div class=" index container m-0 ">
            <div class="row">
                <div class="classcard col-xl-3 col-lg-3 col-md-4 col-sm-6 col-6">
                    <div class="cell">

                        <div class="class-inf">
                        <div>
                            <h1 class="class-title text-left ml-3 mb-1">Môn học </h1>
                        </div>
                            <div class="text-left ml-3 mt-0">Thầy A</div>
                            <i class="editclassroom fas fa-pen"></i>
                             <i class="editclassroom far fa-trash-alt"></i>
                        </div>

                        <div class="class-main p-2">
                            <p class="title"> Jane Dode</p>

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

                <div class="classcard col-xl-3 col-lg-3 col-md-4 col-sm-6 col-6">
                    <div class="cell">

                        <div class="class-inf">
                        <div>
                            <h1 class="class-title text-left ml-3 mb-1">Môn học </h1>
                        </div>
                            <div class="text-left ml-3 mt-0">Thầy A</div>
                            <i class="editclassroom fas fa-pen"></i>
                             <i class="editclassroom far fa-trash-alt"></i>
                        </div>

                        <div class="class-main p-2">
                            <p class="title"> Jane Dode</p>

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
                </div><div class="classcard col-xl-3 col-lg-3 col-md-4 col-sm-6 col-6">
                    <div class="cell">

                        <div class="class-inf">
                        <div>
                            <h1 class="class-title text-left ml-3 mb-1">Môn học </h1>
                        </div>
                            <div class="text-left ml-3 mt-0">Thầy A</div>
                            <i class="editclassroom fas fa-pen"></i>
                             <i class="editclassroom far fa-trash-alt"></i>
                        </div>

                        <div class="class-main p-2">
                            <p class="title"> Jane Dode</p>

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
                </div><div class="classcard col-xl-3 col-lg-3 col-md-4 col-sm-6 col-6">
                    <div class="cell">

                        <div class="class-inf">
                        <div>
                            <h1 class="class-title text-left ml-3 mb-1">Môn học </h1>
                        </div>
                            <div class="text-left ml-3 mt-0">Thầy A</div>
                            <i class="editclassroom fas fa-pen"></i>
                             <i class="editclassroom far fa-trash-alt"></i>
                        </div>

                        <div class="class-main p-2">
                            <p class="title"> Jane Dode</p>

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
                </div><div class="classcard col-xl-3 col-lg-3 col-md-4 col-sm-6 col-6">
                    <div class="cell">

                        <div class="class-inf">
                        <div>
                            <h1 class="class-title text-left ml-3 mb-1">Môn học </h1>
                        </div>
                            <div class="text-left ml-3 mt-0">Thầy A</div>
                            <i class="editclassroom fas fa-pen"></i>
                             <i class="editclassroom far fa-trash-alt"></i>
                        </div>

                        <div class="class-main p-2">
                            <p class="title"> Jane Dode</p>

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
                </div><div class="classcard col-xl-3 col-lg-3 col-md-4 col-sm-6 col-6">
                    <div class="cell">

                        <div class="class-inf">
                        <div>
                            <h1 class="class-title text-left ml-3 mb-1">Môn học </h1>
                        </div>
                            <div class="text-left ml-3 mt-0">Thầy A</div>
                            <i class="editclassroom fas fa-pen"></i>
                             <i class="editclassroom far fa-trash-alt"></i>
                        </div>

                        <div class="class-main p-2">
                            <p class="title"> Jane Dode</p>

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
                </div><div class="classcard col-xl-3 col-lg-3 col-md-4 col-sm-6 col-6">
                    <div class="cell">

                        <div class="class-inf">
                        <div>
                            <h1 class="class-title text-left ml-3 mb-1">Môn học </h1>
                        </div>
                            <div class="text-left ml-3 mt-0">Thầy A</div>
                            <i class="editclassroom fas fa-pen"></i>
                             <i class="editclassroom far fa-trash-alt"></i>
                        </div>

                        <div class="class-main p-2">
                            <p class="title"> Jane Dode</p>

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
                <div class="classcard col-xl-3 col-lg-3 col-md-4 col-sm-6 col-6">
                    <div class="cell">

                        <div class="class-inf">
                        <div>
                            <h1 class="class-title text-left ml-3 mb-1">Môn học  </h1> 
                        </div>
                            <div class="text-left ml-3 mt-0">Thầy A</div>
                            <i class="editclassroom fas fa-pen"></i>
                             <i class="editclassroom far fa-trash-alt"></i>
                        </div>

                        <div class="class-main p-2">
                            <p class="title"> Jane Dode</p>

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
                
            </div>
                    

                
            </div>
                
                
        </div>

        </div>
        <input type ="checkbox" id="showaddjoinclassroom">

        <div class="table-add-join-class col-12">  
            <form >
                <div class="formcreate">
                    <label> <p id="assignmenclasswork"><b>Create Class</b> </p></label>
                    <hr style="width:90%; text-align:left; margin-left:10"></br>
                    <div class="class-info">
                        <input class="class-info-box" id="class-name" type = "text" placeholder="Class name (required)"></br>
                        <input class="class-info-box" id="class-section" type = "text" placeholder="Section"></br>
                        <input class="class-info-box" id="class-subject" type = "text" placeholder="Subject"></br>
                        <input class="class-info-box" id="class-room" type = "text" placeholder="Room">
                    </div>
                    </br>
                    </br></br>
                    <button class="btnform">Create</button>
                    <button class="btnform">Cancel</button>
                    
                
                </div> 
            </form>
        </div>
                <hr style="width:90%; text-align:left; margin-left:10">
                
                
                
                   
            
        </div>
    </body>
</html>