# Docker API
This project has containerized system designed to deliver a seamless user experience. APIs facilitate data flow between the backend applications and the frontend web interface.

# Project Directory
- [Nodejs-API] (./node-jsapi)
- [Python-API] (./python-api)
- [Web-frontend] (./web-front)

-Table of contents
Architecture
Functionalities
Requirements
setup
    nodejs-api
    python-api
    web-frontend
    integration of containers

## Setup

Clone and explore the project. If you have your own repository you can use SSH key and integrated it your Git account for secure connection.

    ```bash
    # clone docker projects
    git clone git@<gitlink>.git
    ```

### Nodejs-API
1. Explore the JS API directory.

    ```bash
    # change directory
    cd nodejs-api

    # list and check the files within the JS API folder
    ls
    # .dockerignore         - used to exclude files and directories
    # index.js              - entrypoint of the code
    # package.json          - nodejs metadata, includes libraries and other info
    # package-lock.json     - other packages and dependencies
    ```

2. Use Dockerfile to build the JS-API container image.

    ```bash
    # build image
    docker build -t js-api:v1 .

    # list images to view the js-api image
    docker image ls
    # REPOSITORY                    TAG              IMAGE ID       CREATED         SIZE
    # js-api                        v1               1e73c6e65a6d   7 minutes ago   173MB
    ```

3. Run a JS API container using the image that just built.

    ```bash
    # run the JS API container
    docker run -d -p 80:3000 --name microservice-jsapi js-api:v1
    # -d                        # detached mode
    # -p 80:3000                # mapping ports - local port:container port
    # --name microservice-jsapi # set name of container
    # js-api:v1                 # image name and tag

    # list running containers
    docker ps
    # CONTAINER ID   IMAGE       COMMAND                  CREATED              STATUS              PORTS                  NAMES
    # 665839ec9f05   js-api:v1   "docker-entrypoint.s…"   About a minute ago   Up About a minute   0.0.0.0:80->3000/tcp   microservice-jsapi
    ```

4. Test and access the API via command line and browser.

    ```bash
    curl http://localhost/
    # StatusCode        : 200
    # StatusDescription : OK
    # Content           : Hello, from 665839ec9f05 !

    curl http://localhost/health
    # StatusCode        : 200
    # StatusDescription : OK
    # Content           : {"status":"healthy"}

    curl http://localhost/info
    # StatusCode        : 200
    # StatusDescription : OK
    # Content           : {"language":"js","version":"14.18.0","host":"665839ec9f05"}
    ```

### Python-API

1. Explore the Python API directory.

    ```bash
    # change directory
    cd python-api

    # list and check the files within the Python API folder
    ls
    # index.py              - entrypoint of the code
    # requirement.txt       - packages and dependencies
    ```

2. Use Dockerfile to build the Python-API container image.

    ```bash
    # build image
    docker build -t python-api:v1 .

    # list images to view the js-api image
    docker image ls
    # REPOSITORY                    TAG              IMAGE ID       CREATED         SIZE
    # python-api                    v1               8fa5e48ba1bd   7 seconds ago    133MB
    ```

3. Run a Python API container using the image that just built.

    ```bash
    # run the Python API container
    docker run -d -p 8080:3001 --name microservice-pythonapi python-api:v1
    # -d                            # detached mode
    # -p 8080:3001                  # mapping ports - local port:container port
    # --name microservice-pythonapi # set name of container
    # python-api:v1                 # image name and tag

    # list running containers
    docker ps
    # CONTAINER ID   IMAGE       COMMAND                  CREATED              STATUS              PORTS                  NAMES
    # 40b0289189ab   python-api:v1   "python index.py"        59 seconds ago   Up 58 seconds   0.0.0.0:8080->3001/tcp   microservice-pythonapi
    ```

4. Test and access the API via command line and browser.

    ```bash
    curl http://localhost:8080/
    # StatusCode        : 200
    # StatusDescription : OK
    # Content           : Hello, 40b0289189ab!

    curl http://localhost:8080/health
    # StatusCode        : 200
    # StatusDescription : OK
    # Content           : {
                      "status": "healthy"
                         }

    curl http://localhost:8080/info
    # StatusCode        : 200
    # StatusDescription : OK
    # Content           : {
                      "host": "40b0289189ab",
                      "language": "python",
                      "version": "3.9.9"
                    }
    ```

### Web Front-end

1. Explore the web-frontend directory.

    ```bash
    # change directory
    cd web-front

    # list and check the files within the Python API folder
    ls
    # public                - images that will be use
    # view                  - front-end of webtool
    # index.js              - entrypoint of the code
    # .dockerignore         - used to exclude files and directories
    # package.json          - nodejs metadata, includes libraries and other info
    # package-lock.json     - other packages and dependencies
    ```

2. Use Dockerfile to build the web frontend container image.

    ```bash
    # build image
    docker build -t web-frontend:v1 .

    # list images to view the microservice-js-web image
    docker image ls
    # REPOSITORY                    TAG              IMAGE ID       CREATED             SIZE
    # web-frontend                  v1               fe432cc06e16   9 minutes ago       175MB
    ```

