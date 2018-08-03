# Organization Definition

## Description

An 'organization' represents a group of organizations that access the system. Each organization name should be unique.

## Properties

* organization_id
* name
* disabled
* created_dtm

## Functions

* CreateOrganization
* UpdateOrganization
* DisableOrganization

## API

### CreateOrganization

#### Required Parameters

1. name

#### Optional Fields

None

#### URL

api/organization

#### Summary

The create organization function is invoked when a POST request is made to the organization route. If all required parameters are valid, a record is inserted into the 'organization' table/collection.
The name value must be unique to every individual organization. The default value of disabled should be false (0).

#### Responses

Success: 201 (Created)
Exists:  409 (Conflict)
Invalid Request: 400 (Bad Request)

#### Error Responses

Error responses are composed of a JSON object that contain
the HTTP status code and an array of error messages.

##### 409

~~~~json
{
    "code":409,
    "errors": [
        "A organization with that name: <name> already exists.",
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
