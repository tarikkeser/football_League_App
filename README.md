## Login Credentials

# ADMIN  
- username: admin
- password: admin123

# REGULAR 
- username: regular
- password: regular123

# VIEW
- No username or password required.


## About the Project Structure
What's included:

- Docker setup including:
  - PHP interpreter
  - NGINX server
  - MySQL (MariaDB) database
  - PHP MyAdmin
- A directory structure organized around the MVC pattern
- A locally included routing utility: [https://github.com/steampixel/simplePHPRouter](https://github.com/steampixel/simplePHPRouter)

## Usage
- Start local

In a terminal, from the cloned/forked/download project folder, run:

```bash
docker compose up
```

NGINX will now serve files in the app/public folder. Visit localhost in your browser to check.
PHPMyAdmin is accessible on localhost:8080

If you want to stop the containers, press Ctrl+C.

Or run:

```bash
docker compose down
```

