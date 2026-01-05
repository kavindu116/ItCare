
function changeview() {
    //alert("ok");
    var signinbox = document.getElementById("signinbox");
    var signupbox = document.getElementById("signupbox");

    signinbox.classList.toggle("d-none");
    signupbox.classList.toggle("d-none");
}

function signup() {
    //alert("ok");
    var fname = document.getElementById("fname");
    var lname = document.getElementById("lname");
    var email = document.getElementById("email");
    var mobile = document.getElementById("mobile");
    var uname = document.getElementById("username");
    var password = document.getElementById("password");

    //alert(fname.value);
    //alert(lname.value);
    // alert(email.value);
    // alert(mobile.value);
    // alert(username.value);
    //alert(password.value);

    var form = new FormData();
    form.append("f", fname.value);
    form.append("l", lname.value);
    form.append("e", email.value);
    form.append("m", mobile.value);
    form.append("u", uname.value);
    form.append("p", password.value);

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.status == 200 && request.readyState == 4) {
            var response = request.responseText;
            //alert(response);

            if (response == "Success") {


                swal("SUCCESS..!", "You have successfully registered", "success")
                    .then((value) => {
                        var signUpBox = document.getElementById("signupbox");
                        var signInBox = document.getElementById("signinbox");


                        signUpBox.classList.toggle("d-none");
                        signInBox.classList.toggle("d-none");
                    });




            } else {
                document.getElementById("msg").innerHTML = response;
                document.getElementById("msgdiv").className = "d-block";
                swal("Error", response, "error");

            }
        }
    }


    request.open("POST", "signupprocess.php", true);
    request.send(form);
}

function signin() {
    // alert ("ok");

    var username = document.getElementById("un");
    var password = document.getElementById("pw");
    var rememberme = document.getElementById("rm");

    //alert(username.value);
    //alert(password.value);
    //alert(rememberme.checked);

    var form = new FormData();
    form.append("un", username.value);
    form.append("pw", password.value);
    form.append("rm", rememberme.checked);

    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
        if (request.status == 200 && request.readyState == 4) {
            var response = request.responseText;
            //alert(response);

            if (response == "Success") {
                document.getElementById("msg1").innerHTML = "Login Success!";
                document.getElementById("msg1").className = "alert alert-success";
                document.getElementById("msgdiv1").className = "d-blok";


                window.location = "index.php";

            } else {
                //alert(response);
                document.getElementById("msg1").innerHTML = response;
                document.getElementById("msgdiv1").className = "d-blok";
                swal("Error", response, "error");

            }
        }
    }

    request.open("POST", "signinprocess.php", true);
    request.send(form);
}

function adminsignin() {
    //alert("ok");
    var uname = document.getElementById("un");
    var password = document.getElementById("pw");

    // alert(uname.value);
    // alert(password.value);

    var form = new FormData();
    form.append("un", uname.value);
    form.append("pw", password.value);

    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
        if (request.status == 200 && request.readyState == 4) {
            var response = request.responseText;
            // alert(response);

            if (response == "Success") {
                window.location = "admindashbord.php";

            } else {
                document.getElementById("msg").innerHTML = response;
                document.getElementById("msgdiv").className = "d-block";
            }

        }
    }


    request.open("POST", "adminsigninprocess.php", true);
    request.send(form);

}

function loaduser() {
    // alert("ok");

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.status == 200 && request.readyState == 4) {
            var responese = request.responseText;
            //alert(responese);
            document.getElementById("tb").innerHTML = responese;
        }
    }

    request.open("POST", "loaduserprocess.php", true);
    request.send();
}



function searchuser() {
    //alert("ok");
    var search = document.getElementById("search");
    //alert(search.value);

    var form = new FormData();
    form.append("s", search.value);

    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
        if (request.status == 200 && request.readyState == 4) {
            var response = request.responseText;
            //alert(response);

            if (response == "Please Enter User Name") {
                document.getElementById("msg").innerHTML = response;
                document.getElementById("msgdiv").className = "d-block";
            } else {
                document.getElementById("tb").innerHTML = response;
                document.getElementById("msgdiv").className = "d-none";

            }

        }
    }


    request.open("POST", "searchuserprocess.php", true);
    request.send(form);


}

