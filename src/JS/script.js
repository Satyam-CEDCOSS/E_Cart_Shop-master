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
                else if(result=="admin"){
                    window.location.href = "http://localhost:8080/admin_page.php";
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
            // console.log(result);
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

// User Table Body
function top_table(){
    $.ajax({
        type: "POST",
        url: "/admin_display.php",
        data: {"operation":"top_user"},
        dataType: "text",
    }).done(function (result){
        // console.log(result);
        $("#user_table_body").html(result);
    })
    $.ajax({
        type: "POST",
        url: "/admin_display.php",
        data: {"operation":"top_product"},
        dataType: "text",
    }).done(function (result){
        // console.log(result);
        $("#product_table_body").html(result);
    })
    $.ajax({
        type: "POST",
        url: "/admin_display.php",
        data: {"operation":"top_order"},
        dataType: "text",
    }).done(function (result){
        // console.log(result);
        $("#order_table_body").html(result);
    })
}
top_table()

// USER INFO Table
$("#user_update_panel").hide()
let user_var = 0
function edit_user(val){
    user_var = val
    $.ajax({
        type: "POST",
        url: "/user_display.php",
        data: {"operation":"edit","id":val},
        dataType: "text",
    }).done(function (result){
        result = JSON.parse(result)
        $("#user_name").val(result["Names"])
        $("#user_email").val(result["Email"])
        $("#user_password").val(result["Passwords"])
        $("#user_status").val(result["Status"])
        $("#user_update_panel").show()
    })
}
function update_user(){
    let id = user_var
    let name = $("#user_name").val()
    let email = $("#user_email").val()
    let status = $("#user_status").val()
    $.ajax({
        type: "POST",
        url: "/user_display.php",
        data: {"operation":"update","id":id,"name":name,"email":email,"status":status},
        dataType: "text",
    }).done(function (result){
        console.log(result)
        $("#user_update_panel").hide()
        users()
    })
}
function delete_user(val){
    $.ajax({
        type: "POST",
        url: "/user_display.php",
        data: {"operation":"delete","id":val},
        dataType: "text",
    }).done(function (result){
        console.log(result);
        users()
    })
}
function users(){
    $.ajax({
        type: "POST",
        url: "/user_display.php",
        data: {"operation":"display"},
        dataType: "text",
    }).done(function (result){
        $("#alter_user_table_body").html(result);
    })
}
users()

// PRODUCT INFO Table 
$("#update_product").hide()
function add_product(){
    let name = $("#product_name").val()
    let company = $("#product_company").val()
    let type= $("#product_type").val()
    let quantity = $("#product_quantity").val()
    let price = $("#product_price").val()
    let market_price = $("#product_market_price").val()
    let image = $("#product_image").val()
    $.ajax({
        type: "POST",
        url: "/product_display.php",
        data: {"operation":"add","name":name,"company":company,"type":type,"quantity":quantity,"price":price,"market_price":market_price,"image":image},
        dataType: "text",
    }).done(function (result){
        console.log(result);
        products()
    })
}
let product_var = 0;
function edit_product(val){
    product_var = val;
    $.ajax({
        type: "POST",
        url: "/product_display.php",
        data: {"operation":"edit","id":val},
        dataType: "text",
    }).done(function (result){
        result = JSON.parse(result)
        $("#product_name").val(result["product_name"])
        $("#product_company").val(result["company"])
        $("#product_type").val(result["type"])
        $("#product_quantity").val(result["quantity"])
        $("#product_price").val(result["price"])
        $("#product_market_price").val(result["original_price"])
        $("#product_image").val(result["image"])
        $("#update_product").show()
    })
}
function update_product(){
    let id = product_var
    let name = $("#product_name").val()
    let company = $("#product_company").val()
    let type= $("#product_type").val()
    let quantity = $("#product_quantity").val()
    let price = $("#product_price").val()
    let market_price = $("#product_market_price").val()
    let image = $("#product_image").val()
    $.ajax({
        type: "POST",
        url: "/product_display.php",
        data: {"operation":"update","id":id,"name":name,"company":company,"type":type,"quantity":quantity,"price":price,"market_price":market_price,"image":image},
        dataType: "text",
    }).done(function (result){
        console.log(result);
        $("#update_product").hide()
        products()
    })
}
function delete_product(val){
    $.ajax({
        type: "POST",
        url: "/product_display.php",
        data: {"operation":"delete","id":val},
        dataType: "text",
    }).done(function (result){
        console.log(result);
        products()
    })
}
function products(){
    $.ajax({
        type: "POST",
        url: "/product_display.php",
        data: {"operation":"display"},
        dataType: "text",
    }).done(function (result){
        // console.log(result);
        $("#alter_product_table_body").html(result);
    })
}
products()

// MORE SHOPPING BUTTON 
function more_btn(){
    $.ajax({
        type: "POST",
        url: "/more_shop.php",
        dataType: "text",
    }).done(function (result){
        if (result=="SignOut"){
            window.location.href = "http://localhost:8080/index.php";
        }
        else{
            window.location.href = "http://localhost:8080/login_index.php";
        }
    })
}