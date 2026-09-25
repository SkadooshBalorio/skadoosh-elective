<?php

function identifyPasswordErrors($enteredPassword, $confirmedPassword)
{
    $passwordErrors = [];
    $passwordFormat = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])[A-Za-z0-9]{5,20}$/";

    if (!preg_match($passwordFormat, $enteredPassword)) {
        $passwordErrors[] = "Password must be 5-20 characters with an uppercase letter, a lowercase letter, and a number. Spaces and special characters are not allowed.";
    }

    if ($enteredPassword !== $confirmedPassword) {
        $passwordErrors[] = "Passwords do not match.";
    }

    return $passwordErrors;
}

function escapeForPage($value)
{
    return htmlspecialchars((string) $value, ENT_QUOTES, "UTF-8");
}

$firstName = $_POST["first_name"];
$lastName = $_POST["last_name"];
$emailAddress = $_POST["email"];
$birthDate = $_POST["birthday"];
$genderSelection = $_POST["gender"];
$courseSelection = $_POST["course"];
$password = $_POST["password"];
$passwordConfirmation = $_POST["confirm_password"];

$passwordErrors = identifyPasswordErrors($password, $passwordConfirmation);
$registrationSucceeded = count($passwordErrors) === 0;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Result</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
</head>
<body>
    <main class="page-container d-flex align-items-center justify-content-center">
        <section class="result-panel card border-0 shadow-sm">
            <div class="card-body p-4 p-md-5">
                <?php if ($registrationSucceeded) { ?>
                    <header class="status-heading text-center mb-4">
                        <span class="badge rounded-pill status-badge success-badge">Accepted</span>
                        <h1>Registration Successful</h1>
                        <p>Your student information has been received.</p>
                    </header>

                    <dl class="details-list">
                        <div>
                            <dt>First Name</dt>
                            <dd><?php echo escapeForPage($firstName); ?></dd>
                        </div>
                        <div>
                            <dt>Last Name</dt>
                            <dd><?php echo escapeForPage($lastName); ?></dd>
                        </div>
                        <div>
                            <dt>Email</dt>
                            <dd><?php echo escapeForPage($emailAddress); ?></dd>
                        </div>
                        <div>
                            <dt>Birthday</dt>
                            <dd><?php echo escapeForPage($birthDate); ?></dd>
                        </div>
                        <div>
                            <dt>Gender</dt>
                            <dd><?php echo escapeForPage($genderSelection); ?></dd>
                        </div>
                        <div>
                            <dt>Course</dt>
                            <dd><?php echo escapeForPage($courseSelection); ?></dd>
                        </div>
                        <div>
                            <dt>Password</dt>
                            <dd class="valid-value">Valid</dd>
                        </div>
                    </dl>
                <?php } else { ?>
                    <header class="status-heading text-center mb-4">
                        <span class="badge rounded-pill status-badge error-badge">Not Accepted</span>
                        <h1>Registration Failed</h1>
                        <p>Please correct the following problems and try again.</p>
                    </header>

                    <div class="alert alert-danger problem-alert" role="alert">
                        <ul class="problem-list mb-0">
                            <?php foreach ($passwordErrors as $passwordError) { ?>
                                <li><?php echo escapeForPage($passwordError); ?></li>
                            <?php } ?>
                        </ul>
                    </div>
                <?php } ?>

                <a class="btn btn-primary submit-button mt-4" href="register.php">
                    <?php echo $registrationSucceeded ? "Back to Registration" : "Try Again"; ?>
                </a>
            </div>
        </section>
    </main>
</body>
</html>
