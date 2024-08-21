## Secrets

1. Secrets are used to store and handle sensitive information that cannot be seen in the frontend application. In this case, the sensitive information includes credentials for accessing containers from Docker Hub.

2. Make sure that you copy the base64 of the configuration file and attach it to this secret yaml file.

    ```bash
      #input the base64 confile file to dockerconfigjson
      data:
      .dockerconfigjson: dXNlcm5hbWU6cGFzc3dvcmQ=dXNlcm5hbWU6cGFzc3dvcmQ=dXNlcm5hbWU6cGFzc3dvcmQ=
    ```

---

The secret YAML file is complete, and we will test it later. Next, we will create a deployment YAML file and services to run the application.

---