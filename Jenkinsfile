pipeline {
    agent any
    environment {
        // Define any environment variables here if necessary
        DOCKER_IMAGE = 'dhungelnikeeta/lost-and-found'
        REPO_URL = 'https://github.com/nikeetadhungel/lost-and-found.git'
    }
    stages {
        stage('Checkout') {
            steps {
                // Checkout the code from GitHub
                checkout scm
            }
        }
        stage('Build Docker Image') {
            steps {
                // Build the Docker image using Windows batch command
                bat 'docker build -t %DOCKER_IMAGE% .'
            }
        }
        stage('Push Docker Image') {
            steps {
                // Push the Docker image to Docker Hub using Windows batch command
                bat 'docker push %DOCKER_IMAGE%'
            }
        }
    }
    post {
        always {
            // Clean up or perform any steps after the pipeline finishes
            echo 'Pipeline execution complete.'
        }
        success {
            echo 'Build and Docker operations were successful.'
        }
        failure {
            echo 'There was an issue with the build or Docker operations.'
        }
    }
}