function relod() {
    //alert("ok");
    window.location.reload();
}



function changestatus() {
    //alert("ok");
    var userid = document.getElementById("userid");
    //alert(userid.value);

    var request = new XMLHttpRequest();

    var f = new FormData();
    f.append("uid", userid.value);

    request.onreadystatechange = function () {
        if (request.status == 200 && request.readyState == 4) {
            var response = request.responseText;
            //alert(responece);
            if (response == "Deactivated") {
                document.getElementById("msg").innerHTML = "User Deactivated";
                document.getElementById("msg").className = "alert alert-success";
                document.getElementById("msgdiv").className = "d-block";
                userid.value = "";
                loaduser();

            } else if (response == "Activated") {
                document.getElementById("msg").innerHTML = "User Activated";
                document.getElementById("msg").className = "alert alert-success";
                document.getElementById("msgdiv").className = "d-block";
                userid.value = "";
                loaduser();


            } else {
                document.getElementById("msg").innerHTML = response;
                document.getElementById("msgdiv").className = "d-block";

            }


        }
    }

    request.open("POST", "changeuseridprocess.php", true);
    request.send(f);

}



function savebrand() {
    //alert("ok");

    var brand = document.getElementById("brnd");
    //alert(brand.value);

    var f = new FormData();
    f.append("brand", brand.value);

    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
        if (request.status == 200 && request.readyState == 4) {
            var respose = request.responseText;
            //alert(respose);
            if (respose == "Success") {

                swal("SUCCESS..!", "Brand Registration Successful", "success")
                    .then((value) => {
                        window.location.reload();;
                    });
            } else {
                document.getElementById("msg1").innerHTML = respose;
                document.getElementById("msgdiv1").className = "d-block";
            }
        }
    }


    request.open("POST", "savebrandprocess.php", true);
    request.send(f);
}

function savecatagory() {
    // alert("ok");
    var cat = document.getElementById("cat");

    var f = new FormData();
    f.append("cat", cat.value);

    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
        if (request.status == 200 && request.readyState == 4) {
            var response = request.responseText;
            // alert(response);

            if (response == "Success") {
                swal("SUCCESS..!", "Catagory Registration Successful", "success")
                    .then((value) => {
                        window.location.reload();;
                    });
            } else {
                document.getElementById("msg2").innerHTML = response;
                document.getElementById("msgdiv2").className = "d-block";
            }
        }
    }


    request.open("POST", "savecatagoryprocess.php", true);
    request.send(f);
}

function saveclr() {
    // alert("ok");
    var color = document.getElementById("clr");

    var f = new FormData();
    f.append("clr", color.value);

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.status == 200 && request.readyState == 4) {
            response = request.responseText;
            // alert(response);
            if (response == "Success") {
                swal("SUCCESS..!", "Color Registration Successful", "success")
                    .then((value) => {
                        window.location.reload();;
                    });
            } else {
                document.getElementById("msg3").innerHTML = response;
                document.getElementById("msgdiv3").className = "d-block";
            }
        }
    }

    request.open("POST", "savecolourprocess.php", true);
    request.send(f);
}

function savemodel() {
    // alert("ok");

    var model = document.getElementById("model");

    var f = new FormData();
    f.append("m", model.value);

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.status == 200 && request.readyState == 4) {
            var response = request.responseText;
            // alert(response);
            if (response == "Success") {
                swal("SUCCESS..!", "Model Registration Successful", "success")
                    .then((value) => {
                        window.location.reload();;
                    });
            } else {
                document.getElementById("msg4").innerHTML = response;
                document.getElementById("magdiv4").className = "d-block";
            }
        }

    }

    request.open("POST", "savemodelprocess.php", true);
    request.send(f);

}

