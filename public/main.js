/* Set the width of the side navigation to 250px and the left margin of the page content to 250px and add a black background color to body */
function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
  document.getElementById("main").style.marginLeft = "250px";
  document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
}

/* Set the width of the side navigation to 0 and the left margin of the page content to 0, and the background color of body to white */
function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
  document.getElementById("main").style.marginLeft = "0";
  document.body.style.backgroundColor = "white";
}

function openForm() {
  document.getElementById("myForm").style.display = "block";
}

function closeForm() {
  document.getElementById("myForm").style.display = "none";
}
function closeForm(string) {
  document.getElementById(string).style.display = "none";
}

//Function Login page
function hideError() {
  let errorField = document.getElementById("error-message");
  errorField.style.display = "none";
  console.log("Hide error");
}

function displayError(message) {
  let errorField = document.getElementById("error-message");
  errorField.style.display = "";
  errorField.innerHTML = message;
}
window.addEventListener("load", () => {
  hideError();
});

function validateInput() {
  try {
    let emailField = document.getElementById("email");
    let passwordField = document.getElementById("psw");
    let errorField = document.getElementById("error-message");

    let email = emailField.value;
    let password = passwordField.value;

    if (email.length === 0) {
      displayError(
        ' <i class="fa fa-times-circle"></i> Please enter your email'
      );
      return false;
    } else if (!email.includes("@gmail.com")) {
      displayError(
        ' <i class="fa fa-times-circle"></i> Your email is not valid'
      );
      emailField.focus();
      return false;
    } else if (password === "") {
      displayError(
        ' <i class="fa fa-times-circle"></i> Please enter your password'
      );
      return false;
    } else if (password.length < 6) {
      displayError(
        '<i class="fa fa-times-circle"></i> Your password must be at least 6 letters'
      );
      passwordField.focus();
      return false;
    }

    return true;
  } catch (e) {
    return false;
  }
}
//Function for Sign up page

function hideErrorSignUp() {
  let errorField = document.getElementById("error-message-signup");
  errorField.style.display = "none";
  console.log("Hide sign up error");
}
//load hide error cua sign up
window.addEventListener("load", () => {
  hideErrorSignUp();
});

function displayErrorSignUp(message) {
  let errorField = document.getElementById("error-message-signup");
  errorField.style.display = "";
  errorField.innerHTML = message;
}

function validateInputSignUp() {
  try {
    let usernameField = document.getElementById("username-signup");
    let passwordField = document.getElementById("psw-signup");
    let fullnameField = document.getElementById("fullname-signup");
    let emailField = document.getElementById("email-signup");
    let phoneField = document.getElementById("phone-signup");
    let errorField = document.getElementById("error-message-signup");

    let username = usernameField.value;
    let email = emailField.value;
    let password = passwordField.value;
    let fullname = fullnameField.value;
    let phone = phoneField.value;

    if (username.length === 0) {
      displayErrorSignUp(
        ' <i class="fa fa-times-circle"></i> Please enter your username'
      );
      usernameField.focus();
      return false;
    } else if (password === "") {
      displayErrorSignUp(
        ' <i class="fa fa-times-circle"></i> Please enter your password'
      );
      passwordField.focus();
      return false;
    } else if (password.length < 6) {
      displayErrorSignUp(
        ' <i class="fa fa-times-circle"></i> Your password must be at least 6 letters'
      );
      passwordField.focus();
      return false;
    } else if (fullname === "") {
      displayErrorSignUp(
        ' <i class="fa fa-times-circle"></i> Please enter your fullname'
      );
      fullnameField.focus();
      return false;
    } else if (email.length === 0) {
      displayErrorSignUp(
        ' <i class="fa fa-times-circle"></i> Please enter your email'
      );
      emailField.focus();
      return false;
    } else if (!email.includes("@gmail.com")) {
      displayErrorSignUp(
        ' <i class="fa fa-times-circle"></i> Your email is not valid'
      );
      emailField.focus();
      return false;
    } else if (phone === "") {
      displayErrorSignUp(
        ' <i class="fa fa-times-circle"></i> Please enter your phone number'
      );
      phoneField.focus();
      return false;
    }
    return true;
  } catch (e) {
    return false;
  }
}

