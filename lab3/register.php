<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
</head>
<body>
    <main class="page-container d-flex align-items-center justify-content-center">
        <section class="form-panel card border-0 shadow-sm">
            <div class="card-body p-4 p-md-5">
                <header class="page-heading text-center mb-4">
                    <h1 class="display-heading">Create Your Account</h1>
                </header>

                <form action="register_process.php" method="post" class="registration-form">
                    <div class="row g-3">
                        <div class="col-12 col-md-6">
                            <label class="form-label" for="first-name">First Name</label>
                            <input class="form-control" id="first-name" name="first_name" type="text" autocomplete="given-name" required>
                        </div>

                        <div class="col-12 col-md-6">
                            <label class="form-label" for="last-name">Last Name</label>
                            <input class="form-control" id="last-name" name="last_name" type="text" autocomplete="family-name" required>
                        </div>

                        <div class="col-12">
                            <label class="form-label" for="email-address">Email Address</label>
                            <input class="form-control" id="email-address" name="email" type="email" autocomplete="email" required>
                        </div>

                        <div class="col-12">
                            <label class="form-label" for="account-password">Password</label>
                            <div class="input-group">
                                <input class="form-control" id="account-password" name="password" type="password" minlength="5" maxlength="20" autocomplete="new-password" aria-describedby="password-guidance" required>
                                <button class="btn btn-outline-secondary password-toggle" type="button" data-password-target="account-password" aria-controls="account-password" aria-pressed="false">Show</button>
                            </div>
                            <small class="password-guidance" id="password-guidance">Use 5–20 characters with an uppercase letter, a lowercase letter, and a number. Spaces and special characters are not allowed.</small>
                        </div>

                        <div class="col-12">
                            <label class="form-label" for="password-confirmation">Confirm Password</label>
                            <div class="input-group">
                                <input class="form-control" id="password-confirmation" name="confirm_password" type="password" autocomplete="new-password" required>
                                <button class="btn btn-outline-secondary password-toggle" type="button" data-password-target="password-confirmation" aria-controls="password-confirmation" aria-pressed="false">Show</button>
                            </div>
                        </div>

                        <div class="col-12 col-md-6">
                            <label class="form-label" for="birth-date">Birthday</label>
                            <input class="form-control" id="birth-date" name="birthday" type="date" required>
                        </div>

                        <fieldset class="col-12 col-md-6 gender-fieldset">
                            <legend class="form-label">Gender</legend>
                            <div class="row g-2">
                                <div class="col-6">
                                    <label class="gender-option" for="male-gender">
                                        <input class="form-check-input" id="male-gender" name="gender" type="radio" value="Male" required>
                                        <span>Male</span>
                                    </label>
                                </div>
                                <div class="col-6">
                                    <label class="gender-option" for="female-gender">
                                        <input class="form-check-input" id="female-gender" name="gender" type="radio" value="Female">
                                        <span>Female</span>
                                    </label>
                                </div>
                            </div>
                        </fieldset>

                        <div class="col-12">
                            <label class="form-label" for="selected-course">Course</label>
                            <select class="form-select" id="selected-course" name="course" required>
                                <option value="">Select your course</option>
                                <option value="BS Information Technology (BSIT)">BS Information Technology (BSIT)</option>
                                <option value="BS Nursing (BSN)">BS Nursing (BSN)</option>
                                <option value="BS Criminology (BSC)">BS Criminology (BSC)</option>
                                <option value="BS Elementary Education (BEED)">BS Elementary Education (BEED)</option>
                                <option value="BS Secondary Education (BSED)">BS Secondary Education (BSED)</option>
                                <option value="BS Tourism Management (BSTM)">BS Tourism Management (BSTM)</option>
                            </select>
                        </div>

                        <div class="col-12">
                            <button class="btn btn-primary submit-button" type="submit">Register</button>
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </main>

    <script>
        function changePasswordVisibility(inputId, toggleButton) {
            const passwordInput = document.getElementById(inputId);
            const passwordIsHidden = passwordInput.type === "password";

            passwordInput.type = passwordIsHidden ? "text" : "password";
            toggleButton.textContent = passwordIsHidden ? "Hide" : "Show";
            toggleButton.setAttribute("aria-pressed", String(passwordIsHidden));
        }

        document.querySelectorAll(".password-toggle").forEach(function (toggleButton) {
            toggleButton.addEventListener("click", function () {
                changePasswordVisibility(this.dataset.passwordTarget, this);
            });
        });
    </script>
</body>
</html>
