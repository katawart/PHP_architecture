CREATE TABLE home_user_profiles
(
    profile_id VARCHAR(60) NOT NULL, 
    email VARCHAR(60) NOT NULL, 
    validated BINARY NOT NULL DEFAULT 0,
    first_name VARCHAR(60),
    last_name VARCHAR(60),
    middle_name VARCHAR(60),
    main_phone VARCHAR(14),
    mobile_phone VARCHAR(14),
    fax_number VARCHAR(14),
    PRIMARY KEY(profile_id)
);

CREATE TABLE addresses
(
    building_name VARCHAR(60),
    building_number VARCHAR(10),
    post_code VARCHAR(8) NOT NULL,
    street VARCHAR(40),
    district VARCHAR(40),
    towncity VARCHAR(40),
    county VARCHAR(40),
    country VARCHAR(40) DEFAULT '
);