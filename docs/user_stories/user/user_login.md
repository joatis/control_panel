# User Log In

When a user navigates to the home page, an empty session is started, they are presented with a log in form.

The user enters their email address and password.
If the credentials are correct, and the account is not disabled, they continue to their 'home page'. Their user name and preferences are stored in the session.

If the user's account has been disabled, the error message "Account disabled" is shown to the user. The attempt is logged and a notification is sent to the administrators.

If the email address supplied is not valid, an error message saying "User email not found."

If their email address exists but the password is incorrect, an error message "Password incorrect." is displayed. A counter is incremented for each failed attempt. If the counter reaches 3, the failed login is logged and a notification is sent to the user and adminsitrators.

The log in form will also have a link reading "Forgot Password?" When the user clicks on this link, they see a form asking them for their email address. If they enter a valid email address, a hash is generated and saved with their user record. An email is sent to that email address with the hash value in the query string. The hash will only be valid for 24 hours, after which a new hash will need to be generated.
Clicking on a valid reset link will bring the user to the password reset form. Completing the form will update the password hash and the user will then be logged in.

