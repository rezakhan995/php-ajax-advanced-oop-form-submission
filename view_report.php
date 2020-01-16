<?php
/**
 * Created by PhpStorm.
 * User: rezakhan
 * Date: 11/27/2019
 * Time: 01:51 AM
 */
include "./db/connection.php";
?>


<!doctype html>
<html lang="en">
<head>
    <title>Report List</title>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
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
            <center><h1>Report List</h1></center>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="row input-group" style="padding-bottom: 5px">
                <div class="input-group-prepend" style="cursor: pointer" id="search">
                    <span class="input-group-text">Search</span>
                </div>
                <input class="form-control" type="text" id="buyer" placeholder="search by buyer name"/>
                <input class="form-control" type="date" id="from"/>
                <input class="form-control" type="date" id="to"/>
                <span style="margin-left: 5px" class="btn btn-info" id="form_page">Form</span>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <table id="example" class="table table-striped table-bordered table-hover" style="width:100%">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Amount</th>
                    <th>Buyer</th>
                    <th>Receipt ID</th>
                    <th>Items</th>
                    <th>E-mail</th>
                    <th>IP</th>
                    <th>Note</th>
                    <th>City</th>
                    <th>Phone</th>
                    <th>Hash</th>
                    <th>Entry date</th>
                    <th>Entry By</th>
                </tr>
                </thead>
                <tbody id="table_body">
                <?php
                $dbCOnnection = new Connection();
                $alldata = $dbCOnnection->select("*")->from("tbl_report")->order_by("id", "DESC")->get();
                $i = 1;
                foreach ($alldata as $singleData) {
                    ?>
                    <tr>
                        <td><?php echo $i;
                            $i++; ?></td>
                        <td><?php echo $singleData["amount"]; ?></td>
                        <td><?php echo $singleData["buyer"]; ?></td>
                        <td><?php echo $singleData["receipt_id"]; ?></td>
                        <td><?php echo $singleData["items"]; ?></td>
                        <td><?php echo $singleData["buyer_email"]; ?></td>
                        <td><?php echo $singleData["buyer_ip"]; ?></td>
                        <td><?php echo $singleData["note"]; ?></td>
                        <td><?php echo $singleData["city"]; ?></td>
                        <td><?php echo $singleData["phone"]; ?></td>
                        <td><?php echo $singleData["hash_key"]; ?></td>
                        <td><?php echo $singleData["entry_date"]; ?></td>
                        <td><?php echo $singleData["entry_by"]; ?></td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>

<script type="text/javascript" src="./includes/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $(document).on("click", "#form_page", function(){
            window.location = "index.php";
        });

        $(document).on("click", "#search", function () {
            var buyer = $("#buyer").val();
            var from = $("#from").val();
            var to = $("#to").val();

            $.ajax({
                type: "POST",
                url: "search.php",
                data: {
                    buyer: buyer,
                    from: from,
                    to: to
                },
                ContentType: "application/json",
                success: function (data) {
                    var output = jQuery.parseJSON(data);
                    var table_body = document.getElementById("table_body");
                    var htmldata = "";
                    var i = 1;
                    for (row of
                    output
                    )
                    {
                        let amount = row.amount;
                        let buyer = row.buyer;
                        let receipt_id = row.receipt_id;
                        let buyer_email = row.buyer_email;
                        let buyer_ip = row.buyer_ip;
                        let note = row.note;
                        let city = row.city;
                        let phone = row.phone;
                        let hash_key = row.hash_key;
                        let entry_date = row.entry_date;
                        let items = row.items;
                        let entry_by = row.entry_by;

                        htmldata += "<tr><td>" + i + "</td><td>" + amount + "</td><td>" + buyer + "</td><td>" + receipt_id + "</td><td>" + items + "</td><td>" + buyer_email + "</td><td>" + buyer_ip + "</td><td>" + note + "</td><td>" + city + "</td><td>" + phone + "</td><td>" + hash_key + "</td><td>" + entry_date + "</td><td>" + entry_by + "</td></tr>";
                        i++;
                    }
                    table_body.innerHTML = htmldata;
                }
            });
        })
    });
</script>
