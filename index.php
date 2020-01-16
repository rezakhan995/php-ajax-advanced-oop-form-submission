<!doctype html>
<html lang="en">
<head>
    <title>Report Form</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootswatch/4.3.1/flatly/bootstrap.min.css">
    <link href="includes/tagsinput.css" rel="stylesheet" type="text/css">
    <style>
        body {
            background-color: #fafafa;
        }

        .container {
            margin: 150px auto;
        }

        h2 {
            margin: 20px auto;
            font-size: 14px;
        }

        .badge {
            margin: 2px 5px;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <center><h1>Report Form</h1></center>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12" id="full_error_div">
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <form id="form" method="post">
                <div class="row col-md-12 input-group" style="padding-bottom: 5px">
                    <label class="col-md-3" for="amount">Amount</label>
                    <input class="form-control col-md-9" type="number" name="amount" id="amount" placeholder="Amount"
                           required=""
                           autofocus/>
                    <span id="amount_error"></span>
                </div>

                <div class="row col-md-12 input-group" style="padding-bottom: 5px">
                    <label class="col-md-3" for="buyer">Buyer</label>
                    <input class="form-control" type="text" name="buyer" size="255" id="buyer" placeholder="buyer"
                           required=""/>
                    <span id="buyer_error"></span>
                </div>

                <div class="row col-md-12 input-group" style="padding-bottom: 5px">
                    <label class="col-md-3" for="receipt_id">Receipt ID</label>
                    <input class="form-control col-md-9" type="text" name="receipt_id" size="20" id="receipt_id"
                           placeholder="receipt id"
                           required=""/>
                    <span id="receipt_id_error"></span>
                </div>

                <div class="row col-md-12 input-group" style="padding-bottom: 5px">
                    <input class="form-control col-md-6" data-role="tagsinput" value="" type="text" name="items"
                           id="items" placeholder="comma separated items" required=""/>
                    <span id="items_error"></span>
                </div>
                <div class="row col-md-12 input-group" style="padding-bottom: 5px">
                    <label class="col-md-3" for="buyer_email">Buyer Email</label>
                    <input class="form-control col-md-9" type="email" name="buyer_email" size="50" id="buyer_email"
                           placeholder="buyer email" required=""/>
                    <span id="buyer_email_error"></span>
                </div>

                <div class="row col-md-12 input-group" style="padding-bottom: 5px">
                    <label class="col-md-3" for="note">Note</label>
                    <input class="form-control col-md-9" type="text" name="note" id="note" placeholder="note"
                           required=""/>
                    <span id="note_error"></span>
                </div>

                <div class="row col-md-12 input-group" style="padding-bottom: 5px">
                    <label class="col-md-3" for="city">City</label>
                    <input class="form-control col-md-9" type="text" name="city" size="20" id="city" placeholder="city"
                           required=""/>
                    <span id="city_error"></span>
                </div>
                <div class="row col-md-12 input-group" style="padding-bottom: 5px">
                    <label class="col-md-3" for="phone">Phone</label>

                    <div class="input-group-prepend">
                        <span class="input-group-text">880</span>
                    </div>
                    <input class="form-control col-md-9" type="number" name="phone" size="20" id="phone"
                           placeholder="17XXXXXXXXX" required=""/>
                    <span id="phone_error"></span>
                </div>

                <div class="row col-md-12 input-group" style="padding-bottom: 5px">
                    <label class="col-md-3" for="entry_by">Entry By</label>
                    <input class="form-control col-md-9" type="number" name="entry_by" id="entry_by"
                           placeholder="entry by"
                           required=""/>
                    <span id="entry_by_error"></span>
                </div>

                <div class="row col-md-12 input-group" style="padding-bottom: 5px">
                    <div class="col-md-6">
                        <button style="float: right" class="btn btn-success" id="btn_submit">
                            <span>Submit</span>
                        </button>
                    </div>
                    <div class="col-md-6">
                        <div style="float: left" class="btn btn-danger" id="btn_report">
                            <span>View Report</span>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

</div>
</body>
</html>

<script type="text/javascript" src="includes/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/typeahead.js/0.11.1/typeahead.bundle.min.js"></script>
<script src="includes/tagsinput.js"></script>
<script type="text/javascript">

    var _gaq = _gaq || [];
    _gaq.push(['_setAccount', 'UA-36251023-1']);
    _gaq.push(['_setDomainName', 'jqueryscript.net']);
    _gaq.push(['_trackPageview']);

    (function () {
        var ga = document.createElement('script');
        ga.type = 'text/javascript';
        ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0];
        s.parentNode.insertBefore(ga, s);
    })();

