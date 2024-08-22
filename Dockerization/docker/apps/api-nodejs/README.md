## JS API

1. Clone and explore the Milestone 1 project. I generated an SSH key on my device and integrated it to my Git account for secure connection.

    ```bash
    # generate an SSH key and input passphrase for added security
    ssh-keygen

    # copy the public key and add it to my GitLab account
    cat "C:\Users\path\.ssh\id_rsa.pub"

    # clone milestone projects using SSH, input passphrase when prompted to complete the process
    git clone git@gitlab.<yourgitlink>.git
    ```

2. Explore the activity 1 JS API directory.

    ```bash
    # change directory
    cd api-nodejs

    # list and check the files within the JS API folder
    ls
    # .dockerignore         - used to exclude files and directories
    # index.js              - entrypoint of the code
    # package.json          - nodejs metadata, includes libraries and other info
    # package-lock.json     - other packages and dependencies
    ```

3. To build the JS API container image, I created Dockerfile inside the activity 1 directory and implement some best practices in building container image.

    ```Dockerfile
    FROM node:14.18.0-slim

    # adding label
    LABEL name ="JS API"\
        description ="Backend API"\
        authors="<email>" \
        company="Companty/Orgname"
    
    # setup app directory
    WORKDIR /usr/src/app

    # copy package list
    COPY package*.json ./

    # install packages/dependencies
    RUN npm install

    # copy source code
    COPY . .

    # expose port
    EXPOSE 3000

    #for non-root user
    USER node

    # run application
    CMD [ "npm", "run", "start" ]
    ```

4. Build the JS API container image using the newly created Dockerfile.

    ```bash
    # build image
    docker build -t microservice-js-api:1.0 .

    # list images to view the microservice-js-api image
    docker image ls

    # REPOSITORY                                                                     TAG       IMAGE ID       CREATED        SIZE
    # microservice-js-api                                                            1.0       1a9df678bf7b   15 hours ago   173MB
    ```

5. Run a JS API container using the image that just built.

    ```bash
    # run the JS API container
    docker run -d -p 80:3000 --name js-api microservice-js-api:1.0
    # -d                        # detached mode
    # -p 80:3000                # mapping ports - local port:container port
    # --name js-api             # set name of container
    # microservice-js-api:1.0   # image name and tag

    # list running containers
    docker ps
    # CONTAINER ID   IMAGE                     COMMAND                  CREATED          STATUS          PORTS                  NAMES
    # 147377406caa   microservice-js-api:1.0   "docker-entrypoint.s…"   15 seconds ago   Up 13 seconds   0.0.0.0:80->3000/tcp   js-api 
    ```

6. Test and access the API via command line and browser.

    ```bash
    curl http://localhost/
    # StatusCode        : 200
    # StatusDescription : OK
    # Content           : Hello, from 147377406caa !

    curl http://localhost/health
    # StatusCode        : 200
    # StatusDescription : OK
    # Content           : {"status":"healthy"}

    curl http://localhost/info
    # StatusCode        : 200
    # StatusDescription : OK
    # Content           : {"language":"js","version":"14.18.0","host":"147377406caa"}
    ```

     Here are the path exposed by the API.

    > a. Root - http://{ip}:{port}  
    > b. Health Path - http://{ip}:{port}/health  
    > c. Info Path - http://{ip}:{port}/info  

### RESULT
![js-api-result-localhost](Dockerization/docker/screenshots/JS-API-curl-localhost-health.png)
![js-api-result-health](docker/screenshots/JS-API-curl-localhost-health.png)
![js-api-result-info](docker/screenshots/JS-API-curl-localhost-info.png)

![js-api-webresult-localhost](docker/screenshots/JS-API-web-localhost.png)
![js-api-webresult-health](docker/screenshots/JS-API-web-localhost-health.png)
![js-api-webresult-info](docker/screenshots/JS-API-web-localhost-info.png)

---

The JS API container is running and functioning. Switch to the next step: Python API.

---