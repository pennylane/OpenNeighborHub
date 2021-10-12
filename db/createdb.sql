CREATE ROLE onh WITH PASSWORD '';
/*
If you forget entering the password here, set it with
ALTER ROLE onh PASSWORD '';
*/
CREATE DATABASE openneighborhub WITH ENCODING 'UTF8' LC_COLLATE 'en_US.UTF-8' LC_CTYPE 'en_US.UTF-8' OWNER onh;
