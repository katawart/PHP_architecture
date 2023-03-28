CREATE TABLE user_logins
(
    profile_id VARCHAR(60) PRIMARY KEY,
    password VARCHAR(40) NOT NULL,
    account_type VARCHAR(20) NOT NULL
   
)