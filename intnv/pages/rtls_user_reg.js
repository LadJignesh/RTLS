function validateForm(thisform) {
  var x=thisform.fname.value;
    var y=thisform.mname.value;
    var z=thisform.lname.value;
    var u=thisform.username.value;
    var pass=thisform.passwd.value;
    var c_r_n=thisform.ctrl_room_no.value;
    var jet_y=thisform.jetty.value;
    var date=thisform.reg_date.value;
    
    if (x == null || x == "") {
        alert("Firstname must be filled.");
        thisform.x.focus();
        return false;};

    if (y == null || y == "") {
        alert("Middlename must be filled.");
        thisform.y.focus();
        return false;};

    if (z == null || z == "") {
        alert("Lastname must be filled.");
        thisform.z.focus();
        return false;};

    if (u == null || u == "") {
        alert("Username must be filled.");
        thisform.u.focus();
        return false; };  

    if (pass == null || pass == "") {
        alert("Password must be filled.");
        thisform.pass.focus();
        return false;};

    if (c_r_n == null || c_r_n == "") {
        alert("Control room no. must be filled.");
        thisform.c_r_n.focus();
        return false;};

    if (jet_y == null || jet_y == "") {
        alert("Jettyname must be filled.");
                thisform.jet_y.focus();
        return false;};

    if (date == null || date == "") {
        
        alert("Date must be selected.");
        thisform.date.focus();
        return false;      };
       
    }   