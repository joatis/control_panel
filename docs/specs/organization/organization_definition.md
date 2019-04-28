# Organization Definition

## Description

An 'organization' represents an entity that owns projects, groups and users within the system. Each organization name should be unique. An organization can be identified by APIs via the organization_uuid, any relations made within the database should use the organization_id field.

An organization is associated with a user through the organization_user table.
An organization is associated with a project through the organization_project table.

## Properties

* organization_id
* name
* disabled
* organization_uuid
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

The create organization function is invoked when a POST request is made to the organization api route. If all required parameters are valid, a record is inserted into the 'organization' table/collection.
The name value must be unique to every individual organization. The default value of disabled should be false (0).
The organization_uuid should be created using the database UUID function output as a value.

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
