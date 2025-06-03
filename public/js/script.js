// $(document).ready(function () {
//     $.ajaxSetup({
//         headers: {
//             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//         }
//     });

//     $('#sendOtpButton').on('click', function () {
//         $.ajax({
//             url: '{{ route("send.otp") }}',
//             method: 'POST',
//             data: {
//                 email: $('#otpEmail').val()
//             },
//             success: function (response) {
//                 $('#message').text(response.success).css('color', 'green');
//             },
//             error: function (xhr) {
//                 if (xhr.status === 422) {
//                     let errors = xhr.responseJSON.errors;
//                     if (errors.email) {
//                         $('#message').text(errors.email[0]).css('color', 'red');
//                     }
//                 }
//             }
//         });
//     });
// });
    const signUpButton = document.getElementById('signUp');
    const signInButton = document.getElementById('signIn');
    const forgotPasswordButton = document.getElementById('forgotPassword');
    const backToSignInButton = document.getElementById('backToSignIn');
    const container = document.getElementById('container');

    signUpButton.addEventListener('click', () => {
        container.classList.remove("forgot-panel-active");
        container.classList.add("right-panel-active");
    });

    signInButton.addEventListener('click', () => {
        container.classList.remove("right-panel-active");
        container.classList.remove("forgot-panel-active");
    });

    forgotPasswordButton.addEventListener('click', (e) => {
        e.preventDefault();
        container.classList.remove("right-panel-active");
        container.classList.add("forgot-panel-active");
    });

    backToSignInButton.addEventListener('click', () => {
        container.classList.remove("forgot-panel-active");
    });

    document.addEventListener("DOMContentLoaded", function () {
        const password = document.querySelector('input[name="password"]');
        const confirm = document.querySelector('input[name="confirmpassword"]');

        const errorMessage = document.createElement("small");
        errorMessage.classList.add("text-danger");
        confirm.parentNode.insertBefore(errorMessage, confirm.nextSibling);

        confirm.addEventListener("input", function () {
            if (confirm.value !== password.value) {
                errorMessage.textContent = "Mật khẩu xác nhận không khớp.";
            } else {
                errorMessage.textContent = "";
            }
        });
    });
    
    