#!/bin/bash
user='test_admin'
pass='test_admin'
data_base_name='control_panel'
cmd="mysql -u$user -p$pass"
schema_files=$(ls ../docs/schema/*.sql);
SCRIPTPATH="$( cd "$(dirname "$0")" ; pwd -P )"
ls -l $SCRIPTPATH/../docs/schema/create_db.sql
test=$(ls -l $SCRIPTPATH/../docs/schema/create_db.sql)
created=$($cmd < $SCRIPTPATH/../docs/schema/create_db.sql)

echo "Creating control_panel database..."
if [ $created > 0 ]
then 
echo "Failed to create database. $?"
return 1;
fi 

echo "Creating organization table..."
created=$($cmd --database=$data_base_name < ../docs/schema/create_organization.sql)
if [ $created > 0 ]
then 
echo "Failed to create organization table. $?"
return 1;
fi

echo "Creating user table..."
created=$($cmd --database=$data_base_name < ../docs/schema/create_user.sql)
if [ $created > 0 ]
then 
echo "Failed to create user table. $?"
fi

echo "Creating organization_user table..."
created=$($cmd --database=$data_base_name < ../docs/schema/create_organization_user.sql)
if [ $created > 0 ]
then 
echo "Failed to create organization_user table. $?"
fi

echo "Creating project table..."
created=$($cmd --database=$data_base_name < ../docs/schema/create_project.sql)
if [ $created > 0 ]
then 
echo "Failed to create project table. $?"
fi

exit;