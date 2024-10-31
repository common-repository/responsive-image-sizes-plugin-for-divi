=== Responsive Image Sizes Plugin For Divi ===
Contributors: wpt00ls
Tags: divi, responsive images, image sizes
Requires at least: 4.9.8
Requires PHP: 7.0
Tested up to: 5.2.2
Stable tag: 1.1.0
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Divi image module with srcset attribute support. Make your website load faster

== Description ==

Make your website load faster in Divi Theme using image srcsets.

## The Problem – Images on divi webpage serving single image size irrespective of devices sizes

* Is your divi webpage slow?
* Do the <img> tags serve a single size irrespective of the device size?


> [A slower website causes decrease in sales due to increase in bounce rate.](https://neilpatel.com/blog/speed-is-a-killer/)

**A responsive image offers different sizes of the same image**. The browser decides the best image size to render.

**Divi includes a fullsize and regular image module. They don't serve a responsive image. It's a one-size-fits-all.**

The non-responsive image have a single image size. The same image loads on large desktop, tablet and mobiles. 

> Let's say you use the native divi image module with image of size 2000px. Serving the 2000px wide image on a device with width 400px serves no purpose other than to slow down the webpage.

## The Solution – Divi responsive image size plugin

The Divi Responsive Image Size plugin has two modules.

* **Responsive Image divi module** – It's available in regular divi section.
* **Fullwidth Responsive Image divi module** – It's available in fullwidth divi section.

> Both the modules help creates a image tag with responsive image sizes.

A responsive image adds the srcset and sizes attributes to the image markup.

### What does srcset and sizes do?

Consider the example of an &lt;img&gt; tag

> &lt;img alt=&quot;Divi responsive image sizes&quot; src=&quot;default.jpg&quot; srcset=&quot;small.jpg 240w, medium.jpg 300w, large.jpg 720w&quot; sizes=&quot;(max-width: 360px) 300px, 100vw&quot;&gt;

Let's go over each attribute.

> alt="Divi responsive image sizes"`

The `alt` attribute describes the alternative text for the image. Browser loads this text when it can't find the image.

> src="default.jpg"

The `src` attribute defines a fallback image path for browsers that don't support srcset and sizesattributes

> srcset="small.jpg 240w, medium.jpg 300w, large.jpg 720w"

The `srcset` attribute lists images at different sizes. Along with each image path we specify it's width in pixels.

> sizes="(max-width: 360px) 300px, 100vw"

The sizes attribute instructs the browser on how to pick the right image from the srcset based on the viewport (device) size.

Going by the above example,

* For viewport size 360px and below, browser displays medium.jpg (300px) image.
* For viewport size above 360px, browser displays large.jpg image that is 720px wide.

### Divi image sizes

Divi supports following css media breakpoints. 

* **Large screens** (1405px upwards)
* **Laptops and desktops** (between 1100px and 1405px)
* **Tablets in landscape mode** (between 981px and 1100px)
* **Tablets in portrait mode** (between 768px and 980px)
* **Smart phones in landscape mode** (between 480px and 768px)
* **Smart phones in portrait mode** (between 0 and 479px)

For every breakpoint, the responsive divi modules has a corresponding field to set the image width.

### Improve image SEO score

Image SEO is important. The responsive divi modules follows [google recommendations for image SEO](https://developers.google.com/style/images)

* The responsive divi modules wraps the image in a <figure> tag.
* It can display a caption for the image using the <figcaption> tag.
* The alt attribute text is got from the WordPress media attachment or custom text.

### Full divi frontend builder support

The **Responsive Image** and **Fullwidth Responsive Image** divi modules provide full divi frontend builder support. Add custom styles to the image and caption text via the modules Design tab.


### Divi Responsive Image Sizes Module Settings - See screenshot 1.

* Image section – Upload/select an image, set alt and figcaption tags. If alt and caption values are empty, it uses corresponding values from WordPress media attachment.
* Responsive Image Width section – Define the image sizes at different media breakpoints.
* Caption Text section – Add custom style to the caption text.
* Sizing section – Change the max and standard width for the <figure> element.
* Spacing section – Set the padding and margin values for the figure
* Border section – Set border styles for the <img> tag.
* Box shadow section – Set box shadow styles for the <img> tag.
* Filters section – Set filters for the figure element.
* Transform section – Set transforms for the figure element
* CSS ID & Classes section – Set css id and classes for figure element
* Custom CSS section – Add custom css for <figure>, <img> and <figcaption> tags
* Visibility section – Set visibility for the <figure> tag on desktop, tablet and mobile.

== Installation ==


== Frequently Asked Questions ==

= Does this plugin have any dependencies? =
Divi Theme from Elegant Themes is a pre-requisite to this plugin.

= Does this work with Extra theme from Elegant themes = 
We haven't tested it on Extra theme. If you happen to get it working, let us know :-)

== Screenshots == 

1. Divi Responsive Image Sizes Module Settings.


== Changelog ==

= 1.1.0 =
* Updated for release on wordpress.org

= 1.0.0 =
* Initial version
* `Responsive Image` divi module added for standard divi section.
* `Fullwidth Responsive Image` divi module added for fullwidth divi section.
