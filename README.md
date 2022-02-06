# README

WIP Simple Framework with Routing, Request injection etc...
## Defining Routes:
```yaml
/:
    Methods:
      - GET
      - POST
    Controller: Http\Controllers\Controller::Index
```

## Adding New Configuration Features/Entries:
- The config class parses the configuration file.
- Add a new function for each new configuration entry/feature you want the class to handle.
- Call the function In HandleConfiguration if you need the Option to be run on app startup.

## TODO:
- Requests
- Respsonses
- DI Container
- Tests
- Split Src from user Skeleton
- Add Logger Class


## SETUP
- php 7.4
1. run Composer Update.
2. point your htaccess, site config or x to /public.]
