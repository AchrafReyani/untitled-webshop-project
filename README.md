# Untitled Webshop Project

A simple webshop application built with PHP and MariaDB, designed to run easily in Docker containers.

---

## Features

- User registration and login
- Product listing and detail pages
- Shopping cart functionality
- Order creation and checkout
- Contact and password management pages

---

## Screenshot

![Webshop Screenshot](images/screenshot.png)

---

## Getting Started

### Prerequisites

- [Docker Desktop](https://www.docker.com/products/docker-desktop/) installed and running
- [Docker Compose](https://docs.docker.com/compose/) (included with Docker Desktop)

---

### Clone the Repository

```sh
git clone https://github.com/AchrafReyani/untitled-webshop-project.git
cd untitled-webshop-project
```

---

### Environment Variables

A `.env` file is already provided with the necessary variables.  
If you need to change them, edit the `.env` file in the project root:

```
MYSQL_ACHRAF_WEBSHOP_DATABASE=achraf_webshop
MYSQL_ACHRAF_WEBSHOP_USER=WebShopUser
MYSQL_ACHRAF_WEBSHOP_PASSWORD=mBAgRiGMZe7wPq5WAjb6
MYSQL_ROOT_PASSWORD=wachtwoord
```

---

### Running the App

1. **Build the Docker images:**

    ```sh
    docker-compose build
    ```

2. **Start the containers:**

    ```sh
    docker-compose up
    ```

3. **Access the webshop:**

    Open your browser and go to [http://localhost:8081](http://localhost:8081)

---

### Stopping the App

To stop the containers, press `Ctrl+C` in the terminal where Docker is running, then run:

```sh
docker-compose down
```

---

## Database

- The MariaDB database is initialized with scripts from the `Database/` folder.
- Data is persisted in a Docker volume (`data`).

---

## Project Structure

```
.
├── controllers/         # PHP controllers
├── models/              # PHP models
├── views/               # HTML/PHP views
├── Database/            # SQL initialization scripts
├── images/              # App images and screenshots
├── Dockerfile           # Docker build instructions
├── docker-compose.yml   # Docker Compose configuration
├── .env                 # Environment variables
└── README.md            # This file
```

---

## Author

### Achraf Reyani