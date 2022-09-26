<!doctype html>
<html lang="en">
<?php include "db.php"; ?>

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
    <!-- Bootstrap CSS -->
    <script src = "https://cdnjs.cloudflare.com/ajax/libs/twbs-pagination/1.4.1/jquery.twbsPagination.min.js"> </script>  

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="dist/simplePagination.css" />
<script src="dist/jquery.simplePagination.js"></script>
    <title>Hello, world!</title>
</head>

<body>

    <div class="container">
        <div class="alert alert-info text-center mb-5">Bootstrap</div>
        <div class="row">
            <div class="col-md-5">
                <form action="" id="myform" method="post">
                    <div class="alert alert-info text-center mb-5">Add</div>
                    <input type="hidden" id="myid">
                    <div class="col-md-12 mb-2">
                        <label class="form-label">Name *</label>
                        <input type="text" id="name" class="form-control" require autocomplete="off" placeholder="Enter your name">

                    </div>
                    <div class="col-md-12 mb-2">
                        <label class="form-label">Password *</label>
                        <input type="password" id="pass" class="form-control" require autocomplete="off" placeholder="Enter your Password">

                    </div>
                    <div class="col-md-4 mb-2">
                        <input type="submit" id="save" class="form-control btn btn-info btn-sm" value="submit">

                    </div>
                    <div id='fmsg'>
                        <!-- <div id="msg" style="display:none;" class="alert alert-danger text-success"></div> -->
                        <div id="msg" style="display:none;" class="alert alert-warning alert-dismissible fade show" role="alert">
                        </div>

                    </div>

                </form>
            </div>
            <div class="col-md-7">
                <div class="alert alert-info text-center mb-5">View</div>
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search" id="search">

                </div>

                <div class="col-md-12">


                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Name</th>
                                <th scope="col">Password</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody id="tbody" class="text-center">
                            <!-- <tr>
                                <th scope="row">1</th>
                                <td>Mark</td>
                                <td>Otto</td>
                                <td>

                                </td>
                            </tr> -->

                        </tbody>
                        

                    </table>
                    <h2 id="h2" class="content_status text-center"></h2>


                     
                        <!-- <div id="msg" style="display:none;" class="alert alert-danger text-success"></div> -->
                        <div id="dmsg" style="display:none;" class="alert alert-danger alert-dismissible fade show" role="alert">
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->

    <script src="js/jquery.js"></script>
    <!-- <script src="js/pagination.js"></script> -->


    <script>
        $(document).ready(function() {


//             $('#pagination-container').pagination({
//     dataSource: [1, 2, 3, 4, 5, 6, 7, ... , 195],
//     callback: function(data, pagination) {
//         // template method of yourself
//         var html = template(data);
//         $('#data-container').html(html);
//     }
// })
            //add data



            $('#save').click(function(e) {
                e.preventDefault();
                // console.log('ho');
                let id = $('#myid').val();

                let nm = $('#name').val();
                let pass = $('#pass').val();


                let mydata = {
                    id: id,
                    name: nm,
                    password: pass
                };

                $.ajax({
                    url: "insert.php",
                    method: "post",
                    data: mydata,
                    success: function(data) {
                        $('#msg').html(data).show();
                        $('#fmsg').show();

                        show_data();




                    }

                })

                $('#myform')[0].reset();




            });


            //show data


            function show_data() {
                let output = '';
                j = 1;
                $.ajax({
                    url: 'showdata.php',
                    method: "get",
                    dataType: 'JSON',
                    success: function(data) {
                        //   console.log(data);
                        x = data;
                        for (i = 0; i < x.length; i++) {
                            output += "<tr><td>" + j + "</td> <td>" + x[i].name + "</td><td>" + x[i].password + "</td><td><button id='btnedit' data-eid=" + x[i].id + " class='btn btn-sm btn-info'>Edit</button> <button id='btndelete' data-did=" + x[i].id + "  class='btn btn-sm btn-danger'>Delete</button></td></tr>"
                            j++;
                        }
                        $('#tbody').html(output);
                    }

                })
            }
            show_data();






            //delete data

            $('#tbody').on("click", "#btndelete", function() {
                // console.log('clicked');
                let id = $(this).attr('data-did');
                // console.log(id);
                mythis = this;

                $.ajax({
                    url: "delete.php",
                    method: "post",
                    data: {
                        id: id
                    },
                    success: function(data) {

                        $(mythis).closest('tr').fadeOut(500);
                        // setTimeout(function() {
                        //     location.reload();
                        // }, 1000);
                        $('#dmsg').html(data).show();
                        show_data();


                    }

                })

            });


            //edit data
            $('#tbody').on("click", "#btnedit", function() {
                let id = $(this).attr('data-eid');
                $.ajax({
                    url: "edit.php",
                    method: "post",
                    data: {
                        id: id
                    },
                    dataType: 'json',
                    success: function(data) {
                        x = data;

                        $('#myid').val(x.id);
                        $('#name').val(x.name);
                        $('#pass').val(x.password);



                    }


                });

            });

            //search
            $("#search").on("keyup", function() {
                let output = '';
                j = 1;
                let given = $(this).val();

                console.log(given)
                $.ajax({
                    url: 'search.php',
                    method: 'post',
                    data: {
                        name: given
                    },
                    dataType: 'JSON',
                    success: function(data) {
                        //   console.log(data);
                        x = data;
                        if (data.status == "failed") {

                            $('.content_status').text(data.message).show();
                            $('#tbody').hide();


                        } else {


                            for (i = 0; i < x.length; i++) {
                                output += "<tr><td>" + j + "</td> <td>" + x[i].name + "</td><td>" + x[i].password + "</td><td><button id='btnedit' data-eid=" + x[i].id + " class='btn btn-sm btn-info'>Edit</button> <button id='btndelete' data-did=" + x[i].id + "  class='btn btn-sm btn-danger'>Delete</button></td></tr>"
                                j++;
                            }
                            $('#tbody').html(output).show();
                            $('.content_status').hide();


                        }

                    }


                });

            });






        });



        
    </script>













</body>

</html>