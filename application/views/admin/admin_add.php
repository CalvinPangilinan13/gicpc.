<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TBTayo! | Add Admin</title>
    <link rel="icon" href="<?php echo base_url('assets/images/lakbay.png'); ?>" type="image/png">
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url('assets/icon/simple-line-icons/css/simple-line-icons.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/plugins/bootstrap/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/main.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/responsive.css') ?>">

    <style>
        body {
            font-family: 'Ubuntu', sans-serif;
            background-color: #f4f7fa;
        }

        .content-wrapper {
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: calc(100vh - 60px);
            padding-top: 30px;
            padding-bottom: 30px;
        }

        .main-container {
            max-width: 480px;
            width: 100%;
            background: #ffffff;
            border-radius: 1rem;
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.08);
            padding: 2.5rem;
            text-align: center;
        }

        .main-container h4 {
            font-size: 1.8rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
            color: #333;
        }

        .main-container p {
            font-size: 0.95rem;
            color: #6c757d;
            margin-bottom: 1.5rem;
        }

        .form-label {
            font-weight: 600;
            text-align: left;
            display: block;
            margin-bottom: 0.5rem;
            color: #333;
        }

        .form-label::before {
            content: '📌 ';
        }

        .form-control {
            border-radius: 2rem;
            padding: 0.75rem 1.25rem;
            border: 1px solid #ccc;
            transition: border 0.3s ease-in-out;
        }

        .form-control:focus {
            border-color: #007bff;
            box-shadow: 0 0 0 0.15rem rgba(0, 123, 255, 0.25);
        }

        .btn-primary {
            border-radius: 2rem;
            padding: 0.6rem 1.5rem;
            font-weight: 600;
            background: linear-gradient(135deg, #007bff, #0056b3);
            border: none;
            transition: all 0.3s ease;
            color: #fff;
            display: inline-flex;
            align-items: center;
            gap: 0.4rem;
            justify-content: center;
        }

        .btn-primary:hover {
            background: linear-gradient(135deg, #0056b3, #003f88);
        }

        #password-requirements {
            text-align: left !important;
            padding-left: 0.5rem;
        }

        .is-invalid {
            border-color: #dc3545;
            box-shadow: 0 0 0 0.15rem rgba(220, 53, 69, 0.25);
        }
    </style>
</head>

<body class="sidebar-mini fixed">

    <div class="wrapper">
        <?php include APPPATH . 'views/admin/include/header.php'; ?>
        <?php include APPPATH . 'views/admin/include/sidebar.php'; ?>

        <div class="content-wrapper">
            <div class="main-container">
                <h4>👨‍💼 Add Admin</h4>
                <p>📝 Register a new admin account</p>

                <div class="alert alert-success alert-dismissible" id="success" style="display:none;">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                </div>

                <form id="adminForm">
                    <div class="mb-3 text-start">
                        <label class="form-label">Full Name</label>
                        <input class="form-control" type="text" name="name" id="name" placeholder="Enter full name"
                            required>
                    </div>

                    <div class="mb-3 text-start">
                        <label class="form-label">Email</label>
                        <input class="form-control" type="email" name="email" id="email" placeholder="Enter email"
                            required>
                    </div>

                    <div class="mb-3 text-start">
                        <label class="form-label">Password</label>
                        <input class="form-control" type="password" name="password" id="password"
                            placeholder="Enter password" required>

                        <ul id="password-requirements" class="list-unstyled mt-2 text-start small">
                            <li id="length" class="text-danger">❌ Minimum 8 characters</li>
                            <li id="lowercase" class="text-danger">❌ At least one lowercase letter</li>
                            <li id="uppercase" class="text-danger">❌ At least one uppercase letter</li>
                            <li id="number" class="text-danger">❌ At least one number</li>
                            <li id="special" class="text-danger">❌ At least one special character</li>
                        </ul>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary" id="butsave">➕ Submit</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="<?php echo base_url('assets/plugins/Jquery/dist/jquery.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/plugins/jquery-ui/jquery-ui.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/plugins/tether/dist/js/tether.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/plugins/bootstrap/js/bootstrap.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/js/main.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/menu.min.js'); ?>"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        $(document).ready(function () {
            function validatePasswordCriteria(password) {
                const lengthValid = password.length >= 8;
                const lowercaseValid = /[a-z]/.test(password);
                const uppercaseValid = /[A-Z]/.test(password);
                const numberValid = /[0-9]/.test(password);
                const specialValid = /[\W_]/.test(password);

                function update(id, valid, text) {
                    $('#' + id)
                        .toggleClass('text-success', valid)
                        .toggleClass('text-danger', !valid)
                        .text((valid ? '✅' : '❌') + ' ' + text);
                }

                update('length', lengthValid, 'Minimum 8 characters');
                update('lowercase', lowercaseValid, 'At least one lowercase letter');
                update('uppercase', uppercaseValid, 'At least one uppercase letter');
                update('number', numberValid, 'At least one number');
                update('special', specialValid, 'At least one special character');

                // Return true only if all criteria pass
                return lengthValid && lowercaseValid && uppercaseValid && numberValid && specialValid;
            }

            $('#password').on('input', function () {
                const password = $(this).val();
                validatePasswordCriteria(password);
            });

            $('#butsave').on('click', function (e) {
                e.preventDefault();

                const name = $('#name').val().trim();
                const email = $('#email').val().trim();
                const password = $('#password').val();

                let isValidPassword = validatePasswordCriteria(password);
                let hasError = false;

                if (!name) {
                    $('#name').addClass('is-invalid');
                    hasError = true;
                } else {
                    $('#name').removeClass('is-invalid');
                }

                if (!email) {
                    $('#email').addClass('is-invalid');
                    hasError = true;
                } else {
                    $('#email').removeClass('is-invalid');
                }

                if (!password || !isValidPassword) {
                    $('#password').addClass('is-invalid');
                    hasError = true;
                    if (!isValidPassword) {
                        alert('⚠️ Password does not meet all strength requirements.');
                    }
                } else {
                    $('#password').removeClass('is-invalid');
                }

                if (hasError) {
                    return;
                }

                $("#butsave").attr("disabled", true);

                $.ajax({
                    url: "<?php echo base_url('admin/Admin/savedata'); ?>",
                    type: "POST",
                    data: {
                        type: 1,
                        name: name,
                        email: email,
                        password: password
                    },
                    cache: false,
                    success: function (dataResult) {
                        const result = JSON.parse(dataResult);
                        $('#adminForm').trigger("reset");

                        if (result.statusCode === 200) {
                            $("#butsave").removeAttr("disabled");
                            $("#success").html('✅ Admin added successfully!').fadeIn().delay(3000).fadeOut();

                            // Reset password criteria
                            $('#password-strength-bar').css('width', '0%');
                            $('#password-strength-label').text('');
                            $('#password-requirements li')
                                .removeClass('text-success')
                                .addClass('text-danger')
                                .each(function () {
                                    $(this).text($(this).text().replace('✅', '❌'));
                                });
                        } else {
                            alert("❌ Error occurred!");
                        }
                    },
                    error: function () {
                        $("#butsave").removeAttr("disabled");
                        alert("❌ Network error. Please try again.");
                    }
                });
            });
        });
    </script>


</body>
<?php include APPPATH . 'views/admin/include/footer.php'; ?>

</html>