# Integrations

1. You can use any hypervisor to run these containers to cluster, in my case I will run it to minukube.

    ```bash
        # to start the minukube
        minikube start

        # verify if the minikube is runnin
        kubectl get nodes

        # NAME       STATUS   ROLES           AGE     VERSION
        # minikube   Ready    control-plane   7d12h   v1.30.0
    ```