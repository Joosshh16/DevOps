## Services Yaml File

1. In this project, we will use a service to expose each pod for communication within the cluster.. 
   
2. The YAML file type is Service, and we name it js-api-service (you can name the other two services as needed), attaching it to the microservice-app namespace.

    ```bash
        apiVersion: v1
        kind: Service
        metadata:
            name: js-api-service
            namespace: microservice-app
            labels:
                app: microservices
    ```

3. We target the pod through a selector to expose it to the service.

    ```bash
        spec:
         selector:
            app: js-api-pod
    ```

5. Finally, we use NodePort to expose the selected pod with service port 80, target port (or container port) 3000, and NodePort 32007.

     ```bash
        ports:
            - protocol: TCP
              port: 80
              targetPort: 3000
              nodePort: 32007
        type: NodePort    
     ```

---

The secret YAML files are complete for exposing these containers. To run and test these containers, go to the root directory for the instructions.

---