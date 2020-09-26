serve:
	@@echo Starting server...
	php spark serve

migrate:
	php spark migrate

cc:
	php spark cache:clear

refresh:
	@@echo Does a rollback followed by a latest to refresh the current state of the database
	php spark migrate:refresh

seeder:
	@@echo Run seeder...
	php spark db:seed RolesLevelSeeder \
	&& php spark db:seed UserSeeder \
	&& php spark db:seed CategoriesSeeder \
	&& php spark db:seed FloorsSeeder \
	&& php spark db:seed ShiftsSeeder \