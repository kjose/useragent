# User Agent Mode

This script allows you to load the website of your choice in the User Agent mobile, tablet or desktop.

First, load the website of your choice.

Then, inject the following script in the javascript console.


````
var fileref = document.createElement('script');
fileref.setAttribute("type", "text/javascript");
fileref.setAttribute("src", "https://projets.kevinjose.fr/useragent/inject.js");
document.getElementsByTagName("head")[0].appendChild(fileref);
````
