# Laravel Image Processing

[![Latest Stable Version](http://poser.pugx.org/timedoor/image-processing/v)](https://packagist.org/packages/timedoor/image-processing)
[![Total Downloads](http://poser.pugx.org/timedoor/image-processing/downloads)](https://packagist.org/packages/timedoor/image-processing)
[![License](http://poser.pugx.org/timedoor/image-processing/license)](https://packagist.org/packages/timedoor/image-processing)

![image-processing](https://user-images.githubusercontent.com/79293259/165252153-e0b74f58-b7a0-4e83-ab59-7f1b626b5a76.gif)

Manipulate crop or resize image before upload to server.


## Installation

1. Go to project dierectory
2. Run `composer require timedoor/image-processing --dev`
3. Run `php artisan imgproc:install`
4. Select module you want to install
5. The resource assets & componenets will be transfered to your project
6. To implement this libary see the usage below.

## Usage

1. Add `<x-imgproc-inputfile>` component to your form
   Example:
   ```php
   ...
    <div class="form-group">
        <label for="photo"></label>
        <x-imgproc-inputfile class="additional-input-class" name="photo"></x-imgproc-inputfile>
    </div>
    ...
   ```
2. Then add `<x-imgproc-modal>` componenet above the footer section
   Example:
    ```php
    ...
    <x-imgproc-modal title="Image Processing" :mode_cropper="true" :mode_resize="true"></x-imgproc-modal>
    ...
    ```
3. You setup either mode cropper or resize image with tag `:mode_cropper="(boolean)"` and `:mode_resize="(boolean)"`
4. Done! now you good to go.

## Contributing
![contributions-wellcome](https://user-images.githubusercontent.com/12730759/150999538-d6872478-96ab-42d6-bb58-0ae443f514c8.svg)

Contributions are always welcome!


## License

Licensed under the MIT License, see [LICENSE](LICENSE) for more information.