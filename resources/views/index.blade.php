<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <title>Document</title>
    <style>
        #success_message{
            display: none;
        }
    </style>
</head>
<body>
<div class="container">

    <form class="well form-horizontal" action="{{route('registered')}}" method="post"  id="contact_form" enctype="multipart/form-data">
        @csrf
        <fieldset>

            <!-- Form Name -->
            <legend><center><h2><b>Registration Form</b></h2></center></legend><br>

            <!-- Text input-->

            <div class="form-group">
                <label class="col-md-4 control-label">First Name</label>
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input  name="name" placeholder=" Name" class="form-control"  type="text">
                    </div>
                </div>
            </div>
            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label">E-Mail</label>
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                        <input name="email" placeholder="E-Mail Address" class="form-control"  type="text">
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label" >Password</label>
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input name="password" placeholder="Password" class="form-control"  type="password">
                    </div>
                </div>
            </div>

            <!-- Text input-->

            @if(session('danger'))
                <h3>{{session('danger')}}</h3>
            @endif

            <!-- Success message -->
            <div class="alert alert-success" role="alert" id="success_message">Success <i class="glyphicon glyphicon-thumbs-up"></i> Success!.</div>

            <!-- Button -->
            <div class="form-group">
                <label class="col-md-4 control-label"></label>
                <div class="col-md-4"><br>
                    <button class="btn btn-warning"> Submit</button>
                </div>
            </div>

        </fieldset>
    </form>
</div>
</div><!-- /.container -->

<script>
    $(document).ready(function() {
        $('#contact_form').bootstrapValidator({
            // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                first_name: {
                    validators: {
                        stringLength: {
                            min: 2,
                        },
                        notEmpty: {
                            message: 'Please enter your First Name'
                        }
                    }
                },
                last_name: {
                    validators: {
                        stringLength: {
                            min: 2,
                        },
                        notEmpty: {
                            message: 'Please enter your Last Name'
                        }
                    }
                },
                user_name: {
                    validators: {
                        stringLength: {
                            min: 8,
                        },
                        notEmpty: {
                            message: 'Please enter your Username'
                        }
                    }
                },
                user_password: {
                    validators: {
                        stringLength: {
                            min: 8,
                        },
                        notEmpty: {
                            message: 'Please enter your Password'
                        }
                    }
                },
                confirm_password: {
                    validators: {
                        stringLength: {
                            min: 8,
                        },
                        notEmpty: {
                            message: 'Please confirm your Password'
                        }
                    }
                },
                email: {
                    validators: {
                        notEmpty: {
                            message: 'Please enter your Email Address'
                        },
                        emailAddress: {
                            message: 'Please enter a valid Email Address'
                        }
                    }
                },
                contact_no: {
                    validators: {
                        stringLength: {
                            min: 12,
                            max: 12,
                            notEmpty: {
                                message: 'Please enter your Contact No.'
                            }
                        }
                    },
                    department: {
                        validators: {
                            notEmpty: {
                                message: 'Please select your Department/Office'
                            }
                        }
                    },
                }
            }
        })
            .on('success.form.bv', function(e) {
                $('#success_message').slideDown({ opacity: "show" }, "slow") // Do something ...
                $('#contact_form').data('bootstrapValidator').resetForm();

                // Prevent form submission
                e.preventDefault();

                // Get the form instance
                var $form = $(e.target);

                // Get the BootstrapValidator instance
                var bv = $form.data('bootstrapValidator');

                // Use Ajax to submit form data
                $.post($form.attr('action'), $form.serialize(), function(result) {
                    console.log(result);
                }, 'json');
            });
    });
</script>
</body>
</html>
