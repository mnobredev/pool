# pool
Final project PHP-side

listener.php - Recieves 3 arguments in clr (chlorine is water), ph and mac (unique identifier in the Arduino that sends the values)
It registers this values in the database plus current time (server side).
Also verifies if all 3 last readings are bellow or above normal values, if so sends an alert.