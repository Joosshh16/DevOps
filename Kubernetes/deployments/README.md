## Deployment Yaml File

1. In this project, we have three containers that will run.
> js-api      
> python-api     
> js-web      

2. The YAML file type is Deployment, and we name it js-api-deployment (you can name the other two containers as needed), attaching it to the microservice-app namespace.

    ```bash
        apiVersion: apps/v1
        kind: Deployment
        metadata:
            name: js-api-deployment
            namespace: microservice-app
            labels:
                app: microservices
    ```

3. We use replicas assigned to the pods through matchLabels.

    ```bash
        spec:
        replicas: 1
        selector:
            matchLabels:
            app: js-api-pod
        template:
            metadata:
            labels:
                app: js-api-pod
    ```

4. We also declare the container specifications, including the container registry, container ports, and the resources each container will use.

    ```bash
     spec:
      containers:
        - name: js-api-container
          image: josua16/microservice:js-api-1.0
          ports:
            - containerPort: 3000
          resources:
            requests:
              memory: "250Mi"
              cpu: "250m"
            limits:
              memory: "500Mi"
              cpu: "500m"
     ```

5. Finally, the deployment uses imagePullSecrets to pull the image assigned to the deployment and uses docker-creds as secrets since this information is sensitive.

     ```bash
     imagePullSecrets:
        - name: docker-creds
     ```

6. Additionally, in js-web-deployment, we use ConfigMaps to serve as environment variables for retrieving the values of the APIs.

      ```bash
        env:
            - name: NODE_VERSION
              valueFrom:
                configMapKeyRef:
                  name: js-config
                  key: NODE_VERSION
            - name: JS_API_ENDPOINT
              valueFrom:
                configMapKeyRef:
                  name: js-config
                  key: JS_API_ENDPOINT
     ```
---

The deployment YAML files are complete for deploying these containers. To expose these containers, go to the services directory.

---