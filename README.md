<a href="http://firebit.nl/">
    <p align="center">
      <img src="https://avatars2.githubusercontent.com/u/49287371?s=200&v=4](https://avatars2.githubusercontent.com/u/49287371?s=200&v=4)" height="100px" alt="Firebit logo"/>
    </p>
</a>

# Laravel API Response
This package aims to makes responses from the API consistent and easy to use. It is compliant with the HTTP standard and the JSend standard.

## Example
#### Code
```php
function getUser($id){
    // Get the data we wish to return
    $user = User:find($id);
    
    // If the user does not exist we return an error
    if(!$user){
        return ApiResponseFactory::notFound("User does not exist");
    }
    
    // Return the data by using a ReponseFactory
    return ApiResponseFactory::success($user);
}
```

#### Error output
```json
{
  "status":"fail",
  "message":"User does not exist"
}
```

#### Success output
```json
{
  "status":"success",
  "data": { 
      "id":1,
      "name":"John Doe",
      "email":"john@example.org",
      "created_at":null,
      "updated_at":null
  }
}
```


## Installation
To install you can use Composer, use the following command to install this package. <br/>
`` composer require firebit/laravel-api-response``

## Documentation
Coming soon!

## Progress
- [X] JSend compliance
- [ ] PHPUnit tests
- [ ] Documentation

## License
For the license please check the LICENSE file, this project has the MIT license.