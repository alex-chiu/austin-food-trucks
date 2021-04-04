function verifyForm() {
    let validForm = true;

    // Validate Name
    let reName = /^[a-zA-Z]{1,}(?: [a-zA-Z]+){0,2}$/;
    if (!reName.test($("#name").val())) {
        alert("Please Enter Your Full Name!");
        validForm = false;
    }

    // Validate Email (RFC 5322)
    let reEmail = /(?:[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*|"(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21\x23-\x5b\x5d-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])*")@(?:(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?|\[(?:(?:(2(5[0-5]|[0-4][0-9])|1[0-9][0-9]|[1-9]?[0-9]))\.){3}(?:(2(5[0-5]|[0-4][0-9])|1[0-9][0-9]|[1-9]?[0-9])|[a-z0-9-]*[a-z0-9]:(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21-\x5a\x53-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])+)\])/;
    if (!reEmail.test($("#email").val())) {
        alert("Please Enter a Valid Email!");
        validForm = false;
    }

    console.log("Validated Data!")

    /*
    // Populate Form Data
    if (validForm) {
        let fs = require("fs");
        fs.readFile("feedback.json", "utf8", function readFileCallback(err, data) {
            if (err) {
                console.log(err);
            }
            else {
                let arr = JSON.parse(data);
                arr.table.push({name: $("#name").val(), email: $("#email").val(), content: $("#subject").val()});
                json = JSON.stringify(arr);
                fs.writeFile("feedback.json", json, "utf8", callback);
            }
        });
    }
    */
}