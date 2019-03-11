## What is this?

This project is a extension for magento 1.

Extension implements the work with the our API it is done for educational purposes.
We can create different commands with alias and version command. 

### Installing

Download magento 1.* and deploy extension files in magento.

```
Download from https://magento.com/tech-resources/download
```

Put in database bearer tokens. For example:

```
Bearer token: '58trbv2fuaw9egsa'
```

### Example

This application has two protocol.

GET:
```
http://somehost.com/magento/someapi/format1?params={"limit":"100"}&command=GetProducts&version=1.0
```

POST:
```javascript
var xhr = new XMLHttpRequest();
var pack = {
    command: 'GetProducts',
    version: '2.0',
    params: {
        limit: '2'
    }
};

xhr.open('POST', 'http://somehost.com/magento/someapi/format2', true);
xhr.setRequestHeader('someapi_bearer_token', '58trbv2fuaw9egsa');
xhr.send(JSON.stringify(pack));
```

### Admin Panel 
![alt text](https://raw.githubusercontent.com/a-samoylov/Cool-Vendor/master/Screenshots/UI_Admin.png)

## Authors

Alexander Samoylov
> [LinkedIn](https://www.linkedin.com/in/alexander-samoylov/)

> [GitHub](https://github.com/a-samoylov)
