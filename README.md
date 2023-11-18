# unmasonry
The objective was to eliminate CLS (Core Web Vital parameter) on the gallery pages of the WordPress website. It was using masonry.js to arrange the content, but it was getting loaded with significant delay, causing CLS and thus failing Core Web Vitals.
To fix the issue, a custom PHP script was created that would get all the sizes of images from the gallery, sort them, and display them with calculated sizes on the front end without using JS.
