

## About Application

This is a test application to upload Log File Using command line and get the number of count the service has  used according  to  the parameters input by the user


## Test Can Include More

    1. File Upload Validation Test
    2. File Upload Database Insertion  Test
    3. API Validation  Test
    
## API Documentation

    1. END Point http://127.0.0.1:8000/api/logs/count
    2. Method "GET"
    3. Request 
        serviceNames - Serivce Name in the Log File  ex "invoice-service"
        statusCode - Code "201"
        startDate - Start Date Format ex "[17/Sep/2022:10:33:59]"
        endDate - End Date Format ex "[17/Sep/2022:10:33:59]"
    4. Example : http://127.0.0.1:8000/api/logs/count?serviceNames=invoice-service&statusCode=201&startDate=[17/Sep/2022:10:21:53]&endDate=[17/Sep/2022:10:23:54]
    5. Response : {"count":138}

API Document can be generated by Postman or Swagger and we can make it  avialble by Hosting it or providing it in the code

## Feature Development
    1. Make sure to  allow only  txt file can be uploaded
    2. Validate  the  Files
    3. Validate the input datetime
    4. Convert any datetime and get the result

