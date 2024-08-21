## Container Registry - Docker Hub configuration

1. To pull Docker images from Docker Hub or another container registry for your application, you'll need to configure your credentials in Docker.

2. You must convert your username and password to base64 to attach the configuration file.

    ```bash
    # you can use other tool for converting to base64, in this case I used the local powershell
    #insert your own username and password
    [Convert]::ToBase64String([Text.Encoding]::UTF8.GetBytes('<username>:<password>'))
    
    #sample output of base64 username and password
    dXNlcm5hbWU6cGFzc3dvcmQ=

    ```
3. Copy the base64-encoded username and password, then attach it to the config.json file.
    ```bash
    auth:"dXNlcm5hbWU6cGFzc3dvcmQ="
    ```
    
4. Lastly, to use this config.json file as a Docker Hub configuration that will serve as a secret, convert the file to base64.
     ```bash
     # I used PowerShell locally to convert this config.json file
    [Convert]::ToBase64String([IO.File]::ReadAllBytes('Path:\config.json'))

    # copy the sample base64 output of the config.json file
    dXNlcm5hbWU6cGFzc3dvcmQ=dXNlcm5hbWU6cGFzc3dvcmQ=dXNlcm5hbWU6cGFzc3dvcmQ=dXNlcm5hbWU6cGFzc3dvcmQ=
    ```

---

The configuration file is working and was successfully converted to base64. Go to the secrets directory to use this configuration.

---
