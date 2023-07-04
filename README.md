# Dummy server
A simple service with environment variables for testing your infrastructure.

### What is it?
When you are building and testing your whole infrastructure, you will need a simple server that respond to your requests. I did not find an exisiting rock-simple solution, and here we are.

### How can you use it?
It's a simple Docker-based server that you can bind to on port 80.
In a local environment, you can use `docker-compose`:

```
docker-compose up
```

Or run the container by `docker run` itself:

```
docker run -d -e name=web1 -e type=plain -p 80:80 dummy-server
```

You don't need to clone this repository and build this image for yourself; it can be found on the Docker Hub:
```
docker run -d -e name=web1 -e type=plain -p 80:80 norbertszabomyplancloud/dummy-server
```

There are two variables you can use:
- `name`: you can define the name of the service that will be shown 
- `type`: the type of the response

The `name` can be any string. Default value is "noname".<br>
Type can be:
- `html` (default value)
- `plain`
- `json`

You can override these variables with the GET parameter, like this:
```
http://localhost?type=json&name=web1
```

### Additional notes

The myPlan.cloud logo in this repository is a trademark. Any other part of this code is free to use and modify.