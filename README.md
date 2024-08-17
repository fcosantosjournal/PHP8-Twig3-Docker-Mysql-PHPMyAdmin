# Creation of the TTR Docker container for the development environment

## Clone this project

Create on folder called *Site* inside of your *Documents* folder

Go there using your terminal and clone the repository using the link bellow and your credentials.

git clone https://yourbitbucketuser:yourpasswordapp@bitbucket.org/zuvinova/dockercontainer/src/main/ .

## Change your Keys and passwords on config.sh file.
Go in the file config.sh and change your passwords, database and usernames, this is necessary to run the container.

Your app password can be generated here: https://bitbucket.org/account/settings/app-passwords/

## Install the Docker Desktop application

Mac Apple Chip https://desktop.docker.com/mac/main/arm64/Docker.dmg 

Mac Intel Chip https://desktop.docker.com/mac/main/amd64/Docker.dmg

Windows https://desktop.docker.com/win/main/amd64/Docker%20Desktop%20Installer.exe  

Linux https://docs.docker.com/desktop/linux/install/

If You receive any errors when you open the docker about permissions, run this commands in your terminal, changing ttr by your user on MAC. 

```
cd /Users/ttr
sudo mkdir .docker
sudo chown ttr .docker
``` 

## In VSCode install the Docker extension

In VSCode, in the extensions tab, search for "ms-azuretools.vscode-docker" from Microsoft and install it.

## Running Docker Composer and building for the first time

First of all, run - *Docker Desktop Manager*

When you run it for the first time, and if you use VSCode.

You can start the Docker container using the Docker Composer command inside VSCode as below:

![alt text](readme_images/image.png)


Or you can use the terminal inside VSCode to do this as below:

![alt text](readme_images/image-1.png)

Or you can use the terminal you prefer and run the following command inside the Documents/Site folder:

```
    docker compose -f "docker-compose.yml" up -d --build
```

## Attach inside the container

After the last step in the Docker Desktop Application you can attach inside the Container terminal as:

![alt text](readme_images/image-3.png)

Note:
It is possible to attach in the container terminal using the Docker extension as well:

![alt text](readme_images/image-4.png)

Using this You will be inside the Linux terminal of the container inside the folder */var/www/html*

## Change the variables in the shell script called config.sh in the Site folder

![alt text](readme_images/image-5.png)

In the Container terminal, go to the /var/www folder

```
cd /var/www
```

Now run the script *./script* and press enter

```
./script.sh
```

If all is well, you'll get this message:

![alt text](readme_images/image-7.png)


But if you get an error during the indexing process, you can run a command line from the *manticore-indices-indexer.sh* file and it will only run one index in the indexing process.

![alt text](readme_images/image-6.png)

## Restarting the container

After finishing the process, please stop and run the container again, or restart the container.

![alt text](readme_images/image-8.png)

## Creating the host redirection on MacOS System

```
nano /etc/hosts ( on MacOS )
127.0.0.1 www.ttrvm
127.0.0.1 ttrvm
127.0.0.1 ttrdata
```

## Please check your htaccess files like this.

Please check the comment lines in the file, if it's different please comment the lines.

/Users/[yourUser]/Documents/Site/vhosts/ttrecord.com/httpdocs/backoffice/.htaccess

![alt text](readme_images/image-11.png)

/Users/[yourUser]/Documents/Site/vhosts/ttrecord.com/httpdocs/.htaccess

![alt text](readme_images/image-12.png)

## Checking the system

Please go to the link:

https://ttrvm/

Log in with your e-mail address and password

Go to the link below and check the search box at the top of the page.

https://ttrvm/pt/zona-exclusiva/transaccoes/mergers-and-acquisitions/?offset=0&keep=1

![alt text](readme_images/image-9.png)

## TTR Command

If you receive the message to restart the machine everything is ok, and You will be abble to run ttr commands like bellow:

Inside of terminal of container terminal or attached in there use:

```
ttr
```
and explore the options or go to */var/www* folder in the container terminal and run:

```
cd /var/www
bash ./ttr.sh
``` 

![alt text](readme_images/image-10.png)
