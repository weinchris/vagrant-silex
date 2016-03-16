USE silex;

-- PREFILL YOUR TABLES HERE
INSERT INTO blog_post (title, text, author, created_at) VALUES ('New Title', 'This is the content', 'master', CURRENT_DATE);
INSERT INTO users (username, password) VALUES ('master', 'abc');