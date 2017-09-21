SELECT detections.id, detections.time
	FROM detections
	WHERE detections.devices_serial_id = ANY(
		SELECT devices.serial_id
		FROM devices
		JOIN users
		ON users.id = devices.users_id AND users.id = 2
	)
	ORDER BY detections.id;



	        query = "CREATE TABLE " + TABLE_PRODUCTS + "(" +
                COLUMN_ID + " INTEGER PRIMARY KEY AUTOINCREMENT, " +
                COLUMN_PRODUCTNAME + " TEXT " +
                ");";



CREATE TABLE table_products (
	id INTEGER PRIMARY KEY AUTOINCREMENT, 
	product_name TEXT
	);
