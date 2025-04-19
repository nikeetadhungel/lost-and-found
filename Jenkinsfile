pipeline {
    agent any

    environment {
        // Set your Docker Hub credentials ID here
        DOCKER_CREDENTIALS = '127712'  // Replace with your Docker Hub credentials ID
        // Optionally, set the GitHub credentials ID if needed
        GITHUB_CREDENTIALS = 'cca39903-a115-479a-ad6b-5b95c6191af0'  // Replace with your GitHub credentials ID
    }

    stages {
        stage('Checkout') {
            steps {
                // Checkout code from GitHub using GitHub credentials
                git credentialsId: GITHUB_CREDENTIALS, url: 'https://github.com/nikeetadhungel/lost-and-found.git'
            }
        }
        
        stage('Build Docker Image') {
            steps {
                script {
                    // Log in to Docker Hub using the Docker Hub credentials
                    docker.withRegistry('https://index.docker.io/v1/', DOCKER_CREDENTIALS) {
                        // Build the Docker image using the Dockerfile in the repository
                        def customImage = docker.build('dhungelnikeeta/lost-and-found')
                        // Push the Docker image to Docker Hub
                        customImage.push()
                    }
                }
            }
        }
    }

    post {
        always {
            echo 'Pipeline execution complete.'
        }
        success {
            echo 'Build and Docker operations completed successfully.'
        }
        failure {
            echo 'There was an issue with the build or Docker operations.'
        }
    }
}
