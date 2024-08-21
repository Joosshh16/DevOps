# Integrations

1. You can use any hypervisor to run these containers in the cluster. In my case, I will use Minikube.

    ```bash
        # to start the minukube
        minikube start

        # verify if the minikube is runnin
        kubectl get nodes
        # NAME       STATUS   ROLES           AGE     VERSION
        # minikube   Ready    control-plane   7d12h   v1.30.0
    ```

2. Create namespaces to group your containers within the cluste

    ```bash
        # create namespace microservice-app, we will use this to group our resources
        kubectl create namespace microservice-app

        # verify if the namespace is created
        kubectl get namespaces
        # NAME               STATUS   AGE
        # default            Active   7d12h
        # microservice-app   Active   2d10h
    ```

3. After creating the namespace, go to the secrets directory to deploy the YAML file that will be used to access the containers from the container registry

    ```bash
        # create the secret yaml file
        kubectl create -f secret-cred.yaml
        #secret/docker-creds created

        # verify if the secret yaml is successfully created, declare also the namespace where we deploy it
        kubectl get secrets -n microservice-app
        # NAME           TYPE                             DATA   AGE
        # docker-creds   kubernetes.io/dockerconfigjson   1      70s
    ```