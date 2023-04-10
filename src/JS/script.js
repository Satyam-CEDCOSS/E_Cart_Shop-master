$(document).ready(function(){
    $("#register").click(function(){
        let name = $("#name").val()
        let mail = $("#mail").val()
        let pass = $("#pass").val()
        let r_pass = $("#r_pass").val()
        if (name && mail && pass && r_pass){
            if (pass == r_pass) {
                $.ajax({
                    type: "POST",
                    url: "/registration.php",
                    data: {"name":name,"mail":mail,"password":pass},
                    dataType: "text",
                  }).done(function (result){
                    if (result == "success") {
                        window.location.href = "http://localhost:8080/login.php";
                    }
                    else{
                        $("#error").html("Error To Sending Data in Database");
                    }
                });
            }
            else{
                $("#error").html("Password do not match");
            }
        }
        else{
            $("#error").html("Fill All Inputs");
        }
    })
})

// Login Function 
$(document).ready(function(){
    $("#login").click(function(){
        let mail = $("#log_mail").val()
        let pass = $("#log_pass").val()
        if (mail && pass){
            $.ajax({
                type: "POST",
                url: "/login_sql.php",
                data: {"mail":mail,"password":pass},
                dataType: "text",
            }).done(function (result){
                if (result == "success") {
                    window.location.href = "http://localhost:8080/login_index.php";
                    // console.log(result)
                }
                else{
                    $("#error_log").html("Invalid Id or Password");
                    console.log("Data Do not Matched");
                }
            });
        }
        else{
            $("#error_log").html("Fill All Inputs");
            console.log("Fill All Inputs");
        }
    })
})

// Display Page Function 
function main_display() {
    $.ajax({
        type: "POST",
        url: "/main_display.php",
        dataType: "text",
    }).done(function (result){
        // console.log(result);
        $("#main_display").html(result)
    })
}
main_display()

// Item Display 
function item_display(val){
    $.ajax({
        type: "POST",
        url: "/item_display.php",
        data: {"id":val},
        dataType: "text",
    }).done(function (result){
        window.location.href = "http://localhost:8080/item_page.php";
        console.log(result);
    })
}

// Add Cart Functionality 
function add_cart(val){
    $.ajax({
        type: "POST",
        url: "/cart_display.php",
        data: {"id":val,"operation":"add"},
        dataType: "text",
    }).done(function (result){
        // console.log(result);
    })
}
// Add Cart Increase
function inc_cart(val){
    $.ajax({
        type: "POST",
        url: "/cart_display.php",
        data: {"id":val,"operation":"inc"},
        dataType: "text",
    }).done(function (result){
        window.location.href = "http://localhost:8080/cart_page.php";
        // console.log(result);
    })
}
// Add Cart Decrease
function dec_cart(val){
    $.ajax({
        type: "POST",
        url: "/cart_display.php",
        data: {"id":val,"operation":"dec"},
        dataType: "text",
    }).done(function (result){
        window.location.href = "http://localhost:8080/cart_page.php";
        // console.log(result);
    })
}
// Add Cart Delete
function del_cart(val){
    $.ajax({
        type: "POST",
        url: "/cart_display.php",
        data: {"id":val,"operation":"del"},
        dataType: "text",
    }).done(function (result){
        window.location.href = "http://localhost:8080/cart_page.php";
        // console.log(result);
    })
}

// Wishlist Functionality
function add_wishlist(val){
    $.ajax({
        type: "POST",
        url: "/wishlist_display.php",
        data: {"id":val,"operation":"add"},
        dataType: "text",
    }).done(function (result){
        console.log("hello");
        console.log(result);
    })
}
function del_wishlist(val){
    $.ajax({
        type: "POST",
        url: "/wishlist_display.php",
        data: {"id":val,"operation":"del"},
        dataType: "text",
    }).done(function (result){
        window.location.href = "http://localhost:8080/wishlist_page.php";
        // console.log(result);
    })
}

// Payment Function 
function payment() {
    $.ajax({
        type: "POST",
        url: "/payment_page.php",
        dataType: "text",
    }).done(function (result){
        if (result=="login"){
            window.location.href = "http://localhost:8080/login.php";
        }
        else{
            alert("Your Payment has successfully done")
            window.location.href = "http://localhost:8080/login_index.php";
        }
    })
}

// Sign_Out Functionality 
function sign_out() {
    $.ajax({
            type: "POST",
            url: "/sign_out_sql.php",
            dataType: "text",
        }).done(function (result){
            // console.log(result);
            window.location.href = "http://localhost:8080/index.php";
        })
}