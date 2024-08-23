    -Title
    project and description

    --Project Directoru
    -nodejs-api
    -python-api
    -web-frontend

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

    ### Integration of containers
    We will integrate the webtool container with the backend APIs (JS and Python) using docker network.

    1. Before starting the integration process, we will stop and remove the running containers.

    Running containers.

    > 1. microservice-jsapi 
    > 2. microservice-pythonapi 
    > 3. microservice-web 

        ```bash
        # stop the running containers listed above
        docker stop microservice-jsapi
        docker stop microservice-python
        docker stop microservice-web

        # you can verify if the containers have stopped by running this code and checking if the status shows "exited
        docker ps -a
        # CONTAINER ID   IMAGE                                 COMMAND                  CREATED             STATUS                          PORTS                                                                                                                                  NAMES
        # 8efa4509992e   web-frontend:v1                       "docker-entrypoint.s…"   11 minutes ago      Exited (0) 4 minutes ago                                                                                                                                               microservice-web
        # 40b0289189ab   python-api:v1                         "python index.py"        58 minutes ago      Exited (0) About a minute ago                                                                                                                                          microservice-pythonapi
        # 665839ec9f05   js-api:v1                             "docker-entrypoint.s…"   About an hour ago   Exited (0) 5 minutes ago                                                                                                                                               microservice-jsapi
        ```