This Symfony 2 bundle **sets the router default base URL** (which by default is `http://localhost`)

It is required when absolute URLs are generated while not dealing with a request (like when sending an email from a cron job).

# Installation and configuration

1. Require it in your `composer.json`

    ```js
    "require": {
        ...
        "frosas/base-url-bundle": "*"
    }
    ```

2. Download it

    ```bash
    $ php composer.phar update frosas/base-url-bundle
    ```

3. Register it in `app/AppKernel.php`

    ```php 
    <?php 
    $bundles = array(
        // ...
        new Frosas\BaseUrlBundle\FrosasBaseUrlBundle
    );
    ```

4. Set the base URL

    ```
    // app/config/config.yml
    frosas_base_url:
        base_url: http://example.com
    ```

    Note: you probably want to set it into your `app/config/parameters.yml` and reference it from your config