function regProduct() {
    // alert("OK");

    var pname = document.getElementById("pname");
    // alert(pname.value);
    var brand = document.getElementById("brand");
    var cat = document.getElementById("cat");
    var color = document.getElementById("color");
    var mod = document.getElementById("mod")
    var desc = document.getElementById("desc");
    var file = document.getElementById("file");

    var form = new FormData();
    form.append("pname", pname.value);
    form.append("brand", brand.value);
    form.append("cat", cat.value);
    form.append("color", color.value);
    form.append("mod", mod.value);
    form.append("desc", desc.value);
    form.append("image", file.files[0]);

    var req = new XMLHttpRequest();

    req.onreadystatechange = function () {

        if (req.readyState == 4 && req.status == 200) {
            var resp = req.responseText;
            //alert(resp);
            if (resp == "Success") {
                swal("SUCCESS..!", "Product Registration Successful", "success")
                    .then((value) => {
                        window.location.reload();;
                    });
            } else {
                swal("Error", resp, "error");
            }

        }
    };

    req.open("POST", "productRegProcess.php", true);
    req.send(form);



}

function updatestork() {
    var pname = document.getElementById("ps");
    var qty = document.getElementById("qty");
    var price = document.getElementById("price");


    var f = new FormData();
    f.append("pn", pname.value);
    f.append("qty", qty.value);
    f.append("price", price.value);


    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.status == 200 && request.readyState == 4) {
            var response = request.responseText;
            if (response == "Stock Updated Successfully") {
                swal("SUCCESS..!", "Product Stock Update Successful", "success")
                    .then((value) => {
                        window.location.reload();;
                    });
            } else {
                swal("Error", response, "error");
            }

        }

    }

    request.open("POST", "updatestorkprocess.php", true);
    request.send(f);
}

function adminsignout() {
    //alert("ok");

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            var response = request.responseText;
            //alert(response);
            if (response = "success") {
                window.location.reload();
            }
        }
    }

    request.open("GET", "adminlogoutprocess.php", true);
    request.send();

}

function changeProductStatus() {
    // alert("ok");

    var pid = document.getElementById("pid");
    //alert(userid.value);

    var request = new XMLHttpRequest();

    var f = new FormData();
    f.append("pid", pid.value);

    request.onreadystatechange = function () {
        if (request.status == 200 && request.readyState == 4) {
            var response = request.responseText;
            alert(response);



        }
    }

    request.open("POST", "changeProductStatusprocess.php", true);
    request.send(f);
}

function printdiv() {
    // alert("ok");
    var orignalContent = document.body.innerHTML;
    var printArea = document.getElementById("printArea").innerHTML;

    document.body.innerHTML = printArea;

    window.print();

    document.body.innerHTML = orignalContent;
}

function signout() {
    //alert("ok");
    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            var response = request.responseText;
            //alert(response);
            if (response = "success") {
                window.location.reload();
            }
        }
    }

    request.open("GET", "signoutprocess.php", true);
    request.send();
}

function basicSearch(x) {
    //alert("ok");
    var txt = document.getElementById("basic_search_txt");
    var select = document.getElementById("basic_search_select");

    var form = new FormData();
    form.append("t", txt.value);
    form.append("s", select.value);
    form.append("page", x);

    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
        if (request.status == 200 && request.readyState == 4) {
            var response = request.responseText;
            //alert(response);
            document.getElementById("basicSearchResult").innerHTML = response;
            txt.value = "";
        }
    }

    request.open("POST", "besicSearchProcess.php", true);
    request.send(form);
}

function viewfilter() {
    // alert("ok");
    document.getElementById("filterId").classList.toggle("d-none");
    document.getElementById("cor").classList.toggle("d-lg-none");
}

function advSearchProduct(x) {
    var page = x;
    var color = document.getElementById("color");
    var cat = document.getElementById("cat");
    var brand = document.getElementById("brand");
    var model = document.getElementById("model");
    var min = document.getElementById("min");
    var max = document.getElementById("max");


    var f = new FormData();

    f.append("pg", page);
    f.append("co", color.value);
    f.append("cat", cat.value);
    f.append("b", brand.value);
    f.append("m", model.value);
    f.append("min", min.value);
    f.append("max", max.value);

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            var response = request.responseText;
            document.getElementById("basicSearchResult").innerHTML = response;
        }
    };

    request.open("POST", "advSearchProductProcess.php", true);
    request.send(f);

}


function changeProfileImg() {
    //alert("ok");
    var img = document.getElementById("profileimage");

    img.onchange = function () {
        var file = this.files[0];
        var url = window.URL.createObjectURL(file);

        //alert(url);
        document.getElementById("img").src = url;
    }
}

