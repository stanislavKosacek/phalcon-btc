# DOCKER - PHP 7.4 - DEBIAN - APACHE - PHALCON - COMPOSER - NODE - WEBPACK

Phalcon dockerized start project base on Debian image with PHP 7.4, Apache, Composer, Node + Webpack

Dockerfile is combination of
```
https://github.com/docker-library/php/blob/master/7.4/buster/apache/Dockerfile

https://github.com/iamcommee/phalcon-docker-compose-example
```

Start Phalcon project from 
```
https://github.com/phalcon/tutorial
```

## Installation
```
git clone https://github.com/stanislavKosacek/dockerized-phalcon.git
cd dockerized-phalcon
make run-dev
```

## Use node.js + Webpack

Base webpack configuration is located in
```
/application/public/front/webpack.config.js
```

To use webpack start with installing node_modules
```
make webpack-install
```

Then build your JS and CSS by
```
make webpack-build
```

To link your builded JS uncomment this line in IndexController.php
```
//$this->assets->addJs('front/dist/bundle.js');
```
* this link JS only on homepage
