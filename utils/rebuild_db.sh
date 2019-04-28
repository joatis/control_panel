#!/bin/bash
user='test_admin'
pass='test_admin'
data_base_name='control_panel'
cmd="mysql -u$user -p$pass"

error_exit()
{
	echo "$1" 1>&2
	exit 1
}

create_files=(
    'create_db.sql' 
    'create_organization.sql'
    'create_user.sql'
    'create_organization_user.sql'
    'create_project.sql'
)
for i in ${create_files[@]}; do
    if $cmd --database=$data_base_name < ../docs/schema/${i}; then
        echo "OK processed ${i}"
    else 
        error_exit "FAILED processing ${i}"
    fi
done
echo "COMPLETED rebuilding control_panel database."
exit 0;