function showPassword3() {

    var input = document.getElementById("user_password");
    var button = document.getElementById("basic-addon2");

    if (input.type == "password") {
        input.type = "text";
        button.innerHTML = "Hide";
    } else {
        input.type = "password";
        button.innerHTML = "Show";
    }

}

function updateProfile() {
    //alert("ok");

    var fname = document.getElementById("fname");
    var lname = document.getElementById("lname");
    var mobile = document.getElementById("mobile");
    var line1 = document.getElementById("line1");
    var line2 = document.getElementById("line2");

    var image = document.getElementById("profileimage");

    // alert(fname.value);
    //alert(line1.value);
    //alert(image.files[0]);
    var form = new FormData();
    form.append("f", fname.value);
    form.append("l", lname.value);
    form.append("m", mobile.value);
    form.append("l1", line1.value);
    form.append("l2", line2.value);
    form.append("i", image.files[0]);

    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
        if (request.status == 200 && request.readyState == 4) {
            var response = request.responseText;
            //alert(response);
            if (response == "updated" || response == "Saved" || response == "Success") {
                swal("SUCCESS..!", "Profile Updated", "success")
                    .then((value) => {
                        window.location.reload();
                    });
            } else {
                swal("Error", response, "error");
            }
        }
    }

    request.open("POST", "updateProfileProcess.php", true);
    request.send(form);

}

function addtoCart(x) {
    //alert(x);

    var stockId = x;
    var qty = document.getElementById("qty");

    if (qty.value != "") {
        //    alert("ok");
        var f = new FormData();
        f.append("s", stockId);
        f.append("q", qty.value);

        var request = new XMLHttpRequest();

        request.onreadystatechange = function () {
            if (request.readyState == 4 && request.status == 200) {
                var responece = request.responseText;


                swal("SUCCESS..!", responece, "success")
                    .then((value) => {
                        qty.value = "";
                    });
            }
        }

        request.open("POST", "addtoCartProcess.php", true);
        request.send(f);


    } else {
        swal("Error", "Plese Enter Quantity", "error")
            .then((value) => {
                qty.value = "";
            });
    }

}

function loadCart() {
    // alert("ok");

    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
        if (request.status == 200 && request.readyState == 4) {
            var response = request.responseText;
            // alert(response);
            document.getElementById("cartBody").innerHTML = response;
        }
    }

    request.open("POST", "loadCartProcess.php", true);
    request.send();
}

function incrementcartqty(x) {
    // alert(x);

    var cartId = x;
    var qty = document.getElementById("qty" + x);

    var newQty = parseInt(qty.value) + 1;
    // alert(newQty);

    var f = new FormData();
    f.append("cid", cartId);
    f.append("q", newQty);
    // alert(qty.value);

    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
        if (request.status == 200 && request.readyState == 4) {
            var response = request.responseText;
            // alert(response);
            if (response == "Success") {
                qty.value = parseInt(qty.value) + 1;
                loadCart();
            } else {
                alert(response);
            }
        }
    }

    request.open("POST", "incrementcartqtyprocess.php", true);
    request.send(f);
}

function decrementcartqty(x) {
    var cartId = x;
    var qty = document.getElementById("qty" + x);

    var newQty = parseInt(qty.value) - 1;
    //alert(newQty);

    var f = new FormData();
    f.append("cid", cartId);
    f.append("q", newQty);
    // alert(qty.value);
    if (newQty > 0) {
        var request = new XMLHttpRequest();

        request.onreadystatechange = function () {
            if (request.status == 200 && request.readyState == 4) {
                var response = request.responseText;
                // alert(response);
                if (response == "Success") {
                    qty.value = parseInt(qty.value) - 1;
                    loadCart();
                } else {
                    alert(response);
                }
            }
        }

        request.open("POST", "incrementcartqtyprocess.php", true);
        request.send(f);
    }

}

function reload() {
    window.location.reload();
}


function removefromcart(x) {
    // alert(x);
    if (confirm("Are You Sure Deleting This Item")) {

        var f = new FormData();
        f.append("c", x);
        var request = new XMLHttpRequest();

        request.onreadystatechange = function () {
            if (request.status == 200 && request.readyState == 4) {
                var response = request.responseText;
                swal("SUCCESS..!", response, "success")
                    .then((value) => {
                        window.location.reload();
                    });

            }
        }

        request.open("POST", "RemoveCartprocess.php", true);
        request.send(f);
    }


}