3. Run a Web container using the image that just built.

    ```bash
    # run the Python API container
    docker run -d -p 3002:3002 --name microservice-web web-frontend:v1
    # -d                        # detached mode
    # -p 3002:3002              # mapping ports - local port:container port
    # --name microservice-web   # set name of container
    # web-frontend:v1           # image name and tag

    # list running containers
    docker ps
    # CONTAINER ID   IMAGE                     COMMAND                  CREATED          STATUS          PORTS                  NAMES
    # 8efa4509992e   web-frontend:v1   "docker-entrypoint.s…"   59 seconds ago      Up 58 seconds      0.0.0.0:3002->3002/tcp   microservice-web
    ```

4. Test and access the API via command line and browser. 

    ```bash
    curl http://localhost:3002/
    # StatusCode        : 200
    # StatusDescription : OK
    # Content           : <!DOCTYPE html>
    ```

### Container integration

1. Make sure to remove all running containers.

    ```bash
    # list running containers
    docker ps
    # CONTAINER ID   IMAGE                         COMMAND                  CREATED       STATUS          PORTS   
    ```

2. Create a docker network.

    ```bash
    # creating docker network
    docker network create microservice-network
    # list the docker networks
    docker network ls
    # NETWORK ID     NAME                   DRIVER    SCOPE
    # eb5076961372   bridge                 bridge    local
    # 6623132a35b0   host                   host      local
    # 705c353774c8   microservice-network   bridge    local
    ```

3. Run the containers and attach them to the network created previously.

    ```bash
    # run the JS and Python APIs and attach them to the previously created network
    docker run -d --network microservice-network --name js-api js-api:v1
    docker run -d --network microservice-network --name python-api microservice-python-api:v1
    # verify the containers that were just created.
    docker ps
    # CONTAINER ID   IMAGE                         COMMAND                  CREATED          STATUS          PORTS      NAMES
    # 532f056fb1d9   microservice-python-api:v.1   "python index.py"        2 seconds ago    Up 1 second     3001/tcp   python-api
    # 532f056fb1d9   microservice-python-api:v.1   "python index.py"        2 seconds ago    Up 1 second     3001/tcp   python-api
    ```
4. Run the webtool container and expose it to port 80 for web browser access. Pass in two environment variables (JS_API_ENDPOINT and PYTHON_API_ENDPOINT), using the container's name instead of localhost or host.docker.internal.

    ```bash
    # run the webtool container, attach it to the network, expose it on port 80, and use the names of the two API containers.
    docker run -d -p 80:3002 --network microservice-network -e JS_API_ENDPOINT="http://js-api:3000/info" -e PYTHON_API_ENDPOINT="http://python-api:3001/info" --name js-web web-frontend:v1
    # verify the containers that were just created.
    docker ps
    # CONTAINER ID   IMAGE                         COMMAND                  CREATED         STATUS         PORTS                  NAMES
    # 943569f4f06a   web-frontend:v1       "docker-entrypoint.s…"   2 seconds ago   Up 1 second    0.0.0.0:80->3002/tcp   js-web
    # 532f056fb1d9   microservice-python-api:1.0   "python index.py"        6 minutes ago   Up 6 minutes   3001/tcp               python-api
    # fc42b1836b45   microservice-js-api:1.0       "docker-entrypoint.s…"   7 minutes ago   Up 7 minutes   3000/tcp               js-api

    ```

5. Test and access the webtool through a web browser using localhost.

6. Lastly, you can check the logs of all the containers.

    ```bash
    # check logs for js-api
    docker logs js-api

    # check logs for python-api
    docker logs python-api

    # check logs for js-web
    docker logs js-web
    ```

---
### Key takeways

1. To create optimized Docker images, implement best practices.

> a. By selecting a smaller base image and using a lower version, I optimized the Docker image size, reducing overall image size and enhancing performance.    
> b. Implementing labels in Dockerfiles helps organize images and provides valuable information for troubleshooting by tracking image metadata.    
> c. Modified the root user to a non-root user to create a more secure environment and implement the principle of least privilege. 
> d. Make sure to store the image in another repository for backup and disaster recovery   

2. Have an organized directory to store each system project.

> a. Separate applications into individual folders, including their dependencies, so that they are easily managed, version controlled, and deployed independently.  
> b. Include a README.md file with clear instructions for other colleagues to collaborate on this project.  
> c. Write clear commit messages that your colleagues can easily understand to improve project workflow.    

3. Always test each image or application independently.

> a. It will help track errors at an early stage, allowing for faster resolution of applications.   
> b. By testing images or applications independently, it is easier to collaborate with QAs, ensuring clear responsibilities.    

4. Store the systems in a repository for backup, recovery, and future improvements.

> a. This project uses GitLab/Github for version control and as a repository.  
> b. Can be improved through automated builds and deployments.  

---