# Project Definition

## Summary

A 'project' represents a body of work conducted on behalf of an organization. It is associated with an organization by the organization_id foreign key which references the organization.organization_id. A project can be identified by APIs via the project_uuid, any relations made within the database should use the project_id field.

An organization is associated with a user through the organization_project table.

## Properties

* project_id
* organization_id
* name
* status
  * inactive
  * active
  * closed
  * archived
* project_uuid
* last_updated_by
* last_updated_dtm
* created_by
* created_dtm

## Functions

* Create
* Update

## API

### Create

#### Required Parameters

1. organization_id
2. name


#### Optional Fields

none

#### URL

/project

#### Summary

The create function is invoked when a POST request is made to the project route. If all required parameters are valid, a record is inserted into the 'project' table/collection. 
The default value of status is 'inactive'.
The project_uuid should be created using the database UUID function output as a value.


#### Responses

Success: 201 (Created)
Invalid Request: 400 (Bad Request)

#### Error Responses

Error responses are composed of a JSON object that contains 
the HTTP status code and an array of error messages.


##### 400

~~~~json
{
    "code":400,
    "errors": [
        "Missing/Invalid parameters",
    ]
}
~~~~

### Update

#### Required Parameters

1. id


#### Optional Fields

* name
* status



#### URL

/project/<project_id>

#### Summary

The update project function is invoked when a PUT request is made to the project route. If all required parameters are valid, a record is updated in the 'project' table/collection. 

This method should only be accessible to the logged in user, or a user with administrative privileges.

The update method should translate a status 'word' into a status code and save the status code.

The Update function should not allow for reassigning the organization_id, project_id, or project_uuid. If a project were to switch organizations, a new project record should be created.

#### Responses

Success: 200 (OK)
project_id does not exist:  404 (Not Found)
Invalid Request: 400 (Bad Request)


#### Error Responses

Error responses are composed of a JSON object that contains 
the HTTP status code and an array of error messages.

##### 400

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
        " Not Found",
    ]
}
~~~~
