# Creation of the TTR Docker container for the development environment

## Clone this project
https://github.com/fcosantosjournal/PHP8-Twig3-Docker-Mysql-PHPMyAdmin.git

## Change your path folder on ./vscode/launch.json file.
Go in the file launch.json and change the path to your path folder.

```json
{
    "version": "0.2.0",
    "configurations": [
        {
            "name": "Listen for XDebug",
            "type": "php",
            "request": "launch",
            "port": 9003,
            "pathMappings": {
                "/var/www/html": "workspaceFolder"
            }
        }
    ]
}
```

## Install the Docker Desktop application

Mac Apple Chip https://desktop.docker.com/mac/main/arm64/Docker.dmg 

Mac Intel Chip https://desktop.docker.com/mac/main/amd64/Docker.dmg

Windows https://desktop.docker.com/win/main/amd64/Docker%20Desktop%20Installer.exe  

Linux https://docs.docker.com/desktop/linux/install/

If You receive any errors when you open the docker about permissions, run this commands in your terminal, changing ttr by your user on MAC. 

## In VSCode install the Docker extension

In VSCode, in the extensions tab, look for my recomandations and install the Docker extension.
You can see my recomandations in the extensions.json file in the .vscode folder.

## Running Docker Composer and building for the first time

First of all, run - *Docker Desktop Manager*

When you run it for the first time, and if you use VSCode.

You can start the Docker container using the Docker Composer command inside VSCode as below:

```
  docker compose -f "docker-compose.yml" up -d --build
```

## Attach inside the container

After the last step in the Docker Desktop Application, you can see the container running on http://localhost:8080

You can access the PHPMyAdmin on http://localhost:8081

## If you have any problems with the ports, you can change them in the docker-compose.yml file.

Please check or change your ports or passwords in the docker-compose.yml file.

## Access the container to install the dependencies doing the following command using the name of the container

```
  docker exec -it php-container bash
```

## Inside the container, you can install the dependencies using the composer

```
  cd ..
  composer install
```	
