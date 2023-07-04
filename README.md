# Dummy server
A simple service with environment variables for testing your infrastructure.

### What is it?
When you are building and testing your whole infrastructure, you will need a simple server that will respond to your requests.

### How can you use it?
It's a simple Docker-based server that you can bind to on port 80.
On a local environment you can use docker-compose:

```
docker-compose up
```

But you can always run the container by `docker run` itself:

```
docker run -d -t -i -e name=web1 -e type=plain -p 80:80 dummy-server
```

There are two variables you can use:
- `name`: you can define the name of the service which will be shown 
- `type`: the type of the response

Name can be any string. Default value is "noname".<br>
Type can be
- html (default value)
- plain
- json

You can override these variables by the GET parameter, like
```
http://localhost?type=json&name=web1
```