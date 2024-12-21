-- Create user
DO $$
BEGIN
    CREATE USER ddd WITH PASSWORD 'qwerty123';
EXCEPTION WHEN duplicate_object THEN NULL;
END
$$;

-- Create databases (without DO blocks)
SELECT 'CREATE DATABASE ddd WITH OWNER = ddd ENCODING = UTF8'
    WHERE NOT EXISTS (SELECT FROM pg_database WHERE datname = 'ddd')\gexec

SELECT 'CREATE DATABASE ddd_test WITH OWNER = ddd ENCODING = UTF8'
    WHERE NOT EXISTS (SELECT FROM pg_database WHERE datname = 'ddd_test')\gexec

-- Grant privileges
GRANT ALL PRIVILEGES ON DATABASE ddd TO ddd;
GRANT ALL PRIVILEGES ON DATABASE ddd_test TO ddd;