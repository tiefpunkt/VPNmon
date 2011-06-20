CREATE TABLE certificate (id INTEGER PRIMARY KEY AUTOINCREMENT, cname VARCHAR(255), email VARCHAR(255));
CREATE TABLE vpn_session (id INTEGER PRIMARY KEY AUTOINCREMENT, certificate_id INTEGER, ip VARCHAR(40), port INTEGER, time_start DATETIME, duration INTEGER, bytes_received INTEGER, bytes_sent INTEGER, instance VARCHAR(255), created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL);