//function change Pass page
function hideErrorchangePass() {
  let errorField = document.getElementById("error-message-changepass");
  errorField.style.display = "none";
  console.log("Hide error");
}

function displayErrorchangePass(message) {
  let errorField = document.getElementById("error-message-changepass");
  errorField.style.display = "";
  errorField.innerHTML = message;
}
window.addEventListener("load", () => {
  hideErrorchangePass();
});

function validateInputchangePass() {
  try {
    let emailField = document.getElementById("email-changepass");
    let codeField = document.getElementById("code-from-mail");
    let errorField = document.getElementById("error-message-changepass");

    let email = emailField.value;
    let code = codeField.value;

    if (email.length === 0) {
      displayErrorchangePass(
        ' <i class="fa fa-times-circle"></i> Please enter your email'
      );
      emailField.focus();
      return false;
    } else if (!email.includes("@gmail.com")) {
      displayErrorchangePass(
        ' <i class="fa fa-times-circle"></i> Your email is not valid'
      );
      emailField.focus();
      return false;
    } else if (code === "") {
      displayErrorchangePass(
        ' <i class="fa fa-times-circle"></i> Please enter your code '
      );
      codeField.focus();
      return false;
    } else if (code === "0000") {
      displayErrorchangePass(
        '<i class="fa fa-times-circle"></i> Your code is not valid'
      );
      codeField.focus();
      return false;
    }
    return true;
  } catch (e) {
    return false;
  }
}

//function validate phân quyền

function hideErrorphanquyen() {
  let errorField = document.getElementById("error-message-phanquyen");
  errorField.style.display = "none";
  console.log("Hide error");
}

function displayErrorphanquyen(message) {
  let errorField = document.getElementById("error-message-phanquyen");
  errorField.style.display = "";
  errorField.innerHTML = message;
  console.log("display phan quyen");
}
window.addEventListener("load", () => {
  hideErrorphanquyen();
});

function validateInputphanquyen() {
  try {
    let emailField = document.getElementById("email-phanquyen");
    let errorField = document.getElementById("error-message-phanquyen");
    let selectField = document.getElementById("permission");

    let email = emailField.value;
    let select = selectField.value;

    if (email.length === 0) {
      displayErrorphanquyen(
        '<i class="fa fa-times-circle"></i> Please enter email'
      );
      emailField.focus();
      return false;
    } else if (!email.includes("@gmail.com")) {
      displayErrorphanquyen(
        '<i class="fa fa-times-circle"></i> Your email is not valid'
      );
      emailField.focus();
      return false;
    } else if (select === "") {
      displayErrorphanquyen(
        '<i class="fa fa-times-circle"></i> Please choose permission'
      );
      selectField.focus();
      return false;
    }
    return true;
  } catch (e) {
    return false;
  }
}

// function Create class
function hideErroraddClass() {
  let errorField = document.getElementById("error-message-addClass");
  errorField.style.display = "none";
  console.log("Hide error");
}

function displayErroraddClass(message) {
  let errorField = document.getElementById("error-message-addClass");
  errorField.style.display = "";
  errorField.innerHTML = message;
  console.log("display phan quyen");
}
window.addEventListener("load", () => {
  hideErroraddClass();
});

function validateInputaddClass() {
  try {
    let nameField = document.getElementById("class-name");
    let subjectField = document.getElementById("class-subject");
    let teacherField = document.getElementById("class-teacher");
    let roomField = document.getElementById("class-room");
    let fileanhField = document.getElementById("fileanh");
    let errorField = document.getElementById("error-message-addClass");

    let name = nameField.value;
    let subject = subjectField.value;
    let teacher = teacherField.value;
    let room = roomField.value;
    let fileanh = fileanhField.value;

    if (name.length === 0) {
      displayErroraddClass(
        '<i class="fa fa-times-circle"></i> Please enter your Class name'
      );
      nameField.focus();
      return false;
    } else if (subject === "") {
      displayErroraddClass(
        '<i class="fa fa-times-circle"></i> Please enter your Subject'
      );
      subjectField.focus();
      return false;
    } else if (teacher === "") {
      displayErroraddClass(
        '<i class="fa fa-times-circle"></i> Please enter your teacher name'
      );
      teacherField.focus();
      return false;
    } else if (room === "") {
      displayErroraddClass(
        '<i class="fa fa-times-circle"></i> Please enter your Room'
      );
      roomField.focus();
      return false;
    } else if (fileanh === "") {
      displayErroraddClass(
        '<i class="fa fa-times-circle"></i> Please choose your avatar'
      );
      return false;
    } else if (
      !fileanh.includes("jpg") &&
      !fileanh.includes("jpeg") &&
      !fileanh.includes("png")
    ) {
      displayErroraddClass(
        '<i class="fa fa-times-circle"></i> Please choose a JPG/JPEG/PNG file'
      );
      return false;
    }
    return true;
  } catch (e) {
    return false;
  }
}

