This Symfony2 bundle **sets the router default base URL** (which by default is `http://localhost`)

It is required when absolute URLs are generated while not dealing with a request (like when sending an email from a cron job).

# Installation and configuration

1. Require it

    ```bash
    $ composer require frosas/base-url-bundle:1.*@dev
    ```

2. Register it in `app/AppKernel.php`

    ```php 
    <?php 
    $bundles = array(
        // ...
        new Frosas\BaseUrlBundle\FrosasBaseUrlBundle
    );
    ```

3. Set the base URL. This is the recommended usage:

    ``` 
    # app/config/config.yml
    frosas_base_url:
        base_url: %base_url%
    ``` 

    ``` 
    # app/config/parameters.yml
    parameters:
        base_url: http://example.com
    ```

# Troubleshooting

- *Controller tests fail when using generated URLs*

    If you generate the URLs you test
    
    ```php
    <?php
    $client = self::createClient();
    $profileUrl = $client->getContainer()->get('router')->generate('profile', array('id' => 123);
    $client->request('get', $profileUrl);
    ```

    your tests can fail as the default Symfony test client expects the site to be in the root of the domain 
    (like `http://example.com`). If your base URL has a path (like `http://localhost/~user/my-site`) you'll 
    have to change it for you test environment.
    
    ```
    # app/config/config_test.yml
    frosas_base_url:
        base_url: http://localhost
    ```