function checkOut() {
    // alert("ok");

    var f = new FormData();
    f.append("cart", true);

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.status == 200 && request.readyState == 4) {
            var responese = request.responseText;
            //alert(responese);
            var payment = JSON.parse(responese);
            doCheckout(payment, "checkuotProcess.php");

        }
    }

    request.open("POST", "PaymentProcess.php", true);
    request.send(f);
}

function doCheckout(payment, path) {


    // Payment completed. It can be a successful failure.
    payhere.onCompleted = function onCompleted(orderId) {
        console.log("Payment completed. OrderID:" + orderId);


        // Note: validate the payment and show success or failure page to the customer

        var f = new FormData();
        f.append("payment", JSON.stringify(payment));

        var request = new XMLHttpRequest();
        request.onreadystatechange = function () {
            if (request.status == 200 && request.readyState == 4) {
                var responese = request.responseText;

                var order = JSON.parse(responese);

                if (order.resp == "Success") {
                    window.location = "invoice.php?orderId=" + order.order_id;;
                } else {
                    alert(responese);
                }



            }
        }

        request.open("POST", path, true);
        request.send(f);

    };

    // Payment window closed
    payhere.onDismissed = function onDismissed() {
        // Note: Prompt user to pay again or show an error page

        console.log("Payment dismissed");
    };

    // Error occurred
    payhere.onError = function onError(error) {
        // Note: show an error page
        console.log("Error:" + error);
    };



    // Show the payhere.js popup, when "PayHere Pay" is clicked
    // document.getElementById('payhere-payment').onclick = function (e) {
    payhere.startPayment(payment);
    //};


}

function buyNow(stockId) {
    // alert(stockId);

    var qty = document.getElementById("qty");

    if (qty.value > 0) {
        // alert("ok");

        var f = new FormData();
        f.append("cart", false);
        f.append("stockId", stockId);
        f.append("qty", qty.value);

        var request = new XMLHttpRequest();
        request.onreadystatechange = function () {
            if (request.status == 200 && request.readyState == 4) {
                var responese = request.responseText;
                // alert(responese);  
                var payment = JSON.parse(responese);
                payment.stock_id = stockId;
                payment.qty = qty.value;
                doCheckout(payment, "BuynowProcess.php");
            }
        }

        request.open("POST", "PaymentProcess.php", true);
        request.send(f);


    } else {
        alert("Plese Enter Valid Quantity");
    }

}

function forgetPassword() {
    // alert("ok");

    var email = document.getElementById("e");

    if (email.value != "") {
        // alert("ok");

        var f = new FormData();
        f.append("e", email.value);

        var request = new XMLHttpRequest();

        request.onreadystatechange = function () {
            if (request.status == 200 && request.readyState == 4) {
                var responese = request.responseText;
                //  alert(responese); 
                if (responese == "success") {
                    document.getElementById("msg1").innerHTML = "Email Send Please Check Your Email Box";
                    document.getElementById("msg1").className = "alert alert-success";
                    document.getElementById("msgdiv1").className = "d-block";
                } else {
                    document.getElementById("msg1").innerHTML = responese;
                    document.getElementById("msg1").className = "alert alert-danger";
                    document.getElementById("msgdiv1").className = "d-block";
                }
            }
        }



        request.open("POST", "forgetpasswordprocess.php", true);
        request.send(f);


    } else {
        alert("Plese Enter Your Valid Email.");
    }

}

function resetpassword() {
    var vcode = document.getElementById("vcode");
    var np = document.getElementById("np");
    var np2 = document.getElementById("np2")

    var f = new FormData();
    f.append("vcode", vcode.value);
    f.append("np", np.value);
    f.append("np2", np2.value);

    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
        if (request.status == 200 && request.readyState == 4) {
            var responese = request.responseText;
            //  alert(responese);
            if (responese == "success") {
                window.location = "signin.php";
            } else {
                document.getElementById("msg1").innerHTML = responese;
                document.getElementById("msg1").className = "alert alert-danger";
                document.getElementById("msgdiv1").className = "d-block";
            }

        }
    }



    request.open("POST", "resetPasswordProcess.php", true);
    request.send(f);

}