// function Edit classroom
function hideErrorEditClass() {
  let errorField = document.getElementById("error-message-edit");
  errorField.style.display = "none";
}

function displayErrorEditClass(message) {
  let errorField = document.getElementById("error-message-edit");
  errorField.style.display = "";
  errorField.innerHTML = message;
}
window.addEventListener("load", () => {
  hideErrorEditClass();
});

function validateInputEditClass() {
  try {
    let nameField = document.getElementById("class-name-edit");
    let subjectField = document.getElementById("class-subject-edit");
    let teacherField = document.getElementById("class-teacher-edit");
    let roomField = document.getElementById("class-room-edit");
    let fileanhField = document.getElementById("fileanh-edit");
    let errorField = document.getElementById("error-message-edit");

    let name = nameField.value;
    let subject = subjectField.value;
    let teacher = teacherField.value;
    let room = roomField.value;
    let fileanh = fileanhField.value;

    if (name.length === 0) {
      displayErrorEditClass(
        '<i class="fa fa-times-circle"></i> Please enter your Class name'
      );
      nameField.focus();
      return false;
    } else if (subject === "") {
      displayErrorEditClass(
        '<i class="fa fa-times-circle"></i> Please enter your Subject'
      );
      subjectField.focus();
      return false;
    } else if (teacher === "") {
      displayErrorEditClass(
        '<i class="fa fa-times-circle"></i> Please enter teacher name'
      );
      subjectField.focus();
      return false;
    } else if (room === "") {
      displayErrorEditClass(
        '<i class="fa fa-times-circle"></i> Please enter your Room'
      );
      roomField.focus();
      return false;
    } else if (
      !fileanh.includes("jpg") &&
      !fileanh.includes("jpeg") &&
      !fileanh.includes("png")
    ) {
      displayErrorEditClass(
        '<i class="fa fa-times-circle"></i> Please choose a JPG/JPEG/PNG file'
      );
      return false;
    }
    return true;
  } catch (e) {
    return false;
  }
}

//function change Pass step 2page
function hideErrorchangePass2() {
  let errorField = document.getElementById("error-message-changepass2");
  errorField.style.display = "none";
  console.log("Hide error changepass 2");
}

function displayErrorchangePass2(message) {
  let errorField = document.getElementById("error-message-changepass2");
  errorField.style.display = "";
  errorField.innerHTML = message;
}
window.addEventListener("load", () => {
  hideErrorchangePass2();
});

function validateInputchangePass2() {
  try {
    let newpassField = document.getElementById("new-pass");
    let repassField = document.getElementById("repass");
    let errorField = document.getElementById("error-message-changepass2");

    let newpass = newpassField.value;
    let repass = repassField.value;

    if (newpass.length === 0) {
      displayErrorchangePass2(
        ' <i class="fa fa-times-circle"></i> Please enter your new password'
      );
      newpassField.focus();
      return false;
    } else if (newpass.length < 6) {
      displayErrorchangePass2(
        ' <i class="fa fa-times-circle"></i> Your new password must be 6 letters '
      );
      newpassField.focus();
      return false;
    } else if (repass === "") {
      displayErrorchangePass2(
        ' <i class="fa fa-times-circle"></i> Please verify your new password '
      );
      repassField.focus();
      return false;
    } else if (repass !== newpass) {
      displayErrorchangePass2(
        '<i class="fa fa-times-circle"></i> Please enter the exact new password'
      );
      codeField.focus();
      return false;
    }
    return true;
  } catch (e) {
    return false;
  }
}
function delete_class(id) {
  if (confirm("Sure To Remove This Class ?")) {
    window.location.href = "delete-class.php?id=" + id;
  }
}


