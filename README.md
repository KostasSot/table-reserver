This is a table reservation app created with Laravel as a framework,Bootstrap 4 and Jquery for front-end and MySQL database.First of all in order to run the app you must: 1)install composer to the app's directory
			 2)install npm to the app's directory
			 3) restore the sql file to the table_reserver database(the restore is required for the admins and operating hours)
A middleware was created in order to check if you are logged in as an admin user or a regular user in order to direct you to the appropriate controller for the correct view of the website.

As an admin user you can create/delete/edit table reservations, change the operating hours, choose the table and the client adn you can choose the date.The table won't be available 90minutes before and after reservation so the time the app gives you will be changed after reservation.

As a regular user you can only create/cancel a reservation.

You can also register as a new regular user but for the purpose of the tests i created some accounts.

Admin account: username: admin@localhost with password 12341234
Regular users: username: user@localhost with password 12341234
	       username: user2@localhost with password 12341234
