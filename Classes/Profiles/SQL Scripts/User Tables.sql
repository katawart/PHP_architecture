CREATE TABLE user_logins
    (
        profile_id VARCHAR(60) NOT NULL,
        password VARCHAR(40) NOT NULL,
        account_type VARCHAR(20) NOT NULL DEFAULT 'user',
        PRIMARY KEY (profile_id)
    ) 