</script>
<script type="text/javascript">

    $(document).ready(function () {
        $(document).on('click', '#btn_report', function (e) {
            window.location = "view_report.php";
        });
        $(document).on('click', '#btn_submit', function (e) {
            console.log("pressed");
            var amount = $("#amount").val();
            var buyer = $("#buyer").val();
            var receipt_id = $("#receipt_id").val();
            var items = $("#items").val();
            var buyer_email = $("#buyer_email").val();
            var note = $("#note").val();
            var city = $("#city").val();
            var phone = "880" + $("#phone").val();
            var entry_by = $("#entry_by").val();

            var error = 0;

            function emailIsValid(email) {
                return /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-_]+\.[a-zA-Z]{2,6}$/.test(email)
            }

            function phoneIsValid(phone) {
                return /(^(880){1}(1|2){1}(\d){7,9})$/.test(phone)
            }

            function buyerIsValid(buyer) {
                return /^[a-zA-Z 0-9]{2,20}$/.test(buyer)
            }

            function textIsValid(text) {
                return /^[a-zA-Z]{2,20}$/.test(text)
            }

            function itemIsValid(item) {
                return /^[a-zA-Z ,]{2,255}$/.test(item)
            }

            function cityIsValid(city) {
                return /^[a-zA-Z ]{2,20}$/.test(city)
            }

            if (amount === '' || amount == null) {
                let error_div = document.getElementById("amount_error");
                error_div.style.display = "block";
                error_div.style.backgroundColor = "#ffcccc";
                error_div.innerHTML = "Amount is required";
                error++;
            } else if (typeof parseInt(amount) != 'number') {
                let error_div = document.getElementById("amount_error");
                error_div.style.display = "block";
                error_div.style.backgroundColor = "#ffcccc";
                error_div.innerHTML = "Must be a number";
                error++;
            } else {
                let error_div = document.getElementById("amount_error");
                error_div.style.display = "none";
            }

            if (buyer === '' || buyer == null) {
                let error_div = document.getElementById("buyer_error");
                error_div.style.display = "block";
                error_div.style.backgroundColor = "#ffcccc";
                error_div.innerHTML = "Buyer is required";
                error++;
            } else if (!buyerIsValid(buyer)) {
                let error_div = document.getElementById("buyer_error");
                error_div.style.display = "block";
                error_div.style.backgroundColor = "#ffcccc";
                error_div.innerHTML = "Invalid buyer [Only character, numbers and space. Not more than 20 characters.]";
                error++;
            } else {
                let error_div = document.getElementById("buyer_error");
                error_div.style.display = "none";
            }

            if (receipt_id === '' || receipt_id == null) {
                let error_div = document.getElementById("receipt_id_error");
                error_div.style.display = "block";
                error_div.style.backgroundColor = "#ffcccc";
                error_div.innerHTML = "Receipt is required";
                error++;
            } else if (!textIsValid(receipt_id)) {
                let error_div = document.getElementById("receipt_id_error");
                error_div.style.display = "block";
                error_div.style.backgroundColor = "#ffcccc";
                error_div.innerHTML = "Invalid receipt [Only character. Not more than 20 characters.]";
                error++;
            } else {
                let error_div = document.getElementById("receipt_id_error");
                error_div.style.display = "none";
            }

            if (items === '' || items == null) {
                let error_div = document.getElementById("items_error");
                error_div.style.display = "block";
                error_div.style.backgroundColor = "#ffcccc";
                error_div.innerHTML = "Items is required";
                error++;
            } else if (!itemIsValid(items)) {
                let error_div = document.getElementById("items_error");
                error_div.style.display = "block";
                error_div.style.backgroundColor = "#ffcccc";
                error_div.innerHTML = "Invalid item [Only character and , is valid. Not more than 255 characters.]";
                error++;
            } else {
                let error_div = document.getElementById("items_error");
                error_div.style.display = "none";
            }

            if (buyer_email === '' || buyer_email == null) {
                let error_div = document.getElementById("buyer_email_error");
                error_div.style.display = "block";
                error_div.style.backgroundColor = "#ffcccc";
                error_div.innerHTML = "Email is required";
                error++;
            } else if (buyer_email.length > 50) {
                let error_div = document.getElementById("buyer_email_error");
                error_div.style.display = "block";
                error_div.style.backgroundColor = "#ffcccc";
                error_div.innerHTML = "Not more than 50 characters";
                error++;
            } else if (!emailIsValid(buyer_email)) {
                let error_div = document.getElementById("buyer_email_error");
                error_div.style.display = "block";
                error_div.style.backgroundColor = "#ffcccc";
                error_div.innerHTML = "Invalid email";
                error++;
            } else {
                let error_div = document.getElementById("buyer_email_error");
                error_div.style.display = "none";
            }

            if (note === '' || note == null) {
                let error_div = document.getElementById("note_error");
                error_div.style.display = "block";
                error_div.style.backgroundColor = "#ffcccc";
                error_div.innerHTML = "Note is required";
                error++;
            } else if (note.length > 30) {
                let error_div = document.getElementById("note_error");
                error_div.style.display = "block";
                error_div.style.backgroundColor = "#ffcccc";
                error_div.innerHTML = "Not more than 30 characters";
                error++;
            } else {
                let error_div = document.getElementById("note_error");
                error_div.style.display = "none";
            }

            if (city === '' || city == null) {
                let error_div = document.getElementById("city_error");
                error_div.style.display = "block";
                error_div.style.backgroundColor = "#ffcccc";
                error_div.innerHTML = "City is required";
                error++;
            } else if (!cityIsValid(city)) {
                let error_div = document.getElementById("city_error");
                error_div.style.display = "block";
                error_div.style.backgroundColor = "#ffcccc";
                error_div.innerHTML = "Invalid city [Only character and space. Not more than 20 characters.]";
                error++;
            } else {
                let error_div = document.getElementById("city_error");
                error_div.style.display = "none";
            }

            if (phone === '' || phone == null) {
                let error_div = document.getElementById("phone_error");
                error_div.style.display = "block";
                error_div.style.backgroundColor = "#ffcccc";
                error_div.innerHTML = "Phone is required";
                error++;
            } else if (!phoneIsValid(phone)) {
                let error_div = document.getElementById("phone_error");
                error_div.style.display = "block";
                error_div.style.backgroundColor = "#ffcccc";
                error_div.innerHTML = "Invalid phone";
                error++;
            } else {
                let error_div = document.getElementById("phone_error");
                error_div.style.display = "none";
            }

            if (entry_by === '' || entry_by == null) {
                let error_div = document.getElementById("entry_by_error");
                error_div.style.display = "block";
                error_div.style.backgroundColor = "#ffcccc";
                error_div.innerHTML = "Entry By is required";
                error++;
            } else if ((typeof parseInt(entry_by) != 'number') || (entry_by.toString().length > 10)) {
                let error_div = document.getElementById("entry_by_error");
                error_div.style.display = "block";
                error_div.style.backgroundColor = "#ffcccc";
                error_div.innerHTML = "Must be a number within 10 digit";
                error++;
            } else {
                let error_div = document.getElementById("entry_by_error");
                error_div.style.display = "none";
            }
            if (error > 0) {
                e.preventDefault();
                console.log(error);
            } else {
                var timezone = Intl.DateTimeFormat().resolvedOptions().timeZone;
                $.ajax({
                    type: "POST",
                    url: "function.php",
                    ContentType: 'application/json',
                    data: {
                        amount: amount,
                        buyer: buyer,
                        receipt_id: receipt_id,
                        items: items,
                        buyer_email: buyer_email,
                        note: note,
                        city: city,
                        phone: phone,
                        entry_by: entry_by,
                        timezone: timezone
                    }
                    ,
                    success: function (data) {
                        let full_error_div = document.getElementById("full_error_div");
                        if (data === 'true') {
                            full_error_div.style.display = "block";
                            full_error_div.style.backgroundColor = "#c4ffc4";
                            full_error_div.innerHTML = "Form submitted successfully";
                            document.getElementById("amount").value = '';
                            document.getElementById("buyer").value = "";
                            document.getElementById("receipt_id").value = "";
                            document.getElementById("items").value = "";
                            document.getElementById("buyer_email").value = "";
                            document.getElementById("note").value = "";
                            document.getElementById("city").value = "";
                            document.getElementById("phone").value = "";
                            document.getElementById("entry_by").value = "";
                        } else {
                            full_error_div.style.display = "block";
                            full_error_div.style.backgroundColor = "#ffcccc";
                            full_error_div.innerHTML = data.toString();
                        }
                    }
                });
            }
            return false;
        });
    });
</script>