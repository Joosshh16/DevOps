## Configmaps Yaml File

1. This ConfigMap will serve as an environment variable for accessing the APIs in the web front-end.

2. The YAML file type is ConfigMap, and we name it js-config, attaching it to the microservice-app namespace.

    ```bash
        apiVersion: v1
        kind: ConfigMap
        metadata:
            name: js-config
            namespace: microservice-app
    ```

3. This ConfigMap will be used by js-web-deployment. The port is set to 80 because our service is exposed on port 80 in the cluster, allowing the pods to communicate with each other.

     ```bash
        data:
        NODE_VERSION: "14.18.0"
        JS_API_ENDPOINT: "http://js-api-service:80/info"
        PYTHON_VERSION: "3.9.9"
        PYTHON_API_ENDPOINT: "http://python-api-service:80/info"

    ```

    ---

Go to the deployment directory to check the integration of the ConfigMaps."

    ---