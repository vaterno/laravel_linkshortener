## How to start:
1. Run command `composer install`
1. Run command `sail artisan migrate`
1. Run command `sail up`
1. Send ***POST*** request to `/api/v1/shorter` to create url shortcode
1. Make ***GET*** request to `http://0.0.0.0/{shortcode}` 

## API:

### POST /api/v1/shorter
Request:
```json
{
    "url": "http://google.com.ua"
}
```

Response:
```json
{
    "data": {
        "url": "http://0.0.0.0/DB432"
    }
}
```

### GET /api/v1/count-redirects/{shortcode}

Response:
```json
{
    "data": {
        "count":2
    }
}
```
