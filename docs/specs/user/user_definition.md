# User Definition

## Summary

A 'user' represents a person who acceses the system. A user must belong to an 'organization' and have an email address.
A user can be identified by APIs via the user_uuid, any relations made within the database should use the user_id field.

An user is associated with a organization through the organization_user table.

## Properties

* user_id
* name_first
* name_middle
* name_last
* email_primary
* user_uuid
* password_hash
* reset_password_hash
* reset_password_dtm
* disabled
* created_dtm

## Functions

* CreateUser
* UpdateUser
* DisableUser
* SetPassword
* ResetPasswordRequest
* LogIn
* LogOut

## API

### CreateUser

#### Required Parameters

1. name_first
2. name_last
3. email_primary
4. password

#### Optional Fields

name_middle

#### URL

/user

#### Create Summary

The create user function is invoked when a POST request is made to the user route. If all required parameters are valid, a record is inserted into the 'user' table/collection. The user_uuid should be created using the database UUID function output as a value.
The email_primary value must be unique to every individual user. The default value of disabled should be false (0).

The password value must be hashed before inserting into the database.

#### Responses

Success: 201 (Created)
Exists:  409 (Conflict)
Invalid Request: 400 (Bad Request)

#### Error Responses

Error responses are composed of a JSON object that contains
the HTTP status code and an array of error messages.

##### 409

~~~~json
{
    "code":409,
    "errors": [
        "A user with that email address <email> already exists.",
    ]
}
~~~~

##### 400

~~~~json
{
    "code":400,
    "errors": [
        "Missing/Invalid parameters",
    ]
}
~~~~

### UpdateUser

#### UpdateUser Required Parameters

1. user_uuid

#### UpdateUser Optional Fields

* name_first
* name_middle
* name_last
* email_primary

#### UpdateUser URL

/user/<user_id>

#### UpdateUser Summary

The update user function is invoked when a PUT request is made to the user route. If all required parameters are valid, a record is updated in the 'user' table/collection.

This method should only be accessible to the logged in user, or a user with administrative privileges.

The email_primary value must be unique to every individual user. Setting the email_primary field to a value in another record should result in an error.

The UpdateUser function should not allow for reassigning the organization_id, or user_id. If a user were to switch organizations, a new user record should be created for them.

The UpdateUser function should not modify the 'disabled' column.

The UpdateUser function is not allowed to change the value of the password column.

#### UpdateUser Responses

Success: 200 (OK)
User id does not exist:  404 (Not Found)
Invalid Request: 400 (Bad Request)
email_primary already exists: 409 (Conflict)

#### UpdateUser Error Responses

Error responses are composed of a JSON object that contains
the HTTP status code and an array of error messages.

##### UpdateUser 400

~~~~json
{
    "code":400,
    "errors": [
        "Missing/Invalid parameters",
    ]
}
~~~~

##### UpdateUser 404

~~~~json
{
    "code":404,
    "errors": [
        "User Not Found",
    ]
}
~~~~

##### UpdateUser 409

~~~~json
{
    "code":409,
    "errors": [
        "A user with that email address <email> already exists.",
    ]
}
~~~~

### UpdateUser DisableUser

#### DisableUser Required Parameters

1. user_uuid

#### DisableUser Optional Fields

None

#### DisableUser URL

/user/disable/<user_id>

#### DisableUser Summary

The DisableUser function is invoked when a PUT request is made to the user/disable route. If all required parameters are valid, a record is updated in the 'user' table/collection.

This method should only be accessible to a user with administrative privileges.

This function will toggle the value stored in the disabled property from false (0) to true (1) or true to false depending on the current value.

#### DisableUser Responses

Success: 200 (OK)
User id does not exist:  404 (Not Found)
Invalid Request: 400 (Bad Request)

#### DisableUser Error Responses

Error responses are composed of a JSON object that contains
the HTTP status code and an array of error messages.

##### DisableUser 400

~~~~json
{
    "code":400,
    "errors": [
        "Missing/Invalid parameters",
    ]
}
~~~~

##### DisableUser 404

~~~~json
{
    "code":404,
    "errors": [
        "User Not Found",
    ]
}
~~~~

### SetPassword

#### SetPassword Required Parameters

1. user_uuid
2. password

#### SetPassword Optional Fields

None

#### SetPassword URL

/user/<user_uuid>/set_password

#### SetPassword Summary

The SetPassword is used to update the hashed value in the user password_hash field.

The password should be hashed with a method to be determined (bcrpyt for now).

#### SetPassword Responses

Success: 200 (OK)
User id does not exist:  404 (Not Found)
Invalid Request: 400 (Bad Request)

#### SetPassword Error Responses

Error responses are composed of a JSON object that contains
the HTTP status code and an array of error messages.

##### SetPassword 400

~~~~json
{
    "code":400,
    "errors": [
        "Missing/Invalid parameters",
    ]
}
~~~~

##### 404

~~~~json
{
    "code":404,
    "errors": [
        "User Not Found",
    ]
}
~~~~

### ResetPasswordRequest

#### ResetPasswordRequest Required Parameters

1. email_primary

#### ResetPasswordRequest Optional Fields

None

#### ResetPasswordRequest URL

/user/set_password_request?email=\<url encoded email_primary\>

#### ResetPasswordRequest Summary

The ResetPasswordRequest generates a unique hash value a store it in password_reset_hash. The reset_password_dtm is also set to the datetime stamp of the request. A message/URL can then be sent to the user via their email_primary. That link will allow them to change their password within a time specified.

#### ResetPasswordRequest Responses

Success: 200 (OK)
Email_primary does not exist:  404 (Not Found)
Invalid Request: 400 (Bad Request)

#### ResetPasswordRequest Error Responses

Error responses are composed of a JSON object that contains
the HTTP status code and an array of error messages.

##### ResetPasswordRequest 400

~~~~json
{
    "code":400,
    "errors": [
        "Missing/Invalid parameters",
    ]
}
~~~~

##### ResetPasswordRequest 404

~~~~json
{
    "code":404,
    "errors": [
        "User Not Found",
    ]
}
~~~~

### LogIn

#### LogIn Required Parameters

1. email_primary
2. password

#### LogIn Optional Fields

None

#### LogIn HTTP METHOD

POST

#### LogIn URL

/user/login

#### LogIn Summary

The Login request is made via a POST request to the URL. The email and password fields must be contained in the body of the request.

The value of the password string is hashed and the users table is searched for a record with matching email and password_hash values.

If a record is found, a session is created. The user_id value of the record is stored in the session.

#### LogIn Responses

Success: 200 (OK)
Incorrect Login: 404 (Credentials not found.)
Invalid Request: 400 (Bad Request)

#### LogIn Error Responses

Error responses are composed of a JSON object that contains
the HTTP status code and an array of error messages.

##### LogIn 400

~~~~json
{
    "code":400,
    "errors": [
        "Missing/Invalid parameters",
    ]
}
~~~~

##### LogIn 404

~~~~json
{
    "code":404,
    "errors": [
        "Credentials Not Found",
    ]
}
~~~~

### LogOut

#### LogOut Required Parameters

Valid Session

#### LogOut Optional Fields

None

#### LogOut URL

/user/logout

#### LogOut Summary

The Logout request is made via a GET request to the URL. The active session is destroyed.

#### LogOut Responses

Success: 200 (OK)
Invalid Request: 400 (Bad Request)

#### LogOut Error Responses

Error responses are composed of a JSON object that contains
the HTTP status code and an array of error messages.

##### LogOut 400

~~~~json
{
    "code":400,
    "errors": [
        "Missing/Invalid parameters",
    ]
}
~~~~
