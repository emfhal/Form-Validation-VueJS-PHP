# Form Validation with Vue JS and PHP
## Form Validation - Vue.js + Bootstrap + PHP

> Bootstrap is an open source toolkit for developing with HTML, CSS, and JS. Quickly prototype your ideas or build your entire app with our Sass variables and mixins, responsive grid system, extensive prebuilt components, and powerful plugins built on jQuery.

> Vue.js is a progressive, incrementally-adoptable JavaScript framework for building UI on the web.


Load Bootstrap-Vue from CDN:

```html

<!-- Load Bootstrap 5.x RTL CSS from our CDN -->

<link type="text/css" rel="stylesheet" href="//unpkg.com/bootstrap-vue@latest/dist/bootstrap-vue.css" />

<script type="text/javascript">
        function get_data_from_url(url) {
            var http_req = new XMLHttpRequest();
            http_req.open("GET", url, false);
            http_req.send(null);
            return http_req.responseText;
        }

        window.app = new Vue({
            el: '#app',
            data: {
                name: ''
            },
            computed: {
                nameState() {
                    var url = "core/valid.php?name=" + encodeURIComponent(this.name);
                    var data_obj = JSON.parse(get_data_from_url(url));
                    return (data_obj['status'] == "success") ? true : false;
                }
            },
            data() {
                return {
                    name: ''
                }
            }
        });
    </script>

```
PHP code:
```php
<?php
$cols = array();

if (!empty($_REQUEST['name'])) {
    $text = $_REQUEST['name'];
    $is_english = preg_match('/^[A-Za-z]+$/i', $text);
    $strlen = strlen($text);
    if ($is_english and $strlen > 3){
        $cols['status'] = "success";
    } else{
        $cols['status'] = false;
    }
}

header('Content-type:application/json;charset=utf-8');
echo json_encode( $cols );
```


#### Starter template
Be sure to have your pages set up with the latest design and development standards. That means using an HTML5 doctype and including a viewport meta tag for proper responsive behaviors. Put it all together and your pages should look like this:

```html
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
    <title>Form Validation - Vue.js + Bootstrap + PHP</title>

    <link type="text/css" rel="stylesheet" href="//unpkg.com/bootstrap/dist/css/bootstrap.min.css" />
    <link type="text/css" rel="stylesheet" href="//unpkg.com/bootstrap-vue@latest/dist/bootstrap-vue.css" />
    <!-- Load polyfills to support older browsers -->
    <script src="//polyfill.io/v3/polyfill.min.js?features=es2015%2CIntersectionObserver"></script>
    <!-- Required scripts -->
    <script src="//unpkg.com/vue@latest/dist/vue.js"></script>
    <script src="//unpkg.com/bootstrap-vue@latest/dist/bootstrap-vue.js"></script>
    <script src="//code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="//code.jquery.com/jquery-migrate-1.4.1.min.js"></script>
    <!-- jsdelivr cdn -->
    <script src="//cdn.jsdelivr.net/npm/vee-validate@<3.0.0/dist/vee-validate.js"></script>
    <!-- unpkg -->
    <script src="//unpkg.com/vee-validate@<3.0.0"></script>
</head>
<body>
    <div id="app">
        <b-container>
            <b-form-group horizontal :label-cols="4" description="Let us know your name." label="Enter your name">
                <b-form-input id="input-live" v-model="name" :state="nameState"
                    aria-describedby="input-live-help input-live-feedback" placeholder="Enter your name" trim>
                </b-form-input>
                <b-form-invalid-feedback id="input-live-feedback">
                    Enter at least 3 letters (english only)
                </b-form-invalid-feedback>
            </b-form-group>
        </b-container>
    </div>
    <!-- Start running your app -->
    <script type="text/javascript">
        function get_data_from_url(url) {
            var http_req = new XMLHttpRequest();
            http_req.open("GET", url, false);
            http_req.send(null);
            return http_req.responseText;
        }

        window.app = new Vue({
            el: '#app',
            data: {
                name: ''
            },
            computed: {
                nameState() {
                    var url = "core/valid.php?name=" + encodeURIComponent(this.name);
                    var data_obj = JSON.parse(get_data_from_url(url));
                    return (data_obj['status'] == "success") ? true : false;
                }
            },
            data() {
                return {
                    name: ''
                }
            }
        });
    </script>
</body>
</html>
```



#### Feature requests, and bug fixes


If you want a feature or a bug fixed, [report it via project's issues tracker](https://github.com/emfhal/FormValidationVuePHP/issues). However, if it's something you can fix yourself, *fork* the project, *do* whatever it takes to resolve it, and finally submit a *pull* request. I will personally thank you, and add your name to the list of contributors.

#### Author

- **Emfhal** [http://github.com/emfhal](http://github.com/emfhal)
