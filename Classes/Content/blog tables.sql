CREATE TABLE blogs
    (
        blog_id MEDIUMINT NOT NULL AUTO_INCREMENT,
        user_id VARCHAR(60) NOT NULL,
        date DATE NOT NULL,
        file VARCHAR(2000),
        PRIMARY KEY (blog_id),
        FOREIGN KEY (user_id) REFERENCES user_logins(profile_id)
    )