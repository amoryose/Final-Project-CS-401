function validate(form)
{
    fail = validateUsername(form.username.value)
    fail += validatePassword(form.password.value)
                
    if   (fail == "")    return true
    else {alert(fail); return false}
}
            
function validateUsername(field)
{
    if (field == "") return "NO username.\n"
    else if (field.length < 8)
        return "Username must be at least 8 characters long.\n"
    else if (/[^a-zA-Z0-9_-]/.test(field))
    return "Only letters and numbers are allowed \n"
    return ""
}

function validatePassword(field)
{
    if (field == "") return "NO password.\n"
    else if (field.length < 8)
        return "Password must be at least 8 characters long.\n"
    else if (!/[a-z]/.test(field) || !/[A-Z]/.test(field) ||
            !/[0-9]/.test(field))
        return "Password needs to have lowercase, uppercase,\n\
                and a numerical character"
        return ""
}

function gradeConfirmation() 
{
    alert("The grades have been updated");
}